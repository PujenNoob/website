<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     * Only allow authenticated users (not admins) to access user routes
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to access this area.');
        }

        $user = auth()->user();
        
        // Check if user has a role set
        if (!$user->role) {
            // Set default role for users without role
            $user->role = 'user';
            $user->save();
        }

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard')->with('info', 'Admins should use the admin panel.');
        }

        return $next($request);
    }
}
