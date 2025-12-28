<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beautiful Chatbot</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Hiragino Sans', 'Meiryo', sans-serif;
            background: linear-gradient(135deg, #fef9f3 0%, #f8f4ff 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Landing Page Styles */
        .landing-page {
            min-height: 100vh;
            transition: filter 0.5s ease, transform 0.5s ease;
        }

        .landing-page.blurred {
            filter: blur(12px);
            transform: scale(1.02);
        }

        /* Header */
        .header {
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 24px;
            font-weight: 600;
            background: linear-gradient(135deg, #ffc460, #9c37b9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-links {
            display: flex;
            gap: 30px;
        }

        .nav-links a {
            text-decoration: none;
            color: #666;
            font-size: 14px;
            font-weight: 400;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: #9c37b9;
        }

        /* Hero Section */
        .hero {
            padding: 80px 40px 60px;
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }

        .hero-badge {
            display: inline-block;
            padding: 8px 20px;
            background: linear-gradient(135deg, rgba(255, 196, 96, 0.2), rgba(156, 55, 185, 0.2));
            border-radius: 20px;
            font-size: 12px;
            color: #9c37b9;
            margin-bottom: 30px;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 300;
            color: #333;
            line-height: 1.3;
            margin-bottom: 20px;
        }

        .hero h1 span {
            background: linear-gradient(135deg, #ffc460, #9c37b9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 500;
        }

        .hero p {
            font-size: 18px;
            color: #888;
            font-weight: 300;
            line-height: 1.8;
            margin-bottom: 40px;
        }

        .cta-button {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 32px;
            background: linear-gradient(135deg, #ffc460, #9c37b9);
            color: white;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            font-weight: 400;
            cursor: pointer;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(156, 55, 185, 0.3);
        }

        /* Features Section */
        .features {
            padding: 60px 40px;
            max-width: 1000px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 20px;
            text-align: center;
            transition: transform 0.3s;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            width: 48px;
            height: 48px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .feature-icon svg {
            width: 32px;
            height: 32px;
            stroke: #9c37b9;
            stroke-width: 1.5;
            fill: none;
        }

        .feature-card h3 {
            font-size: 18px;
            font-weight: 500;
            color: #333;
            margin-bottom: 10px;
        }

        .feature-card p {
            font-size: 14px;
            color: #888;
            font-weight: 300;
            line-height: 1.6;
        }

        /* Stats Section */
        .stats {
            padding: 60px 40px;
            text-align: center;
        }

        .stats-grid {
            display: flex;
            justify-content: center;
            gap: 80px;
        }

        .stat-item h4 {
            font-size: 42px;
            font-weight: 300;
            background: linear-gradient(135deg, #ffc460, #9c37b9);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-item p {
            font-size: 14px;
            color: #888;
            margin-top: 5px;
        }

        /* Footer hint */
        .footer-hint {
            text-align: center;
            padding: 40px;
            color: #aaa;
            font-size: 14px;
        }

        .footer-hint span {
            display: inline-block;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-5px); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 32px;
            }
            .features-grid {
                grid-template-columns: 1fr;
            }
            .stats-grid {
                flex-direction: column;
                gap: 30px;
            }
            .nav-links {
                display: none;
            }
        }

        /* Symbol Container */
        .symbol-container {
            position: fixed;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            cursor: pointer;
            z-index: 100;
            transition: top 0.6s cubic-bezier(0.4, 0, 0.2, 1), bottom 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .symbol-container.active {
            position: fixed;
            top: 60px;
            bottom: auto;
        }

        .symbol {
            width: 100px;
            height: 100px;
            position: relative;
        }

        .sphere-canvas {
            width: 100%;
            height: 100%;
        }

        /* Chatbot Overlay */
        .chatbot-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(0px);
            z-index: 50;
            opacity: 0;
            visibility: hidden;
            transition: all 0.5s ease;
            display: flex;
            flex-direction: column;
        }

        .chatbot-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .chat-area {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 180px 30px 100px;
            overflow-y: auto;
        }

        .bot-message {
            font-size: 24px;
            font-weight: 100;
            color: #333;
            text-align: center;
            line-height: 1.8;
            max-width: 600px;
            white-space: pre-wrap;
        }

        .cursor {
            display: inline-block;
            width: 2px;
            height: 1em;
            background: #333;
            animation: blink 0.7s infinite;
            vertical-align: text-bottom;
            margin-left: 2px;
        }

        @keyframes blink {
            0%, 50% { opacity: 1; }
            51%, 100% { opacity: 0; }
        }

        /* Typewriter character animation */
        .char {
            display: inline-block;
            opacity: 0;
            animation: charFadeIn 0.4s ease forwards;
        }

        .char.space {
            width: 0.3em;
        }

        @keyframes charFadeIn {
            0% {
                opacity: 0;
                transform: translateY(5px);
                filter: blur(3px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
                filter: blur(0);
            }
        }

        .input-area {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 20px 30px 40px;
            background: transparent;
            z-index: 60;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.5s ease 0.3s;
        }

        .chatbot-overlay.active .input-area {
            opacity: 1;
            transform: translateY(0);
        }

        .input-wrapper {
            max-width: 500px;
            margin: 0 auto;
        }

        .chat-input {
            width: 100%;
            padding: 16px 24px;
            border: 1px solid #e0e0e0;
            border-radius: 30px;
            font-size: 16px;
            font-weight: 300;
            outline: none;
            transition: border-color 0.3s, box-shadow 0.3s;
            background: rgba(255, 255, 255, 0.9);
        }

        .chat-input:focus {
            border-color: #9c37b9;
            box-shadow: 0 0 0 3px rgba(156, 55, 185, 0.1);
        }

        .close-btn {
            position: fixed;
            top: 20px;
            right: 20px;
            width: 44px;
            height: 44px;
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 50%;
            cursor: pointer;
            z-index: 70;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .close-btn.active {
            opacity: 1;
            visibility: visible;
        }

        .close-btn::before,
        .close-btn::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 20px;
            height: 1.5px;
            background: #666;
        }

        .close-btn::before {
            transform: translate(-50%, -50%) rotate(45deg);
        }

        .close-btn::after {
            transform: translate(-50%, -50%) rotate(-45deg);
        }

        .close-btn:hover {
            background: #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }
    </style>
</head>
<body>
    <!-- Landing Page -->
    <div class="landing-page" id="landingPage">
        <header class="header">
            <div class="logo">Beautiful Chatbot</div>
            <nav class="nav-links">
                <a href="#">Features</a>
                <a href="#">Pricing</a>
                <a href="#">About</a>
                <a href="#">Contact</a>
            </nav>
        </header>

        <section class="hero">
            <div class="hero-badge">Beautiful AI Experience</div>
            <h1>会話を、<br><span>美しく</span></h1>
            <p>洗練されたデザインと滑らかなアニメーション。<br>AIとの対話を、心地よい体験に。</p>
            <button class="cta-button" id="ctaButton">
                体験する
                <span>→</span>
            </button>
        </section>

        <section class="features">
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg viewBox="0 0 24 24">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="9" y1="9" x2="15" y2="9"></line>
                            <line x1="9" y1="15" x2="15" y2="15"></line>
                        </svg>
                    </div>
                    <h3>洗練されたUI</h3>
                    <p>ミニマルで美しいインターフェースが、会話に集中させます</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="9"></circle>
                            <path d="M12 3 L12 7 M12 17 L12 21 M3 12 L7 12 M17 12 L21 12"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </div>
                    <h3>有機的なアニメーション</h3>
                    <p>3Dポリゴン球体が、AIの思考を視覚的に表現します</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M9 18V5l12-2v13"></path>
                            <circle cx="6" cy="18" r="3"></circle>
                            <circle cx="18" cy="16" r="3"></circle>
                        </svg>
                    </div>
                    <h3>音との調和</h3>
                    <p>テキストと連動したサウンドが、没入感を高めます</p>
                </div>
            </div>
        </section>

        <section class="stats">
            <div class="stats-grid">
                <div class="stat-item">
                    <h4>60fps</h4>
                    <p>滑らかな描画</p>
                </div>
                <div class="stat-item">
                    <h4>∞</h4>
                    <p>表現の可能性</p>
                </div>
                <div class="stat-item">
                    <h4>1</h4>
                    <p>つの美しい体験</p>
                </div>
            </div>
        </section>

        <div class="footer-hint">
            <span>↓</span> シンボルをクリックして美しさを体験
        </div>
    </div>

    <!-- Symbol -->
    <div class="symbol-container" id="symbolContainer">
        <div class="symbol">
            <canvas id="sphereCanvas" class="sphere-canvas" width="200" height="200"></canvas>
        </div>
    </div>

    <!-- Chatbot Overlay -->
    <div class="chatbot-overlay" id="chatbotOverlay">
        <div class="chat-area">
            <div class="bot-message" id="botMessage"></div>
        </div>
        <div class="input-area">
            <div class="input-wrapper">
                <input type="text" class="chat-input" id="chatInput" placeholder="メッセージを入力...">
            </div>
        </div>
    </div>

    <button class="close-btn" id="closeBtn"></button>

    <script>
        // Audio - Short "Pi" "Ti" sounds
        let audioContext = null;
        let noteIndex = 0;

        // High-pitched notes for "pi/ti" sound
        const piTiNotes = [
            1318.51,  // E6
            1479.98,  // F#6
            1567.98,  // G6
            1760.00,  // A6
            1975.53,  // B6
            2093.00,  // C7
        ];

        function initAudio() {
            if (!audioContext) {
                audioContext = new (window.AudioContext || window.webkitAudioContext)();
            }
        }

        function playPiTi() {
            if (!audioContext) return;

            const now = audioContext.currentTime;

            // Pick a note
            noteIndex = (noteIndex + 1 + Math.floor(Math.random() * 2)) % piTiNotes.length;
            const frequency = piTiNotes[noteIndex];

            // Create oscillator - sine for soft "pi" sound
            const oscillator = audioContext.createOscillator();
            oscillator.type = 'sine';
            oscillator.frequency.setValueAtTime(frequency, now);

            // Gain node for envelope
            const gainNode = audioContext.createGain();

            // High-pass filter to make it crisp
            const filter = audioContext.createBiquadFilter();
            filter.type = 'highpass';
            filter.frequency.setValueAtTime(800, now);

            // Connect
            oscillator.connect(filter);
            filter.connect(gainNode);
            gainNode.connect(audioContext.destination);

            // Short, crisp envelope - quick attack, quick decay
            const duration = 0.08;
            gainNode.gain.setValueAtTime(0, now);
            gainNode.gain.linearRampToValueAtTime(0.12, now + 0.005); // Very fast attack
            gainNode.gain.exponentialRampToValueAtTime(0.001, now + duration);

            oscillator.start(now);
            oscillator.stop(now + duration);
        }

        function playTi() {
            if (!audioContext) return;

            const now = audioContext.currentTime;

            // Slightly different tone for variety
            const frequency = piTiNotes[Math.floor(Math.random() * piTiNotes.length)] * 1.2;

            const oscillator = audioContext.createOscillator();
            oscillator.type = 'triangle'; // Softer tone
            oscillator.frequency.setValueAtTime(frequency, now);

            const gainNode = audioContext.createGain();

            oscillator.connect(gainNode);
            gainNode.connect(audioContext.destination);

            const duration = 0.06;
            gainNode.gain.setValueAtTime(0, now);
            gainNode.gain.linearRampToValueAtTime(0.08, now + 0.003);
            gainNode.gain.exponentialRampToValueAtTime(0.001, now + duration);

            oscillator.start(now);
            oscillator.stop(now + duration);
        }

        function playSound() {
            if (Math.random() > 0.4) {
                playPiTi();
            } else {
                playTi();
            }
        }

        // Elements
        const symbolContainer = document.getElementById('symbolContainer');
        const chatbotOverlay = document.getElementById('chatbotOverlay');
        const landingPage = document.getElementById('landingPage');
        const closeBtn = document.getElementById('closeBtn');
        const botMessage = document.getElementById('botMessage');
        const chatInput = document.getElementById('chatInput');
        const canvas = document.getElementById('sphereCanvas');
        const ctx = canvas.getContext('2d');
        const ctaButton = document.getElementById('ctaButton');

        let isOpen = false;
        let isTyping = false;
        let time = 0;

        // 3D Sphere
        const vertices = [];
        const edges = [];
        const faces = [];

        function createIcosphere(subdivisions = 2) {
            vertices.length = 0;
            edges.length = 0;
            faces.length = 0;

            const phi = (1 + Math.sqrt(5)) / 2;

            const baseVertices = [
                [-1, phi, 0], [1, phi, 0], [-1, -phi, 0], [1, -phi, 0],
                [0, -1, phi], [0, 1, phi], [0, -1, -phi], [0, 1, -phi],
                [phi, 0, -1], [phi, 0, 1], [-phi, 0, -1], [-phi, 0, 1]
            ];

            baseVertices.forEach(v => {
                const len = Math.sqrt(v[0]*v[0] + v[1]*v[1] + v[2]*v[2]);
                vertices.push([v[0]/len, v[1]/len, v[2]/len]);
            });

            const baseFaces = [
                [0, 11, 5], [0, 5, 1], [0, 1, 7], [0, 7, 10], [0, 10, 11],
                [1, 5, 9], [5, 11, 4], [11, 10, 2], [10, 7, 6], [7, 1, 8],
                [3, 9, 4], [3, 4, 2], [3, 2, 6], [3, 6, 8], [3, 8, 9],
                [4, 9, 5], [2, 4, 11], [6, 2, 10], [8, 6, 7], [9, 8, 1]
            ];

            let currentFaces = baseFaces;

            for (let s = 0; s < subdivisions; s++) {
                const newFaces = [];
                const midpointCache = {};

                function getMidpoint(i1, i2) {
                    const key = i1 < i2 ? `${i1}_${i2}` : `${i2}_${i1}`;
                    if (midpointCache[key] !== undefined) return midpointCache[key];

                    const v1 = vertices[i1];
                    const v2 = vertices[i2];
                    const mid = [(v1[0]+v2[0])/2, (v1[1]+v2[1])/2, (v1[2]+v2[2])/2];
                    const len = Math.sqrt(mid[0]*mid[0] + mid[1]*mid[1] + mid[2]*mid[2]);
                    mid[0] /= len; mid[1] /= len; mid[2] /= len;

                    const idx = vertices.length;
                    vertices.push(mid);
                    midpointCache[key] = idx;
                    return idx;
                }

                currentFaces.forEach(face => {
                    const a = getMidpoint(face[0], face[1]);
                    const b = getMidpoint(face[1], face[2]);
                    const c = getMidpoint(face[2], face[0]);

                    newFaces.push([face[0], a, c]);
                    newFaces.push([face[1], b, a]);
                    newFaces.push([face[2], c, b]);
                    newFaces.push([a, b, c]);
                });

                currentFaces = newFaces;
            }

            faces.push(...currentFaces);

            const edgeSet = new Set();
            faces.forEach(face => {
                for (let i = 0; i < 3; i++) {
                    const a = face[i];
                    const b = face[(i + 1) % 3];
                    const key = a < b ? `${a}_${b}` : `${b}_${a}`;
                    if (!edgeSet.has(key)) {
                        edgeSet.add(key);
                        edges.push([a, b]);
                    }
                }
            });
        }

        createIcosphere(3);

        function rotateX(v, angle) {
            const cos = Math.cos(angle), sin = Math.sin(angle);
            return [v[0], v[1] * cos - v[2] * sin, v[1] * sin + v[2] * cos];
        }

        function rotateY(v, angle) {
            const cos = Math.cos(angle), sin = Math.sin(angle);
            return [v[0] * cos + v[2] * sin, v[1], -v[0] * sin + v[2] * cos];
        }

        function rotateZ(v, angle) {
            const cos = Math.cos(angle), sin = Math.sin(angle);
            return [v[0] * cos - v[1] * sin, v[0] * sin + v[1] * cos, v[2]];
        }

        let currentDeform = 0;
        let targetDeform = 0;

        function drawSphere() {
            const width = canvas.width;
            const height = canvas.height;
            const cx = width / 2;
            const cy = height / 2;
            const radius = 40 * (width / 100);

            ctx.clearRect(0, 0, width, height);

            currentDeform += (targetDeform - currentDeform) * 0.08;

            const rotX = time * 0.3;
            const rotY = time * 0.5;
            const rotZ = time * 0.2;

            const projected = vertices.map((v, idx) => {
                let deformed = [...v];

                if (currentDeform > 0.01) {
                    const wave1 = Math.sin(v[1] * 4 + time * 3) * 0.15 * currentDeform;
                    const wave2 = Math.sin(v[0] * 3 + time * 2.5) * 0.1 * currentDeform;
                    const wave3 = Math.sin(v[2] * 5 + time * 4) * 0.08 * currentDeform;

                    const waveOffset = 1 + wave1 + wave2 + wave3;
                    deformed = [v[0] * waveOffset, v[1] * waveOffset, v[2] * waveOffset];
                }

                let rotated = rotateX(deformed, rotX);
                rotated = rotateY(rotated, rotY);
                rotated = rotateZ(rotated, rotZ);

                const perspective = 3;
                const scale = perspective / (perspective + rotated[2]);

                return {
                    x: cx + rotated[0] * radius * scale,
                    y: cy + rotated[1] * radius * scale,
                    z: rotated[2],
                    scale: scale
                };
            });

            const sortedEdges = edges.map(edge => {
                const avgZ = (projected[edge[0]].z + projected[edge[1]].z) / 2;
                return { edge, avgZ };
            }).sort((a, b) => a.avgZ - b.avgZ);

            function lerpColor(t) {
                const r = Math.round(255 + (156 - 255) * t);
                const g = Math.round(196 + (55 - 196) * t);
                const b = Math.round(96 + (185 - 96) * t);
                return { r, g, b };
            }

            sortedEdges.forEach(({ edge, avgZ }) => {
                const p1 = projected[edge[0]];
                const p2 = projected[edge[1]];

                const depthFactor = (avgZ + 1) / 2;
                const baseOpacity = 0.08 + depthFactor * 0.25;
                const pulse = isTyping ? 0.1 * Math.sin(time * 5 + avgZ * 2) : 0;

                const avgY = (vertices[edge[0]][1] + vertices[edge[1]][1]) / 2;
                const gradientT = (avgY + 1) / 2;
                const color = lerpColor(gradientT);

                ctx.beginPath();
                ctx.moveTo(p1.x, p1.y);
                ctx.lineTo(p2.x, p2.y);
                ctx.strokeStyle = `rgba(${color.r}, ${color.g}, ${color.b}, ${baseOpacity + pulse})`;
                ctx.lineWidth = 0.5 + depthFactor * 0.3;
                ctx.stroke();
            });

            projected.forEach((p, idx) => {
                const depthFactor = (p.z + 1) / 2;
                const size = 0.5 + depthFactor * 0.8;
                const opacity = 0.1 + depthFactor * 0.25;

                const gradientT = (vertices[idx][1] + 1) / 2;
                const color = lerpColor(gradientT);

                ctx.beginPath();
                ctx.arc(p.x, p.y, size, 0, Math.PI * 2);
                ctx.fillStyle = `rgba(${color.r}, ${color.g}, ${color.b}, ${opacity})`;
                ctx.fill();
            });
        }

        function animate() {
            time += 0.02;
            targetDeform = isTyping ? 1 : 0.15;
            drawSphere();
            requestAnimationFrame(animate);
        }

        animate();

        async function typeWriter(text, element) {
            isTyping = true;
            element.innerHTML = '';
            const cursor = document.createElement('span');
            cursor.className = 'cursor';

            // Word boundary characters
            const wordBreaks = ['、', '。', '！', '？', '　', ' ', '\n', '」', '）', '…'];

            for (let i = 0; i < text.length; i++) {
                const char = text[i];
                const nextChar = text[i + 1] || '';

                if (char === '\n') {
                    element.appendChild(document.createElement('br'));
                } else {
                    const span = document.createElement('span');
                    span.className = char === ' ' || char === '　' ? 'char space' : 'char';
                    span.textContent = char;
                    element.appendChild(span);
                }

                // Re-append cursor at the end
                if (cursor.parentNode) cursor.remove();
                element.appendChild(cursor);

                // Play sound at word boundaries or punctuation
                const isWordEnd = wordBreaks.includes(nextChar) ||
                                  wordBreaks.includes(char) ||
                                  i === text.length - 1;

                if (isWordEnd && char !== ' ' && char !== '　' && char !== '\n') {
                    playSound();
                }

                const delay = char === '。' || char === '、' ? 120 :
                              char === '\n' ? 60 : 35 + Math.random() * 20;
                await new Promise(resolve => setTimeout(resolve, delay));
            }
            isTyping = false;
        }

        function openChatbot() {
            initAudio();
            isOpen = true;
            chatbotOverlay.classList.add('active');
            landingPage.classList.add('blurred');
            symbolContainer.classList.add('active');
            closeBtn.classList.add('active');

            setTimeout(() => {
                typeWriter('こんにちは！\nAI Assistantです。\n何かお手伝いできることはありますか？', botMessage);
            }, 500);

            setTimeout(() => chatInput.focus(), 600);
        }

        function closeChatbot() {
            isOpen = false;
            isTyping = false;
            chatbotOverlay.classList.remove('active');
            landingPage.classList.remove('blurred');
            symbolContainer.classList.remove('active');
            closeBtn.classList.remove('active');
            setTimeout(() => { botMessage.innerHTML = ''; }, 500);
        }

        symbolContainer.addEventListener('click', () => {
            if (!isOpen) openChatbot();
        });

        ctaButton.addEventListener('click', () => {
            openChatbot();
        });

        closeBtn.addEventListener('click', closeChatbot);

        chatInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter' && chatInput.value.trim()) {
                chatInput.value = '';
                setTimeout(() => {
                    const responses = [
                        'ご質問ありがとうございます。\nお手伝いできることがあれば、お知らせください。',
                        'なるほど、理解しました。\n詳しくお聞かせください。',
                        'その件について、\nもう少し詳しく教えていただけますか？'
                    ];
                    typeWriter(responses[Math.floor(Math.random() * responses.length)], botMessage);
                }, 300);
            }
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && isOpen) closeChatbot();
        });
    </script>
</body>
</html>
