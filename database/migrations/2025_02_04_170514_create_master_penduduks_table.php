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
        Schema::create('master_penduduks', function (Blueprint $table) {
            $table->primary('nik');
            $table->string('nik');
            $table->string('nama_lengkap');
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('golongan_darah');
            $table->string('status_perkawinan');
            $table->date('tanggal_perkawinan');
            $table->string('status_keluarga');
            $table->string('kewarganegaraan');
            $table->string('no_paspor');
            $table->string('no_kitap');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('no_kk');
            $table->foreign('no_kk')->references('no_kk')->on('master_kartukeluargas')->onDelete('cascade');; 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_penduduks');
    }
};
