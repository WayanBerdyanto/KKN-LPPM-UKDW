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
        Schema::create('logbookmahasiswa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger("id_mahasiswa");
            $table->foreign("id_mahasiswa")->references("id")->on("mahasiswas");
            $table->string('judul', 50);
            $table->longText('deskripsi');
            $table->date("tanggal");
            $table->string("komentar_dosen")->nullable();
            $table->string("komentar_admin")->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logbookmahasiswa');
    }
};
