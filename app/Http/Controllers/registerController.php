<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class registerController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'nik'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'no_telp'=>'required|string|min:12',
            'password'=>'required|string|min:8',
        ]);

        $user = User::create([
            'nik'=> $request->nik,
            'email'=> $request->email,
            'no_telp'=> $request->no_telp,
            'password'=> Hash::make($request->password),
        ]);

        return response()->json(['message'=>'User berhasil registrasi'],201);
    }
}
