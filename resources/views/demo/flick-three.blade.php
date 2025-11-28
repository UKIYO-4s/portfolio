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

        /* Background glow effect */
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

        class PrismScene {
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

                this.init();
            }

            init() {
                const rect = this.container.getBoundingClientRect();

                // Scene
                this.scene = new THREE.Scene();

                // Camera
                this.camera = new THREE.PerspectiveCamera(50, rect.width / rect.height, 0.1, 1000);
                this.camera.position.z = 5;

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

                // Create prism
                this.createPrism();

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
                const particleCount = 50;
                const geometry = new THREE.BufferGeometry();
                const positions = new Float32Array(particleCount * 3);

                for (let i = 0; i < particleCount; i++) {
                    positions[i * 3] = (Math.random() - 0.5) * 10;
                    positions[i * 3 + 1] = (Math.random() - 0.5) * 10;
                    positions[i * 3 + 2] = (Math.random() - 0.5) * 5 - 3;
                }

                geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));

                const material = new THREE.PointsMaterial({
                    color: 0x00CED1,
                    size: 0.03,
                    transparent: true,
                    opacity: 0.6,
                    blending: THREE.AdditiveBlending
                });

                this.particles = new THREE.Points(geometry, material);
                this.scene.add(this.particles);
            }

            createPrism() {
                // Create triangular prism geometry
                const shape = new THREE.Shape();
                const radius = 1.2;

                // Triangle vertices
                for (let i = 0; i < 3; i++) {
                    const angle = (i / 3) * Math.PI * 2 - Math.PI / 2;
                    const x = Math.cos(angle) * radius;
                    const y = Math.sin(angle) * radius;
                    if (i === 0) {
                        shape.moveTo(x, y);
                    } else {
                        shape.lineTo(x, y);
                    }
                }
                shape.closePath();

                const extrudeSettings = {
                    depth: 2.5,
                    bevelEnabled: false
                };

                const geometry = new THREE.ExtrudeGeometry(shape, extrudeSettings);
                geometry.center();

                // Create materials for each face
                const materials = faceData.map((face, index) => {
                    return new THREE.MeshStandardMaterial({
                        color: face.color,
                        metalness: 0.35,
                        roughness: 0.25,
                        emissive: 0x00CED1,
                        emissiveIntensity: 0.05 + index * 0.02
                    });
                });

                // Apply materials - ExtrudeGeometry has multiple groups
                // Groups: 0 = front cap, 1 = back cap, 2+ = sides
                const material = new THREE.MeshStandardMaterial({
                    color: 0x0a1520,
                    metalness: 0.35,
                    roughness: 0.25,
                    emissive: 0x00CED1,
                    emissiveIntensity: 0.08
                });

                this.prism = new THREE.Mesh(geometry, material);
                this.prism.rotation.y = Math.PI / 2;
                this.prism.castShadow = true;
                this.prism.receiveShadow = true;
                this.scene.add(this.prism);

                // Add edge glow
                const edgeGeometry = new THREE.EdgesGeometry(geometry);
                const edgeMaterial = new THREE.LineBasicMaterial({
                    color: 0x00CED1,
                    transparent: true,
                    opacity: 0.5
                });
                this.edges = new THREE.LineSegments(edgeGeometry, edgeMaterial);
                this.edges.rotation.y = Math.PI / 2;
                this.scene.add(this.edges);
            }

            setupLights() {
                // Hemisphere light (ambient)
                const hemiLight = new THREE.HemisphereLight(0x444444, 0x111111, 0.5);
                this.scene.add(hemiLight);

                // Left point light
                const leftLight = new THREE.PointLight(0x00CED1, 1, 10);
                leftLight.position.set(-3, 1, 2);
                leftLight.castShadow = true;
                leftLight.shadow.mapSize.width = 512;
                leftLight.shadow.mapSize.height = 512;
                this.scene.add(leftLight);

                // Right point light
                const rightLight = new THREE.PointLight(0x00CED1, 1, 10);
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
            }

            onTouchMove(e) {
                if (!this.isDragging || e.touches.length !== 1) return;
                const currentX = e.touches[0].clientX;
                const deltaX = currentX - this.lastX;
                const currentTime = Date.now();
                const deltaTime = currentTime - this.lastTime;

                if (deltaTime > 0) {
                    this.velocity = deltaX / deltaTime * 10;
                }

                this.targetRotation -= deltaX * 0.005;
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
            }

            onMouseMove(e) {
                if (!this.isDragging) return;
                const currentX = e.clientX;
                const deltaX = currentX - this.lastX;
                const currentTime = Date.now();
                const deltaTime = currentTime - this.lastTime;

                if (deltaTime > 0) {
                    this.velocity = deltaX / deltaTime * 10;
                }

                this.targetRotation -= deltaX * 0.005;
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
                // Apply momentum
                this.targetRotation += this.velocity * 0.3;

                // Snap to nearest face (120° = 2π/3 radians)
                const faceAngle = (Math.PI * 2) / 3;
                const nearestFace = Math.round(this.targetRotation / faceAngle);
                this.targetRotation = nearestFace * faceAngle;

                // Calculate current face
                this.currentFace = (((-nearestFace % 3) + 3) % 3);
                this.updateUI();
            }

            goToFace(faceIndex) {
                const faceAngle = (Math.PI * 2) / 3;
                const currentFaceFromRotation = Math.round(this.targetRotation / faceAngle);
                const targetFaceRotation = -faceIndex;

                // Calculate shortest path
                let diff = targetFaceRotation - currentFaceFromRotation;
                if (diff > 1) diff -= 3;
                if (diff < -1) diff += 3;

                this.targetRotation = (currentFaceFromRotation + diff) * faceAngle;
                this.currentFace = faceIndex;
                this.updateUI();
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

                // Ease out cubic interpolation
                const diff = this.targetRotation - this.currentRotation;
                const easeAmount = 0.08;

                if (Math.abs(diff) > 0.001) {
                    this.currentRotation += diff * easeAmount;
                } else {
                    this.currentRotation = this.targetRotation;
                }

                // Apply rotation
                if (this.prism) {
                    this.prism.rotation.y = this.currentRotation + Math.PI / 2;
                    this.edges.rotation.y = this.currentRotation + Math.PI / 2;
                }

                // Animate particles
                if (this.particles) {
                    this.particles.rotation.y += 0.0005;
                    this.particles.rotation.x += 0.0002;
                }

                // Render
                this.renderer.render(this.scene, this.camera);
            }
        }

        // Initialize scenes
        document.addEventListener('DOMContentLoaded', () => {
            new PrismScene('pcContainer', 'pcDots', 'pcTitle', 'pcSubtitle');
            new PrismScene('mobileContainer', 'mobileDots', 'mobileTitle', 'mobileSubtitle');
        });

        // Set to true to enable initial rotation demo
        window.enableInitialRotation = false;
    </script>
</body>
</html>
