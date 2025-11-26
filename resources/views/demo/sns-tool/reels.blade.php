@extends('demo.sns-tool.layouts.app')

@section('page-title', 'リール最適化')

@section('content')
<!-- Header -->
<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 gap-4">
    <div>
        <h1 class="text-3xl font-bold text-gray-800 mb-2">リール/ショート最適化</h1>
        <p class="text-gray-600">縦動画コンテンツのパフォーマンスを最大化</p>
    </div>
    <button onclick="alert('新規リール作成 (デモ)')" class="flex items-center px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition font-semibold">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        新規リール作成
    </button>
</div>

<!-- Metrics Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
            </div>
            <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full">+18.5%</span>
        </div>
        <p class="text-sm text-gray-500 mb-1">総再生回数</p>
        <p class="text-2xl font-bold text-gray-800 tabular-nums">{{ number_format($metrics['total_views']) }}</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full">+5.3%</span>
        </div>
        <p class="text-sm text-gray-500 mb-1">平均完了率</p>
        <p class="text-2xl font-bold text-gray-800 tabular-nums">{{ $metrics['avg_completion_rate'] }}%</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
            </div>
            <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full">+32</span>
        </div>
        <p class="text-sm text-gray-500 mb-1">獲得フォロワー</p>
        <p class="text-2xl font-bold text-gray-800 tabular-nums">{{ number_format($metrics['total_follows']) }}</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"/></svg>
            </div>
            <span class="text-xs font-medium text-purple-600 bg-purple-50 px-2 py-1 rounded-full">今月</span>
        </div>
        <p class="text-sm text-gray-500 mb-1">公開リール数</p>
        <p class="text-2xl font-bold text-gray-800 tabular-nums">{{ $metrics['total_reels'] }}</p>
    </div>
</div>

<!-- Main Content -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Recent Reels -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-bold text-gray-800 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                    最近のリール
                </h2>
                <button onclick="alert('すべてのリールを表示 (デモ)')" class="text-sm text-purple-600 hover:text-purple-700 font-medium">
                    すべて見る
                </button>
            </div>

            <div class="space-y-4">
                @foreach($recentReels as $reel)
                <div class="flex items-center gap-4 p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                    <div class="w-16 h-24 bg-gray-200 rounded-lg flex items-center justify-center flex-shrink-0 relative overflow-hidden">
                        <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        <span class="absolute bottom-1 right-1 text-xs bg-black/70 text-white px-1.5 py-0.5 rounded font-medium tabular-nums">{{ $reel['duration'] }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="px-2 py-1 text-xs rounded-full font-medium {{ $reel['platform'] == 'Instagram' ? 'bg-purple-100 text-purple-600' : 'bg-red-100 text-red-600' }}">
                                {{ $reel['platform'] }}
                            </span>
                            <span class="text-xs text-gray-400">{{ $reel['created_at'] }}</span>
                        </div>
                        <p class="font-semibold text-gray-800 mb-2 truncate">{{ $reel['title'] }}</p>
                        <div class="flex items-center gap-4 text-sm text-gray-500">
                            <span class="flex items-center tabular-nums">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                {{ number_format($reel['views']) }}
                            </span>
                            <span class="flex items-center tabular-nums">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                {{ $reel['completion_rate'] }}%
                            </span>
                            <span class="flex items-center tabular-nums">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
                                +{{ $reel['follows_gained'] }}
                            </span>
                        </div>
                    </div>
                    <button onclick="alert('リールを編集 (デモ)')" class="p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/></svg>
                    </button>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Right Sidebar -->
    <div class="space-y-6">
        <!-- Trending Audio -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
                トレンド音源
            </h2>
            <p class="text-sm text-gray-500 mb-4">今週の人気BGM</p>
            <div class="space-y-3">
                @foreach($trendingAudio as $audio)
                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition cursor-pointer">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/></svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-800">{{ $audio['name'] }}</p>
                            <p class="text-xs text-gray-400 tabular-nums">{{ $audio['uses'] }} 使用</p>
                        </div>
                    </div>
                    <button onclick="alert('音源を使用 (デモ)')" class="p-2 text-purple-600 hover:bg-purple-50 rounded-lg transition">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    </button>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4">クイックアクション</h2>
            <div class="space-y-3">
                <button onclick="alert('クリップ分割ツール (デモ)')" class="w-full flex items-center gap-3 p-3 bg-purple-50 text-purple-700 rounded-lg hover:bg-purple-100 transition text-left">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758a3 3 0 10-4.243 4.243 3 3 0 004.243-4.243zm0-5.758a3 3 0 10-4.243-4.243 3 3 0 004.243 4.243z"/></svg>
                    <span class="font-medium">クリップ分割</span>
                </button>
                <button onclick="alert('BGM同期ツール (デモ)')" class="w-full flex items-center gap-3 p-3 bg-orange-50 text-orange-700 rounded-lg hover:bg-orange-100 transition text-left">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/></svg>
                    <span class="font-medium">BGM同期</span>
                </button>
                <button onclick="alert('字幕自動生成 (デモ)')" class="w-full flex items-center gap-3 p-3 bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition text-left">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/></svg>
                    <span class="font-medium">字幕自動生成</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Video Templates -->
<div class="mt-8 bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-lg font-bold text-gray-800 flex items-center">
            <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
            縦動画テンプレート
        </h2>
        <button onclick="alert('すべてのテンプレートを表示 (デモ)')" class="text-sm text-purple-600 hover:text-purple-700 font-medium">
            すべて見る
        </button>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach($templates as $template)
        <div class="group border border-gray-200 rounded-xl p-4 hover:border-purple-300 hover:shadow-md transition cursor-pointer" onclick="alert('テンプレートを使用: {{ $template['name'] }} (デモ)')">
            <div class="w-full h-32 bg-gradient-to-br from-purple-100 to-orange-50 rounded-lg mb-3 flex items-center justify-center">
                <svg class="w-10 h-10 text-purple-300 group-hover:text-purple-400 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z"/></svg>
            </div>
            <h3 class="font-semibold text-gray-800 mb-1 truncate">{{ $template['name'] }}</h3>
            <div class="flex items-center justify-between text-sm">
                <span class="text-gray-500">{{ $template['duration'] }}</span>
                <span class="px-2 py-0.5 bg-gray-100 text-gray-600 rounded text-xs font-medium">{{ $template['style'] }}</span>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Tips -->
<div class="mt-8 bg-gradient-to-r from-purple-50 to-orange-50 rounded-xl border border-purple-200 p-6">
    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
        <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
        リール作成のコツ
    </h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <span class="text-sm font-bold text-purple-600 tabular-nums">1</span>
            </div>
            <div>
                <p class="font-semibold text-gray-800 mb-1">最初の3秒が勝負</p>
                <p class="text-sm text-gray-600">視聴者の注目を引く強力なフックを用意</p>
            </div>
        </div>
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <span class="text-sm font-bold text-purple-600 tabular-nums">2</span>
            </div>
            <div>
                <p class="font-semibold text-gray-800 mb-1">トレンド音源を活用</p>
                <p class="text-sm text-gray-600">人気のBGMでリーチを最大化</p>
            </div>
        </div>
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <span class="text-sm font-bold text-purple-600 tabular-nums">3</span>
            </div>
            <div>
                <p class="font-semibold text-gray-800 mb-1">字幕を追加</p>
                <p class="text-sm text-gray-600">音声なしでも内容が伝わるように</p>
            </div>
        </div>
    </div>
</div>
@endsection
