<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\ProfileController;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// Home page
Route::get('/', function () {
    return view('auth.register');
});

// --- UPDATED DASHBOARD LOGIC ---
Route::get('/dashboard', function (Request $request) {
    /** @var \App\Models\User $user */
    $user = Auth::user();

    // Jodi user login kora na thake
    if (!$user) {
        return redirect()->route('login');
    }

    // Role jodi 'seeker' hoy
    if ($user->role === 'seeker') {
        // Shudhu shei user-der anbe jader role holo 'donor' ebong available (is_available = 1)
        $query = User::where('role', 'donor')->where('is_available', 1);

        // Blood group diye search filter
        if ($request->filled('blood_group')) {
            $query->where('blood_group', $request->blood_group);
        }

        $donors = $query->get();
        return view('seeker_dashboard', compact('donors'));
    }
    
    // Role jodi 'donor' hoy (ba seeker na hoy), tobe normal dashboard view hobe
    return view('dashboard'); 
})->middleware(['auth', 'verified'])->name('dashboard');


// Auth Middleware Group (Authenticated user-der jonno)
Route::middleware('auth')->group(function () {
    
    // Blood Donor CRUD Routes
    Route::get('/donors/create', [DonorController::class, 'create']);
    Route::post('/donors', [DonorController::class, 'store']);
    Route::get('/donors', [DonorController::class, 'index']);
    Route::get('/donors/{id}', [DonorController::class, 'show'])->name('donors.show');
    
    // Availability Status Update (Toggle Button functionality)
    Route::post('/profile/update-status', [ProfileController::class, 'updateStatus'])->name('profile.update-status');
    
    // Profile settings
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Ekhane PATCH route-ti update handle korbe
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

use App\Http\Controllers\BloodRequestController;

Route::post('/request-blood/{donorId}', [BloodRequestController::class, 'store'])->name('blood.request');
Route::get('/donor/notifications', [App\Http\Controllers\DonorController::class, 'notifications'])->name('donor.notifications');
// Authentication routes (Breeze)
require __DIR__.'/auth.php';