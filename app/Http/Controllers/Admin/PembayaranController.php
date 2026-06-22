<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CalonSiswa;
use Barryvdh\DomPDF\Facade\Pdf;

// ==========================================
// PERBAIKAN: Ubah nama class jadi PembayaranController
// ==========================================
class PembayaranController extends Controller
{
    public function index()
    {
        $statusDitampilkan = [
            'Menunggu Konfirmasi',          // Upload bukti masuk sini
            'Menunggu Pembayaran',          // Belum upload (Hanya sebagai info)
            'Menunggu Pembayaran (Langsung)' // Bayar tunai (Admin bisa langsung ACC)
        ];

        // Tampilkan terbaru di atas
        $pembayaranMenunggu = CalonSiswa::with('user')
                                ->whereIn('status_pembayaran', $statusDitampilkan)
                                ->latest()
                                ->paginate(10);
                                        
        return view('admin.pembayaran.index', compact('pembayaranMenunggu'));
    }

    public function konfirmasi($id)
    {
        $siswa = CalonSiswa::findOrFail($id);
        $siswa->update(['status_pembayaran' => 'Lunas']);

        // Pastikan nama route ini sesuai dengan yang ada di web.php
        return redirect()->route('admin.admin_pembayaran_index')->with('success', 'Pembayaran berhasil dikonfirmasi.');
    }

    public function download_formulir($id)
    {
        $siswa = CalonSiswa::with('user')->findOrFail($id);
        $pdf = Pdf::loadView('admin.pembayaran.pdf_formulir', compact('siswa'));
        return $pdf->download('Formulir_' . $siswa->nama_lengkap . '.pdf');
    }
}