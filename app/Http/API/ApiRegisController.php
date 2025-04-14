<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\master_akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class  ApiRegisController extends Controller
{
    public function register(Request $request)
    {
        // Validasi data input, membuat validasi
        $validator = Validator::make($request->all(), [
            'nik' => 'required|string|max:255',
            'password' => 'required|string',
            'email' => 'required|string',
            'no_hp' => 'nullable|string',
        ]);
        //respon jika eroro
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        // menyimpan data ke database
        $user = master_akun::create([
            'nik' => $request->nik,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'no_hp' => $request->no_hp,
        ]);
        //respon jika berhasil
        return response()->json(['message' => 'regitrasi berhasil', 'master_akun' => $user], 201);
    }



    public function login (Request $request) {
        $validator = [
            'nik' => 'required|string',
            'password' => 'required|string'
        ];
        $request->validate($validator);
        $user = master_akun::where('nik', $request->nik)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken('personal access token')->plainTextToken;
            $response = [
                'master_akun' => $user,
                'token' => $token
            ];

            return response()->json($response, 200);
        }
        return response()->json(['message' => 'Invalid NIK or password'], 401);
    }
}
