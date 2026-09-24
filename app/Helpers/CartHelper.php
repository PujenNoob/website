<?php

namespace App\Helpers;

use App\Models\Product;

class CartHelper
{
    /**
     * Calculate cart total safely
     */
    public static function getCartTotal(): float
    {
        $cart = session('cart', []);
        $total = 0;

        foreach ($cart as $productId => $quantity) {
            if (!is_numeric($productId) || !is_numeric($quantity)) {
                continue;
            }

            $product = Product::find($productId);
            if ($product && $quantity > 0) {
                $total += $product->price * $quantity;
            }
        }

        return $total;
    }

    /**
     * Get cart item count safely
     */
    public static function getCartItemCount(): int
    {
        $cart = session('cart', []);
        $count = 0;

        foreach ($cart as $productId => $quantity) {
            if (!is_numeric($productId) || !is_numeric($quantity)) {
                continue;
            }

            $product = Product::find($productId);
            if ($product && $quantity > 0) {
                $count += $quantity;
            }
        }

        return $count;
    }

    /**
     * Validate cart data
     */
    public static function validateCart(): array
    {
        $cart = session('cart', []);
        $validCart = [];

        foreach ($cart as $productId => $quantity) {
            if (!is_numeric($productId) || !is_numeric($quantity)) {
                continue;
            }

            $product = Product::find($productId);
            if ($product && $quantity > 0 && $quantity <= 10) {
                $validCart[$productId] = $quantity;
            }
        }

        // Update session with validated cart
        session(['cart' => $validCart]);

        return $validCart;
    }

    /**
     * Convert price based on currency
     */
    public static function convertPrice(float $price): float
    {
        $currency = session('currency', 'USD');
        
        // Exchange rates (example rates - in production, use real-time rates)
        $rates = [
            'USD' => 1.0,    // Base currency
            'EUR' => 0.85,   // 1 USD = 0.85 EUR
            'GBP' => 0.73,   // 1 USD = 0.73 GBP
            'JPY' => 110.0,  // 1 USD = 110 JPY
        ];
        
        $rate = $rates[$currency] ?? 1.0;
        return $price * $rate;
    }
}
