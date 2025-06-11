@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <!-- Total News Card -->
    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-blue-500 rounded-md flex items-center justify-center">
                        <i class="fas fa-newspaper text-white"></i>
                    </div>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Total Berita</dt>
                        <dd class="text-lg font-medium text-gray-900">{{ $totalNews }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <!-- Published Today Card -->
    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-green-500 rounded-md flex items-center justify-center">
                        <i class="fas fa-calendar-day text-white"></i>
                    </div>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Hari Ini</dt>
                        <dd class="text-lg font-medium text-gray-900">{{ \App\Models\News::whereDate('created_at', today())->count() }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <!-- This Week Card -->
    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="p-5">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-yellow-500 rounded-md flex items-center justify-center">
                        <i class="fas fa-calendar-week text-white"></i>
                    </div>
                </div>
                <div class="ml-5 w-0 flex-1">
                    <dl>
                        <dt class="text-sm font-medium text-gray-500 truncate">Minggu Ini</dt>
                        <dd class="text-lg font-medium text-gray-900">{{ \App\Models\News::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count() }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions Card -->
    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="p-5">
            <div class="flex items-center justify-center">
                <a href="{{ route('admin.news.create') }}" 
                   class="w-full bg-coffee-medium hover:bg-coffee-dark text-white font-bold py-2 px-4 rounded transition duration-200 text-center">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Berita
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Recent News Section -->
<div class="bg-white shadow overflow-hidden sm:rounded-md">
    <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Berita Terbaru</h3>
            <a href="{{ route('admin.news.index') }}" class="text-coffee-medium hover:text-coffee-dark transition duration-200">
                Lihat Semua
                <i class="fas fa-arrow-right ml-1"></i>
            </a>
        </div>
    </div>
    <ul class="divide-y divide-gray-200">
        @forelse($recentNews as $news)
            <li>
                <div class="px-4 py-4 flex items-center justify-between hover:bg-gray-50">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                            @if($news->image_url)
                                <img class="h-10 w-10 rounded object-cover" src="{{ asset($news->image_url) }}" alt="{{ $news->title }}">
                            @else
                                <div class="h-10 w-10 rounded bg-gray-300 flex items-center justify-center">
                                    <i class="fas fa-image text-gray-500"></i>
                                </div>
                            @endif
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">{{ Str::limit($news->title, 50) }}</div>
                            <div class="text-sm text-gray-500">{{ $news->created_at->format('d M Y, H:i') }}</div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-2">
                        <a href="{{ route('admin.news.show', $news->id) }}" 
                           class="text-blue-600 hover:text-blue-900 transition duration-200">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.news.edit', $news->id) }}" 
                           class="text-yellow-600 hover:text-yellow-900 transition duration-200">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                </div>
            </li>
        @empty
            <li>
                <div class="px-4 py-8 text-center text-gray-500">
                    <i class="fas fa-newspaper text-4xl mb-4"></i>
                    <p>Belum ada berita yang dibuat.</p>
                    <a href="{{ route('admin.news.create') }}" class="mt-2 inline-block text-coffee-medium hover:text-coffee-dark">
                        Buat berita pertama Anda
                    </a>
                </div>
            </li>
        @endforelse
    </ul>
</div>

<!-- Quick Actions Panel -->
<div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="p-6">
            <h4 class="text-lg font-medium text-gray-900 mb-4">Aksi Cepat</h4>
            <div class="space-y-3">
                <a href="{{ route('admin.news.create') }}" 
                   class="block w-full bg-green-600 hover:bg-green-700 text-white text-center py-2 px-4 rounded transition duration-200">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Berita Baru
                </a>
                <a href="{{ route('admin.news.index') }}" 
                   class="block w-full bg-blue-600 hover:bg-blue-700 text-white text-center py-2 px-4 rounded transition duration-200">
                    <i class="fas fa-list mr-2"></i>
                    Kelola Semua Berita
                </a>
                <a href="{{ url('/') }}" target="_blank"
                   class="block w-full bg-gray-600 hover:bg-gray-700 text-white text-center py-2 px-4 rounded transition duration-200">
                    <i class="fas fa-external-link-alt mr-2"></i>
                    Lihat Website
                </a>
            </div>
        </div>
    </div>

    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="p-6">
            <h4 class="text-lg font-medium text-gray-900 mb-4">Tips Admin</h4>
            <div class="space-y-2 text-sm text-gray-600">
                <div class="flex items-start">
                    <i class="fas fa-lightbulb text-yellow-500 mt-1 mr-2"></i>
                    <span>Gunakan gambar dengan resolusi minimal 800x600px untuk hasil terbaik</span>
                </div>
                <div class="flex items-start">
                    <i class="fas fa-lightbulb text-yellow-500 mt-1 mr-2"></i>
                    <span>Tulis judul yang menarik dan deskriptif untuk SEO yang lebih baik</span>
                </div>
                <div class="flex items-start">
                    <i class="fas fa-lightbulb text-yellow-500 mt-1 mr-2"></i>
                    <span>Periksa kembali konten sebelum mempublikasikan</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection