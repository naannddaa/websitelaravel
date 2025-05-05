<?php

namespace App\Http\Controllers;

use App\Models\MasterBerita;
use Illuminate\Http\Request;

class LandingBeritaController extends Controller
{
    public function index()
    {
        $beritas = MasterBerita::orderBy('created_at', 'desc')->get();
        return view('landing_page.detail-berita', compact('beritas'));
    }

    public function show($id_berita)
    {
        $berita = MasterBerita::where('id_berita', $id_berita)->firstOrFail();
        return view('landing_page.detail-berita', compact('berita'));
    }
    
}