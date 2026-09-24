<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::with('images')->paginate(6); // 6 products per page
        $categories = Product::select('category')->distinct()->pluck('category')->toArray();
        return view('shop', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = Product::with('images')->findOrFail($id);
        return view('shop_detail', compact('product'));
    }
}
