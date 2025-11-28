<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Flick LP Demo - Three.js</title>
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

        /* Three.js Canvas Container */
        .three-container {
            width: 100%;
            height: 100%;
            position: relative;
            cursor: grab;
        }

        .three-container:active {
            cursor: grabbing;
        }

        .three-container canvas {
            display: block;
            width: 100% !important;
            height: 100% !important;
        }

        /* UI Overlay */
        .ui-overlay {
            position: absolute;
            inset: 0;
            pointer-events: none;
            z-index: 50;
        }

        /* Face Info - Center */
        .face-info {
            position: absolute;
            bottom: 120px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .face-info.visible {
            opacity: 1;
        }

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
            text-shadow: 0 0 40px var(--color-accent-glow);
            margin-bottom: 0.5rem;
        }

        .face-description {
            font-family: var(--font-body);
            font-size: 14px;
            font-weight: 300;
            color: var(--color-text-muted);
            line-height: 1.6;
        }

        /* Navigation Dots */
        .nav-dots {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 12px;
            pointer-events: auto;
        }

        .nav-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.3);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .nav-dot.active {
            background: var(--color-accent);
            border-color: var(--color-accent);
            box-shadow: 0 0 15px var(--color-accent), 0 0 30px var(--color-accent-glow);
            transform: scale(1.2);
        }

        .nav-dot:hover:not(.active) {
            background: rgba(255, 255, 255, 0.4);
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

            .mobile-fullscreen .three-container {
                height: 100vh;
            }

            .mobile-fullscreen .face-info {
                bottom: 100px;
            }

            .mobile-fullscreen .face-title {
                font-size: 32px;
            }

            .mobile-fullscreen .nav-dots {
                bottom: 30px;
            }

            .mobile-fullscreen .swipe-hint {
                top: 50px;
                right: 16px;
            }
        }

        /* PC default: hide mobile fullscreen */
        .mobile-fullscreen {
            display: none;
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
                <div class="three-container" id="pcContainer">
                    <!-- Three.js renders here -->
                </div>
                <div class="ui-overlay">
                    <div class="face-info visible" id="pcFaceInfo">
                        <span class="face-subtitle" id="pcSubtitle">Imagination</span>
                        <h2 class="face-title" id="pcTitle">Creative</h2>
                        <p class="face-description">物理ベース質感＋スナップで止まる</p>
                    </div>
                    <div class="nav-dots" id="pcDots">
                        <div class="nav-dot active" data-face="0"></div>
                        <div class="nav-dot" data-face="1"></div>
                        <div class="nav-dot" data-face="2"></div>
                    </div>
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
        <!-- Background particles -->
        <div class="bg-particles">
            <div class="bg-particle"></div>
            <div class="bg-particle"></div>
            <div class="bg-particle"></div>
            <div class="bg-particle"></div>
            <div class="bg-particle"></div>
            <div class="bg-particle"></div>
        </div>

        <div class="three-container" id="mobileContainer">
            <!-- Three.js renders here -->
        </div>
        <div class="ui-overlay">
            <div class="face-info visible" id="mobileFaceInfo">
                <span class="face-subtitle" id="mobileSubtitle">Imagination</span>
                <h2 class="face-title" id="mobileTitle">Creative</h2>
                <p class="face-description">物理ベース質感＋スナップで止まる</p>
            </div>
            <div class="nav-dots" id="mobileDots">
                <div class="nav-dot active" data-face="0"></div>
                <div class="nav-dot" data-face="1"></div>
                <div class="nav-dot" data-face="2"></div>
            </div>
            <div class="swipe-hint">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
                横フリックで回転
            </div>
        </div>
    </div>

    <!-- Three.js -->
    <script type="importmap">
    {
        "imports": {
            "three": "https://cdn.jsdelivr.net/npm/three@0.160.0/build/three.module.js"
        }
    }
    </script>
    <script type="module">
        import * as THREE from 'three';

        // Face data
        const faceData = [
            { title: 'Creative', subtitle: 'Imagination', color: 0x0a1520 },
            { title: 'Elegant', subtitle: 'Sophistication', color: 0x0f0a1a },
            { title: 'Experience', subtitle: 'Innovation', color: 0x0a1a15 }
        ];

        class HingePrismScene {
            constructor(containerId, dotsId, titleId, subtitleId) {
                this.container = document.getElementById(containerId);
                this.dotsContainer = document.getElementById(dotsId);
                this.titleElement = document.getElementById(titleId);
                this.subtitleElement = document.getElementById(subtitleId);

                if (!this.container) return;

                this.currentFace = 0;
                this.targetRotation = 0;
                this.currentRotation = 0;
                this.isDragging = false;
                this.startX = 0;
                this.lastX = 0;
                this.velocity = 0;
                this.lastTime = 0;

                // Hinge animation state
                this.targetLift = 0;
                this.currentLift = 0;
                this.targetCamZ = 5.0;
                this.currentCamZ = 5.0;
                this.animationPhase = 'idle'; // 'rotating', 'sinking', 'settling', 'idle'

                // Lerp settings - slower for smooth effect
                this.rotLerpFactor = 0.045;
                this.liftLerpFactor = 0.18;
                this.camLerpFactor = 0.08;

                // Emissive intensity
                this.targetEmissive = 0.12;
                this.currentEmissive = 0.12;

                this.init();
            }

            init() {
                const rect = this.container.getBoundingClientRect();

                // Scene
                this.scene = new THREE.Scene();

                // Camera
                this.camera = new THREE.PerspectiveCamera(50, rect.width / rect.height, 0.1, 1000);
                this.camera.position.z = this.currentCamZ;

                // Renderer
                this.renderer = new THREE.WebGLRenderer({
                    antialias: true,
                    alpha: true
                });
                this.renderer.setSize(rect.width, rect.height);
                this.renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
                this.renderer.shadowMap.enabled = true;
                this.renderer.shadowMap.type = THREE.PCFSoftShadowMap;
                this.renderer.toneMapping = THREE.ACESFilmicToneMapping;
                this.renderer.toneMappingExposure = 1.2;
                this.container.appendChild(this.renderer.domElement);

                // Create background particles
                this.createParticles();

                // Create prism with hinge pivot
                this.createHingePrism();

                // Lights
                this.setupLights();

                // Events
                this.setupEvents();

                // Start animation
                this.animate();

                // Optional initial rotation
                if (window.enableInitialRotation) {
                    this.playInitialRotation();
                }
            }

            createParticles() {
                // Front particles (closer, smaller)
                const frontCount = 30;
                const frontGeometry = new THREE.BufferGeometry();
                const frontPositions = new Float32Array(frontCount * 3);

                for (let i = 0; i < frontCount; i++) {
                    frontPositions[i * 3] = (Math.random() - 0.5) * 8;
                    frontPositions[i * 3 + 1] = (Math.random() - 0.5) * 8;
                    frontPositions[i * 3 + 2] = (Math.random() - 0.5) * 3 + 1;
                }

                frontGeometry.setAttribute('position', new THREE.BufferAttribute(frontPositions, 3));

                const frontMaterial = new THREE.PointsMaterial({
                    color: 0x00CED1,
                    size: 0.025,
                    transparent: true,
                    opacity: 0.5,
                    blending: THREE.AdditiveBlending
                });

                this.frontParticles = new THREE.Points(frontGeometry, frontMaterial);
                this.scene.add(this.frontParticles);

                // Back particles (farther, larger blur effect)
                const backCount = 40;
                const backGeometry = new THREE.BufferGeometry();
                const backPositions = new Float32Array(backCount * 3);

                for (let i = 0; i < backCount; i++) {
                    backPositions[i * 3] = (Math.random() - 0.5) * 12;
                    backPositions[i * 3 + 1] = (Math.random() - 0.5) * 12;
                    backPositions[i * 3 + 2] = (Math.random() - 0.5) * 4 - 5;
                }

                backGeometry.setAttribute('position', new THREE.BufferAttribute(backPositions, 3));

                const backMaterial = new THREE.PointsMaterial({
                    color: 0x00CED1,
                    size: 0.06,
                    transparent: true,
                    opacity: 0.3,
                    blending: THREE.AdditiveBlending
                });

                this.backParticles = new THREE.Points(backGeometry, backMaterial);
                this.scene.add(this.backParticles);
            }

            createHingePrism() {
                // Prism dimensions
                const width = 2.0;
                const height = 3.5;
                const depth = 0.15;

                // Create pivot group for hinge rotation
                this.pivotGroup = new THREE.Group();
                // Offset pivot to left edge (hinge position)
                this.pivotGroup.position.set(-width / 2, 0, 0);
                this.scene.add(this.pivotGroup);

                // Inner group to hold the prism (offset back to center visually)
                this.prismGroup = new THREE.Group();
                this.prismGroup.position.set(width / 2, 0, 0);
                this.pivotGroup.add(this.prismGroup);

                // Create three planes for the triangular prism faces
                const planeGeometry = new THREE.PlaneGeometry(width, height);

                // Materials with emissive
                this.faceMaterials = faceData.map((face, index) => {
                    return new THREE.MeshStandardMaterial({
                        color: face.color,
                        metalness: 0.35,
                        roughness: 0.25,
                        emissive: 0x00CED1,
                        emissiveIntensity: 0.12,
                        side: THREE.DoubleSide
                    });
                });

                // Create face meshes positioned for triangular prism
                this.faceMeshes = [];
                const faceAngles = [0, 120, 240]; // degrees
                const prismRadius = 0.8; // Distance from center to face

                faceAngles.forEach((angle, index) => {
                    const mesh = new THREE.Mesh(planeGeometry.clone(), this.faceMaterials[index]);

                    // Position each face
                    const rad = (angle * Math.PI) / 180;
                    mesh.position.z = Math.cos(rad) * prismRadius;
                    mesh.position.x = Math.sin(rad) * prismRadius;
                    mesh.rotation.y = -rad;

                    // Translate geometry to pivot from left edge
                    mesh.geometry.translate(-width / 2, 0, 0);
                    mesh.position.x += width / 2;

                    this.faceMeshes.push(mesh);
                    this.prismGroup.add(mesh);
                });

                // Create hinge glow line (left edge)
                this.createHingeGlow();

                // Create edge highlights
                this.createEdgeHighlights();
            }

            createHingeGlow() {
                const height = 3.5;
                const hingeGeometry = new THREE.BufferGeometry();
                const hingePositions = new Float32Array([
                    0, -height / 2, 0,
                    0, height / 2, 0
                ]);
                hingeGeometry.setAttribute('position', new THREE.BufferAttribute(hingePositions, 3));

                this.hingeMaterial = new THREE.LineBasicMaterial({
                    color: 0x00CED1,
                    transparent: true,
                    opacity: 0.6,
                    linewidth: 2
                });

                this.hingeLine = new THREE.Line(hingeGeometry, this.hingeMaterial);
                this.hingeLine.position.set(0, 0, 0.8); // Position at front face left edge
                this.prismGroup.add(this.hingeLine);

                // Hinge glow sprite
                const glowTexture = this.createGlowTexture();
                const glowMaterial = new THREE.SpriteMaterial({
                    map: glowTexture,
                    color: 0x00CED1,
                    transparent: true,
                    opacity: 0.4,
                    blending: THREE.AdditiveBlending
                });

                this.hingeGlow = new THREE.Sprite(glowMaterial);
                this.hingeGlow.scale.set(0.5, 4, 1);
                this.hingeGlow.position.set(0, 0, 0.8);
                this.prismGroup.add(this.hingeGlow);
            }

            createGlowTexture() {
                const canvas = document.createElement('canvas');
                canvas.width = 64;
                canvas.height = 64;
                const ctx = canvas.getContext('2d');

                const gradient = ctx.createRadialGradient(32, 32, 0, 32, 32, 32);
                gradient.addColorStop(0, 'rgba(0, 206, 209, 1)');
                gradient.addColorStop(0.3, 'rgba(0, 206, 209, 0.5)');
                gradient.addColorStop(1, 'rgba(0, 206, 209, 0)');

                ctx.fillStyle = gradient;
                ctx.fillRect(0, 0, 64, 64);

                const texture = new THREE.CanvasTexture(canvas);
                return texture;
            }

            createEdgeHighlights() {
                const width = 2.0;
                const height = 3.5;

                // Right edge highlight for each face
                const edgeMaterial = new THREE.LineBasicMaterial({
                    color: 0xffffff,
                    transparent: true,
                    opacity: 0.15
                });

                this.faceMeshes.forEach((mesh, index) => {
                    const edgeGeometry = new THREE.BufferGeometry();
                    const edgePositions = new Float32Array([
                        width / 2, -height / 2, 0,
                        width / 2, height / 2, 0
                    ]);
                    edgeGeometry.setAttribute('position', new THREE.BufferAttribute(edgePositions, 3));

                    const edge = new THREE.Line(edgeGeometry, edgeMaterial);
                    mesh.add(edge);
                });
            }

            setupLights() {
                // Hemisphere light (ambient)
                const hemiLight = new THREE.HemisphereLight(0x444444, 0x111111, 0.5);
                this.scene.add(hemiLight);

                // Left point light (hinge side - stronger)
                this.leftLight = new THREE.PointLight(0x00CED1, 1.2, 10);
                this.leftLight.position.set(-3, 1, 2);
                this.leftLight.castShadow = true;
                this.leftLight.shadow.mapSize.width = 512;
                this.leftLight.shadow.mapSize.height = 512;
                this.scene.add(this.leftLight);

                // Right point light
                const rightLight = new THREE.PointLight(0x00CED1, 0.8, 10);
                rightLight.position.set(3, 1, 2);
                rightLight.castShadow = true;
                this.scene.add(rightLight);

                // Fill light (back)
                const fillLight = new THREE.PointLight(0xffffff, 0.3, 10);
                fillLight.position.set(0, 0, -3);
                this.scene.add(fillLight);

                // Front light
                const frontLight = new THREE.DirectionalLight(0xffffff, 0.5);
                frontLight.position.set(0, 2, 5);
                this.scene.add(frontLight);
            }

            setupEvents() {
                // Touch events
                this.container.addEventListener('touchstart', (e) => this.onTouchStart(e), { passive: true });
                this.container.addEventListener('touchmove', (e) => this.onTouchMove(e), { passive: true });
                this.container.addEventListener('touchend', (e) => this.onTouchEnd(e));

                // Mouse events
                this.container.addEventListener('mousedown', (e) => this.onMouseDown(e));
                document.addEventListener('mousemove', (e) => this.onMouseMove(e));
                document.addEventListener('mouseup', (e) => this.onMouseUp(e));

                // Wheel
                this.container.addEventListener('wheel', (e) => this.onWheel(e), { passive: false });

                // Keyboard
                document.addEventListener('keydown', (e) => this.onKeyDown(e));

                // Dots
                if (this.dotsContainer) {
                    this.dotsContainer.querySelectorAll('.nav-dot').forEach((dot, index) => {
                        dot.addEventListener('click', () => this.goToFace(index));
                    });
                }

                // Resize
                window.addEventListener('resize', () => this.onResize());
            }

            onTouchStart(e) {
                if (e.touches.length !== 1) return;
                this.isDragging = true;
                this.startX = e.touches[0].clientX;
                this.lastX = this.startX;
                this.lastTime = Date.now();
                this.velocity = 0;

                // Start lift
                this.animationPhase = 'rotating';
                this.targetLift = 0.12;
                this.targetCamZ = 4.6;
                this.targetEmissive = 0.28;
            }

            onTouchMove(e) {
                if (!this.isDragging || e.touches.length !== 1) return;
                const currentX = e.touches[0].clientX;
                const deltaX = currentX - this.lastX;
                const currentTime = Date.now();
                const deltaTime = currentTime - this.lastTime;

                if (deltaTime > 0) {
                    this.velocity = deltaX / deltaTime * 8;
                }

                // Right-to-left swipe = positive rotation (door opens)
                this.targetRotation -= deltaX * 0.006;
                this.lastX = currentX;
                this.lastTime = currentTime;
            }

            onTouchEnd() {
                if (!this.isDragging) return;
                this.isDragging = false;
                this.applyMomentumAndSnap();
            }

            onMouseDown(e) {
                this.isDragging = true;
                this.startX = e.clientX;
                this.lastX = this.startX;
                this.lastTime = Date.now();
                this.velocity = 0;
                this.container.style.cursor = 'grabbing';

                // Start lift
                this.animationPhase = 'rotating';
                this.targetLift = 0.12;
                this.targetCamZ = 4.6;
                this.targetEmissive = 0.28;
            }

            onMouseMove(e) {
                if (!this.isDragging) return;
                const currentX = e.clientX;
                const deltaX = currentX - this.lastX;
                const currentTime = Date.now();
                const deltaTime = currentTime - this.lastTime;

                if (deltaTime > 0) {
                    this.velocity = deltaX / deltaTime * 8;
                }

                // Right-to-left swipe = positive rotation (door opens)
                this.targetRotation -= deltaX * 0.006;
                this.lastX = currentX;
                this.lastTime = currentTime;
            }

            onMouseUp() {
                if (!this.isDragging) return;
                this.isDragging = false;
                this.container.style.cursor = 'grab';
                this.applyMomentumAndSnap();
            }

            onWheel(e) {
                e.preventDefault();
                const delta = e.deltaY > 0 ? 1 : -1;
                this.goToFace((this.currentFace + delta + 3) % 3);
            }

            onKeyDown(e) {
                if (e.key === 'ArrowLeft') {
                    this.goToFace((this.currentFace - 1 + 3) % 3);
                } else if (e.key === 'ArrowRight') {
                    this.goToFace((this.currentFace + 1) % 3);
                }
            }

            applyMomentumAndSnap() {
                // Apply short momentum
                this.targetRotation += this.velocity * 0.2;

                // Snap to nearest face (120° = 2π/3 radians)
                const faceAngle = (Math.PI * 2) / 3;
                const nearestFace = Math.round(this.targetRotation / faceAngle);
                this.targetRotation = nearestFace * faceAngle;

                // Calculate current face
                this.currentFace = (((-nearestFace % 3) + 3) % 3);

                // Start sink sequence
                this.animationPhase = 'sinking';
                this.targetLift = -0.06;
                this.targetCamZ = 5.1;

                // After sink, settle
                setTimeout(() => {
                    this.animationPhase = 'settling';
                    this.targetLift = 0;
                    this.targetCamZ = 5.0;
                    this.targetEmissive = 0.12;
                    this.updateUI();
                }, 350);

                // Mark as idle
                setTimeout(() => {
                    this.animationPhase = 'idle';
                }, 700);
            }

            goToFace(faceIndex) {
                const faceAngle = (Math.PI * 2) / 3;
                const currentFaceFromRotation = Math.round(this.targetRotation / faceAngle);
                const targetFaceRotation = -faceIndex;

                // Calculate shortest path
                let diff = targetFaceRotation - currentFaceFromRotation;
                if (diff > 1) diff -= 3;
                if (diff < -1) diff += 3;

                // Start lift
                this.animationPhase = 'rotating';
                this.targetLift = 0.12;
                this.targetCamZ = 4.6;
                this.targetEmissive = 0.28;

                this.targetRotation = (currentFaceFromRotation + diff) * faceAngle;
                this.currentFace = faceIndex;

                // Sink sequence
                setTimeout(() => {
                    this.animationPhase = 'sinking';
                    this.targetLift = -0.06;
                    this.targetCamZ = 5.1;
                }, 400);

                // Settle
                setTimeout(() => {
                    this.animationPhase = 'settling';
                    this.targetLift = 0;
                    this.targetCamZ = 5.0;
                    this.targetEmissive = 0.12;
                    this.updateUI();
                }, 600);

                // Idle
                setTimeout(() => {
                    this.animationPhase = 'idle';
                }, 900);
            }

            updateUI() {
                // Update dots
                if (this.dotsContainer) {
                    this.dotsContainer.querySelectorAll('.nav-dot').forEach((dot, index) => {
                        dot.classList.toggle('active', index === this.currentFace);
                    });
                }

                // Update text
                const face = faceData[this.currentFace];
                if (this.titleElement) this.titleElement.textContent = face.title;
                if (this.subtitleElement) this.subtitleElement.textContent = face.subtitle;
            }

            onResize() {
                const rect = this.container.getBoundingClientRect();
                this.camera.aspect = rect.width / rect.height;
                this.camera.updateProjectionMatrix();
                this.renderer.setSize(rect.width, rect.height);
            }

            playInitialRotation() {
                const duration = 3000;
                const startTime = Date.now();
                const startRotation = this.targetRotation;
                const endRotation = startRotation + Math.PI * 2;

                const animateIntro = () => {
                    const elapsed = Date.now() - startTime;
                    const progress = Math.min(elapsed / duration, 1);

                    // Ease out cubic
                    const eased = 1 - Math.pow(1 - progress, 3);
                    this.targetRotation = startRotation + (endRotation - startRotation) * eased;

                    if (progress < 1) {
                        requestAnimationFrame(animateIntro);
                    } else {
                        this.targetRotation = 0;
                        this.currentFace = 0;
                        this.updateUI();
                    }
                };

                animateIntro();
            }

            animate() {
                requestAnimationFrame(() => this.animate());

                // Smooth lerp for rotation (slow)
                const rotDiff = this.targetRotation - this.currentRotation;
                if (Math.abs(rotDiff) > 0.001) {
                    this.currentRotation += rotDiff * this.rotLerpFactor;
                } else {
                    this.currentRotation = this.targetRotation;
                }

                // Smooth lerp for lift (faster for quick settle)
                const liftDiff = this.targetLift - this.currentLift;
                if (Math.abs(liftDiff) > 0.0001) {
                    this.currentLift += liftDiff * this.liftLerpFactor;
                } else {
                    this.currentLift = this.targetLift;
                }

                // Smooth lerp for camera Z
                const camDiff = this.targetCamZ - this.currentCamZ;
                if (Math.abs(camDiff) > 0.001) {
                    this.currentCamZ += camDiff * this.camLerpFactor;
                } else {
                    this.currentCamZ = this.targetCamZ;
                }

                // Smooth lerp for emissive
                const emDiff = this.targetEmissive - this.currentEmissive;
                if (Math.abs(emDiff) > 0.001) {
                    this.currentEmissive += emDiff * 0.1;
                } else {
                    this.currentEmissive = this.targetEmissive;
                }

                // Apply transforms
                if (this.pivotGroup) {
                    // Hinge rotation (Y axis at left edge)
                    this.pivotGroup.rotation.y = this.currentRotation;
                    // Lift effect (Z translation)
                    this.pivotGroup.position.z = this.currentLift;
                }

                // Update camera
                this.camera.position.z = this.currentCamZ;

                // Update emissive intensity and hinge glow
                this.faceMaterials.forEach(mat => {
                    mat.emissiveIntensity = this.currentEmissive;
                });

                if (this.hingeMaterial) {
                    this.hingeMaterial.opacity = 0.3 + this.currentEmissive;
                }

                if (this.hingeGlow) {
                    this.hingeGlow.material.opacity = 0.2 + this.currentEmissive * 0.5;
                }

                // Animate particles
                if (this.frontParticles) {
                    this.frontParticles.rotation.y += 0.0003;
                    this.frontParticles.rotation.x += 0.0001;
                }
                if (this.backParticles) {
                    this.backParticles.rotation.y += 0.0002;
                    this.backParticles.rotation.x += 0.00015;
                }

                // Render
                this.renderer.render(this.scene, this.camera);
            }
        }

        // Initialize scenes
        document.addEventListener('DOMContentLoaded', () => {
            new HingePrismScene('pcContainer', 'pcDots', 'pcTitle', 'pcSubtitle');
            new HingePrismScene('mobileContainer', 'mobileDots', 'mobileTitle', 'mobileSubtitle');
        });

        // Set to true to enable initial rotation demo
        window.enableInitialRotation = false;
    </script>
</body>
</html>
