<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterOtpController;
use App\Http\Controllers\OtpVerifyController;
use App\Http\Controllers\CustomLoginController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| PHASE 1: GUEST/VISITOR ROUTES (Just for Looking)
|--------------------------------------------------------------------------
| These routes are for visitors who want to browse without logging in
*/

// Main landing page - index page
Route::get('/', function () {
    $products = \App\Models\Product::with('images')->latest()->take(8)->get();
    return view('index', compact('products'));
})->name('home');

// Public pages (no authentication required)
Route::get('/shop', function () {
    $products = \App\Models\Product::with('images')->paginate(12);
    return view('shop', compact('products'));
})->name('shop');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

Route::get('/contact', function () {
    return view('contacts');
})->name('contacts');

// Public shopping cart route (redirects to login if not authenticated)
Route::get('/shopping-cart', function () {
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Please login to view your cart.');
    }
    
    $cart = session('cart', []);
    $cartItems = [];
    $subtotal = 0;

    foreach ($cart as $productId => $quantity) {
        $product = \App\Models\Product::with('images')->find($productId);
        if ($product && $quantity > 0) {
            $total = $product->price * $quantity;
            $subtotal += $total;
            $cartItems[] = [
                'id' => $productId,
                'product' => $product,
                'quantity' => $quantity,
                'total' => $total,
            ];
        }
    }

    return view('shopping-cart', compact('cartItems', 'subtotal'));
})->name('shopping-cart');

// Public checkout route (redirects to login if not authenticated)
Route::get('/checkout', function () {
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Please login to proceed to checkout.');
    }
    
    $cart = session('cart', []);
    if (empty($cart)) {
        return redirect()->route('shopping-cart')->with('error', 'Your cart is empty.');
    }
    
    $cartItems = [];
    $subtotal = 0;
    foreach ($cart as $productId => $quantity) {
        $product = \App\Models\Product::with('images')->find($productId);
        if ($product && $quantity > 0) {
            $total = $product->price * $quantity;
            $subtotal += $total;
            $cartItems[] = [
                'id' => $productId,
                'product' => $product,
                'quantity' => $quantity,
                'total' => $total,
            ];
        }
    }
    return view('checkout', compact('cartItems', 'subtotal'));
})->name('checkout');

// Public wishlist route (redirects to login if not authenticated)
Route::get('/wishlist', function () {
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Please login to view your wishlist.');
    }
    
    $wishlistItems = auth()->user()->wishlistProducts()->with('images')->paginate(12);
    
    // Debug: Log wishlist items and their images
    \Log::info('Wishlist items count: ' . $wishlistItems->count());
    foreach ($wishlistItems as $item) {
        \Log::info('Product: ' . $item->name . ', Images count: ' . $item->images->count());
        if ($item->images->count() > 0) {
            \Log::info('First image path: ' . $item->images->first()->path);
        }
    }
    
    return view('wishlist', compact('wishlistItems'));
})->name('wishlist');

// Public wishlist toggle route (redirects to login if not authenticated)
Route::post('/wishlist/toggle/{product}', function (Request $request, $productId) {
    if (!auth()->check()) {
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => false,
                'message' => 'Please login to use wishlist.',
                'redirect' => route('login')
            ], 401);
        }
        return redirect()->route('login')->with('error', 'Please login to use wishlist.');
    }
    
    return app(\App\Http\Controllers\WishlistController::class)->toggle($request, $productId);
})->name('wishlist.toggle');

// Public wishlist count route (redirects to login if not authenticated)
Route::get('/wishlist/count', function (Request $request) {
    if (!auth()->check()) {
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json(['count' => 0]);
        }
        return redirect()->route('login');
    }
    
    return app(\App\Http\Controllers\WishlistController::class)->count();
})->name('wishlist.count');

// Currency change route
Route::post('/currency/change', function (Request $request) {
    $request->validate([
        'currency' => 'required|in:USD,EUR,GBP,JPY'
    ]);
    $request->session()->put('currency', $request->currency);
    return redirect()->back();
})->name('currency.change');

// Logout route
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

// Test route for mobile menu debugging
Route::get('/test-mobile-menu', function () {
    return view('test-mobile-menu');
})->name('test.mobile.menu');

