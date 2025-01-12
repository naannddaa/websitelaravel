<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class master_penduduk extends Model
{
    use HasFactory;
    protected $fillable = ['nama_lengkap'];
    protected $table = 'master_penduduk';
    public $timestamps = false;
}
