<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_pegawai', function (Blueprint $table) {
            $table->unsignedBigInteger('Id_Dinas')->unsigned();
            $table->string('NIP')->primary();
            $table->string('Nama_Pegawai', 100);
            $table->date('Tanggal_Lahir');
            $table->string('Tempat_Lahir');
            $table->unsignedBigInteger('Id_Jenis_Kelamin')->unsigned();
            $table->unsignedBigInteger('Id_Jabatan')->unsigned();
            $table->date('Tanggal_Mulai');
            $table->unsignedBigInteger('Id_Golongan')->unsigned();
            $table->integer('Kuota_Cuti')->default(12);
            $table->string('Alamat_Pegawai', 100);
            $table->string('Telepon_Pegawai');

            $table->foreign('Id_Dinas')->references('Id_Dinas')->on('tb_dinas');
            $table->foreign('Id_Golongan')->references('Id_Golongan')->on('tb_golongan');
            $table->foreign('Id_Jenis_Kelamin')->references('Id_Jenis_Kelamin')->on('tb_jenis_kelamin');
            $table->foreign('Id_Jabatan')->references('Id_Jabatan')->on('tb_jabatan');
        });

        DB::table('tb_pegawai')->insert([
            ['NIP' => '12345', 'Id_Dinas' => 1, 'Nama_Pegawai' => 'John Doe', 'Tanggal_Lahir' => '1980-01-01','Tempat_Lahir' => 'Makassar', 'Id_Jenis_Kelamin' => 1, 'Id_Jabatan' => 1, 'Tanggal_Mulai' => '2020-01-01', 'Id_Golongan' => 1,'Kuota_Cuti' => 12, 'Alamat_Pegawai' => '123 Main St', 'Telepon_Pegawai' => 123456789],
            ['NIP' => '67890', 'Id_Dinas' => 3, 'Nama_Pegawai' => 'Jane Smith', 'Tanggal_Lahir' => '1985-05-05','Tempat_Lahir' => 'Makassar', 'Id_Jenis_Kelamin' => 2, 'Id_Jabatan' => 2, 'Tanggal_Mulai' => '2021-02-01', 'Id_Golongan' => 2,'Kuota_Cuti' => 12, 'Alamat_Pegawai' => '456 Elm St', 'Telepon_Pegawai' => 987654321],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pegawai');
    }
};
