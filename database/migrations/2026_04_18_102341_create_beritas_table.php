<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi_singkat');
            $table->longText('konten_lengkap');
            $table->string('gambar_utama');
            $table->string('gambar_galeri_1')->nullable();
            $table->string('gambar_galeri_2')->nullable();
            $table->string('gambar_galeri_3')->nullable();
            $table->string('warna_tema')->default('brand-orange');
            $table->timestamps();
        });

        // MENGAMBIL DATA LAMA DAN MEMASUKKANNYA OTOMATIS KE DATABASE
        DB::table('beritas')->insert([
            [
                'judul' => 'Serunya Kunjungan Edukatif di Desa Gunung Putri.',
                'deskripsi_singkat' => 'Kegiatan belajar di luar kelas yang mengajak anak-anak mengenal lingkungan sekitar melalui aktivitas seru, interaktif, dan penuh pengalaman baru.',
                'konten_lengkap' => '<p>Kegiatan belajar di luar kelas (outing class) yang diselenggarakan di Desa Gunung Putri berjalan dengan sangat seru dan lancar. Anak-anak diajak untuk berinteraksi langsung dengan lingkungan sekitar sebagai bagian dari proses pembelajaran yang lebih menyenangkan dan bermakna.</p><p>Melalui kegiatan ini, anak-anak tidak hanya bermain, tetapi juga belajar tentang kemandirian, kebersamaan, dan cara menghargai lingkungan.</p>',
                'gambar_utama' => 'images/kunjungan1.jpg',
                'gambar_galeri_1' => 'images/brita1.jpeg',
                'gambar_galeri_2' => 'images/brita111.jpeg',
                'gambar_galeri_3' => 'images/brita11.jpeg',
                'warna_tema' => 'brand-orange',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'judul' => 'Keceriaan Lomba Anak di As-Salaam Fair.',
                'deskripsi_singkat' => 'Berbagai perlombaan menarik yang melatih keberanian, kreativitas, dan rasa percaya diri anak dalam suasana penuh semangat dan kebersamaan.',
                'konten_lengkap' => '<p>Kegiatan lomba yang diselenggarakan dalam rangka As-Salaam Fair di Masjid As-Salaam berlangsung dengan meriah dan penuh semangat. Anak-anak mengikuti berbagai perlombaan yang dirancang untuk mengasah kreativitas, keberanian, dan kemampuan mereka.</p><p>Selain itu, kegiatan ini juga mempererat hubungan antara siswa, guru, dan orang tua dalam suasana kebersamaan yang hangat.</p>',
                'gambar_utama' => 'images/lombagalaksi.jpeg',
                'gambar_galeri_1' => 'images/brita2222.jpg',
                'gambar_galeri_2' => 'images/brita22.webp',
                'gambar_galeri_3' => 'images/tarikreasi.jpeg',
                'warna_tema' => 'brand-teal',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'judul' => 'Mulai Masuk Sekolah, Anak Siap Belajar Lagi!',
                'deskripsi_singkat' => 'Tahun ajaran kembali dimulai! Anak-anak siap belajar, bermain, dan bertemu teman-teman di hari pertama sekolah.',
                'konten_lengkap' => '<p>Kegiatan pembelajaran di PAUDQU Al-Abbasiyyah akan kembali dimulai pada hari Senin, 30 Maret. Momen ini menjadi awal yang baru bagi anak-anak untuk kembali belajar, bermain, dan berinteraksi bersama teman-teman serta guru.</p><p>Momen ini juga menjadi kesempatan bagi anak-anak untuk mulai membangun kembali kebiasaan belajar. Semangat dan dukungan dari orang tua juga menjadi bagian penting agar anak merasa lebih percaya diri.</p>',
                'gambar_utama' => 'images/brita33333.webp',
                'gambar_galeri_1' => 'images/maumasuk.jpg',
                'gambar_galeri_2' => 'images/berita3.jpeg',
                'gambar_galeri_3' => 'images/brita33.webp',
                'warna_tema' => 'purple-600',
                'created_at' => now(), 'updated_at' => now(),
            ],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('beritas');
    }
};