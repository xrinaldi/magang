@extends('index')
@section('content')
    <section class="relative h-[210px]">
        <img src="{{ asset('img/news-hero.png') }}" alt="hero-image" class="w-full h-full object-cover" />
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="absolute inset-0 flex items-center justify-center">
            <h1 class="text-[#FCECB9] text-4xl md:text-5xl lg:text-6xl font-bold text-center drop-shadow-lg">
                DuggNews
            </h1>
        </div>
    </section>

    <section class="container mx-auto px-4 pt-8 md:pt-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse ($news as $item)
                <a href="{{ route('news.show', $item->id) }}"
                    class="block rounded-2xl shadow-lg transition-all duration-300 transform hover:-translate-y-2 hover:shadow-xl cursor-pointer">
                    <img src="{{ asset($item->image_url ?? 'img/default-news.jpg') }}" alt="{{ $item->title }}"
                        class="w-full h-48 object-cover rounded-t-2xl">
                    <div class="p-5">
                        <h3 class="text-lg font-bold text-[#4B3C2F] mb-2 line-clamp-2">
                            {{ $item->title }}
                        </h3>
                        <hr class="my-2 border-[#4B3C2F] border-2" />
                        <p class="text-[#4E3D33] text-sm font-light leading-relaxed mb-4 line-clamp-3">
                            {{ Str::limit(strip_tags($item->content), 120, '...') }}
                        </p>
                        <p class="text-gray-500 text-xs font-light text-right">{{ $item->created_at->format('d M Y') }}</p>
                    </div>
                </a>
            @empty
                <p class="col-span-full text-center text-gray-600 text-lg">Belum ada berita yang tersedia.</p>
            @endforelse
        </div>
    </section>
@endsection