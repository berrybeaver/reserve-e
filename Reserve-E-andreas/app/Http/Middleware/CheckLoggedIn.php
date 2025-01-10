<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckLoggedIn
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('loggedin') || Session::get('loggedin') !== true) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
            return redirect('/login')->with('error', 'You must be logged in to access this page.');
        }
        return $next($request);
    }
}
