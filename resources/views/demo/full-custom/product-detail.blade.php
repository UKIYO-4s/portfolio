@extends('demo.full-custom.layouts.app')

@section('title', $product['name'])

@section('content')
<!-- Back Link -->
<div class="max-w-7xl mx-auto px-6 lg:px-8 pt-8">
    <a href="{{ route('demo.full-custom.products') }}"
       class="inline-flex items-center px-6 py-3 bg-cyan-400 text-gray-800 font-bold rounded-xl border-4 border-gray-800 retro-shadow-sm bounce-hover">
        Back to Products
    </a>
</div>

<!-- Product Detail -->
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">
    <div class="grid md:grid-cols-2 gap-12">
        <!-- Product Image -->
        <div class="gradient-retro-orange p-8 rounded-3xl border-4 border-gray-800 retro-shadow">
            <div class="aspect-square bg-white rounded-2xl border-4 border-gray-800 flex items-center justify-center">
                <div class="text-center text-gray-400">
                    @php
                        $productIcons = [
                            1 => '<svg class="w-32 h-32" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><rect x="6" y="3" width="12" height="18" rx="2"/><circle cx="12" cy="17" r="1"/></svg>',
                            2 => '<svg class="w-32 h-32" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="3"/></svg>',
                            3 => '<svg class="w-32 h-32" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5z"/><circle cx="12" cy="12" r="3"/></svg>',
                            4 => '<svg class="w-32 h-32" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>',
                            5 => '<svg class="w-32 h-32" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>',
                            6 => '<svg class="w-32 h-32" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>'
                        ];
                    @endphp
                    {!! $productIcons[$product['id']] ?? $productIcons[1] !!}
                    <p class="text-gray-500 font-bold text-xl mt-4">Product Image</p>
                </div>
            </div>
        </div>

        <!-- Product Info -->
        <div>
            <!-- Category Badge -->
            <span class="inline-block px-6 py-2 bg-cyan-400 text-gray-800 font-bold text-lg rounded-full border-4 border-gray-800 retro-shadow-sm mb-6">
                {{ $product['category'] }}
            </span>

            <!-- Product Name -->
            <h1 class="text-5xl md:text-6xl font-bold text-gray-800 mb-6">
                {{ $product['name'] }}
            </h1>

            <!-- Price -->
            <div class="bg-orange-400 inline-block px-8 py-4 rounded-2xl border-4 border-gray-800 retro-shadow mb-8">
                <p class="text-5xl font-bold text-gray-800">¥{{ number_format($product['price']) }}</p>
            </div>

            <!-- Description -->
            <div class="bg-white p-6 rounded-2xl border-4 border-gray-800 retro-shadow mb-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Description</h3>
                <p class="text-lg text-gray-700 leading-relaxed">
                    {{ $product['description'] }}
                </p>
            </div>

            <!-- Features -->
            <div class="bg-pink-400 p-6 rounded-2xl border-4 border-gray-800 retro-shadow mb-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Features</h3>
                <ul class="space-y-3">
                    @foreach($product['features'] as $feature)
                        <li class="flex items-center text-lg font-bold text-gray-800">
                            <svg class="w-6 h-6 mr-3 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
                            {{ $feature }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Stock Info -->
            <div class="bg-cyan-400 inline-block px-6 py-3 rounded-xl border-4 border-gray-800 retro-shadow-sm mb-8">
                <p class="font-bold text-gray-800 flex items-center">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                    In Stock: {{ $product['stock'] }} units
                </p>
            </div>

            <!-- Add to Cart Button -->
            <button onclick="alert('Added to cart! (Demo only)')"
                    class="w-full px-8 py-6 bg-orange-400 text-gray-800 text-2xl font-bold rounded-3xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                Add to Cart
            </button>
        </div>
    </div>
</div>

<!-- Related Products -->
<div class="gradient-retro-cyan py-20 border-t-4 border-gray-800 mt-20">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">
            You Might Also Like
        </h2>
        <div class="text-center">
            <a href="{{ route('demo.full-custom.products') }}"
               class="inline-block px-10 py-4 bg-white text-gray-800 text-xl font-bold rounded-3xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                View All Products
            </a>
        </div>
    </div>
</div>
@endsection
