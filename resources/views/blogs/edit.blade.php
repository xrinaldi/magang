<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog - SidoTech</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .admin-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        
        .form-control {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }
        
        .btn {
            display: inline-block;
            padding: 0.8rem 1.5rem;
            border-radius: 4px;
            text-decoration: none;
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
        }
        
        .btn-secondary {
            background-color: #95a5a6;
        }
        
        .buttons {
            display: flex;
            gap: 1rem;
        }
        
        .error {
            color: #e74c3c;
            font-size: 0.85rem;
            margin-top: 0.3rem;
        }
    </style>
</head>
<body>
    <header>
        <h1>SidoTech</h1>
        <nav>
            <ul>
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li><a href="{{ route('blogs.index') }}">Kelola Blog</a></li>
            </ul>
        </nav>
    </header>

    <div class="admin-container">
        <h2>Edit Blog</h2>
        
        <form action="{{ route('blogs.update', $blog) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
                @error('title')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="excerpt">Ringkasan</label>
                <textarea name="excerpt" id="excerpt" class="form-control" rows="3" required>{{ old('excerpt', $blog->excerpt) }}</textarea>
                @error('excerpt')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="content">Konten</label>
                <textarea name="content" id="content" class="form-control" rows="10" required>{{ old('content', $blog->content) }}</textarea>
                @error('content')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="image">URL Gambar</label>
                <input type="url" name="image" id="image" class="form-control" value="{{ old('image', $blog->image) }}" required>
                @error('image')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="published_at">Tanggal Publish</label>
                <input type="date" name="published_at" id="published_at" class="form-control" value="{{ old('published_at', $blog->published_at->format('Y-m-d')) }}" required>
                @error('published_at')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="buttons">
                <button type="submit" class="btn">Update</button>
                <a href="{{ route('blogs.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>