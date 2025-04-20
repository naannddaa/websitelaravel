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
            $table->string('id_pengajuan');
            $table->primary('id_pengajuan');
            $table->timestamps();
            $table->string('id_surat');
            $table->string('keperluan');
            $table->string('nik');
            $table->string('tanggal_diajukan', time());
            $table->enum('status', ['Ditinjau', 'Disetujui RT', 'Disetujui RW', 'Ditinjau Desa'])->default('Ditinjau');
            $table->text('keterangan_ditolak')->nullable();
            $table->string('foto1')->nullable();
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
            $table->string('foto4')->nullable();
            $table->string('foto5')->nullable();
            $table->string('foto6')->nullable();
            $table->string('foto7')->nullable();
            $table->string('foto8')->nullable();
            $table->foreign('nik')->references('nik')->on('master_penduduk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_pengajuan');
    }
};
