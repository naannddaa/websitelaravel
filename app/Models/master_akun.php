<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class master_akun extends Model
{
    use HasFactory;
    protected $fillable = ['akun_id', 'nik', 'no_hp', 'email', 'foto_profil', 'level', 'password'];
    protected $table ='master_akun';
    public $timestamps = false;
}
