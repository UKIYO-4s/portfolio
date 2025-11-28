<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Flick LP Demo - Hinge Rotation</title>
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

        /* Light beams */
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

        /* Prism Scene Container */
        .prism-container {
            width: 100%;
            height: 100%;
            position: relative;
            perspective: 1200px;
            overflow: hidden;
        }

        /* Hinge Scene - Left Edge Pivot */
        .prism-scene {
            width: 100%;
            height: 100%;
            position: relative;
            transform-style: preserve-3d;
            transform-origin: left center;
            transition: none;
        }

        /* Individual Face */
        .prism-face {
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 60px 30px;
            backface-visibility: hidden;
            transform-style: preserve-3d;
            transform-origin: left center;
        }

        /* Hinge Glow Line */
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
            filter: blur(2px);
            opacity: 0.6;
            z-index: 10;
        }

        /* Face Border */
        .prism-face::after {
            content: '';
            position: absolute;
            inset: 0;
            border: 1px solid rgba(0, 206, 209, 0.15);
            pointer-events: none;
        }

        /* Face Backgrounds */
        .face-1 {
            background: linear-gradient(180deg, #000 0%, #0a1520 100%);
        }

        .face-2 {
            background: linear-gradient(180deg, #000 0%, #0f0a1a 100%);
        }

        .face-3 {
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

        /* Face 1: Spiral */
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

        /* Face 2: Diamond */
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

        .diamond:nth-child(1) { width: 60px; height: 60px; animation-delay: 0s; }
        .diamond:nth-child(2) { width: 100px; height: 100px; animation-delay: 0.3s; opacity: 0.7; }
        .diamond:nth-child(3) { width: 140px; height: 140px; animation-delay: 0.6s; opacity: 0.4; }

        @keyframes diamondPulse {
            0%, 100% { transform: rotate(45deg) scale(1); opacity: 0.4; }
            50% { transform: rotate(45deg) scale(1.05); opacity: 0.8; }
        }

        /* Face 3: Orbit */
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

        /* CTA Button */
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

        /* Pagination */
        .pagination {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 12px;
            z-index: 50;
        }

        .pagination-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .pagination-dot.active {
            background: var(--color-accent);
            border-color: var(--color-accent);
            box-shadow: 0 0 15px var(--color-accent), 0 0 30px var(--color-accent-glow);
            transform: scale(1.2);
        }

        /* Hint Label */
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

            .mobile-fullscreen .prism-container {
                height: 100vh;
            }

            .mobile-fullscreen .prism-face {
                padding: 80px 24px 100px;
            }

            .mobile-fullscreen .face-title {
                font-size: 32px;
            }

            .mobile-fullscreen .visual-container {
                width: 150px;
                height: 150px;
            }

            .mobile-fullscreen .pagination {
                bottom: 30px;
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

        /* Background Particles */
        .particles {
            position: absolute;
            inset: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            width: 3px;
            height: 3px;
            background: var(--color-accent);
            border-radius: 50%;
            opacity: 0.3;
            animation: particleFloat 8s ease-in-out infinite;
        }

        @keyframes particleFloat {
            0%, 100% { transform: translateY(0) translateX(0); opacity: 0.2; }
            50% { transform: translateY(-30px) translateX(10px); opacity: 0.5; }
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
                <div class="prism-container" id="pc-prism">
                    <!-- Particles -->
                    <div class="particles" id="pc-particles"></div>

                    <!-- Prism Scene (Left Hinge) -->
                    <div class="prism-scene">
                        <!-- Face 1: Creative -->
                        <div class="prism-face face-1" data-face="0">
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

                        <!-- Face 2: Elegant -->
                        <div class="prism-face face-2" data-face="1">
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

                        <!-- Face 3: Experience -->
                        <div class="prism-face face-3" data-face="2">
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
                    <div class="pagination">
                        <div class="pagination-dot active" data-index="0"></div>
                        <div class="pagination-dot" data-index="1"></div>
                        <div class="pagination-dot" data-index="2"></div>
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

        <div class="prism-container" id="mobile-prism">
            <!-- Particles -->
            <div class="particles" id="mobile-particles"></div>

            <!-- Prism Scene (Left Hinge) -->
            <div class="prism-scene">
                <!-- Face 1: Creative -->
                <div class="prism-face face-1" data-face="0">
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

                <!-- Face 2: Elegant -->
                <div class="prism-face face-2" data-face="1">
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

                <!-- Face 3: Experience -->
                <div class="prism-face face-3" data-face="2">
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
            <div class="pagination">
                <div class="pagination-dot active" data-index="0"></div>
                <div class="pagination-dot" data-index="1"></div>
                <div class="pagination-dot" data-index="2"></div>
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

    <script>
        /**
         * HingePrismController
         * Left-hinge rotation with sink animation
         */
        class HingePrismController {
            constructor(container) {
                this.container = container;
                this.scene = container.querySelector('.prism-scene');
                this.faces = container.querySelectorAll('.prism-face');
                this.pagination = container.querySelectorAll('.pagination-dot');
                this.particlesContainer = container.querySelector('.particles');

                // State
                this.currentFace = 0;
                this.totalFaces = 3;
                this.anglePerFace = 120;

                // Animation state
                this.currentRotation = 0;
                this.targetRotation = 0;
                this.currentLift = 0;
                this.targetLift = 0;
                this.animationPhase = 'idle'; // 'rotating', 'sinking', 'settling', 'idle'

                // Animation parameters
                this.rotLerpFactor = 0.06;
                this.liftLerpFactor = 0.18;
                this.liftAmount = 14;
                this.sinkAmount = -6;

                // Touch handling
                this.isDragging = false;
                this.startX = 0;
                this.dragDelta = 0;
                this.dragSensitivity = 0.3;

                this.init();
            }

            init() {
                this.setupFaces();
                this.createParticles();
                this.bindEvents();
                this.animate();
            }

            setupFaces() {
                const containerWidth = this.container.offsetWidth;
                const depth = containerWidth / (2 * Math.tan(Math.PI / 3));

                this.faces.forEach((face, i) => {
                    const angle = i * this.anglePerFace;
                    face.style.transform = `rotateY(${angle}deg) translateZ(${depth}px)`;
                });
            }

            createParticles() {
                for (let i = 0; i < 20; i++) {
                    const particle = document.createElement('div');
                    particle.className = 'particle';
                    particle.style.left = `${Math.random() * 100}%`;
                    particle.style.top = `${Math.random() * 100}%`;
                    particle.style.animationDelay = `${Math.random() * 8}s`;
                    particle.style.animationDuration = `${6 + Math.random() * 4}s`;
                    this.particlesContainer.appendChild(particle);
                }
            }

            bindEvents() {
                // Touch events
                this.container.addEventListener('touchstart', (e) => this.onTouchStart(e), { passive: true });
                this.container.addEventListener('touchmove', (e) => this.onTouchMove(e), { passive: true });
                this.container.addEventListener('touchend', (e) => this.onTouchEnd(e));

                // Mouse events
                this.container.addEventListener('mousedown', (e) => this.onMouseDown(e));
                this.container.addEventListener('mousemove', (e) => this.onMouseMove(e));
                this.container.addEventListener('mouseup', (e) => this.onMouseUp(e));
                this.container.addEventListener('mouseleave', (e) => this.onMouseUp(e));

                // Keyboard
                document.addEventListener('keydown', (e) => this.onKeyDown(e));

                // Pagination
                this.pagination.forEach((dot, i) => {
                    dot.addEventListener('click', () => this.goToFace(i));
                });

                // Resize
                window.addEventListener('resize', () => this.setupFaces());
            }

            onTouchStart(e) {
                this.isDragging = true;
                this.startX = e.touches[0].clientX;
                this.dragDelta = 0;
            }

            onTouchMove(e) {
                if (!this.isDragging) return;
                const x = e.touches[0].clientX;
                this.dragDelta = (this.startX - x) * this.dragSensitivity;
            }

            onTouchEnd(e) {
                if (!this.isDragging) return;
                this.isDragging = false;
                this.handleSwipe();
            }

            onMouseDown(e) {
                this.isDragging = true;
                this.startX = e.clientX;
                this.dragDelta = 0;
            }

            onMouseMove(e) {
                if (!this.isDragging) return;
                this.dragDelta = (this.startX - e.clientX) * this.dragSensitivity;
            }

            onMouseUp(e) {
                if (!this.isDragging) return;
                this.isDragging = false;
                this.handleSwipe();
            }

            onKeyDown(e) {
                if (e.key === 'ArrowLeft') {
                    this.prev();
                } else if (e.key === 'ArrowRight') {
                    this.next();
                }
            }

            handleSwipe() {
                const threshold = 30;
                if (this.dragDelta > threshold) {
                    this.next();
                } else if (this.dragDelta < -threshold) {
                    this.prev();
                }
                this.dragDelta = 0;
            }

            next() {
                this.currentFace = (this.currentFace + 1) % this.totalFaces;
                this.rotateTo(this.currentFace);
            }

            prev() {
                this.currentFace = (this.currentFace - 1 + this.totalFaces) % this.totalFaces;
                this.rotateTo(this.currentFace);
            }

            goToFace(index) {
                this.currentFace = index;
                this.rotateTo(index);
            }

            rotateTo(faceIndex) {
                this.targetRotation = -faceIndex * this.anglePerFace;
                this.targetLift = this.liftAmount;
                this.animationPhase = 'rotating';
                this.updatePagination();
            }

            updatePagination() {
                this.pagination.forEach((dot, i) => {
                    dot.classList.toggle('active', i === this.currentFace);
                });
            }

            animate() {
                // Lerp rotation
                this.currentRotation += (this.targetRotation - this.currentRotation) * this.rotLerpFactor;

                // Lerp lift
                this.currentLift += (this.targetLift - this.currentLift) * this.liftLerpFactor;

                // Phase transitions
                const rotDiff = Math.abs(this.targetRotation - this.currentRotation);

                if (this.animationPhase === 'rotating' && rotDiff < 1) {
                    this.animationPhase = 'sinking';
                    this.targetLift = this.sinkAmount;
                } else if (this.animationPhase === 'sinking' && Math.abs(this.currentLift - this.sinkAmount) < 0.5) {
                    this.animationPhase = 'settling';
                    this.targetLift = 0;
                } else if (this.animationPhase === 'settling' && Math.abs(this.currentLift) < 0.3) {
                    this.animationPhase = 'idle';
                    this.targetLift = 0;
                    this.currentLift = 0;
                }

                // Apply transform
                this.scene.style.transform = `rotateY(${this.currentRotation}deg) translateY(${-this.currentLift}px)`;

                // Update hinge glow intensity based on rotation
                const isRotating = rotDiff > 0.5;
                this.faces.forEach(face => {
                    const glow = face.querySelector('::before');
                    face.style.setProperty('--hinge-opacity', isRotating ? '0.9' : '0.6');
                });

                requestAnimationFrame(() => this.animate());
            }
        }

        // Initialize
        document.addEventListener('DOMContentLoaded', () => {
            const pcContainer = document.getElementById('pc-prism');
            const mobileContainer = document.getElementById('mobile-prism');

            if (pcContainer) {
                new HingePrismController(pcContainer);
            }
            if (mobileContainer) {
                new HingePrismController(mobileContainer);
            }
        });
    </script>
</body>
</html>
