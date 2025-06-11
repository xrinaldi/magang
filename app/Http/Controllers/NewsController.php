<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // Show all news for users (READ-ONLY)
    public function index()
    {
        $news = News::latest()->get();
        return view('pages.news.index', compact('news'));
    }

    // Get latest news for landing page
    public function getLastNews()
    {
        $news = News::latest()->take(4)->get();
        return view('pages.landing-page', compact('news'));
    }

    // Show individual news article (READ-ONLY)
    public function show(News $news)
    {
        return view('pages.news.show', compact('news'));
    }
}