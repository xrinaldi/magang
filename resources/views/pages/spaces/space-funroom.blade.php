@extends('index')

@section('content')

<div class="pt-20"/>
<div class="container mx-auto px-4 py-8 md:py-12">
    <div class="flex flex-col lg:flex-row gap-8">
        <div class="lg:w-4/6">
            <div class="mb-6">
                <a href="{{ url('/') }}" class="inline-flex items-center hover:text-[#653318] font-bold">
                    <i class="fas fa-arrow-left mr-1"></i>
                    Kembali ke Home
                </a>
            </div>

            <h1 class="text-3xl md:text-4xl font-extrabold mb-6 break-words">
                Level Up Your Fun in Our Cozy Gaming Room
            </h1>

            <div class="mb-8">
                <img src="{{ asset('img/item-facilities/fun-room.jpg') }}" alt="Level Up Your Fun in Our Cozy Gaming Room"
                     class="w-full h-96 object-cover shadow-sm">
            </div>
            <div class="prose max-w-none text-[#4E3D33] leading-relaxed text-lg">
                Habis meeting atau nugas, saatnya bersantai! Main bareng teman atau sekadar melepas stres di gaming room kami yang cozy. Suasana kasual dan santai bikin sesi main jadi makin seru.
            </div>
        </div>

        <div class="w-2/6 min-h-[20rem] bg-[#FCECB9] m-8 p-6 h-fit space-y-3">
            <h3 class="text-xl font-bold text-[#653318]">Space & Facility</h3>
            <p class="font-bold break-words space-y-1">
                <a class="text-[#3D9BEF]" href="{{ route('space.funroom') }}">Fun Room</a><br>
                <a href="{{ route('space.garden') }}" class="hover:underline">Lush Green Garden</a><br>
                <a href="{{ route('space.meeting') }}" class="hover:underline">Meeting Room</a>
            </p>
        </div>
    </div>
</div>

@endsection