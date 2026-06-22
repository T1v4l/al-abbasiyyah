<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Brosur Pendaftaran - PaudQu Al-Abbasiyyah</title>

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
                            <a href="{{ route('brosur') }}" class="block px-4 py-2 text-sm text-orange-600 font-bold bg-orange-50">Brosur</a>
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
                            <a href="{{ url('/cara-pembayaran') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-600">Cara Pembayaran</a>
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
                    <div x-data="{ subOpen: true }" class="border-b border-gray-100">
                        <button @click="subOpen = !subOpen" class="w-full flex justify-between items-center px-6 py-3 text-gray-700 font-medium hover:bg-gray-50 bg-white">
                            <span>Informasi</span>
                            <svg class="w-4 h-4 transition-transform text-gray-500" :class="subOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="subOpen" x-collapse class="bg-gray-50">
                            <a href="{{ route('brosur') }}" class="block pl-10 pr-4 py-2 text-sm text-orange-600 font-bold bg-orange-50">Brosur</a>
                            <a href="/#faq" class="block pl-10 pr-4 py-2 text-sm text-gray-600 hover:text-orange-600">FAQ</a>
                            <a href="{{ url('/prosedur') }}" class="block pl-10 pr-4 py-2 text-sm text-gray-600 hover:text-orange-600">Prosedur Pendaftaran</a>
                            <a href="{{ url('/persyaratan') }}" class="block pl-10 pr-4 py-2 text-sm text-gray-600 hover:text-orange-600">Persyaratan</a>
                        </div>
                    </div>

                    {{-- Dropdown Lainnya --}}
                    <div x-data="{ subOpen: false }" class="border-b border-gray-100">
                        <button @click="subOpen = !subOpen" class="w-full flex justify-between items-center px-6 py-3 text-gray-700 font-medium hover:bg-gray-50 bg-white">
                            <span>Lainnya</span>
                            <svg class="w-4 h-4 transition-transform text-gray-500" :class="subOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div x-show="subOpen" x-collapse class="bg-gray-50">
                            <a href="{{ route('program.index') }}" class="block pl-10 pr-4 py-2 text-sm text-gray-600 hover:text-orange-600">Program</a>
                            <a href="{{ url('/cara-pembayaran') }}" class="block pl-10 pr-4 py-2 text-sm text-gray-600 hover:text-orange-600">Cara Pembayaran</a>
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
    <section class="relative w-full h-[450px] flex items-center justify-center bg-cover bg-center bg-no-repeat bg-fixed"
             style="background-image: url('{{ asset('images/imgtkk.jpg') }}');">
        
        {{-- Overlay Gelap --}}
        <div class="absolute inset-0 bg-black/60"></div>
        
        {{-- Konten Hero --}}
        <div class="relative z-10 text-center px-4 -mt-10">
            <span class="inline-block py-1 px-3 rounded-full bg-white/20 backdrop-blur-sm border border-white/30 text-white text-xs font-semibold mb-4 tracking-wider uppercase" data-aos="fade-down">
                Dokumen Resmi
            </span>
            <h1 class="font-display text-3xl md:text-3xl font-bold text-white mb-4 tracking-wide" data-aos="fade-up">
                Brosur Pendaftaran
            </h1>
            <p class="text-white/90 text-sm md:text-lg max-w-2xl mx-auto font-light leading-relaxed" data-aos="fade-up" data-aos-delay="100">
                Pelajari lebih lengkap tentang program unggulan, visi misi, dan fasilitas PAUDQu Al-Abbasiyyah.
            </p>
        </div>
    </section>

    {{-- ======================================================== --}}
    {{-- CONTENT UTAMA --}}
    {{-- ======================================================== --}}
    <main class="flex-grow bg-white relative z-20 -mt-16 rounded-t-[40px] md:rounded-t-[50px] pt-12 pb-20 shadow-[0_-10px_40px_rgba(0,0,0,0.1)]"> 
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            @forelse($brosur as $item)
    <div class="flex flex-col lg:flex-row gap-10 items-center lg:items-start mb-16">
        
        {{-- KIRI: PREVIEW GAMBAR BROSUR (Bisa di-klik layar penuh) --}}
        <div class="w-full lg:w-1/2" data-aos="fade-right">
            {{-- href diarahkan ke gambar asli agar bisa zoom --}}
            <a href="{{ asset('images_brosur/' . $item->image) }}" target="_blank" class="relative group block rounded-2xl overflow-hidden shadow-2xl border-4 border-white bg-gray-100 cursor-pointer">
                <img src="{{ asset('images_brosur/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-auto object-cover transform group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center backdrop-blur-sm">
                    <span class="bg-white text-gray-800 font-bold py-2 px-6 rounded-full shadow-lg">
                        Klik untuk Layar Penuh
                    </span>
                </div>
            </a>
        </div>

        {{-- KANAN: KONTEN --}}
        <div class="w-full lg:w-1/2 flex flex-col justify-center" data-aos="fade-left" data-aos-delay="100">
            <h2 class="font-display text-2xl md:text-3xl font-bold text-gray-800 mb-4">{{ $item->title }}</h2>
            <p class="text-gray-600 mb-6 leading-relaxed">
                {{ $item->description }}
            </p>

            {{-- Cek apakah ada data list yang diisi sebelum menampilkan kotak orange --}}
            @if($item->list_title || $item->list_1 || $item->list_2 || $item->list_3 || $item->list_4)
                <div class="bg-orange-50 border border-orange-100 rounded-xl p-5">
                    
                    @if($item->list_title)
                        <h3 class="font-bold text-orange-800 mb-3 text-sm">{{ $item->list_title }}</h3>
                    @endif
                    
                    <ul class="space-y-3 text-sm text-gray-700">
                        @if($item->list_1)
                            <li class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                {{ $item->list_1 }}
                            </li>
                        @endif

                        @if($item->list_2)
                            <li class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                {{ $item->list_2 }}
                            </li>
                        @endif

                        @if($item->list_3)
                            <li class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                {{ $item->list_3 }}
                            </li>
                        @endif

                        @if($item->list_4)
                            <li class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                {{ $item->list_4 }}
                            </li>
                        @endif
                    </ul>
                </div>
            @endif
        </div> 

    </div>
