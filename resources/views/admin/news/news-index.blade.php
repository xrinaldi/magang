@extends('admin.layouts.app')

@section('title', 'Kelola Berita')
@section('page-title', 'Kelola Berita')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <div>
        <h2 class="text-2xl font-bold text-gray-900">Daftar Semua Berita</h2>
        <p class="text-gray-600">Kelola dan edit semua berita yang telah dipublikasikan</p>
    </div>
    <a href="{{ route('admin.news.create') }}" 
       class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg transition duration-200">
        <i class="fas fa-plus mr-2"></i>
        Tambah Berita Baru
    </a>
</div>

<!-- News Table -->
<div class="bg-white shadow overflow-hidden sm:rounded-lg">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Berita
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Tanggal
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($news as $item)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-16 w-16">
                                    @if($item->image_url)
                                        <img class="h-16 w-16 rounded-lg object-cover" src="{{ asset($item->image_url) }}" alt="{{ $item->title }}">
                                    @else
                                        <div class="h-16 w-16 rounded-lg bg-gray-300 flex items-center justify-center">
                                            <i class="fas fa-image text-gray-500 text-xl"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900 line-clamp-2">
                                        {{ $item->title }}
                                    </div>
                                    <div class="text-sm text-gray-500 line-clamp-2">
                                        {{ Str::limit(strip_tags($item->content), 100) }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $item->created_at->format('d M Y') }}</div>
                            <div class="text-sm text-gray-500">{{ $item->created_at->format('H:i') }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                Dipublikasikan
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <div class="flex items-center justify-center space-x-2">
                                <!-- View Button -->
                                <a href="{{ route('admin.news.show', $item->id) }}" 
                                   class="text-blue-600 hover:text-blue-900 transition duration-200" 
                                   title="Lihat Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                
                                <!-- Edit Button -->
                                <a href="{{ route('admin.news.edit', $item->id) }}" 
                                   class="text-yellow-600 hover:text-yellow-900 transition duration-200" 
                                   title="Edit Berita">
                                    <i class="fas fa-edit"></i>
                                </a>
                                
                                <!-- Delete Button -->
                                <form action="{{ route('admin.news.destroy', $item->id) }}" 
                                      method="POST" 
                                      class="inline"
                                      onsubmit="return confirm('Anda yakin ingin menghapus berita ini? Tindakan ini tidak dapat dibatalkan.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-900 transition duration-200" 
                                            title="Hapus Berita">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                
                                <!-- Preview on Website -->
                                <a href="{{ route('news.show', $item->id) }}" 
                                   target="_blank"
                                   class="text-gray-600 hover:text-gray-900 transition duration-200" 
                                   title="Lihat di Website">
                                    <i class="fas fa-external-link-alt"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center">
                            <div class="text-gray-500">
                                <i class="fas fa-newspaper text-4xl mb-4"></i>
                                <p class="text-lg mb-2">Belum ada berita yang dibuat</p>
                                <p class="text-sm mb-4">Mulai dengan membuat berita pertama Anda</p>
                                <a href="{{ route('admin.news.create') }}" 
                                   class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-md transition duration-200">
                                    <i class="fas fa-plus mr-2"></i>
                                    Tambah Berita Baru
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    @if($news->hasPages())
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
            {{ $news->links() }}
        </div>
    @endif
</div>

<!-- Statistics Cards -->
<div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
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
                        <dd class="text-lg font-medium text-gray-900">{{ $news->total() }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>

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
</div>
@endsection