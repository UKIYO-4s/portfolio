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
            background-color: #f8f9fa;
        }

        /* Instagram風グラデーション */
        .instagram-gradient {
            background: linear-gradient(135deg, #833ab4 0%, #fd1d1d 50%, #fcb045 100%);
        }

        /* GMB/Facebook風ブルー */
        .social-blue {
            background-color: #1877f2;
        }

        /* ホバーエフェクト */
        .hover-lift {
            transition: all 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* サイドバーのアクティブ状態 */
        .nav-active {
            background: linear-gradient(135deg, rgba(131, 58, 180, 0.1) 0%, rgba(253, 29, 29, 0.1) 50%, rgba(252, 176, 69, 0.1) 100%);
            border-left: 3px solid #833ab4;
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
    </style>
</head>
<body class="antialiased">
    <!-- モバイルメニューボタン -->
    <button onclick="toggleMobileMenu()" class="lg:hidden fixed top-4 left-4 z-50 p-2 bg-white rounded-lg shadow-lg">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
    </button>

    <!-- サイドバー -->
    <div id="sidebar" class="mobile-menu lg:translate-x-0 fixed left-0 top-0 h-screen w-64 bg-white border-r border-gray-200 overflow-y-auto z-40">
        <!-- ロゴ -->
        <div class="p-6 border-b border-gray-200">
            <h1 class="text-2xl font-bold bg-gradient-to-r from-purple-500 via-pink-500 to-orange-400 bg-clip-text text-transparent">
                SNS Manager
            </h1>
            <p class="text-xs text-gray-500 mt-1">Instagram & GMB Tool</p>
        </div>

        <!-- ナビゲーション -->
        <nav class="p-4">
            <a href="{{ route('demo.sns-tool.index') }}"
               class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-gray-50 transition {{ request()->routeIs('demo.sns-tool.index') ? 'bg-purple-50 text-purple-600 font-semibold' : 'text-gray-700' }}">
                <span class="text-xl mr-3">📊</span>
                <span class="font-medium">Dashboard</span>
            </a>

            <a href="{{ route('demo.sns-tool.posts') }}"
               class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-gray-50 transition {{ request()->routeIs('demo.sns-tool.posts*') ? 'bg-purple-50 text-purple-600 font-semibold' : 'text-gray-700' }}">
                <span class="text-xl mr-3">📝</span>
                <span class="font-medium">Posts</span>
            </a>

            <a href="{{ route('demo.sns-tool.schedule') }}"
               class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-gray-50 transition {{ request()->routeIs('demo.sns-tool.schedule') ? 'bg-purple-50 text-purple-600 font-semibold' : 'text-gray-700' }}">
                <span class="text-xl mr-3">📅</span>
                <span class="font-medium">Schedule</span>
            </a>

            <a href="{{ route('demo.sns-tool.templates') }}"
               class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-gray-50 transition {{ request()->routeIs('demo.sns-tool.templates') ? 'bg-purple-50 text-purple-600 font-semibold' : 'text-gray-700' }}">
                <span class="text-xl mr-3">📋</span>
                <span class="font-medium">Templates</span>
            </a>

            <a href="{{ route('demo.sns-tool.analytics') }}"
               class="flex items-center px-4 py-3 mb-2 rounded-lg hover:bg-gray-50 transition {{ request()->routeIs('demo.sns-tool.analytics') ? 'bg-purple-50 text-purple-600 font-semibold' : 'text-gray-700' }}">
                <span class="text-xl mr-3">📈</span>
                <span class="font-medium">Analytics</span>
            </a>
        </nav>

        <!-- デモ通知 -->
        <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-200 bg-amber-50">
            <p class="text-xs text-amber-800 font-medium mb-2">🎨 Demo Mode</p>
            <a href="{{ route('projects.index') }}" class="text-xs text-amber-600 hover:text-amber-800 hover:underline">
                ← Back to Projects
            </a>
        </div>
    </div>

    <!-- オーバーレイ（モバイル用） -->
    <div id="overlay" onclick="toggleMobileMenu()" class="lg:hidden fixed inset-0 bg-black bg-opacity-50 z-30 hidden"></div>

    <!-- メインコンテンツエリア -->
    <div class="lg:ml-64">
        <!-- ヘッダー -->
        <header class="bg-white border-b border-gray-200 sticky top-0 z-20">
            <div class="px-4 lg:px-8 py-4 flex items-center justify-between">
                <h2 class="text-xl font-bold text-gray-800 ml-12 lg:ml-0">@yield('page-title', 'Dashboard')</h2>
                <div class="flex items-center gap-4">
                    <a href="{{ route('demo.sns-tool.posts.create') }}"
                       class="hidden sm:flex items-center px-4 py-2 bg-gradient-to-r from-purple-500 via-pink-500 to-orange-400 text-white rounded-lg shadow-md hover:shadow-lg transition">
                        <span class="mr-2">+</span> New Post
                    </a>
                    <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-pink-400 rounded-full flex items-center justify-center text-white font-bold shadow-sm">
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
                    SNS Manager Demo - Instagram & Google My Business Management Tool
                </p>
                <p class="text-xs text-gray-400 text-center mt-2">
                    ※ このツールはデモ用です。実際の機能ではありません。
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

        // モバイルメニュー以外をクリックしたら閉じる
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
