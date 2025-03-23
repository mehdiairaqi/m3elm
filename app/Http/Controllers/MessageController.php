<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User; // Add this line to import the User model
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index($userId)
    {
        // Get the current authenticated user
        $authUser = auth()->user();

        // Fetch the user who is receiving the message (this can be an expert or a buyer)
        $user = User::findOrFail($userId); // Now we have access to the User model

        // Get messages between the authenticated user and the selected user (buyer/expert)
        $messages = Message::where(function ($query) use ($authUser, $userId) {
            $query->where('sender_id', $authUser->id)
                  ->where('receiver_id', $userId);
        })->orWhere(function ($query) use ($authUser, $userId) {
            $query->where('sender_id', $userId)
                  ->where('receiver_id', $authUser->id);
        })->get();

        // Pass the messages and user data to the view
        return view('messages.index', compact('messages', 'user'));  // Pass $user here
    }

    public function store(Request $request)
    {
        // Store the new message
        $request->validate([
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string|max:1000',
        ]);

        $message = new Message();
        $message->sender_id = auth()->user()->id;
        $message->receiver_id = $request->receiver_id;
        $message->message = $request->message;
        $message->save();

        return redirect()->route('messages.index', ['userId' => $request->receiver_id])->with('status', 'Message sent successfully!');
    }
}
