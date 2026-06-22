<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendaftaranController extends Controller
{
    public function create()
    {
        $existingStudent = CalonSiswa::where('user_id', Auth::id())->first();
        if ($existingStudent) {
            return redirect()->route('dashboard')->with('info', 'Anda sudah mengisi formulir pendaftaran.');
        }
        return view('pendaftaran.form');
    }

    public function store(Request $request)
    {
        // 1. VALIDASI
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nama_panggilan' => 'required|string|max:255',
            'nik' => 'required|numeric',
            'no_akta' => 'required|string|max:255',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|in:L,P',
            'agama' => 'required|string|max:255',
            'kewarganegaraan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kelurahan' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'status_tinggal' => 'required|string|max:255',
            'anak_ke' => 'required|numeric',
            'jml_saudara' => 'required|numeric',
            'hobi' => 'nullable|string|max:255',
            'cita_cita' => 'nullable|string|max:255',
            'tinggi' => 'required|numeric',
            'berat' => 'required|numeric',
            'lingkar_kepala' => 'required|numeric',
            'kebutuhan_khusus' => 'nullable|string',
            'no_kk' => 'required|numeric',
            'nama_ayah' => 'required|string|max:255',
            'nik_ayah' => 'required|numeric',
            'tempat_lahir_ayah' => 'required|string|max:255',
            'tgl_lahir_ayah' => 'required|date',
            'pendidikan_ayah' => 'required|string|max:255',
            'pekerjaan_ayah' => 'required|string|max:255',
            'penghasilan_ayah' => 'required|string|max:255',
            'no_wa_ayah' => 'required|string|max:20',
            'nama_ibu' => 'required|string|max:255',
            'nik_ibu' => 'required|numeric',
            'tempat_lahir_ibu' => 'required|string|max:255',
            'tgl_lahir_ibu' => 'required|date',
            'pendidikan_ibu' => 'required|string|max:255',
            'pekerjaan_ibu' => 'required|string|max:255',
            'penghasilan_ibu' => 'required|string|max:255',
            'no_wa_ibu' => 'required|string|max:20',
            'alamat_ibu' => 'required|string',
            'kelurahan_ibu' => 'required|string|max:255',
            'kecamatan_ibu' => 'required|string|max:255',
            'kota_ibu' => 'required|string|max:255',
            'provinsi_ibu' => 'required|string|max:255',
            'nama_wali' => 'nullable|string|max:255',
            'nik_wali' => 'nullable|numeric',
            'hubungan_wali' => 'nullable|string|max:255',
            'tempat_lahir_wali' => 'nullable|string|max:255',
            'tgl_lahir_wali' => 'nullable|date',
            'pekerjaan_wali' => 'nullable|string|max:255',
            'no_wa_wali' => 'nullable|string|max:20',
            'alamat_wali' => 'nullable|string',
            'metode_pembayaran' => 'required|string'
        ]);

        // 2. LOGIKA OTOMATIS
        $validatedData['user_id'] = Auth::id();
        $validatedData['status'] = 'Pending';

        $pilihan = $request->input('metode_pembayaran');
        if ($pilihan == 'transfer' || $pilihan == 'bank') {
            $validatedData['metode_pembayaran'] = 'Transfer Bank';
            $validatedData['status_pembayaran'] = 'Menunggu Pembayaran';
        } else {
            $validatedData['metode_pembayaran'] = 'Bayar Langsung';
            $validatedData['status_pembayaran'] = 'Menunggu Pembayaran (Langsung)';
        }

        // 3. SIMPAN
        CalonSiswa::create($validatedData);

        return redirect()->route('pembayaran.index')->with('success', 'Pendaftaran berhasil dikirim!');
    }
}