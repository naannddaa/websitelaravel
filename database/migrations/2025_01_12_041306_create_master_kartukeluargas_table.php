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
            $table->char('no_kk');
            $table->unique('no_kk');
           $table->string('alamat');
           $table->string('rt');
           $table->string('rw');
           $table->string('desa');
           $table->string('kecamatan');
           $table->string('kode_pos');
           $table->string('kabupaten');
           $table->string('provinsi');
           $table->string('tanggaldibuat');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_kartukeluarga');
    }
};
