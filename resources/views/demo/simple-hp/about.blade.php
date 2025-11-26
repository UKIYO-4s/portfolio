@extends('demo.simple-hp.layouts.app')

@section('title', '会社概要')

@section('content')
<!-- Page Header -->
<section class="py-16 md:py-20 bg-gradient-to-br from-gray-50 via-emerald-50/30 to-gray-50">
    <div class="max-w-6xl mx-auto px-6 md:px-8 text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">会社概要</h1>
        <p class="text-gray-600">About Us</p>
    </div>
</section>

<!-- Company Info -->
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6 md:px-8">
        <div class="text-center mb-10">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">Greenline Studio</h2>
            <div class="w-16 h-1 bg-emerald-600 mx-auto mb-4"></div>
            <p class="text-gray-600 leading-relaxed max-w-2xl mx-auto">
                B2B企業のWeb制作を専門とするクリエイティブスタジオです。戦略的なデザインと確かな技術で、お客様のビジネス成長をサポートします。
            </p>
        </div>

        <!-- Company Details Table -->
        <div class="max-w-3xl mx-auto bg-gradient-to-br from-gray-50 via-emerald-50/20 to-gray-50 rounded-2xl border border-gray-200 overflow-hidden">
            <table class="w-full">
                <tbody class="divide-y divide-gray-200">
                    <tr class="flex flex-col sm:table-row">
                        <th class="px-4 sm:px-6 py-4 text-left text-sm font-semibold text-gray-900 bg-gray-100/50 sm:w-1/3">会社名</th>
                        <td class="px-4 sm:px-6 py-4 text-gray-700 text-sm">Greenline Studio（グリーンラインスタジオ）</td>
                    </tr>
                    <tr class="flex flex-col sm:table-row">
                        <th class="px-4 sm:px-6 py-4 text-left text-sm font-semibold text-gray-900 bg-gray-100/50">設立</th>
                        <td class="px-4 sm:px-6 py-4 text-gray-700 text-sm">2020年4月</td>
                    </tr>
                    <tr class="flex flex-col sm:table-row">
                        <th class="px-4 sm:px-6 py-4 text-left text-sm font-semibold text-gray-900 bg-gray-100/50">所在地</th>
                        <td class="px-4 sm:px-6 py-4 text-gray-700 text-sm">〒150-0001 東京都渋谷区神宮前3-1-1</td>
                    </tr>
                    <tr class="flex flex-col sm:table-row">
                        <th class="px-4 sm:px-6 py-4 text-left text-sm font-semibold text-gray-900 bg-gray-100/50">メンバー</th>
                        <td class="px-4 sm:px-6 py-4 text-gray-700 text-sm">5名（デザイナー2名、エンジニア3名）</td>
                    </tr>
                    <tr class="flex flex-col sm:table-row">
                        <th class="px-4 sm:px-6 py-4 text-left text-sm font-semibold text-gray-900 bg-gray-100/50">電話番号</th>
                        <td class="px-4 sm:px-6 py-4 text-gray-700 text-sm">03-1234-5678</td>
                    </tr>
                    <tr class="flex flex-col sm:table-row">
                        <th class="px-4 sm:px-6 py-4 text-left text-sm font-semibold text-gray-900 bg-gray-100/50">メール</th>
                        <td class="px-4 sm:px-6 py-4 text-gray-700 text-sm">info@greenline-studio.jp</td>
                    </tr>
                    <tr class="flex flex-col sm:table-row">
                        <th class="px-4 sm:px-6 py-4 text-left text-sm font-semibold text-gray-900 bg-gray-100/50">事業内容</th>
                        <td class="px-4 sm:px-6 py-4 text-gray-700 text-sm">
                            <ul class="space-y-1">
                                <li>コーポレートサイト制作</li>
                                <li>LP・キャンペーンサイト制作</li>
                                <li>Webガイドライン・デザインシステム設計</li>
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Strengths -->
<section class="py-16 md:py-20 bg-gradient-to-br from-gray-50 via-emerald-50/30 to-gray-50">
    <div class="max-w-6xl mx-auto px-6 md:px-8">
        <div class="text-center mb-10">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">私たちの強み</h2>
            <div class="w-16 h-1 bg-emerald-600 mx-auto"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            <!-- Strength 1 -->
            <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-200 hover:shadow-xl transition-shadow duration-300">
                <div class="w-14 h-14 bg-emerald-600 rounded-2xl flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-4">B2B専門の知見</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    B2B企業特有のニーズを理解し、リード獲得や採用強化など、ビジネス成果につながるサイトを設計します。
                </p>
            </div>

            <!-- Strength 2 -->
            <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-200 hover:shadow-xl transition-shadow duration-300">
                <div class="w-14 h-14 bg-emerald-600 rounded-2xl flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-4">少数精鋭チーム</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    5名の専門家が直接対応。大手にはない柔軟性とスピード感で、お客様のご要望に応えます。
                </p>
            </div>

            <!-- Strength 3 -->
            <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-200 hover:shadow-xl transition-shadow duration-300 md:col-span-2 lg:col-span-1">
                <div class="w-14 h-14 bg-emerald-600 rounded-2xl flex items-center justify-center mb-4">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-4">成果へのコミット</h3>
                <p class="text-gray-600 text-sm leading-relaxed">
                    制作後の効果測定や改善提案も含め、Webサイトの成果最大化に継続的に取り組みます。
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Process -->
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6 md:px-8">
        <div class="text-center mb-10">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">制作フロー</h2>
            <div class="w-16 h-1 bg-emerald-600 mx-auto mb-4"></div>
            <p class="text-gray-600">丁寧なヒアリングから納品後のサポートまで</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
            <!-- Step 1 -->
            <div class="relative">
                <div class="bg-gradient-to-br from-gray-50 via-emerald-50/20 to-gray-50 p-6 rounded-2xl shadow-md border border-gray-200 text-center h-full">
                    <div class="w-14 h-14 bg-emerald-600 text-white rounded-full flex items-center justify-center text-xl font-bold mx-auto mb-4">
                        1
                    </div>
                    <h3 class="text-base font-bold text-gray-900 mb-4">ヒアリング</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        ご要望や課題を丁寧にヒアリングし、最適なプランをご提案
                    </p>
                </div>
                <div class="hidden lg:block absolute top-10 -right-4 text-emerald-600 z-10">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="relative">
                <div class="bg-gradient-to-br from-gray-50 via-emerald-50/20 to-gray-50 p-6 rounded-2xl shadow-md border border-gray-200 text-center h-full">
                    <div class="w-14 h-14 bg-emerald-600 text-white rounded-full flex items-center justify-center text-xl font-bold mx-auto mb-4">
                        2
                    </div>
                    <h3 class="text-base font-bold text-gray-900 mb-4">企画・設計</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        サイト構成とデザインコンセプトを策定
                    </p>
                </div>
                <div class="hidden lg:block absolute top-10 -right-4 text-emerald-600 z-10">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </div>
            </div>

            <!-- Step 3 -->
            <div class="relative">
                <div class="bg-gradient-to-br from-gray-50 via-emerald-50/20 to-gray-50 p-6 rounded-2xl shadow-md border border-gray-200 text-center h-full">
                    <div class="w-14 h-14 bg-emerald-600 text-white rounded-full flex items-center justify-center text-xl font-bold mx-auto mb-4">
                        3
                    </div>
                    <h3 class="text-base font-bold text-gray-900 mb-4">デザイン・開発</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        デザイン制作とコーディングを実施
                    </p>
                </div>
                <div class="hidden lg:block absolute top-10 -right-4 text-emerald-600 z-10">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </div>
            </div>

            <!-- Step 4 -->
            <div>
                <div class="bg-gradient-to-br from-gray-50 via-emerald-50/20 to-gray-50 p-6 rounded-2xl shadow-md border border-gray-200 text-center h-full">
                    <div class="w-14 h-14 bg-emerald-600 text-white rounded-full flex items-center justify-center text-xl font-bold mx-auto mb-4">
                        4
                    </div>
                    <h3 class="text-base font-bold text-gray-900 mb-4">納品・サポート</h3>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        テスト後に納品、運用サポートも対応
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 md:py-20 bg-gradient-to-br from-gray-50 via-emerald-50/30 to-gray-50">
    <div class="max-w-6xl mx-auto px-6 md:px-8 text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">お気軽にご相談ください</h2>
        <p class="text-gray-600 leading-relaxed mb-10 max-w-2xl mx-auto">
            ご質問やお見積もりのご依頼など、お気軽にお問い合わせください。
        </p>
        <a href="{{ route('demo.simple-hp.contact') }}" class="inline-block bg-emerald-600 text-white text-base px-8 py-3 rounded-lg hover:bg-emerald-700 hover:shadow-lg transition-all duration-300 font-semibold">
            お問い合わせフォーム
        </a>
    </div>
</section>
@endsection
