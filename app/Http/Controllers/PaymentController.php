<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\UserPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'plan_name' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        $user = Auth::user();
        
        // Check if user already has a plan
        $existingPlan = UserPlan::where('user_id', $user->id)->first();
        
        if ($existingPlan) {
            // Update existing plan
            $existingPlan->update([
                'plan_name' => $validated['plan_name'],
                'features' => $this->getPlanFeatures($validated['plan_name']),
            ]);
        } else {
            // Create new plan for user
            UserPlan::create([
                'user_id' => $user->id,
                'plan_name' => $validated['plan_name'],
                'features' => $this->getPlanFeatures($validated['plan_name']),
            ]);
        }
        
        // Record payment
        Payment::create([
            'user_id' => $user->id,
            'plan_name' => $validated['plan_name'],
            'amount' => $validated['amount'],
            'payment_status' => 'success',
            'payment_date' => Carbon::now(),
        ]);
        
        return redirect()->route('dashboard')->with('success', 'Your membership has been successfully activated!');
    }
    
    private function getPlanFeatures($planName)
    {
        $features = [
            'ELITE' => [
                'At-center group classes',
                'All ELITE & PRO gyms',
                'At-home live workouts'
            ],
            'PRO' => [
                'All PRO gyms',
                '2 Sessions/month at ELITE gyms & group classes',
                'At-home live workouts'
            ],
            'SELECT' => [
                'One center that you choose',
                'Limited sessions* in other centers & gyms in your city',
                'At-home live workouts'
            ]
        ];
        
        return json_encode($features[strtoupper($planName)] ?? []);
    }
    
    public function showPaymentHistory()
    {
        $user = Auth::user();
        $payments = Payment::where('user_id', $user->id)
                          ->orderBy('payment_date', 'desc')
                          ->get();
                          
        return view('user.payment-history', compact('payments'));
    }
}