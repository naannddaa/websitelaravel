<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('master_beritas', function (Blueprint $table) {
            $table->string('id_berita');
            $table->primary('id_berita');
            $table->string('judul');
            $table->string('tanggal');
            $table->string('deskripsi');
            $table->string('image');
            $table->timestamps();
<<<<<<< HEAD:database/migrations/2025_01_13_135238_create_master_beritas_table.php

=======
>>>>>>> cf20f72312a78abd9d6eb0a2c9ac4272e881ab4e:database/migrations/2025_01_13_035238_create_master_beritas_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_beritas');
    }
};
