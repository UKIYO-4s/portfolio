<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retro Terminal - Demo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
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

        .font-mono-retro {
            font-family: 'Share Tech Mono', monospace;
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

        .nav-pill:hover {
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

                <!-- Navigation -->
                <nav class="hidden md:flex items-center gap-3">
                    <a href="#" class="nav-pill font-mono-retro">HOME</a>
                    <a href="#" class="nav-pill font-mono-retro">ABOUT</a>
                    <a href="#" class="nav-pill font-mono-retro">SERVICES</a>
                    <a href="#" class="nav-pill font-mono-retro">CONTACT</a>
                </nav>

                <!-- Mobile menu button -->
                <button class="md:hidden nav-pill font-mono-retro">MENU</button>
            </div>
        </header>

        <!-- Hero Section -->
        <main class="flex-1 flex items-center justify-center px-6 py-16 md:py-24">
            <div class="max-w-3xl mx-auto text-center">
                <!-- Terminal Icon -->
                <div class="mb-8 flex justify-center">
                    <svg class="w-16 h-16 md:w-20 md:h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <rect x="2" y="3" width="20" height="14" rx="2" stroke-width="1.5"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 19h12"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 22h6"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 8l3 2-3 2"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 12h4"/>
                    </svg>
                </div>

                <!-- Logo / Heading -->
                <h1 class="font-mono-retro text-4xl md:text-6xl lg:text-7xl tracking-wider text-glow mb-6">
                    TERMINAL_
                    <span class="cursor-blink">|</span>
                </h1>

                <!-- Subheading -->
                <p class="text-lg md:text-xl opacity-80 mb-4 max-w-xl mx-auto">
                    Digital solutions for the modern era.
                </p>
                <p class="text-sm md:text-base opacity-60 mb-12 max-w-md mx-auto">
                    Building interfaces that bridge the past and future.
                </p>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="#" class="btn-retro font-mono-retro w-full sm:w-auto">
                        GET STARTED
                    </a>
                    <a href="#" class="btn-retro font-mono-retro w-full sm:w-auto opacity-70 hover:opacity-100">
                        LEARN MORE
                    </a>
                </div>

                <!-- Status line -->
                <div class="mt-16 flex items-center justify-center gap-2 text-xs opacity-50 font-mono-retro">
                    <span class="w-2 h-2 bg-current rounded-full"></span>
                    <span>SYSTEM ONLINE</span>
                    <span class="mx-2">|</span>
                    <span>v1.0.0</span>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="px-6 py-8 text-center">
            <div class="flex items-center justify-center gap-6 mb-4">
                <!-- Simple terminal icon -->
                <svg class="w-6 h-6 opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <p class="text-xs opacity-40 font-mono-retro tracking-wider">
                DEMO MODE // ALL RIGHTS RESERVED
            </p>
        </footer>
    </div>
</body>
</html>
