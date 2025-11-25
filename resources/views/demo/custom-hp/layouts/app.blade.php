<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Creative Corporation') - カスタムHPデモ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap');

        * {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Helvetica Neue', sans-serif;
        }

        body {
            background: #fafafa;
            overflow-x: hidden;
            position: relative;
        }

        /* Smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Background Abstract Objects */
        .bg-abstract {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .abstract-shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.7;
            animation: float 20s infinite ease-in-out;
        }

        .abstract-shape-1 {
            width: 800px;
            height: 800px;
            background: linear-gradient(135deg, rgba(232, 161, 69, 0.6), rgba(232, 161, 69, 0.3));
            top: -200px;
            left: -200px;
            animation-delay: 0s;
        }

        .abstract-shape-2 {
            width: 700px;
            height: 700px;
            background: linear-gradient(135deg, rgba(255, 153, 153, 0.6), rgba(255, 153, 153, 0.3));
            top: 15%;
            right: -250px;
            animation-delay: 5s;
        }

        .abstract-shape-3 {
            width: 650px;
            height: 650px;
            background: linear-gradient(135deg, rgba(232, 161, 69, 0.5), rgba(255, 153, 153, 0.3));
            bottom: 5%;
            left: 5%;
            animation-delay: 10s;
        }

        .abstract-shape-4 {
            width: 600px;
            height: 600px;
            background: linear-gradient(135deg, rgba(255, 153, 153, 0.5), rgba(232, 161, 69, 0.3));
            bottom: -150px;
            right: 15%;
            animation-delay: 15s;
        }

        .abstract-shape-5 {
            width: 550px;
            height: 550px;
            background: radial-gradient(circle, rgba(255, 153, 153, 0.5), rgba(232, 161, 69, 0.2));
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation-delay: 7s;
        }

        @keyframes float {
            0%, 100% {
                transform: translate(0, 0) scale(1);
            }
            25% {
                transform: translate(30px, -30px) scale(1.05);
            }
            50% {
                transform: translate(-20px, 20px) scale(0.95);
            }
            75% {
                transform: translate(20px, 30px) scale(1.02);
            }
        }

        /* Noise texture overlay */
        .bg-abstract::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
            pointer-events: none;
        }

        /* Glassmorphism card styles */
        .glass-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.06);
        }

        .glass-card-strong {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(30px);
            -webkit-backdrop-filter: blur(30px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.08);
        }

        /* Glassmorphism navigation */
        .glass-nav {
            background: rgba(255, 255, 255, 0.75);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.04);
        }

        /* Content wrapper to sit above background */
        .content-wrapper {
            position: relative;
            z-index: 1;
        }

        /* Hover effects for glass cards */
        .glass-card-hover {
            transition: all 0.3s ease;
        }

        .glass-card-hover:hover {
            background: rgba(255, 255, 255, 0.85);
            transform: translateY(-2px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.08);
        }

        /* Button styles */
        .glass-button {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            transition: all 0.3s ease;
        }

        .glass-button:hover {
            background: rgba(255, 255, 255, 0.8);
            transform: translateY(-1px);
        }

        .glass-button-primary {
            background: rgba(232, 161, 69, 0.7);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(232, 161, 69, 0.5);
            color: white;
        }

        .glass-button-primary:hover {
            background: rgba(232, 161, 69, 0.85);
        }
    </style>
