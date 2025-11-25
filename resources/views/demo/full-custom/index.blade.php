@extends('demo.full-custom.layouts.app')

@section('title', 'ホーム')

@section('content')
<!-- Hero Section -->
<div class="bg-gradient-to-r from-orange-400 to-orange-300 py-20 md:py-32 border-b-4 border-gray-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
        <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold text-gray-800 mb-6 leading-tight">
            Welcome to<br>Funky Co!
        </h1>
        <p class="text-xl md:text-2xl font-bold text-gray-800 mb-12">
            The grooviest products you'll ever find!
        </p>
        <a href="{{ route('demo.full-custom.products') }}"
           class="inline-block px-10 py-4 bg-cyan-500 text-gray-800 text-xl md:text-2xl font-bold rounded-3xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
            Shop Now
        </a>
    </div>
</div>

<!-- Why Choose Us Section -->
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-20">
    <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-16">
        Why Choose Us?
    </h2>

    <div class="grid md:grid-cols-3 gap-8">
        <!-- Feature 1 -->
        <div class="bg-white p-8 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover-subtle">
            <div class="w-16 h-16 mx-auto mb-6 bg-orange-400 rounded-xl border-4 border-gray-800 flex items-center justify-center">
                <svg class="w-8 h-8 text-gray-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Super Cool Designs</h3>
            <p class="text-gray-700 text-lg text-center">
                Our designs are straight from the 70s! Groovy and fun!
            </p>
        </div>

        <!-- Feature 2 -->
        <div class="bg-white p-8 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover-subtle">
            <div class="w-16 h-16 mx-auto mb-6 bg-cyan-400 rounded-xl border-4 border-gray-800 flex items-center justify-center">
                <svg class="w-8 h-8 text-gray-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Fast Delivery</h3>
            <p class="text-gray-700 text-lg text-center">
                Get your funky products delivered at lightning speed!
            </p>
        </div>

        <!-- Feature 3 -->
        <div class="bg-white p-8 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover-subtle">
            <div class="w-16 h-16 mx-auto mb-6 bg-pink-400 rounded-xl border-4 border-gray-800 flex items-center justify-center">
                <svg class="w-8 h-8 text-gray-800" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
            </div>
            <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Top Quality</h3>
            <p class="text-gray-700 text-lg text-center">
                Only the best materials and craftsmanship for you!
            </p>
        </div>
    </div>
</div>

<!-- Popular Products Section -->
<div class="bg-gradient-to-r from-cyan-400 to-pink-400 py-20 border-t-4 border-b-4 border-gray-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-16">
            Popular Products!
        </h2>

        <div class="grid md:grid-cols-3 gap-8 mb-12">
            <!-- Product 1 -->
            <div class="bg-orange-400 p-6 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover-subtle">
                <div class="aspect-square bg-white rounded-xl border-4 border-gray-800 mb-6 flex items-center justify-center">
                    <div class="text-center">
                        <svg class="w-16 h-16 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><rect x="6" y="3" width="12" height="18" rx="2"/><circle cx="12" cy="17" r="1"/></svg>
                        <p class="text-gray-500 font-bold">Product Image</p>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Super Cool Widget</h3>
                <p class="text-xl font-bold text-gray-800 mb-4">¥2,980</p>
                <a href="{{ route('demo.full-custom.products.detail', 1) }}"
                   class="block text-center px-6 py-3 bg-white text-gray-800 font-bold rounded-xl border-4 border-gray-800 retro-shadow-sm hover:transform hover:translate-y-[-2px] transition-transform">
                    View Details
                </a>
            </div>

            <!-- Product 2 -->
            <div class="bg-cyan-400 p-6 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover-subtle">
                <div class="aspect-square bg-white rounded-xl border-4 border-gray-800 mb-6 flex items-center justify-center">
                    <div class="text-center">
                        <svg class="w-16 h-16 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="3"/></svg>
                        <p class="text-gray-500 font-bold">Product Image</p>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Retro Vinyl Player</h3>
                <p class="text-xl font-bold text-gray-800 mb-4">¥12,800</p>
                <a href="{{ route('demo.full-custom.products.detail', 2) }}"
                   class="block text-center px-6 py-3 bg-white text-gray-800 font-bold rounded-xl border-4 border-gray-800 retro-shadow-sm hover:transform hover:translate-y-[-2px] transition-transform">
                    View Details
                </a>
            </div>

            <!-- Product 3 -->
            <div class="bg-pink-400 p-6 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover-subtle">
                <div class="aspect-square bg-white rounded-xl border-4 border-gray-800 mb-6 flex items-center justify-center">
                    <div class="text-center">
                        <svg class="w-16 h-16 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5z"/><circle cx="12" cy="12" r="3"/></svg>
                        <p class="text-gray-500 font-bold">Product Image</p>
                    </div>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Funky Sunglasses</h3>
                <p class="text-xl font-bold text-gray-800 mb-4">¥1,490</p>
                <a href="{{ route('demo.full-custom.products.detail', 3) }}"
                   class="block text-center px-6 py-3 bg-white text-gray-800 font-bold rounded-xl border-4 border-gray-800 retro-shadow-sm hover:transform hover:translate-y-[-2px] transition-transform">
                    View Details
                </a>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('demo.full-custom.products') }}"
               class="inline-block px-10 py-4 bg-white text-gray-800 text-xl font-bold rounded-3xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                View All Products
            </a>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-20">
    <div class="bg-gradient-to-r from-orange-400 to-pink-400 p-12 md:p-16 rounded-3xl border-4 border-gray-800 retro-shadow text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
            Ready to Get Funky?
        </h2>
        <p class="text-xl font-bold text-gray-800 mb-8">
            Join the grooviest community today!
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="{{ route('demo.full-custom.products') }}"
               class="px-10 py-4 bg-cyan-400 text-gray-800 text-xl font-bold rounded-3xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                Shop Now
            </a>
            <a href="{{ route('demo.full-custom.contact') }}"
               class="px-10 py-4 bg-white text-gray-800 text-xl font-bold rounded-3xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                Contact Us
            </a>
        </div>
    </div>
</div>
@endsection
