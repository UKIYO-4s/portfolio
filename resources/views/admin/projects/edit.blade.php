@extends('admin.layouts.app')

@section('title', 'Edit Project - Admin')

@section('content')
<div class="max-w-3xl">
    <h1 class="text-4xl font-semibold tracking-normal font-display mb-8">Edit Project</h1>

    <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="title" class="block text-sm text-gray-400 mb-2">Title *</label>
            <input type="text"
                   id="title"
                   name="title"
                   required
                   value="{{ old('title', $project->title) }}"
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
                      class="w-full bg-gray-900 border border-gray-700 px-4 py-3 text-white focus:border-gray-500 focus:outline-none @error('description') border-red-500 @enderror">{{ old('description', $project->description) }}</textarea>
            @error('description')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        @if($project->thumbnail)
            <div>
                <label class="block text-sm text-gray-400 mb-2">Current Thumbnail</label>
                <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}" class="w-32 h-32 object-cover border border-gray-700">
            </div>
        @endif

        <div>
            <label for="thumbnail" class="block text-sm text-gray-400 mb-2">{{ $project->thumbnail ? 'Replace Thumbnail' : 'Thumbnail Image' }}</label>
            <input type="file"
                   id="thumbnail"
                   name="thumbnail"
                   accept="image/*"
                   class="w-full bg-gray-900 border border-gray-700 px-4 py-3 text-white focus:border-gray-500 focus:outline-none @error('thumbnail') border-red-500 @enderror">
            @error('thumbnail')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="url" class="block text-sm text-gray-400 mb-2">Live URL</label>
            <input type="url"
                   id="url"
                   name="url"
                   value="{{ old('url', $project->url) }}"
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
                   value="{{ old('github_url', $project->github_url) }}"
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
                   value="{{ old('technologies', is_array($project->technologies) ? implode(', ', $project->technologies) : '') }}"
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
                   value="{{ old('order', $project->order) }}"
                   class="w-full bg-gray-900 border border-gray-700 px-4 py-3 text-white focus:border-gray-500 focus:outline-none @error('order') border-red-500 @enderror">
            @error('order')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center">
            <input type="checkbox"
                   id="featured"
                   name="featured"
                   value="1"
                   {{ old('featured', $project->featured) ? 'checked' : '' }}
                   class="w-4 h-4 bg-gray-900 border-gray-700">
            <label for="featured" class="ml-2 text-sm text-gray-400">Feature on homepage</label>
        </div>

        <div class="flex gap-4 pt-4">
            <button type="submit" class="px-6 py-3 bg-[#1e3a5f] text-white hover:bg-[#2a4a73] transition-colors text-sm">
                Update Project
            </button>
            <a href="{{ route('admin.projects.index') }}" class="px-6 py-3 border border-gray-700 hover:border-gray-500 transition-colors text-sm">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
