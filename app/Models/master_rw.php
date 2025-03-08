<?php

namespace App\Models;

use App\Models\master_akunrtrw;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class master_rw extends Model
{
    use HasFactory;
    protected $fillable = ['akun_id', 'nik', 'nama', 'no_hp', 'password', 'email', 'level', 'foto_profil'];
    protected $table ='master_akun';
    public $timestamps = false;
}
