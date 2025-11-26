@extends('demo.sns-tool.layouts.app')

@section('page-title', 'フィード最適化')

@section('content')
<!-- Header -->
<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 gap-4">
    <div>
        <h1 class="text-3xl font-bold text-gray-800 mb-2">フィード最適化</h1>
        <p class="text-gray-600">投稿スケジュールとパフォーマンスを最適化</p>
    </div>
    <a href="{{ route('demo.sns-tool.posts.create') }}" class="flex items-center px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition font-semibold">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        新規投稿作成
    </a>
</div>

<!-- Metrics Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"/></svg>
            </div>
            <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full">+8.3%</span>
        </div>
        <p class="text-sm text-gray-500 mb-1">クリック率</p>
        <p class="text-2xl font-bold text-gray-800 tabular-nums">{{ $metrics['click_rate'] }}%</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-orange-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/></svg>
            </div>
            <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full">+12.5%</span>
        </div>
        <p class="text-sm text-gray-500 mb-1">保存数</p>
        <p class="text-2xl font-bold text-gray-800 tabular-nums">{{ number_format($metrics['saves']) }}</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
            </div>
            <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full">+15.7%</span>
        </div>
        <p class="text-sm text-gray-500 mb-1">リーチ数</p>
        <p class="text-2xl font-bold text-gray-800 tabular-nums">{{ number_format($metrics['reach']) }}</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-4">
            <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            </div>
            <span class="text-xs font-medium text-green-600 bg-green-50 px-2 py-1 rounded-full">+5.2%</span>
        </div>
        <p class="text-sm text-gray-500 mb-1">インプレッション</p>
        <p class="text-2xl font-bold text-gray-800 tabular-nums">{{ number_format($metrics['impressions']) }}</p>
    </div>
</div>

<!-- Main Content Grid -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Scheduled Posts -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-lg font-bold text-gray-800 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    フィード予約
                </h2>
                <a href="{{ route('demo.sns-tool.schedule') }}" class="text-sm text-purple-600 hover:text-purple-700 font-medium">
                    すべて見る
                </a>
            </div>

            <div class="space-y-4">
                @foreach($scheduledPosts as $post)
                <div class="flex items-center gap-4 p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                    <div class="w-12 h-12 {{ $post['platform'] == 'Instagram' ? 'bg-purple-100' : 'bg-blue-100' }} rounded-lg flex items-center justify-center flex-shrink-0">
                        @if($post['platform'] == 'Instagram')
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" stroke-width="1.5"/><circle cx="12" cy="12" r="4" stroke-width="1.5"/><circle cx="18" cy="6" r="1.5" fill="currentColor"/></svg>
                        @else
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-semibold text-gray-800 truncate">{{ $post['title'] }}</p>
                        <p class="text-sm text-gray-500 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            {{ $post['scheduled_at'] }}
                        </p>
                    </div>
                    <span class="px-3 py-1 text-xs font-medium rounded-full {{ $post['platform'] == 'Instagram' ? 'bg-purple-100 text-purple-600' : 'bg-blue-100 text-blue-600' }}">
                        {{ $post['platform'] }}
                    </span>
                    <button onclick="alert('投稿を編集 (デモ)')" class="p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    </button>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Right Sidebar -->
    <div class="space-y-6">
        <!-- Recommended Times -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                推奨投稿時間
            </h2>
            <p class="text-sm text-gray-500 mb-4">フォロワーのアクティブ時間に基づく</p>
            <div class="space-y-3">
                @foreach(array_slice($recommendedTimes, 0, 4) as $day)
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-gray-700">{{ $day['day'] }}</span>
                    <div class="flex gap-1">
                        @foreach($day['times'] as $time)
                            <span class="px-2 py-1 text-xs bg-purple-50 text-purple-600 rounded font-medium tabular-nums">{{ $time }}</span>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
            <button onclick="alert('すべての推奨時間を表示 (デモ)')" class="w-full mt-4 px-4 py-2 text-sm text-purple-600 border border-purple-200 rounded-lg hover:bg-purple-50 transition font-medium">
                すべて表示
            </button>
        </div>

        <!-- Hashtag Suggestions -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/></svg>
                ハッシュタグ提案
            </h2>
            <p class="text-sm text-gray-500 mb-4">トレンドと関連性に基づく提案</p>
            <div class="flex flex-wrap gap-2">
                @foreach($suggestedHashtags as $hashtag)
                <button onclick="alert('ハッシュタグをコピー: {{ $hashtag['tag'] }} (デモ)')" class="group px-3 py-2 bg-gray-50 hover:bg-purple-50 border border-gray-200 hover:border-purple-200 rounded-lg transition">
                    <span class="text-sm font-medium text-gray-700 group-hover:text-purple-600">{{ $hashtag['tag'] }}</span>
                    <span class="text-xs text-gray-400 ml-1 tabular-nums">{{ $hashtag['posts'] }}</span>
                </button>
                @endforeach
            </div>
            <button onclick="alert('ハッシュタグを分析 (デモ)')" class="w-full mt-4 px-4 py-2 text-sm text-purple-600 border border-purple-200 rounded-lg hover:bg-purple-50 transition font-medium">
                もっと見る
            </button>
        </div>
    </div>
