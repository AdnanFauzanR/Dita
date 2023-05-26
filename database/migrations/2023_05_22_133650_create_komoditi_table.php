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
        Schema::create('komoditi', function (Blueprint $table) {
            $table->string('id', 13);
            $table->unsignedBigInteger('user_id')->required();
            $table->string('sektor');
            $table->string('nama');
            $table->string('bidang')->nullable()->default("");
            $table->string('kecamatan')->nullable()->default("");
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('komoditi', function (Blueprint $table){
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
        Schema::dropIfExists('komoditi');
    }
};
