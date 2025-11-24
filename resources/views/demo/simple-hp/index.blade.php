@extends('demo.simple-hp.layouts.app')

@section('title', 'ホーム')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-r from-blue-600 to-blue-800 dark:from-blue-800 dark:to-blue-950 text-white py-20">
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
                <a href="{{ route('demo.simple-hp.service') }}" class="inline-block bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-blue-50 transition-colors">
                    サービスを見る
                </a>
                <a href="{{ route('demo.simple-hp.contact') }}" class="inline-block bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-800 border border-blue-500 transition-colors">
                    お問い合わせ
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-16 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">私たちの強み</h2>
            <p class="text-gray-600 dark:text-gray-400">お客様に選ばれる3つの理由</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">スピード対応</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    お問い合わせから提案まで迅速に対応。お客様のビジネスのスピード感に合わせたサポートを提供します。
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <div class="w-16 h-16 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">高品質</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    豊富な実績と経験を持つプロフェッショナルチームが、高品質なサービスを提供します。
                </p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                <div class="w-16 h-16 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">適正価格</h3>
                <p class="text-gray-600 dark:text-gray-400">
                    明確な料金体系で、お客様の予算に合わせた最適なプランをご提案します。
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Services Overview -->
<section class="py-16 bg-white dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">提供サービス</h2>
            <p class="text-gray-600 dark:text-gray-400">幅広いソリューションでビジネスをサポート</p>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-6 hover:border-blue-500 dark:hover:border-blue-400 transition-colors">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">Webサイト制作</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">企業サイトからECサイトまで対応</p>
                <a href="{{ route('demo.simple-hp.service') }}" class="text-blue-600 dark:text-blue-400 text-sm font-medium hover:underline">
                    詳しく見る →
                </a>
            </div>

            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-6 hover:border-blue-500 dark:hover:border-blue-400 transition-colors">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">システム開発</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">業務効率化システムを開発</p>
                <a href="{{ route('demo.simple-hp.service') }}" class="text-blue-600 dark:text-blue-400 text-sm font-medium hover:underline">
                    詳しく見る →
                </a>
            </div>

            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-6 hover:border-blue-500 dark:hover:border-blue-400 transition-colors">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">デジタルマーケティング</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">Web広告・SNS運用をサポート</p>
                <a href="{{ route('demo.simple-hp.service') }}" class="text-blue-600 dark:text-blue-400 text-sm font-medium hover:underline">
                    詳しく見る →
                </a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 bg-blue-600 dark:bg-blue-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold mb-4">まずはお気軽にご相談ください</h2>
        <p class="text-blue-100 mb-8 max-w-2xl mx-auto">
            お電話またはお問い合わせフォームより、お気軽にご連絡ください。<br>
            専門スタッフが丁寧に対応いたします。
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="tel:03-1234-5678" class="inline-block bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-blue-50 transition-colors">
                📞 03-1234-5678
            </a>
            <a href="{{ route('demo.simple-hp.contact') }}" class="inline-block bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-800 border border-blue-500 transition-colors">
                お問い合わせフォーム
            </a>
        </div>
    </div>
</section>
@endsection
