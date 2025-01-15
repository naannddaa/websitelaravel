<?php

namespace App\Http\Controllers;

use App\Models\master_berita;
use Illuminate\Http\Request;

class beritaController extends Controller
{
   
    public function index()
    {
        $databerita = master_berita::orderBy('tanggal', 'desc')->paginate(10);
        return view('berita.index')->with('databerita', $databerita);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berita.create');
    }

    public function store(Request $request)
    {
    

        $databerita = [ 
                'id_berita'=>$request->idberita,
                'judul'=>$request->judul,
                'deskripsi'=>$request->deskripsi,
                'image'=>$request->image,
                'tanggal'=>$request->tanggal
        ];

        master_berita::create($databerita);
        // return redirect()->to('berita')->with('success', 'Task Created Successfully!');
        return redirect('berita')->with('success', 'Data Berhasil Disimpan');

    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
