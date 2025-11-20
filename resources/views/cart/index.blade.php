@extends('layouts.app')

@section('title', 'Shopping Cart')

@section('content')
<div class="py-24 px-6 sm:px-8 lg:px-12 max-w-5xl mx-auto">
    <h1 class="text-5xl md:text-6xl font-thin tracking-wide mb-16">Shopping Cart</h1>

    @if(session('success'))
        <div class="mb-8 p-4 bg-green-900/20 border border-green-800 text-green-400">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-8 p-4 bg-red-900/20 border border-red-800 text-red-400">
            {{ session('error') }}
        </div>
    @endif

    @if($cart->items->count() > 0)
        <div class="space-y-8 mb-12">
            @foreach($cart->items as $item)
                <div class="flex gap-6 pb-8 border-b border-gray-800">
                    <div class="w-32 h-32 bg-gray-900 flex-shrink-0 overflow-hidden">
                        @if($item->product->image)
                            <img src="{{ asset('storage/' . $item->product->image) }}"
                                 alt="{{ $item->product->name }}"
                                 class="w-full h-full object-cover">
                        @endif
                    </div>

                    <div class="flex-grow">
                        <a href="{{ route('shop.show', $item->product) }}" class="text-xl font-light hover:text-gray-400 transition-colors">
                            {{ $item->product->name }}
                        </a>
                        <p class="text-gray-400 text-sm mt-2 line-clamp-2">
                            {{ $item->product->description }}
                        </p>

                        <div class="flex items-center gap-6 mt-4">
                            <form action="{{ route('cart.update', $item) }}" method="POST" class="flex items-center gap-3">
                                @csrf
                                @method('PATCH')
                                <label class="text-sm text-gray-400">Qty:</label>
                                <input type="number"
                                       name="quantity"
                                       value="{{ $item->quantity }}"
                                       min="1"
                                       class="w-20 bg-gray-900 border border-gray-700 px-3 py-2 text-white focus:border-gray-500 focus:outline-none">
                                <button type="submit" class="text-sm text-gray-400 hover:text-white transition-colors">
                                    Update
                                </button>
                            </form>

                            <form action="{{ route('cart.remove', $item) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm text-red-400 hover:text-red-300 transition-colors">
                                    Remove
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="text-right">
                        <div class="text-xl font-light">¥{{ number_format($item->price, 0) }}</div>
                        @if($item->quantity > 1)
                            <div class="text-sm text-gray-400 mt-1">
                                ¥{{ number_format($item->price * $item->quantity, 0) }} total
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="border-t border-gray-800 pt-8">
            <div class="flex justify-between items-center mb-8">
                <span class="text-2xl font-light">Total</span>
                <span class="text-3xl font-light">¥{{ number_format($cart->total, 0) }}</span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <a href="{{ route('shop.index') }}"
                   class="px-8 py-4 border border-gray-700 hover:border-gray-500 transition-colors text-center text-sm tracking-wider">
                    Continue Shopping
                </a>
                <a href="{{ route('checkout.index') }}"
                   class="px-8 py-4 bg-[#1e3a5f] text-white hover:bg-[#2a4a73] transition-colors text-center text-sm tracking-wider font-medium">
                    Proceed to Checkout
                </a>
            </div>
        </div>
    @else
        <div class="text-center py-24">
            <svg class="w-24 h-24 mx-auto mb-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
            </svg>
            <h2 class="text-2xl font-light mb-4">Your cart is empty</h2>
            <p class="text-gray-400 mb-8">Explore our shop and find something you love.</p>
            <a href="{{ route('shop.index') }}"
               class="inline-block px-8 py-3 bg-[#1e3a5f] text-white hover:bg-[#2a4a73] transition-colors text-sm tracking-wider">
                Browse Shop
            </a>
        </div>
    @endif
</div>
@endsection
