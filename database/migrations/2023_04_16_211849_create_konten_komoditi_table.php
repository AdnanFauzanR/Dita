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
        Schema::create('konten_komoditi', function (Blueprint $table) {
            $table->string('id', 13)->unique()->primary()->required();
            $table->unsignedBigInteger('user_id')->required();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->string('judul')->required();
            $table->string('sektor')->required();
            $table->string('kecamatan')->required();
            $table->string('gambar')->nullable();
            $table->longText('isi')->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('konten_komoditi', function (Blueprint $table){
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('konten_komoditi');
    }
};
