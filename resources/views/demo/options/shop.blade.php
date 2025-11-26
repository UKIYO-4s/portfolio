<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOP機能デモ - オプション機能</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Noto Sans JP', sans-serif; }
    </style>
</head>
<body class="bg-white min-h-screen">
    <!-- Header -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-gray-800">Sample Shop</h1>
            <div class="flex items-center gap-6">
                <nav class="hidden md:flex gap-6 text-sm">
                    <a href="#" class="text-gray-600 hover:text-gray-800">新着商品</a>
                    <a href="#" class="text-gray-600 hover:text-gray-800">人気商品</a>
                    <a href="#" class="text-gray-600 hover:text-gray-800">カテゴリ</a>
                </nav>
                <div class="flex items-center gap-4">
                    <button class="p-2 text-gray-600 hover:text-gray-800">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                    <button class="p-2 text-gray-600 hover:text-gray-800 relative">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        <span class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">2</span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 py-8">
        <!-- Back Link -->
        <a href="{{ route('projects.index') }}" class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-gray-800 mb-8">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            料金表に戻る
        </a>

        <!-- Hero Banner -->
        <div class="bg-gradient-to-r from-amber-100 to-orange-100 rounded-2xl p-8 md:p-12 mb-12">
            <p class="text-amber-800 text-sm font-medium mb-2">WINTER COLLECTION</p>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">冬の新作アイテム</h2>
            <p class="text-gray-600 mb-6 max-w-md">暖かくスタイリッシュな冬のコレクションが登場。期間限定で送料無料キャンペーン実施中。</p>
            <button class="px-6 py-3 bg-gray-900 text-white rounded-lg hover:bg-gray-800 transition-colors">
                コレクションを見る
            </button>
        </div>

        <!-- Products Section -->
        <div class="mb-12">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-gray-800">人気商品</h3>
                <a href="#" class="text-sm text-gray-500 hover:text-gray-800">すべて見る →</a>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                <!-- Product 1 -->
                <div class="group">
                    <div class="aspect-square bg-gray-100 rounded-xl mb-3 overflow-hidden relative">
                        <div class="w-full h-full bg-gradient-to-br from-blue-200 to-indigo-200"></div>
                        <span class="absolute top-2 left-2 px-2 py-1 bg-red-500 text-white text-xs rounded">SALE</span>
                        <button class="absolute top-2 right-2 p-2 bg-white rounded-full opacity-0 group-hover:opacity-100 transition-opacity">
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>
                    <p class="text-sm text-gray-500 mb-1">ニットウェア</p>
                    <h4 class="font-medium text-gray-800 mb-2">ケーブルニットセーター</h4>
                    <div class="flex items-center gap-2">
                        <span class="font-bold text-gray-800">¥6,980</span>
                        <span class="text-sm text-gray-400 line-through">¥9,800</span>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="group">
                    <div class="aspect-square bg-gray-100 rounded-xl mb-3 overflow-hidden relative">
                        <div class="w-full h-full bg-gradient-to-br from-amber-200 to-orange-200"></div>
                        <button class="absolute top-2 right-2 p-2 bg-white rounded-full opacity-0 group-hover:opacity-100 transition-opacity">
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>
                    <p class="text-sm text-gray-500 mb-1">アウター</p>
                    <h4 class="font-medium text-gray-800 mb-2">ウールコート</h4>
                    <span class="font-bold text-gray-800">¥24,800</span>
                </div>

                <!-- Product 3 -->
                <div class="group">
                    <div class="aspect-square bg-gray-100 rounded-xl mb-3 overflow-hidden relative">
                        <div class="w-full h-full bg-gradient-to-br from-green-200 to-teal-200"></div>
                        <span class="absolute top-2 left-2 px-2 py-1 bg-blue-500 text-white text-xs rounded">NEW</span>
                        <button class="absolute top-2 right-2 p-2 bg-white rounded-full opacity-0 group-hover:opacity-100 transition-opacity">
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>
                    <p class="text-sm text-gray-500 mb-1">小物</p>
                    <h4 class="font-medium text-gray-800 mb-2">カシミアマフラー</h4>
                    <span class="font-bold text-gray-800">¥8,500</span>
                </div>

                <!-- Product 4 -->
                <div class="group">
                    <div class="aspect-square bg-gray-100 rounded-xl mb-3 overflow-hidden relative">
                        <div class="w-full h-full bg-gradient-to-br from-pink-200 to-rose-200"></div>
                        <button class="absolute top-2 right-2 p-2 bg-white rounded-full opacity-0 group-hover:opacity-100 transition-opacity">
                            <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>
                        </button>
                    </div>
                    <p class="text-sm text-gray-500 mb-1">バッグ</p>
                    <h4 class="font-medium text-gray-800 mb-2">レザートートバッグ</h4>
                    <span class="font-bold text-gray-800">¥15,800</span>
                </div>
            </div>
        </div>

        <!-- Category Section -->
        <div class="mb-12">
            <h3 class="text-xl font-bold text-gray-800 mb-6">カテゴリから探す</h3>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-gray-100 rounded-xl p-6 text-center hover:bg-gray-200 transition-colors cursor-pointer">
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                        </svg>
                    </div>
                    <p class="font-medium text-gray-800">トップス</p>
                    <p class="text-xs text-gray-500 mt-1">42 items</p>
                </div>
                <div class="bg-gray-100 rounded-xl p-6 text-center hover:bg-gray-200 transition-colors cursor-pointer">
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                    </div>
                    <p class="font-medium text-gray-800">ボトムス</p>
                    <p class="text-xs text-gray-500 mt-1">38 items</p>
                </div>
                <div class="bg-gray-100 rounded-xl p-6 text-center hover:bg-gray-200 transition-colors cursor-pointer">
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <p class="font-medium text-gray-800">アウター</p>
                    <p class="text-xs text-gray-500 mt-1">24 items</p>
                </div>
                <div class="bg-gray-100 rounded-xl p-6 text-center hover:bg-gray-200 transition-colors cursor-pointer">
                    <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center mx-auto mb-3">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path>
                        </svg>
                    </div>
                    <p class="font-medium text-gray-800">アクセサリー</p>
                    <p class="text-xs text-gray-500 mt-1">56 items</p>
                </div>
            </div>
        </div>

        <!-- Features -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl">
                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                    </svg>
                </div>
                <div>
                    <p class="font-medium text-gray-800">送料無料</p>
                    <p class="text-xs text-gray-500">¥5,000以上のお買い物で</p>
                </div>
            </div>
            <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl">
                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                    </svg>
                </div>
                <div>
                    <p class="font-medium text-gray-800">返品無料</p>
                    <p class="text-xs text-gray-500">30日以内なら返品OK</p>
                </div>
            </div>
            <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl">
                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <div>
                    <p class="font-medium text-gray-800">安心決済</p>
                    <p class="text-xs text-gray-500">SSL暗号化通信</p>
                </div>
            </div>
        </div>

        <!-- Price Notice -->
        <div class="bg-blue-50 border border-blue-200 rounded-xl p-6 text-center">
            <p class="text-blue-800 font-bold text-xl mb-2">15万円〜</p>
            <p class="text-blue-600 text-sm">商品数・決済方法・機能に応じてカスタマイズ可能です</p>
        </div>
    </main>
</body>
</html>
