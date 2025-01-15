<?php
namespace App\Http\Controllers;

use App\Models\master_berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        // Mendapatkan data berita dan menampilkan 10 per halaman, diurutkan berdasarkan tanggal terbaru
        $databerita = master_berita::orderBy('tanggal', 'desc')->paginate(10);
        return view('berita.index', compact('databerita'));
    }

    public function create()
    {
        // Generate ID Berita dengan format B[bulantahun]-001
        $currentDate = now();
        $bulanTahun = $currentDate->format('mY'); // Mendapatkan format bulan-tahun
        $prefix = "B{$bulanTahun}-";

        // Cari ID terakhir dengan prefix yang sama
        $lastBerita = master_berita::where('id_berita', 'like', "$prefix%")
            ->orderBy('id_berita', 'desc')
            ->first();

        // Tentukan increment
        if ($lastBerita) {
            // Ambil angka increment terakhir dari ID
            $lastIncrement = (int)substr($lastBerita->id_berita, strlen($prefix));
            $newIncrement = $lastIncrement + 1;
        } else {
            $newIncrement = 1;
        }

        // Format increment ke tiga digit
        $formattedIncrement = str_pad($newIncrement, 3, '0', STR_PAD_LEFT);

        // Gabungkan prefix dan increment untuk mendapatkan ID berita
        $idBerita = $prefix . $formattedIncrement;

        return view('berita.create', compact('idBerita'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tanggal' => 'required|date'
        ]);

        // Mengolah dan menyimpan file gambar jika ada
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName); // Menyimpan gambar di folder public/images
        } else {
            $imageName = null; // Jika tidak ada gambar, set ke null
        }

        // Simpan data ke database
        $databerita = [
            'id_berita' => $request->id_berita,  // Pastikan id_berita diisi dari form
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'image' => $imageName, // Menyimpan nama file gambar
            'tanggal' => $request->tanggal,
            'waktu' => now()
        ];

        master_berita::create($databerita);
        return redirect('berita')->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($id)
    {
         $databerita = master_berita::where('id_berita',$id)->first();
         return view('berita.edit')->with('databerita', $databerita);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|max:255',
            'deskripsi' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'tanggal' => 'required|date'
        ]);

        // Mengolah dan menyimpan file gambar jika ada
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName); // Menyimpan gambar di folder public/images
        } else {
            $imageName = null; // Jika tidak ada gambar, set ke null
        }

        // Simpan data ke database
        $databerita = [
            'id_berita' => $request->id_berita,  // Pastikan id_berita diisi dari form
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'image' => $imageName, // Menyimpan nama file gambar
            'tanggal' => $request->tanggal,
            'waktu' => now()
        ];
        master_berita::where('id_berita',$id)->update($databerita);
        return redirect('berita')->with('success', 'Data Berhasil Diedit');
    }

    public function destroy($id)
    {
        master_berita::where('id_berita', $id)->delete();
        return redirect()->to('berita')->with('success', 'Data Berhasil Dihapus');
    }

}
