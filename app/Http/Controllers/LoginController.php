<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Untuk hashing
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\master_akun;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); 
    }

    public function login(Request $request)
{
    $request->validate([
        'nik' => 'required|string|size:16',
        'password' => 'required|string',
    ]);

    // Menggunakan model MasterAkun untuk mencari user berdasarkan NIK
    $user = master_akun::where('nik', $request->nik)->first();

    if ($user) {
        if (Hash::check($request->password, $user->password)) {
            Auth::login($user);  // Auth::login membutuhkan objek yang mengimplementasikan Authenticatable
            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        } else {
            return back()->with('error', 'Password salah');
        }
    } else {
        return back()->with('error', 'NIK tidak ditemukan');
    }
}
}