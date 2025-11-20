@extends('layouts.app')

@section('title', 'Order Complete')

@section('content')
<div class="py-24 px-6 sm:px-8 lg:px-12 max-w-3xl mx-auto text-center">
    <div class="mb-8">
        <svg class="w-24 h-24 mx-auto text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
    </div>

    <h1 class="text-5xl font-thin tracking-wide mb-6">Thank You!</h1>
    <p class="text-xl text-gray-400 font-light mb-12">
        Your order has been completed successfully.
    </p>

    <div class="bg-gray-900/50 border border-gray-800 p-8 mb-12 text-left">
        <h2 class="text-2xl font-light mb-6">Order Details</h2>

        <div class="space-y-4 mb-6">
            <div class="flex justify-between text-sm">
                <span class="text-gray-400">Order Number</span>
                <span class="font-mono">{{ $order->order_number }}</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-gray-400">Email</span>
                <span>{{ $order->email }}</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-gray-400">Total Amount</span>
                <span>${{ number_format($order->total_amount, 2) }}</span>
            </div>
        </div>

        <div class="border-t border-gray-800 pt-6">
            <h3 class="text-lg font-light mb-4">Items</h3>
            <div class="space-y-3">
                @foreach($order->items as $item)
                    <div class="flex justify-between items-center text-sm">
                        <span>{{ $item->product_name }} (x{{ $item->quantity }})</span>
                        <span>${{ number_format($item->price * $item->quantity, 2) }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="border-t border-gray-800 pt-6 mt-6">
            <h3 class="text-lg font-light mb-4">Download Your Products</h3>
            <div class="space-y-3">
                @foreach($order->items as $item)
                    @if($item->product && $item->product->file_path)
                        <a href="{{ route('download', ['order' => $order->id, 'product' => $item->product->id]) }}"
                           class="flex justify-between items-center p-4 bg-gray-800 hover:bg-gray-700 transition-colors">
                            <span class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                                </svg>
                                <span>{{ $item->product_name }}</span>
                            </span>
                            <span class="text-xs text-gray-400">{{ number_format($item->product->file_size / 1024 / 1024, 2) }} MB</span>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="mb-12 p-6 bg-blue-900/20 border border-blue-800">
        <p class="text-blue-400">
            A confirmation email with download links has been sent to <strong>{{ $order->email }}</strong>
        </p>
    </div>

    <a href="{{ route('home') }}"
       class="inline-block px-8 py-3 bg-[#1e3a5f] text-white hover:bg-[#2a4a73] transition-colors text-sm tracking-wider">
        Return Home
    </a>
</div>
@endsection
