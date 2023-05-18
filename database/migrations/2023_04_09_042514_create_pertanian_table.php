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
        Schema::create('pertanian', function (Blueprint $table) {
            $table->string('id', 13)->unique()->primary()->required();
            $table->string('kecamatan')->required();
            $table->string('bidang')->required();
            $table->string('komoditi')->required();
            $table->unsignedDecimal('luas_lahan', 14, 2)->required();
            $table->unsignedDecimal('produksi', 14, 2)->required();
            $table->unsignedDecimal('produktivitas', 14, 2)->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertanian');
    }
};
