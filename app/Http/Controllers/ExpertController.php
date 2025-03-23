<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use App\Models\Review;
use App\Models\Service;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
    // Show the form to add an expert
    public function create()
    {
        $services = Service::all(); // Fetch all available services
        return view('experts.create', compact('services')); // Pass services to the form
    }

    // Store the expert information
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:experts',
            'service_id' => 'required|exists:services,id', // Ensure the service exists
            'bio' => 'required|string',
        ]);

        // Create a new expert
        Expert::create($validated);

        return redirect()->route('experts.index')->with('status', 'Expert submitted for review.');
    }

    // Show the list of experts for admin to review
    public function index()
    {
        $experts = Expert::where('status', 'pending')->get(); // Get experts with status 'pending'
        return view('experts.index', compact('experts'));
    }

    // Admin review the expert
    public function review(Request $request, $id)
    {
        $expert = Expert::findOrFail($id);

        // Validate the admin review data
        $validated = $request->validate([
            'status' => 'required|in:approved,rejected',
            'review' => 'required|string',
            'rating' => 'required|integer|between:1,5',
        ]);

        // Update expert status
        $expert->status = $validated['status'];
        $expert->save();

        // Store the review
        Review::create([
            'expert_id' => $expert->id,
            'review' => $validated['review'],
            'rating' => $validated['rating'],
        ]);

        return redirect()->route('experts.index')->with('status', 'Expert reviewed successfully.');
    }
}
