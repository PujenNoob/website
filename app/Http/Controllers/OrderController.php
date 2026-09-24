<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Process checkout and create order
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'billing_first_name' => 'required|string|max:255',
            'billing_last_name' => 'required|string|max:255',
            'billing_email' => 'required|email|max:255',
            'billing_phone' => 'required|string|max:20',
            'billing_address' => 'required|string|max:500',
            'billing_city' => 'required|string|max:100',
            'billing_state' => 'required|string|max:100',
            'billing_country' => 'required|string|max:100',
            'billing_zip' => 'required|string|max:20',
            'shipping_first_name' => 'nullable|string|max:255',
            'shipping_last_name' => 'nullable|string|max:255',
            'shipping_address' => 'nullable|string|max:500',
            'shipping_city' => 'nullable|string|max:100',
            'shipping_state' => 'nullable|string|max:100',
            'shipping_country' => 'nullable|string|max:100',
            'shipping_zip' => 'nullable|string|max:20',
            'notes' => 'nullable|string|max:1000',
            'payment_method' => 'required|string|in:cash_on_delivery,bank_transfer',
        ]);

        $cart = session('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('shopping-cart')
                           ->with('error', 'Your cart is empty.');
        }

        DB::beginTransaction();
        
        try {
            // Calculate order totals
            $subtotal = 0;
            $cartItems = [];
            
            foreach ($cart as $productId => $quantity) {
                $product = Product::find($productId);
                if ($product) {
                    $total = $product->price * $quantity;
                    $subtotal += $total;
                    $cartItems[] = [
                        'product' => $product,
                        'quantity' => $quantity,
                        'total' => $total,
                    ];
                }
            }

            $tax = $subtotal * 0.1; // 10% tax (adjust as needed)
            $shipping = $subtotal > 100 ? 0 : 10; // Free shipping over $100
            $total = $subtotal + $tax + $shipping;

            // Create the order
            $order = Order::create([
                'user_id' => Auth::id(),
                'status' => 'pending',
                'subtotal' => $subtotal,
                'tax' => $tax,
                'shipping' => $shipping,
                'total' => $total,
                'payment_status' => 'pending',
                'payment_method' => $validated['payment_method'],
            ] + $validated);

            // Create order items
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product']->id,
                    'product_name' => $item['product']->name,
                    'product_price' => $item['product']->price,
                    'quantity' => $item['quantity'],
                    'total' => $item['total'],
                ]);
            }

            // Clear the cart
            session()->forget('cart');

            DB::commit();

            return redirect()->route('order.success', $order)
                           ->with('success', 'Order placed successfully!');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()
                           ->with('error', 'Something went wrong. Please try again.')
                           ->withInput();
        }
    }

    /**
     * Show order success page
     */
    public function success(Order $order)
    {
        // Make sure user can only see their own orders
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $order->load('items.product');
        return view('order.success', compact('order'));
    }

    /**
     * Show user's order history
     */
    public function index()
    {
        $orders = Auth::user()
                     ->orders()
                     ->with('items')
                     ->latest()
                     ->paginate(10);

        return view('order.index', compact('orders'));
    }

    /**
     * Show specific order details
     */
    public function show(Order $order)
    {
        // Make sure user can only see their own orders
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $order->load('items.product');
        return view('order.show', compact('order'));
    }

    /**
     * Cancel an order (only if pending)
     */
    public function cancel(Order $order)
    {
        // Make sure user can only cancel their own orders
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        if ($order->status !== 'pending') {
            return redirect()->back()
                           ->with('error', 'This order cannot be cancelled.');
        }

        $order->update(['status' => 'cancelled']);

        return redirect()->back()
                       ->with('success', 'Order cancelled successfully.');
    }
}
