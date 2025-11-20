@extends('admin.layouts.app')

@section('title', 'Add New Photo - Admin')

@section('content')
<div class="max-w-3xl">
    <h1 class="text-4xl font-thin tracking-wide mb-8">Add New Photo</h1>

    <form action="{{ route('admin.photos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
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
            <label for="image" class="block text-sm text-gray-400 mb-2">Image *</label>
            <input type="file"
                   id="image"
                   name="image"
                   accept="image/*"
                   required
                   class="w-full bg-gray-900 border border-gray-700 px-4 py-3 text-white focus:border-gray-500 focus:outline-none @error('image') border-red-500 @enderror">
            @error('image')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
            <p class="text-xs text-gray-500 mt-2">Max file size: 5MB</p>
        </div>

        <div>
            <label for="category" class="block text-sm text-gray-400 mb-2">Category (タグ)</label>

            @if($existingCategories->count() > 0)
                <div class="mb-3">
                    <label class="block text-xs text-gray-500 mb-2">既存のカテゴリーから選択</label>
                    <select id="category-select"
                            class="w-full bg-gray-900 border border-gray-700 px-4 py-3 text-white focus:border-gray-500 focus:outline-none"
                            onchange="document.getElementById('category').value = this.value">
                        <option value="">-- 選択してください --</option>
                        @foreach($existingCategories as $cat)
                            <option value="{{ $cat }}">{{ $cat }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            <label for="category" class="block text-xs text-gray-500 mb-2">または新しいカテゴリーを入力</label>
            <input type="text"
                   id="category"
                   name="category"
                   value="{{ old('category') }}"
                   placeholder="Nature, Portrait, Architecture, etc."
                   class="w-full bg-gray-900 border border-gray-700 px-4 py-3 text-white focus:border-gray-500 focus:outline-none @error('category') border-red-500 @enderror">
            @error('category')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="order" class="block text-sm text-gray-400 mb-2">Display Order (表示順序)</label>
            <input type="number"
                   id="order"
                   name="order"
                   value="{{ old('order', 0) }}"
                   class="w-full bg-gray-900 border border-gray-700 px-4 py-3 text-white focus:border-gray-500 focus:outline-none @error('order') border-red-500 @enderror">
            @error('order')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
            <p class="text-xs text-gray-500 mt-2">数字が小さいほど先に表示されます (例: 1が最初、2が次)</p>
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
                Upload Photo
            </button>
            <a href="{{ route('admin.photos.index') }}" class="px-6 py-3 border border-gray-700 hover:border-gray-500 transition-colors text-sm">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
