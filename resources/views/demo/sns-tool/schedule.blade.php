@extends('demo.sns-tool.layouts.app')

@section('page-title', 'Schedule')

@section('content')
<!-- Header -->
<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-8 gap-4">
    <div>
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Content Calendar</h1>
        <p class="text-gray-600">View and manage your scheduled posts</p>
    </div>
    <a href="{{ route('demo.sns-tool.posts.create') }}" class="flex items-center px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition font-semibold">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Schedule Post
    </a>
</div>

<!-- Calendar -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-8">
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6 gap-4">
        <h3 class="text-xl font-bold text-gray-800">November 2024</h3>
        <div class="flex gap-2">
            <button class="flex items-center px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition font-medium">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Previous
            </button>
            <button class="flex items-center px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition font-medium">
                Next
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </button>
        </div>
    </div>

    <!-- Weekday Headers -->
    <div class="grid grid-cols-7 gap-2 mb-2">
        @foreach(['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'] as $day)
        <div class="text-center text-sm font-semibold text-gray-600 py-2">{{ $day }}</div>
        @endforeach
    </div>

    <!-- Calendar Grid -->
    <div class="grid grid-cols-7 gap-2">
        @php
            $startDay = 5; // November 2024 starts on Friday (5)
            $daysInMonth = 30;
            $totalCells = 35;
            $scheduledDates = [26, 27, 28, 29, 30];
            $postCounts = [26 => 2, 27 => 3, 28 => 1, 29 => 2, 30 => 3];
        @endphp

        @for($i = 0; $i < $totalCells; $i++)
            @php
                $day = $i - $startDay + 1;
                $isCurrentMonth = $day > 0 && $day <= $daysInMonth;
                $hasScheduled = in_array($day, $scheduledDates);
                $isToday = $day == 25;
            @endphp

            <div class="aspect-square border {{ $isToday ? 'border-purple-500 border-2' : 'border-gray-200' }} rounded-lg p-2 {{ $isCurrentMonth ? 'bg-white hover:bg-gray-50' : 'bg-gray-50' }} cursor-pointer transition">
                @if($isCurrentMonth)
                    <div class="h-full flex flex-col">
                        <div class="flex items-center justify-between mb-1">
                            <p class="text-sm font-semibold {{ $isToday ? 'text-purple-600' : 'text-gray-800' }}">{{ $day }}</p>
                            @if($isToday)
                                <span class="text-xs bg-purple-500 text-white px-1.5 py-0.5 rounded-full font-medium">Today</span>
                            @endif
                        </div>

                        @if($hasScheduled)
                            <div class="flex-1 flex flex-col gap-1">
                                @for($j = 0; $j < $postCounts[$day]; $j++)
                                    <div class="text-xs {{ $j % 2 == 0 ? 'bg-purple-100 text-purple-600' : 'bg-blue-100 text-blue-600' }} px-2 py-1 rounded truncate font-medium flex items-center">
                                        @if($j % 2 == 0)
                                            <svg class="w-3 h-3 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" stroke-width="1.5"/><circle cx="12" cy="12" r="4" stroke-width="1.5"/></svg>
                                        @else
                                            <svg class="w-3 h-3 mr-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5"/></svg>
                                        @endif
                                        Post
                                    </div>
                                @endfor
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        @endfor
    </div>
</div>

<!-- Scheduled Posts Details -->
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <h3 class="text-lg font-bold text-gray-800 mb-6">Upcoming Posts</h3>

    <div class="space-y-6">
        @foreach($scheduledPosts as $dateGroup)
        <div>
            <h4 class="text-sm font-semibold text-gray-500 mb-3 uppercase tracking-wide">{{ date('l, F j, Y', strtotime($dateGroup['date'])) }}</h4>
            <div class="space-y-3">
                @foreach($dateGroup['posts'] as $post)
                <div class="flex items-start gap-4 p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                    <div class="w-16 h-16 {{ $post['platform'] == 'Instagram' ? 'bg-purple-100' : 'bg-blue-100' }} rounded-lg flex items-center justify-center flex-shrink-0">
                        @if($post['platform'] == 'Instagram')
                            <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" stroke-width="1.5"/><circle cx="12" cy="12" r="4" stroke-width="1.5"/><circle cx="18" cy="6" r="1.5" fill="currentColor"/></svg>
                        @else
                            <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="px-2 py-1 text-xs rounded-full font-medium {{ $post['platform'] == 'Instagram' ? 'bg-purple-100 text-purple-600' : 'bg-blue-100 text-blue-600' }}">
                                {{ $post['platform'] }}
                            </span>
                            <span class="px-2 py-1 text-xs rounded-full font-medium bg-orange-100 text-orange-600">
                                Scheduled
                            </span>
                        </div>
                        <p class="font-semibold text-gray-800 mb-1">{{ $post['title'] }}</p>
                        <p class="text-sm text-gray-600 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            {{ $post['time'] }}
                        </p>
                    </div>
                    <div class="flex gap-2">
                        <button onclick="alert('Edit scheduled post (Demo)')" class="px-4 py-2 bg-purple-50 text-purple-600 rounded-lg hover:bg-purple-100 transition text-sm font-medium">
                            Edit
                        </button>
                        <button onclick="alert('Cancel scheduled post (Demo)')" class="px-4 py-2 bg-gray-50 text-gray-700 rounded-lg hover:bg-gray-100 transition text-sm font-medium">
                            Cancel
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Legend -->
<div class="mt-8 bg-gray-50 rounded-xl border border-gray-200 p-6">
    <h4 class="font-semibold text-gray-800 mb-3">Legend</h4>
    <div class="flex flex-wrap gap-4">
        <div class="flex items-center gap-2">
            <div class="w-4 h-4 bg-purple-100 border border-purple-300 rounded"></div>
            <span class="text-sm text-gray-700">Instagram Post</span>
        </div>
        <div class="flex items-center gap-2">
            <div class="w-4 h-4 bg-blue-100 border border-blue-300 rounded"></div>
            <span class="text-sm text-gray-700">GMB Update</span>
        </div>
        <div class="flex items-center gap-2">
            <div class="w-4 h-4 border-2 border-purple-600 rounded"></div>
            <span class="text-sm text-gray-700">Today</span>
        </div>
    </div>
</div>
@endsection
