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
        Schema::create('tb_cuti', function (Blueprint $table) {
            $table->id('Id_Data_Cuti');
            $table->string('NIP');
            $table->unsignedBigInteger('Id_Jenis_Cuti');
            $table->date('Tanggal_Mulai_Cuti');
            $table->date('Tanggal_Berakhir_Cuti');
            $table->date('Tanggal_Pengajuan');
            $table->integer('Lama_Cuti');
            $table->string('Alasan_Cuti', 256);
            $table->string('Alamat_Cuti', 256);
            $table->string('SK_Terakhir', 256)->nullable();
            $table->string('Rekap_Absen', 256)->nullable();
            $table->string('Permohonan_Cuti', 256)->nullable();
            
            $table->foreign('NIP')->references('NIP')->on('tb_pegawai')->onDelete('cascade');
            $table->foreign('Id_Jenis_Cuti')->references('Id_Jenis_Cuti')->on('tb_jenis_cuti');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_cuti');
    }
};
