<?php

namespace App\Http\Controllers;

use App\Models\master_rt;
use Illuminate\Http\Request;
use App\Models\master_penduduk;

class masterAkunRtController extends Controller
{

    public $id_rtrw;
    public function index(Request $request)
{
    $katakunci = $request->katakunci ?? ''; // Berikan nilai default jika $katakunci null
    $jumlahbaris = 10;

    if (strlen($katakunci)) {
        $dataakunrt = master_rt::where('id_rtrw', 'like', "%$katakunci%")
            ->orWhere('nama', 'like', "%$katakunci%")
            ->orWhere('nik', 'like', "%$katakunci%")
            ->orWhere('rt', 'like', "%$katakunci%")
            ->paginate($jumlahbaris);
    } else {
        $dataakunrt = master_rt::orderBy('id_rtrw', 'desc')->paginate($jumlahbaris);
    }

    // Generate ID otomatis
    $currentDate = now();
    $tahun = $currentDate->format('Y');
    $prefix = "T{$tahun}-";

    $lastAkunRt = master_rt::where('id_rtrw', 'like', "$prefix%")
        ->orderBy('id_rtrw', 'desc')
        ->first();

    $newIncrement = $lastAkunRt
        ? (int)substr($lastAkunRt->id_rtrw, strlen($prefix)) + 1
        : 1;

    $formattedIncrement = str_pad($newIncrement, 4, '0', STR_PAD_LEFT);
    $id_rtrw = $prefix . $formattedIncrement;

    return view('admin.MasterAkun.akun_rt', compact('dataakunrt', 'id_rtrw'));
}


    public function create()
    {
        // Generate ID Berita dengan format B[bulan]-001
        $currentDate = now();
        $tahun = $currentDate->format('Y');
        $prefix = "T{$tahun}-";

        $lastAkunRt = master_rt::where('id_rtrw', 'like', "$prefix%")
            ->orderBy('id_rtrw', 'desc')
            ->first();

        $newIncrement = $lastAkunRt
            ? (int)substr($lastAkunRt->id_rtrw, strlen($prefix)) + 1
            : 1;

        $formattedIncrement = str_pad($newIncrement, 4, '000', STR_PAD_LEFT);
        $id_rtrw = $prefix . $formattedIncrement;

        return view('admin.MasterAkun.akun_rt', compact('id_rtrw'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|exists:master_penduduk,nik|max:17|unique:master_rt_rw,nik', // Perbaikan nama tabel
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'rt' => 'required|string|max:5',
            'rw' => 'required|string|max:5',
        ], [
            'nik.exists' => 'NIK belum terdaftar di data penduduk, silahkan menambahkan data di master penduduk terlebih dahulu.',
            'nik.unique' => 'NIK yang anda gunakan sudah terdaftar sebagai Ketua RT / ketua RW.'
        ]);

        $dataakunrt = [
            'id_rtrw' => $request->id_rtrw,
            'nik' => $request->nik,
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'rt' => $request->rt,
            'rw' => $request->rw,
        ];

        master_rt::create($dataakunrt);
        return redirect()->route('akunrt')->with('success', 'Data Berhasil Disimpan');
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
        $request->validate([
            'nama' => 'required',
            'no_hp' => 'required',
            'rt' => 'required',
            'rw' => 'required'
        ]);

        $dataakunrt = [
            'nama' => $request->nama,
            'no_hp' => $request->no_hp,
            'rt' => $request->rt,
            'rw' => $request->rw,
        ];

        master_rt::where('nik', $id)->update($dataakunrt);
        return redirect()->route('akunrt')->with('success', 'Data Berhasil Diedit');
    }

    public function destroy($id_rtrw)
    {
        master_rt::where('id_rtrw', $id_rtrw)->delete();
        return redirect('akunrt')->with('success', 'Data berhasil dihapus');
    }

    public function getPendudukData(Request $request)
    {
        $nik = $request->nik; // Ambil NIK dari request

        // Cari data penduduk berdasarkan NIK
        $penduduk = master_penduduk::where('nik', $nik)->first();

        if ($penduduk) {
            // Jika data ditemukan, kembalikan response JSON
            return response()->json([
                'success' => true,
                'data' => [
                    'nama_lengkap' => $penduduk->nama,
                    'no_hp' => $penduduk->no_hp,
                ],
            ]);
        } else {
            // Jika data tidak ditemukan, kembalikan response JSON dengan success false
            return response()->json([
                'success' => false,
                'message' => 'NIK tidak ditemukan di database penduduk.',
            ]);
        }
    }
}
