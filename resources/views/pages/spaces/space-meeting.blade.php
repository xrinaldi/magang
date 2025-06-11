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
                Host Productivity in Our Private Meeting Room
            </h1>

            <div class="mb-8">
                <img src="{{ asset('img/item-facilities/meeting-room.png') }}" alt="Host Productivity in Our Private Meeting Room"
                     class="w-full h-96 object-cover shadow-sm">
            </div>
            <div class="prose max-w-none text-[#4E3D33] leading-relaxed text-lg">
                Ruang meeting yang ideal untuk diskusi bisnis, presentasi, atau kolaborasi kreatif. Dilengkapi dengan fasilitas modern dan suasana yang kondusif untuk produktivitas. Tempat yang sempurna untuk mengadakan rapat, workshop, atau sesi brainstorming.
            </div>
        </div>

        <div class="w-2/6 min-h-[20rem] bg-[#FCECB9] m-8 p-6 h-fit space-y-3">
            <h3 class="text-xl font-bold text-[#653318]">Space & Facility</h3>
            <p class="font-bold break-words space-y-1">
                <a href="{{ route('space.funroom') }}" class="hover:underline">Fun Room</a><br>
                <a href="{{ route('space.garden') }}" class="hover:underline">Lush Green Garden</a><br>
                <a class="text-[#3D9BEF]" href="{{ route('space.meeting') }}">Meeting Room</a>
            </p>
        </div>
    </div>
</div>

@endsection