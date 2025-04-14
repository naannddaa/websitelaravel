<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\master_akun;


class ApiLoginController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'nik' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validasi gagal', 'errors' => $validator->errors()], 400);
        }

        // Cari user berdasarkan nik
        $user = master_akun::where('nik', $request->nik)->first();

        // Jika user tidak ditemukan
        if (!$user) {
            return response()->json(['message' => 'nik tidak terdaftar'], 401);
        }

        // // Jika password salah
        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Password salah'], 401);
        }

        // Jika login berhasil
        return response()->json([
            'message' => 'Login berhasil',
            'user' => $user,
        ], 200);
    }


}
