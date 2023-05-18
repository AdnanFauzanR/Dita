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
        Schema::create('perindustrian', function (Blueprint $table) {
            $table->string('id', 13)->unique()->primary()->required();
            $table->string('kecamatan')->required();
            $table->string('komoditi')->required();
            $table->unsignedBigInteger('potensi_kandungan')->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perindustrian');
    }
};
