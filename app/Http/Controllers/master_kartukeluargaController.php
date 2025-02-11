<?php

namespace App\Http\Controllers;
<<<<<<< HEAD
=======

>>>>>>> cf20f72312a78abd9d6eb0a2c9ac4272e881ab4e
use App\Models\master_kartukeluarga;
use Illuminate\Http\Request;

class master_kartukeluargaController extends Controller
{
<<<<<<< HEAD
//untuk index.berita
public function index (Request $request){
 $keyword=$request->keyword;
$master_kartukeluarga = master_kartukeluarga::where('no_kk','LIKE','%'.$keyword.'%')
->orwhere('no_kk','LIKE','%'.$keyword.'%')
->orwhere('alamat','LIKE','%'.$keyword.'%')
->paginate(5);

 return view ('admin.master_kartukeluarga.index',compact(['master_kartukeluarga']));
    }
//CONTROLLER UNTUK MENAMBAH DATA 
public function tambah (){
return view ('admin.master_kartukeluarga.tambah');

}
//CONTROLLER UNTUK MEMASUK AN DATA
public function masuk (Request $request){
  master_kartukeluarga::create($request->except('_token','submit'));
  return redirect  ('master_kartukeluarga');
}
//CONTROLLER UNTUK MENGUPDATE DATA
public function Update ($no_kk,Request $request){
$master_kartukeluarga=master_kartukeluarga::where('no_kk',$no_kk);
  $master_kartukeluarga->update($request->except('_token','submit','_method'));
  return redirect ('/master_kartukeluarga');
}
 //CONTROLLER UNTUK EDIT DATA 
 public function edit ($no_kk,Request $request){
  $master_kartukeluarga=master_kartukeluarga::where('no_kk',$no_kk)->first();
  return view ('admin.master_kartukeluarga.edit',compact(['master_kartukeluarga']));
}

//CONTROLLER UNTUK APUS DATA ATAU DELETE 
public function delete ($no_kk,Request $request){
  $master_kartukeluarga=master_kartukeluarga::where('no_kk',$no_kk);
  $master_kartukeluarga->delete($request->except('_token','submit','_method'));
  return redirect ('/master_kartukeluarga');
}
=======
    // Menampilkan daftar data dengan fitur pencarian
    public function index(Request $request)
    {
        $keyword = $request->katakunci;
        
        $query = master_kartukeluarga::query();
        
        if (!empty($keyword)) {
            $query->where('no_kk', 'LIKE', '%' . $keyword . '%')
                  ->orWhere('alamat', 'LIKE', '%' . $keyword . '%')
                  ->orWhere('desa', 'LIKE', '%' . $keyword . '%')
                  ->orWhere('kecamatan', 'LIKE', '%' . $keyword . '%');
        }

        $master_kartukeluarga = $query->paginate(5);

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
        $master_kartukeluarga = new master_kartukeluarga();
    $master_kartukeluarga->no_kk = $request->no_kk;
  
 
    $master_kartukeluarga->alamat = $request->alamat;
    $master_kartukeluarga->rt = $request->rt;
    $master_kartukeluarga->rw= $request->rw;
    $master_kartukeluarga->desa= $request->desa;
    $master_kartukeluarga->kecamatan= $request->kecamatan;
    $master_kartukeluarga->kode_pos= $request->kode_pos;
    $master_kartukeluarga->kabupaten= $request->kabupaten;
    $master_kartukeluarga->provinsi= $request->provinsi;
    $master_kartukeluarga->tanggal_dibuat= $request->tanggal_dibuat;
    $master_kartukeluarga->save();

    // Simpan no KK ke session
    session(['no_kk' => $master_kartukeluarga->no_kk]);
       
        return redirect('master_kartukeluarga')->with('success', 'Data berhasil ditambahkan');
           }

    // Menampilkan form edit berdasarkan No KK
    public function edit($no_kk)
    {
        $master_kartukeluarga = master_kartukeluarga::where('no_kk', $no_kk)->first();
        return view('admin.master_kartukeluarga.edit', compact('master_kartukeluarga'));
    }

    // Mengupdate data berdasarkan No KK
    public function update($no_kk, Request $request)
    {
        master_kartukeluarga::where('no_kk', $no_kk)->update($request->except('_token', 'submit', '_method'));
        return redirect('/master_kartukeluarga')->with('success', 'Data berhasil diperbarui');
    }

    // Menghapus data berdasarkan No KK
    public function delete($no_kk)
    {
        master_kartukeluarga::where('no_kk', $no_kk)->delete();
        return redirect('/master_kartukeluarga')->with('success', 'Data berhasil dihapus');
    }
>>>>>>> cf20f72312a78abd9d6eb0a2c9ac4272e881ab4e
}
