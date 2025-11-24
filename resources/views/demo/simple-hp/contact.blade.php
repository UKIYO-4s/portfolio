@extends('demo.simple-hp.layouts.app')

@section('title', 'お問い合わせ')

@section('content')
<!-- Page Header -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-8 text-center">
        <h1 class="text-5xl font-light text-gray-900 mb-4">お問い合わせ</h1>
        <p class="text-gray-600 font-light">Contact Us</p>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-2xl mx-auto px-8">
        <div class="text-center mb-12">
            <p class="text-gray-600 font-light leading-relaxed">
                サービスに関するご質問、お見積もりのご依頼など、お気軽にお問い合わせください。<br>
                担当者より2営業日以内にご連絡いたします。
            </p>
        </div>

        <form onsubmit="event.preventDefault(); alert('この機能はデモです。実際の送信は行われません。');" class="bg-white p-10 border border-gray-200">
            <div class="space-y-6">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm text-gray-700 mb-2 font-light">
                        お名前 <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        required
                        class="w-full px-4 py-3 border border-gray-300 focus:border-gray-900 focus:ring-0 bg-white text-gray-900 font-light"
                        placeholder="山田 太郎"
                    >
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm text-gray-700 mb-2 font-light">
                        メールアドレス <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        required
                        class="w-full px-4 py-3 border border-gray-300 focus:border-gray-900 focus:ring-0 bg-white text-gray-900 font-light"
                        placeholder="example@email.com"
                    >
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-sm text-gray-700 mb-2 font-light">
                        電話番号
                    </label>
                    <input
                        type="tel"
                        id="phone"
                        name="phone"
                        class="w-full px-4 py-3 border border-gray-300 focus:border-gray-900 focus:ring-0 bg-white text-gray-900 font-light"
                        placeholder="03-1234-5678"
                    >
                </div>

                <!-- Subject -->
                <div>
                    <label for="subject" class="block text-sm text-gray-700 mb-2 font-light">
                        件名 <span class="text-red-500">*</span>
                    </label>
                    <select
                        id="subject"
                        name="subject"
                        required
                        class="w-full px-4 py-3 border border-gray-300 focus:border-gray-900 focus:ring-0 bg-white text-gray-900 font-light"
                    >
                        <option value="">選択してください</option>
                        <option value="website">Webサイト制作について</option>
                        <option value="system">システム開発について</option>
                        <option value="marketing">デジタルマーケティングについて</option>
                        <option value="estimate">お見積もり依頼</option>
                        <option value="other">その他</option>
                    </select>
                </div>

                <!-- Message -->
                <div>
                    <label for="message" class="block text-sm text-gray-700 mb-2 font-light">
                        お問い合わせ内容 <span class="text-red-500">*</span>
                    </label>
                    <textarea
                        id="message"
                        name="message"
                        required
                        rows="6"
                        class="w-full px-4 py-3 border border-gray-300 focus:border-gray-900 focus:ring-0 bg-white text-gray-900 font-light resize-none"
                        placeholder="お問い合わせ内容をご記入ください"
                    ></textarea>
                </div>

                <!-- Privacy Policy -->
                <div>
                    <label class="flex items-start">
                        <input type="checkbox" required class="mt-1 mr-3 border-gray-300">
                        <span class="text-sm text-gray-600 font-light">
                            <a href="#" class="underline hover:text-gray-900">プライバシーポリシー</a>に同意します
                        </span>
                    </label>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button
                        type="submit"
                        class="w-full bg-gray-900 text-white text-sm px-8 py-4 hover:bg-gray-800 transition-colors font-light"
                    >
                        送信する
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- Contact Info Section -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-8">
        <h2 class="text-3xl font-light text-gray-900 text-center mb-16">その他のお問い合わせ方法</h2>

        <div class="grid md:grid-cols-3 gap-12">
            <!-- Phone -->
            <div class="text-center">
                <div class="w-16 h-16 border border-gray-300 flex items-center justify-center mx-auto mb-6">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                </div>
                <h3 class="font-light text-gray-900 mb-3">お電話</h3>
                <p class="text-gray-600 text-sm mb-3 font-light">平日 9:00-18:00</p>
                <a href="tel:03-1234-5678" class="text-gray-900 hover:underline font-light">03-1234-5678</a>
            </div>

            <!-- Email -->
            <div class="text-center">
                <div class="w-16 h-16 border border-gray-300 flex items-center justify-center mx-auto mb-6">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="font-light text-gray-900 mb-3">メール</h3>
                <p class="text-gray-600 text-sm mb-3 font-light">24時間受付</p>
                <a href="mailto:info@sample-corp.jp" class="text-gray-900 hover:underline font-light">info@sample-corp.jp</a>
            </div>

            <!-- Office -->
            <div class="text-center">
                <div class="w-16 h-16 border border-gray-300 flex items-center justify-center mx-auto mb-6">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h3 class="font-light text-gray-900 mb-3">オフィス</h3>
                <p class="text-gray-700 text-sm font-light leading-relaxed">
                    〒100-0005<br>
                    東京都千代田区<br>
                    丸の内1-1-1
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
