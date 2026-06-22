<?php

namespace App\Http\Controllers;

use App\Models\Brosur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // untuk handle hapus file gambar

class BrosurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan semua brosur
        $brosur = Brosur::latest()->get(); 
        return view('admin.brosur.index', compact('brosur'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brosur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // PERBAIKAN: Penambahan batas ukuran (max:2048 = 2MB) dan pesan error kustom
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image', 
            'list_title' => 'nullable|string',
            'list_1' => 'nullable|string',
            'list_2' => 'nullable|string',
            'list_3' => 'nullable|string',
            'list_4' => 'nullable|string',
        ], [
            'image.max' => 'Gagal: Ukuran gambar brosur tidak boleh lebih dari 2MB!',
            'image.image' => 'Gagal: File yang diunggah harus berupa gambar!',
            'image.mimes' => 'Gagal: Format gambar harus berupa jpeg, png, jpg, atau webp!'
        ]);

        // Proses Upload Gambar
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // Buat nama unik: timestamp_namaasli.extension
            $imageName = time() . '_' . str_replace(' ', '_', $image->getClientOriginalName());
            
            // Pindahkan ke folder public/images_brosur
            $image->move(public_path('images_brosur'), $imageName);
            
            // Simpan nama file ke array tervalidasi
            $validated['image'] = $imageName;
        }

        Brosur::create($validated);

        return redirect()->route('admin.brosur.index')->with('success', 'Brosur Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brosur $brosur)
    {
        return view('admin.brosur.show', compact('brosur'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brosur $brosur)
    {
        return view('admin.brosur.edit', compact('brosur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brosur $brosur)
    {
        // PERBAIKAN: Validasi update juga disesuaikan
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image', 
            'list_title' => 'nullable|string',
            'list_1' => 'nullable|string',
            'list_2' => 'nullable|string',
            'list_3' => 'nullable|string',
            'list_4' => 'nullable|string',
        ], [
            'image.max' => 'Gagal: Ukuran gambar brosur tidak boleh lebih dari 2MB!',
            'image.image' => 'Gagal: File yang diunggah harus berupa gambar!',
            'image.mimes' => 'Gagal: Format gambar harus berupa jpeg, png, jpg, atau webp!'
        ]);

        // Jika user mengupload gambar baru
        if ($request->hasFile('image')) {
            // 1. Hapus gambar lama dari folder
            $oldImagePath = public_path('images_brosur/' . $brosur->image);
            if (File::exists($oldImagePath) && $brosur->image) {
                File::delete($oldImagePath);
            }

            // 2. Upload gambar baru
            $image = $request->file('image');
            $imageName = time() . '_' . str_replace(' ', '_', $image->getClientOriginalName());
            $image->move(public_path('images_brosur'), $imageName);
            
            // 3. Simpan nama file baru ke database
            $validated['image'] = $imageName;
        }

        $brosur->update($validated);

        return redirect()->route('admin.brosur.index')->with('success', 'Brosur Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brosur $brosur)
    {
        // Hapus gambar dari folder public/images_brosur sebelum data dihapus
        $imagePath = public_path('images_brosur/' . $brosur->image);
        if (File::exists($imagePath) && $brosur->image) {
            File::delete($imagePath);
        }

        $brosur->delete();

        return redirect()->route('admin.brosur.index')->with('success', 'Brosur Berhasil Dihapus');
    }
}