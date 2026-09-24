<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Services\TwoFactorService;

class TwoFactorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function show()
    {
        $user = Auth::user();
        return view('admin.profile.two-factor', compact('user'));
    }

    public function generateSecret()
    {
        $user = Auth::user();
        
        if ($user->hasTwoFactorEnabled()) {
            return response()->json([
                'error' => 'Two-factor authentication is already enabled'
            ], 400);
        }

        $secret = $user->generateTwoFactorSecret();
        $user->update(['two_factor_secret' => $secret]);

        $service = new TwoFactorService();
        $qrCodeUrl = $service->getQRCodeUrl(
            $secret,
            $user->email,
            config('app.name')
        );

        return response()->json([
            'secret' => $secret,
            'qr_code_url' => $qrCodeUrl,
            'manual_entry_key' => $secret
        ]);
    }

    public function enable(Request $request)
    {
        $request->validate([
            'code' => 'required|string|size:6'
        ]);

        $user = Auth::user();
        
        if ($user->hasTwoFactorEnabled()) {
            return response()->json([
                'error' => 'Two-factor authentication is already enabled'
            ], 400);
        }

        if ($user->enableTwoFactor($user->two_factor_secret, $request->code)) {
            return response()->json([
                'success' => true,
                'message' => 'Two-factor authentication has been enabled successfully!',
                'recovery_codes' => $user->fresh()->two_factor_recovery_codes
            ]);
        }

        return response()->json([
            'error' => 'Invalid verification code. Please try again.'
        ], 400);
    }

    public function disable(Request $request)
    {
        $request->validate([
            'password' => 'required|string'
        ]);

        $user = Auth::user();

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'error' => 'Invalid password'
            ], 400);
        }

        $user->disableTwoFactor();

        return response()->json([
            'success' => true,
            'message' => 'Two-factor authentication has been disabled successfully!'
        ]);
    }

    public function regenerateRecoveryCodes(Request $request)
    {
        $request->validate([
            'password' => 'required|string'
        ]);

        $user = Auth::user();

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'error' => 'Invalid password'
            ], 400);
        }

        if (!$user->hasTwoFactorEnabled()) {
            return response()->json([
                'error' => 'Two-factor authentication is not enabled'
            ], 400);
        }

        $user->update([
            'two_factor_recovery_codes' => $user->generateRecoveryCodes()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Recovery codes have been regenerated successfully!',
            'recovery_codes' => $user->fresh()->two_factor_recovery_codes
        ]);
    }

    public function verify(Request $request)
    {
        $user = Auth::user();

        if (!$user->hasTwoFactorEnabled()) {
            return response()->json([
                'error' => 'Two-factor authentication is not enabled'
            ], 400);
        }

        // Check if it's a recovery code
        if ($request->has('recovery_code')) {
            $request->validate([
                'recovery_code' => 'required|string|size:8'
            ]);

            if ($user->useRecoveryCode($request->recovery_code)) {
                // Set session flag for 2FA verification
                session(['two_factor_verified' => true]);
                
                return response()->json([
                    'success' => true,
                    'message' => 'Recovery code verified successfully!'
                ]);
            }

            return response()->json([
                'error' => 'Invalid recovery code'
            ], 400);
        }

        // Regular 2FA code verification
        $request->validate([
            'code' => 'required|string|size:6'
        ]);

        if ($user->verifyTwoFactorCode($request->code)) {
            // Set session flag for 2FA verification
            session(['two_factor_verified' => true]);
            
            return response()->json([
                'success' => true,
                'message' => 'Code verified successfully!'
            ]);
        }

        return response()->json([
            'error' => 'Invalid verification code'
        ], 400);
    }

    public function showVerify()
    {
        $user = Auth::user();
        
        if (!$user->hasTwoFactorEnabled()) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.profile.two-factor-verify');
    }
}