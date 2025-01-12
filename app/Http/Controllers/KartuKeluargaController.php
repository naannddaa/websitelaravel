<?php

namespace App\Http\Controllers;

use App\Models\master_kartukeluarga;
use App\Models\master_penduduk;
use Illuminate\Http\Request;

class KartuKeluargaController extends Controller
{
  
    public function index()
    // menampilkan semua data
    {
        return view('kartukeluarga.index');
    }

   
    public function create()
    // memasukkan data baru
    {
        return view('kartukeluarga.create');
    }


    public function store(Request $request)
    // memasukkan data ke database
    {
        $datakk = [
            'no_kk'=>$request->NomerKartuKeluarga,
            'alamat'=>$request->Alamat,
            'rt'=>$request->RT,
            'rw'=>$request->RW,
            'desa'=>$request->desa,
            'kecamatan'=>$request->kecamatan,
            'kode_pos'=>$request->kodepos,
            'kabupaten'=>$request->kabupaten,
            'provinsi'=>$request->provinsi,
            'tanggal_dibuat'=>$request->tanggaldibuat
        ];


        $datapenduduk = [
            'nama_lengkap'=>$request->NamaLengkap,
        ];


        master_kartukeluarga::create($datakk);
        master_penduduk::create($datapenduduk);
        
        
        return 'hi';
    }

    public function show($id)
    // menampilkan detail data 
    {
        //
    }

  
    public function edit($id)
    // menampilkan form fungsi edit
    {
        //
    }

    public function update(Request $request, $id)
    // mengupdata data ke 
    {
        //
    }


    public function destroy($id)
    // menghapus data
    {
        //
    }
}
