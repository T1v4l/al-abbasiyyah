<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prosedur Pendaftaran - PaudQu Al-Abbasiyyah</title>

    {{-- Favicon Logo PAUD --}}
    <link rel="icon" type="image/png" href="{{ asset('images/log2.png') }}">
    
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@500;600;700;800&family=Nunito:wght@400;700;800&display=swap" rel="stylesheet">

    {{-- CSS Libraries --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    
    {{-- Tailwind & Scripts --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    {{-- Alpine.js --}}
    <script src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        html, body { overflow-x: hidden; font-family: 'Inter', sans-serif; }
        .font-display { font-family: 'Poppins', sans-serif; }
        
        /* Definisi Warna Manual */
        .text-brand-orange { color: #f97316; }
        .bg-brand-orange { background-color: #f97316; }
        .border-brand-orange { border-color: #f97316; }
        
        .text-brand-teal { color: #14b8a6; }
        .bg-brand-teal { background-color: #14b8a6; }
        .border-brand-teal { border-color: #14b8a6; }
    </style>
</head>
<body class="antialiased bg-gray-50 text-gray-700">

    {{-- ======================================================== --}}
    {{-- NAVBAR (DENGAN MOBILE DROPDOWN) --}}
    {{-- ======================================================== --}}
    <header 
        x-data="{ scrolled: false, mobileMenuOpen: false }" 
        @scroll.window="scrolled = (window.scrollY > 20)" 
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 ease-in-out"
        :class="scrolled ? 'bg-white shadow-md py-2' : 'bg-transparent py-4'">
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                
                {{-- Logo --}}
                <a href="/" class="flex items-center gap-2 sm:gap-3">
                    <div class="flex items-center gap-1.5">
                        <div class="flex items-center justify-center h-10 w-10 sm:h-12 sm:w-12 bg-white rounded-full shadow-md p-1">
                            <img src="{{ asset('images/log1.png') }}" alt="Logo Yayasan" class="w-full h-full object-contain">
                        </div>
                        <div class="flex items-center justify-center h-10 w-10 sm:h-12 sm:w-12 bg-white rounded-full shadow-md p-1">
                            <img src="{{ asset('images/log2.png') }}" alt="Logo PAUDQu" class="w-full h-full object-contain -translate-y-1">
                        </div>
                    </div>
                    <div class="flex items-center ml-1">
                        <span class="font-display font-bold text-lg sm:text-xl text-brand-teal whitespace-nowrap" 
                            style="-webkit-text-stroke: 1.5px white; paint-order: stroke fill; text-shadow: 1px 1px 2px rgba(0,0,0,0.1);">
                            PAUDQU <span class="text-brand-orange" style="-webkit-text-stroke: 1.5px white; paint-order: stroke fill;">AL-ABBASIYYAH.</span>
                        </span>
                    </div>
                </a>

                {{-- Desktop Nav --}}
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="/" class="font-medium text-sm hover:text-orange-500 transition-colors duration-300" :class="scrolled ? 'text-gray-700' : 'text-white'">Beranda</a>
                    
                    {{-- Dropdown Informasi --}}
                    <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
                        <button class="font-medium text-sm flex items-center gap-1 hover:text-orange-500 transition-colors duration-300" :class="scrolled ? 'text-gray-700' : 'text-white'">
                            Informasi <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <div x-show="open" x-transition.opacity class="absolute top-full left-0 w-56 bg-white rounded-lg shadow-xl py-2 mt-2 border border-gray-100">
                            <a href="{{ url('/brosur') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-600">Brosur</a>
                            <a href="{{ url('/persyaratan') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-600">Persyaratan</a>
                            <a href="{{ url('/prosedur') }}" class="block px-4 py-2 text-sm text-orange-600 font-bold bg-orange-50">Prosedur Pendaftaran</a>
                            <a href="/#faq" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-600">Pertanyaan yang Sering Diajukan (FAQ)</a>
                        </div>
                    </div>

                    {{-- Dropdown Lainnya --}}
                    <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
                        <button class="font-medium text-sm flex items-center gap-1 hover:text-orange-500 transition-colors duration-300" :class="scrolled ? 'text-gray-700' : 'text-white'">
                            Lainnya <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <div x-show="open" x-transition.opacity class="absolute top-full right-0 w-48 bg-white rounded-lg shadow-xl py-2 mt-2 border border-gray-100">
                            <a href="{{ route('program.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-600">Program</a>
                            <a href="/cara-pembayaran" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-600">Cara Pembayaran</a>
                            <a href="{{ url('/biaya') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-600">Biaya Pendaftaran</a>
                        </div>
                    </div>

                    <a href="{{ route('login') }}" class="px-5 py-2.5 rounded-full font-semibold text-sm transition-all shadow-md transform hover:scale-105" :class="scrolled ? 'bg-orange-500 text-white hover:bg-orange-600' : 'bg-white text-orange-500 hover:bg-gray-100'">Login</a>
                </nav>

                {{-- Mobile Menu Button --}}
                <div class="md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 rounded-md" :class="scrolled ? 'text-gray-800' : 'text-white'">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                </div>
            </div>

            {{-- MOBILE MENU CONTENT (ACCORDION STYLE) --}}
            <div x-show="mobileMenuOpen" x-collapse class="md:hidden bg-white rounded-b-xl shadow-lg border-t absolute left-0 right-0 top-full overflow-hidden">
                <div class="flex flex-col py-2">
                    <a href="/" class="px-6 py-3 text-gray-700 font-medium hover:bg-gray-50">Beranda</a>
                    
                    {{-- Dropdown Informasi (Mobile) --}}
                    <div x-data="{ subOpen: true }" class="border-b border-gray-100"> {{-- subOpen: true agar menu ini langsung terbuka saat di mobile (opsional) --}}
                        <button @click="subOpen = !subOpen" class="w-full flex justify-between items-center px-6 py-3 text-gray-700 font-medium hover:bg-gray-50 bg-white">
                            <span>Informasi</span>
                            <svg class="w-4 h-4 transition-transform text-gray-500" :class="subOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="subOpen" x-collapse class="bg-gray-50">
                            <a href="/#faq" class="block pl-10 pr-4 py-2 text-sm text-gray-600 hover:text-orange-600">FAQ</a>
                            {{-- MENU AKTIF DI MOBILE --}}
                            <a href="{{ url('/prosedur') }}" class="block pl-10 pr-4 py-2 text-sm text-orange-600 font-bold bg-orange-50">Prosedur Pendaftaran</a>
                            <a href="{{ url('/persyaratan') }}" class="block pl-10 pr-4 py-2 text-sm text-gray-600 hover:text-orange-600">Persyaratan</a>
                            <a href="{{ url('/brosur') }}" class="block pl-10 pr-4 py-2 text-sm text-gray-600 hover:text-orange-600">Brosur</a>
                        </div>
                    </div>

                    {{-- Dropdown Lainnya (Mobile) --}}
                    <div x-data="{ subOpen: false }" class="border-b border-gray-100">
                        <button @click="subOpen = !subOpen" class="w-full flex justify-between items-center px-6 py-3 text-gray-700 font-medium hover:bg-gray-50 bg-white">
                            <span>Lainnya</span>
                            <svg class="w-4 h-4 transition-transform text-gray-500" :class="subOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="subOpen" x-collapse class="bg-gray-50">
                            <a href="{{ route('program.index') }}" class="block pl-10 pr-4 py-2 text-sm text-gray-600 hover:text-orange-600">Program</a>
                            <a href="/cara-pembayaran" class="block pl-10 pr-4 py-2 text-sm text-gray-600 hover:text-orange-600">Cara Pembayaran</a>
                            <a href="{{ url('/biaya') }}" class="block pl-10 pr-4 py-2 text-sm text-gray-600 hover:text-orange-600">Biaya</a>
                        </div>
                    </div>

                    <a href="{{ route('login') }}" class="mx-6 my-2 text-center bg-orange-500 text-white font-bold py-3 rounded-lg">Login</a>
                </div>
            </div>
        </div>
    </header>

    {{-- ======================================================== --}}
    {{-- HERO HEADER --}}
    {{-- ======================================================== --}}
    <section class="relative w-full h-[400px] md:h-[450px] flex items-center justify-center bg-cover bg-center bg-no-repeat bg-fixed"
             style="background-image: url('{{ asset('images/imgtkk.jpg') }}');">
        <div class="absolute inset-0 bg-black/60"></div>
        <div class="relative z-10 text-center px-4 pt-10">
            <span class="inline-block py-1 px-3 rounded-full bg-white/20 backdrop-blur-sm border border-white/30 text-white text-xs font-semibold mb-4 tracking-wider uppercase" data-aos="fade-down">
                Informasi Pendaftaran
            </span>
            <h1 class="font-display text-3xl md:text-3xl font-bold text-white mb-4 tracking-wide" data-aos="fade-up">
                Prosedur Pendaftaran
            </h1>
            <p class="text-white/90 text-sm md:text-lg max-w-2xl mx-auto font-light leading-relaxed" data-aos="fade-up" data-aos-delay="100">
                Langkah mudah bergabung menjadi bagian dari keluarga besar PaudQu Al-Abbasiyyah.
            </p>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-10 bg-slate-50 rounded-t-[40px]"></div>
    </section>

    {{-- ======================================================== --}}
    {{-- CONTENT: TIMELINE PROSEDUR --}}
    {{-- ======================================================== --}}
    <section class="py-20 bg-slate-50 relative overflow-hidden">
        
        {{-- Hiasan Background --}}
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-teal-100 rounded-full blur-3xl opacity-50"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 bg-orange-100 rounded-full blur-3xl opacity-50"></div>

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="font-display text-2xl md:text-3xl font-bold text-gray-900">Alur PPDB Online</h2>
                <div class="w-20 h-1 bg-orange-500 mx-auto mt-3 rounded-full"></div>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                    Ikuti 5 langkah sederhana berikut sesuai diagram alur pendaftaran.
                </p>
            </div>

            {{-- TIMELINE CONTAINER --}}
            <div class="relative">
                
                {{-- Garis Tengah --}}
                <div class="hidden md:block absolute left-1/2 transform -translate-x-1/2 w-px h-full border-l-2 border-dashed border-gray-300"></div>

                <div class="space-y-12 md:space-y-24">

                    {{-- LANGKAH 1 --}}
                    <div class="relative flex flex-col md:flex-row items-center justify-between group" data-aos="fade-right">
                        {{-- Kiri --}}
                        <div class="order-1 md:w-5/12 text-center md:text-right px-4">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">1. Registrasi Akun</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Orang tua mengakses website dan melakukan <strong>Login/Registrasi</strong> akun baru untuk mendapatkan akses ke sistem pendaftaran.
                            </p>
                        </div>
                        {{-- Tengah --}}
                        <div class="order-2 z-10 flex items-center justify-center w-12 h-12 bg-white border-4 border-orange-500 rounded-full shadow-lg transform group-hover:scale-110 transition-transform duration-300 my-4 md:my-0">
                            <span class="text-orange-500 font-bold text-lg">1</span>
                        </div>
                        {{-- Kanan --}}
                        <div class="order-3 md:w-5/12 px-4">
                            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300 flex items-center gap-4">
                                <div class="bg-orange-100 p-3 rounded-full text-orange-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path></svg>
                                </div>
                                <span class="text-sm font-semibold text-gray-700">Buat Akun & Login</span>
                            </div>
                        </div>
                    </div>

                    {{-- LANGKAH 2 --}}
                    <div class="relative flex flex-col md:flex-row items-center justify-between group" data-aos="fade-left">
                        {{-- Kiri --}}
                        <div class="order-3 md:order-1 md:w-5/12 px-4">
                             <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300 flex items-center gap-4 md:justify-end">
                                <span class="text-sm font-semibold text-gray-700">Formulir & Dokumen</span>
                                <div class="bg-teal-100 p-3 rounded-full text-teal-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                </div>
                            </div>
                        </div>
                        {{-- Tengah --}}
                        <div class="order-2 z-10 flex items-center justify-center w-12 h-12 bg-teal-500 text-white border-4 border-white rounded-full shadow-lg transform group-hover:scale-110 transition-transform duration-300 my-4 md:my-0">
                            <span class="font-bold text-lg">2</span>
                        </div>
                        {{-- Kanan --}}
                        <div class="order-1 md:order-3 md:w-5/12 text-center md:text-left px-4">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">2. Isi Biodata & Upload</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Lengkapi formulir pendaftaran siswa dan <strong>Upload Dokumen Pendukung</strong> (KK, Akte, Foto) ke dalam sistem.
                            </p>
                        </div>
                    </div>

                    {{-- LANGKAH 3 --}}
                    <div class="relative flex flex-col md:flex-row items-center justify-between group" data-aos="fade-right">
                        {{-- Kiri --}}
                        <div class="order-1 md:w-5/12 text-center md:text-right px-4">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">3. Validasi & Verifikasi</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Data akan disimpan dan divalidasi oleh sistem. Admin sekolah akan melakukan <strong>Verifikasi Data</strong> untuk memastikan kelengkapan.
                            </p>
                        </div>
                        {{-- Tengah --}}
                        <div class="order-2 z-10 flex items-center justify-center w-12 h-12 bg-white border-4 border-blue-500 rounded-full shadow-lg transform group-hover:scale-110 transition-transform duration-300 my-4 md:my-0">
                            <span class="text-blue-500 font-bold text-lg">3</span>
                        </div>
                        {{-- Kanan --}}
                        <div class="order-3 md:w-5/12 px-4">
                            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300 flex items-center gap-4">
                                <div class="bg-blue-100 p-3 rounded-full text-blue-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <span class="text-sm font-semibold text-gray-700">Pengecekan Admin</span>
                            </div>
                        </div>
                    </div>

                    {{-- LANGKAH 4 --}}
                    <div class="relative flex flex-col md:flex-row items-center justify-between group" data-aos="fade-left">
                        {{-- Kiri --}}
                        <div class="order-3 md:order-1 md:w-5/12 px-4">
                            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300 flex items-center gap-4 md:justify-end">
                                <span class="text-sm font-semibold text-gray-700">Transfer / Tunai</span>
                                <div class="bg-purple-100 p-3 rounded-full text-purple-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a1 1 0 11-2 0 1 1 0 012 0z"></path></svg>
                                </div>
                            </div>
                        </div>
                        {{-- Tengah --}}
                        <div class="order-2 z-10 flex items-center justify-center w-12 h-12 bg-purple-500 text-white border-4 border-white rounded-full shadow-lg transform group-hover:scale-110 transition-transform duration-300 my-4 md:my-0">
                            <span class="font-bold text-lg">4</span>
                        </div>
                        {{-- Kanan --}}
                        <div class="order-1 md:order-3 md:w-5/12 text-center md:text-left px-4">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">4. Pembayaran</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Setelah lolos verifikasi, orang tua memilih metode pembayaran (Transfer/Langsung). Status pendaftaran akan diperbarui di dashboard.
                            </p>
                        </div>
                    </div>

                    {{-- LANGKAH 5 --}}
                    <div class="relative flex flex-col md:flex-row items-center justify-between group" data-aos="fade-up">
                        {{-- Kiri --}}
                        <div class="order-1 md:w-5/12 text-center md:text-right px-4">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">5. Resmi Terdaftar</h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                Setelah konfirmasi pembayaran, akun murid menjadi <strong>AKTIF</strong>. Data tersimpan aman dan ananda siap memulai kegiatan sekolah.
                            </p>
                        </div>
                        {{-- Tengah --}}
                        <div class="order-2 z-10 flex items-center justify-center w-12 h-12 bg-green-500 text-white border-4 border-green-200 rounded-full shadow-xl transform group-hover:scale-110 transition-transform duration-300 my-4 md:my-0">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        {{-- Kanan --}}
                        <div class="order-3 md:w-5/12 px-4">
                             <div class="bg-green-50 p-5 rounded-2xl shadow-sm border border-green-100 flex items-center gap-4">
                                <div class="bg-green-100 p-3 rounded-full text-green-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <span class="text-sm font-bold text-green-700">Selesai</span>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- CTA Button --}}
                {{-- <div class="mt-20 text-center" data-aos="zoom-in">
                    <a href="/register" class="inline-flex items-center px-8 py-4 border border-transparent text-sm md:text-lg font-bold rounded-full shadow-lg text-white bg-orange-500 hover:bg-orange-600 hover:scale-105 transition-all duration-300">
                        Daftar Sekarang
                        <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                    </a>
                </div> --}}

            </div>
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="bg-gray-800 text-gray-400 text-xs py-6"> 
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; {{ date('Y') }} PAUDQU Al-Abbasiyyah.</p>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, once: true });
    </script>
</body>
</html>