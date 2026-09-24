<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     * Only allow admin users to access admin routes
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to access the admin area.');
        }

        $user = auth()->user();
        
        // Check if user has a role set
        if (!$user->role) {
            // Set default role for users without role
            $user->role = 'user';
            $user->save();
        }

        if ($user->role !== 'admin') {
            return redirect()->route('home')->with('error', 'You are not authorized to access the admin area.');
        }

        return $next($request);
    }
}
