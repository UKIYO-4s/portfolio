@extends('demo.sns-tool.layouts.app')

@section('page-title', 'Analytics')

@section('content')
<!-- Header -->
<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 gap-4">
    <div>
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Analytics & Insights</h1>
        <p class="text-gray-600">Track your social media performance</p>
    </div>
    <button onclick="alert('Export report (Demo)')" class="flex items-center px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition font-semibold">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
        Export Report
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
                <p class="text-3xl font-bold text-gray-800 mt-2 tabular-nums">{{ number_format($stats['total_likes']) }}</p>
            </div>
            <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
            </div>
        </div>
        <div class="flex items-center gap-2">
            <span class="px-2 py-1 bg-green-100 text-green-600 text-xs font-semibold rounded flex items-center tabular-nums">
                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                {{ $stats['growth']['likes'] }}%
            </span>
            <span class="text-xs text-gray-500">vs last period</span>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
        <div class="flex items-center justify-between mb-4">
            <div>
                <p class="text-sm text-gray-600 font-medium">Total Comments</p>
                <p class="text-3xl font-bold text-gray-800 mt-2 tabular-nums">{{ number_format($stats['total_comments']) }}</p>
            </div>
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
            </div>
        </div>
        <div class="flex items-center gap-2">
            <span class="px-2 py-1 bg-green-100 text-green-600 text-xs font-semibold rounded flex items-center tabular-nums">
                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                {{ $stats['growth']['comments'] }}%
            </span>
            <span class="text-xs text-gray-500">vs last period</span>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
        <div class="flex items-center justify-between mb-4">
            <div>
                <p class="text-sm text-gray-600 font-medium">Total Reach</p>
                <p class="text-3xl font-bold text-gray-800 mt-2 tabular-nums">{{ number_format($stats['total_reach']) }}</p>
            </div>
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
            </div>
        </div>
        <div class="flex items-center gap-2">
            <span class="px-2 py-1 bg-green-100 text-green-600 text-xs font-semibold rounded flex items-center tabular-nums">
                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                {{ $stats['growth']['reach'] }}%
            </span>
            <span class="text-xs text-gray-500">vs last period</span>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">
        <div class="flex items-center justify-between mb-4">
            <div>
                <p class="text-sm text-gray-600 font-medium">Engagement Rate</p>
                <p class="text-3xl font-bold text-gray-800 mt-2 tabular-nums">{{ $stats['engagement_rate'] }}%</p>
            </div>
            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            </div>
        </div>
        <div class="flex items-center gap-2">
            <span class="px-2 py-1 bg-green-100 text-green-600 text-xs font-semibold rounded flex items-center tabular-nums">
                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/></svg>
                {{ $stats['growth']['engagement'] }}%
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
        <div class="h-64 bg-gray-50 rounded-lg flex items-center justify-center">
            <div class="text-center text-gray-400">
                <svg class="w-12 h-12 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                <p class="font-semibold mb-1">Line Chart Placeholder</p>
                <p class="text-sm">Engagement Rate Trend</p>
            </div>
        </div>
        <div class="mt-4 grid grid-cols-3 gap-4 text-center">
            <div>
                <p class="text-2xl font-bold text-purple-600 tabular-nums">8.7%</p>
                <p class="text-xs text-gray-600">Current Rate</p>
            </div>
            <div>
                <p class="text-2xl font-bold text-green-600 tabular-nums">+12%</p>
                <p class="text-xs text-gray-600">Growth</p>
            </div>
            <div>
                <p class="text-2xl font-bold text-blue-600 tabular-nums">9.2%</p>
                <p class="text-xs text-gray-600">Peak Rate</p>
            </div>
        </div>
    </div>

    <!-- Platform Performance -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Platform Performance</h3>
        <div class="h-64 bg-gray-50 rounded-lg flex items-center justify-center">
            <div class="text-center text-gray-400">
                <svg class="w-12 h-12 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                <p class="font-semibold mb-1">Bar Chart Placeholder</p>
                <p class="text-sm">Platform Comparison</p>
            </div>
        </div>
        <div class="mt-4 grid grid-cols-2 gap-4">
            <div class="p-3 bg-purple-50 rounded-lg">
                <p class="text-sm text-gray-600 mb-1">Instagram</p>
                <p class="text-xl font-bold text-purple-600 tabular-nums">8,234 likes</p>
            </div>
            <div class="p-3 bg-blue-50 rounded-lg">
                <p class="text-sm text-gray-600 mb-1">GMB</p>
                <p class="text-xl font-bold text-blue-600 tabular-nums">4,309 likes</p>
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
                <div class="w-12 h-12 {{ $platform == 'Instagram' ? 'bg-purple-600' : 'bg-blue-600' }} rounded-xl flex items-center justify-center">
                    @if($platform == 'Instagram')
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" stroke-width="1.5"/><circle cx="12" cy="12" r="4" stroke-width="1.5"/><circle cx="18" cy="6" r="1.5" fill="currentColor"/></svg>
                    @else
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                    @endif
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
                <p class="text-2xl font-bold text-gray-800 tabular-nums">{{ $data['posts'] }}</p>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg">
                <p class="text-sm text-gray-600 mb-1">Total Likes</p>
                <p class="text-2xl font-bold text-gray-800 tabular-nums">{{ number_format($data['likes']) }}</p>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg">
                <p class="text-sm text-gray-600 mb-1">Comments</p>
                <p class="text-2xl font-bold text-gray-800 tabular-nums">{{ number_format($data['comments']) }}</p>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg">
                <p class="text-sm text-gray-600 mb-1">Reach</p>
                <p class="text-2xl font-bold text-gray-800 tabular-nums">{{ number_format($data['reach']) }}</p>
            </div>
        </div>

        <div class="mt-4 p-4 {{ $platform == 'Instagram' ? 'bg-purple-50 border-purple-200' : 'bg-blue-50 border-blue-200' }} border rounded-lg">
            <div class="flex items-center justify-between">
                <span class="text-sm font-medium text-gray-700">Avg. Engagement Rate</span>
                <span class="text-lg font-bold tabular-nums {{ $platform == 'Instagram' ? 'text-purple-600' : 'text-blue-600' }}">
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
            <div class="h-40 bg-gray-100 flex items-center justify-center">
                <span class="text-gray-400">Post Image</span>
            </div>
            <div class="p-4">
                <div class="flex items-center gap-2 mb-2">
                    <span class="px-2 py-1 bg-purple-100 text-purple-600 text-xs rounded-full font-medium">
                        Instagram
                    </span>
                    <span class="px-2 py-1 bg-yellow-100 text-yellow-700 text-xs rounded-full font-medium flex items-center">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1a1 1 0 010 2H6v1a1 1 0 01-2 0V6H3a1 1 0 010-2h1V3a1 1 0 011-1zm0 10a1 1 0 011 1v1h1a1 1 0 110 2H6v1a1 1 0 11-2 0v-1H3a1 1 0 110-2h1v-1a1 1 0 011-1zM12 2a1 1 0 01.967.744L14.146 7.2 17.5 9.134a1 1 0 010 1.732l-3.354 1.935-1.18 4.455a1 1 0 01-1.933 0L9.854 12.8 6.5 10.866a1 1 0 010-1.732l3.354-1.935 1.18-4.455A1 1 0 0112 2z" clip-rule="evenodd"/></svg>
                        Top {{ $i }}
                    </span>
                </div>
                <p class="font-semibold text-gray-800 mb-3">Highest engagement post #{{ $i }}</p>
                <div class="flex items-center gap-3 text-sm text-gray-600">
                    <span class="flex items-center tabular-nums">
                        <svg class="w-4 h-4 mr-1 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        {{ 567 - ($i * 100) }}
                    </span>
                    <span class="flex items-center tabular-nums">
                        <svg class="w-4 h-4 mr-1 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                        {{ 123 - ($i * 20) }}
                    </span>
                    <span class="flex items-center tabular-nums">
                        <svg class="w-4 h-4 mr-1 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        {{ 9.5 - ($i * 0.5) }}%
                    </span>
                </div>
            </div>
        </div>
        @endfor
    </div>
