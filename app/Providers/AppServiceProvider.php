<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $cart = session('cart', []);
            $total = 0;
            foreach ($cart as $productId => $quantity) {
                $product = \App\Models\Product::find($productId);
                if ($product) {
                    $total += $product->price * $quantity;
                }
            }
            $view->with('cartTotal', $total);
        });

        if (!function_exists('convert_price')) {
            function convert_price($amount, $currency = null) {
                $currency = $currency ?: session('currency', 'USD');
                $rate = 1;
                if ($currency === 'EUR') {
                    $rate = 0.9; // Example rate
                }
                return $amount * $rate;
            }
        }
    }
}
