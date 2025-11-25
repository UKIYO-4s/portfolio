@extends('demo.full-custom.layouts.app')

@section('title', '商品一覧')

@section('content')
<!-- Page Header - デュオトーン水平分割 -->
<section class="py-16 relative overflow-hidden border-b-4 border-gray-800">
    <div class="absolute inset-0" style="background: linear-gradient(90deg, #FF6B9D 0%, #FF6B9D 50%, #FF8C42 50%, #FF8C42 100%);"></div>
    <div class="absolute inset-y-0 left-1/2 w-1 bg-gray-800 hidden md:block"></div>
    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 text-center">
        <h1 class="text-5xl md:text-6xl font-bold text-gray-800 mb-4">
            Our Funky Products!
        </h1>
        <p class="text-xl font-bold text-gray-800">
            Check out these groovy items!
        </p>
    </div>
</section>

<!-- Products Grid -->
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-20">
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
        @php
            // 背景色と対応するボタン色（カラールール適用）
            $cardStyles = [
                ['bg' => 'bg-orange-400', 'thumb' => 'bg-orange-300', 'btn' => 'bg-pink-400', 'pattern' => 'wave'],
                ['bg' => 'bg-cyan-400', 'thumb' => 'bg-cyan-300', 'btn' => 'bg-orange-400', 'pattern' => 'stripe'],
                ['bg' => 'bg-pink-400', 'thumb' => 'bg-pink-300', 'btn' => 'bg-cyan-400', 'pattern' => 'dots'],
                ['bg' => 'bg-orange-300', 'thumb' => 'bg-orange-200', 'btn' => 'bg-pink-400', 'pattern' => 'wave'],
                ['bg' => 'bg-cyan-300', 'thumb' => 'bg-cyan-200', 'btn' => 'bg-orange-400', 'pattern' => 'stripe'],
                ['bg' => 'bg-pink-300', 'thumb' => 'bg-pink-200', 'btn' => 'bg-cyan-400', 'pattern' => 'dots'],
            ];
            $productIcons = [
                '<svg class="w-16 h-16" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><rect x="6" y="3" width="12" height="18" rx="2"/><circle cx="12" cy="17" r="1"/></svg>',
                '<svg class="w-16 h-16" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="3"/></svg>',
                '<svg class="w-16 h-16" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5z"/><circle cx="12" cy="12" r="3"/></svg>',
                '<svg class="w-16 h-16" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>',
                '<svg class="w-16 h-16" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>',
                '<svg class="w-16 h-16" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>'
            ];
        @endphp

        @foreach($products as $index => $product)
            @php
                $style = $cardStyles[$index % 6];
                $patternId = 'pattern-' . $index;
            @endphp
            <div class="{{ $style['bg'] }} p-6 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover-subtle relative overflow-hidden">
                <!-- 背景パターン -->
                @if($style['pattern'] === 'wave')
                <svg class="absolute inset-0 w-full h-full opacity-15" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                    <path d="M0,50 Q50,20 100,50 T200,50 T300,50 T400,50" stroke="#FF6B9D" stroke-width="3" fill="none"/>
                    <path d="M0,100 Q50,70 100,100 T200,100 T300,100 T400,100" stroke="#FF6B9D" stroke-width="3" fill="none"/>
                    <path d="M0,150 Q50,120 100,150 T200,150 T300,150 T400,150" stroke="#FF6B9D" stroke-width="3" fill="none"/>
                    <path d="M0,200 Q50,170 100,200 T200,200 T300,200 T400,200" stroke="#FF6B9D" stroke-width="3" fill="none"/>
                    <path d="M0,250 Q50,220 100,250 T200,250 T300,250 T400,250" stroke="#FF6B9D" stroke-width="3" fill="none"/>
                </svg>
                @elseif($style['pattern'] === 'stripe')
                <svg class="absolute inset-0 w-full h-full opacity-10" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="{{ $patternId }}" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse" patternTransform="rotate(45)">
                            <rect x="0" y="0" width="10" height="20" fill="#000"/>
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#{{ $patternId }})"/>
                </svg>
                @else
                <svg class="absolute inset-0 w-full h-full opacity-12" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="{{ $patternId }}" x="0" y="0" width="30" height="30" patternUnits="userSpaceOnUse">
                            <circle cx="15" cy="15" r="4" fill="#000"/>
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#{{ $patternId }})"/>
                </svg>
                @endif

                <div class="relative z-10">
                    <!-- Product Image -->
                    <div class="aspect-square {{ $style['thumb'] }} rounded-xl border-4 border-gray-800 mb-6 flex items-center justify-center">
                        <div class="text-center text-gray-700">
                            {!! $productIcons[$index % 6] !!}
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
                       class="block text-center px-6 py-3 {{ $style['btn'] }} text-gray-800 font-bold text-lg rounded-xl border-4 border-gray-800 retro-shadow-sm hover:transform hover:translate-y-[-2px] transition-transform">
                        View Details
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- CTA Section - デュオトーン水平分割 -->
<section class="py-20 relative overflow-hidden">
    <!-- 背景：水平2色分割 -->
    <div class="absolute inset-0" style="background: linear-gradient(90deg, #06AED5 0%, #06AED5 50%, #FF8C42 50%, #FF8C42 100%);"></div>
    <!-- 中央の区切り線 -->
    <div class="absolute inset-y-0 left-1/2 w-1 bg-gray-800 hidden md:block"></div>

    <div class="relative z-10 max-w-6xl mx-auto px-6 lg:px-8">
        <div class="bg-white p-12 rounded-3xl border-4 border-gray-800 retro-shadow text-center">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">
                Can't Find What You're Looking For?
            </h2>
            <p class="text-xl font-bold text-gray-800 mb-8">
                Let us know what you need!
            </p>
            <a href="{{ route('demo.full-custom.contact') }}"
               class="inline-block px-10 py-4 bg-pink-400 text-gray-800 text-xl font-bold rounded-3xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
                Contact Us
            </a>
        </div>
    </div>
</section>
@endsection
