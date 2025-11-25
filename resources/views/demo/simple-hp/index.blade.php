@extends('demo.simple-hp.layouts.app')

@section('title', 'ホーム')

@section('content')
<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-gray-50 via-emerald-50/20 to-gray-50 py-24 md:py-32">
    <div class="max-w-6xl mx-auto px-8">
        <!-- Hero Text -->
        <div class="text-center mb-12">
            <p class="text-emerald-600 font-semibold mb-3">Webデザイナー / フロントエンド開発者</p>
            <h1 class="text-4xl md:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                後藤 翔栄
            </h1>
            <p class="text-lg md:text-xl text-gray-600 leading-relaxed mb-10 max-w-3xl mx-auto">
                ユーザー体験を重視した、成果につながるWebサイトを制作します
            </p>
            <a href="{{ route('demo.simple-hp.contact') }}" class="inline-block bg-emerald-600 text-white text-base px-10 py-4 rounded-lg hover:bg-emerald-700 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 font-semibold">
                ご相談・お問い合わせ
            </a>
        </div>

        <!-- Hero Image Placeholder -->
        <div class="mt-16">
            <div class="w-full max-w-5xl mx-auto aspect-[16/9] bg-gradient-to-br from-gray-100 to-gray-200 rounded-2xl shadow-lg border border-gray-200 flex items-center justify-center">
                <div class="text-center">
                    <svg class="w-16 h-16 mx-auto text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <p class="text-gray-600 text-sm">Hero Image</p>
                    <p class="text-gray-400 text-xs mt-1">1920 × 1080</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Section -->
<section class="py-24 bg-white">
    <div class="max-w-6xl mx-auto px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">実績紹介</h2>
            <p class="text-gray-600">これまでの制作実績をご紹介します</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            @foreach($portfolios as $portfolio)
            <!-- Portfolio Card -->
            <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group border-l-4 border-emerald-600">
                <div class="mb-6">
                    <div class="w-full aspect-[4/3] bg-gradient-to-br {{ $portfolio['gradient'] }} flex items-center justify-center group-hover:from-gray-200 group-hover:to-gray-300 transition-colors duration-300">
                        <div class="text-center">
                            <svg class="w-12 h-12 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <p class="text-gray-400 text-xs">400 × 300</p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $portfolio['title'] }}</h3>
                    <div class="space-y-2 mb-4">
                        <p class="text-sm text-gray-600">
                            <span class="font-semibold text-gray-700">役割:</span> {{ $portfolio['role'] }}
                        </p>
                        <p class="text-sm font-semibold text-emerald-600">
                            成果: {{ $portfolio['result'] }}
                        </p>
                    </div>
                    <a href="{{ $portfolio['demo_url'] }}" class="inline-flex items-center text-sm text-emerald-600 hover:text-emerald-700 font-medium">
                        詳細を見る
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- About Section (Simplified) -->
<section class="py-24 bg-gradient-to-br from-gray-50 via-emerald-50/20 to-gray-50">
    <div class="max-w-4xl mx-auto px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">私について</h2>
        <p class="text-gray-600 leading-relaxed mb-6">
            ユーザー視点のデザインとビジネス成果へのコミットメントを大切にしています。<br>
            お客様と長期的なパートナーシップを築きながら、最適なソリューションを提供いたします。
        </p>
        <p class="text-gray-600 leading-relaxed mb-10">
            レスポンシブWebデザイン、Laravel開発、UI/UXデザインを得意としており、<br>
            企画段階から納品後のサポートまで一貫してサポートいたします。
        </p>
        <a href="{{ route('demo.simple-hp.about') }}" class="inline-block text-sm text-gray-700 border-2 border-gray-300 px-8 py-3 rounded-lg hover:bg-white hover:border-gray-400 transition-all duration-300 font-medium">
            詳しく見る
        </a>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">お気軽にご相談ください</h2>
        <p class="text-gray-600 leading-relaxed mb-12">
            Webサイト制作やシステム開発に関するご相談、お見積もりのご依頼など、<br>
            お気軽にお問い合わせください。2営業日以内にご連絡いたします。
        </p>

        <!-- Double CTA -->
        <div class="flex flex-col sm:flex-row gap-6 justify-center items-center">
            <a href="{{ route('demo.simple-hp.contact') }}" class="inline-block bg-emerald-600 text-white text-base px-10 py-4 rounded-lg hover:bg-emerald-700 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 font-semibold w-full sm:w-auto">
                ご相談・お見積もり依頼
            </a>
            <button onclick="alert('ポートフォリオPDFは準備中です')" class="inline-block text-gray-700 border-2 border-gray-300 text-base px-10 py-4 rounded-lg hover:bg-gray-50 hover:border-gray-400 transition-all duration-300 font-medium w-full sm:w-auto">
                ポートフォリオPDF（準備中）
            </button>
        </div>

        <div class="mt-12 flex items-center justify-center gap-3 text-gray-700">
            <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            <span class="font-medium">info@sample-corp.jp</span>
        </div>
    </div>
</section>
@endsection
