<?php

namespace Database\Seeders;
// use App\Models\Login;
use Illuminate\Support\Facades\DB;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('master_landingpage')->insert([
            // Tidak perlu isi apapun, hanya untuk trigger auto-increment id
        ]);
    }
}
