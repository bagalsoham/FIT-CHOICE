<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPlan;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    // Display the active plan or prompt user to select one
    public function index()
    {
        $user = Auth::user();
        // Get active plan if it exists, otherwise return null
        $activePlan = UserPlan::where('user_id', $user->id)->first();
        
        // Return the active plan view with data
        return view('user.active', compact('activePlan'));
    }

    // Handle the plan subscription
    public function subscribe(Request $request)
    {
        $user = Auth::user();

        // Check if the user already has a plan
        if (UserPlan::where('user_id', $user->id)->exists()) {
            return redirect()->back()->with('error', 'You already have an active plan!');
        }

        // Validate input data
        $request->validate([
            'plan_name' => 'required|string',
            'features' => 'required|array',
        ]);

        // Store the selected plan for the user
        UserPlan::create([
            'user_id' => $user->id,
            'plan_name' => $request->plan_name,
            'features' => json_encode($request->features),
        ]);

        // Redirect back to the active plans page with success message
        return redirect()->route('active')->with('success', 'Plan activated successfully!');
    }
}
