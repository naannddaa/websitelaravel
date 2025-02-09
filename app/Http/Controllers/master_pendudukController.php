<?php

namespace App\Http\Controllers;

use App\Models\master_penduduk;
use Illuminate\Http\Request;

class master_pendudukController extends Controller
{
    // Menampilkan daftar data dengan fitur pencarian
    public function index(Request $request)
    {
        $keyword = $request->katakunci;
        $query = master_penduduk::query();

        if (!empty($keyword)) {
            $query->where('no_kk', 'LIKE', '%' . $keyword . '%')
                  ->orWhere('nik', 'LIKE', '%' . $keyword . '%')
                  ->orWhere('nama_lengkap', 'LIKE', '%' . $keyword . '%');                  
        }

        $master_penduduk = $query->paginate(5);
        return view('admin.master_penduduk.index', compact('master_penduduk'));
    }

    // Menampilkan form tambah data
    public function tambah()
    {
        return view('admin.master_penduduk.tambah');
    }

    // Memasukkan data baru ke dalam master$master_pendudukase
    public function masuk(Request $request)
    {
      
        $request->validate([
            'no_kk' => 'required|string|max:255',
            // field lainnya
        ]);
    
     
        master_penduduk::create($request->except('_token', 'submit'));
        return redirect('master_penduduk')->with('success', 'Data berhasil ditambahkan');
    }

    // Menampilkan form edit berdasarkan NIK
    public function edit($nik)
    {
        $master_penduduk = master_penduduk::where('nik', $nik)->firstOrFail();
        return view('admin.master_penduduk.edit', compact('master_penduduk'));
    }

    // Mengupdate data berdasarkan NIK
    public function update(Request $request, $nik)
    {
        $request->validate([
            'nama_lengkap' => 'required|string',
            'no_kk' => 'required',
        ]);
      
        $master_penduduk = master_penduduk::where('nik', $nik)->firstOrFail();
        $master_penduduk->update($request->except('_token',  'submit','_method'));

        return redirect('master_penduduk')->with('success', 'Data berhasil diperbarui');
    }

    // Menghapus data berdasarkan NIK
    public function delete($nik)
    {
        $master_penduduk = master_penduduk::where('nik', $nik)->firstOrFail();
        $master_penduduk->delete();

        return redirect('master_penduduk')->with('success', 'Data berhasil dihapus');
    }
}
