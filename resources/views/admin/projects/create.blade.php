@extends('admin.layouts.app')

@section('title', 'Add New Project - Admin')

@section('content')
<div class="max-w-3xl">
    <h1 class="text-4xl font-semibold tracking-normal font-display mb-8">Add New Project</h1>

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label for="title" class="block text-sm text-gray-400 mb-2">Title *</label>
            <input type="text"
                   id="title"
                   name="title"
                   required
                   value="{{ old('title') }}"
                   class="w-full bg-gray-900 border border-gray-700 px-4 py-3 text-white focus:border-gray-500 focus:outline-none @error('title') border-red-500 @enderror">
            @error('title')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="block text-sm text-gray-400 mb-2">Description</label>
            <textarea id="description"
                      name="description"
                      rows="4"
                      class="w-full bg-gray-900 border border-gray-700 px-4 py-3 text-white focus:border-gray-500 focus:outline-none @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="thumbnail" class="block text-sm text-gray-400 mb-2">Thumbnail Image</label>
            <input type="file"
                   id="thumbnail"
                   name="thumbnail"
                   accept="image/*"
                   class="w-full bg-gray-900 border border-gray-700 px-4 py-3 text-white focus:border-gray-500 focus:outline-none @error('thumbnail') border-red-500 @enderror">
            @error('thumbnail')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
            <p class="text-xs text-gray-500 mt-2">Max file size: 5MB</p>
        </div>

        <div>
            <label for="url" class="block text-sm text-gray-400 mb-2">Live URL</label>
            <input type="url"
                   id="url"
                   name="url"
                   value="{{ old('url') }}"
                   placeholder="https://example.com"
                   class="w-full bg-gray-900 border border-gray-700 px-4 py-3 text-white focus:border-gray-500 focus:outline-none @error('url') border-red-500 @enderror">
            @error('url')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="github_url" class="block text-sm text-gray-400 mb-2">GitHub URL</label>
            <input type="url"
                   id="github_url"
                   name="github_url"
                   value="{{ old('github_url') }}"
                   placeholder="https://github.com/username/repo"
                   class="w-full bg-gray-900 border border-gray-700 px-4 py-3 text-white focus:border-gray-500 focus:outline-none @error('github_url') border-red-500 @enderror">
            @error('github_url')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="technologies" class="block text-sm text-gray-400 mb-2">Technologies (comma separated)</label>
            <input type="text"
                   id="technologies"
                   name="technologies"
                   value="{{ old('technologies') }}"
                   placeholder="Laravel, Vue.js, Tailwind CSS"
                   class="w-full bg-gray-900 border border-gray-700 px-4 py-3 text-white focus:border-gray-500 focus:outline-none @error('technologies') border-red-500 @enderror">
            @error('technologies')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="order" class="block text-sm text-gray-400 mb-2">Display Order</label>
            <input type="number"
                   id="order"
                   name="order"
                   value="{{ old('order', 0) }}"
                   class="w-full bg-gray-900 border border-gray-700 px-4 py-3 text-white focus:border-gray-500 focus:outline-none @error('order') border-red-500 @enderror">
            @error('order')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
            <p class="text-xs text-gray-500 mt-2">Lower numbers appear first</p>
        </div>

        <div class="flex items-center">
            <input type="checkbox"
                   id="featured"
                   name="featured"
                   value="1"
                   {{ old('featured') ? 'checked' : '' }}
                   class="w-4 h-4 bg-gray-900 border-gray-700">
            <label for="featured" class="ml-2 text-sm text-gray-400">Feature on homepage</label>
        </div>

        <div class="flex gap-4 pt-4">
            <button type="submit" class="px-6 py-3 bg-[#1e3a5f] text-white hover:bg-[#2a4a73] transition-colors text-sm">
                Create Project
            </button>
            <a href="{{ route('admin.projects.index') }}" class="px-6 py-3 border border-gray-700 hover:border-gray-500 transition-colors text-sm">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
