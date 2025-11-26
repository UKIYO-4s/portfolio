@extends('demo.brutalist.layouts.app')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<section class="py-16 md:py-20 relative overflow-hidden">
    <div class="max-w-6xl mx-auto px-6 md:px-10">
        <div class="relative z-10">
            <!-- Hero Content -->
            <div class="max-w-3xl">
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-extrabold tracking-tight leading-none mb-8 uppercase">
                    Design<br>Without<br>Compromise
                </h1>
                <p class="text-lg md:text-xl text-gray font-medium tracking-wide mb-10 max-w-xl">
                    We build bold digital experiences. No fluff. No compromise. Just raw, functional design that works.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#contact" class="btn-black px-10 py-4 text-sm font-bold tracking-widest text-center uppercase">
                        Start Project
                    </a>
                    <a href="#services" class="btn-white px-10 py-4 text-sm font-bold tracking-widest text-center uppercase">
                        Our Services
                    </a>
                </div>
            </div>
        </div>

        <!-- Decorative Elements -->
        <div class="absolute top-32 right-32 w-32 h-32 stripes-bg hidden lg:block"></div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-16 md:py-20 bg-white reveal">
    <div class="max-w-6xl mx-auto px-6 md:px-10">
        <div class="mb-12">
            <h2 class="text-4xl md:text-5xl font-extrabold tracking-tight uppercase">Services</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Service 1 -->
            <div class="service-box p-8 bg-white relative">
                <span class="absolute top-4 left-4 text-xs font-extrabold tracking-widest text-gray">01</span>
                <div class="pt-8">
                    <h3 class="text-xl font-extrabold tracking-tight uppercase mb-4">Web Design</h3>
                    <p class="text-gray text-sm font-medium leading-relaxed">
                        Bold, functional websites that cut through the noise. No templates. No shortcuts.
                    </p>
                </div>
            </div>

            <!-- Service 2 -->
            <div class="service-box p-8 bg-white relative">
                <span class="absolute top-4 left-4 text-xs font-extrabold tracking-widest text-gray">02</span>
                <div class="pt-8">
                    <h3 class="text-xl font-extrabold tracking-tight uppercase mb-4">Branding</h3>
                    <p class="text-gray text-sm font-medium leading-relaxed">
                        Identity systems that make a statement. Memorable, distinctive, unapologetic.
                    </p>
                </div>
            </div>

            <!-- Service 3 -->
            <div class="service-box p-8 bg-white relative">
                <span class="absolute top-4 left-4 text-xs font-extrabold tracking-widest text-gray">03</span>
                <div class="pt-8">
                    <h3 class="text-xl font-extrabold tracking-tight uppercase mb-4">Development</h3>
                    <p class="text-gray text-sm font-medium leading-relaxed">
                        Clean code that performs. Fast, accessible, built to last.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Work/Feature Section -->
<section id="work" class="py-16 md:py-20 bg-black text-white reveal">
    <div class="max-w-6xl mx-auto px-6 md:px-10">
        <div class="mb-12">
            <h2 class="text-4xl md:text-5xl font-extrabold tracking-tight uppercase">Why Us</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Feature 1 -->
            <div class="border-4 border-white p-8">
                <span class="text-6xl md:text-7xl font-extrabold tracking-tighter">50+</span>
                <h3 class="text-xl font-extrabold tracking-tight uppercase mt-4 mb-2">Projects Delivered</h3>
                <p class="text-gray text-sm font-medium leading-relaxed">
                    From startups to established brands, we've shipped work that matters.
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="border-4 border-white p-8">
                <span class="text-6xl md:text-7xl font-extrabold tracking-tighter">100%</span>
                <h3 class="text-xl font-extrabold tracking-tight uppercase mt-4 mb-2">Client Focused</h3>
                <p class="text-gray text-sm font-medium leading-relaxed">
                    Direct communication. No account managers. You talk to the people doing the work.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section id="contact" class="py-16 md:py-20 bg-white reveal">
    <div class="max-w-6xl mx-auto px-6 md:px-10">
        <div class="border-4 border-black p-10 md:p-16 text-center">
            <h2 class="text-4xl md:text-5xl font-extrabold tracking-tight uppercase mb-6">
                Ready to Build?
            </h2>
            <p class="text-gray text-lg font-medium tracking-wide mb-10 max-w-xl mx-auto">
                Let's create something bold together. No pitch decks. No endless meetings. Just work.
            </p>
            <a href="#" class="btn-black px-12 py-4 text-sm font-bold tracking-widest inline-block uppercase">
                Get in Touch
            </a>
        </div>
    </div>
</section>
@endsection