</head>
<body>
    <!-- Background Abstract Objects -->
    <div class="bg-abstract">
        <div class="abstract-shape abstract-shape-1"></div>
        <div class="abstract-shape abstract-shape-2"></div>
        <div class="abstract-shape abstract-shape-3"></div>
        <div class="abstract-shape abstract-shape-4"></div>
        <div class="abstract-shape abstract-shape-5"></div>
    </div>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Header / Navigation -->
        <header class="glass-nav sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-6 lg:px-8">
                <div class="flex justify-between items-center h-20">
                    <!-- Logo -->
                    <div class="flex-shrink-0">
                        <a href="{{ route('demo.custom-hp.index') }}" class="text-2xl font-light text-gray-900 hover:text-gray-700 transition-colors">
                            Creative Corp.
                        </a>
                    </div>

                    <!-- Desktop Navigation -->
                    <nav class="hidden md:flex space-x-12 lg:space-x-16">
                        <a href="{{ route('demo.custom-hp.index') }}" class="text-sm font-light text-gray-700 hover:text-gray-900 transition-colors {{ request()->routeIs('demo.custom-hp.index') ? 'text-gray-900 font-normal' : '' }}">
                            ホーム
                        </a>
                        <a href="{{ route('demo.custom-hp.about') }}" class="text-sm font-light text-gray-700 hover:text-gray-900 transition-colors {{ request()->routeIs('demo.custom-hp.about') ? 'text-gray-900 font-normal' : '' }}">
                            会社概要
                        </a>
                        <a href="{{ route('demo.custom-hp.service') }}" class="text-sm font-light text-gray-700 hover:text-gray-900 transition-colors {{ request()->routeIs('demo.custom-hp.service') ? 'text-gray-900 font-normal' : '' }}">
                            サービス
                        </a>
                        <a href="{{ route('demo.custom-hp.works') }}" class="text-sm font-light text-gray-700 hover:text-gray-900 transition-colors {{ request()->routeIs('demo.custom-hp.works') ? 'text-gray-900 font-normal' : '' }}">
                            実績
                        </a>
                        <a href="{{ route('demo.custom-hp.news') }}" class="text-sm font-light text-gray-700 hover:text-gray-900 transition-colors {{ request()->routeIs('demo.custom-hp.news*') ? 'text-gray-900 font-normal' : '' }}">
                            お知らせ
                        </a>
                        <a href="{{ route('demo.custom-hp.contact') }}" class="text-sm font-light text-gray-700 hover:text-gray-900 transition-colors {{ request()->routeIs('demo.custom-hp.contact') ? 'text-gray-900 font-normal' : '' }}">
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
            <div id="mobile-menu" class="hidden md:hidden border-t border-white/30">
                <div class="px-6 py-4 space-y-3">
                    <a href="{{ route('demo.custom-hp.index') }}" class="block py-2 text-sm font-light text-gray-700 hover:text-gray-900 {{ request()->routeIs('demo.custom-hp.index') ? 'text-gray-900 font-normal' : '' }}">
                        ホーム
                    </a>
                    <a href="{{ route('demo.custom-hp.about') }}" class="block py-2 text-sm font-light text-gray-700 hover:text-gray-900 {{ request()->routeIs('demo.custom-hp.about') ? 'text-gray-900 font-normal' : '' }}">
                        会社概要
                    </a>
                    <a href="{{ route('demo.custom-hp.service') }}" class="block py-2 text-sm font-light text-gray-700 hover:text-gray-900 {{ request()->routeIs('demo.custom-hp.service') ? 'text-gray-900 font-normal' : '' }}">
                        サービス
                    </a>
                    <a href="{{ route('demo.custom-hp.works') }}" class="block py-2 text-sm font-light text-gray-700 hover:text-gray-900 {{ request()->routeIs('demo.custom-hp.works') ? 'text-gray-900 font-normal' : '' }}">
                        実績
                    </a>
                    <a href="{{ route('demo.custom-hp.news') }}" class="block py-2 text-sm font-light text-gray-700 hover:text-gray-900 {{ request()->routeIs('demo.custom-hp.news*') ? 'text-gray-900 font-normal' : '' }}">
                        お知らせ
                    </a>
                    <a href="{{ route('demo.custom-hp.contact') }}" class="block py-2 text-sm font-light text-gray-700 hover:text-gray-900 {{ request()->routeIs('demo.custom-hp.contact') ? 'text-gray-900 font-normal' : '' }}">
                        お問い合わせ
                    </a>
                </div>
            </div>
        </header>

        <!-- Demo Notice -->
        <div class="glass-card border-t-0 rounded-none">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 py-3">
                <p class="text-xs text-gray-700 text-center font-light">
                    <span class="font-normal">デモモード:</span> これはデモ用のモックアップです。グラスモーフィズム × アーティスティックなデザインをご体験ください。
                </p>
            </div>
        </div>

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="glass-card-strong mt-32 rounded-none">
            <div class="max-w-7xl mx-auto px-6 lg:px-8 py-16">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
                    <!-- Company Info -->
                    <div class="md:col-span-2">
                        <h3 class="text-xl font-light text-gray-900 mb-6">Creative Corporation</h3>
                        <p class="text-gray-700 text-sm font-light leading-relaxed mb-4">
                            デザインとテクノロジーの力で、<br>
                            新しい価値を創造し、社会に貢献する。
                        </p>
                        <p class="text-gray-600 text-sm font-light leading-relaxed">
                            〒150-0013<br>
                            東京都渋谷区恵比寿1-1-1<br>
                            TEL: 03-1234-5678<br>
                            Email: info@creative-corp.jp
                        </p>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h3 class="text-sm font-normal text-gray-900 mb-6">サイトマップ</h3>
                        <ul class="space-y-3 text-sm font-light">
                            <li><a href="{{ route('demo.custom-hp.index') }}" class="text-gray-700 hover:text-gray-900 transition-colors">ホーム</a></li>
                            <li><a href="{{ route('demo.custom-hp.about') }}" class="text-gray-700 hover:text-gray-900 transition-colors">会社概要</a></li>
                            <li><a href="{{ route('demo.custom-hp.service') }}" class="text-gray-700 hover:text-gray-900 transition-colors">サービス</a></li>
                            <li><a href="{{ route('demo.custom-hp.works') }}" class="text-gray-700 hover:text-gray-900 transition-colors">実績</a></li>
                            <li><a href="{{ route('demo.custom-hp.news') }}" class="text-gray-700 hover:text-gray-900 transition-colors">お知らせ</a></li>
                            <li><a href="{{ route('demo.custom-hp.contact') }}" class="text-gray-700 hover:text-gray-900 transition-colors">お問い合わせ</a></li>
                        </ul>
                    </div>

                    <!-- Business Hours -->
                    <div>
                        <h3 class="text-sm font-normal text-gray-900 mb-6">営業時間</h3>
                        <p class="text-gray-700 text-sm font-light leading-relaxed">
                            平日 9:00 - 18:00<br>
                            （土日祝日は休業）
                        </p>
                    </div>
                </div>

                <div class="border-t border-gray-200/50 mt-12 pt-8 text-center">
                    <p class="text-gray-600 text-xs font-light">
                        &copy; 2025 Creative Corporation. All rights reserved.
                    </p>
                </div>
            </div>

            <!-- Back to Projects Button -->
            <div class="border-t border-gray-200/30">
                <div class="max-w-7xl mx-auto px-6 lg:px-8 py-4 text-center">
                    <a href="{{ route('projects.index') }}" class="inline-flex items-center text-xs text-gray-600 hover:text-gray-900 transition-colors font-light">
                        <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        プロジェクト一覧に戻る
                    </a>
                </div>
            </div>
        </footer>
    </div>

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
