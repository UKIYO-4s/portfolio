@extends('demo.simple-hp.layouts.app')

@section('title', 'お問い合わせ')

@section('content')
<!-- Page Header -->
<section class="py-24 bg-gradient-to-br from-gray-50 via-emerald-50/30 to-gray-50">
    <div class="max-w-6xl mx-auto px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">お問い合わせ</h1>
        <p class="text-gray-600">Contact</p>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-24 bg-white">
    <div class="max-w-2xl mx-auto px-8">
        <div class="text-center mb-12">
            <p class="text-gray-600 leading-relaxed">
                サービスに関するご質問、お見積もりのご依頼など、お気軽にお問い合わせください。<br>
                2営業日以内にご連絡いたします。
            </p>
        </div>

        <form onsubmit="event.preventDefault(); alert('この機能はデモです。実際の送信は行われません。');" class="bg-gradient-to-br from-gray-50 via-emerald-50/20 to-gray-50 p-8 md:p-10 rounded-2xl shadow-lg border border-gray-200">
            <div class="space-y-6">
                <!-- Company -->
                <div>
                    <label for="company" class="block text-sm font-semibold text-gray-700 mb-2">
                        会社名
                    </label>
                    <input
                        type="text"
                        id="company"
                        name="company"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600 focus:ring-opacity-20 bg-white text-gray-900 transition-all"
                        placeholder="株式会社サンプル"
                    >
                </div>

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                        お名前 <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600 focus:ring-opacity-20 bg-white text-gray-900 transition-all"
                        placeholder="山田 太郎"
                    >
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        メールアドレス <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600 focus:ring-opacity-20 bg-white text-gray-900 transition-all"
                        placeholder="example@company.co.jp"
                    >
                </div>

                <!-- Subject -->
                <div>
                    <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">
                        ご用件 <span class="text-red-500">*</span>
                    </label>
                    <select
                        id="subject"
                        name="subject"
                        required
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600 focus:ring-opacity-20 bg-white text-gray-900 transition-all"
                    >
                        <option value="">選択してください</option>
                        <option value="corporate">コーポレートサイト制作について</option>
                        <option value="lp">LP・キャンペーン制作について</option>
                        <option value="guideline">Webガイドライン設計について</option>
                        <option value="estimate">お見積もり依頼</option>
                        <option value="other">その他</option>
                    </select>
                </div>

                <!-- Message -->
                <div>
                    <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">
                        メッセージ <span class="text-red-500">*</span>
                    </label>
                    <textarea
                        id="message"
                        name="message"
                        required
                        rows="6"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:border-emerald-600 focus:ring-2 focus:ring-emerald-600 focus:ring-opacity-20 bg-white text-gray-900 transition-all resize-none"
                        placeholder="お問い合わせ内容をご記入ください"
                    ></textarea>
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="w-full bg-emerald-600 text-white text-base font-semibold px-10 py-4 rounded-lg hover:bg-emerald-700 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5"
                >
                    送信する
                </button>
            </div>
        </form>
    </div>
</section>

<!-- Contact Info Section -->
<section class="py-24 bg-gradient-to-br from-gray-50 via-emerald-50/30 to-gray-50">
    <div class="max-w-4xl mx-auto px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">その他の連絡方法</h2>
            <div class="w-16 h-1 bg-emerald-600 mx-auto"></div>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Email Card -->
            <div class="bg-white p-8 rounded-2xl shadow-md border border-gray-200 text-center hover:shadow-lg transition-shadow duration-300">
                <div class="w-16 h-16 bg-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">メール</h3>
                <p class="text-gray-600 mb-4">お気軽にメールでご連絡ください</p>
                <a href="mailto:info@greenline-studio.jp" class="text-emerald-600 hover:text-emerald-700 font-semibold">
                    info@greenline-studio.jp
                </a>
            </div>

            <!-- Business Hours Card -->
            <div class="bg-white p-8 rounded-2xl shadow-md border border-gray-200 text-center hover:shadow-lg transition-shadow duration-300">
                <div class="w-16 h-16 bg-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">営業時間</h3>
                <p class="text-gray-600 mb-2">平日 10:00 - 18:00</p>
                <p class="text-sm text-gray-500">（土日祝日は休業）</p>
            </div>
        </div>

        <!-- Address -->
        <div class="mt-8 bg-white p-8 rounded-2xl shadow-md border border-gray-200 text-center hover:shadow-lg transition-shadow duration-300">
            <div class="w-16 h-16 bg-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-3">所在地</h3>
            <p class="text-gray-600">
                〒150-0001<br>
                東京都渋谷区神宮前3-1-1
            </p>
        </div>
    </div>
</section>
@endsection
