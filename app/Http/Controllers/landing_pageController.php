<?php

namespace App\Http\Controllers;
use App\Models\landing_page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class landing_pageController extends Controller
{
    public function index()
    {
        $data = landing_page::first();

        // Jika tidak ada data, buat dummy kosong untuk menghindari error di blade
        if (!$data) {
            $data = new landing_page(); // semua field null by default
        }

        return view('admin.landingpage.index', compact('data'));
    }

    public function update(Request $request)
{
    $request->validate([
        'title' => 'required|string',
        'description' => 'nullable|string',
        'subtittle' => 'nullable|string',
        'section_text' => 'nullable|string',
        'subtitle_2' => 'nullable|string',
        'section_second' => 'nullable|string',
        'about_content' => 'nullable|string',
        'hero_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'image_description1' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'image_description2' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    // Cari data pertama atau buat baru jika tidak ada
    $content = landing_page::first();

    if (!$content) {
        // Jika tidak ada data, buat data baru dengan id = 1
        $content = new landing_page();
    }

    // Update teks
    $content->judul = $request->title;
        $content->deskripsi1 = $request->description;
        $content->subtittle = $request->subtittle;
        $content->section_text = $request->section_text;
        $content->subtitle_2 = $request->subtitle_2;
        $content->section_second = $request->section_second;
        $content->about_us = $request->about_content;

    // Upload image jika ada
    if ($request->hasFile('hero_image')) {
            // Hapus gambar lama jika ada
            if ($content->gambar1) {
                Storage::delete('public/' . $content->gambar1);
            }
            $content->gambar1 = $request->file('hero_image')->store('landingpage/hero_images', 'public');
        }

        if ($request->hasFile('image_description1')) {
            // Hapus gambar lama jika ada
            if ($content->image_description1) {
                Storage::delete('public/' . $content->image_description1);
            }
            $content->image_description1 = $request->file('image_description1')->store('landingpage/description_images', 'public');
        }

        if ($request->hasFile('image_description2')) {
            // Hapus gambar lama jika ada
            if ($content->image_description2) {
                Storage::delete('public/' . $content->image_description2);
            }
            $content->image_description2 = $request->file('image_description2')->store('landingpage/description_images', 'public');
        }

        // Simpan perubahan
        $content->save();

        return redirect()->back()->with('success', 'Konten berhasil diperbarui!');
}

}