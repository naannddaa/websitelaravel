<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Login extends Authenticatable
{
    use HasFactory;

    protected $table = 'master_akuns';
    protected $primaryKey = 'id_akun';
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'id_akun',
        'nik',
        'no_hp',
        'email',
        'foto_profil',
        'level',
        'password',
    ];
}


