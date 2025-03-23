<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class plombier extends Controller
{
    public function index(Request $request)
    {
        $servicename = "plombier";
        return view('plombier', compact('servicename'));

    }

};
