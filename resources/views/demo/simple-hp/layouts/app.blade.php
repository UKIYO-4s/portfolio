<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'サンプル株式会社') - シンプルHPデモ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white">
    <!-- Header -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="{{ route('demo.simple-hp.index') }}" class="text-2xl font-light text-gray-900 hover:text-gray-700 transition-colors">
                        Sample Corp.
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <nav class="hidden md:flex space-x-12">
                    <a href="{{ route('demo.simple-hp.index') }}" class="text-gray-700 hover:text-gray-900 text-sm font-light transition-colors {{ request()->routeIs('demo.simple-hp.index') ? 'text-gray-900 font-normal' : '' }}">
                        ホーム
                    </a>
                    <a href="{{ route('demo.simple-hp.about') }}" class="text-gray-700 hover:text-gray-900 text-sm font-light transition-colors {{ request()->routeIs('demo.simple-hp.about') ? 'text-gray-900 font-normal' : '' }}">
                        会社概要
                    </a>
                    <a href="{{ route('demo.simple-hp.service') }}" class="text-gray-700 hover:text-gray-900 text-sm font-light transition-colors {{ request()->routeIs('demo.simple-hp.service') ? 'text-gray-900 font-normal' : '' }}">
                        サービス
                    </a>
                    <a href="{{ route('demo.simple-hp.contact') }}" class="text-gray-700 hover:text-gray-900 text-sm font-light transition-colors {{ request()->routeIs('demo.simple-hp.contact') ? 'text-gray-900 font-normal' : '' }}">
                        お問い合わせ
                    </a>
                </nav>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" id="mobile-menu-button" class="text-gray-700 hover:text-gray-900 focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="hidden md:hidden border-t border-gray-200">
            <div class="px-4 py-4 space-y-3 bg-white">
                <a href="{{ route('demo.simple-hp.index') }}" class="block py-2 text-sm font-light text-gray-700 hover:text-gray-900 {{ request()->routeIs('demo.simple-hp.index') ? 'text-gray-900 font-normal' : '' }}">
                    ホーム
                </a>
                <a href="{{ route('demo.simple-hp.about') }}" class="block py-2 text-sm font-light text-gray-700 hover:text-gray-900 {{ request()->routeIs('demo.simple-hp.about') ? 'text-gray-900 font-normal' : '' }}">
                    会社概要
                </a>
                <a href="{{ route('demo.simple-hp.service') }}" class="block py-2 text-sm font-light text-gray-700 hover:text-gray-900 {{ request()->routeIs('demo.simple-hp.service') ? 'text-gray-900 font-normal' : '' }}">
                    サービス
                </a>
                <a href="{{ route('demo.simple-hp.contact') }}" class="block py-2 text-sm font-light text-gray-700 hover:text-gray-900 {{ request()->routeIs('demo.simple-hp.contact') ? 'text-gray-900 font-normal' : '' }}">
                    お問い合わせ
                </a>
            </div>
        </div>
    </header>

    <!-- Demo Notice -->
    <div class="bg-yellow-50 border-b border-yellow-100">
        <div class="max-w-7xl mx-auto px-8 py-3">
            <p class="text-xs text-yellow-800 text-center font-light">
                <span class="font-normal">デモモード:</span> これはデモ用のモックアップです。実際のデータは保存されません。
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-50 text-gray-700 mt-32 border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <!-- Company Info -->
                <div>
                    <h3 class="text-base font-normal text-gray-900 mb-6">サンプル株式会社</h3>
                    <p class="text-gray-600 text-sm font-light leading-relaxed">
                        〒100-0005<br>
                        東京都千代田区丸の内1-1-1<br>
                        TEL: 03-1234-5678
                    </p>
                </div>

                <!-- Links -->
                <div>
                    <h3 class="text-base font-normal text-gray-900 mb-6">サイトマップ</h3>
                    <ul class="space-y-3 text-sm font-light">
                        <li><a href="{{ route('demo.simple-hp.index') }}" class="text-gray-600 hover:text-gray-900 transition-colors">ホーム</a></li>
                        <li><a href="{{ route('demo.simple-hp.about') }}" class="text-gray-600 hover:text-gray-900 transition-colors">会社概要</a></li>
                        <li><a href="{{ route('demo.simple-hp.service') }}" class="text-gray-600 hover:text-gray-900 transition-colors">サービス</a></li>
                        <li><a href="{{ route('demo.simple-hp.contact') }}" class="text-gray-600 hover:text-gray-900 transition-colors">お問い合わせ</a></li>
                    </ul>
                </div>

                <!-- Business Hours -->
                <div>
                    <h3 class="text-base font-normal text-gray-900 mb-6">営業時間</h3>
                    <p class="text-gray-600 text-sm font-light leading-relaxed">
                        平日 9:00 - 18:00<br>
                        （土日祝日は休業）
                    </p>
                </div>
            </div>

            <div class="border-t border-gray-200 mt-12 pt-8 text-center">
                <p class="text-gray-500 text-xs font-light">
                    &copy; 2025 Sample Corporation. All rights reserved.
                </p>
            </div>
        </div>

        <!-- Back to Projects Button -->
        <div class="border-t border-gray-200 bg-white">
            <div class="max-w-7xl mx-auto px-8 py-4 text-center">
                <a href="{{ route('projects.index') }}" class="inline-flex items-center text-xs text-gray-600 hover:text-gray-900 transition-colors font-light">
                    <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
