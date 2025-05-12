<?php 
namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF; 

class generate extends Controller
{
    public function generateAndStorePdf($id_pengajuan)
    {
        // Ambil data pengajuan berdasarkan ID
        $data = DB::table('view_data')->where('id_pengajuan', $id_pengajuan)->first();
    
        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        // Ambil nama template surat dari master_surat
        $surat = DB::table('master_surat')->where('id_surat', $data->id_surat)->first();
    
        if (!$surat || !$surat->nama_surat) {
            return redirect()->back()->with('error', "Data surat tidak ditemukan.");
        }

        // Tentukan path view surat di folder 'generate'
        $viewName = "generate." . strtolower(str_replace(' ', '', $surat->nama_surat)); // Menghilangkan spasi dan menjadikan huruf kecil

        // Pastikan view tersedia
        if (!view()->exists($viewName)) {
            return redirect()->back()->with('error', "Template surat untuk '{$surat->nama_surat}' tidak ditemukan.");
        }
    
        // Generate PDF
        $pdf = PDF::loadView($viewName, compact('data'))->setPaper('A4', 'portrait');
    
        // Nama file unik
        $fileName = "{$data->id_surat}_" . Str::slug($data->nama_lengkap) . "_{$data->id_pengajuan}_" . time() . ".pdf";
    
        // Simpan ke storage/app/public/surat/
        Storage::disk('public')->put("generatesurat/{$fileName}", $pdf->output());
    
        // Simpan nama file ke database
        DB::table('master_pengajuan')->where('id_pengajuan', $id_pengajuan)->update([
            'file_pdf' => $fileName,
        ]);
    
        return redirect()->back()->with('success', 'PDF berhasil dibuat dan disimpan.');
    }
}