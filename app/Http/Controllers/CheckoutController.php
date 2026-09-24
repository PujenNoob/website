<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show checkout page
     */
    public function index()
    {
        $cart = session('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('user.cart')->with('error', 'Your cart is empty.');
        }

        $cartItems = [];
        $subtotal = 0;

        foreach ($cart as $productId => $quantity) {
            $product = Product::with('images')->find($productId);
            if ($product) {
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

        return view('user.checkout', compact('cartItems', 'subtotal'));
    }
}
