<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show user dashboard
     */
    public function dashboard()
    {
        $user = auth()->user();
        
        // Get user statistics
        $stats = [
            'total_orders' => $user->orders()->count(),
            'pending_orders' => $user->orders()->where('status', 'pending')->count(),
            'total_spent' => $user->orders()->where('status', 'completed')->sum('total'),
            'recent_orders' => $user->orders()->with('items')->latest()->take(5)->get()
        ];

        // Get featured products
        $featuredProducts = \App\Models\Product::with('images')->latest()->take(6)->get();

        return view('user.dashboard', compact('stats', 'featuredProducts'));
    }

    /**
     * Show user profile
     */
    public function profile()
    {
        $user = auth()->user();
        return view('user.profile', compact('user'));
    }

    /**
     * Update user profile
     */
    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
        ]);

        $user->update($request->only(['name', 'email', 'phone']));

        return redirect()->route('user.profile')->with('success', 'Profile updated successfully!');
    }

    /**
     * Show about page for logged-in users
     */
    public function about()
    {
        return view('user.about');
    }

    /**
     * Show contact page for logged-in users
     */
    public function contact()
    {
        return view('user.contact');
    }

    /**
     * Show blog for logged-in users
     */
    public function blog()
    {
        return view('user.blog');
    }
}
