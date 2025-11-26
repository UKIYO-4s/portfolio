<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Greenline Studio') - シンプルHPデモ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white">
    <!-- Header -->
    <header class="bg-white/95 backdrop-blur-sm border-b border-gray-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('demo.simple-hp.index') }}" class="text-2xl font-semibold text-gray-900 hover:text-gray-700 transition-colors">
                        Greenline Studio
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('demo.simple-hp.index') }}" class="text-gray-600 hover:text-gray-900 text-sm font-medium transition-colors {{ request()->routeIs('demo.simple-hp.index') ? 'text-gray-900' : '' }}">
                        ホーム
                    </a>
                    <a href="{{ route('demo.simple-hp.about') }}" class="text-gray-600 hover:text-gray-900 text-sm font-medium transition-colors {{ request()->routeIs('demo.simple-hp.about') ? 'text-gray-900' : '' }}">
                        会社概要
                    </a>
                    <a href="{{ route('demo.simple-hp.service') }}" class="text-gray-600 hover:text-gray-900 text-sm font-medium transition-colors {{ request()->routeIs('demo.simple-hp.service') ? 'text-gray-900' : '' }}">
                        サービス
                    </a>
                    <a href="{{ route('demo.simple-hp.contact') }}" class="text-gray-600 hover:text-gray-900 text-sm font-medium transition-colors {{ request()->routeIs('demo.simple-hp.contact') ? 'text-gray-900' : '' }}">
                        お問い合わせ
                    </a>
                    <a href="{{ route('demo.simple-hp.contact') }}" class="bg-emerald-600 text-white px-6 py-2 rounded-full text-sm font-medium hover:bg-emerald-700 transition-colors">
                        ご相談
                    </a>
                </nav>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" id="mobile-menu-button" class="text-gray-700 hover:text-gray-900 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-gray-200">
            <div class="px-4 py-4 space-y-1 bg-white">
                <a href="{{ route('demo.simple-hp.index') }}" class="block py-3 text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 px-4 rounded-lg transition-colors {{ request()->routeIs('demo.simple-hp.index') ? 'text-gray-900 bg-gray-50' : '' }}">
                    ホーム
                </a>
                <a href="{{ route('demo.simple-hp.about') }}" class="block py-3 text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 px-4 rounded-lg transition-colors {{ request()->routeIs('demo.simple-hp.about') ? 'text-gray-900 bg-gray-50' : '' }}">
                    会社概要
                </a>
                <a href="{{ route('demo.simple-hp.service') }}" class="block py-3 text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 px-4 rounded-lg transition-colors {{ request()->routeIs('demo.simple-hp.service') ? 'text-gray-900 bg-gray-50' : '' }}">
                    サービス
                </a>
                <a href="{{ route('demo.simple-hp.contact') }}" class="block py-3 text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 px-4 rounded-lg transition-colors {{ request()->routeIs('demo.simple-hp.contact') ? 'text-gray-900 bg-gray-50' : '' }}">
                    お問い合わせ
                </a>
                <a href="{{ route('demo.simple-hp.contact') }}" class="block py-3 text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 px-4 rounded-lg transition-colors text-center">
                    ご相談
                </a>
            </div>
        </div>
    </header>

    <!-- Demo Notice -->
    <div class="bg-yellow-50 border-b border-yellow-200">
        <div class="max-w-7xl mx-auto px-8 py-3">
            <p class="text-xs text-yellow-800 text-center">
                <span class="font-semibold">デモモード:</span> これはデモ用のモックアップです。実際のデータは保存されません。
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 mt-24">
        <div class="max-w-7xl mx-auto px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Company Info -->
                <div>
                    <h3 class="text-lg font-semibold text-white mb-6">Greenline Studio</h3>
                    <p class="text-gray-400 text-sm leading-relaxed">
                        〒150-0001<br>
                        東京都渋谷区神宮前3-1-1<br>
                        TEL: 03-1234-5678<br>
                        Email: info@greenline-studio.jp
                    </p>
                </div>

                <!-- Links -->
                <div>
                    <h3 class="text-lg font-semibold text-white mb-6">サイトマップ</h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="{{ route('demo.simple-hp.index') }}" class="text-gray-400 hover:text-white transition-colors">ホーム</a></li>
                        <li><a href="{{ route('demo.simple-hp.about') }}" class="text-gray-400 hover:text-white transition-colors">会社概要</a></li>
                        <li><a href="{{ route('demo.simple-hp.service') }}" class="text-gray-400 hover:text-white transition-colors">サービス</a></li>
                        <li><a href="{{ route('demo.simple-hp.contact') }}" class="text-gray-400 hover:text-white transition-colors">お問い合わせ</a></li>
                    </ul>
                </div>

                <!-- Quick Contact -->
                <div>
                    <h3 class="text-lg font-semibold text-white mb-6">お問い合わせ</h3>
                    <p class="text-gray-400 text-sm leading-relaxed mb-4">
                        お気軽にご相談ください
                    </p>
                    <a href="{{ route('demo.simple-hp.contact') }}" class="inline-block bg-emerald-600 text-white px-6 py-2.5 rounded-lg text-sm font-medium hover:bg-emerald-700 transition-colors">
                        お問い合わせフォーム
                    </a>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-12 pt-8 text-center">
                <p class="text-gray-500 text-sm">
                    &copy; 2025 Greenline Studio. All rights reserved.
                </p>
            </div>
        </div>

        <!-- Back to Projects Button -->
        <div class="border-t border-gray-800 bg-gray-950">
            <div class="max-w-7xl mx-auto px-8 py-4 text-center">
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
