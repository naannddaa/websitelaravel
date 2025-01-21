<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Query untuk menghitung jumlah baris dengan status 'Disetujui RW'
        $total = DB::table('master_pengajuan')->where('status', 'Disetujui RW')->count();

        // Query untuk menghitung jumlah baris dengan status 'Selesai'
        $total1 = DB::table('master_pengajuan')->where('status', 'Selesai')->count();

        // Query untuk mengambil data jenis pengajuan surat dari master_surat
        $jenisPengajuan = DB::table('master_surat')->get();

        // Mengirim data ke view dashboard
        return view('admin.dashboard.index', compact('total', 'total1', 'jenisPengajuan'));

    }
}
