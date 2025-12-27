@extends('admin.layouts.app')

@section('title', 'Projects - Admin')

@section('content')
<div>
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-4xl font-semibold tracking-normal font-display">Projects</h1>
        <a href="{{ route('admin.projects.create') }}" class="px-6 py-2 bg-[#1e3a5f] text-white hover:bg-[#2a4a73] transition-colors text-sm">
            Add New Project
        </a>
    </div>

    @if($projects->count() > 0)
        <div class="bg-gray-900 border border-gray-800">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-800">
                        <th class="text-left p-4 text-sm font-light text-gray-400">Order</th>
                        <th class="text-left p-4 text-sm font-light text-gray-400">Thumbnail</th>
                        <th class="text-left p-4 text-sm font-light text-gray-400">Title</th>
                        <th class="text-left p-4 text-sm font-light text-gray-400">Technologies</th>
                        <th class="text-left p-4 text-sm font-light text-gray-400">Featured</th>
                        <th class="text-right p-4 text-sm font-light text-gray-400">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                    <tr class="border-b border-gray-800 last:border-b-0 hover:bg-gray-800">
                        <td class="p-4">
                            <input type="number"
                                   value="{{ $project->order }}"
                                   class="w-20 bg-black border border-gray-700 px-2 py-1 text-sm"
                                   onchange="updateOrder({{ $project->id }}, this.value)">
                        </td>
                        <td class="p-4">
                            @if($project->thumbnail)
                                <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}" class="w-16 h-16 object-cover">
                            @else
                                <div class="w-16 h-16 bg-gray-800 flex items-center justify-center text-gray-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                        </td>
                        <td class="p-4">
                            <div class="font-light">{{ $project->title }}</div>
                            <div class="text-sm text-gray-400 mt-1">{{ Str::limit($project->description, 50) }}</div>
                        </td>
                        <td class="p-4">
                            @if($project->technologies)
                                <div class="flex flex-wrap gap-1">
                                    @foreach(array_slice($project->technologies, 0, 3) as $tech)
                                        <span class="text-xs px-2 py-1 bg-gray-800 text-gray-400">{{ $tech }}</span>
                                    @endforeach
                                    @if(count($project->technologies) > 3)
                                        <span class="text-xs px-2 py-1 bg-gray-800 text-gray-400">+{{ count($project->technologies) - 3 }}</span>
                                    @endif
                                </div>
                            @endif
                        </td>
                        <td class="p-4">
                            @if($project->featured)
                                <span class="text-xs px-2 py-1 bg-green-900/30 text-green-400">Featured</span>
                            @endif
                        </td>
                        <td class="p-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.projects.edit', $project) }}" class="px-3 py-1 text-sm border border-gray-700 hover:border-gray-500 transition-colors">
                                    Edit
                                </a>
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
            No projects yet. <a href="{{ route('admin.projects.create') }}" class="text-white hover:underline">Create your first project</a>
        </div>
    @endif
</div>

<script>
function updateOrder(projectId, order) {
    fetch(`/admin/projects/${projectId}/reorder`, {
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
