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
        Schema::create('detailkelompokkkn', function (Blueprint $table) {
            $table->bigIncrements('id_dtl');

            $table->char('kode_kelompok', 5);
            $table->foreign('kode_kelompok')->references('kode_kelompok')->on('kelompokkkn');

            $table->unsignedBigInteger('id_mahasiswa');
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailkelompokkkn');
    }
};
