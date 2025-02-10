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
    Schema::table('master_penduduks', function (Blueprint $table) {
        $table->date('tanggal_perkawinan')->nullable()->change();
    });
}



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('master_penduduks', function (Blueprint $table) {
            $table->date('tanggal_perkawinan')->nullable(false)->change();
        });
    }
};
