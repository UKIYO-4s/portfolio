<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'InstaLP') - Instagram風LP Demo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            background: #FAFAFA;
            color: #262626;
            overflow-x: hidden;
        }

        /* Instagram gradient */
        .insta-gradient {
            background: linear-gradient(45deg, #F58529, #DD2A7B, #8134AF);
        }

        .insta-gradient-text {
            background: linear-gradient(45deg, #F58529, #DD2A7B, #8134AF);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Phone mockup */
        .phone-mockup {
            background: #000;
            border-radius: 40px;
            padding: 12px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .phone-screen {
            background: #fff;
            border-radius: 32px;
            overflow: hidden;
        }

        .phone-notch {
            width: 120px;
            height: 28px;
            background: #000;
            border-radius: 0 0 16px 16px;
            margin: 0 auto;
            position: relative;
            z-index: 10;
        }

        /* Scroll snap container */
        .snap-container {
            scroll-snap-type: y mandatory;
            overflow-y: auto;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .snap-container::-webkit-scrollbar {
            display: none;
        }

        .snap-section {
            scroll-snap-align: start;
            scroll-snap-stop: always;
        }

        /* Reveal animation */
        .reveal {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* View toggle */
        .view-toggle button {
            transition: all 0.2s ease;
        }

        .view-toggle button.active {
            background: linear-gradient(45deg, #F58529, #DD2A7B, #8134AF);
            color: white;
        }

        /* PC view layout */
        body.pc-view .mobile-only {
            display: none;
        }

        body.mobile-view .pc-only {
            display: none;
        }

        body.mobile-view .phone-wrapper {
            max-width: 100%;
            padding: 0;
        }

        body.mobile-view .phone-mockup {
            border-radius: 0;
            padding: 0;
            box-shadow: none;
        }

        body.mobile-view .phone-screen {
            border-radius: 0;
        }

        body.mobile-view .phone-notch {
            display: none;
        }
    </style>
</head>
<body class="min-h-screen pc-view">
    <!-- Header -->
    <header class="fixed top-0 w-full z-50 bg-white/90 backdrop-blur-md border-b border-gray-200">
        <div class="max-w-6xl mx-auto px-4 md:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="{{ route('demo.insta-lp.index') }}" class="text-xl font-bold">
                    <span class="insta-gradient-text">InstaLP</span>
                </a>

                <!-- View Toggle -->
                <div class="view-toggle flex gap-2">
                    <button onclick="setView('pc')" id="btn-pc" class="px-4 py-2 text-xs font-medium rounded-full border border-gray-300 active">
                        pc view
                    </button>
                    <button onclick="setView('mobile')" id="btn-mobile" class="px-4 py-2 text-xs font-medium rounded-full border border-gray-300">
                        mobile view
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Spacer -->
    <div class="h-16"></div>

    <!-- Demo Notice -->
    <div class="insta-gradient">
        <div class="max-w-6xl mx-auto px-4 md:px-8 py-2">
            <p class="text-xs text-center text-white font-medium">
                demo mode - instagram風フリックlp
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 py-8">
        <div class="max-w-6xl mx-auto px-4 md:px-8">
            <div class="flex flex-col items-center gap-4">
                <a href="{{ route('projects.index') }}" class="inline-flex items-center text-xs text-gray-500 hover:text-gray-800 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    back to projects
                </a>
                <p class="text-xs text-gray-400">
                    &copy; 2025 InstaLP. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <!-- View Toggle Script -->
    <script>
        function setView(view) {
            document.body.classList.remove('pc-view', 'mobile-view');
            document.body.classList.add(view + '-view');

            document.getElementById('btn-pc').classList.remove('active');
            document.getElementById('btn-mobile').classList.remove('active');
            document.getElementById('btn-' + view).classList.add('active');
        }
    </script>

    @stack('scripts')
</body>
</html>
