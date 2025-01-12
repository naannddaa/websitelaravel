<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class master_kartukeluarga extends Model
{
    use HasFactory;
    protected $fillable = ['no_kk', 'alamat', 'rt', 'rw', 'desa', 'kecamatan', 'kode_pos', 'kabupaten', 'provinsi', 'tanggal_dibuat'];
    protected $table = 'master_kartukeluarga';
    public $timestamps = false;
}
