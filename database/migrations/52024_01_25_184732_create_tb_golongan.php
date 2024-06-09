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
        Schema::create('tb_golongan', function (Blueprint $table) {
            $table->id('Id_Golongan');
            $table->string('Golongan', 5);
        });

        DB::table('tb_golongan')->insert([
            ['Id_Golongan' => 1, 'Golongan' => 'IV-4'],
            ['Id_Golongan' => 2, 'Golongan' => 'V-5'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_golongan');
    }
};
