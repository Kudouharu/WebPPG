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
        Schema::disableForeignKeyConstraints();

        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger('id_daerah')->unsigned();
            $table->foreign('id_daerah')->references('id')->on('daerah');
            $table->bigInteger('id_desa')->unsigned();
            $table->foreign('id_desa')->references('id')->on('desa');
            $table->bigInteger('id_kelompok')->unsigned();
            $table->foreign('id_kelompok')->references('id')->on('kelompok');
            $table->enum('jabatan', ["daerah","desa","kelompok"])->default('kelompok');
            $table->string('foto');
            $table->string('api_token')->nullable();
            $table->timestamp('token_expires_at')->nullable();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
