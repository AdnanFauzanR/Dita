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
        Schema::create('pariwisata', function (Blueprint $table) {
            $table->string('id', 13)->unique()->primary()->required();
            $table->string('kecamatan')->required();
            $table->string('nama_wisata')->required();
            $table->string('jenis_wisata');
            $table->string('desa')->required();
            $table->unsignedInteger('wisatawan')->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pariwisata');
    }
};
