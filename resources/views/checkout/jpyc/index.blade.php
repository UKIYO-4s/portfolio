@extends('layouts.app')

@section('title', 'JPYC決済')

@section('content')
<div class="py-24 px-6 sm:px-8 lg:px-12 max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-16">
        <h1 class="text-5xl md:text-6xl font-semibold tracking-normal font-display">JPYC決済</h1>
        <button onclick="toggleLanguage()" class="text-sm text-gray-400 hover:text-white border border-gray-700 px-3 py-1 rounded">
            <span id="lang-toggle">English</span>
        </button>
    </div>

    @if(session('error'))
        <div class="mb-8 p-4 bg-red-900/20 border border-red-800 text-red-400">
            {{ session('error') }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
        <div>
            <h2 class="text-2xl font-light mb-8" data-ja="注文内容" data-en="Order Summary">注文内容</h2>

            <div class="space-y-6 mb-8">
                @foreach($cart->items as $item)
                    <div class="flex justify-between items-center pb-6 border-b border-gray-800">
                        <div class="flex-grow">
                            <h3 class="text-lg font-light">{{ $item->product->name }}</h3>
                            <p class="text-sm text-gray-400" data-ja="数量: {{ $item->quantity }}" data-en="Qty: {{ $item->quantity }}">数量: {{ $item->quantity }}</p>
                        </div>
                        <div class="text-right">
                            <div class="text-lg">{{ number_format($item->price * $item->quantity, 0) }} JPYC</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="border-t border-gray-800 pt-6">
                <div class="flex justify-between items-center text-2xl font-light">
                    <span data-ja="合計" data-en="Total">合計</span>
                    <span>{{ number_format($cart->total, 0) }} JPYC</span>
                </div>
                <p class="text-sm text-gray-500 mt-2">1 JPYC = 1 JPY</p>
            </div>

            <div class="mt-8 p-4 bg-purple-900/20 border border-purple-800 rounded">
                <h3 class="text-purple-400 font-medium mb-2">JPYC決済</h3>
                <p class="text-sm text-gray-400">Polygon Network</p>
            </div>
        </div>

        <div>
            <h2 class="text-2xl font-light mb-8" data-ja="お客様情報" data-en="Customer Information">お客様情報</h2>

            <form action="{{ route('jpyc.process') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="customer_name" class="block text-sm text-gray-400 mb-2" data-ja="お名前" data-en="Full Name">お名前</label>
                    <input type="text"
                           id="customer_name"
                           name="customer_name"
                           required
                           value="{{ old('customer_name') }}"
                           class="w-full bg-black border border-gray-700 px-4 py-3 text-white focus:border-gray-500 focus:outline-none @error('customer_name') border-red-500 @enderror">
                    @error('customer_name')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm text-gray-400 mb-2" data-ja="メールアドレス" data-en="Email Address">メールアドレス</label>
                    <input type="email"
                           id="email"
                           name="email"
                           required
                           value="{{ old('email') }}"
                           class="w-full bg-black border border-gray-700 px-4 py-3 text-white focus:border-gray-500 focus:outline-none @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-500 mt-2" data-ja="ダウンロードリンクをこのメールアドレスにお送りします。" data-en="You'll receive your download links at this email address.">ダウンロードリンクをこのメールアドレスにお送りします。</p>
                </div>

                <div class="pt-6">
                    <button type="submit"
                            class="w-full px-8 py-4 bg-[#1e3a5f] text-white hover:bg-[#2a4a73] transition-colors text-sm tracking-wider font-medium"
                            data-ja="JPYC決済に進む" data-en="Continue to JPYC Payment">
                        JPYC決済に進む
                    </button>
                </div>

                <div class="text-center text-sm text-gray-400 space-y-2">
                    <p data-ja="Polygonネットワーク上のJPYCで支払い" data-en="Pay with JPYC on Polygon Network">Polygonネットワーク上のJPYCで支払い</p>
                    <div class="flex justify-center items-center gap-3">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z"/>
                        </svg>
                        <span data-ja="ブロックチェーンで保護" data-en="Blockchain Secured">ブロックチェーンで保護</span>
                    </div>
                </div>
            </form>

            <div class="mt-8 text-center">
                <a href="{{ route('checkout.index') }}" class="text-gray-500 hover:text-white text-sm" data-ja="クレジットカード（Stripe）で支払う" data-en="Or pay with credit card (Stripe)">
                    クレジットカード（Stripe）で支払う
                </a>
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
