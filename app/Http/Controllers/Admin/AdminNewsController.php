<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class AdminNewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('admin.news.news-index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ], [
            'title.required' => 'Judul berita wajib diisi.',
            'content.required' => 'Isi berita wajib diisi.',
            'image.required' => 'Gambar berita wajib diupload.',
            'image.image' => 'File harus berupa gambar.',
            'image.max' => 'Ukuran gambar maksimal 5MB.',
        ]);

        // Create the news record first to get the ID
        $news = News::create([
            'title' => $validatedData['title'],
            'slug' => Str::slug($validatedData['title']),
            'content' => $validatedData['content'],
            'image_url' => null, // Will be updated after image processing
        ]);

        // Handle image upload with custom naming
        if ($request->hasFile('image')) {
            $imagePath = $this->handleImageUpload($request->file('image'), $news->title, $news->id);
            
            // Update the news record with the image path
            $news->update(['image_url' => $imagePath]);
        }

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function show(News $news)
    {
        return view('admin.news.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ], [
            'title.required' => 'Judul berita wajib diisi.',
            'content.required' => 'Isi berita wajib diisi.',
            'image.image' => 'File harus berupa gambar.',
            'image.max' => 'Ukuran gambar maksimal 5MB.',
        ]);

        $imagePath = $news->image_url;

        // Handle new image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($imagePath && File::exists(public_path($imagePath))) {
                File::delete(public_path($imagePath));
            }

            $imagePath = $this->handleImageUpload($request->file('image'), $validatedData['title'], $news->id);
        } else {
            // If title changed but no new image, rename existing image
            if ($validatedData['title'] !== $news->title && $imagePath) {
                $imagePath = $this->renameExistingImage($imagePath, $validatedData['title'], $news->id);
            }
        }

        $news->update([
            'title' => $validatedData['title'],
            'slug' => Str::slug($validatedData['title']),
            'content' => $validatedData['content'],
            'image_url' => $imagePath,
        ]);

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(News $news)
    {
        // Delete image if exists
        if ($news->image_url && File::exists(public_path($news->image_url))) {
            File::delete(public_path($news->image_url));
        }

        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'Berita berhasil dihapus!');
    }

    /**
     * Handle image upload with custom naming format: <title>-<id>.png
     */
    private function handleImageUpload($imageFile, $title, $id)
    {
        // Create directory if it doesn't exist
        $directory = public_path('img/news-img');
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        // Generate filename: <title>-<id>.png
        $cleanTitle = Str::slug($title); // Clean title for filename
        $fileName = $cleanTitle . '-' . $id . '.png';
        $filePath = $directory . '/' . $fileName;

        // Convert and save image as PNG
        if (class_exists('\Intervention\Image\Facades\Image')) {
            // Using Intervention Image (recommended)
            $image = Image::make($imageFile);
            $image->encode('png', 90); // Convert to PNG with 90% quality
            $image->save($filePath);
        } else {
            // Fallback: Direct file move and rename
            $imageFile->move($directory, $fileName);
        }

        return 'img/news-img/' . $fileName;
    }

    /**
     * Rename existing image when title changes
     */
    private function renameExistingImage($currentPath, $newTitle, $id)
    {
        if (!File::exists(public_path($currentPath))) {
            return $currentPath;
        }

        $cleanTitle = Str::slug($newTitle);
        $newFileName = $cleanTitle . '-' . $id . '.png';
        $newPath = 'img/news-img/' . $newFileName;
        $newFullPath = public_path($newPath);

        // Rename the file
        File::move(public_path($currentPath), $newFullPath);

        return $newPath;
    }
}