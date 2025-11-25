@extends('demo.full-custom.layouts.app')

@section('title', $product['name'])

@section('content')
<!-- Back Link -->
<div class="max-w-7xl mx-auto px-6 lg:px-8 pt-8">
    <a href="{{ route('demo.full-custom.products') }}"
       class="inline-flex items-center px-6 py-3 bg-yellow-400 text-gray-800 font-bold rounded-xl border-4 border-gray-800 retro-shadow-sm bounce-hover">
        ← Back to Products
    </a>
</div>

<!-- Product Detail -->
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">
    <div class="grid md:grid-cols-2 gap-12">
        <!-- Product Image -->
        <div class="bg-gradient-to-br from-orange-400 to-pink-400 p-8 rounded-3xl border-4 border-gray-800 retro-shadow">
            <div class="aspect-square bg-white rounded-2xl border-4 border-gray-800 flex items-center justify-center">
                <div class="text-center">
                    <div class="text-9xl mb-6">
                        @php
                            $icons = [1 => '🎮', 2 => '🎵', 3 => '😎', 4 => '💡', 5 => '🛹', 6 => '🎨'];
                        @endphp
                        {{ $icons[$product['id']] ?? '🎁' }}
                    </div>
                    <p class="text-gray-500 font-bold text-xl">Product Image</p>
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
            <div class="bg-yellow-400 inline-block px-8 py-4 rounded-2xl border-4 border-gray-800 retro-shadow mb-8">
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
            <div class="bg-purple-400 p-6 rounded-2xl border-4 border-gray-800 retro-shadow mb-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Features ✨</h3>
                <ul class="space-y-3">
                    @foreach($product['features'] as $feature)
                        <li class="flex items-center text-lg font-bold text-gray-800">
                            <span class="text-2xl mr-3">✓</span>
                            {{ $feature }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Stock Info -->
            <div class="bg-green-400 inline-block px-6 py-3 rounded-xl border-4 border-gray-800 retro-shadow-sm mb-8">
                <p class="font-bold text-gray-800">
                    <span class="text-2xl">📦</span> In Stock: {{ $product['stock'] }} units
                </p>
            </div>

            <!-- Add to Cart Button -->
            <button onclick="alert('🎉 Added to cart! (Demo only)')"
                    class="w-full px-8 py-6 bg-orange-400 text-gray-800 text-2xl font-bold rounded-3xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                Add to Cart! 🛒
            </button>
        </div>
    </div>
</div>

<!-- Related Products -->
<div class="bg-gradient-to-r from-cyan-400 to-purple-400 py-20 border-t-4 border-gray-800 mt-20">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">
            You Might Also Like! 👀
        </h2>
        <div class="text-center">
            <a href="{{ route('demo.full-custom.products') }}"
               class="inline-block px-10 py-4 bg-white text-gray-800 text-xl font-bold rounded-3xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                View All Products →
            </a>
        </div>
    </div>
</div>
@endsection
