<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class master_berita extends Model
{
    use HasFactory;
    protected $fillable = ['id_berita', 'judul', 'tanggal', 'deskripsi', 'image', 'nik'];
    protected $table ='master_beritas';
    public $timestamps = false;

}