@empty
    {{-- Jika belum ada brosur di database --}}
    <div class="text-center py-10">
        <p class="text-gray-500 font-medium">Brosur informasi belum tersedia.</p>
    </div>
@endforelse

            {{-- Info Box Tambahan --}}
            <div class="bg-teal-50 border border-teal-100 rounded-xl p-6 md:p-8 flex flex-col md:flex-row items-center gap-4 md:gap-6" data-aos="fade-up">
                <div class="bg-teal-100 p-4 rounded-full text-teal-600 flex-shrink-0">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                </div>
                <div class="flex-grow text-center md:text-left">
                    <h4 class="font-bold text-gray-800 text-lg mb-1">Ada Pertanyaan?</h4>
                    <p class="text-sm text-gray-600">
                        Jika Anda membutuhkan informasi lebih lanjut setelah membaca brosur, jangan ragu untuk ngobrol dengan admin kami.
                    </p>
                </div>
                <div>
                    {{-- Tombol ini sekarang memicu pop-up chat --}}
                <button onclick="Tawk_API.toggle()" class="inline-block px-6 py-3 bg-teal-600 text-white font-bold rounded-full 
                hover:bg-teal-700 transition shadow hover:shadow-lg whitespace-nowrap 
                cursor-pointer">Live Chat Admin</button>
                </div>
            </div>

        </div>
    </main>

    {{-- ======================================================== --}}
    {{-- FITUR LIVE CHAT POP-UP (ALPINE.JS) --}}
    {{-- ======================================================== --}}
    {{-- <div x-data="{
            chatBoxOpen: false,
            newMessage: '',
            isTyping: false,
            messages: [
                { role: 'bot', text: 'Assalamu\'alaikum Ayah/Bunda! Ada yang bisa kami bantu seputar pendaftaran di PAUDQu Al-Abbasiyyah?' }
            ],
            scrollToBottom() {
                setTimeout(() => {
                    let container = document.getElementById('chat-messages-container');
                    if(container) container.scrollTop = container.scrollHeight;
                }, 50);
            },
            sendMessage() {
                if(this.newMessage.trim() === '') return;
                
                // Masukkan pesan user
                this.messages.push({ role: 'user', text: this.newMessage });
                this.newMessage = '';
                this.scrollToBottom();
                
                // Efek bot sedang mengetik
                this.isTyping = true;
                
                // Balasan otomatis dari bot setelah 1.5 detik
                setTimeout(() => {
                    this.isTyping = false;
                    this.messages.push({ 
                        role: 'bot', 
                        text: 'Baik Ayah/Bunda, pesan telah kami terima. Silakan tunggu sebentar, sistem sedang menghubungi Admin/Owner kami secara langsung...' 
                    });
                    this.scrollToBottom();
                }, 1500);
            }
        }" 
        @open-chat.window="chatBoxOpen = true"
        class="fixed bottom-0 right-0 z-[100] m-4 sm:m-6 font-sans">
        
        {{-- Tombol Bulat Melayang (Floating Action Button) --}}
        <button x-show="!chatBoxOpen" @click="chatBoxOpen = true" class="bg-teal-600 hover:bg-teal-700 text-white p-4 rounded-full shadow-2xl transform hover:scale-110 transition-all flex items-center justify-center">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
        </button>

        {{-- Kotak Chat --}}
        <div x-show="chatBoxOpen" x-transition.opacity.scale.origin.bottom.right class="bg-white w-[90vw] sm:w-[350px] rounded-2xl shadow-2xl border border-gray-200 overflow-hidden flex flex-col mb-2 origin-bottom-right" style="display: none;">
            
            {{-- Header Chat --}}
            <div class="bg-teal-600 text-white p-4 flex justify-between items-center shadow-md z-10">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('images/log1.png') }}" alt="Logo" class="w-6 h-6 object-contain">
                    </div>
                    <div>
                        <h4 class="font-bold text-sm">Admin PAUDQu</h4>
                        <p class="text-[10px] text-teal-100 flex items-center gap-1">
                            <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span> Online
                        </p>
                    </div>
                </div>
                <button @click="chatBoxOpen = false" class="text-teal-100 hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>

            {{-- Area Pesan --}}
            <div id="chat-messages-container" class="h-80 bg-gray-50 p-4 overflow-y-auto flex flex-col gap-3">
                <template x-for="(msg, index) in messages" :key="index">
                    <div :class="msg.role === 'bot' ? 'self-start' : 'self-end'" class="max-w-[85%]">
                        <div :class="msg.role === 'bot' ? 'bg-white text-gray-700 border border-gray-200 rounded-br-2xl' : 'bg-teal-600 text-white rounded-bl-2xl'" class="p-3 rounded-t-2xl text-sm shadow-sm">
                            <span x-text="msg.text"></span>
                        </div>
                        <div :class="msg.role === 'bot' ? 'text-left' : 'text-right'" class="text-[10px] text-gray-400 mt-1">
                            <span x-text="msg.role === 'bot' ? 'Bot Sistem' : 'Anda'"></span>
                        </div>
                    </div>
                </template>

                {{-- Indikator Typing --}}
                <div x-show="isTyping" class="self-start bg-white border border-gray-200 p-3 rounded-2xl rounded-bl-none shadow-sm flex items-center gap-1">
                    <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce"></span>
                    <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></span>
                    <span class="w-2 h-2 bg-gray-400 rounded-full animate-bounce" style="animation-delay: 0.4s"></span>
                </div>
            </div>

            {{-- Form Input --}}
            <form @submit.prevent="sendMessage" class="p-3 bg-white border-t border-gray-100 flex gap-2">
                <input x-model="newMessage" type="text" placeholder="Ketik pesan Anda..." class="flex-grow bg-gray-50 border border-gray-200 rounded-full px-4 py-2 text-sm focus:outline-none focus:border-teal-500 focus:ring-1 focus:ring-teal-500 transition-all">
                <button type="submit" class="bg-teal-600 text-white p-2 rounded-full hover:bg-teal-700 transition-colors flex-shrink-0 disabled:opacity-50" :disabled="newMessage.trim() === ''">
                    <svg class="w-5 h-5 ml-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                </button>
            </form>
        </div>
    {{-- </div> --}}
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];

s1.async=true;
s1.src='https://embed.tawk.to/69b174e68035e41c3b44f112/1jjej19ie';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');

s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

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