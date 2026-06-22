<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        // Mengambil berita terbaru untuk ditampilkan di dashboard admin
        $beritas = Berita::latest()->get();
        return view('admin.berita.index', compact('beritas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi_singkat' => 'required|string',
            'konten_lengkap' => 'required',
            'gambar_utama' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'warna_tema' => 'required|string',
            'gambar_galeri_1' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'gambar_galeri_2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'gambar_galeri_3' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->all();
        
        // Simpan Foto Utama
        $data['gambar_utama'] = $request->file('gambar_utama')->store('berita_images', 'public');

        // Simpan Foto Galeri (jika ada)
        if ($request->hasFile('gambar_galeri_1')) $data['gambar_galeri_1'] = $request->file('gambar_galeri_1')->store('berita_images', 'public');
        if ($request->hasFile('gambar_galeri_2')) $data['gambar_galeri_2'] = $request->file('gambar_galeri_2')->store('berita_images', 'public');
        if ($request->hasFile('gambar_galeri_3')) $data['gambar_galeri_3'] = $request->file('gambar_galeri_3')->store('berita_images', 'public');

        Berita::create($data);
        return redirect()->back()->with('success', 'Berita berhasil ditambahkan ke beranda publik!');
    }

    // Fungsi Update untuk mengubah berita yang sudah ada
    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi_singkat' => 'required|string',
            'konten_lengkap' => 'required',
            'gambar_utama' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'warna_tema' => 'required|string',
            'gambar_galeri_1' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'gambar_galeri_2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'gambar_galeri_3' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->all();

        // Logika Ganti Foto: Jika ada upload baru, hapus foto lama dari storage
        $kolomFoto = ['gambar_utama', 'gambar_galeri_1', 'gambar_galeri_2', 'gambar_galeri_3'];

        foreach ($kolomFoto as $kolom) {
            if ($request->hasFile($kolom)) {
                // Hapus foto lama jika bukan file bawaan sistem
                if ($berita->$kolom && !str_contains($berita->$kolom, 'images/')) {
                    Storage::disk('public')->delete($berita->$kolom);
                }
                $data[$kolom] = $request->file($kolom)->store('berita_images', 'public');
            }
        }

        $berita->update($data);
        return redirect()->back()->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        
        $kolomFoto = ['gambar_utama', 'gambar_galeri_1', 'gambar_galeri_2', 'gambar_galeri_3'];

        foreach ($kolomFoto as $kolom) {
            if ($berita->$kolom && !str_contains($berita->$kolom, 'images/')) {
                Storage::disk('public')->delete($berita->$kolom);
            }
        }

        $berita->delete();
        return redirect()->back()->with('success', 'Berita berhasil dihapus dari publik!');
    }
}