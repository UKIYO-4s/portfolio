<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Flick LP Demo - CSS 3D (3-Phase Motion)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --color-bg: #000000;
            --color-bg-secondary: #0a0a0a;
            --color-accent: #00CED1;
            --color-accent-glow: rgba(0, 206, 209, 0.4);
            --color-accent-dim: rgba(0, 206, 209, 0.15);
            --color-text: #ffffff;
            --color-text-muted: rgba(255, 255, 255, 0.7);
            --font-display: 'Playfair Display', serif;
            --font-body: 'Manrope', sans-serif;
        }

        html, body {
            height: 100%;
            overflow: hidden;
            background: var(--color-bg);
            font-family: var(--font-body);
            color: var(--color-text);
        }

        /* PC: iPhone Mock Container */
        .mock-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 50%, #0a0a0a 100%);
            position: relative;
            overflow: hidden;
        }

        /* Background glow effect - large blur */
        .mock-container::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, var(--color-accent-glow) 0%, transparent 60%);
            pointer-events: none;
            animation: pulse 4s ease-in-out infinite;
            filter: blur(40px);
        }

        /* Background particles */
        .bg-particles {
            position: absolute;
            inset: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .bg-particle {
            position: absolute;
            width: 3px;
            height: 3px;
            background: var(--color-accent);
            border-radius: 50%;
            opacity: 0.4;
            animation: floatParticle 8s ease-in-out infinite;
        }

        .bg-particle:nth-child(1) { left: 10%; top: 20%; animation-delay: 0s; }
        .bg-particle:nth-child(2) { left: 20%; top: 60%; animation-delay: 1s; }
        .bg-particle:nth-child(3) { left: 80%; top: 30%; animation-delay: 2s; }
        .bg-particle:nth-child(4) { left: 70%; top: 70%; animation-delay: 3s; }
        .bg-particle:nth-child(5) { left: 40%; top: 80%; animation-delay: 4s; }
        .bg-particle:nth-child(6) { left: 90%; top: 50%; animation-delay: 5s; }

        @keyframes floatParticle {
            0%, 100% { transform: translateY(0) scale(1); opacity: 0.3; }
            50% { transform: translateY(-30px) scale(1.5); opacity: 0.6; }
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.3; transform: translate(-50%, -50%) scale(1); }
            50% { opacity: 0.5; transform: translate(-50%, -50%) scale(1.1); }
        }

        /* iPhone Mock Frame */
        .iphone-mock {
            position: relative;
            width: 375px;
            height: 812px;
            background: #1a1a1a;
            border-radius: 50px;
            padding: 12px;
            box-shadow:
                0 0 0 3px #2a2a2a,
                0 0 0 6px #1a1a1a,
                0 25px 50px rgba(0, 0, 0, 0.5),
                0 0 100px var(--color-accent-glow);
            z-index: 10;
        }

        .iphone-screen {
            width: 100%;
            height: 100%;
            background: var(--color-bg);
            border-radius: 40px;
            overflow: hidden;
            position: relative;
        }

        /* Dynamic Island */
        .dynamic-island {
            position: absolute;
            top: 12px;
            left: 50%;
            transform: translateX(-50%);
            width: 120px;
            height: 35px;
            background: #000;
            border-radius: 20px;
            z-index: 100;
        }

        /* Main Prism Container */
        .prism-viewport {
            width: 100%;
            height: 100%;
            perspective: 1000px;
            perspective-origin: center center;
            display: flex;
            align-items: center;
            justify-content: center;
            touch-action: pan-y;
            cursor: grab;
            position: relative;
            overflow: hidden;
        }

        .prism-viewport:active {
            cursor: grabbing;
        }

        /* Hinge Wrapper - for center shifting during Phase B */
        .hinge-wrapper {
            width: 100%;
            height: 100%;
            position: relative;
            transform-style: preserve-3d;
            /* Smooth transition for hinge movement */
            transition: transform 350ms cubic-bezier(.2,.7,.2,1);
        }

        /* Scene container for hinge rotation */
        .prism-scene {
            width: 100%;
            height: 100%;
            position: relative;
            transform-style: preserve-3d;
            /* Hinge at left edge */
            transform-origin: left center;
        }

        /* Triangle Prism Faces - Left Hinge */
        .prism-face {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 60px 30px;
            overflow: hidden;
            /* Left edge hinge */
            transform-origin: left center;
        }

        /* Hinge glow - left edge */
        .prism-face::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 3px;
            height: 100%;
            background: linear-gradient(
                180deg,
                transparent 0%,
                var(--color-accent) 30%,
                var(--color-accent) 70%,
                transparent 100%
            );
            filter: blur(4px);
            opacity: 0.6;
            z-index: 10;
        }

        /* Right edge highlight - thickness effect */
        .prism-face::after {
            content: '';
            position: absolute;
            right: 0;
            top: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(
                180deg,
                transparent 0%,
                rgba(255, 255, 255, 0.15) 30%,
                rgba(255, 255, 255, 0.15) 70%,
                transparent 100%
            );
            z-index: 10;
        }

        /* Face 1: Design/Vision */
        .face-1 {
            background: linear-gradient(180deg, #000 0%, #0a1520 100%);
        }

        /* Face 2: Modern/Impact */
        .face-2 {
            background: linear-gradient(180deg, #000 0%, #0f0a1a 100%);
        }

        /* Face 3: Digital/Innovation */
        .face-3 {
            background: linear-gradient(180deg, #000 0%, #0a1a15 100%);
        }

        /* Typography */
        .face-title {
            font-family: var(--font-display);
            font-size: 3.5rem;
            font-weight: 600;
            letter-spacing: 0.02em;
            margin-bottom: 0.5rem;
            text-shadow: 0 0 40px var(--color-accent-glow);
        }

        .face-subtitle {
            font-family: var(--font-body);
            font-size: 1rem;
            font-weight: 300;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            color: var(--color-text-muted);
            margin-bottom: 2rem;
        }

        /* Abstract Visual Elements */
        .visual-container {
            position: relative;
            width: 200px;
            height: 200px;
            margin: 2rem 0;
        }

        /* Face 1: Flowing Lines */
        .flowing-lines {
            position: absolute;
            inset: 0;
        }

        .flowing-lines svg {
            width: 100%;
            height: 100%;
        }

        .flow-path {
            fill: none;
            stroke: var(--color-accent);
            stroke-width: 2;
            stroke-linecap: round;
            filter: drop-shadow(0 0 10px var(--color-accent));
            animation: flowDash 3s ease-in-out infinite;
        }

        @keyframes flowDash {
            0% { stroke-dashoffset: 300; opacity: 0.3; }
            50% { stroke-dashoffset: 0; opacity: 1; }
            100% { stroke-dashoffset: -300; opacity: 0.3; }
        }

        /* Face 2: Geometric Pattern */
        .geometric-pattern {
            position: absolute;
            inset: 0;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-template-rows: repeat(3, 1fr);
            gap: 10px;
            padding: 20px;
        }

        .geo-shape {
            background: linear-gradient(135deg, var(--color-accent) 0%, transparent 60%);
            opacity: 0.6;
            animation: geoFloat 2s ease-in-out infinite;
        }

        .geo-shape:nth-child(odd) {
            border-radius: 50%;
        }

        .geo-shape:nth-child(even) {
            border-radius: 4px;
            transform: rotate(45deg) scale(0.8);
        }

        .geo-shape:nth-child(1) { animation-delay: 0s; }
        .geo-shape:nth-child(2) { animation-delay: 0.2s; }
        .geo-shape:nth-child(3) { animation-delay: 0.4s; }
        .geo-shape:nth-child(4) { animation-delay: 0.6s; }
        .geo-shape:nth-child(5) { animation-delay: 0.8s; }
        .geo-shape:nth-child(6) { animation-delay: 1s; }
        .geo-shape:nth-child(7) { animation-delay: 1.2s; }
        .geo-shape:nth-child(8) { animation-delay: 1.4s; }
        .geo-shape:nth-child(9) { animation-delay: 1.6s; }

        @keyframes geoFloat {
            0%, 100% { transform: scale(1); opacity: 0.4; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }

        .geo-shape:nth-child(even) {
            animation-name: geoRotate;
        }

        @keyframes geoRotate {
            0%, 100% { transform: rotate(45deg) scale(0.8); opacity: 0.4; }
            50% { transform: rotate(45deg) scale(0.9); opacity: 0.8; }
        }

        /* Face 3: Particles */
        .particles-container {
            position: absolute;
            inset: 0;
        }

        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: var(--color-accent);
            border-radius: 50%;
            box-shadow: 0 0 10px var(--color-accent), 0 0 20px var(--color-accent-glow);
            animation: particleFloat 3s ease-in-out infinite;
        }

        .particle:nth-child(1) { top: 20%; left: 20%; animation-delay: 0s; }
        .particle:nth-child(2) { top: 30%; left: 70%; animation-delay: 0.3s; }
        .particle:nth-child(3) { top: 50%; left: 40%; animation-delay: 0.6s; }
        .particle:nth-child(4) { top: 70%; left: 60%; animation-delay: 0.9s; }
        .particle:nth-child(5) { top: 80%; left: 30%; animation-delay: 1.2s; }
        .particle:nth-child(6) { top: 40%; left: 80%; animation-delay: 1.5s; }
        .particle:nth-child(7) { top: 60%; left: 20%; animation-delay: 1.8s; }
        .particle:nth-child(8) { top: 25%; left: 50%; animation-delay: 2.1s; }

        @keyframes particleFloat {
            0%, 100% { transform: translateY(0) scale(1); opacity: 0.5; }
            50% { transform: translateY(-20px) scale(1.5); opacity: 1; }
        }

        /* CTA Button - Glass */
        .cta-button {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 1rem 2rem;
            background: rgba(0, 206, 209, 0.1);
            border: 1px solid rgba(0, 206, 209, 0.3);
            border-radius: 50px;
            color: var(--color-text);
            font-family: var(--font-body);
            font-size: 0.9rem;
            font-weight: 500;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            backdrop-filter: blur(10px);
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .cta-button:hover {
            background: rgba(0, 206, 209, 0.2);
            border-color: var(--color-accent);
            box-shadow: 0 0 30px var(--color-accent-glow);
            transform: translateY(-2px);
        }

        .cta-button svg {
            width: 16px;
            height: 16px;
            transition: transform 0.3s ease;
        }

        .cta-button:hover svg {
            transform: translateX(4px);
        }

        /* Navigation Dots */
        .nav-dots {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 12px;
            z-index: 50;
        }

        .nav-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .nav-dot.active {
            background: var(--color-accent);
            box-shadow: 0 0 15px var(--color-accent);
            transform: scale(1.2);
        }

        .nav-dot:hover:not(.active) {
            background: rgba(255, 255, 255, 0.6);
        }

        /* Swipe Hint */
        .swipe-hint {
            position: absolute;
            bottom: 80px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--color-text-muted);
            font-size: 0.75rem;
            letter-spacing: 0.1em;
            opacity: 0.6;
            animation: hintFade 3s ease-in-out infinite;
        }

        .swipe-hint svg {
            width: 20px;
            height: 20px;
            animation: swipeMove 1.5s ease-in-out infinite;
        }

        @keyframes hintFade {
            0%, 100% { opacity: 0.6; }
            50% { opacity: 0.3; }
        }

        @keyframes swipeMove {
            0%, 100% { transform: translateX(-5px); }
            50% { transform: translateX(5px); }
        }

        /* Mobile: Full Screen Mode */
        @media (max-width: 768px) {
            .mock-container {
                display: none;
            }

            .mobile-fullscreen {
                display: block !important;
                position: fixed;
                inset: 0;
                background: var(--color-bg);
            }

            .mobile-fullscreen .prism-viewport {
                height: 100%;
            }

            .mobile-fullscreen .prism-face {
                padding: 80px 24px 100px;
            }

            .mobile-fullscreen .face-title {
                font-size: 2.8rem;
            }

            .mobile-fullscreen .visual-container {
                width: 160px;
                height: 160px;
            }

            .mobile-fullscreen .nav-dots {
                bottom: 30px;
            }

            .mobile-fullscreen .swipe-hint {
                bottom: 60px;
            }
        }

        /* PC default: hide mobile fullscreen */
        .mobile-fullscreen {
            display: none;
        }

        /* Back button */
        .back-button {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 30px;
            color: var(--color-text);
            font-family: var(--font-body);
            font-size: 0.85rem;
            text-decoration: none;
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        .back-button:hover {
            background: rgba(0, 206, 209, 0.2);
            border-color: var(--color-accent);
        }

        .back-button svg {
            width: 16px;
            height: 16px;
        }
    </style>
</head>
<body>
    <!-- Back Button -->
    <a href="{{ url('/price') }}" class="back-button">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M19 12H5M12 19l-7-7 7-7"/>
        </svg>
        Back
    </a>

    <!-- PC: iPhone Mock -->
    <div class="mock-container">
        <!-- Background particles -->
        <div class="bg-particles">
            <div class="bg-particle"></div>
            <div class="bg-particle"></div>
            <div class="bg-particle"></div>
            <div class="bg-particle"></div>
            <div class="bg-particle"></div>
            <div class="bg-particle"></div>
        </div>

        <div class="iphone-mock">
            <div class="iphone-screen">
                <div class="dynamic-island"></div>
                <div class="prism-viewport" id="pcViewport">
                    <div class="hinge-wrapper" id="pcHingeWrapper">
                        <div class="prism-scene" id="pcPrism">
                            <!-- Face 1: Design/Vision -->
                            <div class="prism-face face-1">
                                <span class="face-subtitle">Creative</span>
                                <h2 class="face-title">Design</h2>
                                <div class="visual-container">
                                    <div class="flowing-lines">
                                        <svg viewBox="0 0 200 200">
                                            <path class="flow-path" d="M20,100 Q60,60 100,100 T180,100" stroke-dasharray="300"/>
                                            <path class="flow-path" d="M20,120 Q60,80 100,120 T180,120" stroke-dasharray="300" style="animation-delay: 0.5s"/>
                                            <path class="flow-path" d="M20,140 Q60,100 100,140 T180,140" stroke-dasharray="300" style="animation-delay: 1s"/>
                                        </svg>
                                    </div>
                                </div>
                                <span class="face-subtitle" style="margin-bottom: 1rem;">Vision</span>
                                <a href="#" class="cta-button">
                                    Explore
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M5 12h14M12 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>

                            <!-- Face 2: Modern/Impact -->
                            <div class="prism-face face-2">
                                <span class="face-subtitle">Style</span>
                                <h2 class="face-title">Modern</h2>
                                <div class="visual-container">
                                    <div class="geometric-pattern">
                                        <div class="geo-shape"></div>
                                        <div class="geo-shape"></div>
                                        <div class="geo-shape"></div>
                                        <div class="geo-shape"></div>
                                        <div class="geo-shape"></div>
                                        <div class="geo-shape"></div>
                                        <div class="geo-shape"></div>
                                        <div class="geo-shape"></div>
                                        <div class="geo-shape"></div>
                                    </div>
                                </div>
                                <span class="face-subtitle" style="margin-bottom: 1rem;">Impact</span>
                                <a href="#" class="cta-button">
                                    Discover
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M5 12h14M12 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>

                            <!-- Face 3: Digital/Innovation -->
                            <div class="prism-face face-3">
                                <span class="face-subtitle">Future</span>
                                <h2 class="face-title">Digital</h2>
                                <div class="visual-container">
                                    <div class="particles-container">
                                        <div class="particle"></div>
                                        <div class="particle"></div>
                                        <div class="particle"></div>
                                        <div class="particle"></div>
                                        <div class="particle"></div>
                                        <div class="particle"></div>
                                        <div class="particle"></div>
                                        <div class="particle"></div>
                                    </div>
                                </div>
                                <span class="face-subtitle" style="margin-bottom: 1rem;">Innovation</span>
                                <a href="#" class="cta-button">
                                    Learn More
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M5 12h14M12 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Dots -->
                    <div class="nav-dots" id="pcDots">
                        <div class="nav-dot active" data-face="0"></div>
                        <div class="nav-dot" data-face="1"></div>
                        <div class="nav-dot" data-face="2"></div>
                    </div>

                    <!-- Swipe Hint -->
                    <div class="swipe-hint">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                        Swipe to explore
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile: Full Screen -->
    <div class="mobile-fullscreen">
        <!-- Background particles -->
        <div class="bg-particles">
            <div class="bg-particle"></div>
            <div class="bg-particle"></div>
            <div class="bg-particle"></div>
            <div class="bg-particle"></div>
            <div class="bg-particle"></div>
            <div class="bg-particle"></div>
        </div>

        <div class="prism-viewport" id="mobileViewport">
            <div class="hinge-wrapper" id="mobileHingeWrapper">
                <div class="prism-scene" id="mobilePrism">
                    <!-- Face 1: Design/Vision -->
                    <div class="prism-face face-1">
                        <span class="face-subtitle">Creative</span>
                        <h2 class="face-title">Design</h2>
                        <div class="visual-container">
                            <div class="flowing-lines">
                                <svg viewBox="0 0 200 200">
                                    <path class="flow-path" d="M20,100 Q60,60 100,100 T180,100" stroke-dasharray="300"/>
                                    <path class="flow-path" d="M20,120 Q60,80 100,120 T180,120" stroke-dasharray="300" style="animation-delay: 0.5s"/>
                                    <path class="flow-path" d="M20,140 Q60,100 100,140 T180,140" stroke-dasharray="300" style="animation-delay: 1s"/>
                                </svg>
                            </div>
                        </div>
                        <span class="face-subtitle" style="margin-bottom: 1rem;">Vision</span>
                        <a href="#" class="cta-button">
                            Explore
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>

                    <!-- Face 2: Modern/Impact -->
                    <div class="prism-face face-2">
                        <span class="face-subtitle">Style</span>
                        <h2 class="face-title">Modern</h2>
                        <div class="visual-container">
                            <div class="geometric-pattern">
                                <div class="geo-shape"></div>
                                <div class="geo-shape"></div>
                                <div class="geo-shape"></div>
                                <div class="geo-shape"></div>
                                <div class="geo-shape"></div>
                                <div class="geo-shape"></div>
                                <div class="geo-shape"></div>
                                <div class="geo-shape"></div>
                                <div class="geo-shape"></div>
                            </div>
                        </div>
                        <span class="face-subtitle" style="margin-bottom: 1rem;">Impact</span>
                        <a href="#" class="cta-button">
                            Discover
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>

                    <!-- Face 3: Digital/Innovation -->
                    <div class="prism-face face-3">
                        <span class="face-subtitle">Future</span>
                        <h2 class="face-title">Digital</h2>
                        <div class="visual-container">
                            <div class="particles-container">
                                <div class="particle"></div>
                                <div class="particle"></div>
                                <div class="particle"></div>
                                <div class="particle"></div>
                                <div class="particle"></div>
                                <div class="particle"></div>
                                <div class="particle"></div>
                                <div class="particle"></div>
                            </div>
                        </div>
                        <span class="face-subtitle" style="margin-bottom: 1rem;">Innovation</span>
                        <a href="#" class="cta-button">
                            Learn More
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Navigation Dots -->
            <div class="nav-dots" id="mobileDots">
                <div class="nav-dot active" data-face="0"></div>
                <div class="nav-dot" data-face="1"></div>
                <div class="nav-dot" data-face="2"></div>
            </div>

            <!-- Swipe Hint -->
            <div class="swipe-hint">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
                Swipe to explore
            </div>
        </div>
    </div>

    <script>
        /**
         * ThreePhaseHingePrismController
         * 3-Phase Motion: Lift → Float → Land/Settle
         * Infinite loop support with left-hinge rotation
         */
        class ThreePhaseHingePrismController {
            constructor(viewportId, hingeWrapperId, prismId, dotsId) {
                this.viewport = document.getElementById(viewportId);
                this.hingeWrapper = document.getElementById(hingeWrapperId);
                this.prism = document.getElementById(prismId);
                this.dots = document.getElementById(dotsId);
                this.faces = this.prism ? this.prism.querySelectorAll('.prism-face') : [];

                if (!this.viewport || !this.prism) return;

                // State
                this.currentFace = 0;
                this.totalFaces = 3;
                this.faceAngle = 120;

                // Rotation state (supports infinite loop - no clamping)
                this.targetRotation = 0;
                this.currentRotation = 0;

                // 3-Phase motion state
                this.targetY = 0;
                this.currentY = 0;
                this.targetZ = 0;
                this.currentZ = 0;

                // Animation phase: 'idle', 'lift', 'float', 'land', 'settle'
                this.animationPhase = 'idle';

                // Lerp factors
                this.rotLerpFactor = 0.045;      // Slow rotation lerp
                this.yLerpFactor = 0.12;          // Y movement lerp
                this.zLerpFactor = 0.10;          // Z movement lerp

                // Phase values
                this.liftY = -14;                 // Phase A: lift up
                this.liftZ = 50;                  // Phase A: forward
                this.floatY = -18;                // Phase B: float higher
                this.floatZ = 28;                 // Phase B: mid-forward
                this.landZ = -6;                  // Phase C: sink back
                this.settleY = 0;                 // Phase C2: settle
                this.settleZ = 0;                 // Phase C2: settle

                // Touch/drag state
                this.isDragging = false;
                this.startX = 0;
                this.lastX = 0;
                this.lastTime = 0;
                this.velocity = 0;

                this.init();
            }

            init() {
                this.updateFaceTransforms();
                this.bindEvents();
                this.animate();

                // Initial demo after 1.5s
                setTimeout(() => {
                    this.goToFace(1);
                    setTimeout(() => {
                        this.goToFace(0);
                    }, 2500);
                }, 1500);
            }

            updateFaceTransforms() {
                this.faces.forEach((face, index) => {
                    const angle = index * this.faceAngle;
                    face.style.transform = `rotateY(${angle}deg)`;
                });
            }

            bindEvents() {
                // Touch events
                this.viewport.addEventListener('touchstart', (e) => this.onTouchStart(e), { passive: true });
                this.viewport.addEventListener('touchmove', (e) => this.onTouchMove(e), { passive: true });
                this.viewport.addEventListener('touchend', (e) => this.onTouchEnd(e));

                // Mouse events
                this.viewport.addEventListener('mousedown', (e) => this.onMouseDown(e));
                document.addEventListener('mousemove', (e) => this.onMouseMove(e));
                document.addEventListener('mouseup', (e) => this.onMouseUp(e));

                // Wheel event
                this.viewport.addEventListener('wheel', (e) => this.onWheel(e), { passive: false });

                // Keyboard events
                document.addEventListener('keydown', (e) => this.onKeyDown(e));

                // Dot navigation
                if (this.dots) {
                    this.dots.querySelectorAll('.nav-dot').forEach((dot, index) => {
                        dot.addEventListener('click', () => this.goToFace(index));
                    });
                }
            }

            onTouchStart(e) {
                if (e.touches.length !== 1) return;
                this.startDrag(e.touches[0].clientX);
            }

            onTouchMove(e) {
                if (!this.isDragging || e.touches.length !== 1) return;
                this.updateDrag(e.touches[0].clientX);
            }

            onTouchEnd() {
                this.endDrag();
            }

            onMouseDown(e) {
                this.startDrag(e.clientX);
                this.viewport.style.cursor = 'grabbing';
            }

            onMouseMove(e) {
                if (!this.isDragging) return;
                this.updateDrag(e.clientX);
            }

            onMouseUp() {
                this.endDrag();
                this.viewport.style.cursor = 'grab';
            }

            startDrag(x) {
                this.isDragging = true;
                this.startX = x;
                this.lastX = x;
                this.lastTime = Date.now();
                this.velocity = 0;

                // Phase A: Start lift
                this.animationPhase = 'lift';
                this.targetY = this.liftY;
                this.targetZ = this.liftZ;
            }

            updateDrag(x) {
                const currentTime = Date.now();
                const deltaTime = currentTime - this.lastTime;
                const deltaX = x - this.lastX;

                if (deltaTime > 0) {
                    this.velocity = deltaX / deltaTime * 10;
                }

                // Right-to-left swipe = positive rotation
                this.targetRotation -= deltaX * 0.4;

                this.lastX = x;
                this.lastTime = currentTime;
            }

            endDrag() {
                if (!this.isDragging) return;
                this.isDragging = false;
                this.applyMomentumAndSnap();
            }

            onWheel(e) {
                e.preventDefault();
                const delta = e.deltaY > 0 ? 1 : -1;
                this.next(delta);
            }

            onKeyDown(e) {
                if (e.key === 'ArrowLeft') {
                    this.next(-1);
                } else if (e.key === 'ArrowRight') {
                    this.next(1);
                }
            }

            next(direction) {
                // Infinite loop: no modulo on currentFace, just track for dots
                const newFace = (this.currentFace + direction + this.totalFaces) % this.totalFaces;
                this.goToFace(newFace, direction);
            }

            applyMomentumAndSnap() {
                // Apply momentum
                this.targetRotation += this.velocity * 3;

                // Snap to nearest face
                const nearestFace = Math.round(this.targetRotation / this.faceAngle);
                this.targetRotation = nearestFace * this.faceAngle;

                // Calculate current face for dots (0, 1, or 2)
                this.currentFace = (((-nearestFace % this.totalFaces) + this.totalFaces) % this.totalFaces);

                // Start Phase B: Float
                this.startFloatPhase();
            }

            goToFace(faceIndex, direction = null) {
                const currentFaceFromRotation = Math.round(this.targetRotation / this.faceAngle);
                const targetFaceRotation = -faceIndex;

                // Calculate shortest path if no direction specified
                let diff = targetFaceRotation - currentFaceFromRotation;
                if (direction === null) {
                    if (diff > 1) diff -= this.totalFaces;
                    if (diff < -1) diff += this.totalFaces;
                } else {
                    diff = direction;
                }

                // Phase A: Lift
                this.animationPhase = 'lift';
                this.targetY = this.liftY;
                this.targetZ = this.liftZ;

                this.targetRotation = (currentFaceFromRotation + diff) * this.faceAngle;
                this.currentFace = faceIndex;

                // After lift duration, start float
                setTimeout(() => {
                    this.startFloatPhase();
                }, 180);
            }

            startFloatPhase() {
                // Phase B: Float (0.2s hover)
                this.animationPhase = 'float';
                this.targetY = this.floatY;
                this.targetZ = this.floatZ;

                // After float duration, start land
                setTimeout(() => {
                    this.startLandPhase();
                }, 200);
            }

            startLandPhase() {
                // Phase C: Land
                this.animationPhase = 'land';
                this.targetY = this.settleY;
                this.targetZ = this.landZ;

                // After land duration, settle
                setTimeout(() => {
                    this.startSettlePhase();
                }, 350);
            }

            startSettlePhase() {
                // Phase C2: Settle
                this.animationPhase = 'settle';
                this.targetY = this.settleY;
                this.targetZ = this.settleZ;

                // Update dots
                this.updateDots();

                // After settle, back to idle
                setTimeout(() => {
                    this.animationPhase = 'idle';
                }, 150);
            }

            updateDots() {
                if (!this.dots) return;
                this.dots.querySelectorAll('.nav-dot').forEach((dot, index) => {
                    dot.classList.toggle('active', index === this.currentFace);
                });
            }

            animate() {
                // Smooth lerp for rotation
                const rotDiff = this.targetRotation - this.currentRotation;
                if (Math.abs(rotDiff) > 0.1) {
                    this.currentRotation += rotDiff * this.rotLerpFactor;
                } else {
                    this.currentRotation = this.targetRotation;
                }

                // Smooth lerp for Y (lift/float/land)
                const yDiff = this.targetY - this.currentY;
                if (Math.abs(yDiff) > 0.1) {
                    this.currentY += yDiff * this.yLerpFactor;
                } else {
                    this.currentY = this.targetY;
                }

                // Smooth lerp for Z (depth)
                const zDiff = this.targetZ - this.currentZ;
                if (Math.abs(zDiff) > 0.1) {
                    this.currentZ += zDiff * this.zLerpFactor;
                } else {
                    this.currentZ = this.targetZ;
                }

                // Apply transform to prism scene
                this.prism.style.transform = `translateY(${this.currentY}px) translateZ(${this.currentZ}px) rotateY(${-this.currentRotation}deg)`;

                // Update face z-index based on visibility
                this.faces.forEach((face, index) => {
                    const angle = (index * this.faceAngle - this.currentRotation) % 360;
                    const normalizedAngle = ((angle % 360) + 360) % 360;
                    const isFront = normalizedAngle < 60 || normalizedAngle > 300;
                    face.style.zIndex = isFront ? 10 : 1;
                });

                requestAnimationFrame(() => this.animate());
            }
        }

        // Initialize controllers
        document.addEventListener('DOMContentLoaded', () => {
            new ThreePhaseHingePrismController('pcViewport', 'pcHingeWrapper', 'pcPrism', 'pcDots');
            new ThreePhaseHingePrismController('mobileViewport', 'mobileHingeWrapper', 'mobilePrism', 'mobileDots');
        });
    </script>
</body>
</html>
