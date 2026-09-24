<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Otp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use App\Mail\SendOtpMail;
use Illuminate\Support\Facades\Session;

class RegisterOtpController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8'
        ], [
            'email.unique' => 'This email is already registered. Please use a different email or sign in with your existing account.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'name.required' => 'Please enter your full name.',
            'password.required' => 'Please enter a password.',
            'password.confirmed' => 'Password confirmation does not match.',
            'password.min' => 'Password must be at least 8 characters long.'
        ]);

        try {
            // Store user temporarily in session (not DB yet)
            $otp = rand(100000, 999999);

            Session::put('otp_user', [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            Session::put('otp_code', $otp);
            Session::put('otp_expires', now()->addMinutes(5));

            // Log OTP for debugging
            \Log::info('OTP Generated: ' . $otp . ' for email: ' . $request->email);

            // Send OTP email
            Mail::to($request->email)->send(new SendOtpMail($otp));

            // Always show OTP in development mode for testing
            if (config('app.debug')) {
                return redirect()->route('otp.verify.show')
                    ->with('status', 'OTP sent to your email.')
                    ->with('debug_otp', $otp)
                    ->with('debug_message', 'Development Mode: OTP is ' . $otp);
            }

            return redirect()->route('otp.verify.show')->with('status', 'OTP sent to your email.');
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('OTP Registration Error: ' . $e->getMessage());
            \Log::error('OTP Registration Stack Trace: ' . $e->getTraceAsString());
            
            // For development, show the OTP even if email fails
            if (config('app.debug')) {
                return redirect()->route('otp.verify.show')
                    ->with('status', 'OTP sent to your email.')
                    ->with('debug_otp', $otp)
                    ->with('debug_message', 'Development Mode: OTP is ' . $otp)
                    ->with('warning', 'Email sending failed, but OTP is: ' . $otp);
            }
            
            return back()->withErrors(['email' => 'Failed to send OTP. Please try again. Error: ' . $e->getMessage()]);
        }
    }

    public function resendOtp(Request $request)
    {
        if (!Session::has('otp_user')) {
            return redirect()->route('login')->withErrors(['message' => 'Session expired. Please register again.']);
        }

        try {
            $userData = Session::get('otp_user');
            $otp = rand(100000, 999999);

            Session::put('otp_code', $otp);
            Session::put('otp_expires', now()->addMinutes(5));

            // Log OTP for debugging
            \Log::info('OTP Resent: ' . $otp . ' for email: ' . $userData['email']);

            Mail::to($userData['email'])->send(new SendOtpMail($otp));

            // Always show OTP in development mode for testing
            if (config('app.debug')) {
                return back()->with('status', 'OTP resent to your email.')
                    ->with('debug_otp', $otp)
                    ->with('debug_message', 'Development Mode: New OTP is ' . $otp);
            }

            return back()->with('status', 'OTP resent to your email.');
        } catch (\Exception $e) {
            \Log::error('OTP Resend Error: ' . $e->getMessage());
            \Log::error('OTP Resend Stack Trace: ' . $e->getTraceAsString());
            
            // For development, show the OTP even if email fails
            if (config('app.debug')) {
                return back()->with('status', 'OTP resent to your email.')
                    ->with('debug_otp', $otp)
                    ->with('debug_message', 'Development Mode: New OTP is ' . $otp)
                    ->with('warning', 'Email sending failed, but OTP is: ' . $otp);
            }
            
            return back()->withErrors(['message' => 'Failed to resend OTP. Please try again. Error: ' . $e->getMessage()]);
        }
    }

    /**
     * Check if email already exists in the database.
     */
    public function checkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $email = $request->email;
        $exists = User::where('email', $email)->exists();

        return response()->json([
            'exists' => $exists,
            'message' => $exists ? 'Email already registered' : 'Email available'
        ]);
    }
}
