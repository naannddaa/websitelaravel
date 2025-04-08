<?php

namespace App\Http\Controllers;

use App\Models\master_penduduk;
use App\Models\master_kartukeluarga;
use Illuminate\Http\Request;

class master_kartukeluargaController extends Controller
{
    // Menampilkan daftar data dengan fitur pencarian
    public function index(Request $request)
    {
        $keyword = $request->katakunci;

        $query = master_kartukeluarga::join(
            'master_penduduks', 'master_kartukeluargas.no_kk', '=', 'master_penduduks.no_kk'
        )->select('master_kartukeluargas.*', 'master_penduduks.nama_lengkap' , 'master_penduduks.nik');

        if (!empty($keyword)) {
            $query->where('master_kartukeluargas.no_kk', 'LIKE', '%' . $keyword . '%')
                  ->orWhere('master_penduduks.nama_lengkap', 'LIKE', '%' . $keyword . '%');
        }

        $master_kartukeluarga = $query->paginate();

        return view('admin.master_kartukeluarga.index', compact('master_kartukeluarga'));
    }

    // Menampilkan form tambah data
    public function tambah()
    {
        return view('admin.master_kartukeluarga.tambah');
    }

    // Memasukkan data baru ke dalam database, ini smaa macam masuk, guna untuk insert data
    public function masuk(Request $request)
    {
        $request->validate([
            'no_kk' => 'required|digits:16|numeric|unique:master_kartukeluargas,no_kk',
            'alamat' => 'required',
            'rt' => 'required|numeric',
            'rw' => 'required|numeric',
            'desa' => 'required',
            'kecamatan' => 'required',
            'kode_pos' => 'required|numeric',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'tanggal_dibuat' => 'required|date',
            'nik' => 'required|numeric|digits:16|unique:master_penduduks,nik',
            'nama_lengkap' => 'required'
        ]);

        // Simpan data ke master_kartukeluarga
        $master_kartukeluarga = master_kartukeluarga::create($request->only([
            'no_kk', 'alamat', 'rt', 'rw', 'desa', 'kecamatan', 'kode_pos', 'kabupaten', 'provinsi', 'tanggal_dibuat'
        ]));

        // Simpan data ke master_penduduk
        master_penduduk::create([
            'no_kk' => $master_kartukeluarga->no_kk,
            'nama_lengkap' => $request->nama_lengkap,
            'nik' => $request->nik,
            'status_keluarga' => 'Kepala Keluarga'
        ]);

        return redirect('admin/master_kartukeluarga')->with('success', 'Data berhasil ditambahkan');
    }

    // Menampilkan form edit berdasarkan No KK
    public function edit($no_kk)
    {
        $master_kartukeluarga = master_kartukeluarga::where('no_kk', $no_kk)->firstOrFail();
        $master_penduduk = master_penduduk::where('no_kk', $no_kk)->first();

        return view('admin.master_kartukeluarga.edit', compact('master_kartukeluarga', 'master_penduduk'));
    }

    // Mengupdate data berdasarkan No KK
   public function update(Request $request, $no_kk_lama) {
    // Validasi input
    $request->validate([
        'no_kk' => 'required|digits:16',
        'alamat' => 'required',
        'rt' => 'required|numeric',
        'rw' => 'required|numeric',
        'desa' => 'required',
        'kecamatan' => 'required',
        'kode_pos' => 'required|numeric',
        'kabupaten' => 'required',
        'provinsi' => 'required',
        'nik' => 'required|numeric',
        'nama_lengkap' => 'required'
    ]);

    // Ambil data baru dari request
    $no_kk_baru = $request->input('no_kk');

    // Update master_kartukeluarga
    master_kartukeluarga::where('no_kk', $no_kk_lama)->update([
        'no_kk' => $no_kk_baru,
        'alamat' => $request->alamat,
        'rt' => $request->rt,
        'rw' => $request->rw,
        'desa' => $request->desa,
        'kecamatan' => $request->kecamatan,
        'kode_pos' => $request->kode_pos,
        'kabupaten' => $request->kabupaten,
        'provinsi' => $request->provinsi,
        'tanggal_dibuat' => $request->tanggal_dibuat
    ]);

    // Update master_penduduk
    master_penduduk::where('no_kk', $no_kk_lama)->update([
        'no_kk' => $no_kk_baru,
        'nik' => $request->nik,
        'nama_lengkap' => $request->nama_lengkap
    ]);

    return redirect('admin/master_kartukeluarga')->with('success', 'Data berhasil diperbarui');
}


    // Menghapus data berdasarkan No KK
    public function delete($no_kk)
    {
        master_penduduk::where('no_kk', $no_kk)->delete();
        master_kartukeluarga::where('no_kk', $no_kk)->delete();

        return redirect('admin/master_kartukeluarga')->with('success', 'Data berhasil dihapus');
    }
}
