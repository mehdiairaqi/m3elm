<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    // Show the service (for buyers to view)
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('services.show', compact('service'));
    }

    // Show the form to create a new service (for experts)
    public function create()
    {
        $user = auth()->user();

        // If the expert already has a service, redirect them to edit
        if ($user->service) {
            return redirect()->route('services.edit', $user->service->id);
        }

        return view('services.create');
    }

    // Store the new service (for experts)
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'nullable|numeric',
        ]);

        $service = new Service();
        $service->title = $request->title;
        $service->description = $request->description;
        $service->price = $request->price;
        $service->user_id = auth()->id();
        $service->status = 'available';
        $service->save();

        return redirect()->route('services.show', $service->id)->with('success', 'Service posted successfully!');
    }

    // Show the form to edit an existing service (for experts)
    public function edit(Service $service)
    {
        $this->authorize('update', $service); // Ensure the user is authorized to edit their service
        return view('services.edit', compact('service'));
    }

    // Update the service (for experts)
    public function update(Request $request, Service $service)
    {
        $this->authorize('update', $service); // Ensure the user is authorized to update their service

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'nullable|numeric',
        ]);

        $service->update($request->only('title', 'description', 'price'));

        return redirect()->route('services.show', $service->id)->with('success', 'Service updated successfully!');
    }

    // Delete the service (for experts)
    public function destroy(Service $service)
    {
        $this->authorize('delete', $service); // Ensure the user is authorized to delete their service
        $service->delete();

        return redirect()->route('services.index')->with('success', 'Service deleted successfully!');
    }
}
