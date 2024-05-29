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
            $table->char('username', 8)->unique();
            $table->string('nama', 200)->nullable();
            $table->string('password', 100)->default(bcrypt('12345678'));
            $table->string('prodi', 50);
            $table->year('angkatan')->nullable();
            $table->string('gender', 15);
            $table->enum('status', ['ketua', 'anggota'])->default('anggota')->nullable();
            $table->longText('alamat')->nullable();
            $table->string('email', 50)->nullable();
            $table->string('no_telp', 50)->nullable();
            $table->string('role',100)->default('mahasiswa');
            $table->string('foto', 100)->nullable();
            $table->integer('nilai')->nullable();
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
