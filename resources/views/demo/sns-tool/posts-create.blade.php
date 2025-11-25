@extends('demo.sns-tool.layouts.app')

@section('page-title', 'Create New Post')

@section('content')
<!-- Header -->
<div class="mb-8">
    <div class="flex items-center gap-3 mb-4">
        <a href="{{ route('demo.sns-tool.posts') }}" class="flex items-center text-gray-600 hover:text-gray-800">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Back to Posts
        </a>
    </div>
    <h1 class="text-3xl font-bold text-gray-800 mb-2">Create New Post</h1>
    <p class="text-gray-600">Schedule and publish content to your social media platforms</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Form Section -->
    <div class="lg:col-span-2">
        <form onsubmit="event.preventDefault(); alert('Post scheduled successfully! (Demo only)');" class="space-y-6">
            <!-- Platform Selection -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Select Platform</h3>
                <div class="grid grid-cols-2 gap-4">
                    <label class="relative cursor-pointer">
                        <input type="radio" name="platform" value="instagram" class="peer sr-only" checked>
                        <div class="p-6 border-2 border-gray-200 rounded-xl hover:border-purple-300 peer-checked:border-purple-600 peer-checked:bg-purple-50 transition">
                            <div class="flex justify-center mb-2">
                                <svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" stroke-width="1.5"/><circle cx="12" cy="12" r="4" stroke-width="1.5"/><circle cx="18" cy="6" r="1.5" fill="currentColor"/></svg>
                            </div>
                            <p class="text-center font-semibold text-gray-800">Instagram</p>
                            <p class="text-center text-sm text-gray-600 mt-1">Image & Caption</p>
                        </div>
                    </label>
                    <label class="relative cursor-pointer">
                        <input type="radio" name="platform" value="gmb" class="peer sr-only">
                        <div class="p-6 border-2 border-gray-200 rounded-xl hover:border-blue-300 peer-checked:border-blue-600 peer-checked:bg-blue-50 transition">
                            <div class="flex justify-center mb-2">
                                <svg class="w-10 h-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                            </div>
                            <p class="text-center font-semibold text-gray-800">Google My Business</p>
                            <p class="text-center text-sm text-gray-600 mt-1">Update & Photo</p>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Image Upload -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Upload Image</h3>
                <div class="border-2 border-dashed border-gray-300 rounded-xl p-12 text-center hover:border-purple-400 transition cursor-pointer">
                    <div class="flex justify-center mb-4">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                    <p class="text-gray-700 font-medium mb-2">Click to upload or drag and drop</p>
                    <p class="text-sm text-gray-500">PNG, JPG, GIF up to 10MB</p>
                    <input type="file" class="hidden" accept="image/*">
                </div>
            </div>

            <!-- Caption -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Caption</h3>
                <textarea
                    rows="6"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent resize-none"
                    placeholder="Write your caption here... Use #hashtags and @mentions"></textarea>
                <div class="flex items-center justify-between mt-2">
                    <p class="text-sm text-gray-500 tabular-nums">0 / 2,200 characters</p>
                    <button type="button" onclick="alert('AI caption suggestions (Demo)')" class="flex items-center text-sm text-purple-600 hover:text-purple-800 font-medium">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        AI Suggestions
                    </button>
                </div>
            </div>

            <!-- Hashtags -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Suggested Hashtags</h3>
                <div class="flex flex-wrap gap-2">
                    <button type="button" class="px-3 py-1 bg-purple-50 text-purple-600 rounded-full text-sm hover:bg-purple-100 transition">
                        #marketing
                    </button>
                    <button type="button" class="px-3 py-1 bg-purple-50 text-purple-600 rounded-full text-sm hover:bg-purple-100 transition">
                        #socialmedia
                    </button>
                    <button type="button" class="px-3 py-1 bg-purple-50 text-purple-600 rounded-full text-sm hover:bg-purple-100 transition">
                        #business
                    </button>
                    <button type="button" class="px-3 py-1 bg-purple-50 text-purple-600 rounded-full text-sm hover:bg-purple-100 transition">
                        #instagram
                    </button>
                    <button type="button" class="px-3 py-1 bg-purple-50 text-purple-600 rounded-full text-sm hover:bg-purple-100 transition">
                        #gmb
                    </button>
                </div>
            </div>

            <!-- Schedule -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Schedule</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                        <input type="date" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent" value="2024-11-26">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Time</label>
                        <input type="time" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent" value="10:00">
                    </div>
                </div>
                <div class="mt-4 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                    <p class="text-sm text-blue-800 flex items-start">
                        <svg class="w-5 h-5 mr-2 flex-shrink-0 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/></svg>
                        <span><span class="font-semibold">Best time to post:</span> Based on your audience, we recommend posting at 10:00 AM or 6:00 PM for maximum engagement.</span>
                    </p>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex gap-4">
                <button type="submit" class="flex-1 flex items-center justify-center px-6 py-4 bg-purple-600 text-white rounded-xl hover:bg-purple-700 transition font-semibold text-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    Schedule Post
                </button>
                <button type="button" onclick="alert('Saved as draft (Demo)')" class="px-6 py-4 bg-white border-2 border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition font-semibold">
                    Save Draft
                </button>
            </div>
        </form>
    </div>

    <!-- Preview Section -->
    <div class="lg:col-span-1">
        <div class="sticky top-24">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Preview</h3>

                <!-- Instagram Preview -->
                <div class="border border-gray-200 rounded-xl overflow-hidden">
                    <!-- Header -->
                    <div class="flex items-center gap-3 p-4 border-b border-gray-200">
                        <div class="w-10 h-10 bg-purple-600 rounded-full"></div>
                        <div>
                            <p class="font-semibold text-sm text-gray-800">your_business</p>
                            <p class="text-xs text-gray-500">Just now</p>
                        </div>
                    </div>

                    <!-- Image -->
                    <div class="aspect-square bg-gray-100 flex items-center justify-center">
                        <span class="text-gray-400">Your image preview</span>
                    </div>

                    <!-- Actions -->
                    <div class="p-4 border-b border-gray-200">
                        <div class="flex items-center gap-4 mb-3">
                            <svg class="w-7 h-7 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                            <svg class="w-7 h-7 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
                            <svg class="w-7 h-7 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/></svg>
                        </div>
                        <p class="text-sm text-gray-800">
                            <span class="font-semibold">your_business</span>
                            <span class="text-gray-600 ml-1">Your caption will appear here...</span>
                        </p>
                    </div>

                    <!-- Comment Input -->
                    <div class="p-4">
                        <p class="text-sm text-gray-400">Add a comment...</p>
                    </div>
                </div>

                <!-- Stats Prediction -->
                <div class="mt-6 p-4 bg-purple-50 border border-purple-200 rounded-xl">
                    <p class="text-sm font-semibold text-gray-800 mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
                        Predicted Performance
                    </p>
                    <div class="space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Expected Reach:</span>
                            <span class="font-semibold text-gray-800 tabular-nums">2,500 - 3,500</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Expected Likes:</span>
                            <span class="font-semibold text-gray-800 tabular-nums">180 - 250</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Expected Comments:</span>
                            <span class="font-semibold text-gray-800 tabular-nums">25 - 45</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
