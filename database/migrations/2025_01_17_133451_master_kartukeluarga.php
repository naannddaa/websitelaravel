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
        Schema::create('master_kartukeluarga', function (Blueprint $table) {
            $table->Sring('no_kk');
            $table->Sring('alamat');
            $table->Sring('rt');
            $table->Sring('rw');
            $table->Sring('desa');
            $table->Sring('kecamatan');
            $table->Sring('kode_pos');
            $table->Sring('kabupaten');
            $table->Sring('provinsi');
            $table->Sring('tanggal_dibuat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
