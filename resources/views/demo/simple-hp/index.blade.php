@extends('demo.simple-hp.layouts.app')

@section('title', 'ホーム')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-b from-gray-50 to-white py-24 md:py-32">
    <div class="max-w-6xl mx-auto px-8">
        <!-- Hero Text -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-6xl font-semibold text-gray-900 mb-6 leading-tight">
                ビジネスの成長を<br class="md:hidden">サポートします
            </h1>
            <p class="text-lg md:text-xl text-gray-600 leading-relaxed mb-10 max-w-3xl mx-auto">
                最新のテクノロジーとクリエイティブな発想で、<br>
                お客様のビジネスを次のステージへ
            </p>
            <a href="{{ route('demo.simple-hp.contact') }}" class="inline-block bg-gray-900 text-white text-base px-8 py-4 rounded-lg hover:bg-gray-800 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
                お問い合わせ
            </a>
        </div>

        <!-- Hero Image Placeholder -->
        <div class="mt-16">
            <div class="w-full max-w-5xl mx-auto aspect-[2/1] bg-gradient-to-br from-gray-100 to-gray-200 rounded-2xl shadow-lg border border-gray-200 flex items-center justify-center">
                <div class="text-center">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <p class="text-gray-600 text-sm">Hero Image</p>
                    <p class="text-gray-400 text-xs mt-1">1200 × 600</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-24 bg-white">
    <div class="max-w-6xl mx-auto px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-semibold text-gray-900 mb-3">サービス</h2>
            <p class="text-gray-600">私たちが提供する価値</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Service 1 -->
            <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden group">
                <div class="mb-6">
                    <div class="w-full aspect-[4/3] bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center group-hover:from-gray-200 group-hover:to-gray-300 transition-colors duration-300">
                        <div class="text-center">
                            <svg class="w-12 h-12 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-gray-400 text-xs">400 × 300</p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Webサイト制作</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        レスポンシブ対応の美しいウェブサイトを制作します。ユーザー体験を重視したデザインで、ビジネスの成果につながるサイトを実現します。
                    </p>
                </div>
            </div>

            <!-- Service 2 -->
            <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden group">
                <div class="mb-6">
                    <div class="w-full aspect-[4/3] bg-gradient-to-br from-gray-200 to-gray-300 flex items-center justify-center group-hover:from-gray-300 group-hover:to-gray-400 transition-colors duration-300">
                        <div class="text-center">
                            <svg class="w-12 h-12 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-gray-400 text-xs">400 × 300</p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">システム開発</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        業務効率化を実現するシステムを開発します。最新の技術を活用し、安全で使いやすいシステムを提供します。
                    </p>
                </div>
            </div>

            <!-- Service 3 -->
            <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden group">
                <div class="mb-6">
                    <div class="w-full aspect-[4/3] bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center group-hover:from-gray-200 group-hover:to-gray-300 transition-colors duration-300">
                        <div class="text-center">
                            <svg class="w-12 h-12 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-gray-400 text-xs">400 × 300</p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">デジタルマーケティング</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        SEO対策からSNS運用まで、総合的なデジタルマーケティングをサポートします。データに基づいた戦略で成果を最大化します。
                    </p>
                </div>
            </div>
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('demo.simple-hp.service') }}" class="inline-block text-sm text-gray-700 border-2 border-gray-300 px-8 py-3 rounded-lg hover:bg-gray-50 hover:border-gray-400 transition-all duration-300">
                サービス一覧を見る
            </a>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-24 bg-gray-50">
    <div class="max-w-6xl mx-auto px-8">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <!-- Image Placeholder -->
            <div class="order-2 md:order-1">
                <div class="w-full aspect-[3/2] bg-gradient-to-br from-gray-100 to-gray-200 rounded-2xl shadow-lg border border-gray-200 flex items-center justify-center">
                    <div class="text-center">
                        <svg class="w-16 h-16 mx-auto text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-gray-600 text-sm">About Image</p>
                        <p class="text-gray-400 text-xs mt-1">600 × 400</p>
                    </div>
                </div>
            </div>

            <!-- Text Content -->
            <div class="order-1 md:order-2">
                <h2 class="text-3xl md:text-4xl font-semibold text-gray-900 mb-6">私たちについて</h2>
                <p class="text-gray-600 leading-relaxed mb-6">
                    私たちは、最新のテクノロジーとクリエイティブな発想で、お客様のビジネスの成長をサポートしています。
                </p>
                <p class="text-gray-600 leading-relaxed mb-8">
                    常にお客様の視点に立ち、最適なソリューションを提供することで、社会に貢献してまいります。
                </p>
                <a href="{{ route('demo.simple-hp.about') }}" class="inline-block text-sm text-gray-700 border-2 border-gray-300 px-6 py-3 rounded-lg hover:bg-white hover:border-gray-400 transition-all duration-300">
                    詳しく見る
                </a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-semibold text-gray-900 mb-6">お気軽にご相談ください</h2>
        <p class="text-gray-600 leading-relaxed mb-10">
            サービスに関するご質問、お見積もりのご依頼など、<br>
            お気軽にお問い合わせください。担当者より2営業日以内にご連絡いたします。
        </p>
        <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
            <div class="flex items-center gap-3 text-gray-800 font-medium">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
                <span>03-1234-5678</span>
            </div>
            <span class="hidden sm:block text-gray-300">|</span>
            <a href="{{ route('demo.simple-hp.contact') }}" class="text-gray-700 hover:text-gray-900 transition-colors inline-flex items-center">
                お問い合わせフォーム
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>
</section>
@endsection
