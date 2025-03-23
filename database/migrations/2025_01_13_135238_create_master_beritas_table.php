<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('master_berita', function (Blueprint $table) {
            $table->string('id_berita', 10);
            $table->primary('id_berita');
            $table->string('judul', 150);
            $table->string('tanggal');
            $table->text('deskripsi');
            $table->string('image', 100);
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
        Schema::dropIfExists('master_berita');
    }
};
