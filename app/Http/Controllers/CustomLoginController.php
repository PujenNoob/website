<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomLoginController extends Controller
{
    public function login(Request $request)
    {
        // Rate limiting for login attempts
        $key = 'login_attempts_' . $request->ip();
        $attempts = cache()->get($key, 0);
        
        if ($attempts >= 5) {
            return back()->withErrors([
                'login_error' => 'Too many login attempts. Please try again later.',
            ]);
        }

        // Validate login form fields
        $credentials = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        // Attempt login
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            
            // Clear login attempts on successful login
            cache()->forget($key);

            // Check if user has verified OTP
            $user = Auth::user();
            
            // Check if user has verified their email/OTP
            if (!$user->email_verified_at) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                
                return redirect()->route('login')
                    ->with('error', 'Please complete your email verification first. Check your email for the OTP code.');
            }

            // Redirect based on user role (Three-phase system)
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Welcome to the admin panel!');
            } else {
                return redirect()->route('home')->with('success', 'Welcome back!');
            }
        }

        // Increment failed login attempts
        cache()->put($key, $attempts + 1, now()->addMinutes(15));

        // If login fails
        return back()->withErrors([
            'login_error' => 'Invalid credentials. Please check your email and password.',
        ])->withInput($request->only('email'));
    }
}
