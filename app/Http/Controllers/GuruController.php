<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use App\Models\Jurnal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // Wajib untuk kelola file foto

class GuruController extends Controller
{
    /**
     * 1. Menampilkan Dashboard Utama Guru (Daftar Murid + Fitur Pencarian)
     */
    public function dashboard(Request $request)
    {
        // Tangkap kata kunci pencarian dari input form
        $search = $request->input('search');

        // Cari data murid berdasarkan nama_lengkap atau nama_panggilan
        $siswas = CalonSiswa::when($search, function ($query, $search) {
            return $query->where('nama_lengkap', 'like', "%{$search}%")
                         ->orWhere('nama_panggilan', 'like', "%{$search}%");
        })->get();

        // Kirim data murid dan kata kunci ke halaman view
        return view('guru.dashboard', compact('siswas', 'search'));
    }

    /**
     * 2. Menampilkan Halaman Profil Lengkap Murid
     */
    public function showSiswa(CalonSiswa $siswa)
    {
        // Panggil juga jurnal terbarunya jika ingin ditampilkan di halaman profil
        $jurnalTerbaru = $siswa->jurnals()->latest('tanggal')->first();
        
        return view('guru.show-siswa', compact('siswa', 'jurnalTerbaru'));
    }

    /**
     * 3. Menampilkan Form untuk Mengisi Jurnal
     */
    public function createJurnal(CalonSiswa $siswa)
    {
        return view('guru.form-jurnal', compact('siswa'));
    }

    /**
     * 4. Memproses Simpan Jurnal & Upload Banyak Foto Dokumentasi
     */
    public function storeJurnal(Request $request, CalonSiswa $siswa)
    {
        // PERBAIKAN: Validasi diperbesar jadi 20MB (20480 KB) dan ditambahkan pesan error kustom
        $request->validate([
            'tanggal' => 'required|date',
            'catatan_positif' => 'nullable|string',
            'saran_untuk_dirumah' => 'nullable|string',
            'dokumentasi' => 'nullable|array', 
            'dokumentasi.*' => 'image|mimes:jpeg,png,jpg,webp|max:20480', 
        ], [
            'dokumentasi.*.image' => 'File yang diunggah harus berupa gambar.',
            'dokumentasi.*.mimes' => 'Format foto harus berupa JPG, JPEG, PNG, atau WEBP.',
            'dokumentasi.*.max' => 'Ukuran masing-masing foto tidak boleh lebih dari 20MB.',
            'dokumentasi.*.uploaded' => 'Gagal mengunggah foto. Pastikan ukuran file tidak terlalu besar.',
        ]);

        // Siapkan data dasar untuk disimpan ke database
        $data = [
            'user_id' => Auth::id(),
            'calon_siswa_id' => $siswa->id,
            'tanggal' => $request->tanggal,
            'catatan_positif' => $request->catatan_positif,
            'saran_untuk_dirumah' => $request->saran_untuk_dirumah,
        ];

        // Logika Menyimpan Banyak Foto (Multiple Upload)
        if ($request->hasFile('dokumentasi')) {
            $paths = []; // Buat array kosong untuk menampung daftar nama file
            
            // Loop setiap foto yang diunggah
            foreach ($request->file('dokumentasi') as $file) {
                // Simpan ke dalam folder 'storage/app/public/dokumentasi_jurnal'
                // Lalu masukkan alamat/nama filenya ke dalam array $paths
                $paths[] = $file->store('dokumentasi_jurnal', 'public');
            }
            
            // Masukkan array berisi alamat foto tersebut ke dalam data utama
            $data['dokumentasi'] = $paths;
        }

        // Simpan seluruh data (teks & array dokumentasi) ke tabel jurnals
        Jurnal::create($data);

        // Arahkan kembali ke dashboard guru dengan pesan sukses
        return redirect()->route('guru.dashboard')->with('status', 'Jurnal untuk ananda ' . $siswa->nama_lengkap . ' berhasil disimpan!');
    }
}