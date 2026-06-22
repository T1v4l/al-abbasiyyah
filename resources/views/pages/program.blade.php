<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Program Unggulan - PaudQu Al-Abbasiyyah</title>

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
        .font-nunito { font-family: 'Nunito', sans-serif; }

        /* Custom Colors */
        .text-brand-orange { color: #f97316; }
        .bg-brand-orange { background-color: #f97316; }
        .hover\:bg-brand-orange-dark:hover { background-color: #ea580c; }
        .text-brand-orange-dark { color: #c2410c; }
        .text-brand-teal { color: #14b8a6; }
        .bg-brand-teal { background-color: #14b8a6; }
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

                {{-- DESKTOP NAVIGATION --}}
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="/" 
                       class="font-medium text-sm hover:text-brand-orange transition-colors duration-300 relative group"
                       :class="scrolled ? 'text-gray-700' : 'text-white'">
                        Beranda
                        <span class="absolute bottom-[-4px] left-0 w-0 h-0.5 bg-brand-orange transition-all duration-300 group-hover:w-full"></span>
                    </a>

                    <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
                        <button class="font-medium text-sm flex items-center gap-1 hover:text-brand-orange transition-colors duration-300"
                                :class="scrolled ? 'text-gray-700' : 'text-white'">
                            Informasi
                            <svg class="w-4 h-4 transition-transform" :class="open ? 'rotate-180' : ''" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <div x-show="open" x-transition.opacity class="absolute top-full left-0 w-56 bg-white rounded-lg shadow-xl py-2 mt-2 border border-gray-100">
                            <a href="{{ url('/brosur') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-brand-orange">Brosur</a>
                            <a href="{{ url('/persyaratan') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-brand-orange">Persyaratan</a>
                            <a href="{{ url('/prosedur') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-brand-orange">Prosedur Pendaftaran</a>
                            <a href="/#faq" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-brand-orange">Pertanyaan yang Sering Diajukan (FAQ)</a>
                        </div>
                    </div>

                    <div x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false" class="relative">
                        <button class="font-medium text-sm flex items-center gap-1 hover:text-brand-orange transition-colors duration-300"
                                :class="scrolled ? 'text-gray-700' : 'text-white'">
                            Lainnya
                            <svg class="w-4 h-4 transition-transform" :class="open ? 'rotate-180' : ''" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                        <div x-show="open" x-transition.opacity class="absolute top-full right-0 w-48 bg-white rounded-lg shadow-xl py-2 mt-2 border border-gray-100">
                            <a href="{{ route('program.index') }}" class="block px-4 py-2 text-sm text-orange-600 hover:bg-orange-50 hover:text-brand-orange font-bold bg-gray-50">Program</a>
                            <a href="/cara-pembayaran" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-brand-orange">Cara Pembayaran</a>
                            <a href="{{ url('/biaya') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-brand-orange">Biaya Pendaftaran</a>
                        </div>
                    </div>

                    <a href="{{ route('login') }}" class="px-5 py-2.5 rounded-full font-semibold text-sm transition-all shadow-md transform hover:scale-105"
                       :class="scrolled ? 'bg-brand-orange text-white hover:bg-brand-orange-dark' : 'bg-white text-brand-orange hover:bg-gray-100'">
                        Login
                    </a>
                </nav>

                {{-- MOBILE MENU BUTTON --}}
                <div class="md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="p-2 rounded-md transition-colors" :class="scrolled ? 'text-gray-800' : 'text-white'">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- MOBILE MENU CONTENT --}}
            <div x-show="mobileMenuOpen" 
                 x-collapse 
                 class="md:hidden bg-white rounded-b-xl shadow-lg border-t absolute left-0 right-0 top-full overflow-hidden">
                <div class="flex flex-col py-2">
                    <a href="/" class="px-6 py-3 text-gray-700 font-medium hover:bg-gray-50 border-b border-gray-100">Beranda</a>
                    <div x-data="{ subOpen: false }" class="border-b border-gray-100">
                        <button @click="subOpen = !subOpen" class="w-full flex justify-between items-center px-6 py-3 text-gray-700 font-medium hover:bg-gray-50 bg-white">
                            <span>Informasi</span>
                            <svg class="w-4 h-4 transition-transform text-gray-500" :class="subOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="subOpen" x-collapse class="bg-gray-50">
                            <a href="/#faq" class="block pl-10 pr-4 py-2 text-sm text-gray-600 hover:text-brand-orange">FAQ</a>
                            <a href="{{ url('/prosedur') }}" class="block pl-10 pr-4 py-2 text-sm text-gray-600 hover:text-brand-orange">Prosedur Pendaftaran</a>
                            <a href="{{ url('/persyaratan') }}" class="block pl-10 pr-4 py-2 text-sm text-gray-600 hover:text-brand-orange">Persyaratan</a>
                            <a href="{{ url('/brosur') }}" class="block pl-10 pr-4 py-2 text-sm text-gray-600 hover:text-brand-orange">Brosur</a>
                        </div>
                    </div>
                    <div x-data="{ subOpen: false }" class="border-b border-gray-100">
                        <button @click="subOpen = !subOpen" class="w-full flex justify-between items-center px-6 py-3 text-gray-700 font-medium hover:bg-gray-50 bg-white">
                            <span>Lainnya</span>
                            <svg class="w-4 h-4 transition-transform text-gray-500" :class="subOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="subOpen" x-collapse class="bg-gray-50">
                            <a href="{{ route('program.index') }}" class="block pl-10 pr-4 py-2 text-sm text-brand-orange font-bold bg-orange-50">Program</a>
                            <a href="/cara-pembayaran" class="block pl-10 pr-4 py-2 text-sm text-gray-600 hover:text-brand-orange">Cara Pembayaran</a>
                            <a href="{{ url('/biaya') }}" class="block pl-10 pr-4 py-2 text-sm text-gray-600 hover:text-brand-orange">Biaya</a>
                        </div>
                    </div>
                    <div class="p-4">
                        <a href="{{ route('login') }}" class="block w-full text-center bg-brand-orange text-white font-bold py-3 rounded-lg hover:bg-brand-orange-dark transition">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- ======================================================== --}}
    {{-- MAIN CONTENT --}}
    {{-- ======================================================== --}}
    <main>
        
        {{-- HERO HEADER PROGRAM (REVISI: FONT DIBESARKAN LAGI) --}}
        <section class="relative w-full h-[450px] md:h-[400px] flex items-center justify-center bg-cover bg-center bg-no-repeat bg-fixed"
                 style="background-image: url('{{ asset('images/imgtkk.jpg') }}');">
            
            {{-- Overlay Gelap --}}
            <div class="absolute inset-0 bg-black/60"></div>
            
            {{-- Konten Text (Posisi Tengah & Ukuran Font Besar) --}}
            <div class="relative z-10 text-center px-4 pt-10">
                
                {{-- JUDUL: Diperbesar (text-3xl md:text-5xl) --}}
                <h1 class="font-display text-xl md:text-3xl font-bold text-white mb-4 tracking-wide" data-aos="fade-up">
                    Program Pendidikan Unggulan
                </h1>
                
                {{-- SUBJUDUL: Diperbesar (text-sm md:text-xl) --}}
                <p class="text-white/90 text-sm md:text-xl max-w-2xl mx-auto font-light leading-relaxed" data-aos="fade-up" data-aos-delay="100">
                    Merancang masa depan buah hati dengan kurikulum terbaik yang memadukan ilmu agama dan pengetahuan umum.
                </p>
            </div>
            
            {{-- Decoration Bottom --}}
            <div class="absolute bottom-0 left-0 right-0 h-10 bg-gray-50 rounded-t-[40px]"></div>
        </section>

        {{-- DAFTAR PROGRAM --}}
        <section class="py-10 bg-gray-50">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
        
        @forelse($program as $item)
            {{-- PROGRAM ITEM --}}
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col md:flex-row hover:shadow-lg transition-all duration-300 group" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                
                {{-- Bagian Gambar & Badge --}}
                <div class="md:w-4/12 h-48 md:h-auto relative overflow-hidden">
                    <img src="{{ asset('images_program/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-110">
                    <div class="absolute top-3 left-3 bg-brand-orange text-white text-[10px] font-bold px-2 py-1 rounded shadow-md z-10 uppercase">
                        {{ $item->category }}
                    </div>
                </div>
                
                {{-- Bagian Teks & Highlight --}}
                <div class="md:w-8/12 p-5 md:p-6 flex flex-col justify-center">
                    <h3 class="font-display text-lg md:text-xl font-bold text-gray-800 mb-2 group-hover:text-brand-orange transition-colors">
                        {{ $item->title }}
                    </h3>
                    
                    <p class="text-gray-600 mb-3 text-xs md:text-sm leading-relaxed">
                        {{ $item->description }}
                    </p>
                    
                    {{-- Highlight --}}
                    <div class="flex flex-wrap gap-3 text-[10px] md:text-xs text-gray-500 font-medium border-t border-gray-100 pt-3">
                        @if($item->highlight_1)
                            <span class="flex items-center gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-brand-orange"></span> {{ $item->highlight_1 }}
                            </span>
                        @endif

                        @if($item->highlight_2)
                            <span class="flex items-center gap-1">
                                <span class="w-1.5 h-1.5 rounded-full bg-brand-orange"></span> {{ $item->highlight_2 }}
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            
        @empty
            {{-- Tampilan jika data masih kosong --}}
            <div class="text-center py-10 bg-white rounded-xl border border-dashed border-gray-300 text-gray-500">
                <p class="font-bold">Belum ada program yang ditambahkan.</p>
            </div>
        @endforelse

    </div>
</section>
        {{-- Section CTA --}}
        <section class="bg-gray-50 pb-16"> 
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-gradient-to-r from-brand-orange to-amber-500 rounded-xl p-6 md:p-8 text-center shadow-lg" data-aos="zoom-in-up"> 
                    <h2 class="font-display text-lg md:text-xl font-bold text-white">Siap Menjadi Bagian dari Kami?</h2>
                    <p class="mt-2 text-xs md:text-sm text-orange-100 max-w-xl mx-auto">Berikan pondasi pendidikan terbaik untuk masa depan ananda.</p>
                    <a href="{{ route('register') }}" class="mt-5 inline-block bg-white text-brand-orange-dark font-bold text-xs md:text-sm px-6 py-2.5 rounded-lg shadow-sm hover:bg-gray-100 hover:scale-105 transform transition">Daftar Sekarang</a>
                </div>
            </div>
        </section>
    </main>

    {{-- FOOTER DISEDERHANAKAN --}}
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