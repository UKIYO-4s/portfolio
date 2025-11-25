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

<!-- Popular Products Section - デュオトーン水平分割 -->
<section class="py-20 relative overflow-hidden border-t-4 border-b-4 border-gray-800">
    <!-- 背景：水平2色分割 -->
    <div class="absolute inset-0" style="background: linear-gradient(90deg, #06AED5 0%, #06AED5 50%, #FF6B9D 50%, #FF6B9D 100%);"></div>
    <!-- 中央の区切り線 -->
    <div class="absolute inset-y-0 left-1/2 w-1 bg-gray-800 hidden md:block"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8">
        <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-16">
            Popular Products!
        </h2>

        <div class="grid md:grid-cols-3 gap-8 mb-12">
            <!-- Product 1: オレンジ＋ウェーブパターン -->
            <div class="bg-orange-400 p-6 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover-subtle relative overflow-hidden">
                <!-- 背景ウェーブパターン -->
                <svg class="absolute inset-0 w-full h-full opacity-15" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                    <path d="M0,50 Q50,20 100,50 T200,50 T300,50 T400,50" stroke="#FF6B9D" stroke-width="3" fill="none"/>
                    <path d="M0,100 Q50,70 100,100 T200,100 T300,100 T400,100" stroke="#FF6B9D" stroke-width="3" fill="none"/>
                    <path d="M0,150 Q50,120 100,150 T200,150 T300,150 T400,150" stroke="#FF6B9D" stroke-width="3" fill="none"/>
                    <path d="M0,200 Q50,170 100,200 T200,200 T300,200 T400,200" stroke="#FF6B9D" stroke-width="3" fill="none"/>
                </svg>
                <div class="relative z-10">
                    <div class="aspect-square bg-orange-300 rounded-xl border-4 border-gray-800 mb-6 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-700" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><rect x="6" y="3" width="12" height="18" rx="2"/><circle cx="12" cy="17" r="1"/></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Super Cool Widget</h3>
                    <p class="text-xl font-bold text-gray-800 mb-4">¥2,980</p>
                    <a href="{{ route('demo.full-custom.products.detail', 1) }}"
                       class="block text-center px-6 py-3 bg-pink-400 text-gray-800 font-bold rounded-xl border-4 border-gray-800 retro-shadow-sm hover:transform hover:translate-y-[-2px] transition-transform">
                        View Details
                    </a>
                </div>
            </div>

            <!-- Product 2: ターコイズ＋ストライプパターン -->
            <div class="bg-cyan-400 p-6 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover-subtle relative overflow-hidden">
                <!-- 背景ストライプパターン -->
                <svg class="absolute inset-0 w-full h-full opacity-10" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="stripes-index" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse" patternTransform="rotate(45)">
                            <rect x="0" y="0" width="10" height="20" fill="#000"/>
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#stripes-index)"/>
                </svg>
                <div class="relative z-10">
                    <div class="aspect-square bg-cyan-300 rounded-xl border-4 border-gray-800 mb-6 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-700" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="3"/></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Retro Vinyl Player</h3>
                    <p class="text-xl font-bold text-gray-800 mb-4">¥12,800</p>
                    <a href="{{ route('demo.full-custom.products.detail', 2) }}"
                       class="block text-center px-6 py-3 bg-orange-400 text-gray-800 font-bold rounded-xl border-4 border-gray-800 retro-shadow-sm hover:transform hover:translate-y-[-2px] transition-transform">
                        View Details
                    </a>
                </div>
            </div>

            <!-- Product 3: ピンク＋ドットパターン -->
            <div class="bg-pink-400 p-6 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover-subtle relative overflow-hidden">
                <!-- 背景ドットパターン（ハーフトーン） -->
                <svg class="absolute inset-0 w-full h-full opacity-12" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="dots-large-index" x="0" y="0" width="30" height="30" patternUnits="userSpaceOnUse">
                            <circle cx="15" cy="15" r="4" fill="#000"/>
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#dots-large-index)"/>
                </svg>
                <div class="relative z-10">
                    <div class="aspect-square bg-pink-300 rounded-xl border-4 border-gray-800 mb-6 flex items-center justify-center">
                        <svg class="w-16 h-16 text-gray-700" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5z"/><circle cx="12" cy="12" r="3"/></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Funky Sunglasses</h3>
                    <p class="text-xl font-bold text-gray-800 mb-4">¥1,490</p>
                    <a href="{{ route('demo.full-custom.products.detail', 3) }}"
                       class="block text-center px-6 py-3 bg-cyan-400 text-gray-800 font-bold rounded-xl border-4 border-gray-800 retro-shadow-sm hover:transform hover:translate-y-[-2px] transition-transform">
                        View Details
                    </a>
                </div>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('demo.full-custom.products') }}"
               class="inline-block px-10 py-4 bg-white text-gray-800 text-xl font-bold rounded-3xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                View All Products
            </a>
        </div>
    </div>
</section>

<!-- CTA Section - デュオトーン水平分割 -->
<section class="py-20 relative overflow-hidden">
    <!-- 背景：水平2色分割 -->
    <div class="absolute inset-0" style="background: linear-gradient(90deg, #FF8C42 0%, #FF8C42 50%, #06AED5 50%, #06AED5 100%);"></div>
    <!-- 中央の区切り線 -->
    <div class="absolute inset-y-0 left-1/2 w-1 bg-gray-800 hidden md:block"></div>

    <div class="relative z-10 max-w-6xl mx-auto px-6 lg:px-8">
        <div class="bg-white p-12 md:p-16 rounded-3xl border-4 border-gray-800 retro-shadow text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">
                Ready to Get Funky?
            </h2>
            <p class="text-xl font-bold text-gray-800 mb-8">
                Join the grooviest community today!
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('demo.full-custom.products') }}"
                   class="px-10 py-4 bg-pink-400 text-gray-800 text-xl font-bold rounded-3xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                    Shop Now
                </a>
                <a href="{{ route('demo.full-custom.contact') }}"
                   class="px-10 py-4 bg-cyan-400 text-gray-800 text-xl font-bold rounded-3xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
