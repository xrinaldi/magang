<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::where('is_featured', true)->take(3)->get();
        $articles = Article::orderBy('publish_date', 'desc')->take(3)->get();
        $services = Service::where('is_featured', true)->get();

        return view('welcome', compact('products', 'articles', 'services'));
    }
}