<?php



namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Redirect user if not authenticated.
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return '/'; // Redirect to login/registration page
        }
    }
}
