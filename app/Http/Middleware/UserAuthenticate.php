<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Check if user is authenticated and has role customer
        if (!Auth::user() || (Auth::user()->role->id !== 2)) {
            return redirect()->route('dashboard');
        }

        return $next($request);
    }
}
