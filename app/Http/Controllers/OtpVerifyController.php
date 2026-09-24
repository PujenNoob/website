<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OtpVerifyController extends Controller
{
    public function show()
    {
        if (!Session::has('otp_user')) {
            return redirect()->route('login')->withErrors(['message' => 'Session expired. Please register again.']);
        }

        return view('auth.verify-otp');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6'
        ]);

        // Check if OTP session exists
        if (!Session::has('otp_user') || !Session::has('otp_code') || !Session::has('otp_expires')) {
            return redirect()->route('login')->withErrors(['message' => 'Session expired. Please register again.']);
        }

        $storedOtp = Session::get('otp_code');
        $expiresAt = Session::get('otp_expires');

        // Check if OTP has expired
        if (now()->gt($expiresAt)) {
            Session::forget(['otp_user', 'otp_code', 'otp_expires']);
            return redirect()->route('login')->withErrors(['message' => 'OTP expired. Please register again.']);
        }

        // Verify OTP
        if ($request->otp != $storedOtp) {
            return back()->withErrors(['message' => 'Invalid OTP. Please try again.']);
        }

        try {
            // Create user finally and login
            $userData = Session::get('otp_user');
            $userData['email_verified_at'] = now(); // Mark email as verified since OTP was verified
            $userData['role'] = 'user'; // Set default role for new users
            $user = User::create($userData);

            Auth::login($user);

            // Clear OTP session data
            Session::forget(['otp_user', 'otp_code', 'otp_expires']);

            // Redirect to user dashboard (new users are always regular users)
            return redirect()->route('home')->with('success', 'Welcome to Male Fashion! Your account has been created successfully.');
        } catch (\Exception $e) {
            \Log::error('OTP Verification Error: ' . $e->getMessage());
            return back()->withErrors(['message' => 'Failed to create account. Please try again.']);
        }
    }
}
