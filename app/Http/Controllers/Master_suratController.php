<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Master_suratController extends Controller
{
    public function index() {
        return view('admin.master_surat.index');
    }
}
