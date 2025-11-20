<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmation;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = $this->getCart();

        if (!$cart || $cart->items->count() === 0) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        return view('checkout.index', compact('cart'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'customer_name' => 'required|string|max:255',
        ]);

        $cart = $this->getCart();

        if (!$cart || $cart->items->count() === 0) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        $order = Order::create([
            'email' => $request->email,
            'customer_name' => $request->customer_name,
            'total_amount' => $cart->total,
            'payment_status' => 'pending',
            'status' => 'pending',
        ]);

        foreach ($cart->items as $item) {
            $order->items()->create([
                'product_id' => $item->product_id,
                'product_name' => $item->product->name,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }

        Stripe::setApiKey(config('services.stripe.secret'));

        $lineItems = [];
        foreach ($cart->items as $item) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'jpy',
                    'product_data' => [
                        'name' => $item->product->name,
                        'description' => $item->product->description,
                    ],
                    'unit_amount' => $item->price,
                ],
                'quantity' => $item->quantity,
            ];
        }

        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success') . '?session_id={CHECKOUT_SESSION_ID}&order_id=' . $order->id,
            'cancel_url' => route('checkout.cancel') . '?order_id=' . $order->id,
            'customer_email' => $request->email,
            'metadata' => [
                'order_id' => $order->id,
            ],
        ]);

        $order->update(['payment_intent_id' => $session->id]);

        return redirect($session->url);
    }

    public function success(Request $request)
    {
        $orderId = $request->query('order_id');
        $order = Order::with('items.product')->findOrFail($orderId);

        $order->update([
            'payment_status' => 'paid',
            'status' => 'completed',
        ]);

        // Send confirmation email
        Mail::to($order->email)->send(new OrderConfirmation($order));

        $sessionId = session()->getId();
        $cart = Cart::where('session_id', $sessionId)->first();
        if ($cart) {
            $cart->items()->delete();
            session(['cart_count' => 0]);
        }

        return view('checkout.success', compact('order'));
    }

    public function cancel(Request $request)
    {
        $orderId = $request->query('order_id');
        $order = Order::find($orderId);

        if ($order) {
            $order->update([
                'payment_status' => 'cancelled',
                'status' => 'cancelled',
            ]);
        }

        return view('checkout.cancel');
    }

    private function getCart()
    {
        $sessionId = session()->getId();
        $cart = Cart::where('session_id', $sessionId)->first();

        if ($cart) {
            $cart->load('items.product');
        }

        return $cart;
    }
}
