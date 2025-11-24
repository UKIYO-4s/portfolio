@extends('demo.simple-hp.layouts.app')

@section('title', 'お問い合わせ')

@section('content')
<!-- Page Header -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 dark:from-blue-800 dark:to-blue-950 text-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-bold text-center">お問い合わせ</h1>
        <p class="text-center text-blue-100 mt-4">Contact Us</p>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-16 bg-white dark:bg-gray-800">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <p class="text-gray-600 dark:text-gray-400">
                サービスに関するご質問、お見積もりのご依頼など、お気軽にお問い合わせください。<br>
                担当者より2営業日以内にご連絡いたします。
            </p>
        </div>

        <form onsubmit="event.preventDefault(); alert('この機能はデモです。実際の送信は行われません。');" class="bg-gray-50 dark:bg-gray-900 p-8 rounded-lg shadow-md">
            <!-- Name -->
            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    お名前 <span class="text-red-500">*</span>
                </label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    required
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-800 dark:text-white"
                    placeholder="山田 太郎"
                >
            </div>

            <!-- Email -->
            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    メールアドレス <span class="text-red-500">*</span>
                </label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    required
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-800 dark:text-white"
                    placeholder="example@email.com"
                >
            </div>

            <!-- Phone -->
            <div class="mb-6">
                <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    電話番号
                </label>
                <input
                    type="tel"
                    id="phone"
                    name="phone"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-800 dark:text-white"
                    placeholder="03-1234-5678"
                >
            </div>

            <!-- Subject -->
            <div class="mb-6">
                <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    件名 <span class="text-red-500">*</span>
                </label>
                <select
                    id="subject"
                    name="subject"
                    required
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-800 dark:text-white"
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
            <div class="mb-6">
                <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    お問い合わせ内容 <span class="text-red-500">*</span>
                </label>
                <textarea
                    id="message"
                    name="message"
                    required
                    rows="6"
                    class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-800 dark:text-white"
                    placeholder="お問い合わせ内容をご記入ください"
                ></textarea>
            </div>

            <!-- Privacy Policy -->
            <div class="mb-6">
                <label class="flex items-start">
                    <input type="checkbox" required class="mt-1 mr-2 rounded">
                    <span class="text-sm text-gray-600 dark:text-gray-400">
                        <a href="#" class="text-blue-600 dark:text-blue-400 hover:underline">プライバシーポリシー</a>に同意します
                    </span>
                </label>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-12 py-3 rounded-lg font-semibold transition-colors"
                >
                    送信する
                </button>
            </div>
        </form>
    </div>
</section>

<!-- Contact Info Section -->
<section class="py-16 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white text-center mb-12">その他のお問い合わせ方法</h2>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Phone -->
            <div class="text-center p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900 dark:text-white mb-2">お電話</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm mb-2">平日 9:00-18:00</p>
                <a href="tel:03-1234-5678" class="text-blue-600 dark:text-blue-400 font-semibold hover:underline">03-1234-5678</a>
            </div>

            <!-- Email -->
            <div class="text-center p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                <div class="w-16 h-16 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900 dark:text-white mb-2">メール</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm mb-2">24時間受付</p>
                <a href="mailto:info@sample-corp.jp" class="text-blue-600 dark:text-blue-400 font-semibold hover:underline">info@sample-corp.jp</a>
            </div>

            <!-- Office -->
            <div class="text-center p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                <div class="w-16 h-16 bg-purple-100 dark:bg-purple-900/30 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900 dark:text-white mb-2">オフィス</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm">
                    〒100-0005<br>
                    東京都千代田区<br>
                    丸の内1-1-1
                </p>
            </div>
        </div>
    </div>
</section>
@endsection
