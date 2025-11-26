<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AIチャットBotデモ - オプション機能</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Noto Sans JP', sans-serif; }

        /* Chat widget animations */
        .chat-widget {
            transition: all 0.3s ease;
        }

        .chat-widget.minimized {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            right: 24px;
            bottom: 24px;
        }

        @media (min-width: 768px) {
            .chat-widget.minimized {
                width: 56px;
                height: 56px;
            }
        }

        @media (max-width: 640px) {
            .chat-widget.minimized {
                right: 16px;
                bottom: 16px;
            }
        }

        .chat-widget.expanded {
            width: 380px;
            height: 520px;
            border-radius: 16px;
            right: 24px;
            bottom: 24px;
        }

        @media (max-width: 640px) {
            .chat-widget.expanded {
                width: calc(100vw - 32px);
                height: calc(100vh - 100px);
                right: 16px;
                bottom: 16px;
            }
        }

        .chat-content {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.2s ease;
        }

        .chat-widget.expanded .chat-content {
            opacity: 1;
            visibility: visible;
        }

        .chat-widget.expanded .chat-button-icon {
            opacity: 0;
            visibility: hidden;
        }

        .typing-indicator span {
            animation: typing 1.4s infinite;
        }
        .typing-indicator span:nth-child(2) { animation-delay: 0.2s; }
        .typing-indicator span:nth-child(3) { animation-delay: 0.4s; }

        @keyframes typing {
            0%, 60%, 100% { transform: translateY(0); }
            30% { transform: translateY(-4px); }
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <!-- Header -->
    <header class="bg-white border-b border-gray-200 sticky top-0 z-40">
        <div class="max-w-6xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-gray-800">AIチャットBotデモ</h1>
            <a href="{{ route('projects.index') }}" class="text-sm text-gray-500 hover:text-gray-800 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                料金表に戻る
            </a>
        </div>
    </header>

    <main class="max-w-4xl mx-auto px-4 py-12">
        <!-- Intro -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-2 bg-purple-100 text-purple-700 rounded-full text-sm mb-4">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                </svg>
                AI-Powered
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">24時間対応のAIチャットBot</h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg mb-6">
                よくある質問に自動で回答。お客様をお待たせしません。
            </p>
            <!-- Click instruction highlight -->
            <div class="inline-flex items-center gap-3 px-6 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-full shadow-lg animate-pulse">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"></path>
                </svg>
                <span class="font-medium">右下のチャットアイコンをクリックしてお試しください</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </div>
        </div>

        <!-- Features -->
        <div class="grid md:grid-cols-3 gap-6 mb-16">
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
                <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">24時間対応</h3>
                <p class="text-sm text-gray-600">営業時間外でもお客様の質問に即座に回答。機会損失を防ぎます。</p>
            </div>
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
                <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">FAQ自動回答</h3>
                <p class="text-sm text-gray-600">よくある質問を学習し、的確に回答。スタッフの負担を軽減します。</p>
            </div>
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-200">
                <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-800 mb-2">有人切替</h3>
                <p class="text-sm text-gray-600">複雑な質問は有人対応に切り替え。柔軟なサポートが可能です。</p>
            </div>
        </div>

        <!-- Use Cases -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 mb-16">
            <h3 class="text-xl font-bold text-gray-800 mb-6">こんな質問に自動回答</h3>
            <div class="grid md:grid-cols-2 gap-4">
                <div class="flex items-start gap-3 p-4 bg-gray-50 rounded-xl">
                    <span class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </span>
                    <div>
                        <p class="font-medium text-gray-800">「営業時間を教えてください」</p>
                        <p class="text-sm text-gray-500 mt-1">→ 営業時間・定休日を即座に回答</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 p-4 bg-gray-50 rounded-xl">
                    <span class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </span>
                    <div>
                        <p class="font-medium text-gray-800">「予約はできますか？」</p>
                        <p class="text-sm text-gray-500 mt-1">→ 予約方法・空き状況を案内</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 p-4 bg-gray-50 rounded-xl">
                    <span class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </span>
                    <div>
                        <p class="font-medium text-gray-800">「駐車場はありますか？」</p>
                        <p class="text-sm text-gray-500 mt-1">→ アクセス情報・駐車場の有無を回答</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 p-4 bg-gray-50 rounded-xl">
                    <span class="w-8 h-8 bg-orange-100 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </span>
                    <div>
                        <p class="font-medium text-gray-800">「料金を教えてください」</p>
                        <p class="text-sm text-gray-500 mt-1">→ メニュー・料金表を案内</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Price -->
        <div class="bg-blue-50 border border-blue-200 rounded-2xl p-8 text-center">
            <p class="text-blue-800 font-bold text-2xl mb-2">80万円〜</p>
            <p class="text-blue-600 text-sm mb-4">FAQ設計＋AI学習＋導入サポート込み</p>
            <p class="text-gray-500 text-xs">※提供時期は未定です。お問い合わせください</p>
        </div>
    </main>

    <!-- Floating Chat Widget -->
    <div id="chatWidget" class="chat-widget minimized fixed bg-purple-600 shadow-lg cursor-pointer z-50 flex items-center justify-center hover:bg-purple-700 transition-colors" onclick="toggleChat()">
        <!-- Minimized Icon -->
        <div class="chat-button-icon absolute inset-0 flex items-center justify-center">
            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
            </svg>
        </div>

        <!-- Expanded Content -->
        <div class="chat-content absolute inset-0 flex flex-col bg-white rounded-2xl overflow-hidden">
            <!-- Chat Header -->
            <div class="bg-gradient-to-r from-blue-600 to-purple-600 px-4 py-3 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-white font-medium text-sm">AIアシスタント</p>
                        <p class="text-white/70 text-xs">オンライン</p>
                    </div>
                </div>
                <button onclick="event.stopPropagation(); toggleChat()" class="p-2 hover:bg-white/10 rounded-full">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Chat Messages -->
            <div class="flex-1 p-4 overflow-y-auto bg-gray-50" id="chatMessages">
                <!-- Bot Message -->
                <div class="flex gap-2 mb-4">
                    <div class="w-8 h-8 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <div class="bg-white rounded-2xl rounded-tl-sm px-4 py-2 shadow-sm max-w-[80%]">
                        <p class="text-sm text-gray-800">こんにちは！何かお手伝いできることはありますか？</p>
                    </div>
                </div>

                <!-- Quick Replies -->
                <div class="flex flex-wrap gap-2 mb-4 ml-10">
                    <button onclick="sendQuickReply('営業時間')" class="px-3 py-1.5 bg-white border border-gray-200 rounded-full text-xs text-gray-700 hover:bg-gray-50">営業時間</button>
                    <button onclick="sendQuickReply('予約方法')" class="px-3 py-1.5 bg-white border border-gray-200 rounded-full text-xs text-gray-700 hover:bg-gray-50">予約方法</button>
                    <button onclick="sendQuickReply('アクセス')" class="px-3 py-1.5 bg-white border border-gray-200 rounded-full text-xs text-gray-700 hover:bg-gray-50">アクセス</button>
                </div>
            </div>

            <!-- Chat Input -->
            <div class="p-4 border-t border-gray-200 bg-white">
                <div class="flex gap-2">
                    <input type="text" id="chatInput" placeholder="メッセージを入力..." class="flex-1 px-4 py-2 border border-gray-200 rounded-full text-sm focus:outline-none focus:border-blue-500" onkeypress="if(event.key==='Enter')sendMessage()">
                    <button onclick="sendMessage()" class="w-10 h-10 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center hover:opacity-90">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let isExpanded = false;

        function toggleChat() {
            const widget = document.getElementById('chatWidget');
            isExpanded = !isExpanded;

            if (isExpanded) {
                widget.classList.remove('minimized');
                widget.classList.add('expanded');
            } else {
                widget.classList.remove('expanded');
                widget.classList.add('minimized');
            }
        }

        function sendQuickReply(text) {
            event.stopPropagation();
            addUserMessage(text);
            setTimeout(() => {
                addBotResponse(text);
            }, 1000);
        }

        function sendMessage() {
            event.stopPropagation();
            const input = document.getElementById('chatInput');
            const text = input.value.trim();
            if (!text) return;

            addUserMessage(text);
            input.value = '';

            setTimeout(() => {
                addBotResponse(text);
            }, 1000);
        }

        function addUserMessage(text) {
            const messages = document.getElementById('chatMessages');
            const div = document.createElement('div');
            div.className = 'flex gap-2 mb-4 justify-end';
            div.innerHTML = `
                <div class="bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-2xl rounded-tr-sm px-4 py-2 max-w-[80%]">
                    <p class="text-sm">${text}</p>
                </div>
            `;
            messages.appendChild(div);
            messages.scrollTop = messages.scrollHeight;
        }

        function addBotResponse(query) {
            const messages = document.getElementById('chatMessages');

            // Add typing indicator
            const typing = document.createElement('div');
            typing.id = 'typingIndicator';
            typing.className = 'flex gap-2 mb-4';
            typing.innerHTML = `
                <div class="w-8 h-8 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                    </svg>
                </div>
                <div class="bg-white rounded-2xl rounded-tl-sm px-4 py-2 shadow-sm">
                    <div class="typing-indicator flex gap-1">
                        <span class="w-2 h-2 bg-gray-400 rounded-full"></span>
                        <span class="w-2 h-2 bg-gray-400 rounded-full"></span>
                        <span class="w-2 h-2 bg-gray-400 rounded-full"></span>
                    </div>
                </div>
            `;
            messages.appendChild(typing);
            messages.scrollTop = messages.scrollHeight;

            // Remove typing and add response
            setTimeout(() => {
                typing.remove();

                let response = 'お問い合わせありがとうございます。担当者より改めてご連絡いたします。';

                if (query.includes('営業時間') || query.includes('時間')) {
                    response = '営業時間は10:00〜19:00です。定休日は毎週水曜日となっております。';
                } else if (query.includes('予約') || query.includes('予約方法')) {
                    response = 'ご予約はお電話（03-1234-5678）またはウェブサイトの予約フォームから承っております。';
                } else if (query.includes('アクセス') || query.includes('場所') || query.includes('駐車場')) {
                    response = '最寄り駅は渋谷駅で、徒歩5分の場所にございます。専用駐車場はございませんが、近くにコインパーキングがあります。';
                } else if (query.includes('料金') || query.includes('価格')) {
                    response = '料金はサービス内容により異なります。詳しくは料金ページをご覧いただくか、お気軽にお問い合わせください。';
                }

                const div = document.createElement('div');
                div.className = 'flex gap-2 mb-4';
                div.innerHTML = `
                    <div class="w-8 h-8 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <div class="bg-white rounded-2xl rounded-tl-sm px-4 py-2 shadow-sm max-w-[80%]">
                        <p class="text-sm text-gray-800">${response}</p>
                    </div>
                `;
                messages.appendChild(div);
                messages.scrollTop = messages.scrollHeight;
            }, 1500);
        }
    </script>
</body>
</html>
