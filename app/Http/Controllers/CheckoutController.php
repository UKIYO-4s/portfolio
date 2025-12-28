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
        // Enhanced input validation
        $validated = $request->validate([
            'email' => [
                'required',
                'email:rfc,dns',
                'max:255',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
            ],
            'customer_name' => [
                'required',
                'string',
                'min:2',
                'max:255',
                'regex:/^[\p{L}\p{M}\s\-\'\.]+$/u'
            ],
        ], [
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => '有効なメールアドレスを入力してください。',
            'email.regex' => 'メールアドレスの形式が正しくありません。',
            'customer_name.required' => 'お名前を入力してください。',
            'customer_name.min' => 'お名前は2文字以上で入力してください。',
            'customer_name.regex' => 'お名前に使用できない文字が含まれています。',
        ]);

        $cart = $this->getCart();

        if (!$cart || $cart->items->count() === 0) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Use validated data to prevent injection attacks
        $order = Order::create([
            'email' => $validated['email'],
            'customer_name' => $validated['customer_name'],
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
                    'unit_amount' => (int) $item->price,
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
            'customer_email' => $validated['email'],
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
