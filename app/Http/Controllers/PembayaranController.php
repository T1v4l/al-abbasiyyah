<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class PembayaranController extends Controller
{
    public function index()
    {
        // Cari data pendaftaran berdasarkan ID user yang login
        $siswa = CalonSiswa::where('user_id', Auth::id())->first();

        return view('pembayaran.index', compact('siswa'));
    }

    public function upload(Request $request)
    {
        $request->validate(['bukti_pembayaran' => 'required|image|max:2048']);
        
        $siswa = CalonSiswa::where('user_id', Auth::id())->first();

        if (!$siswa) {
            return redirect()->back()->with('error', 'Data pendaftaran tidak ditemukan.');
        }
        
        $path = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
        
        $siswa->update([
            'bukti_pembayaran' => $path,
            'status_pembayaran' => 'Menunggu Konfirmasi',
        ]);
        
        return redirect()->route('pembayaran.index')->with('success', 'Bukti pembayaran berhasil diunggah!');
    }

    public function resetMetode()
    {
        $siswa = CalonSiswa::where('user_id', Auth::id())->first();

        if ($siswa) {
            if ($siswa->bukti_pembayaran) {
                Storage::disk('public')->delete($siswa->bukti_pembayaran);
            }

            $siswa->update([
                'metode_pembayaran' => 'Belum Dipilih',
                'status_pembayaran' => 'Menunggu Pembayaran',
                'bukti_pembayaran' => null,
            ]);
        }

        return redirect()->route('pembayaran.index')->with('success', 'Silakan pilih kembali metode pembayaran.');
    }

    public function pilihMetode($metode)
    {
        $siswa = CalonSiswa::where('user_id', Auth::id())->first();

        if ($siswa) {
            $metodeFix = ($metode == 'bank') ? 'Transfer Bank' : 'Bayar Langsung';
            
            $siswa->update([
                'metode_pembayaran' => $metodeFix,
                'status_pembayaran' => ($metode == 'bank') ? 'Menunggu Pembayaran' : 'Menunggu Pembayaran (Langsung)'
            ]);
        }

        return redirect()->route('pembayaran.index')->with('success', 'Metode pembayaran berhasil dipilih.');
    }

    public function download_hasil($id)
    {
        $siswa = CalonSiswa::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $pdf = Pdf::loadView('pages.pembayaran_pdf', compact('siswa'));
        return $pdf->download('Bukti_Pendaftaran_' . $siswa->nama_lengkap . '.pdf');
    }
}