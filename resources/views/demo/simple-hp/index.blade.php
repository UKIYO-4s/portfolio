@extends('demo.simple-hp.layouts.app')

@section('title', 'ホーム')

@section('content')
<!-- Hero Section -->
<section class="relative bg-white py-20">
    <div class="max-w-6xl mx-auto px-8">
        <!-- Hero Text -->
        <div class="text-center mb-16">
            <h1 class="text-5xl md:text-6xl font-light text-gray-900 mb-6 leading-tight">
                ビジネスの成長を<br class="md:hidden">サポートします
            </h1>
            <p class="text-lg md:text-xl text-gray-600 font-light leading-relaxed mb-12">
                最新のテクノロジーとクリエイティブな発想で、<br>
                お客様のビジネスを次のステージへ
            </p>
            <a href="{{ route('demo.simple-hp.contact') }}" class="inline-block bg-gray-900 text-white text-sm px-10 py-4 hover:bg-gray-800 transition-colors font-light">
                お問い合わせ
            </a>
        </div>

        <!-- Hero Image Placeholder -->
        <div class="flex justify-center">
            <div class="w-[1200px] h-[600px] bg-gray-100 border border-gray-300 flex items-center justify-center">
                <div class="text-center">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <p class="text-gray-600 text-sm font-light">Hero Image</p>
                    <p class="text-gray-400 text-xs mt-1">1200 × 600</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-8">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-light text-gray-900 mb-4">サービス</h2>
            <p class="text-gray-600 font-light">私たちが提供する価値</p>
        </div>

        <div class="grid md:grid-cols-3 gap-12">
            <!-- Service 1 -->
            <div class="bg-white">
                <div class="mb-6">
                    <div class="w-[400px] h-[300px] bg-gray-100 border border-gray-300 flex items-center justify-center mx-auto">
                        <div class="text-center">
                            <svg class="w-12 h-12 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-gray-400 text-xs">400 × 300</p>
                        </div>
                    </div>
                </div>
                <h3 class="text-xl font-light text-gray-900 mb-3">Webサイト制作</h3>
                <p class="text-sm text-gray-600 font-light leading-relaxed">
                    レスポンシブ対応の美しいウェブサイトを制作します。ユーザー体験を重視したデザインで、ビジネスの成果につながるサイトを実現します。
                </p>
            </div>

            <!-- Service 2 -->
            <div class="bg-white">
                <div class="mb-6">
                    <div class="w-[400px] h-[300px] bg-gray-200 border border-gray-300 flex items-center justify-center mx-auto">
                        <div class="text-center">
                            <svg class="w-12 h-12 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-gray-400 text-xs">400 × 300</p>
                        </div>
                    </div>
                </div>
                <h3 class="text-xl font-light text-gray-900 mb-3">システム開発</h3>
                <p class="text-sm text-gray-600 font-light leading-relaxed">
                    業務効率化を実現するシステムを開発します。最新の技術を活用し、安全で使いやすいシステムを提供します。
                </p>
            </div>

            <!-- Service 3 -->
            <div class="bg-white">
                <div class="mb-6">
                    <div class="w-[400px] h-[300px] bg-gray-100 border border-gray-300 flex items-center justify-center mx-auto">
                        <div class="text-center">
                            <svg class="w-12 h-12 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-gray-400 text-xs">400 × 300</p>
                        </div>
                    </div>
                </div>
                <h3 class="text-xl font-light text-gray-900 mb-3">デジタルマーケティング</h3>
                <p class="text-sm text-gray-600 font-light leading-relaxed">
                    SEO対策からSNS運用まで、総合的なデジタルマーケティングをサポートします。データに基づいた戦略で成果を最大化します。
                </p>
            </div>
        </div>

        <div class="text-center mt-16">
            <a href="{{ route('demo.simple-hp.service') }}" class="inline-block text-sm text-gray-700 border border-gray-300 px-8 py-3 hover:bg-gray-50 transition-colors font-light">
                サービス一覧を見る
            </a>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-8">
        <div class="grid md:grid-cols-2 gap-16 items-center">
            <!-- Image Placeholder -->
            <div class="order-2 md:order-1">
                <div class="w-[600px] h-[400px] bg-gray-100 border border-gray-300 flex items-center justify-center">
                    <div class="text-center">
                        <svg class="w-16 h-16 mx-auto text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-gray-600 text-sm font-light">About Image</p>
                        <p class="text-gray-400 text-xs mt-1">600 × 400</p>
                    </div>
                </div>
            </div>

            <!-- Text Content -->
            <div class="order-1 md:order-2">
                <h2 class="text-4xl font-light text-gray-900 mb-6">私たちについて</h2>
                <p class="text-gray-600 font-light leading-relaxed mb-6">
                    私たちは、最新のテクノロジーとクリエイティブな発想で、お客様のビジネスの成長をサポートしています。
                </p>
                <p class="text-gray-600 font-light leading-relaxed mb-8">
                    常にお客様の視点に立ち、最適なソリューションを提供することで、社会に貢献してまいります。
                </p>
                <a href="{{ route('demo.simple-hp.about') }}" class="inline-block text-sm text-gray-700 border border-gray-300 px-6 py-2 hover:bg-gray-50 transition-colors font-light">
                    詳しく見る
                </a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-4xl mx-auto px-8 text-center">
        <h2 class="text-3xl font-light text-gray-900 mb-6">お気軽にご相談ください</h2>
        <p class="text-gray-600 font-light leading-relaxed mb-10">
            サービスに関するご質問、お見積もりのご依頼など、<br>
            お気軽にお問い合わせください。担当者より2営業日以内にご連絡いたします。
        </p>
        <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
            <div class="flex items-center gap-2 text-gray-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
                <span class="font-light">03-1234-5678</span>
            </div>
            <span class="hidden sm:block text-gray-300">|</span>
            <a href="{{ route('demo.simple-hp.contact') }}" class="text-gray-700 hover:text-gray-900 font-light">
                お問い合わせフォーム →
            </a>
        </div>
    </div>
</section>
@endsection
