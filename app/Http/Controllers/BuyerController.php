<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function index()
{
    $listings = Listing::where('status', 'available')->get();
    return view('buyer.dashboard', compact('listings'));
}

}
