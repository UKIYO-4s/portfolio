<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Creative Studio') - カスタムHPデモ</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        /* === CSS変数定義 === */
        :root {
            /* ベースカラー */
            --base-bg: #F7F6F4;
            --secondary-bg: #EDEBE8;

            /* テキストカラー */
            --text-primary: #121212;
            --text-secondary: #6B6B6B;

            /* アクセントカラー（1色のみ） */
            --accent-deep-green: #357A63;
            --accent-deep-green-hover: #2A6350;

            /* ガラス要素 */
            --glass-bg: rgba(255, 255, 255, 0.65);
            --glass-border: rgba(255, 255, 255, 0.8);
            --glass-shadow: rgba(0, 0, 0, 0.06);

            /* ラインアート */
            --line-color: rgba(0, 0, 0, 0.12);
            --line-glow: rgba(53, 122, 99, 0.15);
        }

        * {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Helvetica Neue', sans-serif;
        }

        body {
            background: var(--base-bg);
            overflow-x: hidden;
            position: relative;
            min-height: 100vh;
        }

        html {
            scroll-behavior: smooth;
        }

        /* Content wrapper */
        .content-wrapper {
            position: relative;
            z-index: 1;
        }

        /* === ミニマル・グラスモーフィズム === */
        .glass-card-minimal {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            box-shadow:
                0 1px 3px var(--glass-shadow),
                0 0 0 1px rgba(255, 255, 255, 0.8) inset;
            border-radius: 16px;
            transition: all 0.3s ease;
        }

        .glass-card-minimal:hover {
            background: rgba(255, 255, 255, 0.75);
            box-shadow:
                0 4px 12px rgba(0, 0, 0, 0.08),
                0 0 0 1px rgba(255, 255, 255, 0.9) inset;
        }

        /* ヘッダー */
        .glass-header {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--glass-border);
        }

        /* ボタン */
        .btn-primary {
            background: var(--accent-deep-green);
            color: white;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: var(--accent-deep-green-hover);
        }

        .btn-outline {
            background: transparent;
            border: 1px solid rgba(0, 0, 0, 0.1);
            color: var(--text-primary);
            transition: all 0.3s ease;
        }

        .btn-outline:hover {
            border-color: var(--accent-deep-green);
            color: var(--accent-deep-green);
        }

        /* 小型アイコン */
        .icon-minimal {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: rgba(53, 122, 99, 0.1);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: var(--accent-deep-green);
        }

        /* モバイル対応 */
        @media (max-width: 768px) {
            .glass-card-minimal {
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
            }

            .glass-header {
                backdrop-filter: blur(12px);
                -webkit-backdrop-filter: blur(12px);
            }
        }
    </style>
