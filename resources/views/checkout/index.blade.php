@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="py-24 px-6 sm:px-8 lg:px-12 max-w-4xl mx-auto">
    <h1 class="text-5xl md:text-6xl font-thin tracking-wide mb-16">Checkout</h1>

    @if(session('error'))
        <div class="mb-8 p-4 bg-red-900/20 border border-red-800 text-red-400">
            {{ session('error') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
        <div>
            <h2 class="text-2xl font-light mb-8">Order Summary</h2>

            <div class="space-y-6 mb-8">
                @foreach($cart->items as $item)
                    <div class="flex justify-between items-center pb-6 border-b border-gray-800">
                        <div class="flex-grow">
                            <h3 class="text-lg font-light">{{ $item->product->name }}</h3>
                            <p class="text-sm text-gray-400">Qty: {{ $item->quantity }}</p>
                        </div>
                        <div class="text-right">
                            <div class="text-lg">${{ number_format($item->price * $item->quantity, 2) }}</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="border-t border-gray-800 pt-6">
                <div class="flex justify-between items-center text-2xl font-light">
                    <span>Total</span>
                    <span>${{ number_format($cart->total, 2) }}</span>
                </div>
            </div>
        </div>

        <div>
            <h2 class="text-2xl font-light mb-8">Customer Information</h2>

            <form action="{{ route('checkout.process') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="customer_name" class="block text-sm text-gray-400 mb-2">Full Name</label>
                    <input type="text"
                           id="customer_name"
                           name="customer_name"
                           required
                           value="{{ old('customer_name') }}"
                           class="w-full bg-black border border-gray-700 px-4 py-3 text-white focus:border-gray-500 focus:outline-none @error('customer_name') border-red-500 @enderror">
                    @error('customer_name')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm text-gray-400 mb-2">Email Address</label>
                    <input type="email"
                           id="email"
                           name="email"
                           required
                           value="{{ old('email') }}"
                           class="w-full bg-black border border-gray-700 px-4 py-3 text-white focus:border-gray-500 focus:outline-none @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-500 mt-2">You'll receive your download links at this email address.</p>
                </div>

                <div class="pt-6">
                    <button type="submit"
                            class="w-full px-8 py-4 bg-[#1e3a5f] text-white hover:bg-[#2a4a73] transition-colors text-sm tracking-wider font-medium">
                        Continue to Payment
                    </button>
                </div>

                <div class="text-center text-sm text-gray-400 space-y-2">
                    <p>Secure payment powered by Stripe</p>
                    <div class="flex justify-center items-center gap-3">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                        </svg>
                        <span>SSL Encrypted</span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
