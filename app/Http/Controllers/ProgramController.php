<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; // Tambahkan ini untuk handle file delete

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $program = Program::latest()->get();
        return view('admin.program.index', compact('program'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.program.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image', // Diubah jadi required untuk create
            'highlight_1'=> 'nullable|string',
            'highlight_2' => 'nullable|string',
        ]);

        // Proses Upload Gambar
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // Buat nama unik: timestamp_namaasli.extension
            $imageName = time() . '_' . str_replace(' ', '_', $image->getClientOriginalName());
            
            // Pindahkan ke folder public/images_program
            $image->move(public_path('images_program'), $imageName);
            
            // Simpan nama file ke array tervalidasi
            $validated['image'] = $imageName;
        }

        Program::create($validated);

        return redirect()->route('admin.program.index')->with('success', 'Program berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        return view('admin.program.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        return view('admin.program.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image', // Boleh kosong saat update
            'highlight_1'=> 'nullable|string',
            'highlight_2' => 'nullable|string',
        ]);

        // Cek jika ada gambar baru yang diupload
        if ($request->hasFile('image')) {
            // 1. Hapus gambar lama dari folder
            $oldImagePath = public_path('images_program/' . $program->image);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            // 2. Upload gambar baru
            $image = $request->file('image');
            $imageName = time() . '_' . str_replace(' ', '_', $image->getClientOriginalName());
            $image->move(public_path('images_program'), $imageName);
            
            // 3. Update nama file di database
            $validated['image'] = $imageName;
        }

        $program->update($validated);

        return redirect()->route('admin.program.index')->with('success', 'Program berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        // Hapus gambar dari folder public/images_program sebelum data dihapus
        $imagePath = public_path('images_program/' . $program->image);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $program->delete();

        return redirect()->route('admin.program.index')->with('success', 'Program berhasil dihapus.');
    }
}