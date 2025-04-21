<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratmasukController extends Controller
{
    public function index() {
        return view('admin.pengajuan_surat.suratmasuk');
    }
}
