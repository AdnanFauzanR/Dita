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
        Schema::table('konten_komoditi', function (Blueprint $table) {
            $table->dropColumn('kecamatan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('konten_komoditi', function (Blueprint $table) {
            $table->string('kecamatan')->required()->after('judul');
        });
    }
};
