@extends('demo.sns-tool.layouts.app')

@section('page-title', 'ダッシュボード')

@section('content')
<!-- Welcome Message -->
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-2">おかえりなさい!</h1>
    <p class="text-gray-600">今日のSNSパフォーマンスをチェックしましょう。</p>
</div>

<!-- Tool Cards (Hero Section) -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <!-- Feed Tool Card -->
    <a href="{{ route('demo.sns-tool.feed') }}" class="group bg-gradient-to-br from-purple-50 to-purple-100 rounded-xl border border-purple-200 p-6 hover:shadow-lg transition">
        <div class="flex items-start gap-4">
            <div class="w-14 h-14 bg-purple-600 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/></svg>
            </div>
            <div class="flex-1">
                <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-purple-700 transition">フィード用ツール</h3>
                <p class="text-gray-600 text-sm mb-3">フィード投稿の予約、推奨投稿時間の確認、ハッシュタグ提案など</p>
                <div class="flex items-center text-purple-600 font-medium text-sm">
                    <span>ツールを開く</span>
                    <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </div>
            </div>
        </div>
    </a>

    <!-- Reels Tool Card -->
    <a href="{{ route('demo.sns-tool.reels') }}" class="group bg-gradient-to-br from-orange-50 to-orange-100 rounded-xl border border-orange-200 p-6 hover:shadow-lg transition">
        <div class="flex items-start gap-4">
            <div class="w-14 h-14 bg-orange-500 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:scale-110 transition">
                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
            </div>
            <div class="flex-1">
                <h3 class="text-xl font-bold text-gray-800 mb-2 group-hover:text-orange-600 transition">リール用ツール</h3>
                <p class="text-gray-600 text-sm mb-3">縦動画テンプレート、クリップ分割、BGM同期、字幕自動生成など</p>
                <div class="flex items-center text-orange-500 font-medium text-sm">
                    <span>ツールを開く</span>
                    <svg class="w-4 h-4 ml-1 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </div>
            </div>
        </div>
    </a>
</div>

<!-- 統計カード -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Likes -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 font-medium">いいね数</p>
                <p class="text-3xl font-bold text-gray-800 mt-2 tabular-nums">{{ number_format($stats['total_likes']) }}</p>
                <p class="text-sm text-green-600 mt-2 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                    <span class="tabular-nums">12.5%</span> 先月比
                </p>
            </div>
            <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
            </div>
        </div>
    </div>

    <!-- Total Comments -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 font-medium">コメント数</p>
                <p class="text-3xl font-bold text-gray-800 mt-2 tabular-nums">{{ number_format($stats['total_comments']) }}</p>
                <p class="text-sm text-green-600 mt-2 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                    <span class="tabular-nums">8.3%</span> 先月比
                </p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
            </div>
        </div>
    </div>

    <!-- Total Reach -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 font-medium">リーチ数</p>
                <p class="text-3xl font-bold text-gray-800 mt-2 tabular-nums">{{ number_format($stats['total_reach']) }}</p>
                <p class="text-sm text-green-600 mt-2 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                    <span class="tabular-nums">15.7%</span> 先月比
                </p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            </div>
        </div>
    </div>

    <!-- Engagement Rate -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 font-medium">エンゲージメント率</p>
                <p class="text-3xl font-bold text-gray-800 mt-2 tabular-nums">{{ $stats['engagement_rate'] }}%</p>
                <p class="text-sm text-green-600 mt-2 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                    <span class="tabular-nums">5.2%</span> 先月比
                </p>
            </div>
            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            </div>
        </div>
    </div>
</div>

<!-- Recent Posts & Quick Actions -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
    <!-- Recent Posts -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-bold text-gray-800">最近の投稿</h3>
                <a href="{{ route('demo.sns-tool.posts') }}" class="text-sm text-purple-600 hover:text-purple-800 font-medium">
                    すべて見る
                </a>
            </div>
            <div class="space-y-4">
                @foreach($recentPosts as $post)
                <div class="flex items-start gap-4 p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                    <div class="w-20 h-20 bg-gradient-to-br from-purple-100 to-pink-100 rounded-lg flex items-center justify-center flex-shrink-0">
                        <span class="text-gray-400 text-xs">Image</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="px-2 py-1 text-xs rounded-full {{ $post['platform'] == 'Instagram' ? 'bg-purple-100 text-purple-600' : 'bg-blue-100 text-blue-600' }}">
                                {{ $post['platform'] }}
                            </span>
                            <span class="px-2 py-1 text-xs rounded-full {{ $post['status'] == 'Published' ? 'bg-green-100 text-green-600' : ($post['status'] == 'Scheduled' ? 'bg-orange-100 text-orange-600' : 'bg-gray-100 text-gray-600') }}">
                                {{ $post['status'] == 'Published' ? '公開済み' : ($post['status'] == 'Scheduled' ? '予約済み' : '下書き') }}
                            </span>
                        </div>
                        <p class="font-semibold text-gray-800 mb-1 truncate">{{ $post['title'] }}</p>
                        <p class="text-sm text-gray-600 mb-2 truncate">{{ $post['content'] }}</p>
                        <div class="flex items-center gap-4 text-sm text-gray-500">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                {{ $post['scheduled_at'] }}
                            </span>
                            @if($post['status'] == 'Published')
                            <span class="flex items-center tabular-nums">
                                <svg class="w-4 h-4 mr-1 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                                {{ $post['likes'] }}
                            </span>
                            <span class="flex items-center tabular-nums">
                                <svg class="w-4 h-4 mr-1 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                                {{ $post['comments'] }}
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="lg:col-span-1">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">クイックアクション</h3>
            <div class="space-y-3">
                <a href="{{ route('demo.sns-tool.posts.create') }}" class="flex items-center justify-center w-full px-4 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition font-semibold">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    新規投稿
                </a>
                <a href="{{ route('demo.sns-tool.templates') }}" class="flex items-center justify-center w-full px-4 py-3 bg-white border-2 border-purple-500 text-purple-600 rounded-lg hover:bg-purple-50 transition font-semibold">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                    テンプレートを使う
                </a>
                <a href="{{ route('demo.sns-tool.schedule') }}" class="flex items-center justify-center w-full px-4 py-3 bg-white border-2 border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition font-semibold">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    カレンダーを見る
                </a>
                <a href="{{ route('demo.sns-tool.analytics') }}" class="flex items-center justify-center w-full px-4 py-3 bg-white border-2 border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition font-semibold">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                    分析を見る
                </a>
            </div>
        </div>

        <!-- Upcoming Schedule -->
        <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl border border-purple-200 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">今週の予定</h3>
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center font-bold text-purple-600 shadow-sm tabular-nums">
                        26
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-gray-800">2件の投稿予定</p>
                        <p class="text-xs text-gray-600">火曜日</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center font-bold text-purple-600 shadow-sm tabular-nums">
                        27
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-gray-800">3件の投稿予定</p>
                        <p class="text-xs text-gray-600">水曜日</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center font-bold text-purple-600 shadow-sm tabular-nums">
                        29
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-gray-800">2件の投稿予定</p>
                        <p class="text-xs text-gray-600">金曜日</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
