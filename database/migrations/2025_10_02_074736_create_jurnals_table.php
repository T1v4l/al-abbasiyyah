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
        // Kode ini akan membuat tabel 'jurnals' beserta semua kolomnya
        Schema::create('jurnals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id'); // ID Guru yang mengisi (dari tabel users)
            $table->foreignId('calon_siswa_id'); // ID Siswa yang dinilai (dari tabel calon_siswas)
            $table->date('tanggal'); // Tanggal jurnal dibuat
            $table->text('catatan_positif')->nullable(); // Kolom untuk catatan baik
            $table->text('saran_untuk_dirumah')->nullable(); // Kolom untuk saran
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Kode ini akan menghapus tabel 'jurnals' jika migrasi dibatalkan
        Schema::dropIfExists('jurnals');
    }
};