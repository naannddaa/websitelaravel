<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class status_ditolak_controller extends Controller
{
    public function index(Request $request)
{
    $status = $request->query('status', 'ditolak'); // default ditolak kalau kosong

    $data = DB::table('master_pengajuan')
        ->join('master_surat', 'master_pengajuan.id_surat', '=', 'master_surat.id_surat')
        ->select(
            'master_surat.nama_surat',
            'master_pengajuan.status',
            'master_pengajuan.keterangan_ditolak'
        )
        ->where('master_pengajuan.status', $status)

        ->get();

    return response()->json($data);
}

}
