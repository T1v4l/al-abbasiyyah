<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    public function index()
    {
        // Ambil semua data fasilitas dari yang terbaru
        $fasilitas = Fasilitas::latest()->get();
        return view('admin.fasilitas.index', compact('fasilitas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'nama_fasilitas' => 'required|string|max:255',
        ]);

        $data = $request->all();
        
        // Simpan foto ke folder public/fasilitas_images
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('fasilitas_images', 'public');
        }

        Fasilitas::create($data);
        return redirect()->back()->with('success', 'Fasilitas baru berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        
        // Hapus foto fisiknya dari folder agar server tidak kepenuhan
        if (Storage::disk('public')->exists($fasilitas->gambar)) {
            Storage::disk('public')->delete($fasilitas->gambar);
        }
        
        $fasilitas->delete();
        return redirect()->back()->with('success', 'Data fasilitas berhasil dihapus!');
    }
}