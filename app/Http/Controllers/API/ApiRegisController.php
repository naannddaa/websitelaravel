<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\master_akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class  ApiRegisController extends Controller
{
    public function register(Request $request)
    {
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'nik' => 'required|string|max:255',
            'password' => 'required|string',
            'email' => 'required|string',
            'no_hp' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        // Simpan user ke database
        $user = master_akun::create([
            'nik' => $request->nik,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
        ]);

        return response()->json(['message' => 'regitrasi berhasil', 'master_akun' => $user], 201);
    }


    public function login (Request $request) {
        $validator = [
            'nik' => 'required|string',
            'password' => 'required|string'
        ];
         $user = master_akun::where('nik', $request->nik)->first();

    // Cek apakah user ditemukan dan password cocok
    if ($user && Hash::check($request->password, $user->password)) {
        // Generate token
        $token = $user->createToken('personal access token')->plainTextToken;

        // Ambil data penduduk manual dari tabel
        $penduduk = DB::table('master_penduduks')->where('nik', $user->nik)->first();
        $nama = $penduduk ? $penduduk->nama_lengkap : $user->nik;

        // Siapkan response
        $response = [
            'master_akun' => [
                'nik' => $user->nik,
                'id_penduduk' => $user->id_penduduk,
                'nama' => $nama,
                // Tambahkan field tambahan jika perlu
            ],
            'token' => $token
        ];

        return response()->json($response, 200);
    }

    // Jika gagal login
    return response()->json([
        'message' => 'NIK atau password salah.'
    ], 401);

}
}
