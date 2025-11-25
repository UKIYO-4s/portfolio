@extends('demo.sns-tool.layouts.app')

@section('page-title', 'Posts')

@section('content')
<!-- Header -->
<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 gap-4">
    <div>
        <h1 class="text-3xl font-bold text-gray-800 mb-2">All Posts</h1>
        <p class="text-gray-600">Manage your social media posts across platforms</p>
    </div>
    <a href="{{ route('demo.sns-tool.posts.create') }}" class="flex items-center px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition font-semibold">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Create New Post
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
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition">
        <!-- Image Placeholder -->
        <div class="h-48 bg-gray-100 flex items-center justify-center relative">
            <span class="text-gray-400">400 × 300</span>
            <!-- Platform Badge -->
            <span class="absolute top-3 right-3 px-3 py-1 text-xs font-medium rounded-full {{ $post['platform'] == 'Instagram' ? 'bg-purple-600 text-white' : 'bg-blue-600 text-white' }}">
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
            <p class="text-sm text-gray-500 mb-3 flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                {{ $post['scheduled_at'] }}
            </p>

            <!-- Engagement Stats -->
            @if($post['status'] == 'Published')
            <div class="flex items-center gap-4 text-sm text-gray-500 mb-4 pt-3 border-t border-gray-200">
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    <span class="font-medium tabular-nums">{{ $post['likes'] }}</span>
                </span>
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                    <span class="font-medium tabular-nums">{{ $post['comments'] }}</span>
                </span>
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                    <span class="font-medium tabular-nums">{{ number_format($post['reach']) }}</span>
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
        <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition flex items-center">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Previous
        </button>
        <button class="px-4 py-2 bg-purple-600 text-white rounded-lg tabular-nums">
            1
        </button>
        <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition tabular-nums">
            2
        </button>
        <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition tabular-nums">
            3
        </button>
        <button class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition flex items-center">
            Next
            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </button>
    </div>
</div>
@endsection
