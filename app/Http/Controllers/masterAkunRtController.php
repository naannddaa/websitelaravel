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
        $katakunci = $request->katakunci ?? '';
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
        $prefix = "R{$tahun}-";

        $lastAkunRt = master_rt::where('id_rtrw', 'like', "$prefix%")
            ->orderBy('id_rtrw', 'desc')
            ->first();

        $newIncrement = $lastAkunRt
            ? (int)substr($lastAkunRt->id_rtrw, strlen($prefix)) + 1
            : 1;

        $formattedIncrement = str_pad($newIncrement, 3, '0', STR_PAD_LEFT);
        $id_rtrw = $prefix . $formattedIncrement;

        // Ambil data penduduk yang Kepala Keluarga
        $data = master_penduduk::where('status_keluarga', 'Kepala Keluarga')
            ->join('master_kartukeluargas', 'master_penduduks.no_kk', '=', 'master_kartukeluargas.no_kk')
            ->select(
                'master_penduduks.nama_lengkap',
                'master_penduduks.nik',
                'master_kartukeluargas.rt',
                'master_kartukeluargas.rw'
            )
            ->get();

        return view('admin.MasterAkun.akun_rt', compact('dataakunrt', 'id_rtrw', 'data'));
    }

    public function create()
    {
        return view('admin.MasterAkun.akun_rt');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|string|exists:master_penduduk,nik|max:17|unique:master_rt_rw,nik',
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'rt' => 'required|string|max:5',
            'rw' => 'required|string|max:5',
        ], [
            'nik.exists' => 'NIK belum terdaftar di data penduduk, silahkan menambahkan data di master penduduk terlebih dahulu.',
            'nik.unique' => 'NIK yang anda gunakan sudah terdaftar sebagai Ketua RT / ketua RW.',
            'no_hp.max' => 'Panjang nomer Hp maksimal 15 karakter',
            'rt.max' => 'Panjang RT maksimal 3 karakter',
            'rw.max' => 'Panjang RW maksimal 3 karakter',
        ]);

        // Validasi kombinasi RT dan RW
        $exists = master_rt::where('rt', $request->rt)
            ->where('rw', $request->rw)
            ->exists();

        if ($exists) {
            return redirect()->back()->withErrors([
                'rt' => 'Kombinasi RT dan RW sudah ada. Harap gunakan kombinasi yang berbeda.',
                'rw' => 'Kombinasi RT dan RW sudah ada. Harap gunakan kombinasi yang berbeda.'
            ])->withInput();
        }

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

        // Cek kombinasi RT dan RW (kecuali untuk data yang sedang di-edit)
        $exists = master_rt::where('rt', $request->rt)
            ->where('rw', $request->rw)
            ->where('nik', '!=', $id)
            ->exists();

        if ($exists) {
            return redirect()->back()->withErrors([
                'rt' => 'Kombinasi RT dan RW sudah ada. Harap gunakan kombinasi yang berbeda.',
                'rw' => 'Kombinasi RT dan RW sudah ada. Harap gunakan kombinasi yang berbeda.'
            ])->withInput();
        }

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

    public function getNamaByNik(Request $request)
    {
        $nama_lengkap = $request->nama_lengkap;
        $data = master_penduduk::where('nama_lengkap', $nama_lengkap)->first();
        if ($data) {
            return response()->json([
                'success' => true,
                'nik' => $data->nik
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
    }
}
