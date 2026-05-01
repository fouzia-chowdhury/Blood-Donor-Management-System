<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
    {
        /** @var \App\Models\User $user */
        $user = $request->user();

        // 1. Data Validation
        //
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'blood_group' => 'required|string',
            'age' => 'nullable|numeric',
            'height' => 'nullable|string',
            'weight' => 'nullable|numeric',
            'address' => 'required|string',
            'last_donation_date' => 'nullable|date',
        ]);

        // 2. Database update
        // $user->update call korar por database-e save hobe
        $user->update($validated);

        // 3. url use kore dashboard redirect krbe
        return redirect('/dashboard')->with('status', 'profile-updated');
    }

    /**
     * Update the user's availability status (Toggle logic).
     */
    public function updateStatus(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        
        // Toggle Logic: Checkbox thakle 1, na thakle 0
        $user->is_available = $request->has('is_available') ? 1 : 0;
        $user->save();

        return back()->with('status', 'Availability Status Updated!');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}