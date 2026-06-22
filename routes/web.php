<?php

use App\Http\Controllers\Admin\FasilitasController;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\BeritaController; // <--- TAMBAHAN IMPORT BERITA
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\Admin\PembayaranController as AdminPembayaranController;
use App\Http\Controllers\BrosurController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProgramController;
use Illuminate\Support\Facades\Route;

// ========================================================
// HALAMAN DEPAN (PUBLIC)
// ========================================================

// Halaman depan
Route::get('/', function () {
    // Ambil data dari database
    $heroes = \App\Models\Hero::latest()->get();
    $fasilitas = \App\Models\Fasilitas::latest()->get(); 
    $beritas = \App\Models\Berita::latest()->get(); // <--- TAMBAHAN DATA BERITA
    
    // Kirim datanya ke file welcome.blade.php
    return view('welcome', compact('heroes', 'fasilitas', 'beritas')); // <--- TAMBAHAN COMPACT BERITA
});

Route::get('/program', [PageController::class, 'program'])->name('program.index');
Route::get('/brosur', [PageController::class, 'brosur'])->name('brosur');

Route::get('/persyaratan', function () {
    return view('informasi.persyaratan'); 
});

Route::get('/prosedur', function () {
    return view('informasi.prosedur');
});

Route::get('/cara-pembayaran', function () {
    return view('pages.cara-pembayaran');
})->name('cara-pembayaran');

// Route::get('/brosur', function () {
//     return view('informasi.brosur');
// })->name('brosur');

Route::get('/biaya', function () {
    return view('pages.biaya-pendaftaran');
});


// ========================================================
// GRUP ORANG TUA (USER)
// ========================================================
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard Utama & Profil
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Pendaftaran
    Route::get('/formulir-pendaftaran', [PendaftaranController::class, 'create'])->name('pendaftaran.form');
    Route::post('/formulir-pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

    // Pembayaran
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::get('/pembayaran/pilih-metode/{metode}', [PembayaranController::class, 'pilihMetode'])->name('pembayaran.pilihMetode');
    Route::post('/pembayaran/upload', [PembayaranController::class, 'upload'])->name('pembayaran.upload');
    Route::get('/pembayaran/reset-metode', [PembayaranController::class, 'resetMetode'])->name('pembayaran.resetMetode');
    Route::get('/pembayaran/download-hasil/{id}', [PembayaranController::class, 'download_hasil'])->name('pembayaran.download_hasil');
    
    // Fitur Ganti Foto Profil Interaktif (Dashboard User)
    Route::post('/dashboard/foto/{id}', [DashboardController::class, 'updateFoto'])->name('dashboard.foto.update');

});


// ========================================================
// GRUP GURU
// ========================================================
Route::middleware(['auth', 'role:guru'])->prefix('guru')->name('guru.')->group(function () {
    Route::get('/dashboard', [GuruController::class, 'dashboard'])->name('dashboard');
    
    // Fitur Lihat Profil Murid
    Route::get('/siswa/{siswa}', [GuruController::class, 'showSiswa'])->name('siswa.show');
    
    // Fitur Isi Jurnal (dengan Multiple Upload Dokumentasi)
    Route::get('/jurnal/{siswa}/tambah', [GuruController::class, 'createJurnal'])->name('jurnal.create');
    Route::post('/jurnal/{siswa}', [GuruController::class, 'storeJurnal'])->name('jurnal.store');
});


// ========================================================
// GRUP ADMIN
// ========================================================
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('dashboard');
    
    // Verifikasi Pendaftaran
    Route::post('/pendaftar/{siswa}/verifikasi', [AdminController::class, 'verifikasi'])->name('pendaftar.verifikasi');
    Route::post('/pendaftar/{siswa}/tolak', [AdminController::class, 'tolak'])->name('pendaftar.tolak');
    
    // Manajemen Pembayaran Admin
    Route::get('/pembayaran', [AdminPembayaranController::class, 'index'])->name('admin_pembayaran_index');
    Route::post('/pembayaran/{id}/konfirmasi', [AdminPembayaranController::class, 'konfirmasi'])->name('pembayaran.konfirmasi');
    Route::get('/pembayaran/download/{id}', [AdminPembayaranController::class, 'download_formulir'])->name('pembayaran.download');
    
    // MANAJEMEN KONTEN LANDING PAGE
    Route::resource('hero', HeroController::class)->except(['show']); // Disesuaikan agar jika nanti mau pakai tombol Edit tidak error 404
    Route::resource('fasilitas', FasilitasController::class)->only(['index', 'store', 'destroy']);
    Route::resource('berita', BeritaController::class)->only(['index', 'store', 'destroy']); // <--- TAMBAHAN RUTE BERITA
    
    // Manajemen Master Data Siswa
    Route::resource('siswa', SiswaController::class)->names('siswa');
    // Program
    Route::resource('program', ProgramController::class);
    //Brosur
    Route::resource('brosur', BrosurController::class);
});

// Wajib ada untuk file authentication bawaan Laravel Breeze/Jetstream
require __DIR__.'/auth.php';