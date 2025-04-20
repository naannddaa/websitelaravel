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
       Schema::create('master_pengajuan', function (Blueprint $table) {
            $table->integer('id_pengajuan')->primary();
            $table->char('id_surat', 20);
            $table->char('nik', 16);
            $table->string('keperluan', 50);
            $table->date('tanggal_diajukan')->nullable();
            $table->string('status', 25);
            $table->string('keterangan_ditolak', 50);
            $table->string('foto1', 100);
            $table->string('foto2', 100);
            $table->string('foto3', 100);
            $table->string('foto4', 100);
            $table->string('foto5', 100);
            $table->string('foto6', 100);
            $table->string('foto7', 100);
            $table->string('foto8', 100);
            $table->foreign('nik')->references('nik')->on('master_penduduks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_pengajuan_table');
    }
};
