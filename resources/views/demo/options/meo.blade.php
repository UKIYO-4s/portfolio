<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MEO対策デモ - オプション機能</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Noto Sans JP', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-gray-800">MEO対策オプション</h1>
            <a href="{{ route('projects.index') }}" class="text-sm text-gray-500 hover:text-gray-800 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                料金表に戻る
            </a>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 py-12">
        <!-- Hero -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-green-100 text-green-700 rounded-full text-sm mb-4">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
                </svg>
                Googleマップ集客
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">MEO対策とは？</h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                MEO（Map Engine Optimization）は、Googleマップでの検索結果で上位表示を目指す施策です。<br>
                「近くの〇〇」で検索するユーザーに見つけてもらいやすくなります。
            </p>
        </div>

        <!-- Before/After -->
        <div class="grid md:grid-cols-2 gap-8 mb-16">
            <!-- Before -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-red-50 px-6 py-4 border-b border-red-100">
                    <h3 class="font-bold text-red-800 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        対策前
                    </h3>
                </div>
                <div class="p-6">
                    <!-- Fake Map Search Results -->
                    <div class="bg-gray-100 rounded-lg p-4 mb-4">
                        <div class="flex items-center gap-2 mb-3">
                            <div class="w-6 h-6 bg-gray-300 rounded-full"></div>
                            <span class="text-sm text-gray-500">「渋谷 カフェ」で検索</span>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-start gap-3 p-3 bg-white rounded-lg">
                                <span class="w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-xs font-bold">1</span>
                                <div class="flex-1">
                                    <p class="font-medium text-gray-800">○○カフェ 渋谷店</p>
                                    <p class="text-xs text-gray-500">★★★★☆ 4.2 (328)</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3 p-3 bg-white rounded-lg">
                                <span class="w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-xs font-bold">2</span>
                                <div class="flex-1">
                                    <p class="font-medium text-gray-800">△△コーヒー</p>
                                    <p class="text-xs text-gray-500">★★★★☆ 4.0 (256)</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3 p-3 bg-white rounded-lg">
                                <span class="w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-xs font-bold">3</span>
                                <div class="flex-1">
                                    <p class="font-medium text-gray-800">□□ベーカリーカフェ</p>
                                    <p class="text-xs text-gray-500">★★★★☆ 4.3 (189)</p>
                                </div>
                            </div>
                            <div class="text-center py-4 text-gray-400 text-sm">...</div>
                            <div class="flex items-start gap-3 p-3 bg-gray-50 rounded-lg opacity-60">
                                <span class="w-6 h-6 bg-gray-400 text-white rounded-full flex items-center justify-center text-xs font-bold">15</span>
                                <div class="flex-1">
                                    <p class="font-medium text-gray-600">あなたのお店</p>
                                    <p class="text-xs text-gray-400">★★★☆☆ 3.5 (12)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="text-red-600 text-sm text-center font-medium">15位以下では、ほとんど見つけてもらえません</p>
                </div>
            </div>

            <!-- After -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-green-50 px-6 py-4 border-b border-green-100">
                    <h3 class="font-bold text-green-800 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        対策後
                    </h3>
                </div>
                <div class="p-6">
                    <!-- Fake Map Search Results -->
                    <div class="bg-gray-100 rounded-lg p-4 mb-4">
                        <div class="flex items-center gap-2 mb-3">
                            <div class="w-6 h-6 bg-gray-300 rounded-full"></div>
                            <span class="text-sm text-gray-500">「渋谷 カフェ」で検索</span>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-start gap-3 p-3 bg-green-50 rounded-lg border-2 border-green-500">
                                <span class="w-6 h-6 bg-green-500 text-white rounded-full flex items-center justify-center text-xs font-bold">1</span>
                                <div class="flex-1">
                                    <p class="font-bold text-gray-800">あなたのお店</p>
                                    <p class="text-xs text-green-600">★★★★★ 4.8 (156)</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3 p-3 bg-white rounded-lg">
                                <span class="w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-xs font-bold">2</span>
                                <div class="flex-1">
                                    <p class="font-medium text-gray-800">○○カフェ 渋谷店</p>
                                    <p class="text-xs text-gray-500">★★★★☆ 4.2 (328)</p>
                                </div>
                            </div>
                            <div class="flex items-start gap-3 p-3 bg-white rounded-lg">
                                <span class="w-6 h-6 bg-blue-500 text-white rounded-full flex items-center justify-center text-xs font-bold">3</span>
                                <div class="flex-1">
                                    <p class="font-medium text-gray-800">△△コーヒー</p>
                                    <p class="text-xs text-gray-500">★★★★☆ 4.0 (256)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="text-green-600 text-sm text-center font-medium">上位3位に入れば、クリック率が大幅UP！</p>
                </div>
            </div>
        </div>

        <!-- What We Do -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 mb-16">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-8">MEO対策で行うこと</h3>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-gray-800 mb-2">Googleビジネスプロフィール最適化</h4>
                    <p class="text-sm text-gray-600">店舗情報、営業時間、写真、サービス内容を最適化して検索に引っかかりやすく</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-gray-800 mb-2">口コミ獲得サポート</h4>
                    <p class="text-sm text-gray-600">お客様からの口コミを増やす仕組みづくりと、返信対応のアドバイス</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h4 class="font-bold text-gray-800 mb-2">順位レポート</h4>
                    <p class="text-sm text-gray-600">狙ったキーワードでの順位を定期的にレポート。効果を可視化します</p>
                </div>
            </div>
        </div>

        <!-- Stats -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl p-8 mb-16 text-white">
            <h3 class="text-2xl font-bold text-center mb-8">MEO対策の効果</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <div class="text-center">
                    <p class="text-4xl font-bold mb-2">76%</p>
                    <p class="text-blue-200 text-sm">ローカル検索後<br>24時間以内に来店</p>
                </div>
                <div class="text-center">
                    <p class="text-4xl font-bold mb-2">28%</p>
                    <p class="text-blue-200 text-sm">ローカル検索が<br>購入に繋がる割合</p>
                </div>
                <div class="text-center">
                    <p class="text-4xl font-bold mb-2">3位</p>
                    <p class="text-blue-200 text-sm">以内に入ると<br>クリック率大幅UP</p>
                </div>
                <div class="text-center">
                    <p class="text-4xl font-bold mb-2">46%</p>
                    <p class="text-blue-200 text-sm">Google検索の<br>ローカル検索割合</p>
                </div>
            </div>
        </div>

        <!-- Target Business -->
        <div class="mb-16">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-8">こんな業種におすすめ</h3>
            <div class="flex flex-wrap justify-center gap-3">
                <span class="px-4 py-2 bg-white border border-gray-200 rounded-full text-sm">飲食店</span>
                <span class="px-4 py-2 bg-white border border-gray-200 rounded-full text-sm">美容室・サロン</span>
                <span class="px-4 py-2 bg-white border border-gray-200 rounded-full text-sm">整体・マッサージ</span>
                <span class="px-4 py-2 bg-white border border-gray-200 rounded-full text-sm">クリニック・歯科</span>
                <span class="px-4 py-2 bg-white border border-gray-200 rounded-full text-sm">不動産</span>
                <span class="px-4 py-2 bg-white border border-gray-200 rounded-full text-sm">ジム・フィットネス</span>
                <span class="px-4 py-2 bg-white border border-gray-200 rounded-full text-sm">小売店</span>
                <span class="px-4 py-2 bg-white border border-gray-200 rounded-full text-sm">その他店舗型ビジネス</span>
            </div>
        </div>

        <!-- Price -->
        <div class="bg-blue-50 border border-blue-200 rounded-2xl p-8 text-center">
            <p class="text-blue-800 font-bold text-2xl mb-2">15万円〜</p>
            <p class="text-blue-600 text-sm mb-4">初期設定＋3ヶ月間の運用サポート込み</p>
            <p class="text-gray-500 text-xs">※継続運用は月額3万円〜</p>
        </div>
    </main>
</body>
</html>
