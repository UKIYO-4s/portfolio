@extends('demo.full-custom.layouts.app')

@section('title', '商品一覧')

@section('content')
<!-- Page Header -->
<div class="bg-gradient-to-r from-pink-400 to-orange-400 py-16 border-b-4 border-gray-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
        <h1 class="text-5xl md:text-6xl font-bold text-gray-800 mb-4">
            Our Funky Products! 🛍️
        </h1>
        <p class="text-xl font-bold text-gray-800">
            Check out these groovy items!
        </p>
    </div>
</div>

<!-- Products Grid -->
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-20">
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @php
            $bgColors = ['bg-orange-400', 'bg-yellow-400', 'bg-cyan-500', 'bg-pink-400', 'bg-purple-400', 'bg-green-400'];
            $icons = ['🎮', '🎵', '😎', '💡', '🛹', '🎨'];
        @endphp

        @foreach($products as $index => $product)
            <div class="{{ $bgColors[$index % 6] }} p-6 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover">
                <!-- Product Image -->
                <div class="aspect-square bg-white rounded-xl border-4 border-gray-800 mb-6 flex items-center justify-center">
                    <div class="text-center">
                        <div class="text-7xl mb-4">{{ $icons[$index % 6] }}</div>
                        <p class="text-gray-500 font-bold text-sm">Product Image</p>
                    </div>
                </div>

                <!-- Category Badge -->
                <span class="inline-block px-4 py-1 bg-white text-gray-800 font-bold text-sm rounded-full border-2 border-gray-800 mb-4">
                    {{ $product['category'] }}
                </span>

                <!-- Product Info -->
                <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ $product['name'] }}</h3>
                <p class="text-gray-800 mb-4">{{ Str::limit($product['description'], 60) }}</p>

                <!-- Price -->
                <p class="text-3xl font-bold text-gray-800 mb-6">¥{{ number_format($product['price']) }}</p>

                <!-- View Details Button -->
                <a href="{{ route('demo.full-custom.products.detail', $product['id']) }}"
                   class="block text-center px-6 py-3 bg-white text-gray-800 font-bold text-lg rounded-xl border-4 border-gray-800 retro-shadow-sm hover:transform hover:translate-y-[-2px] transition-transform">
                    View Details →
                </a>
            </div>
        @endforeach
    </div>
</div>

<!-- CTA Section -->
<div class="max-w-7xl mx-auto px-6 lg:px-8 pb-20">
    <div class="bg-gradient-to-r from-cyan-400 to-yellow-400 p-12 rounded-3xl border-4 border-gray-800 retro-shadow text-center">
        <h2 class="text-4xl font-bold text-gray-800 mb-4">
            Can't Find What You're Looking For? 🤔
        </h2>
        <p class="text-xl font-bold text-gray-800 mb-8">
            Let us know what you need!
        </p>
        <a href="{{ route('demo.full-custom.contact') }}"
           class="inline-block px-10 py-4 bg-orange-400 text-gray-800 text-xl font-bold rounded-3xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
            Contact Us! 📧
        </a>
    </div>
</div>
@endsection
