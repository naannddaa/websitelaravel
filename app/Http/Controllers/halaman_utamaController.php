<?php

namespace App\Http\Controllers;
use App\Models\halaman_utama;


use Illuminate\Http\Request;

class halaman_utamaCOntroller extends Controller
{
    public function index()
    {
        return view('halaman_utama.index');

    }
}
