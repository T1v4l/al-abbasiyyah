<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PAUDQU AL-ABBASIYYAH</title>

    {{-- Favicon Logo PAUD --}}
    <link rel="icon" type="image/png" href="{{ asset('images/log2.png') }}">
    
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@500;600;700;800&family=Nunito:wght@400;700;800&display=swap" rel="stylesheet">

    {{-- CSS Libraries --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    {{-- Tailwind & Scripts --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    {{-- Alpine.js (Untuk Interaksi Navbar & Dropdown & Modal) --}}
    <script src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        html, body { overflow-x: hidden; font-family: 'Inter', sans-serif; }
        .font-display { font-family: 'Poppins', sans-serif; }
        .font-nunito { font-family: 'Nunito', sans-serif; }

        /* Custom Colors */
        .text-brand-orange { color: #f97316; }
        .bg-brand-orange { background-color: #f97316; }
        .hover\:bg-brand-orange-dark:hover { background-color: #ea580c; }
        .text-brand-teal { color: #14b8a6; }
        .bg-brand-teal { background-color: #14b8a6; }
        
        /* Hero Slider Custom CSS */
        .hero-section {
            width: 100%;
            position: relative;
            height: 650px; 
        }
        
        @media (min-width: 768px) {
            .hero-section {
                height: 100vh;
            }
        }

        .hero-slider .swiper-slide {
            display: flex; 
            align-items: center; 
            justify-content: center;
            text-align: center; 
            color: white; 
            padding: 0; 
            position: relative; 
            overflow: hidden;
        }

        .swiper-button-next, .swiper-button-prev { color: #f97316 !important; }
        .swiper-button-next::after, .swiper-button-prev::after { font-size: 20px !important; font-weight: bold; }
        
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="antialiased bg-gray-50 text-gray-700">

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

                {{-- Desktop Navigation --}}
                <nav class="hidden md:flex items-center space-x-8">
                    @foreach([
                        ['label' => 'Beranda', 'url' => '/'],
                    ] as $link)
                        <a href="{{ $link['url'] }}" 
                           class="font-medium text-sm hover:text-brand-orange transition-colors duration-300 relative group"
                           :class="scrolled ? 'text-gray-700' : 'text-white'">
                            {{ $link['label'] }}
                            <span class="absolute bottom-[-4px] left-0 w-0 h-0.5 bg-brand-orange transition-all duration-300 group-hover:w-full"></span>
                        </a>
                    @endforeach

                    {{-- Dropdown Informasi --}}
                    <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
                        <button class="font-medium text-sm flex items-center gap-1 hover:text-brand-orange transition-colors duration-300"
                                :class="scrolled ? 'text-gray-700' : 'text-white'">
                            Informasi
                            <svg class="w-4 h-4 transition-transform" :class="open ? 'rotate-180' : ''" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <div x-show="open" x-transition.opacity class="absolute top-full left-0 w-48 bg-white rounded-lg shadow-xl py-2 mt-2 border border-gray-100">
                            <a href="{{ url('/brosur') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-brand-orange">Brosur</a>
                            <a href="{{ url('/persyaratan') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-brand-orange">Persyaratan</a>
                            <a href="{{ url('/prosedur') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-brand-orange">Prosedur Pendaftaran</a>
                            <a href="#faq" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-brand-orange">FAQ</a>
                        </div>
                    </div>

                    {{-- Dropdown Lainnya --}}
                    <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
                        <button class="font-medium text-sm flex items-center gap-1 hover:text-brand-orange transition-colors duration-300"
                                :class="scrolled ? 'text-gray-700' : 'text-white'">
                            Lainnya
                            <svg class="w-4 h-4 transition-transform" :class="open ? 'rotate-180' : ''" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <div x-show="open" x-transition.opacity class="absolute top-full right-0 w-48 bg-white rounded-lg shadow-xl py-2 mt-2 border border-gray-100">
                            <a href="{{ route('program.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-brand-orange">Program</a>
                            <a href="/cara-pembayaran" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-brand-orange">Cara Pembayaran</a>
                            <a href="{{ url('/biaya') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-brand-orange">Biaya Pendaftaran</a>
                        </div>
                    </div>

                    {{-- Tombol Masuk --}}
                    <a href="{{ route('login') }}" class="px-5 py-2.5 rounded-full font-semibold text-sm transition-all shadow-md transform hover:scale-105"
                       :class="scrolled ? 'bg-brand-orange text-white hover:bg-brand-orange-dark' : 'bg-white text-brand-orange hover:bg-gray-100'">
                        Daftar
                    </a>
                </nav>

                {{-- Mobile Button --}}
                <div class="md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 rounded-md" :class="scrolled ? 'text-gray-800' : 'text-white'">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Mobile Menu --}}
            <div x-show="mobileMenuOpen" x-collapse class="md:hidden bg-white rounded-b-xl shadow-lg border-t absolute left-0 right-0 top-full p-4">
                <div class="flex flex-col space-y-3">
                    <a href="/" class="text-gray-700 font-medium p-2 hover:bg-gray-50 rounded">Beranda</a>
                    
                    {{-- Mobile Informasi Dropdown --}}
                    <div x-data="{ subOpen: false }" class="border-b border-gray-100">
                        <button @click="subOpen = !subOpen" class="w-full flex justify-between items-center px-2 py-2 text-gray-700 font-medium hover:bg-gray-50 bg-white">
                            <span>Informasi</span>
                            <svg class="w-4 h-4 transition-transform text-gray-500" :class="subOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="subOpen" x-collapse class="bg-gray-50 rounded pl-4">
                            <a href="{{ url('/brosur') }}" class="block py-2 text-sm text-gray-600 hover:text-brand-orange">Brosur</a>
                            <a href="{{ url('/persyaratan') }}" class="block py-2 text-sm text-gray-600 hover:text-brand-orange">Persyaratan</a>
                            <a href="{{ url('/prosedur') }}" class="block py-2 text-sm text-gray-600 hover:text-brand-orange">Prosedur</a>
                            <a href="#faq" class="block py-2 text-sm text-gray-600 hover:text-brand-orange">FAQ</a>
                        </div>
                    </div>

                    {{-- Mobile Lainnya Dropdown --}}
                    <div x-data="{ subOpen: false }" class="border-b border-gray-100">
                        <button @click="subOpen = !subOpen" class="w-full flex justify-between items-center px-2 py-2 text-gray-700 font-medium hover:bg-gray-50 bg-white">
                            <span>Lainnya</span>
                            <svg class="w-4 h-4 transition-transform text-gray-500" :class="subOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="subOpen" x-collapse class="bg-gray-50 rounded pl-4">
                            <a href="{{ route('program.index') }}" class="block py-2 text-sm text-gray-600 hover:text-brand-orange">Program</a>
                            <a href="/cara-pembayaran" class="block py-2 text-sm text-gray-600 hover:text-brand-orange">Cara Pembayaran</a>
                            <a href="{{ url('/biaya') }}" class="block py-2 text-sm text-gray-600 hover:text-brand-orange">Biaya Pendaftaran</a>
                        </div>
                    </div>

                    <a href="{{ route('login') }}" class="text-center w-full bg-brand-orange text-white font-bold py-2 rounded-lg">Login</a>
                </div>
            </div>
        </div>
    </header>

    {{-- ======================================================== --}}
    {{-- HERO SECTION (DINAMIS TERHUBUNG DENGAN DATABASE) --}}
    {{-- ======================================================== --}}
    <section class="hero-section">
        <div class="swiper hero-slider w-full h-full">
            <div class="swiper-wrapper">
                
                {{-- LOOPING DINAMIS DARI TABEL HEROES --}}
                @forelse($heroes as $hero)
                    <div class="swiper-slide">
                        <img src="{{ asset('storage/' . $hero->gambar) }}" alt="Hero Image" class="absolute inset-0 w-full h-full object-cover object-center">
                        <div class="absolute inset-0 bg-black/50"></div>
                        <div class="relative z-10 flex flex-col items-center justify-center h-full w-full text-center px-4 pt-16">
                            <div data-aos="fade-up" class="max-w-4xl mx-auto">
                                
                                @if($hero->label)
                                    <span class="inline-block py-1 px-3 rounded-full bg-white/20 backdrop-blur-sm border border-white/30 text-white text-xs font-semibold mb-4 tracking-wider uppercase">
                                        {{ $hero->label }}
                                    </span>
                                @endif
                                
                                {{-- LOGIKA CERDAS WARNA TEKS --}}
                                @php
                                    $parts = preg_split('/<br\s*\/?>/i', $hero->judul);
                                    $judulFix = $parts[0]; 
                                    
                                    if(isset($parts[1])) {
                                        $judulFix .= '<br><span class="' . $hero->warna_teks . '">' . trim($parts[1]) . '</span>';
                                    } else {
                                        $judulFix = '<span class="' . $hero->warna_teks . '">' . trim($parts[0]) . '</span>';
                                    }
                                @endphp
                                
                                <h1 class="font-display text-3xl sm:text-5xl md:text-4xl font-extrabold text-white leading-tight mb-4 drop-shadow-md">
                                    {!! $judulFix !!}
                                </h1>
                                
                                @if($hero->sub_judul)
                                    <p class="text-sm sm:text-lg text-gray-100 mb-8 max-w-2xl mx-auto font-light leading-relaxed">
                                        {{ $hero->sub_judul }}
                                    </p>
                                @endif
                                
                                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                                    <a href="{{ route('login') }}" class="px-8 py-3 bg-brand-orange text-white rounded-full font-bold shadow-lg hover:bg-orange-600 transition transform hover:-translate-y-1">Daftar Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="swiper-slide bg-slate-800">
                        <div class="relative z-10 flex flex-col items-center justify-center h-full w-full text-center px-4">
                            <h1 class="font-display text-3xl font-extrabold text-white mb-4">PAUDQU AL-ABBASIYYAH</h1>
                            <p class="text-gray-300">Harap upload banner dari Dashboard Admin.</p>
                        </div>
                    </div>
                @endforelse

            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    {{-- ======================================================== --}}
    {{-- MENGAPA MEMILIH KAMI --}}
    {{-- ======================================================== --}}
    <section class="pt-24 pb-10 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                
                <div data-aos="fade-right">
                    <span class="text-brand-orange font-bold tracking-wider uppercase text-sm">Keunggulan</span>
                    <h2 class="font-display text-3xl md:text-3xl font-bold text-gray-900 mt-2 mb-6 leading-tight">
                        Mengapa Orang Tua Memilih <br> <span class="text-brand-teal">PAUDQU Al-Abbasiyyah?</span>
                    </h2>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        Kami tidak hanya mengajarkan calistung, tetapi menanamkan nilai-nilai tauhid dan kemandirian sejak dini melalui metode yang menyenangkan.
                    </p>

                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-orange-100 flex items-center justify-center text-brand-orange">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-gray-800">Kurikulum Tahfidz Ceria</h4>
                                <p class="text-sm text-gray-500 mt-1">Hafalan surat pendek dan doa harian dengan metode yang ramah anak.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-teal-100 flex items-center justify-center text-brand-teal">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-gray-800">Biaya Terjangkau</h4>
                                <p class="text-sm text-gray-500 mt-1">Pendidikan berkualitas dengan biaya yang bersahabat bagi semua kalangan.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-gray-800">Lokasi Strategis</h4>
                                <p class="text-sm text-gray-500 mt-1">Terletak di Gunung Putri yang mudah diakses dan aman dari keramaian jalan raya utama.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="relative" data-aos="fade-left">
                    <div class="absolute inset-0 bg-brand-orange rounded-3xl transform rotate-6 opacity-10"></div>
                    <div class="absolute inset-0 bg-brand-teal rounded-3xl transform -rotate-6 opacity-10"></div>
                    <img src="{{ asset('images/rmeanfot.jpeg') }}" alt="Siswa Ceria" class="relative rounded-3xl shadow-2xl w-full object-cover h-[500px]">
                    <div class="absolute bottom-10 -left-6 bg-white p-4 rounded-lg shadow-xl flex items-center gap-3 animate-bounce-slow">
                        <div class="text-3xl font-bold text-brand-orange">500+</div>
                        <div class="text-xs text-gray-500 leading-tight">Alumni <br> Sukses</div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ======================================================== --}}
    {{-- BERITA & INFORMASI TERKINI (DINAMIS DARI DATABASE) --}}
    {{-- ======================================================== --}}
    <section id="informasi" class="pt-10 pb-10 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="font-display text-3xl font-bold text-gray-800">Berita & Informasi Terkini</h2>
                <div class="w-20 h-1 bg-brand-orange mx-auto mt-2 rounded-full"></div>
                <p class="mt-4 text-gray-600">Update kegiatan dan informasi terbaru yang mendukung perkembangan dan pembelajaran anak.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @forelse($beritas as $berita)
                    <article x-data="{ openModal: false }" class="bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden group relative" data-aos="fade-up">
                        <div class="relative h-48 overflow-hidden">
                            <img src="{{ str_starts_with($berita->gambar_utama, 'images/') ? asset($berita->gambar_utama) : asset('storage/' . $berita->gambar_utama) }}" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-500">
                        </div>
                        <div class="p-6">
                            <h3 class="font-display font-bold text-lg text-gray-800 mb-2 group-hover:text-{{ $berita->warna_tema }} transition-colors">{{ $berita->judul }}</h3>
                            <p class="text-gray-500 text-sm line-clamp-2 mb-4">{{ $berita->deskripsi_singkat }}</p>
                            <button @click.prevent="openModal = true" class="inline-flex items-center text-sm font-semibold text-{{ $berita->warna_tema }} hover:tracking-wide transition-all outline-none">
                                Baca Selengkapnya <span class="ml-1">&rarr;</span>
                            </button>
                        </div>

                        {{-- MODAL POPUP --}}
                        <template x-teleport="body">
                            <div x-show="openModal" class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-6" style="display: none;">
                                <div x-show="openModal" x-transition.opacity @click="openModal = false" class="fixed inset-0 bg-black/70 backdrop-blur-sm cursor-pointer"></div>
                                <div x-show="openModal" x-transition class="relative bg-white rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto z-10">
                                    <button @click="openModal = false" class="absolute top-4 right-4 bg-gray-100 hover:bg-red-100 text-gray-600 hover:text-red-600 p-2 rounded-full transition-colors z-20">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    </button>
                                    <div class="p-6 sm:p-8">
                                        <h2 class="font-display text-2xl sm:text-3xl font-bold text-gray-900 mb-4 pr-10">{{ $berita->judul }}</h2>
                                        <div class="text-gray-600 text-sm sm:text-base leading-relaxed mb-6 space-y-3 text-justify">
                                            {!! $berita->konten_lengkap !!}
                                        </div>
                                        <h4 class="font-bold text-gray-800 mb-3 border-b pb-2">Dokumentasi Kegiatan:</h4>
                                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                            @if($berita->gambar_galeri_1)<img src="{{ str_starts_with($berita->gambar_galeri_1, 'images/') ? asset($berita->gambar_galeri_1) : asset('storage/' . $berita->gambar_galeri_1) }}" class="w-full h-40 object-cover rounded-lg shadow-sm">@endif
                                            @if($berita->gambar_galeri_2)<img src="{{ str_starts_with($berita->gambar_galeri_2, 'images/') ? asset($berita->gambar_galeri_2) : asset('storage/' . $berita->gambar_galeri_2) }}" class="w-full h-40 object-cover rounded-lg shadow-sm">@endif
                                            @if($berita->gambar_galeri_3)<img src="{{ str_starts_with($berita->gambar_galeri_3, 'images/') ? asset($berita->gambar_galeri_3) : asset('storage/' . $berita->gambar_galeri_3) }}" class="w-full h-40 object-cover rounded-lg shadow-sm">@endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </article>
                @empty
                    <p class="text-center text-gray-500 col-span-3">Belum ada berita baru yang diupload Admin.</p>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ======================================================== --}}
    {{-- FASILITAS (DINAMIS TERHUBUNG DENGAN DATABASE) --}}
    {{-- ======================================================== --}}
    <section id="fasilitas" class="pt-6 pb-6 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-end mb-10 px-2">
                <div>
                    <span class="text-brand-orange font-bold tracking-wider uppercase text-sm">Sarana & Prasarana</span>
                    <h2 class="font-display text-3xl font-bold text-gray-800 mt-2">Fasilitas</h2>
                </div>
                <div class="flex gap-2">
                    <div class="swiper-button-prev-facility cursor-pointer w-10 h-10 rounded-full border border-brand-orange text-brand-orange flex items-center justify-center hover:bg-brand-orange hover:text-white transition">
                        &larr;
                    </div>
                    <div class="swiper-button-next-facility cursor-pointer w-10 h-10 rounded-full border border-brand-orange text-brand-orange flex items-center justify-center hover:bg-brand-orange hover:text-white transition">
                        &rarr;
                    </div>
                </div>
            </div>

            <div class="swiper facility-slider pb-10">
                <div class="swiper-wrapper">
                    
                    {{-- LOOPING DINAMIS DARI TABEL FASILITAS --}}
                    @forelse($fasilitas as $item)
                        <div class="swiper-slide h-auto">
                            <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition-shadow h-full border border-gray-100">
                                <div class="h-48 overflow-hidden">
                                    <img src="{{ asset('storage/' . $item->gambar) }}" class="w-full h-full object-cover transition transform hover:scale-105" alt="{{ $item->nama_fasilitas }}">
                                </div>
                                <div class="p-5 text-center">
                                    <h4 class="font-bold text-gray-800 text-lg">{{ $item->nama_fasilitas }}</h4>
                                    <div class="flex justify-center text-yellow-400 text-sm mt-2">★★★★★</div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="swiper-slide h-auto">
                            <div class="bg-white p-10 rounded-xl shadow-sm text-center border border-gray-100">
                                <p class="text-gray-500">Belum ada foto fasilitas di-upload oleh Admin.</p>
                            </div>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </section>

    {{-- ======================================================== --}}
    {{-- FAQ --}}
    {{-- ======================================================== --}}
    <section id="faq" class="pt-4 pb-24 bg-white relative overflow-hidden">
        <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-full h-64 bg-gradient-to-b from-gray-50 to-white -z-10"></div>
        
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-10" data-aos="fade-up">
                <span class="text-brand-teal font-bold tracking-wider uppercase text-sm">Pertanyaan Sering Diajukan</span>
                <h2 class="font-display text-3xl font-bold text-gray-900 mt-2">Frequently Asked Questions</h2>
                <div class="w-16 h-1 bg-brand-teal mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="space-y-4" x-data="{ active: null }">
                <div class="border border-gray-200 rounded-lg bg-white overflow-hidden transition-all duration-300" :class="active === 1 ? 'shadow-md border-brand-orange' : 'hover:border-gray-300'">
                    <button @click="active = (active === 1 ? null : 1)" class="w-full px-6 py-5 text-left flex justify-between items-center focus:outline-none">
                        <span class="font-semibold text-gray-800 text-base md:text-lg">Berapa usia minimal untuk mendaftar?</span>
                        <span class="ml-6 flex-shrink-0 text-brand-orange transition-transform duration-300" :class="active === 1 ? 'rotate-180' : ''">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </span>
                    </button>
                    <div x-show="active === 1" x-collapse x-cloak>
                        <div class="px-6 pb-6 text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                            Kami menerima peserta didik mulai dari usia <strong>3-4 tahun</strong> untuk kelompok bermain (KB) dan usia <strong>4-6 tahun</strong> untuk jenjang PaudQu/TK.
                        </div>
                    </div>
                </div>

                <div class="border border-gray-200 rounded-lg bg-white overflow-hidden transition-all duration-300" :class="active === 2 ? 'shadow-md border-brand-orange' : 'hover:border-gray-300'">
                    <button @click="active = (active === 2 ? null : 2)" class="w-full px-6 py-5 text-left flex justify-between items-center focus:outline-none">
                        <span class="font-semibold text-gray-800 text-base md:text-lg">Bagaimana jadwal jam masuk dan pulang sekolah?</span>
                        <span class="ml-6 flex-shrink-0 text-brand-orange transition-transform duration-300" :class="active === 2 ? 'rotate-180' : ''">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </span>
                    </button>
                    <div x-show="active === 2" x-collapse x-cloak>
                        <div class="px-6 pb-6 text-gray-600 leading-relaxed border-t border-gray-100 pt-4">
                            Kegiatan belajar dilaksanakan setiap hari <strong>Senin s/d Jumat</strong>. Untuk hari <strong>Senin - Kamis</strong> masuk pukul <strong>08.00 - 11.00 WIB</strong>, sedangkan khusus hari <strong>Jumat</strong> masuk lebih awal pukul <strong>07.30 - 10.30 WIB</strong>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ======================================================== --}}
    {{-- FOOTER --}}
    {{-- ======================================================== --}}
    <footer class="bg-gray-900 text-gray-300 text-sm">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="bg-white rounded-full p-1"><img class="h-8 w-8" src="{{ asset('images/log2.png') }}" alt="Logo"></div>
                        <span class="font-display font-bold text-white text-lg">PaudQu Al-Abbasiyyah</span>
                    </div>
                    <p class="text-gray-400 mb-6 max-w-sm leading-relaxed">
                        Membentuk generasi Qur'an yang cerdas, ceria, dan berakhlak mulia melalui pendidikan usia dini yang berkualitas.
                    </p>
                    <div class="flex space-x-4">
                        <a href="https://www.instagram.com/al_abbasiyyah" class="text-gray-400 hover:text-brand-orange transition"><svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a>
                    </div>
                </div>
                <div>
                    <h3 class="text-white font-bold uppercase tracking-wider mb-4 text-xs">Akses Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="/" class="hover:text-white transition">Beranda</a></li>
                        <li><a href="#informasi" class="hover:text-white transition">Informasi</a></li>
                        <li><a href="#fasilitas" class="hover:text-white transition">Fasilitas</a></li>
                        <li><a href="#faq" class="hover:text-white transition">FAQ</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-bold uppercase tracking-wider mb-4 text-xs">Hubungi Kami</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-start gap-2">
                            <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            <span>Jl. Raya Gn. Putri No.RT.02/11, Bogor, Jawa Barat 16961</span>
                        </li>
                        <li class="flex items-center gap-2">
                             <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                             <a href="mailto:info@paudqu.com" class="hover:text-white">paudqu-alabbasiyyah@gmail.com</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-xs text-gray-500">
                &copy; {{ date('Y') }} PAUDQU Al-Abbasiyyah.
            </div>
        </div>
    </footer>

    {{-- SCRIPTS --}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <script>
        AOS.init({ duration: 800, once: true });
        
        // SCRIPT SLIDER (EFEK GESER SMOOTH 1.5 DETIK)
        const heroSwiper = new Swiper('.hero-slider', { 
            loop: true, 
            speed: 1500, 
            autoplay: { 
                delay: 4000, 
                disableOnInteraction: false, 
            }, 
            pagination: { 
                el: '.swiper-pagination', 
                clickable: true 
            },
        });

        const facilitySwiper = new Swiper('.facility-slider', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            speed: 1000, 
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next-facility',
                prevEl: '.swiper-button-prev-facility',
            },
            breakpoints: {
                640: { slidesPerView: 2, spaceBetween: 20 },
                1024: { slidesPerView: 3, spaceBetween: 30 },
            }
        });
    </script>
</body>
</html>