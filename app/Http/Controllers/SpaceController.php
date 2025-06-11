<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpaceController extends Controller
{
    public function funroom()
    {
        return view('pages.spaces.space-funroom');
    }
    
    public function garden()
    {
        return view('pages.spaces.space-garden');
    }
    
    public function meeting()
    {
        return view('pages.spaces.space-meeting');
    }
}