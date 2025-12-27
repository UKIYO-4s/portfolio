@extends('admin.layouts.app')

@section('title', 'Add New Product - Admin')

@section('content')
<div class="max-w-3xl">
    <h1 class="text-4xl font-semibold tracking-normal font-display mb-8">Add New Product</h1>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label for="name" class="block text-sm text-gray-400 mb-2">Product Name *</label>
            <input type="text"
                   id="name"
                   name="name"
                   required
                   value="{{ old('name') }}"
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
                      class="w-full bg-gray-900 border border-gray-700 px-4 py-3 text-white focus:border-gray-500 focus:outline-none @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
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
                   value="{{ old('price') }}"
                   class="w-full bg-gray-900 border border-gray-700 px-4 py-3 text-white focus:border-gray-500 focus:outline-none @error('price') border-red-500 @enderror">
            @error('price')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="image" class="block text-sm text-gray-400 mb-2">Product Image</label>
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

        <div>
            <label for="product_type" class="block text-sm text-gray-400 mb-2">Product Type *</label>
            <select id="product_type"
                    name="product_type"
                    required
                    onchange="toggleFileField()"
                    class="w-full bg-gray-900 border border-gray-700 px-4 py-3 text-white focus:border-gray-500 focus:outline-none @error('product_type') border-red-500 @enderror">
                <option value="download" {{ old('product_type', 'download') == 'download' ? 'selected' : '' }}>Download (ダウンロード型)</option>
                <option value="account" {{ old('product_type') == 'account' ? 'selected' : '' }}>Account Access (アカウント発行型)</option>
            </select>
            @error('product_type')
                <p class="text-red-400 text-sm mt-2">{{ $message }}</p>
            @enderror
            <p class="text-xs text-gray-500 mt-2">ダウンロード型：ファイルをダウンロード提供 / アカウント発行型：システムへのアクセス権を提供</p>
        </div>

        <div id="file-field">
            <label for="file" class="block text-sm text-gray-400 mb-2">Digital Product File <span id="file-required">*</span></label>
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
                   {{ old('is_active', true) ? 'checked' : '' }}
                   class="w-4 h-4 bg-gray-900 border-gray-700">
            <label for="is_active" class="ml-2 text-sm text-gray-400">Active (available for purchase)</label>
        </div>

        <div class="flex gap-4 pt-4">
            <button type="submit" class="px-6 py-3 bg-[#1e3a5f] text-white hover:bg-[#2a4a73] transition-colors text-sm">
                Create Product
            </button>
            <a href="{{ route('admin.products.index') }}" class="px-6 py-3 border border-gray-700 hover:border-gray-500 transition-colors text-sm">
                Cancel
            </a>
        </div>
    </form>
</div>

<script>
function toggleFileField() {
    const productType = document.getElementById('product_type').value;
    const fileField = document.getElementById('file-field');
    const fileInput = document.getElementById('file');
    const fileRequired = document.getElementById('file-required');

    if (productType === 'account') {
        fileField.style.display = 'none';
        fileInput.removeAttribute('required');
        fileRequired.style.display = 'none';
    } else {
        fileField.style.display = 'block';
        fileInput.setAttribute('required', 'required');
        fileRequired.style.display = 'inline';
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    toggleFileField();
});
</script>
@endsection
