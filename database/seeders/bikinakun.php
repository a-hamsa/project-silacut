<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class bikinakun extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_user')->insert([
            'username' => 'bkd',
            'password' => bcrypt('1234'), // Contoh pembuatan NIP random
            'Id_Role' => 1,
        ]);
    }
}
