<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF; 

class generate extends Controller
{
    public function generatePDF()
    {
        $data = [
            'nama' => 'SUMINEM',
            'ttl' => 'Ngawi, 30 Juni 1952',
            'agama' => 'Islam',
            'pekerjaan' => 'Wiraswasta',
            'nik' => '3521017006520019',
            'alamat' => 'Sedang RT 02 RW 07, Desa Tulakan, Kecamatan Sine, Kabupaten Ngawi',
            'tanggal_surat' => 'Tulakan, 10 Oktober 2017',
            'kepala_desa' => 'SUDARTO',
            'camat' => 'BUDI SANTOSO',
        ];

        $pdf = PDF::loadView('generate.AKTAKEMATIAN', $data);
        return $pdf->download('surat_keterangan.pdf'); // atau ->stream() untuk tampilkan di browser
    }

    public function viewSurat()
{
    $data = [
        'nama' => 'SUMINEM',
        'ttl' => 'Ngawi, 30 Juni 1952',
        'agama' => 'Islam',
        'pekerjaan' => 'Wiraswasta',
        'nik' => '3521017006520019',
        'alamat' => 'Sedang RT 02 RW 07, Desa Tulakan, Kecamatan Sine, Kabupaten Ngawi',
        'tanggal_surat' => 'Tulakan, 10 Oktober 2017',
        'kepala_desa' => 'SUDARTO',
        'camat' => 'BUDI SANTOSO',
    ];

    return view('generate.AKTAKEMATIAN', $data);
}
}