<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h2 class="font-bold text-2xl text-white bg-gradient-to-r from-slate-800 to-slate-600 p-5 rounded-xl shadow-lg flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m6 0h1m-7 4h1m6 0h1m-7 4h1m6 0h1" />
                    </svg>
                    Manajemen Fasilitas PAUDQU
                </h2>
                <p class="text-sm text-gray-500 mt-2 ml-1 uppercase tracking-widest">Atur foto sarana & prasarana</p>
            </div>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- NOTE: Alert Sukses dan Error HTML sudah dihapus karena sudah digantikan oleh SweetAlert2 secara Global --}}

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                {{-- FORM TAMBAH FASILITAS (Kiri) --}}
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden sticky top-24">
                        <div class="bg-slate-50 px-6 py-4 border-b border-slate-100">
                            <h3 class="text-slate-800 font-black uppercase tracking-wider text-xs">Tambah Fasilitas Baru</h3>
                        </div>
                        <form action="{{ route('admin.fasilitas.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-5">
                            @csrf
                            <div>
                                <label class="block text-[11px] font-black text-gray-400 uppercase tracking-widest mb-2">Nama Fasilitas</label>
                                <input type="text" name="nama_fasilitas" required placeholder="Contoh: Ruang Kelas" 
                                       class="w-full border-gray-200 rounded-2xl focus:ring-slate-500 focus:border-slate-500 text-sm py-3">
                            </div>

                            <div>
                                <label class="block text-[11px] font-black text-gray-400 uppercase tracking-widest mb-2">Unggah Foto</label>
                                <div class="relative group">
                                    <input type="file" name="gambar" required accept="image/*" 
                                           class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-slate-800 file:text-white hover:file:bg-slate-700 cursor-pointer">
                                </div>
                                <p class="text-[10px] text-gray-400 mt-2">*Gunakan foto landscape (horisontal) agar tampil maksimal.</p>
                            </div>

                            <button type="submit" class="w-full bg-[#F97316] hover:bg-[#EA580C] text-white font-black py-4 rounded-2xl shadow-lg shadow-orange-100 transition-all transform active:scale-95 flex items-center justify-center gap-2 text-xs uppercase tracking-widest">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" /></svg>
                                Simpan Fasilitas
                            </button>
                        </form>
                    </div>
                </div>

                {{-- DAFTAR FASILITAS (Kanan) --}}
                <div class="lg:col-span-2">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @forelse($fasilitas as $item)
                            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden group">
                                <div class="h-44 overflow-hidden relative">
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama_fasilitas }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-4">
                                        <p class="text-white text-xs font-bold uppercase tracking-widest">{{ $item->nama_fasilitas }}</p>
                                    </div>
                                </div>
                                <div class="p-4 flex justify-between items-center">
                                    <span class="font-bold text-slate-700 text-sm">{{ $item->nama_fasilitas }}</span>
                                    
                                    {{-- Tombol Hapus Terhubung dengan SweetAlert --}}
                                    <form action="{{ route('admin.fasilitas.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-hapus p-2 text-gray-400 hover:text-red-500 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full py-20 text-center bg-white rounded-3xl border-2 border-dashed border-gray-100">
                                <div class="text-gray-300 mb-3">
                                    <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                </div>
                                <p class="text-gray-400 font-bold">Belum ada foto fasilitas.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>