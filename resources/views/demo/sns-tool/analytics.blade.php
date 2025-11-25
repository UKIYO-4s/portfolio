@extends('demo.sns-tool.layouts.app')

@section('page-title', 'Analytics')

@section('content')
<!-- Header -->
<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 gap-4">
    <div>
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Analytics & Insights</h1>
        <p class="text-gray-600">Track your social media performance</p>
    </div>
    <button onclick="alert('Export report (Demo)')" class="px-6 py-3 bg-gradient-to-r from-purple-500 via-pink-500 to-orange-400 text-white rounded-lg shadow-md hover:shadow-lg transition font-semibold">
        📥 Export Report
    </button>
</div>

<!-- Period Selector -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
    <div class="flex flex-wrap items-center gap-4">
        <span class="text-sm font-medium text-gray-700">Time Period:</span>
        <div class="flex gap-2">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition">
                7 Days
            </button>
            <button class="px-4 py-2 bg-purple-100 text-purple-600 rounded-lg font-medium hover:bg-purple-200 transition">
                30 Days
            </button>
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition">
                90 Days
            </button>
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 transition">
                Custom
            </button>
        </div>
    </div>
</div>

<!-- Key Metrics -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
        <div class="flex items-center justify-between mb-4">
            <div>
                <p class="text-sm text-gray-600 font-medium">Total Likes</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ number_format($stats['total_likes']) }}</p>
            </div>
            <div class="text-5xl">❤️</div>
        </div>
        <div class="flex items-center gap-2">
            <span class="px-2 py-1 bg-green-100 text-green-600 text-xs font-semibold rounded">
                ↑ {{ $stats['growth']['likes'] }}%
            </span>
            <span class="text-xs text-gray-500">vs last period</span>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
        <div class="flex items-center justify-between mb-4">
            <div>
                <p class="text-sm text-gray-600 font-medium">Total Comments</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ number_format($stats['total_comments']) }}</p>
            </div>
            <div class="text-5xl">💬</div>
        </div>
        <div class="flex items-center gap-2">
            <span class="px-2 py-1 bg-green-100 text-green-600 text-xs font-semibold rounded">
                ↑ {{ $stats['growth']['comments'] }}%
            </span>
            <span class="text-xs text-gray-500">vs last period</span>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
        <div class="flex items-center justify-between mb-4">
            <div>
                <p class="text-sm text-gray-600 font-medium">Total Reach</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ number_format($stats['total_reach']) }}</p>
            </div>
            <div class="text-5xl">👥</div>
        </div>
        <div class="flex items-center gap-2">
            <span class="px-2 py-1 bg-green-100 text-green-600 text-xs font-semibold rounded">
                ↑ {{ $stats['growth']['reach'] }}%
            </span>
            <span class="text-xs text-gray-500">vs last period</span>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
        <div class="flex items-center justify-between mb-4">
            <div>
                <p class="text-sm text-gray-600 font-medium">Engagement Rate</p>
                <p class="text-3xl font-bold text-gray-800 mt-2">{{ $stats['engagement_rate'] }}%</p>
            </div>
            <div class="text-5xl">📊</div>
        </div>
        <div class="flex items-center gap-2">
            <span class="px-2 py-1 bg-green-100 text-green-600 text-xs font-semibold rounded">
                ↑ {{ $stats['growth']['engagement'] }}%
            </span>
            <span class="text-xs text-gray-500">vs last period</span>
        </div>
    </div>
</div>

<!-- Charts -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
    <!-- Engagement Over Time -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Engagement Over Time</h3>
        <div class="h-64 bg-gradient-to-br from-purple-50 to-pink-50 rounded-lg flex items-center justify-center">
            <div class="text-center text-gray-400">
                <p class="text-4xl mb-3">📈</p>
                <p class="font-semibold mb-1">Line Chart Placeholder</p>
                <p class="text-sm">Engagement Rate Trend</p>
            </div>
        </div>
        <div class="mt-4 grid grid-cols-3 gap-4 text-center">
            <div>
                <p class="text-2xl font-bold text-purple-600">8.7%</p>
                <p class="text-xs text-gray-600">Current Rate</p>
            </div>
            <div>
                <p class="text-2xl font-bold text-green-600">+12%</p>
                <p class="text-xs text-gray-600">Growth</p>
            </div>
            <div>
                <p class="text-2xl font-bold text-blue-600">9.2%</p>
                <p class="text-xs text-gray-600">Peak Rate</p>
            </div>
        </div>
    </div>

    <!-- Platform Performance -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Platform Performance</h3>
        <div class="h-64 bg-gradient-to-br from-blue-50 to-cyan-50 rounded-lg flex items-center justify-center">
            <div class="text-center text-gray-400">
                <p class="text-4xl mb-3">📊</p>
                <p class="font-semibold mb-1">Bar Chart Placeholder</p>
                <p class="text-sm">Platform Comparison</p>
            </div>
        </div>
        <div class="mt-4 grid grid-cols-2 gap-4">
            <div class="p-3 bg-purple-50 rounded-lg">
                <p class="text-sm text-gray-600 mb-1">Instagram</p>
                <p class="text-xl font-bold text-purple-600">8,234 likes</p>
            </div>
            <div class="p-3 bg-blue-50 rounded-lg">
                <p class="text-sm text-gray-600 mb-1">GMB</p>
                <p class="text-xl font-bold text-blue-600">4,309 likes</p>
            </div>
        </div>
    </div>
