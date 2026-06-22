<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('calon_siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // STEP 1: Siswa (Nama kolom disamakan dengan Controller)
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->string('nik'); // Sebelumnya nik_santri, sekarang nik
            $table->string('no_akta');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('kewarganegaraan');

            // STEP 2: Domisili & Bakat
            $table->text('alamat');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('kota');
            $table->string('status_tinggal');
            $table->integer('anak_ke');
            $table->integer('jml_saudara'); // Sebelumnya jumlah_saudara_kandung
            $table->string('hobi')->nullable();
            $table->string('cita_cita')->nullable();

            // STEP 3: Kesehatan
            $table->float('tinggi');
            $table->float('berat');
            $table->float('lingkar_kepala');
            $table->text('kebutuhan_khusus')->nullable();

            // STEP 4: Orang Tua
            $table->string('no_kk');
            $table->string('nama_ayah');
            $table->string('nik_ayah');
            $table->string('tempat_lahir_ayah');
            $table->date('tgl_lahir_ayah');
            $table->string('pendidikan_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('penghasilan_ayah');
            $table->string('no_wa_ayah');
            
            $table->string('nama_ibu');
            $table->string('nik_ibu');
            $table->string('tempat_lahir_ibu');
            $table->date('tgl_lahir_ibu');
            $table->string('pendidikan_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('penghasilan_ibu');
            $table->string('no_wa_ibu');
            
            $table->text('alamat_ibu');
            $table->string('kelurahan_ibu');
            $table->string('kecamatan_ibu');
            $table->string('kota_ibu');
            $table->string('provinsi_ibu');

            // STEP 5: Wali
            $table->string('nama_wali')->nullable();
            $table->string('nik_wali')->nullable();
            $table->string('hubungan_wali')->nullable();
            $table->string('tempat_lahir_wali')->nullable();
            $table->date('tgl_lahir_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->string('no_wa_wali')->nullable();
            $table->text('alamat_wali')->nullable();

            // DATA ADMIN & PEMBAYARAN
            $table->string('status')->default('Pending');
            $table->string('status_pembayaran')->default('Belum Bayar');
            $table->string('metode_pembayaran')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->longText('signature')->nullable(); // Menangkap tanda tangan dari form
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('calon_siswas');
    }
};