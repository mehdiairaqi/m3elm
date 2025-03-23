<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class navcontroller extends Controller
{
    public function index(Request $request)
    {
        return view('partials.nav');
       
    }

}
