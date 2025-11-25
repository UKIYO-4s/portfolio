@extends('demo.custom-hp.layouts.app')

@section('title', 'お問い合わせ')

@section('content')
<!-- Page Header -->
<section class="pt-32 pb-20 px-6 lg:px-8">
    <div class="max-w-5xl mx-auto text-center">
        <span class="text-xs font-normal text-gray-500 tracking-widest uppercase mb-4 block">Contact</span>
        <h1 class="text-5xl md:text-6xl font-light text-gray-900 mb-8 leading-tight">お問い合わせ</h1>
        <p class="text-lg text-gray-600 font-light leading-relaxed max-w-2xl mx-auto">
            サービスに関するご質問やお見積もりのご依頼など、<br class="hidden md:block">
            お気軽にお問い合わせください。
        </p>
    </div>
</section>

<!-- Contact Info Cards -->
<section class="py-20 px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <div class="grid md:grid-cols-3 gap-8 mb-20">
            <!-- Phone -->
            <div class="glass-card rounded-3xl p-8 text-center">
                <div class="w-16 h-16 rounded-full bg-gradient-to-br from-orange-200/60 to-orange-300/40 flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-light text-gray-900 mb-3">お電話</h3>
                <p class="text-2xl font-light text-gray-900 mb-2">03-1234-5678</p>
                <p class="text-xs text-gray-600 font-light">平日 9:00 - 18:00</p>
            </div>

            <!-- Email -->
            <div class="glass-card rounded-3xl p-8 text-center">
                <div class="w-16 h-16 rounded-full bg-gradient-to-br from-pink-200/60 to-pink-300/40 flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-light text-gray-900 mb-3">メール</h3>
                <p class="text-lg font-light text-gray-900 mb-2">info@creative-corp.jp</p>
                <p class="text-xs text-gray-600 font-light">24時間受付</p>
            </div>

            <!-- Location -->
            <div class="glass-card rounded-3xl p-8 text-center">
                <div class="w-16 h-16 rounded-full bg-gradient-to-br from-orange-200/60 to-pink-200/40 flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-light text-gray-900 mb-3">オフィス</h3>
                <p class="text-sm font-light text-gray-900 mb-1">東京都渋谷区恵比寿1-1-1</p>
                <p class="text-xs text-gray-600 font-light">恵比寿駅 徒歩5分</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form -->
