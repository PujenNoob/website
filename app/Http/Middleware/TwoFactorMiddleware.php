<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TwoFactorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Skip 2FA check for guests or if user doesn't have 2FA enabled
        if (!$user || !$user->hasTwoFactorEnabled()) {
            return $next($request);
        }

        // Skip 2FA check for 2FA-related routes
        if ($request->routeIs('admin.two-factor.*') || 
            $request->routeIs('admin.profile.security') ||
            $request->routeIs('logout')) {
            return $next($request);
        }

        // Check if 2FA has been verified in this session
        if (!$request->session()->has('two_factor_verified')) {
            return redirect()->route('admin.two-factor.verify')
                ->with('error', 'Please verify your two-factor authentication code to continue.');
        }

        return $next($request);
    }
}