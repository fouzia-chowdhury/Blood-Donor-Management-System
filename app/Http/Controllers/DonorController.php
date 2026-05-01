<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donor;
use App\Models\User;
use App\Models\BloodRequest; // BloodRequest model import kora holo
use Illuminate\Support\Facades\Auth;

class DonorController extends Controller
{
    // 1. Shob donor-er list dekhano (Read)
    public function index() 
    {
        $donors = Donor::all(); 
        return view('donors.index', compact('donors')); 
    }

    // 2. Notun donor registration form dekhanor jonno
    public function create() 
    {
        return view('donors.create'); 
    }

    // 3. Form theke asha data database-e save kora (Create)
    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required',
            'blood_group' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        Donor::create($request->all()); 
        return redirect('/donors')->with('success', 'Donor successfully added!');
    }

    // 4. Donor details dekhanor jonno function
    public function show($id)
    {
        $donor = User::findOrFail($id);
        return view('donors.show', compact('donor'));
    }

    // 5. Edit form dekhano
    public function edit($id) {
        $donor = Donor::find($id);
        return view('donors.edit', compact('donor'));
    }

    // 6. Data update kora
    public function update(Request $request, $id) {
        $donor = Donor::find($id);
        $donor->update($request->all());
        return redirect('/donors')->with('success', 'Updated successfully!');
    }

    // 7. Data delete kora
    public function destroy($id) {
        $donor = Donor::find($id);
        $donor->delete();
        return redirect('/donors')->with('success', 'Deleted successfully!');
    }

    // --- NOTIFICATION FUNCTION ---
    public function notifications()
    {
        // Login kora donor-er jonno asha pending ebong anya request gulo dekhabe
        $requests = BloodRequest::where('donor_id', Auth::id())
                    ->with('seeker') // Seeker-er details shoho
                    ->latest()
                    ->get();

        return view('donor.notifications', compact('requests'));
    }
}