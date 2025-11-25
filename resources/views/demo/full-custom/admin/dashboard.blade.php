@extends('demo.full-custom.layouts.app')

@section('title', '管理画面ダッシュボード')

@section('content')
<!-- Admin Header -->
<div class="bg-gradient-to-r from-purple-400 to-cyan-400 py-12 border-b-4 border-gray-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
            Admin Dashboard 📊
        </h1>
        <p class="text-xl font-bold text-gray-800">
            Welcome back! Here's what's happening today!
        </p>
    </div>
</div>

<!-- Admin Navigation -->
<div class="bg-yellow-400 border-b-4 border-gray-800 sticky top-20 z-40">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex items-center space-x-6 py-4 overflow-x-auto">
            <a href="{{ route('demo.full-custom.admin.dashboard') }}"
               class="px-6 py-2 bg-orange-400 text-gray-800 font-bold rounded-xl border-4 border-gray-800 retro-shadow-sm whitespace-nowrap">
                📊 Dashboard
            </a>
            <a href="{{ route('demo.full-custom.admin.products') }}"
               class="px-6 py-2 bg-white text-gray-800 font-bold rounded-xl border-4 border-gray-800 retro-shadow-sm hover:bg-cyan-400 transition-colors whitespace-nowrap">
                📦 Products
            </a>
            <button onclick="alert('Demo only!')"
                    class="px-6 py-2 bg-white text-gray-800 font-bold rounded-xl border-4 border-gray-800 retro-shadow-sm hover:bg-pink-400 transition-colors whitespace-nowrap">
                👥 Customers
            </button>
            <button onclick="alert('Demo only!')"
                    class="px-6 py-2 bg-white text-gray-800 font-bold rounded-xl border-4 border-gray-800 retro-shadow-sm hover:bg-purple-400 transition-colors whitespace-nowrap">
                📈 Analytics
            </button>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">
    <h2 class="text-3xl font-bold text-gray-800 mb-8">Quick Stats 📈</h2>

    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
        <!-- Total Sales -->
        <div class="bg-gradient-to-br from-orange-400 to-yellow-400 p-6 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover">
            <div class="text-4xl mb-3">💰</div>
            <p class="text-lg font-bold text-gray-800 mb-2">Total Sales</p>
            <p class="text-4xl font-bold text-gray-800">¥{{ number_format($stats['total_sales']) }}</p>
        </div>

        <!-- Total Orders -->
        <div class="bg-gradient-to-br from-pink-400 to-purple-400 p-6 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover">
            <div class="text-4xl mb-3">📦</div>
            <p class="text-lg font-bold text-gray-800 mb-2">Total Orders</p>
            <p class="text-4xl font-bold text-gray-800">{{ $stats['total_orders'] }}</p>
        </div>

        <!-- Total Products -->
        <div class="bg-gradient-to-br from-cyan-400 to-green-400 p-6 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover">
            <div class="text-4xl mb-3">🎁</div>
            <p class="text-lg font-bold text-gray-800 mb-2">Total Products</p>
            <p class="text-4xl font-bold text-gray-800">{{ $stats['total_products'] }}</p>
        </div>

        <!-- Total Customers -->
        <div class="bg-gradient-to-br from-purple-400 to-pink-400 p-6 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover">
            <div class="text-4xl mb-3">👥</div>
            <p class="text-lg font-bold text-gray-800 mb-2">Total Customers</p>
            <p class="text-4xl font-bold text-gray-800">{{ $stats['total_customers'] }}</p>
        </div>
    </div>

    <!-- Recent Orders -->
    <h2 class="text-3xl font-bold text-gray-800 mb-8">Recent Orders 📋</h2>

    <div class="bg-white rounded-2xl border-4 border-gray-800 retro-shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-orange-400 to-yellow-400">
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
                            $rowColors = ['bg-cyan-100', 'bg-pink-100', 'bg-yellow-100', 'bg-purple-100', 'bg-green-100'];
                            $statusColors = [
                                'Completed' => 'bg-green-400',
                                'Processing' => 'bg-yellow-400',
                                'Pending' => 'bg-orange-400'
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
                                        class="px-4 py-2 bg-cyan-400 text-gray-800 font-bold rounded-lg border-2 border-gray-800 hover:bg-purple-400 transition-colors text-sm">
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
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Quick Actions ⚡</h2>

        <div class="flex flex-wrap justify-center gap-4">
            <button onclick="alert('Demo only!')"
                    class="px-8 py-4 bg-yellow-400 text-gray-800 text-xl font-bold rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                + Add Product
            </button>
            <button onclick="alert('Demo only!')"
                    class="px-8 py-4 bg-cyan-400 text-gray-800 text-xl font-bold rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                📊 View Reports
            </button>
            <button onclick="alert('Demo only!')"
                    class="px-8 py-4 bg-purple-400 text-gray-800 text-xl font-bold rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                ⚙️ Settings
            </button>
        </div>
    </div>
</div>
@endsection
