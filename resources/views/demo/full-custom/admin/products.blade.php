@extends('demo.full-custom.layouts.app')

@section('title', '管理画面 - 商品管理')

@section('content')
<!-- Admin Header -->
<div class="bg-gradient-to-r from-orange-400 to-pink-400 py-12 border-b-4 border-gray-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
            Product Management 📦
        </h1>
        <p class="text-xl font-bold text-gray-800">
            Manage all your funky products here!
        </p>
    </div>
</div>

<!-- Admin Navigation -->
<div class="bg-yellow-400 border-b-4 border-gray-800 sticky top-20 z-40">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex items-center space-x-6 py-4 overflow-x-auto">
            <a href="{{ route('demo.full-custom.admin.dashboard') }}"
               class="px-6 py-2 bg-white text-gray-800 font-bold rounded-xl border-4 border-gray-800 retro-shadow-sm hover:bg-orange-400 transition-colors whitespace-nowrap">
                📊 Dashboard
            </a>
            <a href="{{ route('demo.full-custom.admin.products') }}"
               class="px-6 py-2 bg-orange-400 text-gray-800 font-bold rounded-xl border-4 border-gray-800 retro-shadow-sm whitespace-nowrap">
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

<!-- Action Bar -->
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-8">
    <div class="flex flex-col md:flex-row items-center justify-between gap-4">
        <h2 class="text-3xl font-bold text-gray-800">All Products ({{ count($products) }})</h2>

        <div class="flex gap-4">
            <button onclick="alert('Add new product (Demo only)')"
                    class="px-8 py-3 bg-green-400 text-gray-800 text-lg font-bold rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                + Add New Product
            </button>
            <button onclick="alert('Filter products (Demo only)')"
                    class="px-8 py-3 bg-cyan-400 text-gray-800 text-lg font-bold rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                🔍 Filter
            </button>
        </div>
    </div>
</div>

<!-- Products Table -->
<div class="max-w-7xl mx-auto px-6 lg:px-8 pb-12">
    <div class="bg-white rounded-2xl border-4 border-gray-800 retro-shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gradient-to-r from-purple-400 to-cyan-400">
                        <th class="px-6 py-4 text-left font-bold text-gray-800 border-b-4 border-gray-800">ID</th>
                        <th class="px-6 py-4 text-left font-bold text-gray-800 border-b-4 border-gray-800">Product Name</th>
                        <th class="px-6 py-4 text-left font-bold text-gray-800 border-b-4 border-gray-800">Category</th>
                        <th class="px-6 py-4 text-left font-bold text-gray-800 border-b-4 border-gray-800">Price</th>
                        <th class="px-6 py-4 text-left font-bold text-gray-800 border-b-4 border-gray-800">Stock</th>
                        <th class="px-6 py-4 text-left font-bold text-gray-800 border-b-4 border-gray-800">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $index => $product)
                        @php
                            $rowColors = ['bg-orange-100', 'bg-yellow-100', 'bg-cyan-100', 'bg-pink-100', 'bg-purple-100', 'bg-green-100'];
                            $stockStatus = $product['stock'] > 30 ? 'text-green-600' : ($product['stock'] > 10 ? 'text-orange-600' : 'text-red-600');
                        @endphp
                        <tr class="{{ $rowColors[$index % 6] }}">
                            <td class="px-6 py-4 font-bold text-gray-800 border-b-2 border-gray-800">
                                #{{ $product['id'] }}
                            </td>
                            <td class="px-6 py-4 font-bold text-gray-800 border-b-2 border-gray-800">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 rounded-lg bg-white border-2 border-gray-800 flex items-center justify-center mr-3">
                                        @php
                                            $icons = [1 => '🎮', 2 => '🎵', 3 => '😎', 4 => '💡', 5 => '🛹', 6 => '🎨'];
                                        @endphp
                                        <span class="text-2xl">{{ $icons[$product['id']] ?? '🎁' }}</span>
                                    </div>
                                    <span>{{ $product['name'] }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 border-b-2 border-gray-800">
                                <span class="inline-block px-3 py-1 bg-white text-gray-800 font-bold rounded-full border-2 border-gray-800 text-sm">
                                    {{ $product['category'] }}
                                </span>
                            </td>
                            <td class="px-6 py-4 font-bold text-gray-800 border-b-2 border-gray-800">
                                ¥{{ number_format($product['price']) }}
                            </td>
                            <td class="px-6 py-4 font-bold {{ $stockStatus }} border-b-2 border-gray-800">
                                {{ $product['stock'] }} units
                            </td>
                            <td class="px-6 py-4 border-b-2 border-gray-800">
                                <div class="flex gap-2">
                                    <button onclick="alert('View product #{{ $product['id'] }} (Demo only)')"
                                            class="px-4 py-2 bg-cyan-400 text-gray-800 font-bold rounded-lg border-2 border-gray-800 hover:bg-purple-400 transition-colors text-sm">
                                        👁️ View
                                    </button>
                                    <button onclick="alert('Edit product #{{ $product['id'] }} (Demo only)')"
                                            class="px-4 py-2 bg-yellow-400 text-gray-800 font-bold rounded-lg border-2 border-gray-800 hover:bg-orange-400 transition-colors text-sm">
                                        ✏️ Edit
                                    </button>
                                    <button onclick="if(confirm('Delete this product?')) alert('Product deleted! (Demo only)')"
                                            class="px-4 py-2 bg-pink-400 text-gray-800 font-bold rounded-lg border-2 border-gray-800 hover:bg-red-400 transition-colors text-sm">
                                        🗑️ Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bulk Actions -->
<div class="bg-gradient-to-r from-yellow-400 to-green-400 py-12 border-t-4 border-gray-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Bulk Actions ⚡</h2>

        <div class="flex flex-wrap justify-center gap-4">
            <button onclick="alert('Export all products (Demo only)')"
                    class="px-8 py-4 bg-white text-gray-800 text-lg font-bold rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                📤 Export CSV
            </button>
            <button onclick="alert('Import products (Demo only)')"
                    class="px-8 py-4 bg-cyan-400 text-gray-800 text-lg font-bold rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                📥 Import
            </button>
            <button onclick="alert('Update prices (Demo only)')"
                    class="px-8 py-4 bg-purple-400 text-gray-800 text-lg font-bold rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                💰 Update Prices
            </button>
            <button onclick="alert('Generate report (Demo only)')"
                    class="px-8 py-4 bg-orange-400 text-gray-800 text-lg font-bold rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                📊 Generate Report
            </button>
        </div>
    </div>
</div>
@endsection
