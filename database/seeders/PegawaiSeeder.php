<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tb_pegawai')->insert([
            'Id_Dinas' => 1, // Ganti dengan Id_Dinas yang sesuai
            'NIP' => '42519052', // Contoh pembuatan NIP random
            'Nama_Pegawai' => 'Ahmad Jayadi',
            'Tanggal_Lahir' => '1990-01-01',
            'Id_Jenis_Kelamin' => 1, // Ganti dengan Id_Jenis_Kelamin yang sesuai
            'Id_Jabatan' => 1, // Ganti dengan Id_Jabatan yang sesuai
            'Tanggal_Mulai' => '2022-01-01',
            'Golongan' => 'IV/b',
            'Kuota_Cuti' => 14,
            'Alamat_Pegawai' => 'Jl. Syehk Yusuf No. 11',
            'Telepon_Pegawai' => '081123',
        ]);
    }
}
