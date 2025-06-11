@extends('admin.layouts.app')

@section('title', 'Edit Berita: ' . $news->title)
@section('page-title', 'Edit Berita')

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

    <!-- Form Card -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Edit Berita</h3>
            <p class="text-sm text-gray-600">Perbarui informasi berita yang sudah ada</p>
        </div>

        <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data" class="p-6">
            @csrf
            @method('PUT')

            <!-- Title Input -->
            <div class="mb-6">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                    Judul Berita <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       id="title"
                       name="title"
                       value="{{ old('title', $news->title) }}"
                       class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-coffee-medium focus:border-coffee-medium sm:text-sm @error('title') border-red-500 @enderror"
                       placeholder="Masukkan judul berita yang menarik..."
                       required>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-1 text-xs text-gray-500">
                    <i class="fas fa-info-circle mr-1"></i>
                    Nama file saat ini: <span class="font-mono bg-gray-100 px-1 rounded">{{ basename($news->image_url ?? 'belum-ada-gambar.png') }}</span>
                </p>
                <p class="mt-1 text-xs text-blue-600">
                    <i class="fas fa-sync mr-1"></i>
                    Nama file baru: <span id="filename-preview" class="font-mono bg-blue-50 px-1 rounded">{{ Str::slug($news->title) }}-{{ $news->id }}.png</span>
                </p>
            </div>

            <!-- Content Input -->
            <div class="mb-6">
                <label for="content" class="block text-sm font-medium text-gray-700 mb-2">
                    Isi Berita <span class="text-red-500">*</span>
                </label>
                <textarea id="content"
                          name="content"
                          rows="8"
                          class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-coffee-medium focus:border-coffee-medium sm:text-sm @error('content') border-red-500 @enderror"
                          placeholder="Tulis isi berita secara detail..."
                          required>{{ old('content', $news->content) }}</textarea>
                @error('content')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Current Image Display -->
            @if($news->image_url)
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Gambar Saat Ini
                </label>
                <div class="relative inline-block">
                    <img src="{{ asset($news->image_url) }}" 
                         alt="{{ $news->title }}" 
                         class="h-48 w-auto rounded-lg shadow-sm border border-gray-200">
                    <div class="absolute top-2 right-2">
                        <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">
                            <i class="fas fa-check mr-1"></i>{{ basename($news->image_url) }}
                        </span>
                    </div>
                </div>
                <p class="mt-2 text-xs text-gray-600">
                    <i class="fas fa-folder mr-1"></i>
                    Path: <code>{{ $news->image_url }}</code>
                </p>
            </div>
            @endif

            <!-- New Image Input -->
            <div class="mb-6">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                    {{ $news->image_url ? 'Ganti Gambar (Opsional)' : 'Tambah Gambar' }}
                </label>
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md hover:border-gray-400 transition duration-200">
                    <div class="space-y-1 text-center">
                        <div id="image-preview" class="hidden mb-4">
                            <img id="preview-img" class="mx-auto h-32 w-auto rounded-md shadow-sm" alt="Preview">
                            <p class="text-xs text-gray-500 mt-2">Preview gambar baru</p>
                        </div>
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-coffee-medium hover:text-coffee-dark focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-coffee-medium">
                                <span>{{ $news->image_url ? 'Upload gambar baru' : 'Upload gambar' }}</span>
                                <input id="image" 
                                       name="image" 
                                       type="file" 
                                       class="sr-only" 
                                       accept="image/*"
                                       onchange="previewImage(this)">
                            </label>
                            <p class="pl-1">atau drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">PNG, JPG, GIF hingga 5MB</p>
                        @if($news->image_url)
                            <p class="text-xs text-yellow-600">
                                <i class="fas fa-info-circle mr-1"></i>
                                Gambar baru akan menggantikan gambar yang ada
                            </p>
                        @endif
                        <p class="text-xs text-blue-600">
                            <i class="fas fa-magic mr-1"></i>
                            Gambar akan otomatis dikonversi ke PNG
                        </p>
                    </div>
                </div>
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Article Info -->
            <div class="mb-6 bg-gray-50 rounded-lg p-4">
                <h4 class="text-sm font-medium text-gray-900 mb-2">Informasi Artikel</h4>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-600">
                    <div>
                        <span class="font-medium">ID Artikel:</span> #{{ $news->id }}
                    </div>
                    <div>
                        <span class="font-medium">Dibuat:</span> {{ $news->created_at->format('d M Y, H:i') }}
                    </div>
                    <div>
                        <span class="font-medium">Terakhir diupdate:</span> {{ $news->updated_at->format('d M Y, H:i') }}
                    </div>
                    <div>
                        <span class="font-medium">Status:</span> 
                        <span class="text-green-600 font-medium">Dipublikasikan</span>
                    </div>
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                <div class="flex space-x-3">
                    <button type="button" 
                            onclick="window.history.back()"
                            class="bg-gray-300 hover:bg-gray-400 text-gray-700 font-bold py-2 px-6 rounded-lg transition duration-200">
                        <i class="fas fa-times mr-2"></i>
                        Batal
                    </button>
                    
                    <a href="{{ route('admin.news.show', $news->id) }}" 
                       class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded-lg transition duration-200">
                        <i class="fas fa-eye mr-2"></i>
                        Preview
                    </a>
                </div>
                
                <div class="flex space-x-3">
                    <button type="submit" 
                            class="bg-coffee-medium hover:bg-coffee-dark text-white font-bold py-2 px-6 rounded-lg transition duration-200">
                        <i class="fas fa-save mr-2"></i>
                        Update Berita
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Info Card -->
    <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
        <h4 class="text-sm font-medium text-blue-900 mb-2">
            <i class="fas fa-info-circle mr-1"></i>
            Perubahan yang Akan Terjadi
        </h4>
        <ul class="text-xs text-blue-700 space-y-1">
            <li>• <strong>Jika judul berubah:</strong> Nama file gambar akan diperbarui secara otomatis</li>
            <li>• <strong>Jika upload gambar baru:</strong> Gambar lama akan dihapus dan diganti</li>
            <li>• <strong>Format nama file:</strong> <code>&lt;judul-baru&gt;-{{ $news->id }}.png</code></li>
            <li>• <strong>Lokasi penyimpanan:</strong> <code>public/img/news-img/</code></li>
        </ul>
    </div>
</div>

<script>
function previewImage(input) {
    const preview = document.getElementById('image-preview');
    const previewImg = document.getElementById('preview-img');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.classList.remove('hidden');
        }
        
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.classList.add('hidden');
    }
}

// Update filename preview when title changes
document.getElementById('title').addEventListener('input', function() {
    const title = this.value;
    const slug = title.toLowerCase()
                     .replace(/[^a-z0-9\s-]/g, '') // Remove special characters
                     .replace(/\s+/g, '-') // Replace spaces with hyphens
                     .replace(/-+/g, '-') // Replace multiple hyphens with single
                     .trim('-'); // Remove leading/trailing hyphens
    
    const preview = slug ? slug + '-{{ $news->id }}.png' : '{{ Str::slug($news->title) }}-{{ $news->id }}.png';
    document.getElementById('filename-preview').textContent = preview;
});

// Auto-resize textarea
document.getElementById('content').addEventListener('input', function() {
    this.style.height = 'auto';
    this.style.height = this.scrollHeight + 'px';
});

// Set initial height for textarea
document.addEventListener('DOMContentLoaded', function() {
    const textarea = document.getElementById('content');
    textarea.style.height = 'auto';
    textarea.style.height = textarea.scrollHeight + 'px';
});
</script>
@endsection