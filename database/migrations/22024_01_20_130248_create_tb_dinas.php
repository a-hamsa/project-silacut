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
        Schema::create('tb_dinas', function (Blueprint $table) {
            $table->id('Id_Dinas');
            $table->string('Dinas', 50);
        });

        DB::table('tb_dinas')->insert([
            ['Id_Dinas' => 1, 'Dinas' => 'BKD'],
            ['Id_Dinas' => 2, 'Dinas' => 'Dinas Pemakaman'],
            ['Id_Dinas' => 3, 'Dinas' => 'Dinas Pariwisata'],
            ['Id_Dinas' => 4, 'Dinas' => 'Dinas Pertanian'],
            ['Id_Dinas' => 5, 'Dinas' => 'Dinas Pendidikan'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_dinas');
    }
};
