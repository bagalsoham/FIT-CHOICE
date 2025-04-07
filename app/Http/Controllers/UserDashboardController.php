<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserPlan;
use App\Models\Payment;

class UserDashboardController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // redirect to login if not logged in
        }

        $user = Auth::user();

        // Get active plan
        $activePlan = UserPlan::where('user_id', $user->id)->first();

        // Get payment history
        $payments = Payment::where('user_id', $user->id)
                           ->orderBy('payment_date', 'desc')
                           ->get();

        return view('user.dashboard', compact('activePlan', 'payments'));
    }
}