// Guest home page (alternative landing page)
Route::get('/guest-home', [App\Http\Controllers\GuestController::class, 'home'])->name('guest.home');

// Guest browsing routes (no authentication required)
Route::prefix('browse')->name('guest.')->group(function () {
    Route::get('/products', [App\Http\Controllers\GuestController::class, 'products'])->name('products');
    Route::get('/product/{id}', [App\Http\Controllers\GuestController::class, 'productDetail'])->name('product.detail');
    Route::get('/about', [App\Http\Controllers\GuestController::class, 'about'])->name('about');
    Route::get('/contact', [App\Http\Controllers\GuestController::class, 'contact'])->name('contact');
    Route::get('/blog', [App\Http\Controllers\GuestController::class, 'blog'])->name('blog');
});

// Authentication routes
Route::get('/login', function () {
    if (auth()->check()) {
        return redirect()->route('home');
    }
    return view('auth.join');
})->name('login');

// ✅ Register (POST)
Route::post('/register', [RegisterOtpController::class, 'register'])->name('register');

// ✅ Show OTP verification form
Route::get('/verify-otp', [OtpVerifyController::class, 'show'])->name('otp.verify.show');

// ✅ Verify OTP (POST)
Route::post('/verify-otp', [OtpVerifyController::class, 'verify'])->name('otp.verify');

// ✅ Resend OTP (POST)
Route::post('/resend-otp', [RegisterOtpController::class, 'resendOtp'])->name('otp.resend');

// Email uniqueness check
Route::post('/check-email', [RegisterOtpController::class, 'checkEmail'])->name('check.email');

// ✅ Login (POST)
Route::post('/login', [CustomLoginController::class, 'login'])->name('custom.login');

/*
|--------------------------------------------------------------------------
| PHASE 2: LOGGED-IN USER ROUTES (Shopping & Account)
|--------------------------------------------------------------------------
| These routes are for authenticated users who can shop and manage their account
*/

