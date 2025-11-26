@extends('demo.retro-terminal.layouts.app')

@section('title', 'About')

@section('content')
<div class="px-6 py-16 md:py-24">
    <div class="max-w-4xl mx-auto">
        <!-- Page Header -->
        <div class="text-center mb-16">
            <h1 class="font-8bit text-xl md:text-3xl tracking-wider text-glow mb-4">
                ABOUT_US<span class="cursor-blink">|</span>
            </h1>
            <p class="text-lg opacity-70">Who we are and what we do</p>
        </div>

        <!-- Mission Section -->
        <div class="card-retro p-8 md:p-12 mb-8">
            <div class="flex items-center gap-3 mb-6">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
                <h2 class="font-8bit text-sm md:text-base">OUR_MISSION</h2>
            </div>
            <p class="text-lg leading-relaxed opacity-80 font-vt323 text-xl">
                We bridge the gap between nostalgic aesthetics and modern functionality.
                Our mission is to create digital experiences that honor the past while
                embracing the future of technology.
            </p>
        </div>

        <!-- Stats Grid -->
        <div class="grid md:grid-cols-3 gap-6 mb-12">
            <div class="card-retro p-6 text-center">
                <div class="font-8bit text-2xl md:text-3xl text-glow mb-2">10+</div>
                <p class="font-vt323 text-lg opacity-70">YEARS EXPERIENCE</p>
            </div>
            <div class="card-retro p-6 text-center">
                <div class="font-8bit text-2xl md:text-3xl text-glow mb-2">500+</div>
                <p class="font-vt323 text-lg opacity-70">PROJECTS COMPLETED</p>
            </div>
            <div class="card-retro p-6 text-center">
                <div class="font-8bit text-2xl md:text-3xl text-glow mb-2">99%</div>
                <p class="font-vt323 text-lg opacity-70">CLIENT SATISFACTION</p>
            </div>
        </div>

        <!-- Story Section -->
        <div class="card-retro p-8 md:p-12 mb-8">
            <div class="flex items-center gap-3 mb-6">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                <h2 class="font-8bit text-sm md:text-base">OUR_STORY</h2>
            </div>
            <div class="space-y-4 font-vt323 text-xl opacity-80">
                <p>
                    Founded by a team of developers who grew up in the golden age of computing,
                    TERMINAL_ was born from a passion for the aesthetic beauty of early computer interfaces.
                </p>
                <p>
                    We believe that great design doesn't have to choose between form and function.
                    Our retro-inspired interfaces are built on modern technology stacks, ensuring
                    performance and accessibility while delivering unique visual experiences.
                </p>
                <p>
                    Every project we undertake is an opportunity to create something memorable -
                    a digital experience that stands out in a world of sameness.
                </p>
            </div>
        </div>

        <!-- Values Section -->
        <div class="card-retro p-8 md:p-12">
            <div class="flex items-center gap-3 mb-8">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                </svg>
                <h2 class="font-8bit text-sm md:text-base">OUR_VALUES</h2>
            </div>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="flex items-start gap-4">
                    <span class="font-8bit text-xs opacity-50">01</span>
                    <div>
                        <h3 class="font-vt323 text-xl mb-2">CRAFTSMANSHIP</h3>
                        <p class="opacity-70 text-sm">Every pixel matters. We obsess over details.</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <span class="font-8bit text-xs opacity-50">02</span>
                    <div>
                        <h3 class="font-vt323 text-xl mb-2">INNOVATION</h3>
                        <p class="opacity-70 text-sm">Old aesthetics, new technology.</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <span class="font-8bit text-xs opacity-50">03</span>
                    <div>
                        <h3 class="font-vt323 text-xl mb-2">TRANSPARENCY</h3>
                        <p class="opacity-70 text-sm">Clear communication, no hidden costs.</p>
                    </div>
                </div>
                <div class="flex items-start gap-4">
                    <span class="font-8bit text-xs opacity-50">04</span>
                    <div>
                        <h3 class="font-vt323 text-xl mb-2">RELIABILITY</h3>
                        <p class="opacity-70 text-sm">We deliver on time, every time.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- CTA -->
        <div class="text-center mt-12">
            <a href="{{ route('demo.retro-terminal.contact') }}" class="btn-retro font-vt323 text-lg inline-block">
                GET IN TOUCH
            </a>
        </div>
    </div>
</div>
@endsection
