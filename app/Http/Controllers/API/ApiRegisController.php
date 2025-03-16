<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\master_akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

        return response()->json(['message' => 'User registered successfully', 'master_akun' => $user], 201);
    }
}
