@extends('demo.simple-hp.layouts.app')

@section('title', 'ホーム')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-gray-50 via-emerald-50/30 to-gray-50 py-16 md:py-20 overflow-hidden">
    <!-- Background Shape -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] bg-gradient-to-br from-emerald-100/40 to-gray-100/40 rounded-full blur-3xl"></div>
    </div>

    <div class="relative max-w-6xl mx-auto px-6 md:px-8">
        <!-- Hero Text -->
        <div class="text-center mb-10">
            <p class="text-emerald-600 font-semibold mb-4">B2Bクリエイティブ・Web制作</p>
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4 leading-tight">
                Greenline Studio
            </h1>
            <p class="text-base md:text-lg text-gray-600 leading-relaxed mb-10 max-w-2xl mx-auto">
                コーポレートサイト、LP、キャンペーンページの企画・制作を通じて、お客様のビジネス成長をサポートします
            </p>
            <a href="{{ route('demo.simple-hp.contact') }}" class="inline-block bg-emerald-600 text-white text-base px-8 py-3 rounded-lg hover:bg-emerald-700 hover:shadow-lg transition-all duration-300 font-semibold">
                無料相談を予約する
            </a>
        </div>

        <!-- Hero Visual -->
        <div class="mt-10">
            <div class="w-full aspect-[3/2] md:aspect-[16/9] bg-gradient-to-br from-gray-900 to-emerald-900 rounded-2xl shadow-xl border border-gray-200 flex items-center justify-center relative overflow-hidden">
                <!-- Decorative Shapes -->
                <div class="absolute top-6 right-6 md:top-8 md:right-8 w-20 md:w-32 h-20 md:h-32 border-2 border-emerald-400/30 rounded-full"></div>
                <div class="absolute bottom-8 left-8 md:bottom-12 md:left-12 w-16 md:w-24 h-16 md:h-24 bg-emerald-500/20 rounded-lg rotate-12"></div>
                <div class="absolute top-1/2 left-1/4 w-12 md:w-16 h-12 md:h-16 border border-white/20 rounded-full"></div>
                <!-- Content -->
                <div class="text-center z-10 px-4">
                    <div class="w-16 h-16 md:w-20 md:h-20 mx-auto mb-4 border-2 border-emerald-400/50 rounded-2xl flex items-center justify-center">
                        <svg class="w-8 h-8 md:w-10 md:h-10 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <p class="text-emerald-400 font-medium text-base md:text-lg">Web制作で成果を出す</p>
                    <p class="text-white/60 text-sm mt-2">戦略的なデザインとコーディング</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6 md:px-8">
        <div class="text-center mb-10">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">サービス</h2>
            <p class="text-gray-600">お客様のニーズに合わせた3つのサービスを提供しています</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            <!-- Service 1: コーポレートサイト制作 -->
            <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-200">
                <div class="aspect-[4/3] bg-gradient-to-br from-gray-800 to-gray-900 flex items-center justify-center relative overflow-hidden">
                    <div class="absolute top-4 right-4 w-16 h-16 border border-emerald-400/30 rounded-full"></div>
                    <div class="absolute bottom-4 left-4 w-12 h-12 bg-emerald-500/20 rounded-lg"></div>
                    <div class="text-center z-10">
                        <svg class="w-12 h-12 mx-auto text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">コーポレートサイト制作</h3>
                    <p class="text-gray-600 text-sm leading-relaxed mb-4">
                        情報設計からブランドトーンの統一まで、企業の顔となるWebサイトを制作します。
                    </p>
                    <a href="{{ route('demo.simple-hp.service') }}" class="inline-flex items-center text-sm text-emerald-600 hover:text-emerald-700 font-medium">
                        詳細を見る
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Service 2: LP/キャンペーン制作 -->
            <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-200">
                <div class="aspect-[4/3] bg-gradient-to-br from-emerald-700 to-emerald-900 flex items-center justify-center relative overflow-hidden">
                    <div class="absolute top-4 left-4 w-20 h-20 border border-white/20 rounded-full"></div>
                    <div class="absolute bottom-6 right-6 w-10 h-10 bg-white/10 rounded-lg rotate-45"></div>
                    <div class="text-center z-10">
                        <svg class="w-12 h-12 mx-auto text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">LP・キャンペーン制作</h3>
                    <p class="text-gray-600 text-sm leading-relaxed mb-4">
                        高速ABテストを想定した設計で、コンバージョン最大化を目指すLPを制作します。
                    </p>
                    <a href="{{ route('demo.simple-hp.service') }}" class="inline-flex items-center text-sm text-emerald-600 hover:text-emerald-700 font-medium">
                        詳細を見る
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Service 3: Webガイドライン設計 -->
            <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-200 md:col-span-2 lg:col-span-1">
                <div class="aspect-[4/3] bg-gradient-to-br from-gray-700 to-gray-800 flex items-center justify-center relative overflow-hidden">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-32 h-32 border-2 border-emerald-400/20 rounded-2xl rotate-12"></div>
                        <div class="absolute w-24 h-24 border border-white/10 rounded-xl -rotate-6"></div>
                    </div>
                    <div class="text-center z-10">
                        <svg class="w-12 h-12 mx-auto text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-4">Webガイドライン設計</h3>
                    <p class="text-gray-600 text-sm leading-relaxed mb-4">
                        デザインシステムの構築で、ブランドの一貫性と制作効率を両立します。
                    </p>
                    <a href="{{ route('demo.simple-hp.service') }}" class="inline-flex items-center text-sm text-emerald-600 hover:text-emerald-700 font-medium">
                        詳細を見る
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-16 md:py-20 bg-gradient-to-br from-gray-50 via-emerald-50/30 to-gray-50">
    <div class="max-w-6xl mx-auto px-6 md:px-8 text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">会社概要</h2>
        <p class="text-gray-600 leading-relaxed mb-4 max-w-2xl mx-auto">
            Greenline Studioは、東京を拠点にB2B企業のWeb制作を専門とするクリエイティブスタジオです。デザイナー・エンジニア計5名の少数精鋭チームで、丁寧なヒアリングと高品質な制作をお約束します。
        </p>
        <p class="text-gray-600 leading-relaxed mb-10 max-w-2xl mx-auto">
            コーポレートサイト、LP、デザインシステム構築を得意とし、お客様のビジネス成果にコミットした制作を行います。
        </p>
        <a href="{{ route('demo.simple-hp.about') }}" class="inline-block text-sm text-gray-700 border-2 border-gray-300 px-8 py-3 rounded-lg hover:bg-white hover:border-gray-400 transition-all duration-300 font-medium">
            会社概要を見る
        </a>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6 md:px-8 text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">お気軽にご相談ください</h2>
        <p class="text-gray-600 leading-relaxed mb-10 max-w-2xl mx-auto">
            Webサイト制作に関するご相談、お見積もりのご依頼など、お気軽にお問い合わせください。2営業日以内にご連絡いたします。
        </p>

        <!-- Double CTA -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="{{ route('demo.simple-hp.contact') }}" class="inline-block bg-emerald-600 text-white text-base px-8 py-3 rounded-lg hover:bg-emerald-700 hover:shadow-lg transition-all duration-300 font-semibold w-full sm:w-auto">
                無料相談を予約する
            </a>
            <a href="#" class="inline-block text-gray-700 border-2 border-gray-300 text-base px-8 py-3 rounded-lg hover:bg-gray-50 hover:border-gray-400 transition-all duration-300 font-medium w-full sm:w-auto">
                会社案内PDFをダウンロード
            </a>
        </div>

        <div class="mt-10 flex items-center justify-center gap-3 text-gray-700">
            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            <span class="font-medium">info@greenline-studio.jp</span>
        </div>
    </div>
</section>
@endsection
