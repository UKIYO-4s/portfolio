@extends('demo.sns-tool.layouts.app')

@section('page-title', 'Templates')

@section('content')
<!-- Header -->
<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 gap-4">
    <div>
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Post Templates</h1>
        <p class="text-gray-600">Save time with pre-made content templates</p>
    </div>
    <button onclick="alert('Create new template (Demo)')" class="px-6 py-3 bg-gradient-to-r from-purple-500 via-pink-500 to-orange-400 text-white rounded-lg shadow-md hover:shadow-lg transition font-semibold">
        + New Template
    </button>
</div>

<!-- Filter by Category -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
    <div class="flex flex-wrap gap-3">
        <button class="px-4 py-2 bg-purple-100 text-purple-600 rounded-lg font-medium hover:bg-purple-200 transition">
            All Templates
        </button>
        <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition">
            Product
        </button>
        <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition">
            Engagement
        </button>
        <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition">
            Promotion
        </button>
        <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition">
            Information
        </button>
    </div>
</div>

<!-- Templates Grid -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    @foreach($templates as $template)
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition hover-lift">
        <div class="p-6">
            <!-- Header -->
            <div class="flex items-start justify-between mb-4">
                <div class="flex-1">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="px-3 py-1 text-xs font-medium rounded-full {{ $template['platform'] == 'Instagram' ? 'bg-purple-100 text-purple-600' : 'bg-blue-100 text-blue-600' }}">
                            {{ $template['platform'] }}
                        </span>
                        <span class="px-3 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-600">
                            {{ $template['category'] }}
                        </span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-1">{{ $template['name'] }}</h3>
                    <p class="text-sm text-gray-500">Used {{ $template['used_count'] }} times</p>
                </div>
                <button onclick="alert('Template options (Demo)')" class="p-2 text-gray-400 hover:text-gray-600 rounded-lg hover:bg-gray-100 transition">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                    </svg>
                </button>
            </div>

            <!-- Template Content Preview -->
            <div class="bg-gray-50 rounded-lg p-4 mb-4 border border-gray-200">
                <p class="text-sm text-gray-700 whitespace-pre-line">{{ $template['content'] }}</p>
            </div>

            <!-- Template Variables -->
            <div class="flex items-center gap-2 mb-4">
                <span class="text-xs text-gray-500">Variables:</span>
                @php
                    preg_match_all('/\[([^\]]+)\]/', $template['content'], $matches);
                @endphp
                @if(!empty($matches[1]))
                    @foreach(array_unique($matches[1]) as $variable)
                        <span class="px-2 py-1 bg-amber-50 text-amber-700 text-xs rounded border border-amber-200 font-mono">
                            {{ $variable }}
                        </span>
                    @endforeach
                @endif
            </div>

            <!-- Actions -->
            <div class="flex gap-3">
                <button onclick="alert('Using template: {{ $template['name'] }} (Demo)')" class="flex-1 px-4 py-2 bg-gradient-to-r from-purple-500 via-pink-500 to-orange-400 text-white rounded-lg hover:shadow-lg transition font-semibold">
                    Use Template
                </button>
                <button onclick="alert('Edit template (Demo)')" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition font-medium">
                    Edit
                </button>
                <button onclick="alert('Duplicate template (Demo)')" class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition font-medium">
                    📋
                </button>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Template Categories Info -->
<div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl border border-purple-200 p-6">
        <div class="text-3xl mb-3">🎁</div>
        <h4 class="font-bold text-gray-800 mb-2">Product Templates</h4>
        <p class="text-sm text-gray-600">Perfect for launching new products and features</p>
    </div>

    <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl border border-blue-200 p-6">
        <div class="text-3xl mb-3">💬</div>
        <h4 class="font-bold text-gray-800 mb-2">Engagement Templates</h4>
        <p class="text-sm text-gray-600">Boost interaction with your audience</p>
    </div>

    <div class="bg-gradient-to-br from-orange-50 to-amber-50 rounded-xl border border-orange-200 p-6">
        <div class="text-3xl mb-3">🏷️</div>
        <h4 class="font-bold text-gray-800 mb-2">Promotion Templates</h4>
        <p class="text-sm text-gray-600">Drive sales with promotional content</p>
    </div>

    <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl border border-green-200 p-6">
        <div class="text-3xl mb-3">ℹ️</div>
        <h4 class="font-bold text-gray-800 mb-2">Information Templates</h4>
        <p class="text-sm text-gray-600">Share updates and important info</p>
    </div>
</div>

<!-- Tips Section -->
<div class="mt-8 bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <h3 class="text-lg font-bold text-gray-800 mb-4">💡 Template Tips</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <span class="text-lg">1️⃣</span>
            </div>
            <div>
                <p class="font-semibold text-gray-800 mb-1">Use Variables</p>
                <p class="text-sm text-gray-600">Add [VARIABLE_NAME] in brackets to create reusable content</p>
            </div>
        </div>
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <span class="text-lg">2️⃣</span>
            </div>
            <div>
                <p class="font-semibold text-gray-800 mb-1">Save Time</p>
                <p class="text-sm text-gray-600">Templates can reduce posting time by up to 70%</p>
            </div>
        </div>
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <span class="text-lg">3️⃣</span>
            </div>
            <div>
                <p class="font-semibold text-gray-800 mb-1">Maintain Brand Voice</p>
                <p class="text-sm text-gray-600">Keep your messaging consistent across all posts</p>
            </div>
        </div>
        <div class="flex items-start gap-3">
            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <span class="text-lg">4️⃣</span>
            </div>
            <div>
                <p class="font-semibold text-gray-800 mb-1">Track Performance</p>
                <p class="text-sm text-gray-600">See which templates get the best engagement</p>
            </div>
        </div>
    </div>
</div>
@endsection
