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
            'password' => bcrypt('1234'), 
            'Id_Role' => 1,
            'Id_Dinas'=> 2,
        ]);
        DB::table('tb_user')->insert([
            'username' => 'opd',
            'password' => bcrypt('1234'), 
            'Id_Role' => 2,
            'Id_Dinas' => 3,
        ]);
    }
}
