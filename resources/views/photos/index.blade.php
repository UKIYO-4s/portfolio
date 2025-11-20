@extends('layouts.app')

@section('title', 'Photography - Portfolio')

@section('content')
<div class="py-24 px-6 sm:px-8 lg:px-12 max-w-7xl mx-auto">
    <div class="mb-16">
        <h1 class="text-5xl md:text-6xl font-thin tracking-wide mb-6">Photography</h1>
        <p class="text-xl text-gray-400 font-light max-w-2xl">
            Capturing moments through the lens.
        </p>
    </div>

    @if($categories->count() > 0)
        <div class="flex flex-wrap gap-3 mb-12">
            <a href="{{ route('photos.index') }}"
               class="px-4 py-2 text-sm {{ !request('category') ? 'bg-[#1e3a5f] text-white' : 'border border-gray-700 text-gray-400 hover:border-gray-500' }} transition-all">
                All
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('photos.index', ['category' => $cat]) }}"
                   class="px-4 py-2 text-sm {{ request('category') === $cat ? 'bg-[#1e3a5f] text-white' : 'border border-gray-700 text-gray-400 hover:border-gray-500' }} transition-all">
                    {{ $cat }}
                </a>
            @endforeach
        </div>
    @endif

    @if($photos->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12" id="photo-gallery">
            @foreach($photos as $photo)
            <div class="group relative aspect-square overflow-hidden bg-gray-900 cursor-pointer w-48 mx-auto"
                 onclick="openLightbox({{ $loop->index }})">
                @if($photo->image_path)
                    <img src="{{ asset('storage/' . $photo->image_path) }}"
                         alt="{{ $photo->title }}"
                         class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-700">
                @endif

                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition-all duration-300 flex items-center justify-center">
                    <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-center p-6">
                        @if($photo->title)
                            <h3 class="text-lg font-light mb-2">{{ $photo->title }}</h3>
                        @endif
                        @if($photo->description)
                            <p class="text-sm text-gray-300 font-light">{{ Str::limit($photo->description, 60) }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <div class="text-center py-24">
            <p class="text-gray-400 text-lg">No photos to display yet.</p>
        </div>
    @endif
</div>

<div id="lightbox" class="fixed inset-0 bg-black bg-opacity-95 z-50 hidden items-center justify-center p-6" onclick="closeLightbox()">
    <button onclick="closeLightbox()" class="absolute top-6 right-6 text-white hover:text-gray-400 transition-colors">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    </button>

    <button onclick="event.stopPropagation(); previousImage()" class="absolute left-6 text-white hover:text-gray-400 transition-colors">
        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19l-7-7 7-7"></path>
        </svg>
    </button>

    <button onclick="event.stopPropagation(); nextImage()" class="absolute right-6 text-white hover:text-gray-400 transition-colors">
        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 5l7 7-7 7"></path>
        </svg>
    </button>

    <div class="max-w-7xl max-h-full" onclick="event.stopPropagation()">
        <img id="lightbox-image" src="" alt="" class="max-w-full max-h-[85vh] object-contain">
        <div id="lightbox-info" class="mt-6 text-center"></div>
    </div>
</div>

<script>
    const photos = @json($photos->map(function($photo) {
        return [
            'image_path' => asset('storage/' . $photo->image_path),
            'title' => $photo->title,
            'description' => $photo->description
        ];
    }));

    let currentIndex = 0;

    function openLightbox(index) {
        currentIndex = index;
        updateLightbox();
        document.getElementById('lightbox').classList.remove('hidden');
        document.getElementById('lightbox').classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeLightbox() {
        document.getElementById('lightbox').classList.add('hidden');
        document.getElementById('lightbox').classList.remove('flex');
        document.body.style.overflow = 'auto';
    }

    function nextImage() {
        currentIndex = (currentIndex + 1) % photos.length;
        updateLightbox();
    }

    function previousImage() {
        currentIndex = (currentIndex - 1 + photos.length) % photos.length;
        updateLightbox();
    }

    function updateLightbox() {
        const photo = photos[currentIndex];
        document.getElementById('lightbox-image').src = photo.image_path;
        document.getElementById('lightbox-image').alt = photo.title || '';

        let info = '';
        if (photo.title) {
            info += `<h3 class="text-2xl font-light mb-2">${photo.title}</h3>`;
        }
        if (photo.description) {
            info += `<p class="text-gray-400 font-light">${photo.description}</p>`;
        }
        document.getElementById('lightbox-info').innerHTML = info;
    }

    document.addEventListener('keydown', function(e) {
        const lightbox = document.getElementById('lightbox');
        if (!lightbox.classList.contains('hidden')) {
            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowRight') nextImage();
            if (e.key === 'ArrowLeft') previousImage();
        }
    });
</script>
@endsection
