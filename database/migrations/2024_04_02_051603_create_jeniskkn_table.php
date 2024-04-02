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
        Schema::create('jeniskkn', function (Blueprint $table) {
            $table->char('kode_jenis', 5)->primary();
            $table->char('kode_semester', 5);
            $table->foreign('kode_semester')->references('kode_semester')->on('semesteraktif');
            $table->string('nama_kkn', 50);
            $table->string('lokasi', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jeniskkn');
    }
};
