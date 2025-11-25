@extends('demo.sns-tool.layouts.app')

@section('page-title', 'Posts')

@section('content')
<!-- Header -->
<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 gap-4">
    <div>
        <h1 class="text-3xl font-bold text-gray-800 mb-2">All Posts</h1>
        <p class="text-gray-600">Manage your social media posts across platforms</p>
    </div>
    <a href="{{ route('demo.sns-tool.posts.create') }}" class="px-6 py-3 bg-gradient-to-r from-purple-500 via-pink-500 to-orange-400 text-white rounded-lg shadow-md hover:shadow-lg transition font-semibold">
        + Create New Post
    </a>
</div>

<!-- Filters -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
    <div class="flex flex-wrap gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Platform</label>
            <div class="flex gap-2">
                <button class="px-4 py-2 bg-purple-100 text-purple-600 rounded-lg font-medium hover:bg-purple-200 transition">
                    All
                </button>
                <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition">
                    Instagram
                </button>
                <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition">
                    GMB
                </button>
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
            <div class="flex gap-2">
                <button class="px-4 py-2 bg-purple-100 text-purple-600 rounded-lg font-medium hover:bg-purple-200 transition">
                    All
                </button>
                <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition">
                    Published
                </button>
                <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition">
                    Scheduled
                </button>
                <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition">
                    Draft
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Posts Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @foreach($posts as $post)
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition hover-lift">
        <!-- Image Placeholder -->
        <div class="h-48 bg-gradient-to-br from-purple-100 to-pink-100 flex items-center justify-center relative">
            <span class="text-gray-400">400 × 300</span>
            <!-- Platform Badge -->
            <span class="absolute top-3 right-3 px-3 py-1 text-xs font-medium rounded-full {{ $post['platform'] == 'Instagram' ? 'bg-purple-500 text-white' : 'bg-blue-500 text-white' }}">
                {{ $post['platform'] }}
            </span>
        </div>

        <!-- Post Info -->
        <div class="p-4">
            <!-- Status Badge -->
            <div class="flex items-center gap-2 mb-3">
                <span class="px-3 py-1 text-xs font-medium rounded-full {{ $post['status'] == 'Published' ? 'bg-green-100 text-green-600' : ($post['status'] == 'Scheduled' ? 'bg-orange-100 text-orange-600' : 'bg-gray-100 text-gray-600') }}">
                    {{ $post['status'] }}
                </span>
            </div>

            <!-- Title -->
            <h3 class="text-gray-800 font-semibold mb-2 line-clamp-2">{{ $post['title'] }}</h3>

            <!-- Content Preview -->
            <p class="text-sm text-gray-600 mb-3 line-clamp-2">{{ $post['content'] }}</p>

            <!-- Date -->
            <p class="text-sm text-gray-500 mb-3">
                📅 {{ $post['scheduled_at'] }}
            </p>

            <!-- Engagement Stats -->
            @if($post['status'] == 'Published')
            <div class="flex items-center gap-4 text-sm text-gray-500 mb-4 pt-3 border-t border-gray-200">
                <span class="flex items-center gap-1">
                    <span>❤️</span>
                    <span class="font-medium">{{ $post['likes'] }}</span>
                </span>
                <span class="flex items-center gap-1">
                    <span>💬</span>
                    <span class="font-medium">{{ $post['comments'] }}</span>
                </span>
                <span class="flex items-center gap-1">
                    <span>👥</span>
                    <span class="font-medium">{{ number_format($post['reach']) }}</span>
                </span>
            </div>
            @endif

            <!-- Actions -->
            <div class="flex gap-2">
                <button onclick="alert('View post details (Demo)')" class="flex-1 px-3 py-2 bg-purple-50 text-purple-600 rounded-lg hover:bg-purple-100 transition text-sm font-medium">
                    View
                </button>
                <button onclick="alert('Edit post (Demo)')" class="flex-1 px-3 py-2 bg-gray-50 text-gray-700 rounded-lg hover:bg-gray-100 transition text-sm font-medium">
                    Edit
                </button>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Pagination -->
<div class="mt-8 flex justify-center">
    <div class="flex gap-2">
        <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
            ← Previous
        </button>
        <button class="px-4 py-2 bg-purple-500 text-white rounded-lg">
            1
        </button>
        <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
            2
        </button>
        <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
            3
        </button>
        <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition">
            Next →
        </button>
    </div>
</div>
@endsection
