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
        Schema::create('brosurs', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable(); 
            
            // Bagian Kanan (Konten Teks)
            $table->string('title'); // Untuk "Kenali Kami Lebih Dekat!"
            $table->text('description'); // Untuk teks paragraf yang panjang
            
            // Bagian Bawah Kanan (Kotak Orange)
            $table->string('list_title')->nullable(); // Untuk "Informasi di dalam brosur meliputi:"
            
            // Poin-poin list (Dibuat statis 4 kolom sesuai HTML)
            $table->string('list_1')->nullable(); // Visi & Misi...
            $table->string('list_2')->nullable(); // Rincian Program...
            $table->string('list_3')->nullable(); // Galeri Fasilitas...
            $table->string('list_4')->nullable(); //
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brosurs');
    }
};
