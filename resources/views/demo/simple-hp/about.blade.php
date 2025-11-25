@extends('demo.simple-hp.layouts.app')

@section('title', '私について')

@section('content')
<!-- Page Header -->
<section class="py-24 bg-gradient-to-br from-gray-50 via-emerald-50/20 to-gray-50">
    <div class="max-w-6xl mx-auto px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">私について</h1>
        <p class="text-gray-600">About Me</p>
    </div>
</section>

<!-- Block 1: Philosophy -->
<section class="py-24 bg-white">
    <div class="max-w-4xl mx-auto px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">制作への想い</h2>
            <div class="w-16 h-1 bg-emerald-600 mx-auto mb-8"></div>
        </div>

        <div class="space-y-8">
            <div class="bg-gradient-to-br from-gray-50 via-emerald-50/20 to-gray-50 p-8 rounded-2xl border border-gray-200">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-12 h-12 bg-emerald-600 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">ユーザー視点のデザイン</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Webサイトは企業とユーザーをつなぐ重要な接点です。ユーザーが快適に目的を達成できるよう、使いやすさと美しさを両立したデザインを心がけています。
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-gray-50 via-emerald-50/20 to-gray-50 p-8 rounded-2xl border border-gray-200">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-12 h-12 bg-emerald-600 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">ビジネス成果へのコミット</h3>
                        <p class="text-gray-600 leading-relaxed">
                            見た目の美しさだけでなく、コンバージョン率向上や業務効率化など、具体的なビジネス成果につながる制作を重視しています。データに基づいた改善提案も行います。
                        </p>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-gray-50 via-emerald-50/20 to-gray-50 p-8 rounded-2xl border border-gray-200">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0 w-12 h-12 bg-emerald-600 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">長期的なパートナーシップ</h3>
                        <p class="text-gray-600 leading-relaxed">
                            納品して終わりではなく、その後の運用やサポートも含めた長期的な関係を大切にしています。お客様の成長を一緒に支えるパートナーでありたいと考えています。
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Block 2: Process -->
<section class="py-24 bg-gradient-to-br from-gray-50 via-emerald-50/20 to-gray-50">
    <div class="max-w-6xl mx-auto px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">制作フロー</h2>
            <div class="w-16 h-1 bg-emerald-600 mx-auto mb-8"></div>
            <p class="text-gray-600">丁寧なヒアリングから納品後のサポートまで</p>
        </div>

        <div class="grid md:grid-cols-4 gap-8">
            <!-- Step 1 -->
            <div class="relative">
                <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-200 text-center">
                    <div class="w-16 h-16 bg-emerald-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                        1
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">ヒアリング</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        ご要望や課題を丁寧にヒアリングし、最適なソリューションをご提案します
                    </p>
                </div>
                <!-- Arrow for desktop -->
                <div class="hidden md:block absolute top-12 -right-4 text-emerald-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="relative">
                <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-200 text-center">
                    <div class="w-16 h-16 bg-emerald-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                        2
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">企画・設計</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        サイト構成やデザインコンセプトを企画し、ワイヤーフレームを作成します
                    </p>
                </div>
                <!-- Arrow for desktop -->
                <div class="hidden md:block absolute top-12 -right-4 text-emerald-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="relative">
                <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-200 text-center">
                    <div class="w-16 h-16 bg-emerald-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                        3
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">デザイン・開発</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        デザインを仕上げ、コーディング・システム開発を行います
                    </p>
                </div>
                <!-- Arrow for desktop -->
                <div class="hidden md:block absolute top-12 -right-4 text-emerald-600">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </div>
            </div>

            <!-- Step 4 -->
            <div>
                <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-200 text-center">
                    <div class="w-16 h-16 bg-emerald-600 text-white rounded-full flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                        4
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3">納品・サポート</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        テストを経て納品。その後の運用サポートも対応します
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Block 3: Expertise -->
<section class="py-24 bg-white">
    <div class="max-w-6xl mx-auto px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">得意な領域</h2>
            <div class="w-16 h-1 bg-emerald-600 mx-auto mb-8"></div>
            <p class="text-gray-600">これまでの経験を活かし、幅広い案件に対応いたします</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Expertise 1 -->
            <div class="bg-gradient-to-br from-gray-50 via-emerald-50/20 to-gray-50 p-8 rounded-2xl shadow-md border-l-4 border-emerald-600 hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-emerald-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">レスポンシブWebデザイン</h3>
                <p class="text-gray-600 leading-relaxed mb-4">
                    PC・タブレット・スマートフォンすべてのデバイスで最適に表示されるレスポンシブデザインを得意としています。
                </p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-center">
                        <span class="text-emerald-600 mr-2">✓</span>
                        モバイルファーストデザイン
                    </li>
                    <li class="flex items-center">
                        <span class="text-emerald-600 mr-2">✓</span>
                        アクセシビリティ対応
                    </li>
                    <li class="flex items-center">
                        <span class="text-emerald-600 mr-2">✓</span>
                        SEO最適化
                    </li>
                </ul>
            </div>

            <!-- Expertise 2 -->
            <div class="bg-gradient-to-br from-gray-50 via-emerald-50/20 to-gray-50 p-8 rounded-2xl shadow-md border-l-4 border-emerald-600 hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-emerald-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">Laravel開発</h3>
                <p class="text-gray-600 leading-relaxed mb-4">
                    PHPフレームワークLaravelを用いた高品質なWebアプリケーション開発を行います。
                </p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-center">
                        <span class="text-emerald-600 mr-2">✓</span>
                        CMSサイト構築
                    </li>
                    <li class="flex items-center">
                        <span class="text-emerald-600 mr-2">✓</span>
                        業務システム開発
                    </li>
                    <li class="flex items-center">
                        <span class="text-emerald-600 mr-2">✓</span>
                        API開発
                    </li>
                </ul>
            </div>

            <!-- Expertise 3 -->
            <div class="bg-gradient-to-br from-gray-50 via-emerald-50/20 to-gray-50 p-8 rounded-2xl shadow-md border-l-4 border-emerald-600 hover:shadow-xl transition-shadow duration-300">
                <div class="w-16 h-16 bg-emerald-600 rounded-2xl flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-900 mb-4">UI/UXデザイン</h3>
                <p class="text-gray-600 leading-relaxed mb-4">
                    ユーザー体験を重視したUI/UXデザインで、使いやすく成果につながるサイトを設計します。
                </p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li class="flex items-center">
                        <span class="text-emerald-600 mr-2">✓</span>
                        ユーザーリサーチ
                    </li>
                    <li class="flex items-center">
                        <span class="text-emerald-600 mr-2">✓</span>
                        プロトタイピング
                    </li>
                    <li class="flex items-center">
                        <span class="text-emerald-600 mr-2">✓</span>
                        ユーザビリティテスト
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 bg-gradient-to-br from-gray-50 via-emerald-50/20 to-gray-50">
    <div class="max-w-4xl mx-auto px-8 text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">お気軽にご相談ください</h2>
        <p class="text-gray-600 leading-relaxed mb-10">
            ご質問やお見積もりのご依頼など、<br>
            お気軽にお問い合わせください。
        </p>
        <a href="{{ route('demo.simple-hp.contact') }}" class="inline-block bg-emerald-600 text-white text-base px-10 py-4 rounded-lg hover:bg-emerald-700 hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 font-semibold">
            お問い合わせフォーム
        </a>
    </div>
</section>
@endsection
