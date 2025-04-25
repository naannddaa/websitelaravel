<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuratditolakController extends Controller
{
    public function index() {
        return view('admin.pengajuan_surat.suratditolak');
    }
}
