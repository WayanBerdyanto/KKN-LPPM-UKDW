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
        Schema::create('kelompokkkn', function (Blueprint $table) {
            $table->char('kode_kelompok', 5)->primary();

            $table->char('kode_jenis', 5);
            $table->foreign('kode_jenis')->references('kode_jenis')->on('jeniskkn');

            $table->unsignedBigInteger('id_dosen');
            $table->foreign('id_dosen')->references('id')->on('dosens');

            $table->string('nama_kelompok', 50);
            $table->string('desa', 50);
            $table->string('kecamatan', 50);
            $table->string('kabupaten', 50);
            $table->string('provinsi', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelompokkkn');
    }
};