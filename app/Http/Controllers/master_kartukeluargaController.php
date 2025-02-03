<?php

namespace App\Http\Controllers;
use App\Models\master_kartukeluarga;
use Illuminate\Http\Request;

class master_kartukeluargaController extends Controller
{
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
}
