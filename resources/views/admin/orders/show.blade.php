@extends('admin.layouts.app')

@section('title', 'Order Details - Admin')

@section('content')
<div class="max-w-4xl">
    <div class="mb-8">
        <a href="{{ route('admin.orders.index') }}" class="text-gray-400 hover:text-white text-sm">
            ← Back to Orders
        </a>
    </div>

    <div class="mb-8">
        <h1 class="text-4xl font-semibold tracking-normal font-display">Order Details</h1>
        <p class="text-gray-400 mt-2">{{ $order->order_number }}</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-gray-900 border border-gray-800 p-6">
            <h2 class="text-xl font-light mb-4">Customer Information</h2>
            <div class="space-y-3">
                <div>
                    <div class="text-sm text-gray-400">Name</div>
                    <div class="text-white">{{ $order->customer_name }}</div>
                </div>
                <div>
                    <div class="text-sm text-gray-400">Email</div>
                    <div class="text-white">{{ $order->email }}</div>
                </div>
            </div>
        </div>

        <div class="bg-gray-900 border border-gray-800 p-6">
            <h2 class="text-xl font-light mb-4">Order Status</h2>
            <div class="space-y-3">
                <div>
                    <div class="text-sm text-gray-400">Payment Status</div>
                    <div class="mt-1">
                        @if($order->payment_status === 'paid')
                            <span class="text-xs px-2 py-1 bg-green-900/30 text-green-400">Paid</span>
                        @elseif($order->payment_status === 'pending')
                            <span class="text-xs px-2 py-1 bg-yellow-900/30 text-yellow-400">Pending</span>
                        @else
                            <span class="text-xs px-2 py-1 bg-red-900/30 text-red-400">Failed</span>
                        @endif
                    </div>
                </div>
                <div>
                    <div class="text-sm text-gray-400">Order Status</div>
                    <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST" class="mt-1">
                        @csrf
                        @method('PATCH')
                        <div class="flex gap-2">
                            <select name="status" class="bg-black border border-gray-700 px-3 py-2 text-sm text-white">
                                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                                <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                            <button type="submit" class="px-4 py-2 bg-[#1e3a5f] text-white hover:bg-[#2a4a73] transition-colors text-sm">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
                <div>
                    <div class="text-sm text-gray-400">Order Date</div>
                    <div class="text-white">{{ $order->created_at->format('Y/m/d H:i') }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-gray-900 border border-gray-800 p-6 mb-8">
        <h2 class="text-xl font-light mb-4">Order Items</h2>
        <div class="space-y-4">
            @foreach($order->items as $item)
            <div class="flex items-start gap-4 pb-4 border-b border-gray-800 last:border-b-0">
                @if($item->product && $item->product->image)
                    <img src="{{ asset('storage/' . $item->product->image) }}" alt="{{ $item->product_name }}" class="w-20 h-20 object-cover">
                @else
                    <div class="w-20 h-20 bg-gray-800 flex items-center justify-center text-gray-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                @endif
                <div class="flex-1">
                    <div class="font-light text-white">{{ $item->product_name }}</div>
                    <div class="text-sm text-gray-400 mt-1">
                        Quantity: {{ $item->quantity }}
                    </div>
                </div>
                <div class="text-right">
                    <div class="text-white">&yen;{{ number_format($item->price) }}</div>
                    <div class="text-sm text-gray-400 mt-1">&yen;{{ number_format($item->price * $item->quantity) }}</div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-6 pt-6 border-t border-gray-700">
            <div class="flex justify-between items-center">
                <div class="text-xl font-light">Total</div>
                <div class="text-2xl text-white">&yen;{{ number_format($order->total_amount) }}</div>
            </div>
        </div>
    </div>

    @if($order->payment_intent_id)
    <div class="bg-gray-900 border border-gray-800 p-6">
        <h2 class="text-xl font-light mb-4">Payment Information</h2>
        <div>
            <div class="text-sm text-gray-400">Payment Intent ID</div>
            <div class="text-white font-mono text-sm">{{ $order->payment_intent_id }}</div>
        </div>
    </div>
    @endif
</div>
@endsection
