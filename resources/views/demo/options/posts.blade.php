<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿機能デモ - オプション機能</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Noto Sans JP', sans-serif; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r border-gray-200 min-h-screen fixed left-0 top-0">
            <div class="p-6 border-b border-gray-200">
                <h1 class="text-xl font-bold text-gray-800">投稿管理</h1>
                <p class="text-xs text-gray-500 mt-1">記事・お知らせの作成</p>
            </div>
            <nav class="p-4">
                <ul class="space-y-1">
                    <li>
                        <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            ダッシュボード
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-3 px-4 py-3 bg-blue-50 text-blue-700 rounded-lg font-medium">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            投稿一覧
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            新規作成
                        </a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center gap-3 px-4 py-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            カテゴリ
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-200">
                <a href="{{ route('projects.index') }}" class="flex items-center gap-2 text-sm text-gray-500 hover:text-gray-800">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    料金表に戻る
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="ml-64 flex-1 p-8">
            <!-- Header -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">投稿一覧</h2>
                    <p class="text-gray-500 text-sm mt-1">お知らせやブログ記事を管理できます</p>
                </div>
                <button class="flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    新規投稿
                </button>
            </div>

            <!-- Filter Tabs -->
            <div class="flex gap-4 mb-6 border-b border-gray-200">
                <button class="px-4 py-2 text-blue-600 border-b-2 border-blue-600 font-medium">すべて (12)</button>
                <button class="px-4 py-2 text-gray-500 hover:text-gray-700">公開済み (8)</button>
                <button class="px-4 py-2 text-gray-500 hover:text-gray-700">下書き (3)</button>
                <button class="px-4 py-2 text-gray-500 hover:text-gray-700">予約投稿 (1)</button>
            </div>

            <!-- Posts Table -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">タイトル</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">カテゴリ</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">ステータス</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">更新日</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase">操作</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-orange-200 to-red-200 rounded-lg"></div>
                                    <div>
                                        <p class="font-medium text-gray-800">冬季限定メニューのお知らせ</p>
                                        <p class="text-xs text-gray-500">12月1日より販売開始</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 bg-orange-100 text-orange-700 text-xs rounded-full">お知らせ</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">公開中</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">2024/11/25</td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <button class="p-2 text-gray-400 hover:text-blue-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </button>
                                    <button class="p-2 text-gray-400 hover:text-red-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-blue-200 to-cyan-200 rounded-lg"></div>
                                    <div>
                                        <p class="font-medium text-gray-800">年末年始の営業時間について</p>
                                        <p class="text-xs text-gray-500">12/29〜1/3は休業</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 bg-orange-100 text-orange-700 text-xs rounded-full">お知らせ</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-700 text-xs rounded-full">予約投稿</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">2024/11/24</td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <button class="p-2 text-gray-400 hover:text-blue-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </button>
                                    <button class="p-2 text-gray-400 hover:text-red-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-green-200 to-teal-200 rounded-lg"></div>
                                    <div>
                                        <p class="font-medium text-gray-800">スタッフ紹介：山田太郎</p>
                                        <p class="text-xs text-gray-500">新しいメンバーをご紹介</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 bg-purple-100 text-purple-700 text-xs rounded-full">ブログ</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">下書き</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">2024/11/23</td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <button class="p-2 text-gray-400 hover:text-blue-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </button>
                                    <button class="p-2 text-gray-400 hover:text-red-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-12 h-12 bg-gradient-to-br from-pink-200 to-purple-200 rounded-lg"></div>
                                    <div>
                                        <p class="font-medium text-gray-800">秋の新商品レビュー</p>
                                        <p class="text-xs text-gray-500">人気商品をご紹介</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 bg-purple-100 text-purple-700 text-xs rounded-full">ブログ</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 bg-green-100 text-green-700 text-xs rounded-full">公開中</span>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500">2024/11/20</td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <button class="p-2 text-gray-400 hover:text-blue-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </button>
                                    <button class="p-2 text-gray-400 hover:text-red-600">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="flex justify-between items-center mt-6">
                <p class="text-sm text-gray-500">1〜4件を表示（全12件）</p>
                <div class="flex gap-2">
                    <button class="px-3 py-1 border border-gray-300 rounded text-sm text-gray-500">前へ</button>
                    <button class="px-3 py-1 bg-blue-600 text-white rounded text-sm">1</button>
                    <button class="px-3 py-1 border border-gray-300 rounded text-sm text-gray-500">2</button>
                    <button class="px-3 py-1 border border-gray-300 rounded text-sm text-gray-500">3</button>
                    <button class="px-3 py-1 border border-gray-300 rounded text-sm text-gray-500">次へ</button>
                </div>
            </div>

            <!-- Price Notice -->
            <div class="mt-8 bg-blue-50 border border-blue-200 rounded-xl p-6 text-center">
                <p class="text-blue-800 font-bold text-xl mb-2">8万円〜</p>
                <p class="text-blue-600 text-sm">カテゴリ数や機能に応じてカスタマイズ可能です</p>
            </div>
        </main>
    </div>
</body>
</html>
