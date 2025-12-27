@extends('layouts.app')

@section('title', 'ショップ')

@section('content')
<div class="py-24 px-6 sm:px-8 lg:px-12 max-w-6xl mx-auto">
    <div class="flex justify-between items-start mb-16">
        <div>
            <h1 class="text-5xl md:text-6xl font-semibold tracking-normal font-display mb-6" data-ja="ショップ" data-en="Shop">ショップ</h1>
            <p class="text-xl text-gray-400 font-light max-w-2xl" data-ja="デジタル製品、リソース、クリエイティブツール。" data-en="Digital products, resources, and creative tools.">
                デジタル製品、リソース、クリエイティブツール。
            </p>
        </div>
        <button onclick="toggleLanguage()" class="text-sm text-gray-400 hover:text-white border border-gray-700 px-3 py-1 rounded">
            <span id="lang-toggle">English</span>
        </button>
    </div>

    @if(session('success'))
        <div class="mb-8 p-4 bg-green-900/20 border border-green-800 text-green-400">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-8 p-4 bg-red-900/20 border border-red-800 text-red-400">
            {{ session('error') }}
        </div>
    @endif

    @if($products->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12">
            @foreach($products as $product)
            <div class="group">
                <a href="{{ route('shop.show', $product) }}" class="block">
                    <div class="aspect-[3/2] bg-gray-900 mb-6 overflow-hidden">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}"
                                 alt="{{ $product->name }}"
                                 class="w-full h-full object-cover opacity-90 group-hover:opacity-100 group-hover:scale-105 transition-all duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-600">
                                <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                                </svg>
                            </div>
                        @endif
                    </div>

                    <h2 class="text-xl font-medium mb-2 group-hover:text-gray-400 transition-colors">
                        {{ $product->name }}
                    </h2>
                    <p class="text-gray-400 font-light mb-4 line-clamp-2 text-sm">
                        {{ $product->description }}
                    </p>
                </a>

                <div class="flex items-center justify-between">
                    <span class="text-xl font-light">¥{{ number_format($product->price, 0) }}</span>
                    <form action="{{ route('cart.add', $product) }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="px-5 py-2 bg-[#1e3a5f] text-white hover:bg-[#2a4a73] transition-colors text-sm tracking-wider"
                                data-ja="カートに追加" data-en="Add to Cart">
                            カートに追加
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-24">
            <p class="text-gray-400 text-lg" data-ja="現在、商品はありません。" data-en="No products available at the moment.">現在、商品はありません。</p>
        </div>
    @endif
</div>

<script>
let currentLang = 'ja';

function toggleLanguage() {
    currentLang = currentLang === 'ja' ? 'en' : 'ja';
    document.getElementById('lang-toggle').textContent = currentLang === 'ja' ? 'English' : '日本語';

    document.querySelectorAll('[data-ja]').forEach(el => {
        if (el.hasAttribute('data-' + currentLang)) {
            el.textContent = el.getAttribute('data-' + currentLang);
        }
    });
}
</script>
@endsection
