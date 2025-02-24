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
        Schema::create('master_akun', function (Blueprint $table) {
            $table->primary('id_akun');
            $table->integer('id_akun');
            $table->string('nik');
            $table->string('no_hp');
            $table->string('email');
            $table->string('foto_profil');
            $table->integer('level');
            $table->string('password');
            $table->foreign('nik')->references('nik')->on('master_penduduk')->onDelete('cascade');
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
        Schema::dropIfExists('master_akun');
    }
};
