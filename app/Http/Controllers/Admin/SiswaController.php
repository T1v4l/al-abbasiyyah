<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CalonSiswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * 1. Menampilkan daftar semua siswa
     */
    public function index()
    {
        // PERBAIKAN: Variabel diubah menjadi $siswas (tambah huruf s)
        // agar sinkron dengan foreach di index.blade.php bawaan Mas
        $siswas = CalonSiswa::latest()->paginate(10);
        
        return view('admin.siswa.index', compact('siswas'));
    }

    /**
     * 2. Menampilkan form untuk Admin jika ingin menambahkan murid manual
     */
    public function create()
    {
        return view('admin.siswa.create');
    }

    /**
     * 3. Menyimpan data murid yang ditambahkan manual oleh Admin
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|numeric',
        ]);

        $validatedData['status'] = 'Pending';
        $validatedData['metode_pembayaran'] = 'Belum Dipilih';
        $validatedData['status_pembayaran'] = 'Belum Dipilih';

        CalonSiswa::create($validatedData);

        return redirect()->route('admin.siswa.index')->with('success', 'Data murid baru berhasil ditambahkan secara manual.');
    }

    /**
     * 4. Menampilkan detail lengkap satu siswa
     */
    public function show($id)
    {
        $siswa = CalonSiswa::findOrFail($id);
        return view('admin.siswa.show', compact('siswa'));
    }

    /**
     * 5. Menampilkan form untuk mengedit detail murid
     */
    public function edit($id)
    {
        $siswa = CalonSiswa::findOrFail($id);
        return view('admin.siswa.edit', compact('siswa'));
    }

    /**
     * 6. Memproses pembaruan data murid dari form edit
     */
    public function update(Request $request, $id)
    {
        $siswa = CalonSiswa::findOrFail($id);
        
        // TAMBAHKAN 'status' DI DALAM VALIDASI INI
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'required|numeric',
            'alamat' => 'required|string',
            
            // Ini kuncinya agar status bisa diubah:
            'status' => 'required|string|in:Pending,Diterima,Ditolak', 
        ]);

        $siswa->update($validatedData);

        return redirect()->route('admin.siswa.index')->with('success', 'Data murid dan status pendaftaran berhasil diperbarui!');
    }
    
    /**
     * 7. Menghapus data pendaftar
     */
    public function destroy($id)
    {
        $siswa = CalonSiswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('admin.siswa.index')->with('success', 'Data pendaftar berhasil dihapus.');
    }
}