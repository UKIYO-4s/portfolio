@extends('demo.sns-tool.layouts.app')

@section('page-title', 'Create New Post')

@section('content')
<!-- Header -->
<div class="mb-8">
    <div class="flex items-center gap-3 mb-4">
        <a href="{{ route('demo.sns-tool.posts') }}" class="text-gray-600 hover:text-gray-800">
            ← Back to Posts
        </a>
    </div>
    <h1 class="text-3xl font-bold text-gray-800 mb-2">Create New Post</h1>
    <p class="text-gray-600">Schedule and publish content to your social media platforms</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- Form Section -->
    <div class="lg:col-span-2">
        <form onsubmit="event.preventDefault(); alert('✨ Post scheduled successfully! (Demo only)');" class="space-y-6">
            <!-- Platform Selection -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Select Platform</h3>
                <div class="grid grid-cols-2 gap-4">
                    <label class="relative cursor-pointer">
                        <input type="radio" name="platform" value="instagram" class="peer sr-only" checked>
                        <div class="p-6 border-2 border-gray-200 rounded-xl hover:border-purple-300 peer-checked:border-purple-500 peer-checked:bg-purple-50 transition">
                            <div class="text-4xl mb-2 text-center">📷</div>
                            <p class="text-center font-semibold text-gray-800">Instagram</p>
                            <p class="text-center text-sm text-gray-600 mt-1">Image & Caption</p>
                        </div>
                    </label>
                    <label class="relative cursor-pointer">
                        <input type="radio" name="platform" value="gmb" class="peer sr-only">
                        <div class="p-6 border-2 border-gray-200 rounded-xl hover:border-blue-300 peer-checked:border-blue-500 peer-checked:bg-blue-50 transition">
                            <div class="text-4xl mb-2 text-center">🏢</div>
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
                    <div class="text-6xl mb-4">📸</div>
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
                    <p class="text-sm text-gray-500">0 / 2,200 characters</p>
                    <button type="button" onclick="alert('AI caption suggestions (Demo)')" class="text-sm text-purple-600 hover:text-purple-800 font-medium">
                        ✨ AI Suggestions
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
                    <p class="text-sm text-blue-800">
                        <span class="font-semibold">💡 Best time to post:</span> Based on your audience, we recommend posting at 10:00 AM or 6:00 PM for maximum engagement.
                    </p>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex gap-4">
                <button type="submit" class="flex-1 px-6 py-4 bg-gradient-to-r from-purple-500 via-pink-500 to-orange-400 text-white rounded-xl shadow-md hover:shadow-lg transition font-semibold text-lg">
                    📅 Schedule Post
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
                        <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-pink-400 rounded-full"></div>
                        <div>
                            <p class="font-semibold text-sm text-gray-800">your_business</p>
                            <p class="text-xs text-gray-500">Just now</p>
                        </div>
                    </div>

                    <!-- Image -->
                    <div class="aspect-square bg-gradient-to-br from-purple-100 to-pink-100 flex items-center justify-center">
                        <span class="text-gray-400">Your image preview</span>
                    </div>

                    <!-- Actions -->
                    <div class="p-4 border-b border-gray-200">
                        <div class="flex items-center gap-4 mb-3">
                            <span class="text-2xl">❤️</span>
                            <span class="text-2xl">💬</span>
                            <span class="text-2xl">📤</span>
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
                <div class="mt-6 p-4 bg-gradient-to-br from-purple-50 to-pink-50 rounded-xl">
                    <p class="text-sm font-semibold text-gray-800 mb-3">📊 Predicted Performance</p>
                    <div class="space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Expected Reach:</span>
                            <span class="font-semibold text-gray-800">2,500 - 3,500</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Expected Likes:</span>
                            <span class="font-semibold text-gray-800">180 - 250</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Expected Comments:</span>
                            <span class="font-semibold text-gray-800">25 - 45</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
