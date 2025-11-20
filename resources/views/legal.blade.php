@extends('layouts.app')

@section('title', '特定商取引法に基づく表記')

@section('content')
<div class="min-h-screen bg-black text-white py-20">
    <div class="max-w-4xl mx-auto px-6 sm:px-8">
        <h1 class="text-4xl font-thin tracking-wide mb-12 text-center">特定商取引法に基づく表記</h1>

        <div class="space-y-8 text-gray-300">
            <!-- 販売業者 -->
            <div class="border-b border-gray-800 pb-6">
                <h2 class="text-xl font-light mb-3 text-white">販売業者</h2>
                <p class="leading-relaxed">後藤翔栄</p>
                <p class="text-sm text-gray-400 mt-2">屋号: SD-create</p>
            </div>

            <!-- 運営責任者 -->
            <div class="border-b border-gray-800 pb-6">
                <h2 class="text-xl font-light mb-3 text-white">運営責任者</h2>
                <p class="leading-relaxed">後藤翔栄</p>
            </div>

            <!-- 所在地 -->
            <div class="border-b border-gray-800 pb-6">
                <h2 class="text-xl font-light mb-3 text-white">所在地</h2>
                <p class="leading-relaxed">請求があった場合は遅滞なく開示します</p>
            </div>

            <!-- 電話番号 -->
            <div class="border-b border-gray-800 pb-6">
                <h2 class="text-xl font-light mb-3 text-white">電話番号</h2>
                <p class="leading-relaxed">請求があった場合は遅滞なく開示します</p>
            </div>

            <!-- メールアドレス -->
            <div class="border-b border-gray-800 pb-6">
                <h2 class="text-xl font-light mb-3 text-white">メールアドレス</h2>
                <p class="leading-relaxed">support@sd-create.jp</p>
                <p class="text-sm text-gray-400 mt-2">対応時間: 平日10:00〜18:00（土日祝日を除く）</p>
            </div>

            <!-- 販売価格 -->
            <div class="border-b border-gray-800 pb-6">
                <h2 class="text-xl font-light mb-3 text-white">販売価格</h2>
                <p class="leading-relaxed">各商品ページに記載の金額（消費税込み）</p>
            </div>

            <!-- 商品代金以外の必要料金 -->
            <div class="border-b border-gray-800 pb-6">
                <h2 class="text-xl font-light mb-3 text-white">商品代金以外の必要料金</h2>
                <ul class="list-disc list-inside space-y-1 ml-4">
                    <li>配送料: なし（デジタル商品のため）</li>
                    <li>決済手数料: 無料</li>
                </ul>
            </div>

            <!-- 支払方法 -->
            <div class="border-b border-gray-800 pb-6">
                <h2 class="text-xl font-light mb-3 text-white">支払方法</h2>
                <p class="leading-relaxed">クレジットカード決済（Visa、Mastercard、American Express、JCB）</p>
            </div>

            <!-- 支払時期 -->
            <div class="border-b border-gray-800 pb-6">
                <h2 class="text-xl font-light mb-3 text-white">支払時期</h2>
                <p class="leading-relaxed">ご注文時に即時処理されます</p>
            </div>

            <!-- 商品の引渡時期 -->
            <div class="border-b border-gray-800 pb-6">
                <h2 class="text-xl font-light mb-3 text-white">商品の引渡時期</h2>
                <p class="leading-relaxed">決済完了後、すぐにダウンロード可能</p>
            </div>

            <!-- 返品・交換について -->
            <div class="border-b border-gray-800 pb-6">
                <h2 class="text-xl font-light mb-3 text-white">返品・交換について</h2>

                <div class="space-y-3">
                    <p class="leading-relaxed"><strong>ダウンロード後：</strong></p>
                    <p class="ml-4">デジタル商品の性質上、ダウンロード後の返品・返金はお受けできません。</p>

                    <p class="leading-relaxed mt-4"><strong>ダウンロード前：</strong></p>
                    <p class="ml-4">ご購入後24時間以内にカスタマーサポート（support@sd-create.jp）までご連絡いただくことで、返金対応いたします。</p>

                    <p class="leading-relaxed mt-4"><strong>不良品の場合：</strong></p>
                    <p class="ml-4">商品に不具合がある場合は、カスタマーサポート（support@sd-create.jp）までご連絡ください。確認の上、返金または代替商品の提供にて対応させていただきます。</p>
                </div>
            </div>

            <!-- その他 -->
            <div class="pb-6">
                <h2 class="text-xl font-light mb-3 text-white">その他</h2>
                <div class="space-y-2 ml-4">
                    <p class="leading-relaxed">ご注文内容や取引に関するお問い合わせは、上記のメールアドレスにてお受けいたします。</p>
                    <p class="leading-relaxed">お客様の個人情報については、弊社プライバシーポリシーに基づき、適切に管理いたします。</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