</div>

<!-- Platform Stats Details -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
    @foreach($platformStats as $platform => $data)
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center gap-3">
                <div class="w-12 h-12 {{ $platform == 'Instagram' ? 'bg-gradient-to-br from-purple-400 to-pink-400' : 'bg-blue-500' }} rounded-xl flex items-center justify-center text-white text-2xl">
                    {{ $platform == 'Instagram' ? '📷' : '🏢' }}
                </div>
                <div>
                    <h3 class="text-lg font-bold text-gray-800">{{ $platform }}</h3>
                    <p class="text-sm text-gray-600">Last 30 days</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div class="p-4 bg-gray-50 rounded-lg">
                <p class="text-sm text-gray-600 mb-1">Total Posts</p>
                <p class="text-2xl font-bold text-gray-800">{{ $data['posts'] }}</p>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg">
                <p class="text-sm text-gray-600 mb-1">Total Likes</p>
                <p class="text-2xl font-bold text-gray-800">{{ number_format($data['likes']) }}</p>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg">
                <p class="text-sm text-gray-600 mb-1">Comments</p>
                <p class="text-2xl font-bold text-gray-800">{{ number_format($data['comments']) }}</p>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg">
                <p class="text-sm text-gray-600 mb-1">Reach</p>
                <p class="text-2xl font-bold text-gray-800">{{ number_format($data['reach']) }}</p>
            </div>
        </div>

        <div class="mt-4 p-4 {{ $platform == 'Instagram' ? 'bg-purple-50 border-purple-200' : 'bg-blue-50 border-blue-200' }} border rounded-lg">
            <div class="flex items-center justify-between">
                <span class="text-sm font-medium text-gray-700">Avg. Engagement Rate</span>
                <span class="text-lg font-bold {{ $platform == 'Instagram' ? 'text-purple-600' : 'text-blue-600' }}">
                    {{ number_format(($data['likes'] + $data['comments']) / $data['reach'] * 100, 1) }}%
                </span>
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Best Performing Posts -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
    <h3 class="text-lg font-bold text-gray-800 mb-6">Top Performing Posts</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @for($i = 1; $i <= 3; $i++)
        <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition">
            <div class="h-40 bg-gradient-to-br from-purple-100 to-pink-100 flex items-center justify-center">
                <span class="text-gray-400">Post Image</span>
            </div>
            <div class="p-4">
                <div class="flex items-center gap-2 mb-2">
                    <span class="px-2 py-1 bg-purple-100 text-purple-600 text-xs rounded-full font-medium">
                        Instagram
                    </span>
                    <span class="px-2 py-1 bg-yellow-100 text-yellow-700 text-xs rounded-full font-medium">
                        🏆 Top {{ $i }}
                    </span>
                </div>
                <p class="font-semibold text-gray-800 mb-3">Highest engagement post #{{ $i }}</p>
                <div class="flex items-center gap-3 text-sm text-gray-600">
                    <span>❤️ {{ 567 - ($i * 100) }}</span>
                    <span>💬 {{ 123 - ($i * 20) }}</span>
                    <span>📊 {{ 9.5 - ($i * 0.5) }}%</span>
                </div>
            </div>
        </div>
        @endfor
    </div>
</div>

<!-- Insights -->
<div class="bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl border border-purple-200 p-6">
    <h3 class="text-lg font-bold text-gray-800 mb-4">💡 Insights & Recommendations</h3>
    <div class="space-y-4">
        <div class="flex items-start gap-3 p-4 bg-white rounded-lg">
            <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <span class="text-lg">✅</span>
            </div>
            <div>
                <p class="font-semibold text-gray-800 mb-1">Great Engagement!</p>
                <p class="text-sm text-gray-600">Your engagement rate is 23% higher than industry average. Keep posting at 10 AM for best results.</p>
            </div>
        </div>

        <div class="flex items-start gap-3 p-4 bg-white rounded-lg">
            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <span class="text-lg">📈</span>
            </div>
            <div>
                <p class="font-semibold text-gray-800 mb-1">Growing Audience</p>
                <p class="text-sm text-gray-600">Your reach increased by 15.7% this month. Consider posting 2-3 times per week to maintain growth.</p>
            </div>
        </div>

        <div class="flex items-start gap-3 p-4 bg-white rounded-lg">
            <div class="w-8 h-8 bg-amber-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <span class="text-lg">💡</span>
            </div>
            <div>
                <p class="font-semibold text-gray-800 mb-1">Content Tip</p>
                <p class="text-sm text-gray-600">Posts with customer reviews get 2x more engagement. Try using the "Customer Review" template more often.</p>
            </div>
        </div>
    </div>
</div>
@endsection