</div>

<!-- Insights -->
<div class="bg-gray-50 rounded-xl border border-gray-200 p-6">
    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
        <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
        Insights & Recommendations
    </h3>
    <div class="space-y-4">
        <div class="flex items-start gap-3 p-4 bg-white rounded-lg">
            <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
            </div>
            <div>
                <p class="font-semibold text-gray-800 mb-1">Great Engagement!</p>
                <p class="text-sm text-gray-600">Your engagement rate is 23% higher than industry average. Keep posting at 10 AM for best results.</p>
            </div>
        </div>

        <div class="flex items-start gap-3 p-4 bg-white rounded-lg">
            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
            </div>
            <div>
                <p class="font-semibold text-gray-800 mb-1">Growing Audience</p>
                <p class="text-sm text-gray-600">Your reach increased by 15.7% this month. Consider posting 2-3 times per week to maintain growth.</p>
            </div>
        </div>

        <div class="flex items-start gap-3 p-4 bg-white rounded-lg">
            <div class="w-8 h-8 bg-amber-100 rounded-lg flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
            </div>
            <div>
                <p class="font-semibold text-gray-800 mb-1">Content Tip</p>
                <p class="text-sm text-gray-600">Posts with customer reviews get 2x more engagement. Try using the "Customer Review" template more often.</p>
            </div>
        </div>
    </div>
</div>
@endsection
