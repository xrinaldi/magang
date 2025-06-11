<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromoController extends Controller
{
    public function coffeetime()
    {
        return view('pages.promo.promo-coffeetime');
    }

    public function student()
    {
        return view('pages.promo.promo-student');
    }

    public function specialmenu()
    {
        return view('pages.promo.promo-specialmenu');
    }
}