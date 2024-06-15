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
        Schema::create('tb_role', function (Blueprint $table) {
            $table->id('Id_Role');
            $table->string('Role', 50);
        });

        DB::table('tb_role')->insert([
            ['Id_Role' => 1, 'Role' => 'BKD'],
            ['Id_Role' => 2, 'Role' => 'OPD'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_role');
    }
};
