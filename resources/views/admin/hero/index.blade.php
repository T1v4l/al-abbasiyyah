<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-white bg-gradient-to-r from-slate-800 to-slate-600 p-5 rounded-xl shadow-lg flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            Kelola Slider Halaman Depan
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Alert HTML dihapus, diganti SweetAlert Global --}}

            {{-- FORM TAMBAH SLIDER BARU --}}
            <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden mb-10">
                <div class="bg-slate-100 px-6 py-4 border-b border-slate-200">
                    <h3 class="text-slate-800 font-black uppercase tracking-wider text-sm">Upload Slider Baru</h3>
                </div>
                <form action="{{ route('admin.hero.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2">
                            <label class="block text-[11px] font-black text-gray-500 uppercase mb-2">Foto / Gambar (Wajib)</label>
                            <input type="file" name="gambar" required accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-3 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-slate-800 file:text-white hover:file:bg-slate-700 cursor-pointer">
                        </div>

                        <div>
                            <label class="block text-[11px] font-black text-gray-500 uppercase mb-2">Teks Label Kecil (Opsional)</label>
                            <input type="text" name="label" placeholder="Contoh: Selamat Datang" class="w-full border-gray-300 rounded-xl focus:ring-slate-500">
                        </div>

                        <div>
                            <label class="block text-[11px] font-black text-gray-500 uppercase mb-2">Warna Tema Teks</label>
                            <select name="warna_teks" class="w-full border-gray-300 rounded-xl focus:ring-slate-500">
                                <option value="text-brand-orange">Orange (Default)</option>
                                <option value="text-brand-teal">Teal (Hijau Kebiruan)</option>
                                <option value="text-pink-400">Pink</option>
                                <option value="text-blue-400">Biru</option>
                            </select>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-[11px] font-black text-gray-500 uppercase mb-2">Teks Judul Besar (Wajib)</label>
                            <input type="text" name="judul" required placeholder="Gunakan <br> untuk enter. Contoh: Membangun Generasi <br> Cerdas & Berakhlak" class="w-full border-gray-300 rounded-xl focus:ring-slate-500">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-[11px] font-black text-gray-500 uppercase mb-2">Teks Sub Judul / Deskripsi</label>
                            <textarea name="sub_judul" rows="2" class="w-full border-gray-300 rounded-xl focus:ring-slate-500" placeholder="Deskripsi di bawah judul besar..."></textarea>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button type="submit" class="px-8 py-3 bg-slate-800 hover:bg-slate-900 text-white font-bold rounded-xl shadow-lg transition active:scale-95">
                            Upload Slider ke Beranda
                        </button>
                    </div>
                </form>
            </div>

            {{-- DAFTAR SLIDER YANG SEDANG AKTIF --}}
            <h3 class="font-black text-slate-800 text-lg mb-4 uppercase tracking-wider">Daftar Slider di Beranda</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse($heroes as $hero)
                    <div class="bg-white rounded-3xl shadow-sm border border-gray-200 overflow-hidden relative group">
                        <div class="h-48 overflow-hidden relative">
                            <img src="{{ asset('storage/' . $hero->gambar) }}" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black/40"></div>
                        </div>
                        <div class="p-6 relative">
                            <span class="inline-block px-3 py-1 bg-gray-100 rounded-full text-[10px] font-bold text-gray-600 mb-2">{{ $hero->label ?? 'Tanpa Label' }}</span>
                            <h4 class="font-bold text-lg text-gray-900 leading-tight mb-2">{!! $hero->judul !!}</h4>
                            <p class="text-sm text-gray-500 line-clamp-2">{{ $hero->sub_judul }}</p>
                            
                            {{-- Tombol Hapus Terhubung dengan SweetAlert --}}
                            <form action="{{ route('admin.hero.destroy', $hero->id) }}" method="POST" class="mt-4 border-t pt-4">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-hapus text-sm font-bold text-red-500 hover:text-red-700 flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                    Hapus Slider
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full p-10 bg-white rounded-3xl border border-dashed border-gray-300 text-center">
                        <p class="text-gray-500 font-bold">Belum ada slider yang di-upload.</p>
                        <p class="text-sm text-gray-400 mt-1">Silakan upload slider pertama Anda menggunakan form di atas.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>