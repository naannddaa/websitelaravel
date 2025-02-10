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
            $table->string('no_kitap')->nullable()->change();
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
                $table->string('no_kitap')->nullable(false)->change();
            });
        }
};
