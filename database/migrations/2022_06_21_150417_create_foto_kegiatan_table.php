<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoKegiatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_kegiatan', function (Blueprint $table) {
            $table->id('id_foto');
            $table->unsignedBigInteger('id_kegiatan');
            $table->foreign('id_kegiatan')->references('id_kegiatan')->on('kegiatan')->onDelete('cascade');
            $table->text('deskripsi');
            $table->string('foto');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->dateTime('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foto_kegiatan');
    }
}
