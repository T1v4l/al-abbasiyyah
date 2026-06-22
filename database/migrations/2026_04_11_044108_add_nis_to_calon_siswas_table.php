<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
    Schema::table('calon_siswas', function (Blueprint $table) {
        $table->string('nis')->nullable()->after('nik'); // Tambah NIS setelah kolom NIK
        $table->string('nisn')->nullable()->after('nis'); // Tambah NISN setelah NIS
        });
    }

    public function down(): void
    {
        Schema::table('calon_siswas', function (Blueprint $table) {
            //
        });
    }
};
