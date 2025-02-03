<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Query untuk menghitung jumlah baris dengan status 'Disetujui RW'

        // Mengirim data ke view dashboard
        return view('admin.dashboard.index');

    }
}
