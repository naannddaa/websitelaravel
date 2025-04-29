<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\master_penduduk;

class master_akun extends Authenticatable
{
    use HasApiTokens, HasFactory;

    protected $table = 'master_akun'; // Nama tabel
    protected $primaryKey = 'id'; // Primary key
    public $timestamps = false; // Tidak pakai created_at/updated_at

    protected $fillable = [
        'id',
        'nik',
        'no_hp',
        'email',
        'foto_profil',
        'level',
        'password',
    ];

   
}
