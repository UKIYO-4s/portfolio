@extends('layouts.app')

@section('title', 'Dev Preview - Orders')

@section('content')
<div class="py-12 px-6 max-w-6xl mx-auto">
    <h1 class="text-3xl font-bold mb-8">Development Preview - Orders</h1>

    <div class="mb-8 p-4 bg-blue-900/20 border border-blue-800 rounded">
        <h2 class="text-lg font-semibold mb-2">Preview Links</h2>
        <ul class="space-y-2 text-sm">
            <li><a href="{{ route('dev.email.order-confirmation') }}" class="text-blue-400 hover:underline">Latest Order Confirmation Email</a></li>
            <li><a href="{{ route('dev.jpyc-success') }}" class="text-blue-400 hover:underline">Latest JPYC Success Page</a></li>
        </ul>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-800">
                <tr>
                    <th class="px-4 py-3 text-left">ID</th>
                    <th class="px-4 py-3 text-left">Order #</th>
                    <th class="px-4 py-3 text-left">Customer</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Amount</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Payment</th>
                    <th class="px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                @forelse($orders as $order)
                <tr class="hover:bg-gray-800/50">
                    <td class="px-4 py-3">{{ $order->id }}</td>
                    <td class="px-4 py-3 font-mono text-xs">{{ $order->order_number }}</td>
                    <td class="px-4 py-3">{{ $order->customer_name }}</td>
                    <td class="px-4 py-3">{{ $order->email }}</td>
                    <td class="px-4 py-3">¥{{ number_format($order->total_amount) }}</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 rounded text-xs
                            {{ $order->status === 'completed' ? 'bg-green-800 text-green-200' : '' }}
                            {{ $order->status === 'pending' ? 'bg-yellow-800 text-yellow-200' : '' }}
                            {{ $order->status === 'cancelled' ? 'bg-red-800 text-red-200' : '' }}">
                            {{ $order->status }}
                        </span>
                    </td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 rounded text-xs
                            {{ $order->payment_status === 'paid' ? 'bg-green-800 text-green-200' : '' }}
                            {{ $order->payment_status === 'pending' ? 'bg-yellow-800 text-yellow-200' : '' }}">
                            {{ $order->payment_status }}
                        </span>
                    </td>
                    <td class="px-4 py-3 space-x-2">
                        <a href="{{ route('dev.email.order-confirmation', $order->id) }}"
                           class="text-blue-400 hover:underline text-xs">Email</a>
                        <a href="{{ route('dev.jpyc-success', $order->id) }}"
                           class="text-purple-400 hover:underline text-xs">Success</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-4 py-8 text-center text-gray-500">No orders found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-8 p-4 bg-gray-800 rounded">
        <h2 class="text-lg font-semibold mb-2">Products</h2>
        @php $products = App\Models\Product::all(); @endphp
        @forelse($products as $product)
        <div class="flex justify-between items-center py-2 border-b border-gray-700 last:border-0">
            <div>
                <span class="font-medium">{{ $product->name }}</span>
                <span class="text-gray-400 text-sm ml-2">¥{{ number_format($product->price) }}</span>
            </div>
            <div class="text-sm">
                @if($product->file_path)
                    <span class="text-green-400">File: {{ $product->file_path }}</span>
                @else
                    <span class="text-yellow-400">No file uploaded</span>
                @endif
            </div>
        </div>
        @empty
        <p class="text-gray-500">No products found</p>
        @endforelse
    </div>
</div>
@endsection
