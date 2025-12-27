@extends('admin.layouts.app')

@section('title', 'Edit Product - Admin')

@section('content')
<div class="max-w-3xl">
    <h1 class="text-4xl font-semibold tracking-normal font-display mb-8">Edit Product</h1>

    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm text-gray-400 mb-2">Product Name *</label>
            <input type="text"
                   id="name"
                   name="name"
                   required
                   value="{{ old('name', $product->name) }}"
                   class="w-full bg-gray-900 border border-gray-700 px-4 py-3 text-white focus:border-gray-500 focus:outline-none @error('name') border-red-500 @enderror">
            @error('name')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description" class="block text-sm text-gray-400 mb-2">Description</label>
            <textarea id="description"
                      name="description"
                      rows="6"
                      class="w-full bg-gray-900 border border-gray-700 px-4 py-3 text-white focus:border-gray-500 focus:outline-none @error('description') border-red-500 @enderror">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="price" class="block text-sm text-gray-400 mb-2">Price (¥) *</label>
            <input type="number"
                   id="price"
                   name="price"
                   required
                   step="0.01"
                   min="0"
                   value="{{ old('price', $product->price) }}"
                   class="w-full bg-gray-900 border border-gray-700 px-4 py-3 text-white focus:border-gray-500 focus:outline-none @error('price') border-red-500 @enderror">
            @error('price')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        @if($product->image)
            <div>
                <label class="block text-sm text-gray-400 mb-2">Current Image</label>
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-48 h-48 object-cover border border-gray-700">
            </div>
        @endif

        <div>
            <label for="image" class="block text-sm text-gray-400 mb-2">{{ $product->image ? 'Replace Image' : 'Product Image' }}</label>
            <input type="file"
                   id="image"
                   name="image"
                   accept="image/*"
                   class="w-full bg-gray-900 border border-gray-700 px-4 py-3 text-white focus:border-gray-500 focus:outline-none @error('image') border-red-500 @enderror">
            @error('image')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
            <p class="text-xs text-gray-500 mt-2">Max file size: 5MB</p>
        </div>

        @if($product->file_path)
            <div>
                <label class="block text-sm text-gray-400 mb-2">Current File</label>
                <div class="bg-gray-800 border border-gray-700 px-4 py-3">
                    <div class="text-white">{{ $product->file_name }}</div>
                    <div class="text-sm text-gray-400 mt-1">{{ number_format($product->file_size / 1024 / 1024, 2) }} MB</div>
                </div>
            </div>
        @endif

        <div>
            <label for="file" class="block text-sm text-gray-400 mb-2">{{ $product->file_path ? 'Replace File' : 'Digital Product File' }}</label>
            <input type="file"
                   id="file"
                   name="file"
                   class="w-full bg-gray-900 border border-gray-700 px-4 py-3 text-white focus:border-gray-500 focus:outline-none @error('file') border-red-500 @enderror">
            @error('file')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
            <p class="text-xs text-gray-500 mt-2">Max file size: 100MB (ZIP, PDF, etc.)</p>
        </div>

        <div class="flex items-center">
            <input type="checkbox"
                   id="is_active"
                   name="is_active"
                   value="1"
                   {{ old('is_active', $product->is_active) ? 'checked' : '' }}
                   class="w-4 h-4 bg-gray-900 border-gray-700">
            <label for="is_active" class="ml-2 text-sm text-gray-400">Active (available for purchase)</label>
        </div>

        <div class="bg-gray-900 border border-gray-700 px-4 py-3">
            <div class="text-sm text-gray-400">Downloads: <span class="text-white">{{ $product->downloads }}</span></div>
        </div>

        <div class="flex gap-4 pt-4">
            <button type="submit" class="px-6 py-3 bg-[#1e3a5f] text-white hover:bg-[#2a4a73] transition-colors text-sm">
                Update Product
            </button>
            <a href="{{ route('admin.products.index') }}" class="px-6 py-3 border border-gray-700 hover:border-gray-500 transition-colors text-sm">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
