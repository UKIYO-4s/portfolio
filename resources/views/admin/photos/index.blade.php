@extends('admin.layouts.app')

@section('title', 'Photos - Admin')

@section('content')
<div>
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-thin tracking-wide">Photos</h1>
        <a href="{{ route('admin.photos.create') }}" class="px-6 py-2 bg-[#1e3a5f] text-white hover:bg-[#2a4a73] transition-colors text-sm">
            Add New Photo
        </a>
    </div>

    @if($photos->count() > 0)
        <div class="bg-gray-900 border border-gray-800">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-800">
                        <th class="text-left p-4 text-sm font-light text-gray-400">Order</th>
                        <th class="text-left p-4 text-sm font-light text-gray-400">Image</th>
                        <th class="text-left p-4 text-sm font-light text-gray-400">Title</th>
                        <th class="text-left p-4 text-sm font-light text-gray-400">Category</th>
                        <th class="text-left p-4 text-sm font-light text-gray-400">Featured</th>
                        <th class="text-right p-4 text-sm font-light text-gray-400">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($photos as $photo)
                    <tr class="border-b border-gray-800 last:border-b-0 hover:bg-gray-800">
                        <td class="p-4">
                            <input type="number"
                                   value="{{ $photo->order }}"
                                   class="w-20 bg-black border border-gray-700 px-2 py-1 text-sm"
                                   onchange="updateOrder({{ $photo->id }}, this.value)">
                        </td>
                        <td class="p-4">
                            @if($photo->image_path)
                                <img src="{{ asset('storage/' . $photo->image_path) }}" alt="{{ $photo->title }}" class="w-20 h-20 object-cover">
                            @else
                                <div class="w-20 h-20 bg-gray-800 flex items-center justify-center text-gray-600">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                        </td>
                        <td class="p-4">
                            <div class="font-light">{{ $photo->title }}</div>
                            @if($photo->description)
                                <div class="text-sm text-gray-400 mt-1">{{ Str::limit($photo->description, 50) }}</div>
                            @endif
                        </td>
                        <td class="p-4">
                            @if($photo->category)
                                <span class="text-xs px-2 py-1 bg-gray-800 text-gray-400">{{ $photo->category }}</span>
                            @endif
                        </td>
                        <td class="p-4">
                            @if($photo->featured)
                                <span class="text-xs px-2 py-1 bg-green-900/30 text-green-400">Featured</span>
                            @endif
                        </td>
                        <td class="p-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.photos.edit', $photo) }}" class="px-3 py-1 text-sm border border-gray-700 hover:border-gray-500 transition-colors">
                                    Edit
                                </a>
                                <form action="{{ route('admin.photos.destroy', $photo) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
            No photos yet. <a href="{{ route('admin.photos.create') }}" class="text-white hover:underline">Upload your first photo</a>
        </div>
    @endif
</div>

<script>
function updateOrder(photoId, order) {
    fetch(`/admin/photos/${photoId}/reorder`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ order: parseInt(order) })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        }
    });
}
</script>
@endsection
