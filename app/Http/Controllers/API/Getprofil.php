<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Getprofil extends Controller
{
    public function index(Request $request)
    {
        $nik = $request->query('nik');

        if (!$nik) {
            return response()->json([
                'error' => 'Parameter NIK tidak ditemukan'
            ], 400);
        }

        $profil = DB::table('master_penduduks')
            ->leftJoin('master_akun', 'master_penduduks.nik', '=', 'master_akun.nik')
            ->select(
                'master_penduduks.no_kk',
                'master_penduduks.nik',
                'master_penduduks.nama_lengkap',
                'master_akun.no_hp',
                'master_akun.email'
            )
            ->where('master_penduduks.nik', $nik)
            ->first();

        if (!$profil) {
            return response()->json([
                'error' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json($profil);

    }
}
