<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SNS Manager') - Demo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: #f9fafb;
        }

        /* スムーススクロール */
        html {
            scroll-behavior: smooth;
        }

        /* モバイルメニュー */
        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .mobile-menu.active {
            transform: translateX(0);
        }

        /* 数字用等幅フォント */
        .tabular-nums {
            font-variant-numeric: tabular-nums;
        }
    </style>
</head>
<body class="antialiased">
    <!-- モバイルメニューボタン -->
    <button onclick="toggleMobileMenu()" class="lg:hidden fixed top-4 left-4 z-50 p-2 bg-white rounded-lg shadow-md border border-gray-200">
        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>

    <!-- サイドバー -->
    <div id="sidebar" class="mobile-menu lg:translate-x-0 fixed left-0 top-0 h-screen w-64 bg-white border-r border-gray-200 overflow-y-auto z-40">
        <!-- ロゴ -->
        <div class="p-6 border-b border-gray-100">
            <h1 class="text-xl font-semibold text-gray-900">SNS Manager</h1>
            <p class="text-xs text-gray-500 mt-1">SNS運用管理ツール</p>
        </div>

        <!-- アプリ切替 -->
        <div class="p-4 border-b border-gray-100">
            <p class="text-xs text-gray-400 uppercase tracking-wide font-medium mb-3">アプリ切替</p>
            <div class="grid grid-cols-2 gap-2">
                <a href="{{ route('demo.sns-tool.feed') }}" class="flex flex-col items-center p-3 rounded-lg border {{ request()->routeIs('demo.sns-tool.feed') ? 'border-purple-300 bg-purple-50' : 'border-gray-200 hover:bg-gray-50' }} transition">
                    <svg class="w-5 h-5 {{ request()->routeIs('demo.sns-tool.feed') ? 'text-purple-600' : 'text-gray-500' }} mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
                    <span class="text-xs font-medium {{ request()->routeIs('demo.sns-tool.feed') ? 'text-purple-700' : 'text-gray-600' }}">フィード</span>
                </a>
                <a href="{{ route('demo.sns-tool.reels') }}" class="flex flex-col items-center p-3 rounded-lg border {{ request()->routeIs('demo.sns-tool.reels') ? 'border-orange-300 bg-orange-50' : 'border-gray-200 hover:bg-gray-50' }} transition">
                    <svg class="w-5 h-5 {{ request()->routeIs('demo.sns-tool.reels') ? 'text-orange-500' : 'text-gray-500' }} mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                    <span class="text-xs font-medium {{ request()->routeIs('demo.sns-tool.reels') ? 'text-orange-600' : 'text-gray-600' }}">リール</span>
                </a>
            </div>
        </div>

        <!-- ナビゲーション -->
        <nav class="p-4">
            <p class="text-xs text-gray-400 uppercase tracking-wide font-medium mb-3">メインメニュー</p>
            <a href="{{ route('demo.sns-tool.index') }}"
               class="flex items-center px-4 py-3 mb-1 rounded-lg transition {{ request()->routeIs('demo.sns-tool.index') ? 'bg-purple-50 text-purple-700' : 'text-gray-600 hover:bg-gray-50' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span class="font-medium">ダッシュボード</span>
            </a>

            <a href="{{ route('demo.sns-tool.posts') }}"
               class="flex items-center px-4 py-3 mb-1 rounded-lg transition {{ request()->routeIs('demo.sns-tool.posts*') ? 'bg-purple-50 text-purple-700' : 'text-gray-600 hover:bg-gray-50' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                </svg>
                <span class="font-medium">投稿管理</span>
            </a>

            <a href="{{ route('demo.sns-tool.schedule') }}"
               class="flex items-center px-4 py-3 mb-1 rounded-lg transition {{ request()->routeIs('demo.sns-tool.schedule') ? 'bg-purple-50 text-purple-700' : 'text-gray-600 hover:bg-gray-50' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span class="font-medium">予約投稿</span>
            </a>

            <a href="{{ route('demo.sns-tool.templates') }}"
               class="flex items-center px-4 py-3 mb-1 rounded-lg transition {{ request()->routeIs('demo.sns-tool.templates') ? 'bg-purple-50 text-purple-700' : 'text-gray-600 hover:bg-gray-50' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <span class="font-medium">テンプレート</span>
            </a>

            <a href="{{ route('demo.sns-tool.analytics') }}"
               class="flex items-center px-4 py-3 mb-1 rounded-lg transition {{ request()->routeIs('demo.sns-tool.analytics') ? 'bg-purple-50 text-purple-700' : 'text-gray-600 hover:bg-gray-50' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                <span class="font-medium">効果測定</span>
            </a>
        </nav>

        <!-- デモ通知 -->
        <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-100 bg-gray-50">
            <p class="text-xs text-gray-500 mb-2">デモモード</p>
            <a href="{{ route('projects.index') }}" class="text-xs text-purple-600 hover:text-purple-800 font-medium flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                プロジェクト一覧へ戻る
            </a>
        </div>
    </div>

    <!-- オーバーレイ（モバイル用） -->
    <div id="overlay" onclick="toggleMobileMenu()" class="lg:hidden fixed inset-0 bg-black/50 z-30 hidden"></div>

    <!-- メインコンテンツエリア -->
    <div class="lg:ml-64">
        <!-- ヘッダー -->
        <header class="bg-white border-b border-gray-200 sticky top-0 z-20">
            <div class="px-4 lg:px-8 py-4 flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-900 ml-12 lg:ml-0">@yield('page-title', 'ダッシュボード')</h2>
                <div class="flex items-center gap-4">
                    <a href="{{ route('demo.sns-tool.posts.create') }}"
                       class="hidden sm:flex items-center px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition font-medium text-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        新規投稿
                    </a>
                    <div class="w-9 h-9 bg-purple-100 rounded-full flex items-center justify-center text-purple-600 font-semibold text-sm">
                        DM
                    </div>
                </div>
            </div>
        </header>

        <!-- ページコンテンツ -->
        <main class="p-4 lg:p-8 min-h-screen pb-20">
            @yield('content')
        </main>

        <!-- フッター -->
        <footer class="bg-white border-t border-gray-200 py-6">
            <div class="px-4 lg:px-8">
                <p class="text-sm text-gray-500 text-center">
                    SNS Manager Demo - SNS運用管理ツール
                </p>
                <p class="text-xs text-gray-400 text-center mt-2">
                    これはデモです。機能はデモ目的のみです。
                </p>
            </div>
        </footer>
    </div>

    <script>
        function toggleMobileMenu() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');

            sidebar.classList.toggle('active');
            overlay.classList.toggle('hidden');
        }

        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            const isClickInsideSidebar = sidebar.contains(event.target);
            const isMenuButton = event.target.closest('button[onclick="toggleMobileMenu()"]');

            if (!isClickInsideSidebar && !isMenuButton && sidebar.classList.contains('active')) {
                toggleMobileMenu();
            }
        });
    </script>
</body>
</html>
