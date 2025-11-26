<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TERMINAL_') - Demo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=VT323&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #0B1E16;
            --mint: #58E69C;
            --mint-dim: #3BA872;
            --shadow: rgba(0, 0, 0, 0.2);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-dark);
            color: var(--mint);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        .font-8bit {
            font-family: 'Press Start 2P', cursive;
        }

        .font-vt323 {
            font-family: 'VT323', monospace;
        }

        /* Subtle grid background */
        .bg-grid {
            background-image:
                linear-gradient(rgba(88, 230, 156, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(88, 230, 156, 0.03) 1px, transparent 1px);
            background-size: 40px 40px;
        }

        /* Subtle scanline effect */
        .scanlines::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: repeating-linear-gradient(
                0deg,
                transparent,
                transparent 2px,
                rgba(0, 0, 0, 0.03) 2px,
                rgba(0, 0, 0, 0.03) 4px
            );
            pointer-events: none;
            z-index: 1;
        }

        /* Glow effect for text */
        .text-glow {
            text-shadow: 0 0 10px rgba(88, 230, 156, 0.5);
        }

        /* Nav pill style */
        .nav-pill {
            border: 1px solid var(--mint);
            border-radius: 4px;
            padding: 0.5rem 1rem;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
            transition: all 0.2s ease;
        }

        .nav-pill:hover,
        .nav-pill.active {
            background-color: var(--mint);
            color: var(--bg-dark);
        }

        /* Button style */
        .btn-retro {
            border: 1.5px solid var(--mint);
            border-radius: 4px;
            padding: 0.75rem 1.5rem;
            font-size: 0.875rem;
            letter-spacing: 0.05em;
            transition: all 0.2s ease;
            box-shadow: 0 2px 4px var(--shadow);
        }

        .btn-retro:hover {
            background-color: var(--mint);
            color: var(--bg-dark);
            box-shadow: 0 0 15px rgba(88, 230, 156, 0.3);
        }

        /* Card style */
        .card-retro {
            border: 1px solid rgba(88, 230, 156, 0.3);
            border-radius: 8px;
            background: rgba(88, 230, 156, 0.03);
            transition: all 0.3s ease;
        }

        .card-retro:hover {
            border-color: var(--mint);
            box-shadow: 0 0 20px rgba(88, 230, 156, 0.1);
        }

        /* Input style */
        .input-retro {
            background: rgba(88, 230, 156, 0.05);
            border: 1px solid rgba(88, 230, 156, 0.3);
            border-radius: 4px;
            padding: 0.75rem 1rem;
            color: var(--mint);
            transition: all 0.2s ease;
        }

        .input-retro:focus {
            outline: none;
            border-color: var(--mint);
            box-shadow: 0 0 10px rgba(88, 230, 156, 0.2);
        }

        .input-retro::placeholder {
            color: rgba(88, 230, 156, 0.4);
        }

        /* Cursor blink */
        @keyframes blink {
            0%, 50% { opacity: 1; }
            51%, 100% { opacity: 0; }
        }

        .cursor-blink {
            animation: blink 1s infinite;
        }
    </style>
</head>
<body class="antialiased bg-grid scanlines">
    <div class="relative z-10 min-h-screen flex flex-col">
        <!-- Header / Nav -->
        <header class="px-6 py-6 md:px-12">
            <div class="max-w-6xl mx-auto flex items-center justify-between">
                <!-- Back to Projects -->
                <a href="{{ route('projects.index') }}" class="flex items-center text-sm opacity-60 hover:opacity-100 transition">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back
                </a>

                <!-- Logo -->
                <a href="{{ route('demo.retro-terminal.index') }}" class="font-8bit text-sm md:text-base text-glow">
                    TERMINAL_
                </a>

                <!-- Navigation -->
                <nav class="hidden md:flex items-center gap-3">
                    <a href="{{ route('demo.retro-terminal.index') }}" class="nav-pill font-vt323 text-base @if(request()->routeIs('demo.retro-terminal.index')) active @endif">HOME</a>
                    <a href="{{ route('demo.retro-terminal.about') }}" class="nav-pill font-vt323 text-base @if(request()->routeIs('demo.retro-terminal.about')) active @endif">ABOUT</a>
                    <a href="{{ route('demo.retro-terminal.service') }}" class="nav-pill font-vt323 text-base @if(request()->routeIs('demo.retro-terminal.service')) active @endif">SERVICES</a>
                    <a href="{{ route('demo.retro-terminal.contact') }}" class="nav-pill font-vt323 text-base @if(request()->routeIs('demo.retro-terminal.contact')) active @endif">CONTACT</a>
                </nav>

                <!-- Mobile menu button -->
                <button onclick="toggleMobileMenu()" class="md:hidden nav-pill font-vt323 text-base">MENU</button>
            </div>
        </header>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="hidden md:hidden px-6 pb-6">
            <nav class="flex flex-col gap-2">
                <a href="{{ route('demo.retro-terminal.index') }}" class="nav-pill font-vt323 text-base text-center @if(request()->routeIs('demo.retro-terminal.index')) active @endif">HOME</a>
                <a href="{{ route('demo.retro-terminal.about') }}" class="nav-pill font-vt323 text-base text-center @if(request()->routeIs('demo.retro-terminal.about')) active @endif">ABOUT</a>
                <a href="{{ route('demo.retro-terminal.service') }}" class="nav-pill font-vt323 text-base text-center @if(request()->routeIs('demo.retro-terminal.service')) active @endif">SERVICES</a>
                <a href="{{ route('demo.retro-terminal.contact') }}" class="nav-pill font-vt323 text-base text-center @if(request()->routeIs('demo.retro-terminal.contact')) active @endif">CONTACT</a>
            </nav>
        </div>

        <!-- Main Content -->
        <main class="flex-1">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="px-6 py-8 text-center">
            <div class="flex items-center justify-center gap-6 mb-4">
                <!-- Simple terminal icon -->
                <svg class="w-6 h-6 opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <p class="text-xs opacity-40 font-8bit tracking-wider">
                DEMO MODE // ALL RIGHTS RESERVED
            </p>
        </footer>
    </div>

    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }
    </script>
</body>
</html>
