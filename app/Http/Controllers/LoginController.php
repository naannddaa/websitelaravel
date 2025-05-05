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
    // Validasi inputan
    $request->validate([
        'nik' => 'required|string|size:16',
        'password' => 'required|string',
    ]);

    // Cari user di master_akun berdasarkan NIK
    $user = master_akun::where('nik', $request->nik)->first();

    if ($user) {
        // Cek apakah password benar
        if (Hash::check($request->password, $user->password)) {
            
            // Login user
            Auth::login($user);
 
            // Cari nama lengkap dari master_penduduks
            $penduduk = DB::table('master_penduduks')->where('nik', $user->nik)->first();
            $nama = $penduduk ? $penduduk->nama_lengkap : $user->nik;

            // Simpan nama lengkap ke session
            session(['nama' => $nama]);

            // Redirect ke dashboard
            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        } else {
            return back()->with('error', 'Password salah');
        }
    } else {
        return back()->with('error', 'NIK tidak ditemukan');
    }
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.index')->with('success', 'Berhasil logout!');
    }

    public function getNama()
{
    if (Auth::check()) {
        $user = Auth::user();

        $nama = optional($user->penduduk)->nama_lengkap;

        return $nama ?? $user->nik;
    }

    return null; // Kalau belum login
}

}