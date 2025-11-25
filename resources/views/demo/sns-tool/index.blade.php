@extends('demo.sns-tool.layouts.app')

@section('page-title', 'Dashboard')

@section('content')
<!-- Welcome Message -->
<div class="mb-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-2">Welcome back! 👋</h1>
    <p class="text-gray-600">Here's what's happening with your social media today.</p>
</div>

<!-- 統計カード -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total Likes -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition hover-lift">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 font-medium">Total Likes</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ number_format($stats['total_likes']) }}</p>
                <p class="text-sm text-green-600 mt-2 flex items-center">
                    <span class="mr-1">↑</span> 12.5% from last month
                </p>
            </div>
            <div class="text-5xl">❤️</div>
        </div>
    </div>

    <!-- Total Comments -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition hover-lift">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 font-medium">Total Comments</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ number_format($stats['total_comments']) }}</p>
                <p class="text-sm text-green-600 mt-2 flex items-center">
                    <span class="mr-1">↑</span> 8.3% from last month
                </p>
            </div>
            <div class="text-5xl">💬</div>
        </div>
    </div>

    <!-- Total Reach -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition hover-lift">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 font-medium">Total Reach</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ number_format($stats['total_reach']) }}</p>
                <p class="text-sm text-green-600 mt-2 flex items-center">
                    <span class="mr-1">↑</span> 15.7% from last month
                </p>
            </div>
            <div class="text-5xl">👥</div>
        </div>
    </div>

    <!-- Engagement Rate -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 hover:shadow-md transition hover-lift">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-600 font-medium">Engagement Rate</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['engagement_rate'] }}%</p>
                <p class="text-sm text-green-600 mt-2 flex items-center">
                    <span class="mr-1">↑</span> 5.2% from last month
                </p>
            </div>
            <div class="text-5xl">📊</div>
        </div>
    </div>
</div>

<!-- Recent Posts & Quick Actions -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
    <!-- Recent Posts -->
    <div class="lg:col-span-2">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-bold text-gray-800">Recent Posts</h3>
                <a href="{{ route('demo.sns-tool.posts') }}" class="text-sm text-purple-600 hover:text-purple-800 font-medium">
                    View All →
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
                                {{ $post['status'] }}
                            </span>
                        </div>
                        <p class="font-semibold text-gray-800 mb-1 truncate">{{ $post['title'] }}</p>
                        <p class="text-sm text-gray-600 mb-2 truncate">{{ $post['content'] }}</p>
                        <div class="flex items-center gap-4 text-sm text-gray-500">
                            <span>📅 {{ $post['scheduled_at'] }}</span>
                            @if($post['status'] == 'Published')
                            <span>❤️ {{ $post['likes'] }}</span>
                            <span>💬 {{ $post['comments'] }}</span>
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
            <h3 class="text-lg font-bold text-gray-800 mb-4">Quick Actions</h3>
            <div class="space-y-3">
                <a href="{{ route('demo.sns-tool.posts.create') }}" class="block w-full px-4 py-3 bg-gradient-to-r from-purple-500 via-pink-500 to-orange-400 text-white rounded-lg shadow-md hover:shadow-lg transition text-center font-semibold">
                    + New Post
                </a>
                <a href="{{ route('demo.sns-tool.templates') }}" class="block w-full px-4 py-3 bg-white border-2 border-purple-500 text-purple-600 rounded-lg hover:bg-purple-50 transition text-center font-semibold">
                    📋 Use Template
                </a>
                <a href="{{ route('demo.sns-tool.schedule') }}" class="block w-full px-4 py-3 bg-white border-2 border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition text-center font-semibold">
                    📅 View Calendar
                </a>
                <a href="{{ route('demo.sns-tool.analytics') }}" class="block w-full px-4 py-3 bg-white border-2 border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition text-center font-semibold">
                    📈 View Analytics
                </a>
            </div>
        </div>

        <!-- Upcoming Schedule -->
        <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl border border-purple-200 p-6">
            <h3 class="text-lg font-bold text-gray-800 mb-4">This Week</h3>
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center font-bold text-purple-600 shadow-sm">
                        26
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-gray-800">2 posts scheduled</p>
                        <p class="text-xs text-gray-600">Tuesday</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center font-bold text-purple-600 shadow-sm">
                        27
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-gray-800">3 posts scheduled</p>
                        <p class="text-xs text-gray-600">Wednesday</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center font-bold text-purple-600 shadow-sm">
                        29
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-semibold text-gray-800">2 posts scheduled</p>
                        <p class="text-xs text-gray-600">Friday</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
