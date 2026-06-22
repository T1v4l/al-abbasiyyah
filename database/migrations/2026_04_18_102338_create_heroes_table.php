<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('heroes', function (Blueprint $table) {
        $table->id();
        $table->string('gambar'); // Untuk menyimpan lokasi file foto
        $table->string('label')->nullable(); // Teks kecil di atas
        $table->string('judul'); // Teks besar
        $table->string('sub_judul')->nullable(); // Deskripsi
        $table->string('warna_teks')->default('text-brand-orange'); // Pilihan warna
        $table->boolean('is_active')->default(true); // Admin bisa mematikan/menyalakan slide
        $table->timestamps();
    });
}
};
