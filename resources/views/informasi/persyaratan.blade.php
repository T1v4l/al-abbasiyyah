<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Persyaratan Pendaftaran - PaudQu Al-Abbasiyyah</title>

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
                            <a href="{{ url('/persyaratan') }}" class="block px-4 py-2 text-sm text-orange-600 font-bold bg-orange-50">Persyaratan</a>
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
                            <a href="{{ url('/persyaratan') }}" class="block pl-10 pr-4 py-2 text-sm text-orange-600 font-bold bg-orange-50">Persyaratan</a>
                            <a href="{{ url('/brosur') }}" class="block pl-10 pr-4 py-2 text-sm text-gray-600 hover:text-orange-600">Brosur</a>
                        </div>
                    </div>
                    <div x-data="{ subOpen: false }" class="border-b border-gray-100">
                        <button @click="subOpen = !subOpen" class="w-full flex justify-between items-center px-6 py-3 text-gray-700 font-medium hover:bg-gray-50 bg-white">
                            <span>Lainnya</span>
                            <svg class="w-4 h-4 transition-transform text-gray-500" :class="subOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="subOpen" x-collapse class="bg-gray-50">
                            <a href="{{ route('program.index') }}" class="block pl-10 pr-4 py-2 text-sm text-gray-600 hover:text-orange-600">Program</a>
                            <a href="/cara-pembayaran" class="block pl-10 pr-4 py-2 text-sm text-gray-600 hover:text-orange-600">Cara Pembayaran</a>
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
    <section class="relative w-full h-[450px] md:h-[500px] flex items-center justify-center bg-cover bg-center bg-no-repeat bg-fixed"
             style="background-image: url('{{ asset('images/imgtkk.jpg') }}');">
        <div class="absolute inset-0 bg-black/60"></div>
        <div class="relative z-10 text-center px-4 pt-10">
            <span class="inline-block py-1 px-3 rounded-full bg-white/20 backdrop-blur-sm border border-white/30 text-white text-xs font-semibold mb-4 tracking-wider uppercase" data-aos="fade-down">
                Informasi Pendaftaran
            </span>
            <h1 class="font-display text-3xl md:text-3xl font-bold text-white mb-4 tracking-wide" data-aos="fade-up">
                Persyaratan Pendaftaran
            </h1>
            <p class="text-white/90 text-sm md:text-xl max-w-2xl mx-auto font-light leading-relaxed" data-aos="fade-up" data-aos-delay="100">
            Ketentuan umum dan dokumen yang perlu dipersiapkan untuk mendaftar di PAUDQu Al-Abbasiyyah.
            </p>
        </div>
        {{-- Lengkungan Putih --}}
        <div class="absolute bottom-0 left-0 right-0 h-10 bg-white rounded-t-[40px]"></div>
    </section>

    <main>
        
        {{-- ======================================================== --}}
        {{-- BAGIAN 1: SYARAT CALON SISWA --}}
        {{-- ======================================================== --}}
        <section class="pt-16 pb-0 bg-white relative z-10">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mb-16">
                
                {{-- Judul --}}
                <div class="text-center mb-12" data-aos="fade-up">
                    <h2 class="font-display text-2xl md:text-3xl font-bold text-gray-800">Syarat Calon Murid</h2>
                    <div class="w-16 h-1 bg-orange-500 mx-auto mt-3 rounded-full"></div>
                </div>

                {{-- List Container --}}
                <div class="space-y-4">
                    <div class="group flex items-center bg-white border border-gray-100 p-5 md:p-6 rounded-2xl shadow-sm hover:shadow-md hover:border-orange-200 transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                        <div class="flex-shrink-0 w-14 h-14 bg-orange-50 text-orange-500 rounded-xl flex items-center justify-center group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div class="ml-5">
                            <h4 class="text-lg font-bold text-gray-800 group-hover:text-orange-600 transition-colors">Kriteria Usia</h4>
                            <p class="text-sm text-gray-500 mt-1">Usia calon murid <strong>Kelas A</strong> (Minimal 4 tahun) dan <strong>Kelas B</strong> (Minimal 5 tahun).</p>
                        </div>
                    </div>

                    <div class="group flex items-center bg-white border border-gray-100 p-5 md:p-6 rounded-2xl shadow-sm hover:shadow-md hover:border-teal-200 transition-all duration-300" data-aos="fade-up" data-aos-delay="200">
                        <div class="flex-shrink-0 w-14 h-14 bg-teal-50 text-teal-500 rounded-xl flex items-center justify-center group-hover:bg-teal-500 group-hover:text-white transition-colors duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                        </div>
                        <div class="ml-5">
                            <h4 class="text-lg font-bold text-gray-800 group-hover:text-teal-600 transition-colors">Kondisi Anak</h4>
                            <p class="text-sm text-gray-500 mt-1">Sehat jasmani & rohani.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- PEMBATAS GELOMBANG (WAVE) --}}
            <div class="relative w-full overflow-hidden leading-[0] -mb-1">
                <svg class="relative block w-[calc(100%+1.3px)] h-[50px] md:h-[70px]" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z" class="fill-gray-50"></path> 
                </svg>
            </div>
        </section>

        {{-- ======================================================== --}}
        {{-- BAGIAN 2: BERKAS DOKUMEN (TANPA BIAYA) --}}
        {{-- ======================================================== --}}
        <section class="pb-20 pt-10 bg-gray-50">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="text-center mb-10" data-aos="fade-up">
                    <h2 class="font-display text-2xl md:text-3xl font-bold text-gray-800">Berkas Dokumen Pendaftaran</h2>
                    <div class="w-16 h-1 bg-brand-teal mx-auto mt-3 rounded-full"></div>
                    {{-- <p class="mt-4 text-gray-600">Mohon lengkapi dan serahkan dokumen berikut saat pendaftaran ulang.</p> --}}
                </div>

                <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                    <div class="bg-brand-teal p-5">
                        <h3 class="font-bold text-white text-xl text-center">Daftar Persyaratan</h3>
                    </div>
                    
                    <div class="p-6 md:p-8">
                        <ul class="space-y-4">
                            <li class="flex items-center gap-4 bg-gray-50 hover:bg-teal-50 p-4 rounded-xl border border-gray-100 transition">
                                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-sm text-brand-orange font-bold">1</div>
                                <span class="text-gray-700 font-medium text-lg">Formulir Pendaftaran Sistem Penerimaan Murid Baru (SPMB) sebesar Rp.50.000,-</span>
                            </li>
                            <li class="flex items-center gap-4 bg-gray-50 hover:bg-teal-50 p-4 rounded-xl border border-gray-100 transition">
                                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-sm text-brand-orange font-bold">2</div>
                                <span class="text-gray-700 font-medium text-lg">Fotocopy Akta Kelahiran <span class="text-brand-orange font-bold ml-1">(1 Lembar)</span></span>
                            </li>
                            <li class="flex items-center gap-4 bg-gray-50 hover:bg-teal-50 p-4 rounded-xl border border-gray-100 transition">
                                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-sm text-brand-orange font-bold">3</div>
                                <span class="text-gray-700 font-medium text-lg">Fotocopy Kartu Keluarga / KK <span class="text-brand-orange font-bold ml-1">(1 Lembar)</span></span>
                            </li>
                            <li class="flex items-center gap-4 bg-gray-50 hover:bg-teal-50 p-4 rounded-xl border border-gray-100 transition">
                                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-sm text-brand-orange font-bold">4</div>
                                <span class="text-gray-700 font-medium text-lg">Formulir pendaftaran dikembalikan paling lambat tanggal 06 April 2026 beserta biaya SPMB sebesar Rp.1.000.000,- (sebaiknya anak/calon murid turut serta). Jika penyerahan formulir di luar batas waktu yang
                                    ditetapkan, akan dianggap telah mengundurkan diri.<span class="text-brand-orange font-bold ml-1">  </span></span>
                            </li>
                            <li class="flex items-center gap-4 bg-gray-50 hover:bg-teal-50 p-4 rounded-xl border border-gray-100 transition">
                                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-sm text-brand-orange font-bold">5</div>
                                <span class="text-gray-700 font-medium text-lg">Penyelesaian / pelunasan Administrasi SPMB paling lambat tanggal<span class="text-brand-orange font-bold ml-1">05 Juni 2026.</span></span>
                            </li>
                        </ul>

                        {{-- Info Map Pemberkasan --}}
                        <div class="mt-8 bg-blue-50 border border-blue-200 rounded-xl p-5 md:p-6 flex flex-col sm:flex-row items-center sm:items-start gap-4">
                            <div class="bg-blue-100 p-3 rounded-full shrink-0">
                                <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path></svg>
                            </div>
                            <div class="text-center sm:text-left">
                                <h4 class="font-bold text-blue-900 text-lg">Informasi.</h4>
                                <p class="text-blue-800 mt-2">Bagi calon murid atau santri yang mengundurkan diri setelah mendaftar, biaya SPMB tidak dapat dikembalikan.</p>
                                <div class="flex flex-col sm:flex-row gap-4 mt-3 justify-center sm:justify-start">
                                    <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-lg shadow-sm border border-blue-100">
                                        <div class="w-4 h-4 bg-red-500 rounded-full"></div>
                                        {{-- <span class="font-semibold text-gray-700">Merah (Laki-laki)</span> --}}
                                    </div>
                                    <div class="flex items-center gap-2 bg-white px-4 py-2 rounded-lg shadow-sm border border-blue-100">
                                        <div class="w-4 h-4 bg-yellow-400 rounded-full"></div>
                                        <div class="w-4 h-4 bg-blue-500 rounded-full -ml-4 border border-white"></div>
                                        {{-- <span class="font-semibold text-gray-700">Kuning / Biru (Perempuan)</span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>

    </main>

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