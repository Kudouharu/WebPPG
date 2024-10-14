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

        Schema::create('jamaah', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('username');
            $table->string('nik');
            $table->date('tgllahir');
            $table->integer('gender');
            $table->bigInteger('id_cita_cita')->unsigned();
            $table->foreign('id_cita_cita')->references('id')->on('cita_cita');
            $table->bigInteger('id_hobi')->unsigned();
            $table->foreign('id_hobi')->references('id')->on('hobi');
            $table->bigInteger('id_pekerjaan')->unsigned();
            $table->foreign('id_pekerjaan')->references('id')->on('pekerjaan');
            $table->tinyInteger('mubalight');
            $table->tinyInteger('haji');
            $table->tinyInteger('agniya');
            $table->tinyInteger('duafa');
            $table->tinyInteger('yatim');
            $table->tinyInteger('mahasiswa');
            $table->tinyInteger('sarjana');
            $table->bigInteger('id_kelas')->unsigned();
            $table->foreign('id_kelas')->references('id')->on('kelas');
            $table->bigInteger('id_orangtua')->unsigned();
            $table->foreign('id_orangtua')->references('id')->on('orangtua');
            $table->string('foto');
            $table->tinyInteger('meninggal');
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
        Schema::dropIfExists('jamaah');
    }
};
