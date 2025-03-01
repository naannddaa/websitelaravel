<?php

namespace App\Http\Controllers;

use App\Models\master_akunrtrw;
use Illuminate\Http\Request;

class masterAkunRwController extends Controller
{

    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10;

        if (strlen($katakunci)) {
            $dataakunrw = master_akunrtrw::where('id_rtrw', 'like', "%$katakunci%")
            ->orWhere('nama', 'like', "%$katakunci%")
            ->orWhere('nik', 'like', "%$katakunci%")
            ->orWhere('rw', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);
        } else {
            $master_akun = master_akunrtrw::orderBy('id_rtrw', 'desc')->paginate($jumlahbaris);
        }
        $master_akun = master_akunrtrw::whereNull('rt')->get();
        return view('admin.MasterAkun.akun_rw', compact('master_akun'));

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
