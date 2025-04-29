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
            $table->integer('id');
            $table->primary('id');
            $table->string('nik', 16);
            $table->string('no_hp', 15);
            $table->string('email', 50);
            $table->string('foto_profil')->nullable();
            $table->integer('level');
            $table->string('password', 100);
            $table->string('remember_token', 100)->nullable();
            $table->foreign('nik')->references('nik')->on('master_penduduks')->onDelete('cascade');
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
