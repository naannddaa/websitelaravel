<?php

namespace App\Http\Controllers;
use App\Models\landing_page;
use Illuminate\Http\Request;

class landing_pageController extends Controller
{
    public function index()
    {
        return view('landing_page.index');

    }
}
