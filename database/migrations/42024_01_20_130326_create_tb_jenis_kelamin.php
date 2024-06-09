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
        Schema::create('tb_jenis_kelamin', function (Blueprint $table) {
            $table->id('Id_Jenis_Kelamin');
            $table->string('Jenis_Kelamin');
        });

        DB::table('tb_jenis_kelamin')->insert([
            ['Id_Jenis_Kelamin' => 1, 'Jenis_Kelamin' => 'Laki-Laki'],
            ['Id_Jenis_Kelamin' => 2, 'Jenis_Kelamin' => 'Perempuan'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_jenis_kelamin');
    }
};
