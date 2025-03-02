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
        Schema::create('master_rt_rw', function (Blueprint $table) {
            $table->id_rtrw();
            $table->primary('id_rtrw');
            $table->nik();
            $table->nama();
            $table->no_hp();
            $table->rt();
            $table->rw();
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
        Schema::dropIfExists('master_rt_rw');
    }
};