</head>
<body>
    <!-- 固定背景レイヤー -->
    <div class="fixed inset-0 -z-10 bg-[#F7F6F4]">
        <!-- 抽象ラインアート -->
        <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">
            <!-- 線1: 左上から右下へ緩やかな曲線 -->
            <path
                d="M -200 200 Q 400 400, 1200 600 T 2400 1000"
                stroke="rgba(0, 0, 0, 0.12)"
                stroke-width="1"
                fill="none"
            />

            <!-- 線2: 右上から左下へ -->
            <path
                d="M 1800 -100 Q 1200 300, 600 700 T -200 1200"
                stroke="rgba(0, 0, 0, 0.12)"
                stroke-width="1"
                fill="none"
            />

            <!-- 線3: 中央を横断 -->
            <path
                d="M -100 500 Q 600 450, 1200 520 T 2400 500"
                stroke="rgba(0, 0, 0, 0.12)"
                stroke-width="1"
                fill="none"
            />

            <!-- 円アウトライン1（左上寄り） -->
            <circle
                cx="400"
                cy="300"
                r="250"
                stroke="rgba(0, 0, 0, 0.06)"
                stroke-width="1"
                fill="none"
            />

            <!-- 円アウトライン2（右下寄り・少し小さめ） -->
            <circle
                cx="1400"
                cy="800"
                r="180"
                stroke="rgba(0, 0, 0, 0.06)"
                stroke-width="1"
                fill="none"
            />

            <!-- 六角形アウトライン（中央やや右） -->
            <polygon
                points="1100,400 1200,460 1200,580 1100,640 1000,580 1000,460"
                stroke="rgba(0, 0, 0, 0.06)"
                stroke-width="1"
                fill="none"
            />

            <!-- 交点グロウ1（線1と線2の交点付近） -->
            <circle
                cx="900"
                cy="550"
                r="120"
                fill="rgba(53, 122, 99, 0.15)"
                style="filter: blur(60px);"
            />

            <!-- 交点グロウ2（線2と線3の交点付近） -->
            <circle
                cx="1400"
                cy="400"
                r="100"
                fill="rgba(53, 122, 99, 0.12)"
                style="filter: blur(50px);"
            />
        </svg>

        <!-- 微グラデーション（空気感） -->
        <div class="absolute inset-0 bg-gradient-to-br from-[#EDEBE8]/30 via-transparent to-[#F7F6F4]"></div>
    </div>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Header / Navigation -->
        <header class="glass-header fixed top-0 w-full z-50">
            <div class="max-w-7xl mx-auto px-8">
                <div class="flex justify-between items-center h-20">
                    <!-- Logo -->
                    <a href="{{ route('demo.custom-hp.index') }}" class="text-2xl font-semibold text-[#121212]">
                        Creative Studio
                    </a>

                    <!-- Desktop Navigation -->
                    <nav class="hidden md:flex items-center space-x-8">
                        <a href="{{ route('demo.custom-hp.index') }}" class="text-sm text-[#6B6B6B] hover:text-[#1F3A2E] transition-colors {{ request()->routeIs('demo.custom-hp.index') ? 'text-[#1F3A2E] font-medium' : '' }}">
                            ホーム
                        </a>
                        <a href="{{ route('demo.custom-hp.about') }}" class="text-sm text-[#6B6B6B] hover:text-[#1F3A2E] transition-colors {{ request()->routeIs('demo.custom-hp.about') ? 'text-[#1F3A2E] font-medium' : '' }}">
                            私たちについて
                        </a>
                        <a href="{{ route('demo.custom-hp.service') }}" class="text-sm text-[#6B6B6B] hover:text-[#1F3A2E] transition-colors {{ request()->routeIs('demo.custom-hp.service') ? 'text-[#1F3A2E] font-medium' : '' }}">
                            サービス
                        </a>
                        <a href="{{ route('demo.custom-hp.works') }}" class="text-sm text-[#6B6B6B] hover:text-[#1F3A2E] transition-colors {{ request()->routeIs('demo.custom-hp.works') ? 'text-[#1F3A2E] font-medium' : '' }}">
                            実績
                        </a>
                        <a href="{{ route('demo.custom-hp.news') }}" class="text-sm text-[#6B6B6B] hover:text-[#1F3A2E] transition-colors {{ request()->routeIs('demo.custom-hp.news*') ? 'text-[#1F3A2E] font-medium' : '' }}">
                            お知らせ
                        </a>
                        <a href="{{ route('demo.custom-hp.contact') }}" class="btn-primary px-6 py-2 rounded-full text-sm hover:bg-[#152821] transition-colors">
                            お問い合わせ
                        </a>
                    </nav>

                    <!-- Mobile menu button -->
                    <div class="md:hidden">
                        <button type="button" id="mobile-menu-button" class="text-[#6B6B6B] hover:text-[#121212] focus:outline-none">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="hidden md:hidden border-t border-[rgba(0,0,0,0.08)]">
                <div class="px-8 py-4 space-y-3 bg-white/80">
                    <a href="{{ route('demo.custom-hp.index') }}" class="block py-2 text-sm text-[#6B6B6B] hover:text-[#1F3A2E] {{ request()->routeIs('demo.custom-hp.index') ? 'text-[#1F3A2E] font-medium' : '' }}">
                        ホーム
                    </a>
                    <a href="{{ route('demo.custom-hp.about') }}" class="block py-2 text-sm text-[#6B6B6B] hover:text-[#1F3A2E] {{ request()->routeIs('demo.custom-hp.about') ? 'text-[#1F3A2E] font-medium' : '' }}">
                        私たちについて
                    </a>
                    <a href="{{ route('demo.custom-hp.service') }}" class="block py-2 text-sm text-[#6B6B6B] hover:text-[#1F3A2E] {{ request()->routeIs('demo.custom-hp.service') ? 'text-[#1F3A2E] font-medium' : '' }}">
                        サービス
                    </a>
                    <a href="{{ route('demo.custom-hp.works') }}" class="block py-2 text-sm text-[#6B6B6B] hover:text-[#1F3A2E] {{ request()->routeIs('demo.custom-hp.works') ? 'text-[#1F3A2E] font-medium' : '' }}">
                        実績
                    </a>
                    <a href="{{ route('demo.custom-hp.news') }}" class="block py-2 text-sm text-[#6B6B6B] hover:text-[#1F3A2E] {{ request()->routeIs('demo.custom-hp.news*') ? 'text-[#1F3A2E] font-medium' : '' }}">
                        お知らせ
                    </a>
                    <a href="{{ route('demo.custom-hp.contact') }}" class="block py-2 text-sm text-[#1F3A2E] font-medium">
                        お問い合わせ
                    </a>
                </div>
            </div>
        </header>

        <!-- Spacer for fixed header -->
        <div class="h-20"></div>

        <!-- Demo Notice -->
        <div class="bg-[#121212] text-white">
            <div class="max-w-7xl mx-auto px-8 py-3">
                <p class="text-xs text-center text-[#F7F6F4]/80">
                    <span class="font-medium text-[#F7F6F4]">Demo Mode:</span> ミニマル・グラスモーフィズムデザインのデモです
                </p>
            </div>
        </div>

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-[#121212] text-[#F7F6F4] pt-16 pb-8">
            <div class="max-w-7xl mx-auto px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                    <!-- Company Info -->
                    <div class="md:col-span-2">
                        <h3 class="text-xl font-semibold mb-6">Creative Studio</h3>
                        <p class="text-[#6B6B6B] text-sm leading-relaxed mb-4">
                            デザインと技術の交差点で、<br>
                            唯一無二のWeb体験を創造します。
                        </p>
                        <p class="text-[#6B6B6B] text-sm leading-relaxed">
                            〒150-0013<br>
                            東京都渋谷区恵比寿1-1-1<br>
                            info@creative-studio.jp
                        </p>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h3 class="text-sm font-semibold mb-6">Menu</h3>
                        <ul class="space-y-3 text-sm">
                            <li><a href="{{ route('demo.custom-hp.index') }}" class="text-[#6B6B6B] hover:text-[#F7F6F4] transition-colors">ホーム</a></li>
                            <li><a href="{{ route('demo.custom-hp.about') }}" class="text-[#6B6B6B] hover:text-[#F7F6F4] transition-colors">私たちについて</a></li>
                            <li><a href="{{ route('demo.custom-hp.service') }}" class="text-[#6B6B6B] hover:text-[#F7F6F4] transition-colors">サービス</a></li>
                            <li><a href="{{ route('demo.custom-hp.works') }}" class="text-[#6B6B6B] hover:text-[#F7F6F4] transition-colors">実績</a></li>
                            <li><a href="{{ route('demo.custom-hp.contact') }}" class="text-[#6B6B6B] hover:text-[#F7F6F4] transition-colors">お問い合わせ</a></li>
                        </ul>
                    </div>

                    <!-- Contact -->
                    <div>
                        <h3 class="text-sm font-semibold mb-6">Contact</h3>
                        <p class="text-[#6B6B6B] text-sm leading-relaxed">
                            平日 9:00 - 18:00<br>
                            （土日祝日は休業）
                        </p>
                    </div>
                </div>

                <div class="border-t border-[#2a2a2a] pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-[#6B6B6B] text-xs">
                        &copy; 2025 Creative Studio. All rights reserved.
                    </p>
                    <a href="{{ route('projects.index') }}" class="inline-flex items-center text-xs text-[#6B6B6B] hover:text-[#F7F6F4] transition-colors">
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
