<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;


class master_akun extends Authenticatable
{
    use HasFactory, HasApiTokens;
    protected $primaryKey = 'akun_id';
    protected $fillable = ['akun_id', 'nik', 'no_hp', 'email', 'foto_profil', 'level', 'password'];
    protected $table ='master_akun';
    public $timestamps = false;
}
