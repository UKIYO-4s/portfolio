<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNS動画作成アプリ - デモ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        surface: {
                            base: '#0d0f14',
                            sunken: '#0b0d11',
                            raised: '#11141d',
                            highest: '#161a24',
                        },
                        ink: {
                            primary: '#e7ecf4',
                            secondary: '#9aa3b8',
                            muted: '#6b7387',
                            disabled: '#4b5161',
                        },
                        line: {
                            subtle: '#1d2230',
                            DEFAULT: '#252b3a',
                            bright: '#2f3547',
                        },
                        accent: {
                            blue: '#2aa6ff',
                            cyan: '#3ccfda',
                            magenta: '#c26cff',
                            green: '#3ad7a4',
                            amber: '#f2c14f',
                            red: '#ff7b72',
                        },
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body { font-family: 'Inter', system-ui, sans-serif; }
        .timeline-track { background: linear-gradient(90deg, #1d7fcc 0%, #1d7fcc 30%, #0d0f14 30%, #0d0f14 35%, #2ba88a 35%, #2ba88a 60%, #0d0f14 60%, #0d0f14 65%, #d4952a 65%, #d4952a 90%, #0d0f14 90%); }
    </style>
</head>
<body class="bg-surface-base text-ink-primary min-h-screen">
    <!-- Header -->
    <header class="bg-surface-raised border-b border-line h-12 flex items-center justify-between px-4">
        <div class="flex items-center gap-4">
            <div class="flex items-center gap-2">
                <div class="w-6 h-6 bg-accent-magenta rounded flex items-center justify-center">
                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                    </svg>
                </div>
                <span class="font-semibold">SNS Video Creator</span>
            </div>
            <nav class="flex gap-1 ml-8">
                <button class="px-3 py-1.5 text-sm text-ink-secondary hover:text-ink-primary hover:bg-surface-highest rounded transition">ファイル</button>
                <button class="px-3 py-1.5 text-sm text-ink-secondary hover:text-ink-primary hover:bg-surface-highest rounded transition">編集</button>
                <button class="px-3 py-1.5 text-sm text-ink-secondary hover:text-ink-primary hover:bg-surface-highest rounded transition">表示</button>
                <button class="px-3 py-1.5 text-sm text-ink-secondary hover:text-ink-primary hover:bg-surface-highest rounded transition">エクスポート</button>
            </nav>
        </div>
        <div class="flex items-center gap-3">
            <span class="text-xs text-ink-muted">新規プロジェクト.snsvideo</span>
            <a href="{{ route('projects.index') }}" class="px-3 py-1.5 text-sm bg-surface-highest hover:bg-line-bright rounded transition">
                ← 戻る
            </a>
        </div>
    </header>

    <div class="flex h-[calc(100vh-48px)]">
        <!-- Left Panel - Assets -->
        <div class="w-64 bg-surface-sunken border-r border-line flex flex-col">
            <div class="p-3 border-b border-line">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-sm font-medium">素材</span>
                    <button class="p-1 hover:bg-surface-highest rounded">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                    </button>
                </div>
                <input type="text" placeholder="素材を検索..." class="w-full bg-surface-base border border-line rounded px-3 py-1.5 text-sm placeholder-ink-muted focus:border-accent-blue focus:outline-none">
            </div>
            <div class="flex-1 overflow-y-auto p-2">
                <div class="mb-4">
                    <div class="text-xs text-ink-muted uppercase tracking-wider mb-2 px-2">動画</div>
                    <div class="grid grid-cols-2 gap-2">
                        <div class="aspect-video bg-surface-raised rounded border border-line hover:border-accent-blue cursor-pointer transition overflow-hidden">
                            <div class="w-full h-full bg-gradient-to-br from-accent-blue/20 to-accent-cyan/20 flex items-center justify-center">
                                <svg class="w-6 h-6 text-ink-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/></svg>
                            </div>
                        </div>
                        <div class="aspect-video bg-surface-raised rounded border border-line hover:border-accent-blue cursor-pointer transition overflow-hidden">
                            <div class="w-full h-full bg-gradient-to-br from-accent-magenta/20 to-accent-red/20 flex items-center justify-center">
                                <svg class="w-6 h-6 text-ink-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="text-xs text-ink-muted uppercase tracking-wider mb-2 px-2">画像</div>
                    <div class="grid grid-cols-2 gap-2">
                        <div class="aspect-square bg-surface-raised rounded border border-line hover:border-accent-green cursor-pointer transition"></div>
                        <div class="aspect-square bg-surface-raised rounded border border-line hover:border-accent-green cursor-pointer transition"></div>
                        <div class="aspect-square bg-surface-raised rounded border border-line hover:border-accent-green cursor-pointer transition"></div>
                    </div>
                </div>
                <div>
                    <div class="text-xs text-ink-muted uppercase tracking-wider mb-2 px-2">BGM</div>
                    <div class="space-y-1">
                        <div class="flex items-center gap-2 p-2 bg-surface-raised rounded border border-line hover:border-accent-amber cursor-pointer transition">
                            <svg class="w-4 h-4 text-accent-amber" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
                            <span class="text-xs truncate">Upbeat_Energy.mp3</span>
                        </div>
                        <div class="flex items-center gap-2 p-2 bg-surface-raised rounded border border-line hover:border-accent-amber cursor-pointer transition">
                            <svg class="w-4 h-4 text-accent-amber" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
                            <span class="text-xs truncate">Chill_Lofi.mp3</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Center - Preview & Timeline -->
        <div class="flex-1 flex flex-col">
            <!-- Preview -->
            <div class="flex-1 bg-surface-base flex items-center justify-center p-4">
                <div class="relative" style="aspect-ratio: 9/16; height: 100%; max-height: 500px;">
                    <div class="w-full h-full bg-surface-sunken rounded-lg border border-line overflow-hidden flex flex-col">
                        <!-- Phone mockup content -->
                        <div class="flex-1 bg-gradient-to-b from-accent-blue/10 to-accent-magenta/10 flex items-center justify-center relative">
                            <div class="text-center">
                                <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-surface-highest flex items-center justify-center">
                                    <svg class="w-8 h-8 text-ink-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <p class="text-ink-muted text-sm">9:16 プレビュー</p>
                            </div>
                            <!-- Overlay text demo -->
                            <div class="absolute bottom-20 left-4 right-4">
                                <div class="bg-black/60 backdrop-blur-sm rounded-lg p-3">
                                    <p class="text-white font-bold text-lg">サンプルテキスト</p>
                                    <p class="text-white/80 text-sm">ここにキャプションが入ります</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Platform badges -->
                    <div class="absolute -right-2 top-4 flex flex-col gap-2">
                        <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-500 rounded-lg flex items-center justify-center" title="Instagram Reels">
                            <span class="text-white text-xs font-bold">IG</span>
                        </div>
                        <div class="w-8 h-8 bg-red-600 rounded-lg flex items-center justify-center" title="YouTube Shorts">
                            <span class="text-white text-xs font-bold">YT</span>
                        </div>
                        <div class="w-8 h-8 bg-black rounded-lg flex items-center justify-center border border-line" title="TikTok">
                            <span class="text-white text-xs font-bold">TT</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Playback Controls -->
            <div class="h-12 bg-surface-raised border-t border-b border-line flex items-center justify-center gap-4">
                <button class="p-2 hover:bg-surface-highest rounded transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7"/></svg>
                </button>
                <button class="w-10 h-10 bg-accent-blue hover:bg-accent-blue/80 rounded-full flex items-center justify-center transition">
                    <svg class="w-5 h-5 text-white ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                </button>
                <button class="p-2 hover:bg-surface-highest rounded transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"/></svg>
                </button>
                <div class="ml-4 text-sm font-mono text-ink-secondary">
                    <span class="text-ink-primary">00:05</span> / 00:15
                </div>
            </div>

            <!-- Timeline -->
            <div class="h-48 bg-surface-sunken">
                <div class="h-6 bg-surface-raised border-b border-line flex items-center px-2">
                    <div class="flex items-center gap-4 text-xs text-ink-muted">
                        <span>0:00</span>
                        <span>0:05</span>
                        <span>0:10</span>
                        <span>0:15</span>
                    </div>
                </div>
                <div class="p-2 space-y-1">
                    <!-- Video Track -->
                    <div class="flex items-center gap-2">
                        <div class="w-16 text-xs text-ink-muted truncate">動画</div>
                        <div class="flex-1 h-10 bg-surface-base rounded relative overflow-hidden">
                            <div class="absolute left-0 top-0 bottom-0 w-3/4 bg-[#1d7fcc]/80 rounded flex items-center px-2">
                                <span class="text-xs text-white truncate">clip_01.mp4</span>
                            </div>
                        </div>
                    </div>
                    <!-- Image Track -->
                    <div class="flex items-center gap-2">
                        <div class="w-16 text-xs text-ink-muted truncate">画像</div>
                        <div class="flex-1 h-10 bg-surface-base rounded relative overflow-hidden">
                            <div class="absolute left-1/4 top-0 bottom-0 w-1/3 bg-[#2ba88a]/80 rounded flex items-center px-2">
                                <span class="text-xs text-white truncate">overlay.png</span>
                            </div>
                        </div>
                    </div>
                    <!-- Text Track -->
                    <div class="flex items-center gap-2">
                        <div class="w-16 text-xs text-ink-muted truncate">テキスト</div>
                        <div class="flex-1 h-10 bg-surface-base rounded relative overflow-hidden">
                            <div class="absolute left-1/5 top-0 bottom-0 w-2/5 bg-[#d4952a]/80 rounded flex items-center px-2">
                                <span class="text-xs text-white truncate">サンプルテキスト</span>
                            </div>
                        </div>
                    </div>
                    <!-- Audio Track -->
                    <div class="flex items-center gap-2">
                        <div class="w-16 text-xs text-ink-muted truncate">BGM</div>
                        <div class="flex-1 h-10 bg-surface-base rounded relative overflow-hidden">
                            <div class="absolute left-0 top-0 bottom-0 w-full bg-[#3d5fb8]/80 rounded flex items-center px-2">
                                <span class="text-xs text-white truncate">Upbeat_Energy.mp3</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Panel - Properties -->
        <div class="w-72 bg-surface-sunken border-l border-line">
            <div class="p-3 border-b border-line">
                <span class="text-sm font-medium">プロパティ</span>
            </div>
            <div class="p-3 space-y-4">
                <div>
                    <label class="text-xs text-ink-muted block mb-1">出力形式</label>
                    <select class="w-full bg-surface-base border border-line rounded px-3 py-2 text-sm focus:border-accent-blue focus:outline-none">
                        <option>Instagram Reels (9:16)</option>
                        <option>YouTube Shorts (9:16)</option>
                        <option>TikTok (9:16)</option>
                        <option>横動画 (16:9)</option>
                    </select>
                </div>
                <div>
                    <label class="text-xs text-ink-muted block mb-1">解像度</label>
                    <select class="w-full bg-surface-base border border-line rounded px-3 py-2 text-sm focus:border-accent-blue focus:outline-none">
                        <option>1080 x 1920 (Full HD)</option>
                        <option>720 x 1280 (HD)</option>
                    </select>
                </div>
                <div>
                    <label class="text-xs text-ink-muted block mb-1">フレームレート</label>
                    <select class="w-full bg-surface-base border border-line rounded px-3 py-2 text-sm focus:border-accent-blue focus:outline-none">
                        <option>30 fps</option>
                        <option>60 fps</option>
                    </select>
                </div>
                <div class="pt-4 border-t border-line">
                    <label class="text-xs text-ink-muted block mb-2">テンプレート</label>
                    <div class="grid grid-cols-2 gap-2">
                        <div class="aspect-[9/16] bg-gradient-to-b from-accent-blue/20 to-accent-cyan/20 rounded border border-line hover:border-accent-blue cursor-pointer transition"></div>
                        <div class="aspect-[9/16] bg-gradient-to-b from-accent-magenta/20 to-accent-red/20 rounded border border-line hover:border-accent-blue cursor-pointer transition"></div>
                        <div class="aspect-[9/16] bg-gradient-to-b from-accent-green/20 to-accent-amber/20 rounded border border-line hover:border-accent-blue cursor-pointer transition"></div>
                        <div class="aspect-[9/16] bg-gradient-to-b from-accent-amber/20 to-accent-red/20 rounded border border-line hover:border-accent-blue cursor-pointer transition"></div>
                    </div>
                </div>
                <div class="pt-4">
                    <button class="w-full py-3 bg-accent-magenta hover:bg-accent-magenta/80 text-white rounded font-medium transition">
                        エクスポート
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
