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
        Schema::create('users_progress', function (Blueprint $table) {
            //contains id id_user id_materi progress waktu_belajar
            $table->id();
            $table->string('nama_user');
            $table->string('nama_materi');
            $table->integer('level');
            $table->string('progress');
            $table->string('waktu_belajar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('users_progress');
    }
};
