@extends('demo.custom-hp.layouts.app')

@section('title', 'お問い合わせ')

@section('content')
<!-- Page Header -->
<section class="pt-32 pb-16 px-8">
    <div class="max-w-4xl mx-auto text-center">
        <span class="text-xs font-medium text-[#6B6B6B] tracking-widest uppercase mb-4 block">Contact</span>
        <h1 class="text-4xl md:text-5xl font-semibold text-[#121212] mb-6 leading-tight">お問い合わせ</h1>
        <p class="text-lg text-[#6B6B6B] leading-relaxed max-w-2xl mx-auto">
            サービスに関するご質問やお見積もりのご依頼など、<br class="hidden md:block">
            お気軽にお問い合わせください。
        </p>
    </div>
</section>

<!-- Contact Info Cards -->
<section class="py-16 px-8">
    <div class="max-w-5xl mx-auto">
        <div class="grid md:grid-cols-3 gap-6 mb-16">
            <!-- Phone -->
            <div class="glass-card-minimal p-6 text-center">
                <div class="icon-minimal mx-auto mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                </div>
                <h3 class="text-base font-medium text-[#121212] mb-2">お電話</h3>
                <p class="text-xl font-medium text-[#121212] mb-1">03-1234-5678</p>
                <p class="text-xs text-[#6B6B6B]">平日 9:00 - 18:00</p>
            </div>

            <!-- Email -->
            <div class="glass-card-minimal p-6 text-center">
                <div class="icon-minimal mx-auto mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-base font-medium text-[#121212] mb-2">メール</h3>
                <p class="text-base font-medium text-[#121212] mb-1">info@creative-studio.jp</p>
                <p class="text-xs text-[#6B6B6B]">24時間受付</p>
            </div>

            <!-- Location -->
            <div class="glass-card-minimal p-6 text-center">
                <div class="icon-minimal mx-auto mb-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h3 class="text-base font-medium text-[#121212] mb-2">オフィス</h3>
                <p class="text-sm font-medium text-[#121212] mb-1">東京都渋谷区恵比寿1-1-1</p>
                <p class="text-xs text-[#6B6B6B]">恵比寿駅 徒歩5分</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form -->
<section class="py-16 px-8">
    <div class="max-w-3xl mx-auto">
        <div class="glass-card-minimal p-10 md:p-14">
            <div class="text-center mb-10">
                <h2 class="text-xl md:text-2xl font-semibold text-[#121212] mb-3">お問い合わせフォーム</h2>
                <p class="text-sm text-[#6B6B6B]">
                    以下のフォームにご記入の上、送信してください。<br class="hidden md:block">
                    2営業日以内に担当者よりご連絡いたします。
                </p>
            </div>

            <form class="space-y-6">
                <!-- お問い合わせ種別 -->
                <div>
                    <label class="block text-sm font-medium text-[#121212] mb-3">
                        お問い合わせ種別 <span class="text-[#1F3A2E]">*</span>
                    </label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <label class="glass-card-minimal p-3 cursor-pointer hover:bg-white/60 transition-colors flex items-center justify-center text-center">
                            <input type="radio" name="type" value="service" class="sr-only">
                            <span class="text-sm text-[#121212]">サービス</span>
                        </label>
                        <label class="glass-card-minimal p-3 cursor-pointer hover:bg-white/60 transition-colors flex items-center justify-center text-center">
                            <input type="radio" name="type" value="estimate" class="sr-only">
                            <span class="text-sm text-[#121212]">お見積もり</span>
                        </label>
                        <label class="glass-card-minimal p-3 cursor-pointer hover:bg-white/60 transition-colors flex items-center justify-center text-center">
                            <input type="radio" name="type" value="recruit" class="sr-only">
                            <span class="text-sm text-[#121212]">採用</span>
                        </label>
                        <label class="glass-card-minimal p-3 cursor-pointer hover:bg-white/60 transition-colors flex items-center justify-center text-center">
                            <input type="radio" name="type" value="other" class="sr-only">
                            <span class="text-sm text-[#121212]">その他</span>
                        </label>
                    </div>
                </div>

                <!-- 会社名 -->
                <div>
                    <label class="block text-sm font-medium text-[#121212] mb-2">
                        会社名
                    </label>
                    <input
                        type="text"
                        class="w-full rounded-xl border border-[rgba(0,0,0,0.08)] bg-white/60 px-4 py-3 text-sm text-[#121212] placeholder-[#6B6B6B] focus:outline-none focus:ring-2 focus:ring-[#1F3A2E]/20 focus:border-[#1F3A2E]/30 transition-all"
                        placeholder="株式会社サンプル"
                    >
                </div>

                <!-- お名前 -->
                <div>
                    <label class="block text-sm font-medium text-[#121212] mb-2">
                        お名前 <span class="text-[#1F3A2E]">*</span>
                    </label>
                    <div class="grid md:grid-cols-2 gap-3">
                        <input
                            type="text"
                            class="w-full rounded-xl border border-[rgba(0,0,0,0.08)] bg-white/60 px-4 py-3 text-sm text-[#121212] placeholder-[#6B6B6B] focus:outline-none focus:ring-2 focus:ring-[#1F3A2E]/20 focus:border-[#1F3A2E]/30 transition-all"
                            placeholder="山田"
                        >
                        <input
                            type="text"
                            class="w-full rounded-xl border border-[rgba(0,0,0,0.08)] bg-white/60 px-4 py-3 text-sm text-[#121212] placeholder-[#6B6B6B] focus:outline-none focus:ring-2 focus:ring-[#1F3A2E]/20 focus:border-[#1F3A2E]/30 transition-all"
                            placeholder="太郎"
                        >
                    </div>
                </div>

                <!-- メールアドレス -->
                <div>
                    <label class="block text-sm font-medium text-[#121212] mb-2">
                        メールアドレス <span class="text-[#1F3A2E]">*</span>
                    </label>
                    <input
                        type="email"
                        class="w-full rounded-xl border border-[rgba(0,0,0,0.08)] bg-white/60 px-4 py-3 text-sm text-[#121212] placeholder-[#6B6B6B] focus:outline-none focus:ring-2 focus:ring-[#1F3A2E]/20 focus:border-[#1F3A2E]/30 transition-all"
                        placeholder="example@email.com"
                    >
                </div>

                <!-- 電話番号 -->
                <div>
                    <label class="block text-sm font-medium text-[#121212] mb-2">
                        電話番号
                    </label>
                    <input
                        type="tel"
                        class="w-full rounded-xl border border-[rgba(0,0,0,0.08)] bg-white/60 px-4 py-3 text-sm text-[#121212] placeholder-[#6B6B6B] focus:outline-none focus:ring-2 focus:ring-[#1F3A2E]/20 focus:border-[#1F3A2E]/30 transition-all"
                        placeholder="03-1234-5678"
                    >
                </div>

                <!-- お問い合わせ内容 -->
                <div>
                    <label class="block text-sm font-medium text-[#121212] mb-2">
                        お問い合わせ内容 <span class="text-[#1F3A2E]">*</span>
                    </label>
                    <textarea
                        rows="6"
                        class="w-full rounded-xl border border-[rgba(0,0,0,0.08)] bg-white/50 px-4 py-3 text-sm text-[#121212] placeholder-[#6B6B6B] focus:outline-none focus:ring-2 focus:ring-[#1F3A2E]/20 focus:border-[#1F3A2E]/30 transition-all resize-none"
                        placeholder="お問い合わせ内容をご記入ください"
                    ></textarea>
                </div>

                <!-- プライバシーポリシー -->
                <div>
                    <label class="flex items-start gap-3 cursor-pointer">
                        <input type="checkbox" class="mt-0.5 w-4 h-4 rounded border-[rgba(0,0,0,0.15)] text-[#1F3A2E] focus:ring-[#1F3A2E]/20">
                        <span class="text-sm text-[#6B6B6B] leading-relaxed">
                            <a href="#" class="text-[#1F3A2E] hover:underline">プライバシーポリシー</a>に同意します
                        </span>
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="text-center pt-4">
                    <button type="submit" class="btn-primary px-10 py-3 rounded-full text-sm font-medium inline-flex items-center gap-2">
                        送信する
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </button>
                    <p class="text-xs text-[#6B6B6B] mt-4">
                        ※ このフォームはデモ用です。実際には送信されません。
                    </p>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="py-16 px-8">
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-10">
            <h2 class="text-xl md:text-2xl font-semibold text-[#121212] mb-3">アクセス</h2>
            <p class="text-sm text-[#6B6B6B]">お気軽にお越しください</p>
        </div>

        <div class="glass-card-minimal overflow-hidden">
            <div class="aspect-[21/9] bg-gradient-to-br from-[#EDEBE8] to-[#F7F6F4] flex items-center justify-center">
                <div class="text-center">
                    <svg class="w-16 h-16 mx-auto text-[#6B6B6B]/30 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path>
                    </svg>
                    <p class="text-[#6B6B6B]">Map Placeholder</p>
                    <p class="text-[#6B6B6B]/60 text-sm mt-1">東京都渋谷区恵比寿1-1-1</p>
                </div>
            </div>

            <div class="p-8">
                <div class="grid md:grid-cols-2 gap-8">
                    <div>
                        <h3 class="text-base font-medium text-[#121212] mb-3">電車でお越しの場合</h3>
                        <ul class="space-y-1.5 text-sm text-[#6B6B6B]">
                            <li>・JR山手線・埼京線 恵比寿駅 東口より徒歩5分</li>
                            <li>・東京メトロ日比谷線 恵比寿駅 1番出口より徒歩5分</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-base font-medium text-[#121212] mb-3">お車でお越しの場合</h3>
                        <p class="text-sm text-[#6B6B6B] leading-relaxed">
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
<section class="py-16 px-8">
    <div class="max-w-3xl mx-auto">
        <div class="text-center mb-10">
            <h2 class="text-xl md:text-2xl font-semibold text-[#121212] mb-3">よくあるご質問</h2>
            <p class="text-sm text-[#6B6B6B]">お問い合わせの前にご確認ください</p>
        </div>

        <div class="space-y-4">
            <div class="glass-card-minimal p-5">
                <h3 class="text-sm font-medium text-[#121212] mb-2">Q. 対応エリアを教えてください</h3>
                <p class="text-sm text-[#6B6B6B] leading-relaxed pl-4">
                    A. 全国対応しております。オンラインでのお打ち合わせも可能です。
                </p>
            </div>

            <div class="glass-card-minimal p-5">
                <h3 class="text-sm font-medium text-[#121212] mb-2">Q. 見積もりは無料ですか？</h3>
                <p class="text-sm text-[#6B6B6B] leading-relaxed pl-4">
                    A. はい、お見積もりは無料です。お気軽にお問い合わせください。
                </p>
            </div>

            <div class="glass-card-minimal p-5">
                <h3 class="text-sm font-medium text-[#121212] mb-2">Q. 返信までどのくらいかかりますか？</h3>
                <p class="text-sm text-[#6B6B6B] leading-relaxed pl-4">
                    A. 通常2営業日以内にご返信いたします。お急ぎの場合はお電話にてお問い合わせください。
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
