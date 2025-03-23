<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIfAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is logged in and if the role is 'admin'
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // Redirect if the user is not an admin
        return redirect()->route('home')->with('error', 'You do not have access to this page.');
    }
}
