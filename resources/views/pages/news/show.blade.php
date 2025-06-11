@extends('index')
@section('content')
    <div class="pt-20"/>
    <div class="container mx-auto px-4 py-8 md:py-12">
        <div class="flex flex-col lg:flex-row gap-8">
            <div class="lg:w-4/6">
                <div class="mb-6">
                    <a href="{{ route('news.index') }}" class="inline-flex items-center hover:text-[#653318] font-bold">
                        <i class="fas fa-arrow-left mr-1"></i>
                        Kembali ke Berita
                    </a>
                </div>

                <h1 class="text-3xl md:text-4xl font-extrabold mb-6 break-words">
                    {{ $news->title }}
                </h1>

                @if ($news->image_url)
                    <div class="mb-8">
                        <img src="{{ asset($news->image_url) }}" alt="{{ $news->title }}"
                             class="w-full h-96 object-cover shadow-sm">
                    </div>
                @endif

                <div class="prose max-w-none text-[#4E3D33] leading-relaxed text-lg">
                    {!! nl2br(e($news->content)) !!}
                </div>
            </div>

            <div class="w-2/6 min-h-[20rem] bg-[#FCECB9] m-8 p-6 h-fit space-y-3">
                <h3 class="text-xl font-bold text-[#653318]">News</h3>
                <p class="font-bold break-words">
                    {{ $news->title}}
                </p>
                <div class="mt-4 text-sm text-gray-600">
                    <p><strong>Dipublikasikan:</strong> {{ $news->created_at->format('d M Y') }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection