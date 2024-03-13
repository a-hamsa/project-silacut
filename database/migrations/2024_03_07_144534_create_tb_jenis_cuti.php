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
            $table->unsignedBigInteger('Kuota_Cuti');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_jenis_cuti');
    }
};
