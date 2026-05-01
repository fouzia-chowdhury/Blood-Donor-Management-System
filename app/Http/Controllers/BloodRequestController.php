<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BloodRequest; 
use Illuminate\Support\Facades\Auth;

class BloodRequestController extends Controller
{
    public function store($donorId)
    {
        // 1. Ek-i seeker jeno bar bar same donor-ke pending request na pathate pare
        $exists = BloodRequest::where('seeker_id', Auth::id())
                              ->where('donor_id', $donorId)
                              ->where('status', 'pending')
                              ->first();

        if ($exists) {
            return back()->with('error', 'You have already sent a request to this donor.');
        }

        // 2. Database-e request create koro
        BloodRequest::create([
            'seeker_id' => Auth::id(),
            'donor_id'  => $donorId,
            'status'    => 'pending',
        ]);

        // 3. Success message niye back koro
        return back()->with('success', 'Blood request sent successfully!');
    }
}