<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'サンプル株式会社') - シンプルHPデモ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white dark:bg-gray-900">
    <!-- Header -->
    <header class="bg-white dark:bg-gray-800 shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('demo.simple-hp.index') }}" class="text-2xl font-bold text-blue-600 dark:text-blue-400">
                        Sample Corp.
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex space-x-8">
                    <a href="{{ route('demo.simple-hp.index') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 px-3 py-2 text-sm font-medium {{ request()->routeIs('demo.simple-hp.index') ? 'text-blue-600 dark:text-blue-400' : '' }}">
                        ホーム
                    </a>
                    <a href="{{ route('demo.simple-hp.about') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 px-3 py-2 text-sm font-medium {{ request()->routeIs('demo.simple-hp.about') ? 'text-blue-600 dark:text-blue-400' : '' }}">
                        会社概要
                    </a>
                    <a href="{{ route('demo.simple-hp.service') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 px-3 py-2 text-sm font-medium {{ request()->routeIs('demo.simple-hp.service') ? 'text-blue-600 dark:text-blue-400' : '' }}">
                        サービス
                    </a>
                    <a href="{{ route('demo.simple-hp.contact') }}" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 px-3 py-2 text-sm font-medium {{ request()->routeIs('demo.simple-hp.contact') ? 'text-blue-600 dark:text-blue-400' : '' }}">
                        お問い合わせ
                    </a>
                </nav>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" id="mobile-menu-button" class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="hidden md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 bg-white dark:bg-gray-800 shadow-lg">
                <a href="{{ route('demo.simple-hp.index') }}" class="block px-3 py-2 text-base font-medium text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 {{ request()->routeIs('demo.simple-hp.index') ? 'text-blue-600 dark:text-blue-400 bg-gray-50 dark:bg-gray-700' : '' }}">
                    ホーム
                </a>
                <a href="{{ route('demo.simple-hp.about') }}" class="block px-3 py-2 text-base font-medium text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 {{ request()->routeIs('demo.simple-hp.about') ? 'text-blue-600 dark:text-blue-400 bg-gray-50 dark:bg-gray-700' : '' }}">
                    会社概要
                </a>
                <a href="{{ route('demo.simple-hp.service') }}" class="block px-3 py-2 text-base font-medium text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 {{ request()->routeIs('demo.simple-hp.service') ? 'text-blue-600 dark:text-blue-400 bg-gray-50 dark:bg-gray-700' : '' }}">
                    サービス
                </a>
                <a href="{{ route('demo.simple-hp.contact') }}" class="block px-3 py-2 text-base font-medium text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 {{ request()->routeIs('demo.simple-hp.contact') ? 'text-blue-600 dark:text-blue-400 bg-gray-50 dark:bg-gray-700' : '' }}">
                    お問い合わせ
                </a>
            </div>
        </div>
    </header>

    <!-- Demo Notice -->
    <div class="bg-yellow-50 dark:bg-yellow-900/20 border-b border-yellow-200 dark:border-yellow-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2">
            <p class="text-sm text-yellow-800 dark:text-yellow-200 text-center">
                <span class="font-semibold">デモモード:</span> これはデモ用のモックアップです。実際のデータは保存されません。
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 dark:bg-gray-950 text-white mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Company Info -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">サンプル株式会社</h3>
                    <p class="text-gray-400 text-sm">
                        〒100-0005<br>
                        東京都千代田区丸の内1-1-1<br>
                        TEL: 03-1234-5678
                    </p>
                </div>

                <!-- Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">サイトマップ</h3>
                    <ul class="space-y-2 text-sm">
                        <li><a href="{{ route('demo.simple-hp.index') }}" class="text-gray-400 hover:text-white transition-colors">ホーム</a></li>
                        <li><a href="{{ route('demo.simple-hp.about') }}" class="text-gray-400 hover:text-white transition-colors">会社概要</a></li>
                        <li><a href="{{ route('demo.simple-hp.service') }}" class="text-gray-400 hover:text-white transition-colors">サービス</a></li>
                        <li><a href="{{ route('demo.simple-hp.contact') }}" class="text-gray-400 hover:text-white transition-colors">お問い合わせ</a></li>
                    </ul>
                </div>

                <!-- Business Hours -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">営業時間</h3>
                    <p class="text-gray-400 text-sm">
                        平日 9:00 - 18:00<br>
                        （土日祝日は休業）
                    </p>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p class="text-gray-400 text-sm">
                    &copy; 2025 Sample Corporation. All rights reserved.
                </p>
            </div>
        </div>

        <!-- Back to Projects Button -->
        <div class="border-t border-gray-700 bg-gray-900 dark:bg-black">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 text-center">
                <a href="{{ route('projects.index') }}" class="inline-flex items-center text-sm text-gray-400 hover:text-white transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    プロジェクト一覧に戻る
                </a>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu Toggle Script -->
    <script>
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>

    @stack('scripts')
</body>
</html>