<section class="py-20 px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="glass-card-strong rounded-3xl p-12 md:p-16">
            <div class="text-center mb-12">
                <h2 class="text-2xl md:text-3xl font-light text-gray-900 mb-4">お問い合わせフォーム</h2>
                <p class="text-sm text-gray-600 font-light">
                    以下のフォームにご記入の上、送信してください。<br class="hidden md:block">
                    2営業日以内に担当者よりご連絡いたします。
                </p>
            </div>

            <form class="space-y-8">
                <!-- お問い合わせ種別 -->
                <div>
                    <label class="block text-sm font-light text-gray-900 mb-3">
                        お問い合わせ種別 <span class="text-orange-500">*</span>
                    </label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <label class="glass-button rounded-2xl p-4 cursor-pointer hover:bg-white/80 transition-colors flex items-center justify-center">
                            <input type="radio" name="type" value="service" class="sr-only">
                            <span class="text-sm font-light">サービス</span>
                        </label>
                        <label class="glass-button rounded-2xl p-4 cursor-pointer hover:bg-white/80 transition-colors flex items-center justify-center">
                            <input type="radio" name="type" value="estimate" class="sr-only">
                            <span class="text-sm font-light">お見積もり</span>
                        </label>
                        <label class="glass-button rounded-2xl p-4 cursor-pointer hover:bg-white/80 transition-colors flex items-center justify-center">
                            <input type="radio" name="type" value="recruit" class="sr-only">
                            <span class="text-sm font-light">採用</span>
                        </label>
                        <label class="glass-button rounded-2xl p-4 cursor-pointer hover:bg-white/80 transition-colors flex items-center justify-center">
                            <input type="radio" name="type" value="other" class="sr-only">
                            <span class="text-sm font-light">その他</span>
                        </label>
                    </div>
                </div>

                <!-- 会社名 -->
                <div>
                    <label class="block text-sm font-light text-gray-900 mb-3">
                        会社名
                    </label>
                    <input
                        type="text"
                        class="glass-card w-full rounded-2xl px-6 py-4 text-sm font-light text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-300/50 transition-all"
                        placeholder="株式会社サンプル"
                    >
                </div>

                <!-- お名前 -->
                <div>
                    <label class="block text-sm font-light text-gray-900 mb-3">
                        お名前 <span class="text-orange-500">*</span>
                    </label>
                    <div class="grid md:grid-cols-2 gap-4">
                        <input
                            type="text"
                            class="glass-card w-full rounded-2xl px-6 py-4 text-sm font-light text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-300/50 transition-all"
                            placeholder="山田"
                        >
                        <input
                            type="text"
                            class="glass-card w-full rounded-2xl px-6 py-4 text-sm font-light text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-300/50 transition-all"
                            placeholder="太郎"
                        >
                    </div>
                </div>

                <!-- メールアドレス -->
                <div>
                    <label class="block text-sm font-light text-gray-900 mb-3">
                        メールアドレス <span class="text-orange-500">*</span>
                    </label>
                    <input
                        type="email"
                        class="glass-card w-full rounded-2xl px-6 py-4 text-sm font-light text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-300/50 transition-all"
                        placeholder="example@email.com"
                    >
                </div>

                <!-- 電話番号 -->
                <div>
                    <label class="block text-sm font-light text-gray-900 mb-3">
                        電話番号
                    </label>
                    <input
                        type="tel"
                        class="glass-card w-full rounded-2xl px-6 py-4 text-sm font-light text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-300/50 transition-all"
                        placeholder="03-1234-5678"
                    >
                </div>

                <!-- お問い合わせ内容 -->
                <div>
                    <label class="block text-sm font-light text-gray-900 mb-3">
                        お問い合わせ内容 <span class="text-orange-500">*</span>
                    </label>
                    <textarea
                        rows="8"
                        class="glass-card w-full rounded-2xl px-6 py-4 text-sm font-light text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-orange-300/50 transition-all resize-none"
                        placeholder="お問い合わせ内容をご記入ください"
                    ></textarea>
                </div>

                <!-- プライバシーポリシー -->
                <div>
                    <label class="flex items-start gap-3 cursor-pointer">
                        <input type="checkbox" class="mt-1 w-5 h-5 rounded border-gray-300">
                        <span class="text-sm font-light text-gray-700 leading-relaxed">
                            <a href="#" class="text-orange-600 hover:text-orange-700 underline">プライバシーポリシー</a>に同意します
                        </span>
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="text-center pt-6">
                    <button type="submit" class="glass-button-primary px-12 py-4 rounded-full text-sm font-light inline-flex items-center gap-2">
                        送信する
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>
                    <p class="text-xs text-gray-500 font-light mt-6">
                        ※ このフォームはデモ用です。実際には送信されません。
                    </p>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-20 px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-light text-gray-900 mb-4">アクセス</h2>
            <p class="text-sm text-gray-600 font-light">お気軽にお越しください</p>
        </div>

        <div class="glass-card rounded-3xl overflow-hidden">
            <div class="aspect-[21/9] bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                <div class="text-center">
                    <svg class="w-20 h-20 mx-auto text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                    </svg>
                    <p class="text-gray-600 font-light">Map Placeholder</p>
                    <p class="text-gray-500 text-sm font-light mt-2">東京都渋谷区恵比寿1-1-1</p>
                </div>
            </div>

            <div class="p-8 md:p-12 bg-white/40">
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-lg font-light text-gray-900 mb-4">電車でお越しの場合</h3>
                        <ul class="space-y-2 text-sm text-gray-700 font-light">
                            <li>• JR山手線・埼京線 恵比寿駅 東口より徒歩5分</li>
                            <li>• 東京メトロ日比谷線 恵比寿駅 1番出口より徒歩5分</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-light text-gray-900 mb-4">お車でお越しの場合</h3>
                        <p class="text-sm text-gray-700 font-light leading-relaxed">
                            近隣のコインパーキングをご利用ください。<br>
                            ※ 専用駐車場はございません。
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-light text-gray-900 mb-4">よくあるご質問</h2>
            <p class="text-sm text-gray-600 font-light">お問い合わせの前にご確認ください</p>
        </div>

        <div class="space-y-4">
            <div class="glass-card rounded-2xl p-6">
                <h3 class="text-base font-light text-gray-900 mb-2">Q. 対応エリアを教えてください</h3>
                <p class="text-sm text-gray-600 font-light leading-relaxed pl-6">
                    A. 全国対応しております。オンラインでのお打ち合わせも可能です。
                </p>
            </div>

            <div class="glass-card rounded-2xl p-6">
                <h3 class="text-base font-light text-gray-900 mb-2">Q. 見積もりは無料ですか？</h3>
                <p class="text-sm text-gray-600 font-light leading-relaxed pl-6">
                    A. はい、お見積もりは無料です。お気軽にお問い合わせください。
                </p>
            </div>

            <div class="glass-card rounded-2xl p-6">
                <h3 class="text-base font-light text-gray-900 mb-2">Q. 返信までどのくらいかかりますか？</h3>
                <p class="text-sm text-gray-600 font-light leading-relaxed pl-6">
                    A. 通常2営業日以内にご返信いたします。お急ぎの場合はお電話にてお問い合わせください。
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
