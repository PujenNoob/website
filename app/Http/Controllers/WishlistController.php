<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the user's wishlist.
     */
    public function index()
    {
        $wishlistItems = Auth::user()->wishlistProducts()->with('images')->paginate(12);
        
        return view('wishlist', compact('wishlistItems'));
    }

    /**
     * Add a product to wishlist.
     */
    public function add(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $user = Auth::user();

        // Check if product is already in wishlist
        if ($user->hasInWishlist($productId)) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Product is already in your wishlist.'
                ], 400);
            }
            return back()->with('error', 'Product is already in your wishlist.');
        }

        // Add to wishlist
        Wishlist::create([
            'user_id' => $user->id,
            'product_id' => $productId,
        ]);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Product added to wishlist successfully!'
            ]);
        }

        return back()->with('success', 'Product added to wishlist successfully!');
    }

    /**
     * Remove a product from wishlist.
     */
    public function remove(Request $request, $productId)
    {
        $user = Auth::user();
        
        $wishlistItem = $user->wishlists()->where('product_id', $productId)->first();
        
        if (!$wishlistItem) {
            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Product not found in wishlist.'
                ], 404);
            }
            return back()->with('error', 'Product not found in wishlist.');
        }

        $wishlistItem->delete();

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Product removed from wishlist successfully!'
            ]);
        }

        return back()->with('success', 'Product removed from wishlist successfully!');
    }

    /**
     * Toggle wishlist status (add if not exists, remove if exists).
     */
    public function toggle(Request $request, $productId)
    {
        $user = Auth::user();
        
        if ($user->hasInWishlist($productId)) {
            return $this->remove($request, $productId);
        } else {
            return $this->add($request, $productId);
        }
    }

    /**
     * Clear all items from wishlist.
     */
    public function clear(Request $request)
    {
        $user = Auth::user();
        $user->wishlists()->delete();

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Wishlist cleared successfully!'
            ]);
        }

        return back()->with('success', 'Wishlist cleared successfully!');
    }

    /**
     * Get wishlist count for AJAX requests.
     */
    public function count()
    {
        $count = Auth::user()->wishlists()->count();
        
        return response()->json([
            'count' => $count
        ]);
    }
}
