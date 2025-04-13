<?php

namespace App\Http\Controllers;

use App\Models\master_penduduk;
use Illuminate\Http\Request;

class master_pendudukController extends Controller
{
    // Menampilkan daftar data dengan fitur pencarian
    public function index(Request $request)
    {
    $query = master_penduduk::query();

    // Jika ada filter berdasarkan no_kk
    if ($request->has('nokk')) {
        $query->where('no_kk', $request->nokk);
    }

    $master_penduduk = $query->paginate(10); // atau sesuaikan jumlah per halaman

    return view('admin.master_penduduk.index', compact('master_penduduk'));
}


    // Menampilkan form tambah data
    public function tambah()
    {
        return view('admin.master_penduduk.tambah');
    }

    // Memasukkan data baru ke dalam master$master_pendudukase
    public function masuk(Request $request) {

        $request->validate([
            'nik' => 'required|digits:16|numeric|unique:master_penduduks,nik',
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required',
            'pendidikan' => 'required',
            'pekerjaan' => 'required',
            'golongan_darah' => 'required',
            'status_perkawinan' => 'required',
            'tanggal_perkawinan' => 'nullable|date',
            'status_keluarga' => 'required',
            'kewarganegaraan' => 'required',
            'no_paspor' => 'nullable',
            'no_kitap' => 'nullable',
            'nama_ayah' => 'required',
            'nama_ibu' => 'required',
            'no_kk' => 'required|exists:master_kartukeluargas,no_kk',
        ]);

        // Simpan data ke tabel master_penduduks
        master_penduduk::create($request->all());

        return redirect()->back()->with('success', 'Anggota keluarga berhasil ditambahkan.');
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
