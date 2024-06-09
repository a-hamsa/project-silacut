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
        Schema::create('tb_jenis_cuti', function (Blueprint $table) {
            $table->id('Id_Jenis_Cuti');
            $table->string('Nama_Jenis_Cuti', 50);
        });
        DB::table('tb_jenis_cuti')->insert([
            ['Id_Jenis_Cuti' => 1, 'Nama_Jenis_Cuti' => 'Cuti Tahunan'],
            ['Id_Jenis_Cuti' => 2, 'Nama_Jenis_Cuti' => 'Cuti Bersalin'],
            ['Id_Jenis_Cuti' => 3, 'Nama_Jenis_Cuti' => 'Cuti Sakit'],
            ['Id_Jenis_Cuti' => 4, 'Nama_Jenis_Cuti' => 'Cuti Besar'],
            ['Id_Jenis_Cuti' => 5, 'Nama_Jenis_Cuti' => 'Cuti Alasan Penting'],
            ['Id_Jenis_Cuti' => 6, 'Nama_Jenis_Cuti' => 'Cuti Diluar Tanggungan Negara'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_jenis_cuti');
    }
};
