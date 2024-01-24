<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RelasiPegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_dinas')->insert([
            'Dinas' => 'Dinassalam',
        ]);

        // Insert data into tb_jenis_kelamin
        DB::table('tb_jenis_kelamin')->insert([
            'Jenis_Kelamin' => 'Laki-laki',
        ]);

        // Insert data into tb_jabatan
        DB::table('tb_jabatan')->insert([
            'Jabatan' => 'Kepala Dinas',
        ]);
    }
}
