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

        $query = master_kartukeluarga::join
        ('master_penduduks', 'master_kartukeluargas.no_kk', '=', 'master_penduduks.no_kk')
        ->select('master_kartukeluargas.*', 'master_penduduks.nama_lengkap');

    if (!empty($keyword)) {
        $query->where('master_kartukeluargas.no_kk', 'LIKE', '%' . $keyword . '%')
              ->orWhere('master_penduduks.nama_lengkap', 'LIKE', '%' . $keyword . '%');
        }

        $master_kartukeluarga = $query->paginate(10);


        return view('admin.master_kartukeluarga.index', compact('master_kartukeluarga'));
    }

    // Menampilkan form tambah data
    public function tambah()
    {
        return view('admin.master_kartukeluarga.tambah');
    }

    // Memasukkan data baru ke dalam database
    public function masuk(Request $request)
{
    // Simpan data ke master_kartukeluarga
    $master_kartukeluarga = new master_kartukeluarga();
    $master_kartukeluarga->no_kk = $request->no_kk;
    $master_kartukeluarga->alamat = $request->alamat;
    $master_kartukeluarga->rt = $request->rt;
    $master_kartukeluarga->rw = $request->rw;
    $master_kartukeluarga->desa = $request->desa;
    $master_kartukeluarga->kecamatan = $request->kecamatan;
    $master_kartukeluarga->kode_pos = $request->kode_pos;
    $master_kartukeluarga->kabupaten = $request->kabupaten;
    $master_kartukeluarga->provinsi = $request->provinsi;
    $master_kartukeluarga->tanggal_dibuat = $request->tanggal_dibuat;
    $master_kartukeluarga->save();

    // Simpan data ke master_penduduk
    $master_penduduk = new master_penduduk();
    $master_penduduk->no_kk = $request->no_kk; // Hubungkan dengan KK yang baru dibuat
    $master_penduduk->nama_lengkap = $request->nama_lengkap;
    $master_penduduk->nik = $request->nik;
    $master_penduduk->save();


    session(['no_kk' => $master_kartukeluarga->no_kk]);

        return redirect('master_kartukeluarga')->with('success', 'Data berhasil ditambahkan');
           }

    // Menampilkan form edit berdasarkan No KK
    public function edit($no_kk)
{
    // Ambil data Kartu Keluarga berdasarkan no_kk
    $master_kartukeluarga = master_kartukeluarga::where('no_kk', $no_kk)->firstOrFail();

    // Ambil data penduduk berdasarkan no_kk
    $master_penduduk = master_penduduk::where('no_kk', $no_kk)->first();

    return view('admin.master_kartukeluarga.edit', compact('master_kartukeluarga', 'master_penduduk'));
}

    // Mengupdate data berdasarkan No KK
    public function update($no_kk, Request $request)
{
    // Update tabel master_kartukeluarga (hanya data yang sesuai dengan kolom di tabel)
    master_kartukeluarga::where('no_kk', $no_kk)->update($request->except(['_token', '_method', 'nik', 'nama_lengkap']));

    // Update tabel master_penduduk (hanya update nik dan nama_lengkap)
    master_penduduk::where('no_kk', $no_kk)->update($request->only(['nik', 'nama_lengkap']));

    return redirect('/master_kartukeluarga')->with('success', 'Data berhasil diperbarui');
}

    // Menghapus data berdasarkan No KK
    public function delete($no_kk)
    {
        master_kartukeluarga::where('no_kk', $no_kk)->delete();
        return redirect('/master_kartukeluarga')->with('success', 'Data berhasil dihapus');
    }



    public function getDataKK($no_kk)
    {
        $penduduk = master_penduduk::where('no_kk', $no_kk)->first();

        if ($penduduk) {
            return response()->json([
                'nik' => $penduduk->nik,
                'nama_lengkap' => $penduduk->nama_lengkap,
            ]);
        } else {
            return response()->json([
                'nik' => null,
                'nama_lengkap' => null,
            ]);
        }
    }


}