</div>

<!-- Platform Selection -->
<div class="mt-8 bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <h2 class="text-lg font-bold text-gray-800 mb-4">配信先プラットフォーム</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="flex items-center gap-4 p-4 border-2 border-purple-200 bg-purple-50 rounded-xl">
            <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center shadow-sm">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" stroke-width="1.5"/><circle cx="12" cy="12" r="4" stroke-width="1.5"/><circle cx="18" cy="6" r="1.5" fill="currentColor"/></svg>
            </div>
            <div class="flex-1">
                <p class="font-semibold text-gray-800">Instagram</p>
                <p class="text-sm text-gray-500">フィード・ストーリーズ・リール</p>
            </div>
            <div class="w-5 h-5 bg-purple-600 rounded-full flex items-center justify-center">
                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
            </div>
        </div>

        <div class="flex items-center gap-4 p-4 border-2 border-blue-200 bg-blue-50 rounded-xl">
            <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center shadow-sm">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
            </div>
            <div class="flex-1">
                <p class="font-semibold text-gray-800">Googleビジネスプロフィール</p>
                <p class="text-sm text-gray-500">投稿・イベント・特典</p>
            </div>
            <div class="w-5 h-5 bg-blue-600 rounded-full flex items-center justify-center">
                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
            </div>
        </div>
    </div>
</div>

<!-- Tips -->
<div class="mt-8 bg-gradient-to-r from-purple-50 to-orange-50 rounded-xl border border-purple-200 p-6">
    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
        <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
        フィード最適化のコツ
    </h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <span class="text-sm font-bold text-purple-600 tabular-nums">1</span>
            </div>
            <div>
                <p class="font-semibold text-gray-800 mb-1">一貫性を保つ</p>
                <p class="text-sm text-gray-600">定期的な投稿でフォロワーとのつながりを維持</p>
            </div>
        </div>
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <span class="text-sm font-bold text-purple-600 tabular-nums">2</span>
            </div>
            <div>
                <p class="font-semibold text-gray-800 mb-1">最適な時間に投稿</p>
                <p class="text-sm text-gray-600">推奨時間を参考にエンゲージメントを最大化</p>
            </div>
        </div>
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <span class="text-sm font-bold text-purple-600 tabular-nums">3</span>
            </div>
            <div>
                <p class="font-semibold text-gray-800 mb-1">ハッシュタグを活用</p>
                <p class="text-sm text-gray-600">関連性の高いハッシュタグで発見されやすく</p>
            </div>
        </div>
    </div>
</div>
@endsection
