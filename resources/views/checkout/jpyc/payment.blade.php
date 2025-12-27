@extends('layouts.app')

@section('title', 'JPYC決済')

@section('content')
<div class="py-24 px-6 sm:px-8 lg:px-12 max-w-4xl mx-auto">
    <div class="flex justify-between items-center mb-16">
        <h1 class="text-5xl md:text-6xl font-thin tracking-wide">JPYC送金</h1>
        <button onclick="toggleLanguage()" class="text-sm text-gray-400 hover:text-white border border-gray-700 px-3 py-1 rounded">
            <span id="lang-toggle">English</span>
        </button>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
        <div>
            <div class="bg-gray-900 border border-gray-800 p-8 rounded-lg">
                <h2 class="text-2xl font-light mb-6" data-ja="お支払い詳細" data-en="Payment Details">お支払い詳細</h2>

                <div class="space-y-6">
                    <div>
                        <label class="block text-sm text-gray-400 mb-2" data-ja="送金額" data-en="Amount to Send">送金額</label>
                        <div class="text-4xl font-light text-purple-400">{{ number_format($amountJpyc, 0) }} JPYC</div>
                        <p class="text-sm text-gray-500 mt-1">= ¥{{ number_format($amountJpyc, 0) }}</p>
                    </div>

                    <div>
                        <label class="block text-sm text-gray-400 mb-2" data-ja="ネットワーク" data-en="Network">ネットワーク</label>
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 bg-purple-600 rounded-full flex items-center justify-center">
                                <span class="text-xs font-bold">P</span>
                            </div>
                            <span class="text-lg">Polygon (MATIC)</span>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm text-gray-400 mb-2" data-ja="送金先アドレス" data-en="Send to Address">送金先アドレス</label>
                        <div class="bg-black border border-gray-700 p-4 rounded overflow-hidden">
                            <div class="flex items-start gap-3 min-w-0">
                                <code class="text-sm text-green-400 min-w-0 break-all leading-relaxed" id="receiver-address" style="word-break: break-all; overflow-wrap: anywhere;">{{ $receiverAddress }}</code>
                                <button type="button" onclick="copyAddress()" class="text-gray-400 hover:text-white p-2 flex-shrink-0" title="コピー">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <p id="copy-message" class="text-green-400 text-sm mt-2 hidden" data-ja="コピーしました！" data-en="Copied!">コピーしました！</p>
                    </div>

                    <div class="border-t border-gray-800 pt-6">
                        <h3 class="text-sm text-gray-400 mb-3" data-ja="注文情報" data-en="Order Info">注文情報</h3>
                        <p class="text-sm"><span class="text-gray-500" data-ja="注文ID:" data-en="Order ID:">注文ID:</span> {{ $order->order_number }}</p>
                        <p class="text-sm"><span class="text-gray-500" data-ja="メール:" data-en="Email:">メール:</span> {{ $order->email }}</p>
                    </div>
                </div>
            </div>

            <div class="mt-6 p-4 bg-yellow-900/20 border border-yellow-800 rounded">
                <p class="text-yellow-400 text-sm" data-ja="重要: JPYCはPolygonネットワークでのみ送金してください。他のトークンや異なるネットワークで送金すると、資金が失われます。" data-en="Important: Only send JPYC on Polygon network. Sending other tokens or using wrong network will result in loss of funds.">
                    <strong>重要:</strong> JPYCはPolygonネットワークでのみ送金してください。他のトークンや異なるネットワークで送金すると、資金が失われます。
                </p>
            </div>
        </div>

        <div>
            <h2 class="text-2xl font-light mb-6" data-ja="支払いを確認" data-en="Verify Payment">支払いを確認</h2>

            <p class="text-gray-400 mb-6" data-ja="JPYCを送金後、トランザクションハッシュを以下に入力して支払いを確認してください。" data-en="After sending JPYC, paste your transaction hash below to verify payment.">
                JPYCを送金後、トランザクションハッシュを以下に入力して支払いを確認してください。
            </p>

            <form id="verify-form" action="{{ route('jpyc.verify') }}" method="POST" class="space-y-6">
                @csrf
                <input type="hidden" name="order_id" value="{{ $order->id }}">

                <div>
                    <label for="tx_hash" class="block text-sm text-gray-400 mb-2" data-ja="トランザクションハッシュ" data-en="Transaction Hash">トランザクションハッシュ</label>
                    <input type="text"
                           id="tx_hash"
                           name="tx_hash"
                           required
                           placeholder="0x..."
                           value="{{ old('tx_hash') }}"
                           class="w-full bg-black border border-gray-700 px-4 py-3 text-white font-mono text-sm focus:border-gray-500 focus:outline-none @error('tx_hash') border-red-500 @enderror">
                    @error('tx_hash')
                        <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div id="verification-status" class="hidden p-4 rounded">
                </div>

                <button type="submit"
                        id="verify-button"
                        class="w-full px-8 py-4 bg-[#1e3a5f] text-white hover:bg-[#2a4a73] transition-colors text-sm tracking-wider font-medium"
                        data-ja="支払いを確認する" data-en="Verify Payment">
                    支払いを確認する
                </button>
            </form>

            <div class="mt-8 space-y-4">
                <h3 class="text-lg font-light" data-ja="支払い方法" data-en="How to pay">支払い方法</h3>
                <ol class="text-sm text-gray-400 space-y-3 list-decimal list-inside">
                    <li data-ja="暗号資産ウォレット（MetaMask等）を開く" data-en="Open your crypto wallet (MetaMask, etc.)">暗号資産ウォレット（MetaMask等）を開く</li>
                    <li data-ja="Polygonネットワークに切り替える" data-en="Switch to Polygon network">Polygonネットワークに切り替える</li>
                    <li data-ja-html="上記のアドレスに <strong class='text-white'>{{ number_format($amountJpyc, 0) }} JPYC</strong> を送金" data-en-html="Send <strong class='text-white'>{{ number_format($amountJpyc, 0) }} JPYC</strong> to the address above">上記のアドレスに <strong class="text-white">{{ number_format($amountJpyc, 0) }} JPYC</strong> を送金</li>
                    <li data-ja="トランザクションの確認を待つ" data-en="Wait for transaction confirmation">トランザクションの確認を待つ</li>
                    <li data-ja="トランザクションハッシュをコピーして上に貼り付け" data-en="Copy the transaction hash and paste it above">トランザクションハッシュをコピーして上に貼り付け</li>
                    <li data-ja="「支払いを確認する」をクリック" data-en="Click 'Verify Payment'">「支払いを確認する」をクリック</li>
                </ol>
            </div>

            <div class="mt-8 text-center">
                <a href="{{ route('jpyc.cancel', ['order_id' => $order->id]) }}"
                   class="text-gray-500 hover:text-red-400 text-sm"
                   data-ja="注文をキャンセル" data-en="Cancel Order">
                    注文をキャンセル
                </a>
            </div>
        </div>
    </div>
