@extends('layouts.app')

@section('title', '決済キャンセル')

@section('content')
<div class="py-24 px-6 sm:px-8 lg:px-12 max-w-3xl mx-auto text-center">
    <div class="flex justify-end mb-8">
        <button onclick="toggleLanguage()" class="text-sm text-gray-400 hover:text-white border border-gray-700 px-3 py-1 rounded">
            <span id="lang-toggle">English</span>
        </button>
    </div>

    <div class="mb-8">
        <svg class="w-24 h-24 mx-auto text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </div>

    <h1 class="text-5xl font-semibold tracking-normal font-display mb-6" data-ja="決済がキャンセルされました" data-en="Payment Cancelled">決済がキャンセルされました</h1>
    <p class="text-xl text-gray-400 font-light mb-12" data-ja="お支払いはキャンセルされました。請求は発生していません。" data-en="Your payment was cancelled. No charges were made.">
        お支払いはキャンセルされました。請求は発生していません。
    </p>

    <div class="flex justify-center gap-4">
        <a href="{{ route('cart.index') }}"
           class="px-8 py-3 border border-gray-700 hover:border-gray-500 transition-colors text-sm tracking-wider"
           data-ja="カートに戻る" data-en="Return to Cart">
            カートに戻る
        </a>
        <a href="{{ route('shop.index') }}"
           class="px-8 py-3 bg-[#1e3a5f] text-white hover:bg-[#2a4a73] transition-colors text-sm tracking-wider"
           data-ja="買い物を続ける" data-en="Continue Shopping">
            買い物を続ける
        </a>
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
