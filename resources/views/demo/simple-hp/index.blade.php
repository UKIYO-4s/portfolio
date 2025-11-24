@extends('demo.simple-hp.layouts.app')

@section('title', 'ホーム')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">
                ビジネスの成長を<br class="md:hidden">サポートします
            </h1>
            <p class="text-xl md:text-2xl text-blue-100 mb-8 max-w-3xl mx-auto">
                Webサイト制作からシステム開発まで、<br>
                お客様のニーズに合わせた最適なソリューションを提供
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('demo.simple-hp.service') }}" class="inline-block bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-blue-50 transition-colors shadow-lg">
                    サービスを見る
                </a>
                <a href="{{ route('demo.simple-hp.contact') }}" class="inline-block bg-transparent text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 border-2 border-white transition-colors">
                    お問い合わせ
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">私たちの強み</h2>
            <p class="text-lg text-gray-600">お客様に選ばれる3つの理由</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">スピード対応</h3>
                <p class="text-gray-600 leading-relaxed">
                    お問い合わせから提案まで迅速に対応。お客様のビジネスのスピード感に合わせたサポートを提供します。
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">高品質</h3>
                <p class="text-gray-600 leading-relaxed">
                    豊富な実績と経験を持つプロフェッショナルチームが、高品質なサービスを提供します。
                </p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-shadow border border-gray-100">
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-3">適正価格</h3>
                <p class="text-gray-600 leading-relaxed">
                    明確な料金体系で、お客様の予算に合わせた最適なプランをご提案します。
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Services Overview -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">提供サービス</h2>
            <p class="text-lg text-gray-600">幅広いソリューションでビジネスをサポート</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="group border-2 border-gray-200 rounded-xl p-6 hover:border-blue-500 hover:shadow-lg transition-all">
                <div class="mb-4">
                    <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Webサイト制作</h3>
                    <p class="text-gray-600 text-sm mb-4">企業サイトからECサイトまで対応</p>
                </div>
                <a href="{{ route('demo.simple-hp.service') }}" class="text-blue-600 font-semibold text-sm hover:text-blue-700 inline-flex items-center">
                    詳しく見る
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>

            <div class="group border-2 border-gray-200 rounded-xl p-6 hover:border-blue-500 hover:shadow-lg transition-all">
                <div class="mb-4">
                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">システム開発</h3>
                    <p class="text-gray-600 text-sm mb-4">業務効率化システムを開発</p>
                </div>
                <a href="{{ route('demo.simple-hp.service') }}" class="text-blue-600 font-semibold text-sm hover:text-blue-700 inline-flex items-center">
                    詳しく見る
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>

            <div class="group border-2 border-gray-200 rounded-xl p-6 hover:border-blue-500 hover:shadow-lg transition-all">
                <div class="mb-4">
                    <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center mb-3">
                        <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">デジタルマーケティング</h3>
                    <p class="text-gray-600 text-sm mb-4">Web広告・SNS運用をサポート</p>
                </div>
                <a href="{{ route('demo.simple-hp.service') }}" class="text-blue-600 font-semibold text-sm hover:text-blue-700 inline-flex items-center">
                    詳しく見る
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-blue-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">まずはお気軽にご相談ください</h2>
        <p class="text-xl text-blue-100 mb-10 max-w-2xl mx-auto">
            お電話またはお問い合わせフォームより、お気軽にご連絡ください。<br>
            専門スタッフが丁寧に対応いたします。
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="tel:03-1234-5678" class="inline-flex items-center justify-center bg-white text-blue-600 px-8 py-4 rounded-lg font-bold hover:bg-blue-50 transition-colors shadow-lg text-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
                03-1234-5678
            </a>
            <a href="{{ route('demo.simple-hp.contact') }}" class="inline-flex items-center justify-center bg-transparent text-white px-8 py-4 rounded-lg font-bold hover:bg-blue-700 border-2 border-white transition-colors text-lg">
                お問い合わせフォーム
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </div>
</section>
@endsection
