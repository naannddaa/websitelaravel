<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\master_pengajuan;
use Illuminate\Support\Facades\DB;

class status_diajukan_controller extends Controller
{
    public function index()
    {
        $data = DB::table('master_pengajuan')
        ->join('master_surat', 'master_pengajuan.id_surat', '=', 'master_surat.id_surat')
        ->select('master_surat.nama_surat', 'master_pengajuan.tanggal_diajukan', 'master_pengajuan.status')
        ->get();
        return response()->json($data);
    }
}


    // $data = master_pengajuan::with('surat')->get()->map(function ($item) {
    //     return [
    //         'nama_surat' => $item->surat->nama_surat,
    //         'tanggal_diajukan' => $item->tanggal_diajuakn,
    //         'status' => $item->status,
    //     ];
    // });

    // return response()->json([
    //     'succes' => true,
    //     'data' => $data,
    // ]);

