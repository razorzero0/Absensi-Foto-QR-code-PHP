<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create();

        \App\Models\Role::create([
            'nama_jabatan' => "admin",   
        ]);
        \App\Models\Role::create([
            'nama_jabatan' => "user",   
        ]);
        \App\Models\method_absensi::create([
            "batas_akhir" => "12:00",
            "foto" => 1,
            "qrcode" => 0    
        ]);
        \App\Models\Presence::create([
            "user_id" => 1,
            "jabatan" => "admin"  
        ]);
    }
}
