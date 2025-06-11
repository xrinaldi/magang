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
                Promo Coffee Time
            </h1>

            <div class="mb-8">
                <img src="{{ asset('img/promos/coffeetime-landscape.png') }}" alt="Promo Coffee Time"
                     class="w-full h-96 object-cover shadow-sm">
            </div>
            <div class="prose max-w-none text-[#4E3D33] leading-relaxed text-lg">
                Kamu bisa menggunakan promo ini untuk up to 50% diskon dari transaksi kamu di Dugg Coffee. Untuk syarat dan ketentuan, bisa ditanyakan ke kasir.
            </div>
        </div>

        <div class="w-2/6 min-h-[20rem] bg-[#FCECB9] m-8 p-6 h-fit space-y-3">
            <h3 class="text-xl font-bold text-[#653318]">Space & Facility</h3>
            <p class="font-bold break-words space-y-1">
                <a class="text-[#3D9BEF]" href="{{ route('promo.coffeetime') }}">Promo Coffee Time</a><br>
                <a href="{{ route('promo.student') }}" class="hover:underline">Promo Mahasiswa</a><br>
                <a href="{{ route('promo.specialmenu') }}" class="hover:underline">Promo Special Menu</a>
            </p>
        </div>
    </div>
</div>

@endsection