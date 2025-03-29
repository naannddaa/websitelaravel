<?php

namespace App\Http\Controllers;


use App\Models\master_penduduk;
use App\Models\master_rw;
use App\Models\master_rt;
use Illuminate\Http\Request;

class masterAkunRwController extends Controller
{
    public $id_rtrw;

    public function index(Request $request)
    {
        $katakunci = $request->katakunci ?? '';
        $jumlahbaris = 10;

        if (strlen($katakunci)) {
            $dataakunrw = master_rw::where('id_rtrw', 'like', "%$katakunci%")
            ->orWhere('nama', 'like', "%$katakunci%")
            ->orWhere('nik', 'like', "%$katakunci%")
            ->orWhere('rw', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);
        } else {
            $dataakunrw = master_rw::orderBy('id_rtrw', 'desc')->paginate($jumlahbaris);
        }
        $dataakunrw = master_rw::whereNull('rt')->get();


        // membuat id autoincrement
        $currentDate = now();
        $tahun = $currentDate->format('Y');
        $prefix = "R{$tahun}-";

        $lastAkunRw = master_rw::where('id_rtrw', 'like', "$prefix")
        ->orderBy('id_rtrw', 'desc')
        ->first();

        // mencari id terakhir yang sudah ada pada database, jika ada maka tambah 1
        $newIncrement = $lastAkunRw
        ? (int)substr($lastAkunRw->id_rtrw, strlen($prefix)) + 1
        : 1;

        $formattedIncrement = str_pad($newIncrement, 3, '0', STR_PAD_LEFT);
        $id_rtrw = $prefix . $formattedIncrement;

        // mengambil data penduduk yang berstatus kepala keluarga dan join master penduduk
        $data = master_penduduk::where('status_keluarga', 'Kepala Keluarga')
        ->join('master_kartukeluargas', 'master_penduduks.no_kk', '=', 'master_kartukeluargas.no_kk')
        ->select(
            'master_penduduks.nama_lengkap',
            'master_penduduks.nik',
            'master_kartukeluargas.rw'
        )
        ->get();
        // kirim ke view
        return view('admin.MasterAkun.akun_rw', compact('dataakunrw', 'id_rtrw', 'data'));
    }

    public function create()
    {
        //
        return view('admin.MasterAkun.akun_rw');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|exists:master_penduduks,nik|unique:master_rt_rw,nik',
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15|min_digits:10',

            'rw' => 'required|string|max:3',
        ], [
            'nik.exists' => 'NIK belum terdaftar di data penduduk, silahkan menambahkan data di master penduduk terlebih dahulu.',
            'nik.unique' => 'NIK yang anda gunakan sudah terdaftar sebagai Ketua RT / ketua RW.',
            'no_hp.max' => 'Panjang nomer Hp maksimal 15 karakter',
            'no_hp.min_digits' => 'Panjang nomer Hp miminal 10 karakter',
            'rw.max' => 'panjang RW maksimal 3 karakter',
        ]);
        $dataakunrw = [
            'id_rtrw' => $request->id_rtrw,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'rw' => $request->rw,
        ];
        master_rw::create($dataakunrw);
        return redirect()->route('akunrw')->with('success', 'Data Berhasil Disimpan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'no_hp' => 'required',
        'rw' => 'required'
    ]);

    $dataakunrw = [
        'nama' => $request->nama,
        'no_hp' => $request->no_hp,
        'rw' => $request->rw,
    ];

    master_rw::where('nik', $id)->update($dataakunrw);
    return redirect()->route('akunrw')->with('success', 'Data Berhasil Diedit');
}

    public function destroy($id_rtrw)
    {
        master_rw::where('id_rtrw', $id_rtrw)->delete();
        return redirect('akunrw')->with('success', 'Data berhasil dihapus');
    }

    // memgambil data untuk tambah data berdasarkan nama
    public function getNamaRw(Request $request){
        $nama_lengkap = $request->nama_lengkap;
        $data = master_penduduk::where('nama_lengkap', $nama_lengkap)->first();
        if ($data) {
            return response()->json([
                'success' => true,
                'nik' =>$data->nik
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data tidak ditemukan'
            ]);
        }
        }
    }


