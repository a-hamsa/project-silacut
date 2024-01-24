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
            $table->id('NIP');
            $table->string('Nama_Pegawai', 100);
            $table->date('Tanggal_Lahir');
            $table->unsignedBigInteger('Id_Jenis_Kelamin')->unsigned();
            $table->unsignedBigInteger('Id_Jabatan')->unsigned();
            $table->date('Tanggal_Mulai');
            $table->string('Golongan', 100);
            $table->integer('Kuota_Cuti');
            $table->string('Alamat_Pegawai', 100);
            $table->integer('Telepon_Pegawai');

            $table->foreign('Id_Dinas')->references('Id_Dinas')->on('tb_dinas');
            $table->foreign('Id_Jenis_Kelamin')->references('Id_Jenis_Kelamin')->on('tb_jenis_kelamin');
            $table->foreign('Id_Jabatan')->references('Id_Jabatan')->on('tb_jabatan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_pegawai');
    }
};
