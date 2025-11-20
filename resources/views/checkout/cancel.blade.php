@extends('layouts.app')

@section('title', 'Payment Cancelled')

@section('content')
<div class="py-24 px-6 sm:px-8 lg:px-12 max-w-3xl mx-auto text-center">
    <div class="mb-8">
        <svg class="w-24 h-24 mx-auto text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </div>

    <h1 class="text-5xl font-thin tracking-wide mb-6">Payment Cancelled</h1>
    <p class="text-xl text-gray-400 font-light mb-12">
        Your payment was cancelled. No charges were made.
    </p>

    <div class="flex justify-center gap-4">
        <a href="{{ route('cart.index') }}"
           class="px-8 py-3 border border-gray-700 hover:border-gray-500 transition-colors text-sm tracking-wider">
            Return to Cart
        </a>
        <a href="{{ route('shop.index') }}"
           class="px-8 py-3 bg-[#1e3a5f] text-white hover:bg-[#2a4a73] transition-colors text-sm tracking-wider">
            Continue Shopping
        </a>
    </div>
</div>
@endsection