</div>

<script>
let currentLang = 'ja';

function copyAddress() {
    const address = document.getElementById('receiver-address').textContent;
    navigator.clipboard.writeText(address).then(() => {
        const msg = document.getElementById('copy-message');
        msg.classList.remove('hidden');
        setTimeout(() => msg.classList.add('hidden'), 2000);
    });
}

function toggleLanguage() {
    currentLang = currentLang === 'ja' ? 'en' : 'ja';
    document.getElementById('lang-toggle').textContent = currentLang === 'ja' ? 'English' : '日本語';

    document.querySelectorAll('[data-ja]').forEach(el => {
        if (el.hasAttribute('data-' + currentLang + '-html')) {
            el.innerHTML = el.getAttribute('data-' + currentLang + '-html');
        } else if (el.hasAttribute('data-' + currentLang)) {
            el.textContent = el.getAttribute('data-' + currentLang);
        }
    });
}

document.getElementById('verify-form').addEventListener('submit', async function(e) {
    e.preventDefault();

    const form = this;
    const button = document.getElementById('verify-button');
    const statusDiv = document.getElementById('verification-status');
    const txHash = document.getElementById('tx_hash').value;

    if (!txHash.match(/^0x[a-fA-F0-9]{64}$/)) {
        statusDiv.className = 'p-4 rounded bg-red-900/20 border border-red-800';
        statusDiv.innerHTML = currentLang === 'ja'
            ? '<p class="text-red-400">有効なトランザクションハッシュを入力してください</p>'
            : '<p class="text-red-400">Please enter a valid transaction hash</p>';
        statusDiv.classList.remove('hidden');
        return;
    }

    button.disabled = true;
    button.textContent = currentLang === 'ja' ? '確認中...' : 'Verifying...';
    statusDiv.className = 'p-4 rounded bg-blue-900/20 border border-blue-800';
    statusDiv.innerHTML = currentLang === 'ja'
        ? '<p class="text-blue-400">Polygonネットワークでトランザクションを確認中...</p>'
        : '<p class="text-blue-400">Checking transaction on Polygon network...</p>';
    statusDiv.classList.remove('hidden');

    try {
        const response = await fetch('{{ route("jpyc.checkStatus") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                order_id: {{ $order->id }},
                tx_hash: txHash
            })
        });

        const data = await response.json();

        if (data.status === 'paid') {
            statusDiv.className = 'p-4 rounded bg-green-900/20 border border-green-800';
            statusDiv.innerHTML = currentLang === 'ja'
                ? '<p class="text-green-400">支払いが確認されました！リダイレクト中...</p>'
                : '<p class="text-green-400">Payment verified! Redirecting...</p>';
            window.location.href = data.redirect;
        } else {
            statusDiv.className = 'p-4 rounded bg-yellow-900/20 border border-yellow-800';
            const pendingMsg = currentLang === 'ja'
                ? '<p class="text-gray-400 text-sm mt-2">トランザクションがPolygonで確認されるまでお待ちください。</p>'
                : '<p class="text-gray-400 text-sm mt-2">Please wait for the transaction to be confirmed on Polygon and try again.</p>';
            statusDiv.innerHTML = '<p class="text-yellow-400">' + data.message + '</p>' + pendingMsg;
            button.disabled = false;
            button.textContent = currentLang === 'ja' ? '支払いを確認する' : 'Verify Payment';
        }
    } catch (error) {
        statusDiv.className = 'p-4 rounded bg-red-900/20 border border-red-800';
        statusDiv.innerHTML = currentLang === 'ja'
            ? '<p class="text-red-400">確認に失敗しました。もう一度お試しください。</p>'
            : '<p class="text-red-400">Verification failed. Please try again.</p>';
        button.disabled = false;
        button.textContent = currentLang === 'ja' ? '支払いを確認する' : 'Verify Payment';
    }
});
</script>
@endsection
