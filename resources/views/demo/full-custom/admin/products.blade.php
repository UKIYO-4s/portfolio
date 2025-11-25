@extends('demo.full-custom.layouts.app')

@section('title', '管理画面 - 商品管理')

@section('content')
<!-- Admin Header - デュオトーン -->
<div class="relative overflow-hidden py-12 border-b-4 border-gray-800">
    <div class="absolute inset-0" style="background: linear-gradient(90deg, #FF8C42 0%, #FF8C42 50%, #FF6B9D 50%, #FF6B9D 100%);"></div>
    <div class="absolute inset-y-0 left-1/2 w-1 bg-gray-800 hidden md:block"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
            Product Management
        </h1>
        <p class="text-xl font-bold text-gray-800">
            Manage all your funky products here!
        </p>
    </div>
</div>

<!-- Admin Navigation -->
<div class="bg-orange-400 border-b-4 border-gray-800 sticky top-20 z-40">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex items-center space-x-6 py-4 overflow-x-auto">
            <a href="{{ route('demo.full-custom.admin.dashboard') }}"
               class="px-6 py-2 bg-white text-gray-800 font-bold rounded-xl border-4 border-gray-800 retro-shadow-sm hover:bg-pink-400 transition-colors whitespace-nowrap">
                Dashboard
            </a>
            <a href="{{ route('demo.full-custom.admin.products') }}"
               class="px-6 py-2 bg-cyan-400 text-gray-800 font-bold rounded-xl border-4 border-gray-800 retro-shadow-sm whitespace-nowrap">
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

<!-- Action Bar -->
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-8">
    <div class="flex flex-col md:flex-row items-center justify-between gap-4">
        <h2 class="text-3xl font-bold text-gray-800">All Products ({{ count($products) }})</h2>

        <div class="flex gap-4">
            <button onclick="alert('Add new product (Demo only)')"
                    class="px-8 py-3 bg-cyan-400 text-gray-800 text-lg font-bold rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                + Add New Product
            </button>
            <button onclick="alert('Filter products (Demo only)')"
                    class="px-8 py-3 bg-pink-400 text-gray-800 text-lg font-bold rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                Filter
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
                    <tr class="bg-pink-400">
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
                            $rowColors = ['bg-orange-100', 'bg-cyan-100', 'bg-pink-100', 'bg-orange-50', 'bg-cyan-50', 'bg-pink-50'];
                            $stockStatus = $product['stock'] > 30 ? 'text-cyan-600' : ($product['stock'] > 10 ? 'text-orange-600' : 'text-pink-600');
                            $productIcons = [
                                1 => '<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><rect x="6" y="3" width="12" height="18" rx="2"/><circle cx="12" cy="17" r="1"/></svg>',
                                2 => '<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="3"/></svg>',
                                3 => '<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5z"/><circle cx="12" cy="12" r="3"/></svg>',
                                4 => '<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>',
                                5 => '<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>',
                                6 => '<svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>'
                            ];
                        @endphp
                        <tr class="{{ $rowColors[$index % 6] }}">
                            <td class="px-6 py-4 font-bold text-gray-800 border-b-2 border-gray-800">
                                #{{ $product['id'] }}
                            </td>
                            <td class="px-6 py-4 font-bold text-gray-800 border-b-2 border-gray-800">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 rounded-lg bg-white border-2 border-gray-800 flex items-center justify-center mr-3 text-gray-600">
                                        {!! $productIcons[$product['id']] ?? $productIcons[1] !!}
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
                                            class="px-4 py-2 bg-cyan-400 text-gray-800 font-bold rounded-lg border-2 border-gray-800 hover:bg-cyan-300 transition-colors text-sm">
                                        View
                                    </button>
                                    <button onclick="alert('Edit product #{{ $product['id'] }} (Demo only)')"
                                            class="px-4 py-2 bg-orange-400 text-gray-800 font-bold rounded-lg border-2 border-gray-800 hover:bg-orange-300 transition-colors text-sm">
                                        Edit
                                    </button>
                                    <button onclick="if(confirm('Delete this product?')) alert('Product deleted! (Demo only)')"
                                            class="px-4 py-2 bg-pink-400 text-gray-800 font-bold rounded-lg border-2 border-gray-800 hover:bg-pink-300 transition-colors text-sm">
                                        Delete
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

<!-- Bulk Actions - デュオトーン水平分割 -->
<section class="py-12 relative overflow-hidden border-t-4 border-gray-800">
    <div class="absolute inset-0" style="background: linear-gradient(90deg, #FF8C42 0%, #FF8C42 50%, #06AED5 50%, #06AED5 100%);"></div>
    <div class="absolute inset-y-0 left-1/2 w-1 bg-gray-800 hidden md:block"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Bulk Actions</h2>

        <div class="flex flex-wrap justify-center gap-4">
            <button onclick="alert('Export all products (Demo only)')"
                    class="px-8 py-4 bg-white text-gray-800 text-lg font-bold rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                Export CSV
            </button>
            <button onclick="alert('Import products (Demo only)')"
                    class="px-8 py-4 bg-cyan-400 text-gray-800 text-lg font-bold rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                Import
            </button>
            <button onclick="alert('Update prices (Demo only)')"
                    class="px-8 py-4 bg-pink-400 text-gray-800 text-lg font-bold rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                Update Prices
            </button>
            <button onclick="alert('Generate report (Demo only)')"
                    class="px-8 py-4 bg-orange-300 text-gray-800 text-lg font-bold rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                Generate Report
            </button>
        </div>
    </div>
</section>
@endsection
