@extends('admin.layouts.app')

@section('title', 'Products - Admin')

@section('content')
<div>
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-thin tracking-wide">Products</h1>
        <a href="{{ route('admin.products.create') }}" class="px-6 py-2 bg-[#1e3a5f] text-white hover:bg-[#2a4a73] transition-colors text-sm">
            Add New Product
        </a>
    </div>

    @if($products->count() > 0)
        <div class="bg-gray-900 border border-gray-800">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-800">
                        <th class="text-left p-4 text-sm font-light text-gray-400">Image</th>
                        <th class="text-left p-4 text-sm font-light text-gray-400">Name</th>
                        <th class="text-left p-4 text-sm font-light text-gray-400">Price</th>
                        <th class="text-left p-4 text-sm font-light text-gray-400">Downloads</th>
                        <th class="text-left p-4 text-sm font-light text-gray-400">Status</th>
                        <th class="text-right p-4 text-sm font-light text-gray-400">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr class="border-b border-gray-800 last:border-b-0 hover:bg-gray-800">
                        <td class="p-4">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover">
                            @else
                                <div class="w-16 h-16 bg-gray-800 flex items-center justify-center text-gray-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                        </td>
                        <td class="p-4">
                            <div class="font-light">{{ $product->name }}</div>
                            <div class="text-sm text-gray-400 mt-1">{{ Str::limit($product->description, 50) }}</div>
                            @if($product->file_name)
                                <div class="text-xs text-gray-500 mt-1">{{ $product->file_name }} ({{ number_format($product->file_size / 1024 / 1024, 2) }} MB)</div>
                            @endif
                        </td>
                        <td class="p-4">
                            <span class="text-lg">&yen;{{ number_format($product->price) }}</span>
                        </td>
                        <td class="p-4">
                            <span class="text-gray-400">{{ $product->downloads }}</span>
                        </td>
                        <td class="p-4">
                            @if($product->is_active)
                                <span class="text-xs px-2 py-1 bg-green-900/30 text-green-400">Active</span>
                            @else
                                <span class="text-xs px-2 py-1 bg-gray-800 text-gray-400">Inactive</span>
                            @endif
                        </td>
                        <td class="p-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.products.edit', $product) }}" class="px-3 py-1 text-sm border border-gray-700 hover:border-gray-500 transition-colors">
                                    Edit
                                </a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure? This will delete the product and its files.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 text-sm border border-red-800 text-red-400 hover:border-red-600 transition-colors">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="bg-gray-900 border border-gray-800 p-12 text-center text-gray-400">
            No products yet. <a href="{{ route('admin.products.create') }}" class="text-white hover:underline">Create your first product</a>
        </div>
    @endif
</div>
@endsection
