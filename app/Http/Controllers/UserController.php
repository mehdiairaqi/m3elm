<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function switchToExpert()
    {
        $user = Auth::user();
        $user->role = 'expert';  // Change the user's role to expert
        $user->save();

        return redirect()->route('index')->with('success', 'You are now an expert!');
    }

    public function switchToBuyer()
    {
        $user = Auth::user();
        $user->role = 'buyer';  // Change the user's role to buyer
        $user->save();

        return redirect()->route('home')->with('success', 'You are now a buyer!');
    }
}
