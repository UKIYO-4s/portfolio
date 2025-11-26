@extends('demo.simple-hp.layouts.app')

@section('title', 'サービス')

@section('content')
<!-- Page Header -->
<section class="py-16 md:py-20 bg-gradient-to-br from-gray-50 via-emerald-50/30 to-gray-50">
    <div class="max-w-6xl mx-auto px-6 md:px-8 text-center">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">サービス</h1>
        <p class="text-gray-600">Services</p>
    </div>
</section>

<!-- Services -->
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6 md:px-8">
        <div class="text-center mb-10">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">提供サービス</h2>
            <div class="w-16 h-1 bg-emerald-600 mx-auto mb-4"></div>
            <p class="text-gray-600">B2B企業のWeb制作に特化した3つのサービスをご提供しています</p>
        </div>

        <div class="space-y-10 md:space-y-12">
            <!-- Service 1: コーポレートサイト制作 -->
            <div class="bg-gradient-to-br from-gray-50 via-emerald-50/20 to-gray-50 rounded-2xl shadow-lg border border-gray-200 overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="grid md:grid-cols-2 gap-0">
                    <!-- Service Visual -->
                    <div class="order-2 md:order-1">
                        <div class="h-full min-h-[300px] bg-gradient-to-br from-gray-800 to-gray-900 flex items-center justify-center relative overflow-hidden">
                            <div class="absolute top-6 right-6 w-24 h-24 border-2 border-emerald-400/30 rounded-full"></div>
                            <div class="absolute bottom-8 left-8 w-16 h-16 bg-emerald-500/20 rounded-lg rotate-12"></div>
                            <div class="text-center z-10">
                                <svg class="w-16 h-16 mx-auto text-emerald-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <p class="text-emerald-400 font-medium">Corporate Website</p>
                            </div>
                        </div>
                    </div>

                    <!-- Service Content -->
                    <div class="order-1 md:order-2 p-6 md:p-10 flex flex-col justify-center">
                        <div class="mb-6">
                            <span class="inline-block px-4 py-1.5 bg-emerald-600 text-white text-xs rounded-full font-semibold mb-4">
                                Service 01
                            </span>
                            <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">コーポレートサイト制作</h3>
                            <p class="text-gray-600 leading-relaxed mb-6">
                                情報設計からブランドトーンの統一まで、企業の顔となるWebサイトを制作します。ターゲットユーザーの行動分析に基づいた導線設計で、リード獲得や採用強化に貢献します。
                            </p>
                        </div>

                        <!-- Features -->
                        <div class="mb-6">
                            <h4 class="text-lg font-bold text-gray-900 mb-4">主な内容</h4>
                            <ul class="space-y-2">
                                <li class="flex items-center text-sm text-gray-600">
                                    <span class="text-emerald-600 mr-2 text-base">✓</span>
                                    <span>情報設計・サイト構成</span>
                                </li>
                                <li class="flex items-center text-sm text-gray-600">
                                    <span class="text-emerald-600 mr-2 text-base">✓</span>
                                    <span>ブランドトーンに合わせたデザイン</span>
                                </li>
                                <li class="flex items-center text-sm text-gray-600">
                                    <span class="text-emerald-600 mr-2 text-base">✓</span>
                                    <span>レスポンシブ対応・SEO最適化</span>
                                </li>
                                <li class="flex items-center text-sm text-gray-600">
                                    <span class="text-emerald-600 mr-2 text-base">✓</span>
                                    <span>CMS導入・運用マニュアル</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Price & Duration -->
                        <div class="flex flex-wrap items-center gap-6 pt-6 border-t border-gray-200">
                            <div>
                                <p class="text-xs text-gray-600 mb-1">料金</p>
                                <p class="text-2xl font-bold text-emerald-600">50万円〜</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-600 mb-1">納期目安</p>
                                <p class="text-lg font-semibold text-gray-900">2〜3ヶ月</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Service 2: LP・キャンペーン制作 -->
            <div class="bg-gradient-to-br from-gray-50 via-emerald-50/20 to-gray-50 rounded-2xl shadow-lg border border-gray-200 overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="grid md:grid-cols-2 gap-0">
                    <!-- Service Visual -->
                    <div class="order-2">
                        <div class="h-full min-h-[300px] bg-gradient-to-br from-emerald-700 to-emerald-900 flex items-center justify-center relative overflow-hidden">
                            <div class="absolute top-8 left-8 w-20 h-20 border border-white/20 rounded-full"></div>
                            <div class="absolute bottom-6 right-6 w-14 h-14 bg-white/10 rounded-lg rotate-45"></div>
                            <div class="text-center z-10">
                                <svg class="w-16 h-16 mx-auto text-white mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                                <p class="text-white font-medium">Landing Page</p>
                            </div>
                        </div>
                    </div>

                    <!-- Service Content -->
                    <div class="order-1 p-6 md:p-10 flex flex-col justify-center">
                        <div class="mb-6">
                            <span class="inline-block px-4 py-1.5 bg-emerald-600 text-white text-xs rounded-full font-semibold mb-4">
                                Service 02
                            </span>
                            <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">LP・キャンペーン制作</h3>
                            <p class="text-gray-600 leading-relaxed mb-6">
                                高速ABテストを想定した設計で、コンバージョン最大化を目指すランディングページを制作します。広告運用チームとの連携もスムーズに行えます。
                            </p>
                        </div>

                        <!-- Features -->
                        <div class="mb-6">
                            <h4 class="text-lg font-bold text-gray-900 mb-4">主な内容</h4>
                            <ul class="space-y-2">
                                <li class="flex items-center text-sm text-gray-600">
                                    <span class="text-emerald-600 mr-2 text-base">✓</span>
                                    <span>コンバージョン重視の設計</span>
                                </li>
                                <li class="flex items-center text-sm text-gray-600">
                                    <span class="text-emerald-600 mr-2 text-base">✓</span>
                                    <span>ABテスト対応の構造</span>
                                </li>
                                <li class="flex items-center text-sm text-gray-600">
                                    <span class="text-emerald-600 mr-2 text-base">✓</span>
                                    <span>高速表示・モバイル最適化</span>
                                </li>
                                <li class="flex items-center text-sm text-gray-600">
                                    <span class="text-emerald-600 mr-2 text-base">✓</span>
                                    <span>効果測定タグ設置</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Price & Duration -->
                        <div class="flex flex-wrap items-center gap-6 pt-6 border-t border-gray-200">
                            <div>
                                <p class="text-xs text-gray-600 mb-1">料金</p>
                                <p class="text-2xl font-bold text-emerald-600">20万円〜</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-600 mb-1">納期目安</p>
                                <p class="text-lg font-semibold text-gray-900">2〜4週間</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Service 3: Webガイドライン設計 -->
            <div class="bg-gradient-to-br from-gray-50 via-emerald-50/20 to-gray-50 rounded-2xl shadow-lg border border-gray-200 overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="grid md:grid-cols-2 gap-0">
                    <!-- Service Visual -->
                    <div class="order-2 md:order-1">
                        <div class="h-full min-h-[300px] bg-gradient-to-br from-gray-700 to-gray-800 flex items-center justify-center relative overflow-hidden">
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="w-36 h-36 border-2 border-emerald-400/20 rounded-2xl rotate-12"></div>
                                <div class="absolute w-28 h-28 border border-white/10 rounded-xl -rotate-6"></div>
                            </div>
                            <div class="text-center z-10">
                                <svg class="w-16 h-16 mx-auto text-emerald-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <p class="text-emerald-400 font-medium">Design System</p>
                            </div>
                        </div>
                    </div>

                    <!-- Service Content -->
                    <div class="order-1 md:order-2 p-6 md:p-10 flex flex-col justify-center">
                        <div class="mb-6">
                            <span class="inline-block px-4 py-1.5 bg-emerald-600 text-white text-xs rounded-full font-semibold mb-4">
                                Service 03
                            </span>
                            <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">Webガイドライン設計</h3>
                            <p class="text-gray-600 leading-relaxed mb-6">
                                デザインシステムの構築で、ブランドの一貫性と制作効率を両立します。複数部門でのWeb制作やベンダー管理にも対応できる体制を整えます。
                            </p>
                        </div>

                        <!-- Features -->
                        <div class="mb-6">
                            <h4 class="text-lg font-bold text-gray-900 mb-4">主な内容</h4>
                            <ul class="space-y-2">
                                <li class="flex items-center text-sm text-gray-600">
                                    <span class="text-emerald-600 mr-2 text-base">✓</span>
                                    <span>カラー・タイポグラフィ規定</span>
                                </li>
                                <li class="flex items-center text-sm text-gray-600">
                                    <span class="text-emerald-600 mr-2 text-base">✓</span>
                                    <span>UIコンポーネント設計</span>
                                </li>
                                <li class="flex items-center text-sm text-gray-600">
                                    <span class="text-emerald-600 mr-2 text-base">✓</span>
                                    <span>コーディングガイドライン</span>
                                </li>
                                <li class="flex items-center text-sm text-gray-600">
                                    <span class="text-emerald-600 mr-2 text-base">✓</span>
                                    <span>運用ルール策定</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Price & Duration -->
                        <div class="flex flex-wrap items-center gap-6 pt-6 border-t border-gray-200">
                            <div>
                                <p class="text-xs text-gray-600 mb-1">料金</p>
                                <p class="text-2xl font-bold text-emerald-600">30万円〜</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-600 mb-1">納期目安</p>
                                <p class="text-lg font-semibold text-gray-900">1〜2ヶ月</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Process Overview -->
