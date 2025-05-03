<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::orderBy('published_at', 'desc')->get();
        return view('blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('blogs.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required',
            'content' => 'required',
            'image' => 'required|url',
            'published_at' => 'required|date'
        ]);

        $validated['slug'] = Str::slug($validated['title']);

        Blog::create($validated);

        return redirect()->route('blogs.index')->with('success', 'Blog berhasil dibuat!');
    }

 
    public function show(Blog $blog)
    {
        return view('blogs.show', compact('blog'));
    }


    public function edit(Blog $blog)
    {
        return view('blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required',
            'content' => 'required',
            'image' => 'required|url',
            'published_at' => 'required|date'
        ]);

        // Update slug jika title berubah
        if ($blog->title !== $validated['title']) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $blog->update($validated);

        return redirect()->route('blogs.index')->with('success', 'Blog berhasil diupdate!');
    }

 
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog berhasil dihapus!');
    }
}