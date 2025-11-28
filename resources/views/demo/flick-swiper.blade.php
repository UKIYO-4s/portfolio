<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Flick LP Demo - Swiper Cube (3-Phase Motion)</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Manrope:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
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

        /* Background glow effect - Central */
        .mock-container::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, var(--color-accent-glow) 0%, transparent 70%);
            pointer-events: none;
            animation: pulse 4s ease-in-out infinite;
        }

        /* Left light beam */
        .light-beam-left {
            position: absolute;
            left: 10%;
            top: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(
                180deg,
                transparent 0%,
                var(--color-accent-dim) 20%,
                var(--color-accent) 50%,
                var(--color-accent-dim) 80%,
                transparent 100%
            );
            filter: blur(8px);
            opacity: 0.6;
            animation: beamPulse 3s ease-in-out infinite;
        }

        /* Right light beam */
        .light-beam-right {
            position: absolute;
            right: 10%;
            top: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(
                180deg,
                transparent 0%,
                var(--color-accent-dim) 30%,
                var(--color-accent) 50%,
                var(--color-accent-dim) 70%,
                transparent 100%
            );
            filter: blur(8px);
            opacity: 0.6;
            animation: beamPulse 3s ease-in-out infinite 1.5s;
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.3; transform: translate(-50%, -50%) scale(1); }
            50% { opacity: 0.5; transform: translate(-50%, -50%) scale(1.1); }
        }

        @keyframes beamPulse {
            0%, 100% { opacity: 0.4; }
            50% { opacity: 0.8; }
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

        /* Swiper Container */
        .swiper-wrapper-container {
            width: 100%;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        /* Left Hinge Adjustment */
        .swiper {
            width: 100%;
            height: 100%;
            transform-origin: left center;
            /* Left shift for visual hinge */
            transform: translateX(-10%);
        }

        /* Override cube wrapper for left hinge effect */
        .swiper-cube .swiper-wrapper {
            transform-origin: left center !important;
            /* 3-phase motion easing */
            transition: transform 420ms cubic-bezier(.2,.7,.2,1) !important;
        }

        .swiper-slide {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 60px 30px;
            background: linear-gradient(180deg, #000 0%, #0a1520 100%);
            position: relative;
            overflow: hidden;
        }

        /* Left edge hinge glow line */
        .swiper-slide::before {
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
            filter: blur(2px);
            opacity: 0.6;
            z-index: 10;
        }

        .swiper-slide::after {
            content: '';
            position: absolute;
            inset: 0;
            border: 1px solid rgba(0, 206, 209, 0.1);
            pointer-events: none;
        }

        /* Cube edge highlight - Enhanced for left hinge */
        .swiper-cube .swiper-slide {
            box-shadow: inset 0 0 30px rgba(0, 206, 209, 0.05);
        }

        .swiper-cube .swiper-slide-active {
            box-shadow:
                inset 0 0 30px rgba(0, 206, 209, 0.1),
                inset 3px 0 0 rgba(0, 206, 209, 0.4),
                inset -2px 0 0 rgba(0, 206, 209, 0.2);
        }

        /* Face backgrounds */
        .slide-1 {
            background: linear-gradient(180deg, #000 0%, #0a1520 100%);
        }

        .slide-2 {
            background: linear-gradient(180deg, #000 0%, #0f0a1a 100%);
        }

        .slide-3 {
            background: linear-gradient(180deg, #000 0%, #0a1a15 100%);
        }

        /* Typography */
        .face-subtitle {
            font-family: var(--font-body);
            font-size: 14px;
            font-weight: 300;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            color: var(--color-text-muted);
            margin-bottom: 0.5rem;
        }

        .face-title {
            font-family: var(--font-display);
            font-size: 36px;
            font-weight: 600;
            letter-spacing: 0.02em;
            margin-bottom: 0.5rem;
            text-shadow: 0 0 40px var(--color-accent-glow);
        }

        .face-description {
            font-family: var(--font-body);
            font-size: 14px;
            font-weight: 300;
            color: var(--color-text-muted);
            text-align: center;
            max-width: 280px;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        /* Visual Elements Container */
        .visual-container {
            position: relative;
            width: 180px;
            height: 180px;
            margin: 1.5rem 0;
        }

        /* Face 1: Creative - Spiral Lines */
        .spiral-visual {
            position: absolute;
            inset: 0;
        }

        .spiral-visual svg {
            width: 100%;
            height: 100%;
        }

        .spiral-path {
            fill: none;
            stroke: var(--color-accent);
            stroke-width: 1.5;
            stroke-linecap: round;
            filter: drop-shadow(0 0 8px var(--color-accent));
            animation: spiralDraw 4s ease-in-out infinite;
        }

        @keyframes spiralDraw {
            0% { stroke-dashoffset: 500; opacity: 0.3; }
            50% { stroke-dashoffset: 0; opacity: 1; }
            100% { stroke-dashoffset: -500; opacity: 0.3; }
        }

        /* Face 2: Elegant - Diamond Pattern */
        .diamond-visual {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .diamond {
            width: 80px;
            height: 80px;
            border: 2px solid var(--color-accent);
            transform: rotate(45deg);
            position: absolute;
            animation: diamondPulse 2s ease-in-out infinite;
            filter: drop-shadow(0 0 10px var(--color-accent-glow));
        }

        .diamond:nth-child(1) {
            width: 60px;
            height: 60px;
            animation-delay: 0s;
        }

        .diamond:nth-child(2) {
            width: 100px;
            height: 100px;
            animation-delay: 0.3s;
            opacity: 0.7;
        }

        .diamond:nth-child(3) {
            width: 140px;
            height: 140px;
            animation-delay: 0.6s;
            opacity: 0.4;
        }

        @keyframes diamondPulse {
            0%, 100% { transform: rotate(45deg) scale(1); opacity: 0.4; }
            50% { transform: rotate(45deg) scale(1.05); opacity: 0.8; }
        }

        /* Face 3: Experience - Orbiting Dots */
        .orbit-visual {
            position: absolute;
            inset: 0;
        }

        .orbit-ring {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 1px solid rgba(0, 206, 209, 0.3);
            border-radius: 50%;
        }

        .orbit-ring:nth-child(1) { width: 60px; height: 60px; }
        .orbit-ring:nth-child(2) { width: 100px; height: 100px; }
        .orbit-ring:nth-child(3) { width: 140px; height: 140px; }

        .orbit-dot {
            position: absolute;
            width: 8px;
            height: 8px;
            background: var(--color-accent);
            border-radius: 50%;
            top: 50%;
            left: 50%;
            box-shadow: 0 0 15px var(--color-accent);
        }

        .orbit-dot:nth-child(4) { animation: orbit1 3s linear infinite; }
        .orbit-dot:nth-child(5) { animation: orbit2 5s linear infinite 1s; }
        .orbit-dot:nth-child(6) { animation: orbit3 7s linear infinite 2s; }

        @keyframes orbit1 {
            from { transform: rotate(0deg) translateX(30px); }
            to { transform: rotate(360deg) translateX(30px); }
        }
        @keyframes orbit2 {
            from { transform: rotate(0deg) translateX(50px); }
            to { transform: rotate(360deg) translateX(50px); }
        }
        @keyframes orbit3 {
            from { transform: rotate(0deg) translateX(70px); }
            to { transform: rotate(360deg) translateX(70px); }
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

        /* Custom Pagination */
        .swiper-pagination {
            position: absolute;
            bottom: 40px !important;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 12px;
            z-index: 50;
        }

        .swiper-pagination-bullet {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            opacity: 1;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .swiper-pagination-bullet-active {
            background: var(--color-accent);
            border-color: var(--color-accent);
            box-shadow: 0 0 15px var(--color-accent), 0 0 30px var(--color-accent-glow);
            transform: scale(1.2);
        }

        /* Hint Label - Top Right */
        .swipe-hint {
            position: absolute;
            top: 60px;
            right: 20px;
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 8px 14px;
            background: rgba(0, 0, 0, 0.5);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            color: var(--color-text-muted);
            font-size: 11px;
            letter-spacing: 0.05em;
            backdrop-filter: blur(10px);
            z-index: 100;
            animation: hintFade 3s ease-in-out infinite;
        }

        .swipe-hint svg {
            width: 14px;
            height: 14px;
            animation: swipeMove 1.5s ease-in-out infinite;
        }

        @keyframes hintFade {
            0%, 100% { opacity: 0.8; }
            50% { opacity: 0.4; }
        }

        @keyframes swipeMove {
            0%, 100% { transform: translateX(-3px); }
            50% { transform: translateX(3px); }
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

            .mobile-fullscreen .swiper {
                height: 100vh;
            }

            .mobile-fullscreen .swiper-slide {
                padding: 80px 24px 100px;
            }

            .mobile-fullscreen .face-title {
                font-size: 32px;
            }

            .mobile-fullscreen .visual-container {
                width: 150px;
                height: 150px;
            }

            .mobile-fullscreen .swiper-pagination {
                bottom: 30px !important;
            }

            .mobile-fullscreen .swipe-hint {
                top: 50px;
                right: 16px;
            }

            .light-beam-left,
            .light-beam-right {
                display: none;
            }

            .mobile-fullscreen .light-beam-left,
            .mobile-fullscreen .light-beam-right {
                display: block;
                position: fixed;
            }

            .mobile-fullscreen .light-beam-left { left: 5%; }
            .mobile-fullscreen .light-beam-right { right: 5%; }
        }

        /* PC default: hide mobile fullscreen */
        .mobile-fullscreen {
            display: none;
        }

        /* Swiper cube shadow customization - Heavier shadow for depth */
        .swiper-cube-shadow {
            background: var(--color-accent-glow) !important;
            filter: blur(40px);
            opacity: 0.6;
        }

        /* 3-Phase Motion Animation Classes */

        /* Phase A: Lift (持ち上げ) */
        .swiper.phase-lift .swiper-wrapper {
            transform: translateZ(50px) translateY(-14px) !important;
            transition: transform 180ms cubic-bezier(.2,.7,.2,1) !important;
        }

        /* Phase B: Center Float (浮遊) */
        .swiper.phase-float .swiper-wrapper {
            transform: translateZ(28px) translateY(-18px) !important;
            transition: transform 200ms cubic-bezier(.2,.7,.2,1) !important;
        }

        /* Phase C: Land (着地) */
        .swiper.phase-land .swiper-wrapper {
            transform: translateZ(-6px) translateY(0px) !important;
            transition: transform 350ms cubic-bezier(.2,.7,.2,1) !important;
        }

        /* Phase C2: Settle (収束) */
        .swiper.phase-settle .swiper-wrapper {
            transform: translateZ(0px) translateY(0px) !important;
            transition: transform 150ms ease-out !important;
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
        <!-- Light beams -->
        <div class="light-beam-left"></div>
        <div class="light-beam-right"></div>

        <div class="iphone-mock">
            <div class="iphone-screen">
                <div class="dynamic-island"></div>
                <div class="swiper-wrapper-container">
                    <!-- Swiper -->
                    <div class="swiper pc-swiper">
                        <div class="swiper-wrapper">
                            <!-- Slide 1: Creative -->
                            <div class="swiper-slide slide-1">
                                <span class="face-subtitle">Imagination</span>
                                <h2 class="face-title">Creative</h2>
                                <div class="visual-container">
                                    <div class="spiral-visual">
                                        <svg viewBox="0 0 200 200">
                                            <path class="spiral-path" d="M100,100 m0,-80 a80,80 0 1,1 0,160 a60,60 0 1,1 0,-120 a40,40 0 1,1 0,80 a20,20 0 1,1 0,-40" stroke-dasharray="500"/>
                                        </svg>
                                    </div>
                                </div>
                                <p class="face-description">スナップで止まる<br>クリエイティブな表現</p>
                                <a href="#" class="cta-button">
                                    Explore
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M5 12h14M12 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>

                            <!-- Slide 2: Elegant -->
                            <div class="swiper-slide slide-2">
                                <span class="face-subtitle">Sophistication</span>
                                <h2 class="face-title">Elegant</h2>
                                <div class="visual-container">
                                    <div class="diamond-visual">
                                        <div class="diamond"></div>
                                        <div class="diamond"></div>
                                        <div class="diamond"></div>
                                    </div>
                                </div>
                                <p class="face-description">スナップで止まる<br>エレガントなデザイン</p>
                                <a href="#" class="cta-button">
                                    Discover
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M5 12h14M12 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>

                            <!-- Slide 3: Experience -->
                            <div class="swiper-slide slide-3">
                                <span class="face-subtitle">Innovation</span>
                                <h2 class="face-title">Experience</h2>
                                <div class="visual-container">
                                    <div class="orbit-visual">
                                        <div class="orbit-ring"></div>
                                        <div class="orbit-ring"></div>
                                        <div class="orbit-ring"></div>
                                        <div class="orbit-dot"></div>
                                        <div class="orbit-dot"></div>
                                        <div class="orbit-dot"></div>
                                    </div>
                                </div>
                                <p class="face-description">スナップで止まる<br>革新的な体験</p>
                                <a href="#" class="cta-button">
                                    Learn More
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M5 12h14M12 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <!-- Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>

                    <!-- Hint Label -->
                    <div class="swipe-hint">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M5 12h14M12 5l7 7-7 7"/>
                        </svg>
                        横フリックで回転
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile: Full Screen -->
    <div class="mobile-fullscreen">
        <!-- Light beams -->
        <div class="light-beam-left"></div>
        <div class="light-beam-right"></div>

        <div class="swiper-wrapper-container">
            <!-- Swiper -->
            <div class="swiper mobile-swiper">
                <div class="swiper-wrapper">
                    <!-- Slide 1: Creative -->
                    <div class="swiper-slide slide-1">
                        <span class="face-subtitle">Imagination</span>
                        <h2 class="face-title">Creative</h2>
                        <div class="visual-container">
                            <div class="spiral-visual">
                                <svg viewBox="0 0 200 200">
                                    <path class="spiral-path" d="M100,100 m0,-80 a80,80 0 1,1 0,160 a60,60 0 1,1 0,-120 a40,40 0 1,1 0,80 a20,20 0 1,1 0,-40" stroke-dasharray="500"/>
                                </svg>
                            </div>
                        </div>
                        <p class="face-description">スナップで止まる<br>クリエイティブな表現</p>
                        <a href="#" class="cta-button">
                            Explore
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>

                    <!-- Slide 2: Elegant -->
                    <div class="swiper-slide slide-2">
                        <span class="face-subtitle">Sophistication</span>
                        <h2 class="face-title">Elegant</h2>
                        <div class="visual-container">
                            <div class="diamond-visual">
                                <div class="diamond"></div>
                                <div class="diamond"></div>
                                <div class="diamond"></div>
                            </div>
                        </div>
                        <p class="face-description">スナップで止まる<br>エレガントなデザイン</p>
                        <a href="#" class="cta-button">
                            Discover
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>

                    <!-- Slide 3: Experience -->
                    <div class="swiper-slide slide-3">
                        <span class="face-subtitle">Innovation</span>
                        <h2 class="face-title">Experience</h2>
                        <div class="visual-container">
                            <div class="orbit-visual">
                                <div class="orbit-ring"></div>
                                <div class="orbit-ring"></div>
                                <div class="orbit-ring"></div>
                                <div class="orbit-dot"></div>
                                <div class="orbit-dot"></div>
                                <div class="orbit-dot"></div>
                            </div>
                        </div>
                        <p class="face-description">スナップで止まる<br>革新的な体験</p>
                        <a href="#" class="cta-button">
                            Learn More
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M5 12h14M12 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
            </div>

            <!-- Hint Label -->
            <div class="swipe-hint">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
                横フリックで回転
            </div>
        </div>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            /**
             * ThreePhaseMotionController
             * Handles Phase A (Lift) → Phase B (Float) → Phase C (Land/Settle) sequence
             */
            class ThreePhaseMotionController {
                constructor(swiper) {
                    this.swiper = swiper;
                    this.swiperEl = swiper.el;
                    this.phases = ['phase-lift', 'phase-float', 'phase-land', 'phase-settle'];
                }

                clearPhases() {
                    this.phases.forEach(phase => {
                        this.swiperEl.classList.remove(phase);
                    });
                }

                // Phase A: Lift (持ち上げ) - TransitionStart
                onTransitionStart() {
                    this.clearPhases();
                    this.swiperEl.classList.add('phase-lift');

                    // After lift, transition to float
                    setTimeout(() => {
                        this.swiperEl.classList.remove('phase-lift');
                        this.swiperEl.classList.add('phase-float');
                    }, 180);
                }

                // Phase C: Land/Settle (着地/収束) - TransitionEnd
                onTransitionEnd() {
                    this.clearPhases();
                    this.swiperEl.classList.add('phase-land');

                    // After land, settle to 0
                    setTimeout(() => {
                        this.swiperEl.classList.remove('phase-land');
                        this.swiperEl.classList.add('phase-settle');

                        // Clean up after settling
                        setTimeout(() => {
                            this.clearPhases();
                        }, 150);
                    }, 350);
                }
            }

            /**
             * PaginationController
             * Uses realIndex for proper dot control with loop
             */
            class PaginationController {
                constructor(swiper, paginationSelector) {
                    this.swiper = swiper;
                    this.dots = document.querySelectorAll(paginationSelector + ' .swiper-pagination-bullet');
                }

                update() {
                    const realIndex = this.swiper.realIndex;
                    this.dots.forEach((dot, i) => {
                        dot.classList.toggle('swiper-pagination-bullet-active', i === realIndex);
                    });
                }
            }

            // Swiper configuration with loop and weight parameters
            const swiperConfig = {
                effect: 'cube',
                grabCursor: true,
                loop: true,                    // Infinite loop enabled
                loopAdditionalSlides: 3,       // Safety margin for loop
                cubeEffect: {
                    shadow: true,
                    slideShadows: true,
                    shadowOffset: 70,          // Deep shadow for weight
                    shadowScale: 0.82,
                },
                speed: 1500,                   // 1400-1600ms range
                touchReleaseOnEdges: true,
                resistance: true,
                resistanceRatio: 0.75,         // Higher resistance for weight
                allowTouchMove: true,
                autoplay: {
                    delay: 2600,               // 2600ms delay for breathing rhythm
                    disableOnInteraction: true,
                    pauseOnMouseEnter: true,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    renderBullet: function (index, className) {
                        return '<span class="' + className + '" data-index="' + index + '"></span>';
                    },
                },
                keyboard: {
                    enabled: true,
                },
                mousewheel: {
                    invert: false,
                    sensitivity: 0.8,
                    thresholdDelta: 40,
                },
            };

            // Initialize PC Swiper
            const pcSwiper = new Swiper('.pc-swiper', {
                ...swiperConfig,
                pagination: {
                    el: '.pc-swiper .swiper-pagination',
                    clickable: true,
                    renderBullet: function (index, className) {
                        return '<span class="' + className + '" data-index="' + index + '"></span>';
                    },
                },
                on: {
                    init: function() {
                        this.motionController = new ThreePhaseMotionController(this);
                        this.paginationController = new PaginationController(this, '.pc-swiper .swiper-pagination');

                        // Initial demo: slow rotation after 1.5s
                        setTimeout(() => {
                            if (!this.destroyed) {
                                this.slideNext(2000);
                                setTimeout(() => {
                                    if (!this.destroyed) {
                                        this.slidePrev(2000);
                                    }
                                }, 3000);
                            }
                        }, 1500);
                    },
                    slideChangeTransitionStart: function() {
                        this.motionController.onTransitionStart();
                    },
                    slideChangeTransitionEnd: function() {
                        this.motionController.onTransitionEnd();
                    },
                    slideChange: function() {
                        // Update pagination with realIndex
                        this.paginationController.update();
                    }
                }
            });

            // Initialize Mobile Swiper
            const mobileSwiper = new Swiper('.mobile-swiper', {
                ...swiperConfig,
                pagination: {
                    el: '.mobile-swiper .swiper-pagination',
                    clickable: true,
                    renderBullet: function (index, className) {
                        return '<span class="' + className + '" data-index="' + index + '"></span>';
                    },
                },
                on: {
                    init: function() {
                        this.motionController = new ThreePhaseMotionController(this);
                        this.paginationController = new PaginationController(this, '.mobile-swiper .swiper-pagination');

                        // Initial demo: slow rotation after 1.5s
                        setTimeout(() => {
                            if (!this.destroyed) {
                                this.slideNext(2000);
                                setTimeout(() => {
                                    if (!this.destroyed) {
                                        this.slidePrev(2000);
                                    }
                                }, 3000);
                            }
                        }, 1500);
                    },
                    slideChangeTransitionStart: function() {
                        this.motionController.onTransitionStart();
                    },
                    slideChangeTransitionEnd: function() {
                        this.motionController.onTransitionEnd();
                    },
                    slideChange: function() {
                        // Update pagination with realIndex
                        this.paginationController.update();
                    }
                }
            });

            // Keyboard navigation
            document.addEventListener('keydown', (e) => {
                const activeSwiper = window.innerWidth <= 768 ? mobileSwiper : pcSwiper;
                if (e.key === 'ArrowLeft') {
                    activeSwiper.slidePrev();
                } else if (e.key === 'ArrowRight') {
                    activeSwiper.slideNext();
                }
            });
        });
    </script>
</body>
</html>
