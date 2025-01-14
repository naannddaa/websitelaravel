<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class master_penduduk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nik', 
        'nama_lengkap',
        'jenis_kelamin',
    ];

    protected $table = 'master_penduduk';
    public $timestamps = false;

    // Relasi dengan master_kartukeluarga
    public function kartukeluarga()
    {
        return $this->belongsTo(master_kartukeluarga::class, 'no_kk', 'no_kk');
    }
}
