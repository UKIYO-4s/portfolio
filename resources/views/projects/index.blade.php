@extends('layouts.app')

@section('title', 'Projects - Portfolio')

@section('content')
<div class="py-24 px-6 sm:px-8 lg:px-12 max-w-7xl mx-auto">
    <div class="mb-16">
        <h1 class="text-5xl md:text-6xl font-thin tracking-wide mb-6">Projects</h1>
        <p class="text-xl text-gray-400 font-light max-w-2xl">
            A collection of selected works spanning web development, design, and creative coding.
        </p>
    </div>

    @if($projects->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
            @foreach($projects as $project)
            <a href="{{ route('projects.show', $project) }}" class="group block max-w-xs mx-auto">
                <div class="aspect-square bg-gray-900 mb-4 overflow-hidden w-48 mx-auto">
                    @if($project->thumbnail)
                        <img src="{{ asset('storage/' . $project->thumbnail) }}"
                             alt="{{ $project->title }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-all duration-500">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-600">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                </div>

                <div>
                    <h2 class="text-2xl font-light mb-3 group-hover:text-gray-400 transition-colors">
                        {{ $project->title }}
                    </h2>
                    <p class="text-gray-400 font-light mb-4 line-clamp-2">
                        {{ $project->description }}
                    </p>

                    @if($project->technologies)
                        <div class="flex flex-wrap gap-2">
                            @foreach($project->technologies as $tech)
                                <span class="text-xs px-3 py-1 border border-gray-700 text-gray-400">
                                    {{ $tech }}
                                </span>
                            @endforeach
                        </div>
                    @endif
                </div>
            </a>
            @endforeach
        </div>
    @else
        <div class="text-center py-24">
            <p class="text-gray-400 text-lg">No projects to display yet.</p>
        </div>
    @endif
</div>
@endsection
