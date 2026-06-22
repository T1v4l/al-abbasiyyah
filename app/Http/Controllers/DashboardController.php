<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // <-- WAJIB DITAMBAHKAN UNTUK KELOLA FILE FOTO

// WAJIB PANGGIL MODEL DI BAWAH INI
use App\Models\CalonSiswa;
use App\Models\User;
use App\Models\Jurnal;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') { 
            return redirect()->route('admin.dashboard');
        }

        if ($user->role === 'guru') {
            return redirect()->route('guru.dashboard');
        }

        $siswa = $user->calonSiswa;

        if (!$siswa) {
            return redirect()->route('pendaftaran.form');
        }

        $jurnalTerbaru = $siswa->jurnals()->latest('created_at')->first();
        return view('dashboard', compact('siswa', 'jurnalTerbaru'));
    }

    public function adminDashboard()
    {
        // AMBIL 3 DATA UTAMA SAJA
        $jumlahSiswa = CalonSiswa::count(); // Total Murid
        $jumlahGuru = User::where('role', 'guru')->count(); // Total Guru
        $jumlahJurnal = Jurnal::count(); // Total Jurnal

        // Kirim hanya 3 variabel ini ke tampilan
        return view('admin.dashboard', compact('jumlahSiswa', 'jumlahGuru', 'jumlahJurnal'));
    }

    // ========================================================
    // FITUR BARU: UPDATE FOTO PROFIL ALA WHATSAPP
    // ========================================================
    public function updateFoto(Request $request, $id)
    {
        // Cari data siswa yang HANYA milik user yang sedang login demi keamanan
        $siswa = CalonSiswa::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        // 1. JIKA AKSI ADALAH HAPUS FOTO
        if ($request->input('action') == 'delete') {
            if ($siswa->foto) {
                // Hapus file fisik dari storage
                Storage::disk('public')->delete($siswa->foto);
            }
            // Kosongkan nama file di database
            $siswa->update(['foto' => null]);
            return back()->with('success', 'Foto profil berhasil dihapus.');
        }

        // 2. JIKA AKSI ADALAH UPLOAD/GANTI FOTO
        $request->validate([
            // Validasi file harus berupa gambar, format jpeg/png/jpg, maksimal 2MB
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048' 
        ]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika sebelumnya sudah ada foto
            if ($siswa->foto) {
                Storage::disk('public')->delete($siswa->foto);
            }

            // Simpan foto baru ke dalam folder: storage/app/public/foto_siswa
            $path = $request->file('foto')->store('foto_siswa', 'public');
            
            // Simpan nama path file ke dalam database
            $siswa->update(['foto' => $path]);

            return back()->with('success', 'Foto profil berhasil diperbarui.');
        }

        return back()->with('error', 'Tidak ada foto yang diupload.');
    }
}