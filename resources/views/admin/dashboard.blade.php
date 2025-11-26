@extends('admin.layouts.app')

@section('title', 'Dashboard - Admin')

@section('content')
<div>
    <h1 class="text-4xl font-thin tracking-wide mb-12">Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <div class="bg-gray-900 border border-gray-800 p-6">
            <div class="text-gray-400 text-sm mb-2">Photos</div>
            <div class="text-3xl font-light">{{ $stats['photos'] }}</div>
        </div>

        <div class="bg-gray-900 border border-gray-800 p-6">
            <div class="text-gray-400 text-sm mb-2">Products</div>
            <div class="text-3xl font-light">{{ $stats['products'] }}</div>
        </div>

        <div class="bg-gray-900 border border-gray-800 p-6">
            <div class="text-gray-400 text-sm mb-2">Orders</div>
            <div class="text-3xl font-light">{{ $stats['orders'] }}</div>
        </div>

        <div class="bg-gray-900 border border-gray-800 p-6">
            <div class="text-gray-400 text-sm mb-2">Revenue</div>
            <div class="text-3xl font-light">${{ number_format($stats['total_revenue'], 2) }}</div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div>
            <h2 class="text-2xl font-thin mb-6">Quick Actions</h2>
            <div class="space-y-4">
                <a href="{{ route('admin.photos.create') }}" class="block bg-gray-900 border border-gray-800 p-4 hover:border-gray-600 transition-colors">
                    <div class="font-light">Upload Photos</div>
                    <div class="text-sm text-gray-400 mt-1">Add new photos to gallery</div>
                </a>
                <a href="{{ route('admin.products.create') }}" class="block bg-gray-900 border border-gray-800 p-4 hover:border-gray-600 transition-colors">
                    <div class="font-light">Add New Product</div>
                    <div class="text-sm text-gray-400 mt-1">Create a new digital product</div>
                </a>
            </div>
        </div>

        <div>
            <h2 class="text-2xl font-thin mb-6">Recent Orders</h2>
            @if($recentOrders->count() > 0)
                <div class="bg-gray-900 border border-gray-800">
                    @foreach($recentOrders as $order)
                        <a href="{{ route('admin.orders.show', $order) }}" class="block p-4 border-b border-gray-800 last:border-b-0 hover:bg-gray-800 transition-colors">
                            <div class="flex justify-between items-start mb-2">
                                <div class="font-mono text-sm">{{ $order->order_number }}</div>
                                <div class="text-sm">${{ number_format($order->total_amount, 2) }}</div>
                            </div>
                            <div class="text-sm text-gray-400">{{ $order->customer_name }}</div>
                            <div class="flex justify-between items-center mt-2">
                                <span class="text-xs px-2 py-1 {{ $order->payment_status === 'paid' ? 'bg-green-900/30 text-green-400' : 'bg-gray-800 text-gray-400' }}">
                                    {{ $order->payment_status }}
                                </span>
                                <div class="text-xs text-gray-500">{{ $order->created_at->diffForHumans() }}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="bg-gray-900 border border-gray-800 p-8 text-center text-gray-400">
                    No orders yet
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