Route::middleware(['auth', 'user'])->prefix('user')->name('user.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])->name('dashboard');
    
    // Shopping routes
    Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop');
    Route::get('/shop/{id}', [App\Http\Controllers\ShopController::class, 'show'])->name('shop.detail');
    
    // Account management
    Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
    Route::get('/profile/show', [App\Http\Controllers\UserController::class, 'profile'])->name('profile.show');
    Route::put('/profile', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('profile.update');
    
    // Order management for users
    Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orders');
    Route::get('/order/{order}', [App\Http\Controllers\OrderController::class, 'show'])->name('order.show');
    Route::post('/order/{order}/cancel', [App\Http\Controllers\OrderController::class, 'cancel'])->name('order.cancel');
    
    // Shopping cart routes
    Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
    Route::post('/cart/add/{product}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{product}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
    
    // Wishlist routes (GET and toggle handled by public routes)
    Route::post('/wishlist/add/{product}', [App\Http\Controllers\WishlistController::class, 'add'])->name('wishlist.add');
    Route::delete('/wishlist/remove/{productId}', [App\Http\Controllers\WishlistController::class, 'remove'])->name('wishlist.remove');
    Route::delete('/wishlist/clear', [App\Http\Controllers\WishlistController::class, 'clear'])->name('wishlist.clear');
    
    // Checkout (POST only - GET handled by public route)
    Route::post('/checkout', [App\Http\Controllers\OrderController::class, 'store'])->name('checkout.process');
    Route::get('/order/success/{order}', [App\Http\Controllers\OrderController::class, 'success'])->name('order.success');
    
    // Other user pages
    Route::get('/about', [App\Http\Controllers\UserController::class, 'about'])->name('about');
    Route::get('/contact', [App\Http\Controllers\UserController::class, 'contact'])->name('contact');
    Route::get('/blog', [App\Http\Controllers\UserController::class, 'blog'])->name('blog');
});

/*
|--------------------------------------------------------------------------
| PHASE 3: ADMIN ROUTES (Management & Analytics)
|--------------------------------------------------------------------------
| These routes are for admin users who can manage the entire system
*/

Route::middleware(['auth', 'admin', 'two_factor'])->prefix('admin')->name('admin.')->group(function () {
    // Admin dashboard
    Route::get('/', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
    
    // User Management
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
    Route::post('users/bulk-action', [App\Http\Controllers\Admin\UserController::class, 'bulkAction'])->name('users.bulk-action');
    
    // Product Management  
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::delete('products/{product}/images/{image}', [App\Http\Controllers\Admin\ProductController::class, 'removeImage'])->name('products.images.destroy');
    
    // Order Management
    Route::resource('orders', App\Http\Controllers\Admin\OrderController::class)->only(['index', 'show', 'destroy']);
    Route::post('orders/{order}/status', [App\Http\Controllers\Admin\OrderController::class, 'updateStatus'])->name('orders.update-status');
    
    // Settings
    Route::get('/settings', [App\Http\Controllers\Admin\SettingsController::class, 'index'])->name('settings.index');
    Route::post('/settings/general', [App\Http\Controllers\Admin\SettingsController::class, 'updateGeneral'])->name('settings.general.update');
    Route::post('/settings/email', [App\Http\Controllers\Admin\SettingsController::class, 'updateEmail'])->name('settings.email.update');
    Route::post('/settings/payment', [App\Http\Controllers\Admin\SettingsController::class, 'updatePayment'])->name('settings.payment.update');
    Route::post('/settings/system', [App\Http\Controllers\Admin\SettingsController::class, 'updateSystem'])->name('settings.system.update');
    Route::post('/settings/clear-cache', [App\Http\Controllers\Admin\SettingsController::class, 'clearCache'])->name('settings.clear-cache');
    
    
    // Analytics & Reports
    Route::get('/analytics', [App\Http\Controllers\AdminController::class, 'analytics'])->name('analytics');
    Route::get('/reports', [App\Http\Controllers\AdminController::class, 'reports'])->name('reports');
    
    // Admin Profile Management
    Route::get('/profile', [App\Http\Controllers\Admin\AdminProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [App\Http\Controllers\Admin\AdminProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [App\Http\Controllers\Admin\AdminProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/avatar', [App\Http\Controllers\Admin\AdminProfileController::class, 'updateAvatar'])->name('profile.avatar.update');
    Route::delete('/profile/avatar', [App\Http\Controllers\Admin\AdminProfileController::class, 'deleteAvatar'])->name('profile.avatar.delete');
    Route::get('/profile/security', [App\Http\Controllers\Admin\AdminProfileController::class, 'security'])->name('profile.security');
    Route::post('/profile/change-password', [App\Http\Controllers\Admin\AdminProfileController::class, 'changePassword'])->name('profile.change-password');
    
    // Notifications
    Route::get('/notifications', [App\Http\Controllers\Admin\NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/mark-read', [App\Http\Controllers\Admin\NotificationController::class, 'markAsRead'])->name('notifications.mark-read');
    Route::post('/notifications/mark-all-read', [App\Http\Controllers\Admin\NotificationController::class, 'markAllAsRead'])->name('notifications.mark-all-read');
    Route::delete('/notifications/{notification}', [App\Http\Controllers\Admin\NotificationController::class, 'destroy'])->name('notifications.destroy');
    
    // Two-Factor Authentication
    Route::get('/two-factor', [App\Http\Controllers\Admin\TwoFactorController::class, 'show'])->name('two-factor.show');
    Route::get('/two-factor/verify', [App\Http\Controllers\Admin\TwoFactorController::class, 'showVerify'])->name('two-factor.verify');
    Route::post('/two-factor/generate-secret', [App\Http\Controllers\Admin\TwoFactorController::class, 'generateSecret'])->name('two-factor.generate-secret');
    Route::post('/two-factor/enable', [App\Http\Controllers\Admin\TwoFactorController::class, 'enable'])->name('two-factor.enable');
    Route::post('/two-factor/disable', [App\Http\Controllers\Admin\TwoFactorController::class, 'disable'])->name('two-factor.disable');
    Route::post('/two-factor/regenerate-recovery-codes', [App\Http\Controllers\Admin\TwoFactorController::class, 'regenerateRecoveryCodes'])->name('two-factor.regenerate-recovery-codes');
    Route::post('/two-factor/verify', [App\Http\Controllers\Admin\TwoFactorController::class, 'verify'])->name('two-factor.verify');
    
});

/*
|--------------------------------------------------------------------------
| LEGACY ROUTES (Backward Compatibility) - SECURE VERSION
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    // Legacy routes that redirect to appropriate phase
    Route::get('/index', function () {
        $products = \App\Models\Product::with('images')->latest()->take(8)->get();
        return view('index', compact('products'));
    })->name('index');

    Route::get('/about', function () {
        return view('about');
    })->name('about');

    Route::get('/shop', [App\Http\Controllers\ShopController::class, 'index'])->name('shop');
    
    Route::get('/contacts', function () {
        return view('contacts');
    })->name('contacts');

    Route::get('/blog', function () {
        return view('blog');
    })->name('blog');

    Route::get('/shop-detail/{id}', [App\Http\Controllers\ShopController::class, 'show'])->name('shop_detail');

    // Secure cart routes using CartController (GET handled by public route)
    Route::post('/cart/add/{product}', [App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{product}', [App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [App\Http\Controllers\CartController::class, 'clear'])->name('cart.clear');

    // Checkout route moved to authenticated section
    
    // Legacy admin route (redirect to new dashboard)
    Route::get('/admin', function() {
        return redirect()->route('admin.dashboard');
    })->name('admin');

    // Secure currency change with validation
    Route::post('/currency/change', function (\Illuminate\Http\Request $request) {
        $request->validate([
            'currency' => 'required|in:USD,EUR,GBP,JPY'
        ]);
        
        $currency = $request->input('currency');
        session(['currency' => $currency]);
        return back()->with('success', 'Currency changed successfully!');
    })->name('currency.change');

    // Order Routes
    Route::post('/order/store', [App\Http\Controllers\OrderController::class, 'store'])->name('order.store');
    Route::get('/order/success/{order}', [App\Http\Controllers\OrderController::class, 'success'])->name('order.success');
    Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('order.index');
    Route::get('/order/{order}', [App\Http\Controllers\OrderController::class, 'show'])->name('order.show');
    Route::post('/order/{order}/cancel', [App\Http\Controllers\OrderController::class, 'cancel'])->name('order.cancel');

    // User Profile Routes (UserProfileController)
    Route::get('/profile', [App\Http\Controllers\UserProfileController::class, 'show'])->name('user.profile.show');
    Route::get('/profile/edit', [App\Http\Controllers\UserProfileController::class, 'edit'])->name('user.profile.edit');
    Route::put('/profile', [App\Http\Controllers\UserProfileController::class, 'update'])->name('user.profile.update');
    Route::put('/profile/address', [App\Http\Controllers\UserProfileController::class, 'updateAddress'])->name('user.profile.address.update');
    Route::delete('/profile/avatar', [App\Http\Controllers\UserProfileController::class, 'deleteAvatar'])->name('user.profile.avatar.delete');

    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('home');
    })->name('logout');
});

/*
|--------------------------------------------------------------------------
| Password Reset Routes
|--------------------------------------------------------------------------
*/

Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

/*
|--------------------------------------------------------------------------
| Storage/Image Serving Routes
|--------------------------------------------------------------------------
*/

// Secure file serving route with proper validation
Route::get('/storage/{path}', function ($path) {
    // Validate path to prevent directory traversal
    $path = str_replace(['../', '..\\', '..'], '', $path);
    $path = ltrim($path, '/\\');
    
    // Only allow specific file types
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg', 'pdf', 'doc', 'docx'];
    $extension = strtolower(pathinfo($path, PATHINFO_EXTENSION));
    
    if (!in_array($extension, $allowedExtensions)) {
        abort(403, 'File type not allowed');
    }
    
    // Check file size (max 10MB)
    $filePath = storage_path('app/public/' . $path);
    
    if (!file_exists($filePath)) {
        abort(404);
    }
    
    if (filesize($filePath) > 10 * 1024 * 1024) { // 10MB limit
        abort(413, 'File too large');
    }
    
    // Set proper headers for security
    $response = response()->file($filePath);
    $response->headers->set('X-Content-Type-Options', 'nosniff');
    $response->headers->set('X-Frame-Options', 'DENY');
    $response->headers->set('X-XSS-Protection', '1; mode=block');
    
    return $response;
})->where('path', '[a-zA-Z0-9\/\-_\.]+')->name('storage.local');


