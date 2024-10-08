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
        Schema::create('tb_jabatan', function (Blueprint $table) {
            $table->id('Id_Jabatan');
            $table->string('Jabatan', 50);
        });

        DB::table('tb_jabatan')->insert([
            ['Id_Jabatan' => 1, 'Jabatan' => 'Kepala Dinas'],
            ['Id_Jabatan' => 2, 'Jabatan' => 'Staff Dinas'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_jabatan');
    }
};
