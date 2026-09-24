<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    /**
     * Show guest homepage with featured products
     */
    public function home()
    {
        $featuredProducts = Product::with('images')
                                  ->latest()
                                  ->take(8)
                                  ->get();
        
        return view('guest.home', compact('featuredProducts'));
    }

    /**
     * Show products catalog for guests (browse only)
     */
    public function products()
    {
        $products = Product::with('images')->paginate(12);
        return view('guest.products', compact('products'));
    }

    /**
     * Show product details for guests (no add to cart)
     */
    public function productDetail($id)
    {
        $product = Product::with('images')->findOrFail($id);
        $relatedProducts = Product::with('images')
                                 ->where('id', '!=', $id)
                                 ->inRandomOrder()
                                 ->take(4)
                                 ->get();
        
        return view('guest.product-detail', compact('product', 'relatedProducts'));
    }

    /**
     * Show about page for guests
     */
    public function about()
    {
        return view('guest.about');
    }

    /**
     * Show contact page for guests
     */
    public function contact()
    {
        return view('guest.contact');
    }

    /**
     * Show blog for guests
     */
    public function blog()
    {
        return view('guest.blog');
    }
}
