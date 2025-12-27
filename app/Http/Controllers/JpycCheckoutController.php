<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmation;
use App\Models\Cart;
use App\Models\Order;
use App\Services\JpycPaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class JpycCheckoutController extends Controller
{
    private JpycPaymentService $jpycService;

    public function __construct(JpycPaymentService $jpycService)
    {
        $this->jpycService = $jpycService;
    }

    /**
     * Show JPYC payment page
     */
    public function index()
    {
        $cart = $this->getCart();

        if (!$cart || $cart->items->count() === 0) {
            return redirect()->route('cart.index')->with('error', 'カートが空です。');
        }

        return view('checkout.jpyc.index', [
            'cart' => $cart,
            'receiverAddress' => $this->jpycService->getReceiverAddress(),
        ]);
    }

    /**
     * Create order and show payment instructions
     */
    public function process(Request $request)
    {
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
            return redirect()->route('cart.index')->with('error', 'カートが空です。');
        }

        // Create order with JPYC payment method
        $order = Order::create([
            'email' => $validated['email'],
            'customer_name' => $validated['customer_name'],
            'total_amount' => $cart->total,
            'payment_method' => 'jpyc',
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

        return view('checkout.jpyc.payment', [
            'order' => $order,
            'receiverAddress' => $this->jpycService->getReceiverAddress(),
            'amountJpyc' => (int) $cart->total, // 1 JPY = 1 JPYC
        ]);
    }

    /**
     * Verify transaction hash and confirm payment
     */
    public function verify(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'tx_hash' => [
                'required',
                'string',
                'regex:/^0x[a-fA-F0-9]{64}$/'
            ],
        ], [
            'tx_hash.required' => 'トランザクションハッシュを入力してください。',
            'tx_hash.regex' => '有効なトランザクションハッシュを入力してください。',
        ]);

        $order = Order::with('items.product')->findOrFail($validated['order_id']);

        // Check if already paid
        if ($order->payment_status === 'paid') {
            return redirect()->route('jpyc.success', ['order_id' => $order->id]);
        }

        // Check if this is the correct payment method
        if ($order->payment_method !== 'jpyc') {
            return back()->withErrors(['tx_hash' => 'この注文はJPYC決済ではありません。']);
        }

        // Verify the transaction
        $result = $this->jpycService->verifyPayment(
            $validated['tx_hash'],
            (int) $order->total_amount
        );

        if (!$result['valid']) {
            return back()->withErrors(['tx_hash' => $result['message']]);
        }

        // Update order
        $order->update([
            'tx_hash' => $validated['tx_hash'],
            'sender_address' => $result['sender'],
            'payment_status' => 'paid',
            'status' => 'completed',
            'payment_confirmed_at' => now(),
        ]);

        // Clear cart
        $sessionId = session()->getId();
        $cart = Cart::where('session_id', $sessionId)->first();
        if ($cart) {
            $cart->items()->delete();
            session(['cart_count' => 0]);
        }

        // Send confirmation email
        Mail::to($order->email)->send(new OrderConfirmation($order));

        return redirect()->route('jpyc.success', ['order_id' => $order->id]);
    }

    /**
     * Check payment status via AJAX
     */
    public function checkStatus(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'tx_hash' => 'required|string|regex:/^0x[a-fA-F0-9]{64}$/',
        ]);

        $order = Order::findOrFail($validated['order_id']);

        if ($order->payment_status === 'paid') {
            return response()->json([
                'status' => 'paid',
                'redirect' => route('jpyc.success', ['order_id' => $order->id])
            ]);
        }

        $result = $this->jpycService->verifyPayment(
            $validated['tx_hash'],
            (int) $order->total_amount
        );

        if ($result['valid']) {
            // Update order
            $order->update([
                'tx_hash' => $validated['tx_hash'],
                'sender_address' => $result['sender'],
                'payment_status' => 'paid',
                'status' => 'completed',
                'payment_confirmed_at' => now(),
            ]);

            // Clear cart
            $sessionId = session()->getId();
            $cart = Cart::where('session_id', $sessionId)->first();
            if ($cart) {
                $cart->items()->delete();
                session(['cart_count' => 0]);
            }

            // Send confirmation email
            Mail::to($order->email)->send(new OrderConfirmation($order));

            return response()->json([
                'status' => 'paid',
                'redirect' => route('jpyc.success', ['order_id' => $order->id])
            ]);
        }

        return response()->json([
            'status' => 'pending',
            'message' => $result['message']
        ]);
    }

    /**
     * Show success page
     */
    public function success(Request $request)
    {
        $orderId = $request->query('order_id');
        $order = Order::with('items.product')->findOrFail($orderId);

        return view('checkout.jpyc.success', compact('order'));
    }

    /**
     * Cancel JPYC order
     */
    public function cancel(Request $request)
    {
        $orderId = $request->query('order_id');
        $order = Order::find($orderId);

        if ($order && $order->payment_status === 'pending') {
            $order->update([
                'payment_status' => 'cancelled',
                'status' => 'cancelled',
            ]);
        }

        return redirect()->route('cart.index')->with('info', '注文がキャンセルされました。');
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
