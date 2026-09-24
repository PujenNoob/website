<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the shopping cart
     */
    public function index()
    {
        $cart = session('cart', []);
        $cartItems = [];
        $subtotal = 0;

        foreach ($cart as $productId => $quantity) {
            $product = Product::with('images')->find($productId);
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
    }

    /**
     * Add item to cart with proper validation
     */
    public function add(Request $request, $productId)
    {
        // Rate limiting for cart operations
        $key = 'cart_operations_' . Auth::id();
        $operations = cache()->get($key, 0);
        
        if ($operations >= 20) { // Max 20 cart operations per minute
            return response()->json(['error' => 'Too many cart operations. Please slow down.'], 429);
        }

        $validator = Validator::make($request->all(), [
            'qty' => 'required|integer|min:1|max:10',
        ]);

        if ($validator->fails()) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }
            return back()->withErrors($validator)->withInput();
        }

        $product = Product::findOrFail($productId);
        $quantity = $request->input('qty', 1);

        // Validate quantity
        if ($quantity < 1 || $quantity > 10) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid quantity. Please select between 1 and 10 items.'
                ], 400);
            }
            return back()->with('error', 'Invalid quantity. Please select between 1 and 10 items.');
        }

        $cart = session('cart', []);
        
        // Check if adding this item would exceed cart limit
        $currentTotal = array_sum($cart);
        if ($currentTotal + $quantity > 50) { // Max 50 items in cart
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cart limit reached. Maximum 50 items allowed.'
                ], 400);
            }
            return back()->with('error', 'Cart limit reached. Maximum 50 items allowed.');
        }

        $cart[$productId] = isset($cart[$productId]) ? $cart[$productId] + $quantity : $quantity;
        session(['cart' => $cart]);

        // Increment cart operations counter
        cache()->put($key, $operations + 1, now()->addMinutes(1));

        // Return JSON response for AJAX requests
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Item added to cart successfully!',
                'cart_count' => array_sum($cart)
            ]);
        }

        return back()->with('success', 'Item added to cart successfully!');
    }

    /**
     * Update cart quantities with proper validation
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:0|max:10',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $quantities = $request->input('quantities', []);
        $cart = [];

        foreach ($quantities as $productId => $qty) {
            // Validate product exists
            $product = Product::find($productId);
            if (!$product) {
                continue;
            }

            $qty = max(0, min(10, (int)$qty)); // Clamp between 0 and 10
            if ($qty > 0) {
                $cart[$productId] = $qty;
            }
        }

        // Check total cart items limit
        if (array_sum($cart) > 50) {
            return back()->with('error', 'Cart limit exceeded. Maximum 50 items allowed.');
        }

        session(['cart' => $cart]);

        if ($request->expectsJson()) {
            $cartItems = [];
            $subtotal = 0;
            foreach ($cart as $productId => $quantity) {
                $product = Product::with('images')->find($productId);
                if ($product) {
                    $total = $product->price * $quantity;
                    $subtotal += $total;
                    $cartItems[] = [
                        'id' => $productId,
                        'quantity' => $quantity,
                        'price' => $product->price,
                        'total' => $total,
                    ];
                }
            }
            return response()->json([
                'cartItems' => $cartItems,
                'subtotal' => $subtotal,
                'total' => $subtotal,
            ]);
        }

        return back()->with('success', 'Cart updated successfully!');
    }

    /**
     * Remove item from cart
     */
    public function remove(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $cart = session('cart', []);
        
        if (!isset($cart[$productId])) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Item not found in cart'
                ], 404);
            }
            return back()->with('error', 'Item not found in cart');
        }
        
        unset($cart[$productId]);
        session(['cart' => $cart]);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Item removed from cart successfully!',
                'cart_count' => array_sum($cart)
            ]);
        }

        return back()->with('success', 'Item removed from cart successfully!');
    }

    /**
     * Clear entire cart
     */
    public function clear()
    {
        session()->forget('cart');
        return back()->with('success', 'Cart cleared successfully!');
    }
}