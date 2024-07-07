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

        DB::table('tb_user')->insert([
            ['id' => 1, 'username' => 'bkd', 'password' => '$2y$10$79zyk/W4/14jVscgokiHge1p6nc4V7uPRJPNiabHkmZQbw/n3u4lm', 'Id_Role' => 1, 'Id_Dinas' => 1],
            ['id' => 2, 'username' => 'opd', 'password' => '$2y$10$79zyk/W4/14jVscgokiHge1p6nc4V7uPRJPNiabHkmZQbw/n3u4lm', 'Id_Role' => 2, 'Id_Dinas' => 3],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_user');
    }
};
