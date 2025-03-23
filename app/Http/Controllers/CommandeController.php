<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;  // Ensure the Commande model is used
use App\Models\User;      // Optional: If you need user data
use App\Models\Service;   // Optional: If you need service data
use Illuminate\Support\Facades\Auth;


class CommandeController extends Controller
{
    // Show a list of all orders (commandes)
    public function index()
    {
        // Get the currently authenticated user ID
        $userId = Auth::id();

        // Retrieve only the commandes belonging to the logged-in user
        $commandes = Commande::where('user_id', $userId)->get();

        // Pass the commandes to the view
        return view('commandes.index', compact('commandes'));
    }

    // Show the form for creating a new order
    public function create()
    {
        // Fetch all services from the database
        $services = Service::all();

        // Pass the services to the 'commandes.create' view
        return view('commandes.create', compact('services'));
    }

    // Store a newly created order in the database
    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',     // Service ID must exist in the services table
            'status' => 'required|in:pending,approved,rejected', // Status must be one of the given values
            'adresse' => 'required|string|max:255',             // Address must be a string with a max length of 255 characters
            'description' => 'required|string',                 // Description must be a string
            'username' => 'required|string|max:255',            // Username must be a string with a max length of 255 characters
        ]);

        // Create the new commande entry in the database
        $commande = new Commande();

        // Assign values to the properties of the $commande instance
        $commande->user_id = Auth::id(); // Automatically set the logged-in user's ID
        $commande->service_id = $request->service_id;
        $commande->status = $request->status;
        $commande->adresse = $request->adresse;
        $commande->description = $request->description;
        $commande->username = $request->username;

        // Save the instance to the database
        $commande->save();

        // Redirect or return success message
        return redirect()->route('commandes.index')->with('status', 'Commande créée avec succès!');
    }

    // Show the form for editing the specified order
    public function edit(Commande $commande)
    {
        return view('commande.edit', compact('commande')); // Return the edit form view with existing commande data
    }

    // Update the specified order in the database
    public function update(Request $request, Commande $commande)
    {
        // Validate the incoming request data
        $request->validate([
            'user_id' => 'required|exists:users,id',           // User ID must exist in the users table
            'service_id' => 'required|exists:services,id',     // Service ID must exist in the services table
            'status' => 'required|in:pending,approved,rejected', // Status must be one of the given values
            'adresse' => 'required|string|max:255',             // Address must be a string with a max length of 255 characters
            'description' => 'required|string',                 // Description must be a string
            'username' => 'required|string|max:255',            // Username must be a string with a max length of 255 characters
        ]);

        // Update the commande with the validated data
        $commande->update([
            'user_id' => $request->user_id,
            'service_id' => $request->service_id,
            'status' => $request->status,
            'adresse' => $request->adresse,
            'description' => $request->description,
            'username' => $request->username,
        ]);

        // Redirect with a success message
        return redirect()->route('commandes.index')->with('status', 'Order updated successfully!');
    }

    // Show the details of the specified order
    public function show($id)
    {
        // Find a commande by its ID and pass it to the show view
        $commande = Commande::findOrFail($id);
        return view('commandes.show', compact('commande'));
    }
    // Remove the specified order from the database
    public function destroy(Commande $commande)
    {
        $commande->delete(); // Delete the commande
        return redirect()->route('commandes.index')->with('status', 'Order deleted successfully!'); // Redirect after delete
    }
}
