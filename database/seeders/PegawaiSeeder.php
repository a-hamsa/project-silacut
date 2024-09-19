<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        // Retrieve valid id_golongan from tb_golongan table
        $validGolongan = DB::table('tb_golongan')->pluck('Id_Golongan')->toArray();
        
        for ($i = 0; $i < 30; $i++) {
            DB::table('tb_pegawai')->insert([
                'Id_Dinas' => $faker->numberBetween(1, 5),
                'NIP' => $faker->numerify('########'),
                'Nama_Pegawai' => $faker->name,
                'Tanggal_Lahir' => $faker->date('Y-m-d', '2000-01-01'),
                'Id_Jenis_Kelamin' => $faker->numberBetween(1, 2),
                'Id_Jabatan' => $faker->numberBetween(1, 2),
                'Tanggal_Mulai' => $faker->date('Y-m-d', '2023-12-31'),
                'id_Golongan' => $faker->numberBetween(1, 2),
                'Tempat_Lahir' => $faker->city,
                'Kuota_Cuti' => $faker->numberBetween(10, 20),
                'Alamat_Pegawai' => $faker->address,
                'Telepon_Pegawai' => $faker->phoneNumber,
            ]);
        }
    }
}
