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
        Schema::create('tekatekis', function (Blueprint $table) {
            $table->id();
            $table->string('pertanyaan');
            $table->string('a');
            $table->string('b');
            $table->string('c');
            $table->string('kunci');
            $table->string('level')->unique;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tekateki');
    }
};
