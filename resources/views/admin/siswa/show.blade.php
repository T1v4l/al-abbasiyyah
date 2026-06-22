<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div class="print:hidden">
                <h2 class="font-display font-bold text-2xl text-brand-gray leading-tight">
                    Detail Profil Murid
                </h2>
                <p class="text-sm text-gray-500 mt-1 uppercase tracking-wider">Arsip Lengkap Ananda {{ $siswa->nama_lengkap }}</p>
            </div>

            <div class="flex gap-2 print:hidden">
                <a href="{{ route('admin.siswa.index') }}" class="inline-flex items-center px-4 py-2 bg-white hover:bg-gray-50 text-gray-700 text-sm font-bold rounded-xl transition-all border border-gray-200 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Kembali
                </a>
                <button onclick="window.print()" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-bold rounded-xl transition-all shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                    </svg>
                    Cetak Arsip
                </button>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen print:bg-white print:py-0 print:min-h-0">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 print:max-w-full print:px-0">
            
            {{-- Container Utama: shadow dibuang saat print --}}
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 print:shadow-none print:border-none print:rounded-none">
                
                {{-- ========================================== --}}
                {{-- BAGIAN HEADER: Avatar, Nama, NIS, NISN --}}
                {{-- ========================================== --}}
                <div class="bg-slate-800 px-8 py-10 text-white flex flex-col md:flex-row items-center gap-8 relative 
                            print:bg-transparent print:text-black print:border-b-2 print:border-black print:py-4 print:px-0 print:flex-col print:text-center">
                    
                    {{-- Avatar --}}
                    <div class="shrink-0 relative z-10 print:hidden">
                        @if($siswa->foto)
                            <img src="{{ asset('storage/' . $siswa->foto) }}" alt="Foto {{ $siswa->nama_lengkap }}" class="w-32 h-32 rounded-full object-cover border-4 border-slate-600 shadow-xl bg-white">
                        @else
                            <div class="w-32 h-32 rounded-full bg-slate-700 text-slate-300 flex items-center justify-center text-5xl font-black shadow-xl border-4 border-slate-600">
                                {{ strtoupper(substr($siswa->nama_lengkap, 0, 1)) }}
                            </div>
                        @endif
                    </div>

                    {{-- Nama & Tag --}}
                    <div class="text-center md:text-left relative z-10 flex-1 print:w-full">
                        <h3 class="text-3xl md:text-4xl font-black tracking-tight drop-shadow-md print:text-2xl print:uppercase print:drop-shadow-none print:mb-1">{{ $siswa->nama_lengkap }}</h3>
                        <p class="text-slate-400 font-medium mt-1 mb-4 print:text-black print:font-normal print:m-0">{{ $siswa->nama_panggilan ? 'Panggilan: ' . $siswa->nama_panggilan : '-' }}</p>
                        
                        <div class="flex flex-wrap justify-center md:justify-start gap-3 mt-2 print:justify-center print:mt-3">
                            <span class="bg-slate-700 px-4 py-1.5 rounded-md text-xs font-bold uppercase tracking-widest border border-slate-600 print:bg-transparent print:border-black print:text-black print:rounded-none">
                                NIS: {{ $siswa->nis ?? 'Belum Ada' }}
                            </span>
                            <span class="bg-slate-700 px-4 py-1.5 rounded-md text-xs font-bold uppercase tracking-widest border border-slate-600 print:bg-transparent print:border-black print:text-black print:rounded-none">
                                NISN: {{ $siswa->nisn ?? 'Belum Ada' }}
                            </span>
                        </div>
                    </div>
                </div>
                {{-- ========================================== --}}

                <div class="p-8 md:p-10 print:px-0 print:py-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-10 print:gap-6 print:block">
                        
                        {{-- Sisi Kiri --}}
                        <div class="space-y-6 print:mb-6">
                            <h4 class="font-bold text-slate-800 border-b-2 border-slate-200 pb-2 uppercase text-sm tracking-widest print:border-black print:text-black print:text-base">
                                Data Identitas Siswa
                            </h4>
                            <div class="bg-white border border-gray-200 rounded-2xl p-6 space-y-5 print:border-none print:p-0 print:space-y-3">
                                <div>
                                    <span class="block text-[11px] text-gray-500 font-bold uppercase mb-1 print:text-black">NIK / No. Akta Kelahiran</span>
                                    <span class="text-gray-900 font-semibold print:text-black print:text-sm">{{ $siswa->nik ?? '-' }} / {{ $siswa->no_akta ?? '-' }}</span>
                                </div>
                                <div>
                                    <span class="block text-[11px] text-gray-500 font-bold uppercase mb-1 print:text-black">Tempat, Tanggal Lahir</span>
                                    <span class="text-gray-900 font-semibold print:text-black print:text-sm">
                                        {{ $siswa->tempat_lahir ?? '-' }}, 
                                        {{ $siswa->tanggal_lahir ? \Carbon\Carbon::parse($siswa->tanggal_lahir)->translatedFormat('d F Y') : '-' }}
                                    </span>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <span class="block text-[11px] text-gray-500 font-bold uppercase mb-1 print:text-black">Jenis Kelamin</span>
                                        <span class="text-gray-900 font-semibold print:text-black print:text-sm">{{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : ($siswa->jenis_kelamin == 'P' ? 'Perempuan' : '-') }}</span>
                                    </div>
                                    <div>
                                        <span class="block text-[11px] text-gray-500 font-bold uppercase mb-1 print:text-black">Agama</span>
                                        <span class="text-gray-900 font-semibold print:text-black print:text-sm">{{ $siswa->agama ?? '-' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Sisi Kanan --}}
                        <div class="space-y-6">
                            <h4 class="font-bold text-slate-800 border-b-2 border-slate-200 pb-2 uppercase text-sm tracking-widest print:border-black print:text-black print:text-base">
                                Latar Belakang & Domisili
                            </h4>
                            <div class="bg-white border border-gray-200 rounded-2xl p-6 space-y-5 print:border-none print:p-0 print:space-y-3">
                                <div>
                                    <span class="block text-[11px] text-gray-500 font-bold uppercase mb-1 print:text-black">Alamat Lengkap</span>
                                    <span class="text-gray-900 font-semibold leading-relaxed block bg-gray-50 p-3 rounded-lg border border-gray-100 print:bg-transparent print:border-none print:p-0 print:text-sm">
                                        {{ $siswa->alamat ?? '-' }}<br>
                                        @if($siswa->kelurahan || $siswa->kecamatan)
                                            <span class="text-gray-600 print:text-black">Kel. {{ $siswa->kelurahan ?? '-' }}, Kec. {{ $siswa->kecamatan ?? '-' }}</span>
                                        @endif
                                    </span>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <span class="block text-[11px] text-gray-500 font-bold uppercase mb-1 print:text-black">Status Anak</span>
                                        <span class="text-gray-900 font-semibold print:text-black print:text-sm">Anak Ke-{{ $siswa->anak_ke ?? '-' }}</span>
                                    </div>
                                    <div>
                                        <span class="block text-[11px] text-gray-500 font-bold uppercase mb-1 print:text-black">Jumlah Saudara</span>
                                        <span class="text-gray-900 font-semibold print:text-black print:text-sm">{{ $siswa->jumlah_saudara ?? '-' }} Bersaudara</span>
                                    </div>
                                </div>
                                <div>
                                    <span class="block text-[11px] text-gray-500 font-bold uppercase mb-1 print:text-black">Status Pendaftaran</span>
                                    <span class="font-bold text-sm uppercase tracking-wider {{ $siswa->status === 'Diterima' ? 'text-green-600' : 'text-amber-600' }} print:text-black print:font-bold">
                                        {{ $siswa->status ?? 'Menunggu Verifikasi' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Tombol Aksi Layar (Sembunyi saat print) --}}
                    <div class="mt-12 pt-8 border-t border-gray-200 flex gap-4 print:hidden">
                        <a href="{{ route('admin.siswa.edit', $siswa->id) }}" class="flex-1 bg-yellow-500 hover:bg-yellow-600 text-white text-center py-4 rounded-2xl font-bold shadow-lg transition flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                            Edit Data Murid
                        </a>
                    </div>
                </div>

                {{-- Footer Tanda Tangan (HANYA MUNCUL SAAT PRINT) --}}
                <div class="hidden print:block mt-8 text-right w-full">
                    <p class="text-[11pt] text-black">
                        Cibinong, {{ \Carbon\Carbon::now()->timezone('Asia/Jakarta')->translatedFormat('d F Y') }}
                    </p>
                    <div class="mt-24">
                        <p class="font-bold underline text-[12pt] text-black">Kepala Sekolah PAUD</p>
                        <p class="text-[10pt] text-black mt-1">NIP. ........................................</p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    {{-- KODE CSS KHUSUS UNTUK PRINTER --}}
    <style>
        @media print {
            /* Sembunyikan elemen bawaan Laravel Layout */
            nav, footer, aside, header { display: none !important; }
            .print\:hidden { display: none !important; }

            /* Reset Layout Kertas (A4) */
            @page { 
                size: A4 portrait; 
                margin: 2cm 1.5cm; 
            }

            body { 
                background: white !important; 
                margin: 0 !important; 
                padding: 0 !important;
                -webkit-print-color-adjust: exact !important;
                color-adjust: exact !important;
            }

            /* Hapus jarak-jarak yang tidak perlu */
            .py-12 { padding: 0 !important; }
            .p-8 { padding: 0 !important; }

            /* Paksa teks grid menyatu */
            .grid-cols-2 { grid-template-columns: 1fr 1fr !important; display: grid !important; }
            .space-y-6 > :not([hidden]) ~ :not([hidden]) { margin-top: 15px !important; }
            
            /* Tanda Tangan ke Kanan */
            .text-right { text-align: right !important; }
        }
    </style>
</x-app-layout>