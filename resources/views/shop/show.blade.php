@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="py-24 px-6 sm:px-8 lg:px-12">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <a href="{{ route('shop.index') }}" class="inline-flex items-center text-sm text-gray-400 hover:text-white transition-colors">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7"></path>
                </svg>
                <span data-ja="ショップに戻る" data-en="Back to Shop">ショップに戻る</span>
            </a>
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

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <div>
                @if($product->image)
                    <div class="aspect-square bg-gray-900 overflow-hidden mb-6">
                        <img src="{{ asset('storage/' . $product->image) }}"
                             alt="{{ $product->name }}"
                             class="w-full h-full object-cover">
                    </div>
                @endif

                @if($product->images && count($product->images) > 0)
                    <div class="grid grid-cols-3 gap-4">
                        @foreach($product->images as $image)
                            <div class="aspect-square bg-gray-900 overflow-hidden">
                                <img src="{{ asset('storage/' . $image) }}"
                                     alt="{{ $product->name }}"
                                     class="w-full h-full object-cover">
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="flex flex-col">
                <h1 class="text-4xl md:text-5xl font-semibold tracking-normal font-display mb-6">{{ $product->name }}</h1>

                <div class="text-3xl font-light mb-8">¥{{ number_format($product->price, 0) }}</div>

                <div class="prose prose-invert max-w-none mb-12">
                    <p class="text-lg text-gray-400 font-light leading-relaxed">
                        {{ $product->description }}
                    </p>
                </div>

                @if($product->file_name)
                    <div class="mb-8 p-6 border border-gray-800 bg-gray-900/50">
                        <h3 class="text-sm uppercase tracking-wider text-gray-400 mb-4" data-ja="含まれるもの" data-en="What's included">含まれるもの</h3>
                        <div class="flex items-center text-sm">
                            <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            <span data-ja="デジタルダウンロード: {{ $product->file_name }}" data-en="Digital download: {{ $product->file_name }}">デジタルダウンロード: {{ $product->file_name }}</span>
                        </div>
                        @if($product->file_size)
                            <div class="mt-2 text-sm text-gray-500">
                                <span data-ja="ファイルサイズ:" data-en="File size:">ファイルサイズ:</span> {{ number_format($product->file_size / 1024 / 1024, 2) }} MB
                            </div>
                        @endif
                    </div>
                @endif

                <form action="{{ route('cart.add', $product) }}" method="POST" class="mt-auto">
                    @csrf
                    <button type="submit"
                            class="w-full px-8 py-4 bg-[#1e3a5f] text-white hover:bg-[#2a4a73] transition-colors text-sm tracking-wider font-medium"
                            data-ja="カートに追加" data-en="Add to Cart">
                        カートに追加
                    </button>
                </form>

                <div class="mt-6 text-center text-sm text-gray-400" data-ja="購入後すぐにダウンロード可能" data-en="Instant download after purchase">
                    購入後すぐにダウンロード可能
                </div>
            </div>
        </div>
    </div>
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
