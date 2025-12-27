@extends('layouts.app')

@section('title', '注文完了')

@section('content')
<div class="py-24 px-6 sm:px-8 lg:px-12 max-w-3xl mx-auto text-center">
    <div class="flex justify-end mb-8">
        <button onclick="toggleLanguage()" class="text-sm text-gray-400 hover:text-white border border-gray-700 px-3 py-1 rounded">
            <span id="lang-toggle">English</span>
        </button>
    </div>

    <div class="mb-8">
        <svg class="w-24 h-24 mx-auto text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
    </div>

    <h1 class="text-5xl font-semibold tracking-normal font-display mb-6" data-ja="ありがとうございます！" data-en="Thank You!">ありがとうございます！</h1>
    <p class="text-xl text-gray-400 font-light mb-12" data-ja="JPYC決済が確認され、注文が完了しました。" data-en="Your JPYC payment has been verified and your order is complete.">
        JPYC決済が確認され、注文が完了しました。
    </p>

    <div class="bg-gray-900/50 border border-gray-800 p-8 mb-12 text-left">
        <h2 class="text-2xl font-light mb-6" data-ja="注文詳細" data-en="Order Details">注文詳細</h2>

        <div class="space-y-4 mb-6">
            <div class="flex justify-between text-sm">
                <span class="text-gray-400" data-ja="注文番号" data-en="Order Number">注文番号</span>
                <span class="font-mono">{{ $order->order_number }}</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-gray-400" data-ja="メール" data-en="Email">メール</span>
                <span>{{ $order->email }}</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-gray-400" data-ja="合計金額" data-en="Total Amount">合計金額</span>
                <span>{{ number_format($order->total_amount, 0) }} JPYC</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-gray-400" data-ja="支払い方法" data-en="Payment Method">支払い方法</span>
                <span class="text-purple-400">JPYC (Polygon)</span>
            </div>
            @if($order->tx_hash)
            <div class="flex justify-between text-sm items-center">
                <span class="text-gray-400" data-ja="トランザクション" data-en="Transaction">トランザクション</span>
                <a href="https://polygonscan.com/tx/{{ $order->tx_hash }}"
                   target="_blank"
                   class="text-blue-400 hover:text-blue-300 font-mono text-xs">
                    {{ substr($order->tx_hash, 0, 10) }}...{{ substr($order->tx_hash, -8) }}
                    <svg class="w-3 h-3 inline ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                    </svg>
                </a>
            </div>
            @endif
        </div>

        <div class="border-t border-gray-800 pt-6">
            <h3 class="text-lg font-light mb-4" data-ja="購入商品" data-en="Items">購入商品</h3>
            <div class="space-y-3">
                @foreach($order->items as $item)
                    <div class="flex justify-between items-center text-sm">
                        <span>{{ $item->product_name }} (x{{ $item->quantity }})</span>
                        <span>{{ number_format($item->price * $item->quantity, 0) }} JPYC</span>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="border-t border-gray-800 pt-6 mt-6">
            <h3 class="text-lg font-light mb-4" data-ja="ダウンロード" data-en="Download Your Products">ダウンロード</h3>
            <div class="space-y-3">
                @foreach($order->items as $item)
                    @if($item->product && $item->product->product_type === 'download')
                        <a href="{{ \App\Http\Controllers\DownloadController::generateSignedDownloadUrl($order, $item->product) }}"
                           class="flex justify-between items-center p-4 bg-gray-800 hover:bg-gray-700 transition-colors">
                            <span class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                                </svg>
                                <span>{{ $item->product_name }}</span>
                            </span>
                            <span class="text-xs text-blue-400" data-ja="ダウンロードページへ" data-en="Go to Download Page">ダウンロードページへ →</span>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </div>

    <div class="mb-12 p-6 bg-blue-900/20 border border-blue-800">
        <p class="text-blue-400" data-ja="ダウンロードリンク付きの確認メールを {{ $order->email }} に送信しました。" data-en="A confirmation email with download links has been sent to {{ $order->email }}">
            ダウンロードリンク付きの確認メールを <strong>{{ $order->email }}</strong> に送信しました。
        </p>
    </div>

    <a href="{{ route('home') }}"
       class="inline-block px-8 py-3 bg-[#1e3a5f] text-white hover:bg-[#2a4a73] transition-colors text-sm tracking-wider"
       data-ja="ホームに戻る" data-en="Return Home">
        ホームに戻る
    </a>
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
