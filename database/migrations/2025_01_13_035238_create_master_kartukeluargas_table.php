



<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('master_kartukeluargas', function (Blueprint $table) {
            $table->primary('no_kk');
            $table->String('no_kk');
            $table->String('alamat');
            $table->String('rt');
            $table->String('rw');
            $table->String('desa');
            $table->String('kecamatan');
            $table->String('kode_pos');
            $table->String('kabupaten');
            $table->String('provinsi');
            $table->String('tanggal_dibuat');
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
        Schema::dropIfExists('master_kartukeluargas');
    }
};
