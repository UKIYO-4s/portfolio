<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = $this->getOrCreateCart();
        $cart->load('items.product');

        return view('cart.index', compact('cart'));
    }

    public function add(Request $request, Product $product)
    {
        if (!$product->is_active) {
            return back()->with('error', 'This product is not available.');
        }

        $cart = $this->getOrCreateCart();

        $cartItem = $cart->items()->where('product_id', $product->id)->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            $cart->items()->create([
                'product_id' => $product->id,
                'quantity' => 1,
                'price' => $product->price,
            ]);
        }

        session(['cart_count' => $cart->items()->sum('quantity')]);

        return back()->with('success', 'Product added to cart!');
    }

    public function update(Request $request, CartItem $cartItem)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem->update(['quantity' => $request->quantity]);

        $cart = $this->getOrCreateCart();
        session(['cart_count' => $cart->items()->sum('quantity')]);

        return back()->with('success', 'Cart updated!');
    }

    public function remove(CartItem $cartItem)
    {
        $cartItem->delete();

        $cart = $this->getOrCreateCart();
        session(['cart_count' => $cart->items()->sum('quantity')]);

        return back()->with('success', 'Product removed from cart!');
    }

    private function getOrCreateCart()
    {
        $sessionId = session()->getId();

        $cart = Cart::where('session_id', $sessionId)->first();

        if (!$cart) {
            $cart = Cart::create([
                'session_id' => $sessionId,
            ]);
        }

        return $cart;
    }
}
