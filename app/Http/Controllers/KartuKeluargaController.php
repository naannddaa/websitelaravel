<?php

namespace App\Http\Controllers;

use App\Models\master_kartukeluarga;
use Illuminate\Http\Request;

class kartukeluargaController extends Controller
{
    public function index()
    {
        $data = master_kartukeluarga::all();
        return view('kartukeluarga.index', compact('data'));
    }

    public function store(Request $request)
    {
        master_kartukeluarga::create($request->all());
        return redirect()->route('kartukeluarga.index')->with('success', 'Data berhasil ditambahkan.');
    }
    

    public function destroy($no_kk)
    {
        $data = master_kartukeluarga::findOrFail($no_kk);
        $data->delete();
    
        return redirect()->route('kartukeluarga.index')->with('success', 'Data berhasil dihapus.');
    }
    
}
