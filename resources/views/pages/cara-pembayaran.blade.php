<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cara Pembayaran - PaudQu Al-Abbasiyyah</title>

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
    </style>
</head>
<body class="antialiased bg-gray-50 text-gray-700 flex flex-col min-h-screen">

    {{-- ======================================================== --}}
    {{-- NAVBAR --}}
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
                            <a href="{{ url('/prosedur') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-600">Prosedur Pendaftaran</a>
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
                            <a href="/cara-pembayaran" class="block px-4 py-2 text-sm text-orange-600 font-bold bg-orange-50">Cara Pembayaran</a>
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

            {{-- Mobile Menu Content --}}
            <div x-show="mobileMenuOpen" x-collapse class="md:hidden bg-white rounded-b-xl shadow-lg border-t absolute left-0 right-0 top-full overflow-hidden">
                <div class="flex flex-col py-2">
                    <a href="/" class="px-6 py-3 text-gray-700 font-medium hover:bg-gray-50">Beranda</a>
                    
                    {{-- Dropdown Informasi --}}
                    <div x-data="{ subOpen: false }" class="border-b border-gray-100">
                        <button @click="subOpen = !subOpen" class="w-full flex justify-between items-center px-6 py-3 text-gray-700 font-medium hover:bg-gray-50 bg-white">
                            <span>Informasi</span>
                            <svg class="w-4 h-4 transition-transform text-gray-500" :class="subOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="subOpen" x-collapse class="bg-gray-50">
                            <a href="/#faq" class="block pl-10 pr-4 py-2 text-sm text-gray-600 hover:text-orange-600">FAQ</a>
                            <a href="{{ url('/prosedur') }}" class="block pl-10 pr-4 py-2 text-sm text-gray-600 hover:text-orange-600">Prosedur Pendaftaran</a>
                            <a href="{{ url('/persyaratan') }}" class="block pl-10 pr-4 py-2 text-sm text-gray-600 hover:text-orange-600">Persyaratan</a>
                            <a href="{{ url('/brosur') }}" class="block pl-10 pr-4 py-2 text-sm text-gray-600 hover:text-orange-600">Brosur</a>
                        </div>
                    </div>

                    {{-- Dropdown Lainnya --}}
                    <div x-data="{ subOpen: true }" class="border-b border-gray-100">
                        <button @click="subOpen = !subOpen" class="w-full flex justify-between items-center px-6 py-3 text-gray-700 font-medium hover:bg-gray-50 bg-white">
                            <span>Lainnya</span>
                            <svg class="w-4 h-4 transition-transform text-gray-500" :class="subOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="subOpen" x-collapse class="bg-gray-50">
                            <a href="{{ route('program.index') }}" class="block pl-10 pr-4 py-2 text-sm text-gray-600 hover:text-orange-600">Program</a>
                            <a href="/cara-pembayaran" class="block pl-10 pr-4 py-2 text-sm text-orange-600 font-bold bg-orange-50">Cara Pembayaran</a>
                            <a href="{{ url('/biaya') }}" class="block pl-10 pr-4 py-2 text-sm text-gray-600 hover:text-orange-600">Biaya Pendaftaran</a>
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
    <section class="relative w-full h-[450px] flex items-center justify-center bg-cover bg-center bg-no-repeat bg-fixed"
             style="background-image: url('{{ asset('images/imgtkk.jpg') }}');">
        
        {{-- Overlay Gelap --}}
        <div class="absolute inset-0 bg-black/60"></div>
        
        {{-- Konten Hero --}}
        <div class="relative z-10 text-center px-4 -mt-10">
            <span class="inline-block py-1 px-3 rounded-full bg-white/20 backdrop-blur-sm border border-white/30 text-white text-xs font-semibold mb-4 tracking-wider uppercase" data-aos="fade-down">
                Keuangan & Administrasi
            </span>
            <h1 class="font-display text-3xl md:text-3xl font-bold text-white mb-4 tracking-wide" data-aos="fade-up">
                Metode Pembayaran
            </h1>
            <p class="text-white/90 text-sm md:text-lg max-w-2xl mx-auto font-light leading-relaxed" data-aos="fade-up" data-aos-delay="100">
                Panduan resmi tata cara pembayaran administrasi pendaftaran murid baru.
            </p>
        </div>
    </section>

    {{-- ======================================================== --}}
    {{-- CONTENT UTAMA (Lengkungan Kertas) --}}
    {{-- ======================================================== --}}
    <main class="flex-grow bg-white relative z-20 -mt-16 rounded-t-[40px] md:rounded-t-[50px] pt-12 pb-20 shadow-[0_-10px_40px_rgba(0,0,0,0.1)]"> 
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- 1. BAGIAN ALUR (CARD BERWARNA MENARIK) --}}
            <div class="mb-16">
                <div class="text-center mb-10" data-aos="fade-up">
                    <h2 class="font-display text-2xl md:text-3xl font-bold text-gray-800">Alur Pembayaran</h2>
                    <div class="w-16 h-1 bg-orange-500 mx-auto mt-3 rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 relative">
                    {{-- Garis Penghubung (Desktop Only) --}}
                    <div class="hidden md:block absolute top-1/2 left-0 w-full h-0.5 bg-gray-100 -z-10 transform -translate-y-1/2"></div>

                    {{-- Step 1: BIRU (Daftar Akun) --}}
                    <div class="bg-white p-6 rounded-2xl border-t-4 border-t-blue-500 border border-gray-100 shadow-sm text-center transition-transform duration-300 hover:-translate-y-2 hover:shadow-lg" data-aos="fade-up" data-aos-delay="0">
                        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center font-bold text-xl mb-4 mx-auto shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg">Buat Akun</h3>
                        <p class="text-sm text-gray-500 mt-2">Daftar akun SPMB terlebih dahulu.</p>
                    </div>

                    {{-- Step 2: TEAL/HIJAU (Isi Data) --}}
                    <div class="bg-white p-6 rounded-2xl border-t-4 border-t-teal-500 border border-gray-100 shadow-sm text-center transition-transform duration-300 hover:-translate-y-2 hover:shadow-lg" data-aos="fade-up" data-aos-delay="100">
                        <div class="w-12 h-12 bg-teal-50 text-teal-600 rounded-full flex items-center justify-center font-bold text-xl mb-4 mx-auto shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg">Isi Data</h3>
                        <p class="text-sm text-gray-500 mt-2">Lengkapi data murid & orang tua.</p>
                    </div>

                    {{-- Step 3: ORANYE (Bayar) --}}
                    <div class="bg-white p-6 rounded-2xl border-t-4 border-t-orange-500 border border-gray-100 shadow-sm text-center transition-transform duration-300 hover:-translate-y-2 hover:shadow-lg" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 bg-orange-50 text-orange-600 rounded-full flex items-center justify-center font-bold text-xl mb-4 mx-auto shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h3 class="font-bold text-gray-800 text-lg">Muncul Tagihan</h3>
                        <p class="text-sm text-gray-500 mt-2">Nomor tagihan muncul otomatis.</p>
                    </div>
                </div>
            </div>

            {{-- 2. GRID METODE PEMBAYARAN --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch mb-12">
                
                {{-- KIRI: TRANSFER --}}
                <div class="bg-white border border-gray-200 rounded-2xl shadow-xl overflow-hidden flex flex-col h-full hover:shadow-2xl transition-shadow duration-300" data-aos="fade-right">
                    <div class="bg-gray-800 p-6 flex justify-between items-center">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center text-white">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                            </div>
                            <div>
                                <h3 class="text-white font-bold text-lg">Transfer Bank</h3>
                                <p class="text-gray-400 text-xs">Virtual Account / Transfer Manual</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-8 flex-1 flex flex-col justify-center text-center">
                        <p class="text-gray-500 text-xs font-bold uppercase tracking-widest mb-2">Rekening Tujuan</p>
                        <div class="font-mono text-3xl font-bold text-gray-800 tracking-widest bg-gray-50 px-4 py-3 rounded-lg border border-gray-200 inline-block mb-4">
                            7101-****-***
                        </div>
                        <p class="text-sm text-gray-500 mb-6">
                            Bank: <strong class="text-teal-600">BSI (Bank Syariah Indonesia)</strong><br>
                            A.n: <strong>R***A**</strong>
                        </p>
                        <div class="bg-blue-50 text-blue-800 text-xs p-3 rounded-lg border border-blue-100">
                            Silakan Daftar serta Login untuk melihat nomor lengkap.
                        </div>
                    </div>
                </div>

                {{-- KANAN: TUNAI --}}
                <div class="bg-white border border-gray-200 rounded-2xl shadow-xl overflow-hidden flex flex-col h-full hover:shadow-2xl transition-shadow duration-300" data-aos="fade-left" data-aos-delay="100">
                     <div class="bg-teal-600 p-6 flex justify-between items-center">
                         <div class="flex items-center gap-3">
                            <div class="w-10 h-10 bg-white/10 rounded-full flex items-center justify-center text-white">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                            </div>
                            <div>
                                <h3 class="text-white font-bold text-lg">Tunai (Cash)</h3>
                                <p class="text-teal-100 text-xs">Bayar di Sekolah (PAUDQU AL-ABBASIYYAH)</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-8 flex-1 flex flex-col">
                        <p class="text-gray-600 mb-6 text-sm text-center">
                            Pembayaran tunai di ruang <strong>Tata Usaha (TU)</strong>.
                        </p>
                        <div class="bg-gray-50 rounded-xl p-4 border border-gray-100 flex-grow">
                            <h4 class="font-bold text-gray-800 mb-2 text-sm">Jam Layanan:</h4>
                            <ul class="space-y-2 text-sm">
                                <li class="flex justify-between border-b border-gray-200 pb-1"><span class="text-gray-600">Senin - Kamis</span> <span class="font-bold text-gray-800">07.30 - 10.30 WIB.</span></li>
                                {{-- <li class="flex justify-between border-b border-gray-200 pb-1"><span class="text-gray-600">Jumat</span> <span class="font-bold text-gray-800">08.00 - 11.00</span></li> --}}
                            </ul>
                        </div>
                        <div class="mt-4 text-center">
                             {{-- <a href="#" class="text-sm font-bold text-teal-600 hover:underline">Chat Admin TU</a> --}}
                        </div>
                    </div>
                </div>
            </div>

            {{-- 3. INFO PENTING (ALERT BOX) --}}
            <div class="mt-8 bg-orange-50 border border-orange-100 rounded-xl p-6 md:p-8 flex flex-col md:flex-row items-start gap-4 md:gap-6" data-aos="fade-up">
                {{-- Ikon --}}
                <div class="bg-orange-100 p-3 rounded-full text-orange-600 flex-shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                
                {{-- Bagian Teks --}}
                <div class="flex-grow">
                    <h4 class="font-bold text-gray-800 text-lg mb-2">Catatan Penting Pembayaran</h4>
                    <div class="text-sm text-gray-600 space-y-2 leading-relaxed">
                        <p>
                            1. Pastikan orang tua/wali murid <strong>menyimpan bukti transaksi</strong> (struk transfer/kuitansi tunai) sebagai arsip pribadi yang sah.
                        </p>
                        <p>
                            2. Jika melakukan pembayaran via transfer, status di sistem akan berubah menjadi <strong>"Lunas"</strong> secara otomatis dalam waktu maksimal 1x24 jam kerja.
                        </p>
                        <p>
                            3. Harap tidak melakukan pembayaran ke nomor rekening selain yang tertera di website ini untuk menghindari penipuan.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </main>

    {{-- FOOTER --}}
    <footer class="bg-gray-800 text-gray-400 text-xs py-6 mt-auto"> 
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