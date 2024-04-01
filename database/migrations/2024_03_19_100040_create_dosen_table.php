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
        Schema::create('dosens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('nip',8)->unique();
            $table->string('username',20)->unique();
            $table->string('password',100);
            $table->string('nama',100);
            $table->string('gender',15)->nullable();
            $table->longText('alamat')->nullable();
            $table->string('email', 50)->unique();
            $table->string('no_telp', 50)->nullable();
            $table->string('status',100)->default('dosen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};
