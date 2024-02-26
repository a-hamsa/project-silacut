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
        Schema::create('tb_user', function (Blueprint $table) {
            $table->id();
            $table->string('username', 50);
            $table->string('password');
            $table->unsignedBigInteger('Id_Role');
            $table->unsignedBigInteger('Id_Dinas');
            $table->foreign('Id_Role')->references('Id_Role')->on('tb_role');
            $table->foreign('Id_Dinas')->references('Id_Dinas')->on('tb_dinas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_user');
    }
};
