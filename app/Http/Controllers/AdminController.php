<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\CalonSiswa;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Menampilkan halaman utama dashboard admin.
     */
    public function dashboard()
    {
        // Mengambil data untuk kartu statistik
        $jumlahSiswa = CalonSiswa::count();
        $jumlahGuru = User::where('role', 'guru')->count();
        $pendaftarMenunggu = CalonSiswa::where('status', 'Menunggu Verifikasi')->count();

        // Mengambil daftar pendaftar yang statusnya 'Menunggu Verifikasi'
        // with('user') digunakan untuk mengambil data orang tua agar lebih efisien
        $pendaftarBaru = CalonSiswa::where('status', 'Menunggu Verifikasi')->with('user')->latest()->get();

        // Kirim semua data yang sudah diambil ke view
        return view('admin.dashboard', compact(
            'jumlahSiswa',
            'jumlahGuru',
            'pendaftarMenunggu',
            'pendaftarBaru'
        ));
    }

    public function verifikasi(CalonSiswa $siswa)
    {
        $siswa->status = 'Diterima'; 
        $siswa->save(); 

        return redirect()->route('admin.dashboard')->with('status', 'Pendaftaran untuk ' . $siswa->nama_panggilan . ' telah berhasil DITERIMA!');
    }

    public function tolak(CalonSiswa $siswa)
    {
        $siswa->status = 'Ditolak'; 
        $siswa->save(); 

        return redirect()->route('admin.dashboard')->with('status', 'Pendaftaran untuk ' . $siswa->nama_panggilan . ' telah DITOLAK.');
    }
}