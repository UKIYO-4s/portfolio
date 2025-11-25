@extends('demo.full-custom.layouts.app')

@section('title', '会社概要')

@section('content')
<!-- Page Header -->
<div class="gradient-retro-pink py-16 border-b-4 border-gray-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
        <h1 class="text-5xl md:text-6xl font-bold text-gray-800 mb-4">
            About Funky Co!
        </h1>
        <p class="text-xl font-bold text-gray-800">
            {{ $company['mission'] }}
        </p>
    </div>
</div>

<!-- Company Story -->
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-20">
    <div class="gradient-retro-orange p-12 rounded-3xl border-4 border-gray-800 retro-shadow mb-20">
        <h2 class="text-4xl font-bold text-gray-800 mb-6 text-center">Our Story</h2>
        <p class="text-xl text-gray-800 leading-relaxed text-center max-w-4xl mx-auto">
            {{ $company['description'] }}
        </p>
        <div class="mt-8 text-center">
            <p class="text-2xl font-bold text-gray-800">
                Est. {{ $company['established'] }}
            </p>
        </div>
    </div>

    <!-- Values -->
    <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-12">
        Our Values
    </h2>

    <div class="grid md:grid-cols-2 gap-8 mb-20">
        @php
            $bgColors = ['bg-pink-400', 'bg-cyan-400', 'bg-orange-400', 'bg-pink-300'];
            $valueIcons = [
                '<svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>',
                '<svg class="w-12 h-12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
                '<svg class="w-12 h-12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>',
                '<svg class="w-12 h-12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>'
            ];
        @endphp

        @foreach($company['values'] as $valueName => $valueDescription)
            <div class="{{ $bgColors[$loop->index] }} p-8 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover-subtle">
                <div class="w-16 h-16 bg-white rounded-xl border-4 border-gray-800 flex items-center justify-center mb-4 text-gray-800">
                    {!! $valueIcons[$loop->index] !!}
                </div>
                <h3 class="text-3xl font-bold text-gray-800 mb-3">{{ $valueName }}</h3>
                <p class="text-xl text-gray-800 font-bold">{{ $valueDescription }}</p>
            </div>
        @endforeach
    </div>
</div>

<!-- Team Section -->
<div class="gradient-retro-cyan py-20 border-t-4 border-b-4 border-gray-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-16">
            Meet Our Team!
        </h2>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Team Member 1 -->
            <div class="bg-orange-400 p-8 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover-subtle">
                <div class="w-48 h-48 mx-auto bg-white rounded-full border-4 border-gray-800 mb-6 flex items-center justify-center">
                    <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 text-center mb-2">Alex Groove</h3>
                <p class="text-xl font-bold text-center text-gray-800 mb-4">Founder & CEO</p>
                <p class="text-gray-800 text-center">
                    The mastermind behind all the funky ideas!
                </p>
            </div>

            <!-- Team Member 2 -->
            <div class="bg-cyan-400 p-8 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover-subtle">
                <div class="w-48 h-48 mx-auto bg-white rounded-full border-4 border-gray-800 mb-6 flex items-center justify-center">
                    <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 text-center mb-2">Retro Betty</h3>
                <p class="text-xl font-bold text-center text-gray-800 mb-4">Lead Designer</p>
                <p class="text-gray-800 text-center">
                    Brings the 70s vibes to life with stunning designs!
                </p>
            </div>

            <!-- Team Member 3 -->
            <div class="bg-pink-400 p-8 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover-subtle">
                <div class="w-48 h-48 mx-auto bg-white rounded-full border-4 border-gray-800 mb-6 flex items-center justify-center">
                    <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/></svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 text-center mb-2">Disco Dan</h3>
                <p class="text-xl font-bold text-center text-gray-800 mb-4">Head of Production</p>
                <p class="text-gray-800 text-center">
                    Makes sure everything runs smoothly and groovy!
                </p>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-20">
    <div class="gradient-retro-orange p-12 md:p-16 rounded-3xl border-4 border-gray-800 retro-shadow text-center">
        <h2 class="text-4xl font-bold text-gray-800 mb-6">
            Want to Join Us?
        </h2>
        <p class="text-xl font-bold text-gray-800 mb-8">
            We're always looking for funky people!
        </p>
        <a href="{{ route('demo.full-custom.contact') }}"
           class="inline-block px-10 py-4 bg-cyan-400 text-gray-800 text-xl font-bold rounded-3xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
            Get in Touch
        </a>
    </div>
</div>
@endsection
