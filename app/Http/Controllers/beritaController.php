<?php

namespace App\Http\Controllers;

use App\Models\master_berita;
use Illuminate\Http\Request;

class beritaController extends Controller
{
    public $filename;
    public $idBerita;

    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 10;

        if (strlen($katakunci)) {
            $databerita = master_berita::where('id_berita', 'like', "%$katakunci%")
                ->orWhere('judul', 'like', "%$katakunci%")
                ->orWhere('deskripsi', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $databerita = master_berita::orderBy('id_berita', 'desc')->paginate($jumlahbaris);
        }

        return view('admin.berita.index', compact('databerita'));
    }

    public function create()
    {
        // Generate ID Berita dengan format B[bulan]-001
        $currentDate = now();
        $tahun = $currentDate->format('Y');
        $prefix = "B{$tahun}-";

        $lastBerita = master_berita::where('id_berita', 'like', "$prefix%")
            ->orderBy('id_berita', 'desc')
            ->first();

        $newIncrement = $lastBerita
            ? (int)substr($lastBerita->id_berita, strlen($prefix)) + 1
            : 1;

        $formattedIncrement = str_pad($newIncrement, 4, '000', STR_PAD_LEFT);
        $idBerita = $prefix . $formattedIncrement;

        return view('admin.berita.create', compact('idBerita'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_berita' => 'required',
            'judul' => 'required',
            'deskripsi' => 'required',
            'image' => 'required|file|image|max:5000',
            'tanggal' => 'required|date',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $this->filename = date('YmdHi') . '-' . $file->getClientOriginalName();
            $file->move(public_path('images'), $this->filename);
        } else {
            $this->filename = null;
        }

        $databerita = [
            'id_berita' => $request->id_berita,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'image' => $this->filename,
            'tanggal' => $request->tanggal,
            'created_at' => now(),
        ];

        master_berita::create($databerita);
        return redirect('admin/berita')->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id)
    {
        $databerita = master_berita::where('id_berita', $id)->first();
        return view('admin.berita.edit', compact('databerita'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tanggal' => 'required|date',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $this->filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $this->filename);
        }

        $databerita = [
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'image' => $this->filename ?? $request->image_lama,
            'tanggal' => $request->tanggal,
            'updated_at' => now(),
        ];

        master_berita::where('id_berita', $id)->update($databerita);
        return redirect('admin/berita')->with('success', 'Data Berhasil Diedit');
    }

    public function destroy($id)
    {
        $berita = master_berita::where('id_berita', $id)->first();
        if ($berita && $berita->image) {
            $imagePath = public_path('images/' . $berita->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        master_berita::where('id_berita', $id)->delete();
        return redirect('admin/berita')->with('success', 'Data Berhasil Dihapus');
    }
}
