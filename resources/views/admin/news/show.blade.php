@extends('admin.layouts.app')

@section('title', 'Detail Berita: ' . $news->title)
@section('page-title', 'Detail Berita')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Back Button -->
    <div class="mb-6">
        <a href="{{ route('admin.news.index') }}" 
           class="inline-flex items-center text-coffee-medium hover:text-coffee-dark transition duration-200">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali ke Daftar Berita
        </a>
    </div>

    <!-- Article Header -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-6">
        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 mb-2">{{ $news->title }}</h1>
                    <div class="flex items-center space-x-4 text-sm text-gray-600">
                        <div class="flex items-center">
                            <i class="fas fa-calendar mr-1"></i>
                            Dibuat: {{ $news->created_at->format('d M Y, H:i') }}
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-edit mr-1"></i>
                            Update: {{ $news->updated_at->format('d M Y, H:i') }}
                        </div>
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                            <i class="fas fa-check-circle mr-1"></i>
                            Dipublikasikan
                        </span>
                    </div>
                </div>
                
                <!-- Action Buttons -->
                <div class="flex items-center space-x-2">
                    <a href="{{ route('admin.news.edit', $news->id) }}" 
                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-200">
                        <i class="fas fa-edit mr-1"></i>
                        Edit
                    </a>
                    <a href="{{ route('news.show', $news->id) }}" 
                       target="_blank"
                       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-200">
                        <i class="fas fa-external-link-alt mr-1"></i>
                        Lihat Website
                    </a>
                    <form action="{{ route('admin.news.destroy', $news->id) }}" 
                          method="POST" 
                          class="inline"
                          onsubmit="return confirm('Anda yakin ingin menghapus berita ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-200">
                            <i class="fas fa-trash mr-1"></i>
                            Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Article Content -->
        <div class="p-6">
            <!-- Featured Image -->
            @if($news->image_url)
                <div class="mb-6">
                    <img src="{{ asset($news->image_url) }}" 
                         alt="{{ $news->title }}" 
                         class="w-full h-96 object-cover rounded-lg shadow-sm border border-gray-200">
                    <p class="text-xs text-gray-500 mt-2 text-center">Gambar utama berita</p>
                </div>
            @else
                <div class="mb-6 bg-gray-100 h-96 rounded-lg flex items-center justify-center">
                    <div class="text-center text-gray-500">
                        <i class="fas fa-image text-4xl mb-2"></i>
                        <p>Tidak ada gambar</p>
                    </div>
                </div>
            @endif

            <!-- Article Text -->
            <div class="prose max-w-none">
                <div class="text-gray-800 leading-relaxed text-lg whitespace-pre-line">{{ $news->content }}</div>
            </div>
        </div>
    </div>

    <!-- Article Statistics -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-blue-500 rounded-md flex items-center justify-center">
                        <i class="fas fa-link text-white"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">URL Slug</h3>
                    <p class="text-sm font-mono bg-gray-100 px-2 py-1 rounded mt-1">{{ $news->slug }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-green-500 rounded-md flex items-center justify-center">
                        <i class="fas fa-font text-white"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Jumlah Karakter</h3>
                    <p class="text-lg font-medium text-gray-900">{{ strlen($news->content) }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-purple-500 rounded-md flex items-center justify-center">
                        <i class="fas fa-image text-white"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <h3 class="text-sm font-medium text-gray-500">Status Gambar</h3>
                    <p class="text-lg font-medium {{ $news->image_url ? 'text-green-600' : 'text-red-600' }}">
                        {{ $news->image_url ? 'Ada' : 'Tidak Ada' }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- SEO & Technical Info -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-6">
        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Informasi SEO & Teknis</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h4 class="text-sm font-medium text-gray-900 mb-3">Meta Information</h4>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-xs font-medium text-gray-500">Title Tag</label>
                            <p class="text-sm text-gray-900 bg-gray-50 p-2 rounded">{{ $news->title }}</p>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500">URL Slug</label>
                            <p class="text-sm text-gray-900 bg-gray-50 p-2 rounded font-mono">{{ $news->slug }}</p>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500">Meta Description</label>
                            <p class="text-sm text-gray-900 bg-gray-50 p-2 rounded">{{ Str::limit(strip_tags($news->content), 150) }}</p>
                        </div>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-sm font-medium text-gray-900 mb-3">Technical Details</h4>
                    <div class="space-y-3">
                        <div>
                            <label class="block text-xs font-medium text-gray-500">Created At</label>
                            <p class="text-sm text-gray-900 bg-gray-50 p-2 rounded">{{ $news->created_at->format('Y-m-d H:i:s T') }}</p>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500">Updated At</label>
                            <p class="text-sm text-gray-900 bg-gray-50 p-2 rounded">{{ $news->updated_at->format('Y-m-d H:i:s T') }}</p>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-500">Image Path</label>
                            <p class="text-sm text-gray-900 bg-gray-50 p-2 rounded font-mono">
                                {{ $news->image_url ?: 'No image' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Aksi Cepat</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <a href="{{ route('admin.news.edit', $news->id) }}" 
                   class="flex items-center justify-center px-4 py-3 bg-yellow-500 hover:bg-yellow-600 text-white rounded-lg transition duration-200">
                    <i class="fas fa-edit mr-2"></i>
                    Edit Berita
                </a>
                
                <a href="{{ route('admin.news.create') }}" 
                   class="flex items-center justify-center px-4 py-3 bg-green-500 hover:bg-green-600 text-white rounded-lg transition duration-200">
                    <i class="fas fa-plus mr-2"></i>
                    Buat Baru
                </a>
                
                <a href="{{ route('news.show', $news->id) }}" 
                   target="_blank"
                   class="flex items-center justify-center px-4 py-3 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition duration-200">
                    <i class="fas fa-external-link-alt mr-2"></i>
                    Lihat Website
                </a>
                
                <button onclick="copyToClipboard('{{ route('news.show', $news->id) }}')"
                        class="flex items-center justify-center px-4 py-3 bg-gray-500 hover:bg-gray-600 text-white rounded-lg transition duration-200">
                    <i class="fas fa-copy mr-2"></i>
                    Copy Link
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        // Show success message
        const button = event.target.closest('button');
        const originalText = button.innerHTML;
        button.innerHTML = '<i class="fas fa-check mr-2"></i>Copied!';
        button.classList.remove('bg-gray-500', 'hover:bg-gray-600');
        button.classList.add('bg-green-500', 'hover:bg-green-600');
        
        setTimeout(() => {
            button.innerHTML = originalText;
            button.classList.remove('bg-green-500', 'hover:bg-green-600');
            button.classList.add('bg-gray-500', 'hover:bg-gray-600');
        }, 2000);
    });
}
</script>
@endsection