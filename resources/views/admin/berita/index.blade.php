<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-white bg-gradient-to-r from-slate-800 to-slate-600 p-5 rounded-xl shadow-lg flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
            </svg>
            Manajemen Berita & Informasi
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                {{-- ========================================== --}}
                {{-- KOLOM KIRI: FORM TAMBAH BERITA --}}
                {{-- ========================================== --}}
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden sticky top-24">
                        <div class="bg-slate-50 px-6 py-4 border-b border-slate-100">
                            <h3 class="text-slate-800 font-black uppercase tracking-wider text-xs">Tambah Berita Baru</h3>
                        </div>
                        
                        <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-4">
                            @csrf
                            
                            <div>
                                <label class="block text-[11px] font-black text-gray-400 uppercase mb-1 tracking-widest">Judul Berita</label>
                                <input type="text" name="judul" required placeholder="Contoh: Kunjungan Edukatif" class="w-full border-gray-200 rounded-xl text-sm focus:ring-slate-500">
                            </div>
                            
                            <div>
                                <label class="block text-[11px] font-black text-gray-400 uppercase mb-1 tracking-widest">Warna Tema</label>
                                <select name="warna_tema" class="w-full border-gray-200 rounded-xl text-sm focus:ring-slate-500">
                                    <option value="brand-orange">Orange</option>
                                    <option value="brand-teal">Teal (Hijau)</option>
                                    <option value="purple-600">Ungu</option>
                                    <option value="blue-600">Biru</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-[11px] font-black text-gray-400 uppercase mb-1 tracking-widest">Deskripsi Singkat</label>
                                <textarea name="deskripsi_singkat" rows="2" required class="w-full border-gray-200 rounded-xl text-sm focus:ring-slate-500" placeholder="Akan muncul di kartu berita..."></textarea>
                            </div>
                            
                            <div>
                                <label class="block text-[11px] font-black text-gray-400 uppercase mb-1 tracking-widest">Isi Lengkap</label>
                                <textarea name="konten_lengkap" rows="4" required class="w-full border-gray-200 rounded-xl text-sm focus:ring-slate-500" placeholder="Isi berita lengkap..."></textarea>
                            </div>
                            
                            <div>
                                <label class="block text-[11px] font-black text-gray-400 uppercase mb-1 tracking-widest">Foto Utama</label>
                                <input type="file" name="gambar_utama" required accept="image/*" class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-slate-800 file:text-white cursor-pointer">
                            </div>

                            <div class="p-4 bg-slate-50 border border-slate-100 rounded-xl space-y-3">
                                <label class="block text-[11px] font-black text-gray-400 uppercase tracking-widest">Foto Dokumentasi (Opsional)</label>
                                <input type="file" name="gambar_galeri_1" accept="image/*" class="w-full text-xs text-gray-500 file:mr-4 file:py-1.5 file:px-4 file:rounded-full file:border-0 file:bg-slate-200 file:text-slate-700 file:font-bold cursor-pointer hover:file:bg-slate-300 transition-colors">
                                <input type="file" name="gambar_galeri_2" accept="image/*" class="w-full text-xs text-gray-500 file:mr-4 file:py-1.5 file:px-4 file:rounded-full file:border-0 file:bg-slate-200 file:text-slate-700 file:font-bold cursor-pointer hover:file:bg-slate-300 transition-colors">
                                <input type="file" name="gambar_galeri_3" accept="image/*" class="w-full text-xs text-gray-500 file:mr-4 file:py-1.5 file:px-4 file:rounded-full file:border-0 file:bg-slate-200 file:text-slate-700 file:font-bold cursor-pointer hover:file:bg-slate-300 transition-colors">
                            </div>
                            <button type="submit" class="w-full bg-[#10B981] hover:bg-[#059669] text-white font-black py-4 rounded-xl shadow-lg transition-all transform active:scale-95 text-xs uppercase mt-4">Upload Berita</button>
                        </form>
                    </div>
                </div>

                {{-- ========================================== --}}
                {{-- KOLOM KANAN: TABEL DAFTAR BERITA --}}
                {{-- ========================================== --}}
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden">
                        <div class="bg-slate-50 px-6 py-4 border-b border-slate-100 flex justify-between items-center">
                            <h3 class="text-slate-800 font-black uppercase tracking-wider text-xs">Daftar Berita & Informasi</h3>
                        </div>
                        
                        <div class="p-0 overflow-x-auto">
                            <table class="w-full text-sm text-left">
                                <thead class="bg-white border-b border-slate-100 text-xs uppercase text-slate-500">
                                    <tr>
                                        <th class="px-6 py-4 font-black">Gambar</th>
                                        <th class="px-6 py-4 font-black">Judul Berita</th>
                                        <th class="px-6 py-4 font-black text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    
                                    @forelse($beritas as $berita)
                                    <tr class="hover:bg-slate-50 transition-colors">
                                        <td class="px-6 py-4">
                                            <img src="{{ str_starts_with($berita->gambar_utama, 'images/') ? asset($berita->gambar_utama) : asset('storage/' . $berita->gambar_utama) }}" class="w-16 h-16 object-cover rounded-lg shadow-sm" alt="Foto">
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="font-bold text-slate-800 text-base mb-1">{{ $berita->judul }}</div>
                                            <div class="text-xs text-slate-500 line-clamp-1">{{ $berita->deskripsi_singkat }}</div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            
                                            {{-- FORM HAPUS DENGAN CLASS SWEETALERT (Tanpa Onsubmit Alert) --}}
                                            <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-hapus flex items-center justify-center gap-1 bg-red-50 text-[11px] font-bold text-red-500 hover:text-red-700 hover:bg-red-100 py-2 px-3 rounded-lg transition-colors uppercase tracking-wider w-full">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="px-6 py-10 text-center text-slate-500">
                                            Belum ada berita yang diupload.
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>