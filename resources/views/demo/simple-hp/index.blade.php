@extends('demo.simple-hp.layouts.app')

@section('title', 'ホーム')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-gray-50 via-emerald-50/30 to-gray-50 py-16 md:py-20">
    <div class="max-w-6xl mx-auto px-6 md:px-8">
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
            <div class="w-full aspect-[4/3] md:aspect-[16/9] bg-gradient-to-br from-gray-100 via-white to-gray-100 rounded-2xl flex items-center justify-center relative overflow-hidden">
                <!-- Content -->
                <div class="text-center z-10 px-4 flex flex-col items-center justify-center">
                    <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <p class="text-gray-800 font-medium text-base md:text-lg">Web制作で成果を出す</p>
                    <p class="text-gray-500 text-sm mt-2">戦略的なデザインとコーディング</p>
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
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="w-12 h-12 bg-emerald-600 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
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

            <!-- Service 2: LP/キャンペーン制作 -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="w-12 h-12 bg-emerald-600 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
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

            <!-- Service 3: Webガイドライン設計 -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="w-12 h-12 bg-emerald-600 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
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

        <div class="mt-12 flex items-center justify-center gap-3 text-gray-700">
            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            <span class="font-medium">info@greenline-studio.jp</span>
        </div>
    </div>
</section>
@endsection
