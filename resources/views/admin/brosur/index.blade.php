<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h2 class="font-bold text-2xl text-white bg-gradient-to-r from-slate-800 to-slate-600 p-5 rounded-xl shadow-lg flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m6 0h1m-7 4h1m6 0h1m-7 4h1m6 0h1" />
                    </svg>
                    Manajemen Brosur
                </h2>
                <p class="text-sm text-gray-500 mt-2 ml-1 uppercase tracking-widest">Atur brosur utama dan informasi pendaftaran</p>
            </div>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Alert HTML dihapus, diganti SweetAlert Global --}}

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                {{-- FORM TAMBAH BROSUR (Kiri) --}}
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-3xl shadow-sm border border-slate-200 overflow-hidden sticky top-24">
                        <div class="bg-slate-50 px-6 py-4 border-b border-slate-100">
                            <h3 class="text-slate-800 font-black uppercase tracking-wider text-xs">Tambah Brosur Baru</h3>
                        </div>
                        
                        {{-- Action diarahkan ke admin.brosur.store (Sesuaikan nama route jika berbeda) --}}
                        <form action="{{ route('admin.brosur.store') }}" method="POST" enctype="multipart/form-data" class="p-6 space-y-5">
                            @csrf
                            
                            <div>
                                <label class="block text-[11px] font-black text-gray-400 uppercase tracking-widest mb-2">Judul Utama</label>
                                <input type="text" name="title" required placeholder="Contoh: Kenali Kami Lebih Dekat!" value="{{ old('title') }}"
                                       class="w-full border-gray-200 rounded-2xl focus:ring-orange-500 focus:border-orange-500 text-sm py-3">
                            </div>

                            <div>
                                <label class="block text-[11px] font-black text-gray-400 uppercase tracking-widest mb-2">Deskripsi Paragraf</label>
                                <textarea name="description" required rows="4" placeholder="Tuliskan deskripsi promosi..."
                                          class="w-full border-gray-200 rounded-2xl focus:ring-orange-500 focus:border-orange-500 text-sm py-3">{{ old('description') }}</textarea>
                            </div>

                            <hr class="border-dashed border-gray-200">

                            <div>
                                <label class="block text-[11px] font-black text-orange-500 uppercase tracking-widest mb-2">Sub-Judul List</label>
                                <input type="text" name="list_title" placeholder="Contoh: Informasi di dalam brosur:" value="{{ old('list_title') }}"
                                       class="w-full bg-orange-50 border-orange-100 rounded-2xl focus:ring-orange-500 focus:border-orange-500 text-sm py-3">
                            </div>

                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-[10px] font-bold text-gray-400 uppercase mb-1">List 1</label>
                                    <input type="text" name="list_1" placeholder="Visi & Misi..." value="{{ old('list_1') }}"
                                           class="w-full border-gray-200 rounded-xl focus:ring-orange-500 focus:border-orange-500 text-xs py-2">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-bold text-gray-400 uppercase mb-1">List 2</label>
                                    <input type="text" name="list_2" placeholder="Program..." value="{{ old('list_2') }}"
                                           class="w-full border-gray-200 rounded-xl focus:ring-orange-500 focus:border-orange-500 text-xs py-2">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-bold text-gray-400 uppercase mb-1">List 3</label>
                                    <input type="text" name="list_3" placeholder="Fasilitas..." value="{{ old('list_3') }}"
                                           class="w-full border-gray-200 rounded-xl focus:ring-orange-500 focus:border-orange-500 text-xs py-2">
                                </div>
                                <div>
                                    <label class="block text-[10px] font-bold text-gray-400 uppercase mb-1">List 4</label>
                                    <input type="text" name="list_4" placeholder="Pendaftaran..." value="{{ old('list_4') }}"
                                           class="w-full border-gray-200 rounded-xl focus:ring-orange-500 focus:border-orange-500 text-xs py-2">
                                </div>
                            </div>

                            <hr class="border-dashed border-gray-200">

                            <div>
                                <label class="block text-[11px] font-black text-gray-400 uppercase tracking-widest mb-2">Gambar Brosur (HD)</label>
                                <div class="relative group">
                                    <input type="file" name="image" required accept="image/*" 
                                           class="w-full text-xs text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-bold file:bg-slate-800 file:text-white hover:file:bg-slate-700 cursor-pointer">
                                </div>
                                <p class="text-[10px] text-gray-400 mt-2">*Disarankan orientasi Potrait (berdiri) max 2MB.</p>
                            </div>

                            <button type="submit" class="w-full bg-[#F97316] hover:bg-[#EA580C] text-white font-black py-4 rounded-2xl shadow-lg shadow-orange-100 transition-all transform active:scale-95 flex items-center justify-center gap-2 text-xs uppercase tracking-widest mt-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" /></svg>
                                Simpan Brosur
                            </button>
                        </form>
                    </div>
                </div>

                {{-- DAFTAR BROSUR (Kanan) --}}
                <div class="lg:col-span-2">
                    {{-- Diubah menjadi grid-cols-1 karena brosur memuat banyak teks --}}
                    <div class="grid grid-cols-1 gap-6">
                        @forelse($brosur as $item)
                            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden group flex flex-col md:flex-row">
                                
                                {{-- Kiri: Gambar Brosur --}}
                                <div class="w-full md:w-5/12 h-64 md:h-auto overflow-hidden relative bg-gray-100">
                                    <img src="{{ asset('images_brosur/' . $item->image) }}" alt="Brosur" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                    <a href="{{ asset('images_brosur/' . $item->image) }}" target="_blank" class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center backdrop-blur-sm">
                                        <span class="bg-white text-gray-800 text-xs font-bold py-2 px-4 rounded-full shadow-lg">Lihat HD</span>
                                    </a>
                                </div>

                                {{-- Kanan: Detail Konten --}}
                                <div class="w-full md:w-7/12 p-6 flex flex-col justify-between">
                                    <div>
                                        <h3 class="font-bold text-slate-800 text-xl mb-3">{{ $item->title }}</h3>
                                        <p class="text-sm text-gray-500 mb-4 line-clamp-3 leading-relaxed">{{ $item->description }}</p>
                                        
                                        @if($item->list_title || $item->list_1 || $item->list_2 || $item->list_3 || $item->list_4)
                                            <div class="bg-orange-50 border border-orange-100 rounded-xl p-4 mb-4">
                                                @if($item->list_title)
                                                    <h4 class="font-bold text-orange-800 text-xs mb-2">{{ $item->list_title }}</h4>
                                                @endif
                                                <ul class="text-xs text-gray-700 space-y-1.5">
                                                    @if($item->list_1) <li class="flex items-start gap-1"><span class="text-orange-500">✓</span> {{ $item->list_1 }}</li> @endif
                                                    @if($item->list_2) <li class="flex items-start gap-1"><span class="text-orange-500">✓</span> {{ $item->list_2 }}</li> @endif
                                                    @if($item->list_3) <li class="flex items-start gap-1"><span class="text-orange-500">✓</span> {{ $item->list_3 }}</li> @endif
                                                    @if($item->list_4) <li class="flex items-start gap-1"><span class="text-orange-500">✓</span> {{ $item->list_4 }}</li> @endif
                                                </ul>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="border-t border-slate-100 pt-3 mt-auto flex justify-end">
                                        {{-- Tombol Hapus Terhubung dengan SweetAlert --}}
                                        <form action="{{ route('admin.brosur.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-hapus flex items-center gap-1 text-[11px] font-bold text-red-500 hover:text-red-700 transition-colors bg-red-50 hover:bg-red-100 px-3 py-2 rounded-lg">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                HAPUS BROSUR
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full py-24 text-center bg-white rounded-3xl border-2 border-dashed border-gray-200">
                                <div class="text-gray-300 mb-3">
                                    <svg class="w-16 h-16 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                </div>
                                <p class="text-gray-400 font-bold">Belum ada Brosur Promosi.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>