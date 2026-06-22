<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->id();
            $table->string('gambar'); // Lokasi file foto fasilitas
            $table->string('nama_fasilitas'); // Nama ruangannya (ex: "Taman Bermain")
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fasilitas');
    }
};