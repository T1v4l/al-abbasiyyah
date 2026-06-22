<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rincian Biaya - PaudQu Al-Abbasiyyah</title>
    
    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('images/log2.png') }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@500;600;700;800;900&display=swap" rel="stylesheet">

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
    {{-- NAVBAR (Standar) --}}
    {{-- ======================================================== --}}
    <header 
        x-data="{ scrolled: false, mobileMenuOpen: false }" 
        @scroll.window="scrolled = (window.scrollY > 20)" 
        class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 ease-in-out"
        :class="scrolled ? 'bg-white shadow-md py-2' : 'bg-transparent py-4'">
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                {{-- Logo --}}
                <a href="#" class="flex items-center gap-2 sm:gap-3">
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

                    <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
                        <button class="font-medium text-sm flex items-center gap-1 hover:text-orange-500 transition-colors duration-300" :class="scrolled ? 'text-gray-700' : 'text-white'">
                            Lainnya <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <div x-show="open" x-transition.opacity class="absolute top-full right-0 w-48 bg-white rounded-lg shadow-xl py-2 mt-2 border border-gray-100">
                            <a href="{{ route('program.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-600">Program</a>
                            <a href="{{ url('/cara-pembayaran') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-600">Cara Pembayaran</a>
                            <a href="/biaya" class="block px-4 py-2 text-sm text-orange-600 font-bold bg-orange-50">Biaya Pendaftaran</a>
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
                    <div x-data="{ subOpen: true }" class="border-b border-gray-100">
                        <button @click="subOpen = !subOpen" class="w-full flex justify-between items-center px-6 py-3 text-gray-700 font-medium hover:bg-gray-50 bg-white">
                            <span>Lainnya</span>
                            <svg class="w-4 h-4 transition-transform text-gray-500" :class="subOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="subOpen" x-collapse class="bg-gray-50">
                            <a href="{{ route('program.index') }}" class="block pl-10 pr-4 py-2 text-sm text-gray-600 hover:text-orange-600">Program</a>
                            <a href="{{ url('/cara-pembayaran') }}" class="block pl-10 pr-4 py-2 text-sm text-gray-600 hover:text-orange-600">Cara Pembayaran</a>
                            <a href="/biaya" class="block pl-10 pr-4 py-2 text-sm text-orange-600 font-bold bg-orange-50">Biaya Pendaftaran</a>
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
    <section class="relative w-full h-[400px] flex items-center justify-center bg-cover bg-center bg-no-repeat bg-fixed"
             style="background-image: url('{{ asset('images/imgtkk.jpg') }}');">
        <div class="absolute inset-0 bg-black/60"></div>
        <div class="relative z-10 text-center px-4 -mt-10">
            <span class="inline-flex items-center gap-2 py-1 px-3 rounded-full bg-white/20 backdrop-blur-sm border border-white/30 text-white text-xs font-semibold mb-4 tracking-wider uppercase" data-aos="fade-down">
                Keuangan & Administrasi
            </span>
            <h1 class="font-display text-3xl md:text-3xl font-bold text-white mb-4 tracking-wide" data-aos="fade-up">
                Biaya Pendaftaran
            </h1>
            <p class="text-white/90 text-sm md:text-lg max-w-2xl mx-auto font-light leading-relaxed" data-aos="fade-up" data-aos-delay="100">
                Transparansi rincian biaya pendidikan Tahun Ajaran 2026/2027.
            </p>
        </div>
    </section>

    {{-- ======================================================== --}}
    {{-- CONTENT UTAMA (Desain Menarik dengan Layout Standar) --}}
    {{-- ======================================================== --}}
    {{-- Menggunakan gaya melengkung ke atas yang seragam dengan page lain --}}
    <main class="flex-grow bg-gray-50 relative z-20 -mt-12 rounded-t-[40px] pt-12 pb-24 shadow-[0_-10px_40px_rgba(0,0,0,0.1)]"> 
        <div class="max-w-3xl mx-auto px-4 sm:px-6">

            {{-- 1. INTRO --}}
            <div class="text-center mb-10" data-aos="fade-up">
                <h2 class="font-display text-2xl md:text-3xl font-bold text-gray-900">Rincian Biaya.</h2>
                <div class="w-16 h-1 bg-orange-500 mx-auto mt-3 rounded-full"></div>
            </div>

            {{-- 2. DAFTAR RINCIAN (Desain Ikon yang Menarik) --}}
            <div class="bg-white rounded-3xl p-4 sm:p-8 shadow-sm border border-gray-200 mb-10 relative overflow-hidden">
                <div class="relative z-10 space-y-3">
                    
                    {{-- Item 1: Pendaftaran --}}
                    <div class="group flex flex-col sm:flex-row items-start sm:items-center gap-4 p-4 rounded-2xl transition-all duration-300 hover:bg-blue-50/50 border border-transparent hover:border-blue-100" data-aos="fade-up" data-aos-delay="50">
                        <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-500 flex items-center justify-center shrink-0 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                        </div>
                        <div class="flex-grow">
                            <h4 class="text-gray-800 font-bold text-lg">1. Dana Bangunan</h4>
                            <p class="text-sm text-gray-500 mt-0.5">Perbaikan Gedung, Fasilitas Sekolah.</p>
                        </div>
                        <div class="sm:text-right mt-1 sm:mt-0 shrink-0">
                            <span class="text-gray-900 font-extrabold text-lg">Rp 500.000</span>
                        </div>
                    </div>

                    {{-- Item 2: Uang Pangkal --}}
                    <div class="group flex flex-col sm:flex-row items-start sm:items-center gap-4 p-4 rounded-2xl transition-all duration-300 hover:bg-orange-50/50 border border-transparent hover:border-orange-100" data-aos="fade-up" data-aos-delay="100">
                        <div class="w-12 h-12 rounded-2xl bg-orange-100 text-orange-500 flex items-center justify-center shrink-0 group-hover:scale-110 group-hover:-rotate-3 transition-all duration-300">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1v1H9V7zm5 0h1v1h-1V7zm-5 4h1v1H9v-1zm5 0h1v1h-1v-1zm-3 4H2v4h4v-4z"></path></svg>
                        </div>
                        <div class="flex-grow">
                            <h4 class="text-gray-800 font-bold text-lg">2. Sarana Pendidikan</h4>
                            <p class="text-sm text-gray-500 mt-0.5">Pelaksanaan KBM spt: Peralatan & Perlengkapan Belajar, Buku Paket, dsb.</p>
                        </div>
                        <div class="sm:text-right mt-1 sm:mt-0 shrink-0">
                            <span class="text-gray-900 font-extrabold text-lg">Rp 400.000</span>
                        </div>
                    </div>

                    {{-- Item 3: Seragam --}}
                    <div class="group flex flex-col sm:flex-row items-start sm:items-center gap-4 p-4 rounded-2xl transition-all duration-300 hover:bg-pink-50/50 border border-transparent hover:border-pink-100" data-aos="fade-up" data-aos-delay="150">
                        <div class="w-12 h-12 rounded-2xl bg-pink-100 text-pink-500 flex items-center justify-center shrink-0 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12V7a2 2 0 00-2-2H5a2 2 0 00-2 2v5m18 0l-3 3v7a2 2 0 01-2 2H8a2 2 0 01-2-2v-7l-3-3"></path></svg>
                        </div>
                        <div class="flex-grow">
                            <h4 class="text-gray-800 font-bold text-lg">3. Baju Seragam Santri 4 (empat) stel</h4>
                            <p class="text-sm text-gray-500 mt-0.5">Seragam Oranye, Seragam Putih-putih, Seragam Motif kotak, Seragam Olahraga.</p>
                        </div>
                        <div class="sm:text-right mt-1 sm:mt-0 shrink-0">
                            <span class="text-gray-900 font-extrabold text-lg">Rp 500.000</span>
                        </div>
                    </div>

                    {{-- Item 4: SPP --}}
                    <div class="group flex flex-col sm:flex-row items-start sm:items-center gap-4 p-4 rounded-2xl transition-all duration-300 hover:bg-emerald-50/50 border border-transparent hover:border-emerald-100" data-aos="fade-up" data-aos-delay="200">
                        <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-500 flex items-center justify-center shrink-0 group-hover:scale-110 group-hover:-rotate-3 transition-all duration-300">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <div class="flex-grow">
                            <h4 class="text-gray-800 font-bold text-lg">4. Iuran SPP</h4>
                            <p class="text-sm text-gray-500 mt-0.5">SPP & Melukis per bulan (Juli 2026).</p>
                        </div>
                        <div class="sm:text-right mt-1 sm:mt-0 shrink-0">
                            <span class="text-gray-900 font-extrabold text-lg">Rp 180.000</span>
                        </div>
                    </div>

                    {{-- Item 5: Buku Paket --}}
                    <div class="group flex flex-col sm:flex-row items-start sm:items-center gap-4 p-4 rounded-2xl transition-all duration-300 hover:bg-purple-50/50 border border-transparent hover:border-purple-100" data-aos="fade-up" data-aos-delay="250">
                        <div class="w-12 h-12 rounded-2xl bg-purple-100 text-purple-500 flex items-center justify-center shrink-0 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <div class="flex-grow">
                            <h4 class="text-gray-800 font-bold text-lg">5. Majalah dan GIS untuk 1 (satu) tahun</h4>
                            <p class="text-sm text-gray-500 mt-0.5">Pengadaan Majalah & Gerakan Infaq Santri.</p>
                        </div>
                        <div class="sm:text-right mt-1 sm:mt-0 shrink-0">
                            <span class="text-gray-900 font-extrabold text-lg">Rp 250.000</span>
                        </div>
                    </div>

                    {{-- Item 6: Buku Prestasi --}}
                    {{-- <div class="group flex flex-col sm:flex-row items-start sm:items-center gap-4 p-4 rounded-2xl transition-all duration-300 hover:bg-amber-50/50 border border-transparent hover:border-amber-100" data-aos="fade-up" data-aos-delay="300">
                        <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-500 flex items-center justify-center shrink-0 group-hover:scale-110 group-hover:-rotate-3 transition-all duration-300">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                        </div>
                        <div class="flex-grow">
                            <h4 class="text-gray-800 font-bold text-lg">6. Buku Prestasi + Sampul</h4>
                            <p class="text-sm text-gray-500 mt-0.5">Buku kontrol hafalan, ibadah, dan perkembangan harian anak.</p>
                        </div>
                        <div class="sm:text-right mt-1 sm:mt-0 shrink-0">
                            <span class="text-gray-900 font-extrabold text-lg">Rp 25.000</span>
                        </div>
                    </div> --}}

                    {{-- Item 7: Raport --}}
                    {{-- <div class="group flex flex-col sm:flex-row items-start sm:items-center gap-4 p-4 rounded-2xl transition-all duration-300 hover:bg-indigo-50/50 border border-transparent hover:border-indigo-100" data-aos="fade-up" data-aos-delay="350">
                        <div class="w-12 h-12 rounded-2xl bg-indigo-100 text-indigo-500 flex items-center justify-center shrink-0 group-hover:scale-110 group-hover:rotate-3 transition-all duration-300">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <div class="flex-grow">
                            <h4 class="text-gray-800 font-bold text-lg">7. Raport + Sampul</h4>
                            <p class="text-sm text-gray-500 mt-0.5">Map raport eksklusif & lembar penilaian akhir semester.</p>
                        </div>
                        <div class="sm:text-right mt-1 sm:mt-0 shrink-0">
                            <span class="text-gray-900 font-extrabold text-lg">Rp 55.000</span>
                        </div>
                    </div> --}}

                </div>

                {{-- TOTAL BIAYA (Banner Kotak Keren) --}}
                {{-- <div class="mt-8 bg-gradient-to-r from-orange-500 to-orange-600 rounded-2xl p-6 md:p-8 flex flex-col sm:flex-row justify-between items-center text-white shadow-lg" data-aos="fade-up" data-aos-delay="400">
                    <div class="text-center sm:text-left mb-2 sm:mb-0">
                        <span class="inline-block px-3 py-1 bg-white/20 rounded-full text-xs font-bold uppercase tracking-wider mb-2">Lunas 1 Tahun</span>
                        <h3 class="text-lg md:text-xl font-medium text-orange-50">Total Biaya Daftar Ulang</h3>
                    </div>
                    <div>
                        <span class="font-display font-black text-3xl md:text-4xl">Rp 1.135.000</span>
                    </div>
                </div> --}}
                
                {{-- TOTAL BIAYA (Banner Kotak Keren) --}}
                <div class="mt-8 relative overflow-hidden bg-gradient-to-r from-orange-500 to-orange-400 rounded-3xl p-6 md:p-8 flex flex-col sm:flex-row justify-between items-center text-white shadow-[0_10px_20px_rgba(249,115,22,0.3)] transform hover:scale-[1.01] transition-transform duration-300" data-aos="fade-up" data-aos-delay="450">
                    {{-- Hiasan Garis Motif Abstrak --}}
                    <svg class="absolute top-0 right-0 w-64 h-full opacity-20 pointer-events-none" viewBox="0 0 100 100" preserveAspectRatio="none">
                        <path d="M0,100 C30,50 70,50 100,0 L100,100 Z" fill="#ffffff" />
                    </svg>

                    <div class="relative z-10 text-center sm:text-left mb-2 sm:mb-0">
                        {{-- <span class="inline-block px-3 py-1 bg-white/20 backdrop-blur-sm rounded-full text-xs font-bold uppercase tracking-wider mb-2 border border-white/30">Lunas</span> --}}
                        <h3 class="text-lg md:text-xl font-medium text-orange-50">Total Biaya</h3>
                    </div>
                    <div class="relative z-10">
                        <span class="font-display font-black text-4xl md:text-5xl drop-shadow-md">Rp 1.830.000,-</span>
                    </div>
                </div>

            </div>

            {{-- 3. INFO PENTING DI BAWAH --}}
            <div class="bg-white border border-gray-200 rounded-2xl p-6 md:p-8 flex flex-col sm:flex-row items-start gap-4 shadow-sm" data-aos="fade-up">
                <div class="bg-orange-50 p-3 rounded-full text-orange-600 flex-shrink-0">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <div class="flex-grow">
                    <h4 class="font-bold text-gray-900 text-base md:text-lg mb-2">Catatan Tambahan</h4>
                    <ul class="text-sm text-gray-600 space-y-2 leading-relaxed">
                        <li>• Uang pendaftaran dan administrasi awal <strong>tidak dapat ditarik kembali</strong> apabila murid santri  mengundurkan diri.</li>
                        <li>• Untuk informasi Nomor Rekening, silakan kunjungi halaman <a href="{{ url('/cara-pembayaran') }}" class="text-orange-600 font-bold hover:underline">Cara Pembayaran</a>.</li>
                    </ul>
                </div>
            </div>

        </div>
    </main>

    {{-- FOOTER (Dikembalikan ke standar) --}}
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