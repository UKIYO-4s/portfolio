@extends('admin.layouts.app')

@section('title', 'Orders - Admin')

@section('content')
<div>
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-thin tracking-wide">Orders</h1>
    </div>

    @if($orders->count() > 0)
        <div class="bg-gray-900 border border-gray-800">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-800">
                        <th class="text-left p-4 text-sm font-light text-gray-400">Order #</th>
                        <th class="text-left p-4 text-sm font-light text-gray-400">Customer</th>
                        <th class="text-left p-4 text-sm font-light text-gray-400">Total</th>
                        <th class="text-left p-4 text-sm font-light text-gray-400">Payment</th>
                        <th class="text-left p-4 text-sm font-light text-gray-400">Status</th>
                        <th class="text-left p-4 text-sm font-light text-gray-400">Date</th>
                        <th class="text-right p-4 text-sm font-light text-gray-400">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr class="border-b border-gray-800 last:border-b-0 hover:bg-gray-800">
                        <td class="p-4">
                            <div class="font-light">{{ $order->order_number }}</div>
                        </td>
                        <td class="p-4">
                            <div class="font-light">{{ $order->customer_name }}</div>
                            <div class="text-sm text-gray-400 mt-1">{{ $order->email }}</div>
                        </td>
                        <td class="p-4">
                            <span class="text-lg">&yen;{{ number_format($order->total_amount) }}</span>
                        </td>
                        <td class="p-4">
                            @if($order->payment_status === 'paid')
                                <span class="text-xs px-2 py-1 bg-green-900/30 text-green-400">Paid</span>
                            @elseif($order->payment_status === 'pending')
                                <span class="text-xs px-2 py-1 bg-yellow-900/30 text-yellow-400">Pending</span>
                            @else
                                <span class="text-xs px-2 py-1 bg-red-900/30 text-red-400">Failed</span>
                            @endif
                        </td>
                        <td class="p-4">
                            @if($order->status === 'completed')
                                <span class="text-xs px-2 py-1 bg-green-900/30 text-green-400">Completed</span>
                            @elseif($order->status === 'processing')
                                <span class="text-xs px-2 py-1 bg-blue-900/30 text-blue-400">Processing</span>
                            @elseif($order->status === 'cancelled')
                                <span class="text-xs px-2 py-1 bg-red-900/30 text-red-400">Cancelled</span>
                            @else
                                <span class="text-xs px-2 py-1 bg-gray-800 text-gray-400">Pending</span>
                            @endif
                        </td>
                        <td class="p-4">
                            <div class="text-sm">{{ $order->created_at->format('Y/m/d') }}</div>
                            <div class="text-xs text-gray-400">{{ $order->created_at->format('H:i') }}</div>
                        </td>
                        <td class="p-4 text-right">
                            <a href="{{ route('admin.orders.show', $order) }}" class="px-3 py-1 text-sm border border-gray-700 hover:border-gray-500 transition-colors">
                                View Details
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="bg-gray-900 border border-gray-800 p-12 text-center text-gray-400">
            No orders yet.
        </div>
    @endif
</div>
@endsection
