<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class master_surat extends Model
{
    use HasFactory;
    protected $table = ['master_surat'];
    protected $fillable = [ 'nama_surat', 'id_surat', 'image'];
    public $timestamps = false;


    // relasi ke tabel master_pengajuan
    public function pengajuan () {
        return $this->hashMany(master_pengajuan::class, 'id_surat');
    }

}
