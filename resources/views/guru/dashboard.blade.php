<x-app-layout>
    <x-slot name="header">
        <div class="relative overflow-hidden px-4 sm:px-0 -mb-10">
            <div class="absolute top-2 right-10 text-blue-200 opacity-40 hidden sm:block">
                <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0l3 9h9l-7 5 3 9-8-6-8 6 3-9-7-5h9z"/></svg>
            </div>

            <div class="relative bg-gradient-to-r from-blue-500 via-indigo-500 to-cyan-500 p-5 sm:p-7 rounded-bl-[60px] sm:rounded-bl-[80px] rounded-tr-[30px] sm:rounded-tr-[40px] rounded-tl-[20px] rounded-br-[20px] shadow-lg border-b-4 border-blue-700">
                <div class="flex items-center gap-3 sm:gap-5">
                    <div class="bg-indigo-900/20 p-2 sm:p-3 rounded-full border border-white/20 text-xl sm:text-3xl flex-shrink-0">
                        📚
                    </div>
                    <div class="min-w-0">
                        <h2 class="font-display font-black text-lg sm:text-2xl text-white tracking-tight truncate">
                            Dashboard Guru
                        </h2>
                        <p class="text-blue-50 text-[9px] sm:text-xs font-medium opacity-90 uppercase tracking-widest mt-1 truncate">
                            Manajemen Kelas & Jurnal Harian
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-8 sm:py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Welcome Card --}}
            <div class="bg-white p-5 sm:p-6 rounded-xl shadow-md border border-gray-200 mb-6">
                <h3 class="font-display text-xl sm:text-2xl font-bold text-gray-800 truncate">Assalamualaikum, {{ Auth::user()->name }}!</h3>
                <p class="mt-2 text-sm sm:text-base text-gray-600">Selamat datang kembali. Berikut adalah daftar murid di kelas Anda.</p>
            </div>

            @if (session('status'))
                <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg shadow-sm" role="alert">
                    <p class="font-bold text-sm">Berhasil!</p>
                    <p class="text-xs sm:text-sm">{{ session('status') }}</p>
                </div>
            @endif

            {{-- ========================================== --}}
            {{-- FITUR SEARCH / PENCARIAN --}}
            {{-- ========================================== --}}
            <div class="mb-6 flex justify-end">
                <form action="{{ route('guru.dashboard') }}" method="GET" class="relative w-full sm:w-80">
                    <input type="text" 
                           name="search" 
                           value="{{ request('search') }}" 
                           placeholder="Cari nama atau panggilan murid..." 
                           class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-full focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 shadow-sm transition-all text-sm">
                    
                    <div class="absolute left-4 top-3.5 text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>

                    {{-- Tombol Reset (Muncul jika sedang mencari sesuatu) --}}
                    @if(request('search'))
                        <a href="{{ route('guru.dashboard') }}" class="absolute right-4 top-3.5 text-gray-400 hover:text-red-500 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif
                </form>
            </div>
            {{-- ========================================== --}}

            {{-- Grid Kartu Murid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                @forelse ($siswas as $siswa)
                    <div class="bg-white rounded-2xl shadow-sm hover:shadow-md border border-gray-100 overflow-hidden min-w-0 transform transition-all duration-300 flex flex-col">
                        <div class="p-5 sm:p-6 flex-1">
                            <div class="flex items-center space-x-4">
                                
                                {{-- Menampilkan Foto Asli jika ada, jika tidak pakai inisial --}}
                                @if(isset($siswa->foto) && $siswa->foto)
                                    <img class="h-14 w-14 sm:h-16 sm:w-16 rounded-full object-cover ring-4 ring-teal-50 flex-shrink-0" src="{{ asset('storage/' . $siswa->foto) }}" alt="Foto Siswa">
                                @else
                                    <div class="h-14 w-14 sm:h-16 sm:w-16 rounded-full bg-teal-50 text-teal-700 font-black text-2xl flex items-center justify-center ring-4 ring-teal-50/50 flex-shrink-0">
                                        {{ strtoupper(substr($siswa->nama_panggilan ?? $siswa->nama_lengkap, 0, 1)) }}
                                    </div>
                                @endif

                                <div class="min-w-0 flex-1">
                                    <h4 class="font-display text-sm sm:text-lg font-bold text-gray-900 truncate">{{ $siswa->nama_lengkap ?? $siswa->nama_lengkap_anak }}</h4>
                                    <p class="text-gray-500 text-xs sm:text-sm truncate mt-0.5">Panggilan: {{ $siswa->nama_panggilan ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Bagian Tombol Aksi (HANYA ISI JURNAL) --}}
                        <div class="px-5 sm:px-6 pb-5 sm:pb-6 mt-auto">
                            <a href="{{ route('guru.jurnal.create', $siswa->id) }}" class="w-full flex items-center justify-center gap-2 text-center bg-[#F97316] text-white font-bold px-4 py-3 rounded-xl shadow-sm hover:bg-[#EA580C] transition duration-300 text-sm active:scale-95">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                                <span>Isi Jurnal Kegiatan</span>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center p-12 bg-white rounded-2xl shadow-sm border border-gray-100">
                        <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" /></svg>
                        
                        @if(request('search'))
                            <h3 class="text-lg font-bold text-gray-800">Murid Tidak Ditemukan</h3>
                            <p class="text-gray-500 mt-1">Tidak ada murid dengan nama "<span class="font-bold">{{ request('search') }}</span>".</p>
                            <a href="{{ route('guru.dashboard') }}" class="inline-block mt-4 text-blue-500 font-bold hover:underline">Lihat Semua Murid</a>
                        @else
                            <h3 class="text-lg font-bold text-gray-800">Kelas Kosong</h3>
                            <p class="text-gray-500 mt-1">Belum ada data murid yang terdaftar di sistem.</p>
                        @endif
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>