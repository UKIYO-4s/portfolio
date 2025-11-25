@extends('demo.full-custom.layouts.app')

@section('title', '管理画面ダッシュボード')

@section('content')
<!-- Admin Header -->
<div class="bg-gradient-to-r from-pink-400 to-cyan-400 py-12 border-b-4 border-gray-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
            Admin Dashboard
        </h1>
        <p class="text-xl font-bold text-gray-800">
            Welcome back! Here's what's happening today!
        </p>
    </div>
</div>

<!-- Admin Navigation -->
<div class="bg-orange-400 border-b-4 border-gray-800 sticky top-20 z-40">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex items-center space-x-6 py-4 overflow-x-auto">
            <a href="{{ route('demo.full-custom.admin.dashboard') }}"
               class="px-6 py-2 bg-cyan-400 text-gray-800 font-bold rounded-xl border-4 border-gray-800 retro-shadow-sm whitespace-nowrap">
                Dashboard
            </a>
            <a href="{{ route('demo.full-custom.admin.products') }}"
               class="px-6 py-2 bg-white text-gray-800 font-bold rounded-xl border-4 border-gray-800 retro-shadow-sm hover:bg-pink-400 transition-colors whitespace-nowrap">
                Products
            </a>
            <button onclick="alert('Demo only!')"
                    class="px-6 py-2 bg-white text-gray-800 font-bold rounded-xl border-4 border-gray-800 retro-shadow-sm hover:bg-pink-400 transition-colors whitespace-nowrap">
                Customers
            </button>
            <button onclick="alert('Demo only!')"
                    class="px-6 py-2 bg-white text-gray-800 font-bold rounded-xl border-4 border-gray-800 retro-shadow-sm hover:bg-pink-400 transition-colors whitespace-nowrap">
                Analytics
            </button>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">Quick Stats</h2>

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <!-- Total Sales -->
        <div class="bg-gradient-to-br from-orange-400 to-orange-300 p-6 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover-subtle">
            <div class="w-12 h-12 bg-white rounded-xl border-4 border-gray-800 flex items-center justify-center mb-3">
                <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <p class="text-lg font-bold text-gray-800 mb-2">Total Sales</p>
            <p class="text-4xl font-bold text-gray-800">¥{{ number_format($stats['total_sales']) }}</p>
        </div>

        <!-- Total Orders -->
        <div class="bg-gradient-to-br from-pink-400 to-pink-300 p-6 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover-subtle">
            <div class="w-12 h-12 bg-white rounded-xl border-4 border-gray-800 flex items-center justify-center mb-3">
                <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            </div>
            <p class="text-lg font-bold text-gray-800 mb-2">Total Orders</p>
            <p class="text-4xl font-bold text-gray-800">{{ $stats['total_orders'] }}</p>
        </div>

        <!-- Total Products -->
        <div class="bg-gradient-to-br from-cyan-400 to-cyan-300 p-6 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover-subtle">
            <div class="w-12 h-12 bg-white rounded-xl border-4 border-gray-800 flex items-center justify-center mb-3">
                <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            </div>
            <p class="text-lg font-bold text-gray-800 mb-2">Total Products</p>
            <p class="text-4xl font-bold text-gray-800">{{ $stats['total_products'] }}</p>
        </div>

        <!-- Total Customers -->
        <div class="bg-gradient-to-br from-orange-300 to-pink-300 p-6 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover-subtle">
            <div class="w-12 h-12 bg-white rounded-xl border-4 border-gray-800 flex items-center justify-center mb-3">
                <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <p class="text-lg font-bold text-gray-800 mb-2">Total Customers</p>
            <p class="text-4xl font-bold text-gray-800">{{ $stats['total_customers'] }}</p>
        </div>
    </div>

    <!-- Recent Orders -->
    <h2 class="text-3xl font-bold text-gray-800 mb-8">Recent Orders</h2>

    <div class="bg-white rounded-2xl border-4 border-gray-800 retro-shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-orange-400 to-pink-400">
                        <th class="px-6 py-4 text-left font-bold text-gray-800 border-b-4 border-gray-800">Order ID</th>
                        <th class="px-6 py-4 text-left font-bold text-gray-800 border-b-4 border-gray-800">Customer</th>
                        <th class="px-6 py-4 text-left font-bold text-gray-800 border-b-4 border-gray-800">Amount</th>
                        <th class="px-6 py-4 text-left font-bold text-gray-800 border-b-4 border-gray-800">Status</th>
                        <th class="px-6 py-4 text-left font-bold text-gray-800 border-b-4 border-gray-800">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentOrders as $index => $order)
                        @php
                            $rowColors = ['bg-cyan-100', 'bg-pink-100', 'bg-orange-100', 'bg-cyan-50', 'bg-pink-50'];
                            $statusColors = [
                                'Completed' => 'bg-cyan-400',
                                'Processing' => 'bg-orange-400',
                                'Pending' => 'bg-pink-400'
                            ];
                        @endphp
                        <tr class="{{ $rowColors[$index % 5] }}">
                            <td class="px-6 py-4 font-bold text-gray-800 border-b-2 border-gray-800">#{{ $order['id'] }}</td>
                            <td class="px-6 py-4 font-bold text-gray-800 border-b-2 border-gray-800">{{ $order['customer'] }}</td>
                            <td class="px-6 py-4 font-bold text-gray-800 border-b-2 border-gray-800">¥{{ number_format($order['amount']) }}</td>
                            <td class="px-6 py-4 border-b-2 border-gray-800">
                                <span class="inline-block px-4 py-1 {{ $statusColors[$order['status']] }} text-gray-800 font-bold rounded-full border-2 border-gray-800 text-sm">
                                    {{ $order['status'] }}
                                </span>
                            </td>
                            <td class="px-6 py-4 border-b-2 border-gray-800">
                                <button onclick="alert('View order details (Demo only)')"
                                        class="px-4 py-2 bg-cyan-400 text-gray-800 font-bold rounded-lg border-2 border-gray-800 hover:bg-pink-400 transition-colors text-sm">
                                    View
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="bg-gradient-to-r from-pink-400 to-orange-400 py-16 border-t-4 border-gray-800 mt-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Quick Actions</h2>

        <div class="flex flex-wrap justify-center gap-4">
            <button onclick="alert('Demo only!')"
                    class="px-8 py-4 bg-cyan-400 text-gray-800 text-xl font-bold rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                + Add Product
            </button>
            <button onclick="alert('Demo only!')"
                    class="px-8 py-4 bg-white text-gray-800 text-xl font-bold rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                View Reports
            </button>
            <button onclick="alert('Demo only!')"
                    class="px-8 py-4 bg-pink-300 text-gray-800 text-xl font-bold rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                Settings
            </button>
        </div>
    </div>
</div>
@endsection
