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
        Schema::create('konten_berita', function (Blueprint $table) {
            $table->string('id', 13)->unique()->primary()->required();
            $table->unsignedBigInteger('user_id')->required();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->string('judul')->required();
            $table->string('sektor')->required();
            $table->string('kecamatan')->required();
            $table->string('gambar', 255)->nullable();
            $table->longText('isi')->required();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('konten_berita', function (Blueprint $table){
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('konten_berita');
    }
};
