@extends('demo.full-custom.layouts.app')

@section('title', '会社概要')

@section('content')
<!-- Page Header -->
<div class="bg-gradient-to-r from-purple-400 to-cyan-400 py-16 border-b-4 border-gray-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 text-center">
        <h1 class="text-5xl md:text-6xl font-bold text-gray-800 mb-4">
            About Funky Co! 🎨
        </h1>
        <p class="text-xl font-bold text-gray-800">
            {{ $company['mission'] }}
        </p>
    </div>
</div>

<!-- Company Story -->
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-20">
    <div class="bg-gradient-to-r from-orange-400 to-yellow-400 p-12 rounded-3xl border-4 border-gray-800 retro-shadow mb-20">
        <h2 class="text-4xl font-bold text-gray-800 mb-6 text-center">Our Story 📖</h2>
        <p class="text-xl text-gray-800 leading-relaxed text-center max-w-4xl mx-auto">
            {{ $company['description'] }}
        </p>
        <div class="mt-8 text-center">
            <p class="text-2xl font-bold text-gray-800">
                Est. {{ $company['established'] }} 🎉
            </p>
        </div>
    </div>

    <!-- Values -->
    <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-12">
        Our Values 💎
    </h2>

    <div class="grid md:grid-cols-2 gap-8 mb-20">
        @php
            $bgColors = ['bg-pink-400', 'bg-cyan-400', 'bg-yellow-400', 'bg-purple-400'];
            $valueIcons = ['✨', '🎉', '⭐', '🤝'];
        @endphp

        @foreach($company['values'] as $valueName => $valueDescription)
            <div class="{{ $bgColors[$loop->index] }} p-8 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover">
                <div class="text-6xl mb-4">{{ $valueIcons[$loop->index] }}</div>
                <h3 class="text-3xl font-bold text-gray-800 mb-3">{{ $valueName }}</h3>
                <p class="text-xl text-gray-800 font-bold">{{ $valueDescription }}</p>
            </div>
        @endforeach
    </div>
</div>

<!-- Team Section -->
<div class="bg-gradient-to-r from-green-400 to-orange-400 py-20 border-t-4 border-b-4 border-gray-800">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <h2 class="text-4xl md:text-5xl font-bold text-center text-gray-800 mb-16">
            Meet Our Team! 👋
        </h2>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Team Member 1 -->
            <div class="bg-orange-400 p-8 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover">
                <div class="w-48 h-48 mx-auto bg-white rounded-full border-4 border-gray-800 mb-6 flex items-center justify-center">
                    <div class="text-7xl">👨‍🎨</div>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 text-center mb-2">Alex Groove</h3>
                <p class="text-xl font-bold text-center text-gray-800 mb-4">Founder & CEO</p>
                <p class="text-gray-800 text-center">
                    The mastermind behind all the funky ideas!
                </p>
            </div>

            <!-- Team Member 2 -->
            <div class="bg-yellow-400 p-8 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover">
                <div class="w-48 h-48 mx-auto bg-white rounded-full border-4 border-gray-800 mb-6 flex items-center justify-center">
                    <div class="text-7xl">👩‍💻</div>
                </div>
                <h3 class="text-2xl font-bold text-gray-800 text-center mb-2">Retro Betty</h3>
                <p class="text-xl font-bold text-center text-gray-800 mb-4">Lead Designer</p>
                <p class="text-gray-800 text-center">
                    Brings the 70s vibes to life with stunning designs!
                </p>
            </div>

            <!-- Team Member 3 -->
            <div class="bg-cyan-400 p-8 rounded-2xl border-4 border-gray-800 retro-shadow bounce-hover">
                <div class="w-48 h-48 mx-auto bg-white rounded-full border-4 border-gray-800 mb-6 flex items-center justify-center">
                    <div class="text-7xl">👨‍🔧</div>
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
    <div class="bg-gradient-to-r from-pink-400 to-purple-400 p-12 md:p-16 rounded-3xl border-4 border-gray-800 retro-shadow text-center">
        <h2 class="text-4xl font-bold text-gray-800 mb-6">
            Want to Join Us? 🚀
        </h2>
        <p class="text-xl font-bold text-gray-800 mb-8">
            We're always looking for funky people!
        </p>
        <a href="{{ route('demo.full-custom.contact') }}"
           class="inline-block px-10 py-4 bg-yellow-400 text-gray-800 text-xl font-bold rounded-3xl border-4 border-gray-800 retro-shadow bounce-hover btn-retro">
            Get in Touch! 📧
        </a>
    </div>
</div>
@endsection
