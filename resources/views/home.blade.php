@extends('layouts.app')

@section('title', 'SD-create - Digital Creator & Developer')

@section('content')
<div class="relative h-screen flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-black via-gray-900 to-black opacity-80"></div>
    <div class="relative z-10 text-center px-6">
        <p class="text-sm md:text-base font-light text-gray-400 mb-4 tracking-widest">SD-create</p>
        <h1 class="text-6xl md:text-8xl font-thin tracking-wide mb-6 animate-fade-in">
            Shoei Goto
        </h1>
        <p class="text-xl md:text-2xl font-light text-gray-400 mb-12 tracking-wide">
            Digital Creator & Developer
        </p>
        <div class="flex justify-center gap-8">
            <a href="{{ route('projects.index') }}" class="px-8 py-3 border border-white hover:bg-white hover:text-black transition-all duration-300 text-sm tracking-wider">
                Explore Work
            </a>
            <a href="{{ route('shop.index') }}" class="px-8 py-3 bg-[#1e3a5f] hover:bg-[#2a4a73] transition-all duration-300 text-sm tracking-wider">
                Digital Store
            </a>
        </div>
    </div>

    <div class="absolute bottom-12 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
        </svg>
    </div>
</div>

@if($featuredProjects->count() > 0)
<section class="py-24 px-6 sm:px-8 lg:px-12 max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-16">
        <h2 class="text-4xl font-thin tracking-wide">Selected Works</h2>
        <a href="{{ route('projects.index') }}" class="text-gray-400 hover:text-white transition-colors text-sm tracking-wider">
            View All →
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach($featuredProjects as $project)
        <a href="{{ route('projects.show', $project) }}" class="group block">
            <div class="aspect-[4/3] bg-gray-900 mb-4 overflow-hidden">
                @if($project->thumbnail)
                    <img src="{{ asset('storage/' . $project->thumbnail) }}" alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                @endif
            </div>
            <h3 class="text-xl font-light mb-2 group-hover:text-gray-400 transition-colors">{{ $project->title }}</h3>
            <p class="text-sm text-gray-400 font-light">{{ Str::limit($project->description, 80) }}</p>
        </a>
        @endforeach
    </div>
</section>
@endif

@if($featuredPhotos->count() > 0)
<section class="py-24 px-6 sm:px-8 lg:px-12 max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-16">
        <h2 class="text-4xl font-thin tracking-wide">Photography</h2>
        <a href="{{ route('photos.index') }}" class="text-gray-400 hover:text-white transition-colors text-sm tracking-wider">
            View All →
        </a>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        @foreach($featuredPhotos as $photo)
        <div class="aspect-square bg-gray-900 overflow-hidden group">
            @if($photo->image_path)
                <img src="{{ asset('storage/' . $photo->image_path) }}" alt="{{ $photo->title }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-105 transition-all duration-500">
            @endif
        </div>
        @endforeach
    </div>
</section>
@endif

@if($featuredProducts->count() > 0)
<section class="py-24 px-6 sm:px-8 lg:px-12 max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-16">
        <h2 class="text-4xl font-thin tracking-wide">Digital Collection</h2>
        <a href="{{ route('shop.index') }}" class="text-gray-400 hover:text-white transition-colors text-sm tracking-wider">
            Explore Store →
        </a>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6 max-w-5xl mx-auto">
        @foreach($featuredProducts as $product)
        <a href="{{ route('shop.show', $product) }}" class="group block">
            <div class="aspect-square bg-gray-900 mb-3 overflow-hidden">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-105 transition-all duration-500">
                @endif
            </div>
            <h3 class="text-sm font-light mb-1 group-hover:text-gray-400 transition-colors line-clamp-2">{{ $product->name }}</h3>
            <p class="text-sm text-gray-400 font-light">¥{{ number_format($product->price, 0) }}</p>
        </a>
        @endforeach
    </div>
</section>
@endif

<section class="py-32 px-6 bg-gradient-to-b from-black to-gray-900">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-5xl font-thin tracking-wide mb-8">Transform Ideas Into Reality</h2>
        <p class="text-xl text-gray-400 font-light mb-12">
            Ready to elevate your digital presence? Let's collaborate and build something remarkable.
        </p>
        <a href="mailto:contact@example.com" class="inline-block px-12 py-4 border border-white hover:bg-white hover:text-black transition-all duration-300 text-sm tracking-wider">
            Start a Conversation
        </a>
    </div>
</section>

<style>
    @keyframes fade-in {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fade-in 1s ease-out;
    }
</style>
@endsection
