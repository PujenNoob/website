<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Otp;

class AdminController extends Controller
{
    public function __construct()
    {
        // Apply auth middleware to all methods
        $this->middleware('auth');
        
        // Apply admin role check middleware
        $this->middleware(function ($request, $next) {
            if (!auth()->user() || auth()->user()->role !== 'admin') {
                return redirect()->route('home')->with('error', 'You are not authorized to access the admin panel.');
            }
            return $next($request);
        });
    }

    public function dashboard()
    {
        $stats = [
            'total_users' => User::count(),
            'total_products' => Product::count(),
            'total_orders' => Order::count(),
            'total_revenue' => Order::where('status', '!=', 'cancelled')->sum('total'),
            'recent_users' => User::latest()->take(5)->get(),
            'recent_products' => Product::with('images')->latest()->take(5)->get(),
            'recent_orders' => Order::with('user')->latest()->take(5)->get(),
        ];

        return view('admin.dashboard', compact('stats'));
    }

    public function analytics()
    {
        $analytics = [
            'user_growth' => User::selectRaw('DATE(created_at) as date, COUNT(*) as count')
                ->where('created_at', '>=', now()->subDays(30))
                ->groupBy('date')
                ->orderBy('date')
                ->get(),
            'order_growth' => Order::selectRaw('DATE(created_at) as date, COUNT(*) as count')
                ->where('created_at', '>=', now()->subDays(30))
                ->groupBy('date')
                ->orderBy('date')
                ->get(),
            'revenue_growth' => Order::selectRaw('DATE(created_at) as date, SUM(total) as revenue')
                ->where('created_at', '>=', now()->subDays(30))
                ->where('status', '!=', 'cancelled')
                ->groupBy('date')
                ->orderBy('date')
                ->get(),
            'top_products' => Product::withCount('orderItems')
                ->orderBy('order_items_count', 'desc')
                ->take(10)
                ->get(),
            'user_registrations' => User::where('created_at', '>=', now()->subDays(7))->count(),
            'orders_this_week' => Order::where('created_at', '>=', now()->subDays(7))->count(),
            'revenue_this_week' => Order::where('created_at', '>=', now()->subDays(7))
                ->where('status', '!=', 'cancelled')
                ->sum('total'),
        ];

        return view('admin.analytics', compact('analytics'));
    }

    public function reports()
    {
        $reports = [
            'sales_report' => Order::with('user')
                ->where('status', '!=', 'cancelled')
                ->orderBy('created_at', 'desc')
                ->paginate(20),
            'user_report' => User::withCount('orders')
                ->orderBy('orders_count', 'desc')
                ->paginate(20),
            'product_report' => Product::withCount('orderItems')
                ->with('images')
                ->orderBy('order_items_count', 'desc')
                ->paginate(20),
            'monthly_sales' => Order::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total) as total')
                ->where('status', '!=', 'cancelled')
                ->groupBy('year', 'month')
                ->orderBy('year', 'desc')
                ->orderBy('month', 'desc')
                ->get(),
        ];

        return view('admin.reports', compact('reports'));
    }
} 