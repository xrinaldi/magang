<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $blogs = Blog::orderBy('published_at', 'desc')->get();
        
        return view('welcome', compact('services', 'blogs'));
    }
    
    public function blog($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('blog-detail', compact('blog'));
    }
}