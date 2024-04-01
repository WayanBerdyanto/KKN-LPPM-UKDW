<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('nim', 8)->unique();
            $table->string('nama', 200);
            $table->string('password', 100);
            $table->string('prodi', 50);
            $table->year('angkatan');
            $table->string('gender', 15);
            $table->enum('status', ['ketua', 'anggota'])->default('anggota');
            $table->longText('alamat');
            $table->string('email', 50)->unique();
            $table->string('no_telp', 50);
            $table->string('role',100)->default('mahasiswa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
