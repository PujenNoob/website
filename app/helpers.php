<?php

use App\Helpers\CartHelper;

if (!function_exists('convert_price')) {
    /**
     * Convert price based on current currency
     */
    function convert_price(float $price): float
    {
        return CartHelper::convertPrice($price);
    }
}

if (!function_exists('get_cart_total')) {
    /**
     * Get cart total safely
     */
    function get_cart_total(): float
    {
        return CartHelper::getCartTotal();
    }
}

if (!function_exists('get_cart_count')) {
    /**
     * Get cart item count safely
     */
    function get_cart_count(): int
    {
        return CartHelper::getCartItemCount();
    }
}

if (!function_exists('get_currency_symbol')) {
    /**
     * Get currency symbol based on current currency
     */
    function get_currency_symbol(): string
    {
        $currency = session('currency', 'USD');
        
        $symbols = [
            'USD' => '$',
            'EUR' => '€',
            'GBP' => '£',
            'JPY' => '¥',
        ];
        
        return $symbols[$currency] ?? '$';
    }
}