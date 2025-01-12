<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_penduduk', function (Blueprint $table) {
            $table->string('nama_lengkap');
            $table->string('nik');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('agama');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('golongan_darah');
            $table->string('status_perkawinan');
            $table->string('tanggal_perkawinan');
            $table->string('status_keluarga');
            $table->string('kewarganegaraan');
            $table->string('no_paspor');
            $table->string('no_kitap');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_penduduk');
    }
};
