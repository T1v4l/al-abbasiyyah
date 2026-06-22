<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    public function index()
    {
        $heroes = Hero::latest()->get();
        return view('admin.hero.index', compact('heroes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'judul' => 'required|string|max:255',
        ]);

        $data = $request->all();
        
        // Proses Upload Gambar
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('hero_images', 'public');
        }

        Hero::create($data);
        return redirect()->back()->with('success', 'Slider Hero berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $hero = Hero::findOrFail($id);
        
        // Hapus file gambar fisik dari folder storage
        if (Storage::disk('public')->exists($hero->gambar)) {
            Storage::disk('public')->delete($hero->gambar);
        }
        
        $hero->delete();
        return redirect()->back()->with('success', 'Slider Hero berhasil dihapus!');
    }
}