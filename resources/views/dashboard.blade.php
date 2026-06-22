<x-app-layout>
    <x-slot name="header">
        <div class="relative overflow-hidden -mb-10">
            {{-- Elemen Dekorasi Background --}}
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-yellow-200 rounded-full opacity-20 blur-3xl animate-pulse"></div>
            <div class="absolute top-10 left-20 w-24 h-24 bg-emerald-200 rounded-full opacity-20 blur-2xl"></div>
            
            <div class="relative bg-gradient-to-br from-emerald-500 via-teal-500 to-cyan-600 p-7 rounded-2xl shadow-2xl border-b-4 border-emerald-700/50">
                <div class="flex items-center gap-5">
                    <div class="relative group flex-shrink-0">
                        <div class="absolute inset-0 bg-white opacity-20 blur-xl group-hover:opacity-40 transition-opacity duration-500"></div>
                        <div class="relative bg-white/20 backdrop-blur-sm p-3 rounded-2xl border border-white/30 shadow-inner flex items-center justify-center overflow-hidden">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8 text-white drop-shadow-md">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a5.97 5.97 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h2 class="font-display font-black text-2xl text-white tracking-tight drop-shadow-sm uppercase">Portal Orang Tua</h2>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="h-px w-6 bg-yellow-300"></span>
                            <p class="text-emerald-50 text-[10px] font-bold opacity-90 uppercase tracking-[0.2em]">Informasi Perkembangan Ananda</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="relative py-12 bg-transparent z-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-8">
                
                {{-- Notifikasi --}}
                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-xl shadow-sm animate-bounce-short">
                        <p class="font-bold">Berhasil!</p>
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                {{-- Pesan Selamat Datang --}}
                <div class="bg-white rounded-2xl shadow-lg p-6 sm:p-8 border border-gray-200">
                    <h3 class="font-display text-2xl font-bold text-brand-teal-dark">Selamat Datang, {{ Auth::user()->name }}!</h3>
                    <p class="mt-2 text-gray-600">Ini adalah pusat informasi perkembangan ananda di PAUD. Selalu cek halaman ini untuk jurnal kegiatan terbaru.</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    
                    {{-- KOLOM KIRI: PROFIL MURID (Sisi Orang Tua) --}}
                    <div class="lg:col-span-1 space-y-8">
                        <div class="bg-gradient-to-br from-white to-gray-50 rounded-2xl shadow-lg p-6 border border-gray-200 text-center">
                            <h4 class="font-display font-bold text-xl text-brand-gray mb-6">Profil Murid</h4>
                            
                            @if ($siswa)
                                {{-- Area Foto Profil Interaktif --}}
                                <div class="relative group w-32 h-32 mx-auto mb-4" x-data>
                                    <form id="formUploadFoto" action="{{ route('dashboard.foto.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" id="inputFoto" name="foto" accept="image/*" class="hidden" onchange="document.getElementById('formUploadFoto').submit();">
                                    </form>

                                    <div class="w-full h-full rounded-full overflow-hidden bg-slate-200 flex items-center justify-center ring-4 ring-white shadow-md transition-transform group-hover:scale-105">
                                        @if($siswa->foto)
                                            <img src="{{ asset('storage/' . $siswa->foto) }}" alt="Foto" class="w-full h-full object-cover">
                                        @else
                                            <span class="font-display text-6xl font-bold text-brand-teal-dark">{{ strtoupper(substr($siswa->nama_panggilan, 0, 1)) }}</span>
                                        @endif
                                    </div>

                                    {{-- Tombol Pensil (Upload) --}}
                                    <button type="button" onclick="document.getElementById('inputFoto').click();" 
                                            class="absolute bottom-0 right-0 bg-brand-teal text-white p-2.5 rounded-full shadow-lg border-2 border-white hover:bg-teal-700 transition transform hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </button>

                                    {{-- Tombol Hapus --}}
                                    @if($siswa->foto)
                                    <form action="{{ route('dashboard.foto.update', $siswa->id) }}" method="POST" class="absolute top-0 right-0">
                                        @csrf
                                        <input type="hidden" name="action" value="delete">
                                        <button type="submit" onclick="return confirm('Hapus foto profil ananda?')" class="bg-red-500 text-white p-1 rounded-full shadow border-2 border-white hover:bg-red-600 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </form>
                                    @endif
                                </div>

                                <p class="font-display font-bold text-2xl text-brand-teal-dark uppercase">{{ $siswa->nama_panggilan }}</p>
                                <p class="text-gray-600 mb-4">{{ $siswa->nama_lengkap }}</p>
                                
                                <div class="flex flex-col items-center gap-1">
                                    <div class="flex gap-2">
                                        <span class="px-2 py-0.5 bg-slate-100 border border-slate-200 rounded text-[11px] font-bold text-slate-600">NIS: {{ $siswa->nis ?? '-' }}</span>
                                        <span class="px-2 py-0.5 bg-slate-100 border border-slate-200 rounded text-[11px] font-bold text-slate-600">NISN: {{ $siswa->nisn ?? '-' }}</span>
                                    </div>
                                </div>
                                
                                <div class="mt-4 flex justify-center">
                                    <span class="px-3 py-1 inline-flex items-center gap-1.5 text-sm font-semibold rounded-full {{ $siswa->status === 'Diterima' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        <span>Status: {{ $siswa->status }}</span>
                                    </span>
                                </div>
                            @else
                                <div class="w-32 h-32 rounded-full mx-auto bg-slate-200 mb-4 flex items-center justify-center ring-4 ring-white shadow-md">
                                    <svg class="w-16 h-16 text-slate-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                                </div>
                                <p class="text-gray-500">Data murid belum terdaftar.</p>
                            @endif
                        </div>
                    </div>

                    {{-- KOLOM KANAN: JURNAL KEGIATAN --}}
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-2xl shadow-lg border border-gray-200 h-full overflow-hidden">
                            <div class="p-6 sm:p-8 border-b bg-gray-50/50">
                                <h4 class="font-display font-bold text-xl text-brand-gray">Jurnal Kegiatan Terbaru</h4>
                            </div>

                            @if ($jurnalTerbaru)
                                <div class="p-6 sm:p-8 space-y-6">
                                    <p class="text-base text-gray-600 font-semibold flex items-center gap-2">
                                        <svg class="w-5 h-5 text-brand-teal" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/></svg>
                                        <span>{{ $jurnalTerbaru->tanggal->isoFormat('dddd, D MMMM YYYY') }}</span>
                                    </p>

                                    {{-- ========================================== --}}
                                    {{-- BAGIAN BARU: GALERI FOTO DOKUMENTASI --}}
                                    {{-- ========================================== --}}
                                    @if($jurnalTerbaru->dokumentasi && is_array($jurnalTerbaru->dokumentasi) && count($jurnalTerbaru->dokumentasi) > 0)
                                        <div class="mb-6">
                                            <h5 class="font-display font-bold text-sm text-gray-500 uppercase tracking-wider mb-3 flex items-center gap-2">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                                Dokumentasi Kegiatan Hari Ini
                                            </h5>
                                            
                                            <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                                                @foreach($jurnalTerbaru->dokumentasi as $foto)
                                                    <div class="rounded-xl overflow-hidden shadow-md border-2 border-white ring-1 ring-gray-100 relative group aspect-square">
                                                        <img src="{{ asset('storage/' . $foto) }}" alt="Dokumentasi" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                                                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                    {{-- ========================================== --}}

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div class="bg-emerald-50 border border-emerald-100 rounded-2xl p-5">
                                            <h5 class="font-display font-bold text-lg text-emerald-800 flex items-center gap-2">
                                                <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                                                Catatan Positif
                                            </h5>
                                            <div class="mt-2 text-gray-700 leading-relaxed italic">"{!! nl2br(e($jurnalTerbaru->catatan_positif)) ?: 'Ananda berkegiatan dengan baik.' !!}"</div>
                                        </div>

                                        <div class="bg-blue-50 border border-blue-100 rounded-2xl p-5">
                                            <h5 class="font-display font-bold text-lg text-blue-800 flex items-center gap-2">
                                                <span class="w-2 h-2 bg-blue-500 rounded-full"></span>
                                                Saran Dirumah
                                            </h5>
                                            <div class="mt-2 text-gray-700 leading-relaxed">{!! nl2br(e($jurnalTerbaru->saran_untuk_dirumah)) ?: 'Terus dampingi ananda belajar.' !!}</div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="p-12 text-center flex flex-col items-center justify-center h-full">
                                    <div class="w-20 h-20 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                                        <svg class="h-10 w-10 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" /></svg>
                                    </div>
                                    <h3 class="text-lg font-bold text-gray-800">Belum Ada Jurnal</h3>
                                    <p class="text-sm text-gray-500">Guru belum menambahkan catatan untuk hari ini.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>