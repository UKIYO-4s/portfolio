@extends('demo.full-custom.layouts.app')

@section('title', 'ホーム')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-orange-400 to-yellow-400 py-20 md:py-32 border-b-4 border-gray-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
        <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold text-gray-800 mb-6 leading-tight">
            Welcome to<br>Funky Co! 🎉
        </h1>
        <p class="text-xl md:text-2xl font-bold text-gray-800 mb-12">
            The grooviest products you'll ever find!
        </p>
        <a href="{{ route('demo.full-custom.products') }}"
           class="inline-block px-10 py-4 bg-cyan-500 text-gray-800 text-xl md:text-2xl font-bold rounded-3xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
            Shop Now! 🛒
        </a>
    </div>
</div>

<!-- Why Choose Us Section -->
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-20">
    <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-16">
        Why Choose Us? 🌟
    </h2>

    <div class="grid md:grid-cols-3 gap-8">
        <!-- Feature 1 -->
        <div class="bg-white p-8 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover">
            <div class="text-7xl mb-6 text-center">🎨</div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Super Cool Designs</h3>
            <p class="text-gray-700 text-lg text-center">
                Our designs are straight from the 70s! Groovy and fun!
            </p>
        </div>

        <!-- Feature 2 -->
        <div class="bg-white p-8 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover">
            <div class="text-7xl mb-6 text-center">🚀</div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Fast Delivery</h3>
            <p class="text-gray-700 text-lg text-center">
                Get your funky products delivered at lightning speed!
            </p>
        </div>

        <!-- Feature 3 -->
        <div class="bg-white p-8 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover">
            <div class="text-7xl mb-6 text-center">⭐</div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Top Quality</h3>
            <p class="text-gray-700 text-lg text-center">
                Only the best materials and craftsmanship for you!
            </p>
        </div>
    </div>
</div>

<!-- Popular Products Section -->
<div class="bg-gradient-to-r from-cyan-400 to-purple-400 py-20 border-t-4 border-b-4 border-gray-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-16">
            Popular Products! 🔥
        </h2>

        <div class="grid md:grid-cols-3 gap-8 mb-12">
            <!-- Product 1 -->
            <div class="bg-orange-400 p-6 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover">
                <div class="aspect-square bg-white rounded-xl border-4 border-gray-800 mb-6 flex items-center justify-center">
                    <div class="text-center">
                        <div class="text-6xl mb-4">🎮</div>
                        <p class="text-gray-500 font-bold">Product Image</p>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Super Cool Widget</h3>
                <p class="text-xl font-bold text-gray-800 mb-4">¥2,980</p>
                <a href="{{ route('demo.full-custom.products.detail', 1) }}"
                   class="block text-center px-6 py-3 bg-yellow-400 text-gray-800 font-bold rounded-xl border-4 border-gray-800 retro-shadow-sm hover:transform hover:translate-y-[-2px] transition-transform">
                    View Details →
                </a>
            </div>

            <!-- Product 2 -->
            <div class="bg-yellow-400 p-6 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover">
                <div class="aspect-square bg-white rounded-xl border-4 border-gray-800 mb-6 flex items-center justify-center">
                    <div class="text-center">
                        <div class="text-6xl mb-4">🎵</div>
                        <p class="text-gray-500 font-bold">Product Image</p>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Retro Vinyl Player</h3>
                <p class="text-xl font-bold text-gray-800 mb-4">¥12,800</p>
                <a href="{{ route('demo.full-custom.products.detail', 2) }}"
                   class="block text-center px-6 py-3 bg-orange-400 text-gray-800 font-bold rounded-xl border-4 border-gray-800 retro-shadow-sm hover:transform hover:translate-y-[-2px] transition-transform">
                    View Details →
                </a>
            </div>

            <!-- Product 3 -->
            <div class="bg-pink-400 p-6 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover">
                <div class="aspect-square bg-white rounded-xl border-4 border-gray-800 mb-6 flex items-center justify-center">
                    <div class="text-center">
                        <div class="text-6xl mb-4">😎</div>
                        <p class="text-gray-500 font-bold">Product Image</p>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Funky Sunglasses</h3>
                <p class="text-xl font-bold text-gray-800 mb-4">¥1,490</p>
                <a href="{{ route('demo.full-custom.products.detail', 3) }}"
                   class="block text-center px-6 py-3 bg-cyan-400 text-gray-800 font-bold rounded-xl border-4 border-gray-800 retro-shadow-sm hover:transform hover:translate-y-[-2px] transition-transform">
                    View Details →
                </a>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('demo.full-custom.products') }}"
               class="inline-block px-10 py-4 bg-white text-gray-800 text-xl font-bold rounded-3xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                View All Products! 🎁
            </a>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-20">
    <div class="bg-gradient-to-r from-purple-400 to-pink-400 p-12 md:p-16 rounded-3xl border-4 border-gray-800 retro-shadow text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
            Ready to Get Funky? 💃
        </h2>
        <p class="text-xl font-bold text-gray-800 mb-8">
            Join the grooviest community today!
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('demo.full-custom.products') }}"
               class="px-10 py-4 bg-orange-400 text-gray-800 text-xl font-bold rounded-3xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                Shop Now
            </a>
            <a href="{{ route('demo.full-custom.contact') }}"
               class="px-10 py-4 bg-yellow-400 text-gray-800 text-xl font-bold rounded-3xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                Contact Us
            </a>
        </div>
    </div>
</div>
@endsection
