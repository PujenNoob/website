<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        // Vercel terminates TLS at the proxy; force https URL generation.
        if (! $this->app->environment('local') 
            || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https'
            || isset($_ENV['VERCEL']) || isset($_SERVER['VERCEL'])) {
            URL::forceScheme('https');
        }

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