<section class="py-16 md:py-20 bg-gradient-to-br from-gray-50 via-emerald-50/30 to-gray-50">
    <div class="max-w-4xl mx-auto px-6 md:px-8 text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">制作の流れ</h2>
        <p class="text-gray-600 leading-relaxed mb-10">
            ヒアリングから納品まで、丁寧にサポートいたします。<br>
            詳しい制作フローは「会社概要」ページをご覧ください。
        </p>
        <a href="{{ route('demo.simple-hp.about') }}" class="inline-block text-sm text-gray-700 border-2 border-gray-300 px-8 py-3 rounded-lg hover:bg-white hover:border-gray-400 transition-all duration-300 font-medium">
            制作フローを見る
        </a>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6 md:px-8 text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4">お気軽にご相談ください</h2>
        <p class="text-gray-600 leading-relaxed mb-10 max-w-2xl mx-auto">
            ご質問やお見積もりのご依頼など、お気軽にお問い合わせください。
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="{{ route('demo.simple-hp.contact') }}" class="inline-block bg-emerald-600 text-white text-base px-8 py-3 rounded-lg hover:bg-emerald-700 hover:shadow-lg transition-all duration-300 font-semibold w-full sm:w-auto">
                無料相談を予約する
            </a>
            <a href="#" class="inline-block text-gray-700 border-2 border-gray-300 text-base px-8 py-3 rounded-lg hover:bg-gray-50 hover:border-gray-400 transition-all duration-300 font-medium w-full sm:w-auto">
                会社案内PDFをダウンロード
            </a>
        </div>
    </div>
</section>
@endsection
