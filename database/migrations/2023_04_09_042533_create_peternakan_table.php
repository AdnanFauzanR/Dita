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
        Schema::create('peternakan', function (Blueprint $table) {
            $table->string('id', 13)->unique()->primary()->required();
            $table->string('kecamatan')->required();
            $table->string('komoditi')->required();
            $table->unsignedInteger('total')->required();
            $table->unsignedInteger('kelahiran')->required();
            $table->unsignedInteger('kematian')->required();
            $table->unsignedInteger('pemotongan')->required();
            $table->unsignedInteger('ternak_masuk')->required();
            $table->unsignedInteger('ternak_keluar')->required();
            $table->unsignedInteger('populasi')->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peternakan');
    }
};
