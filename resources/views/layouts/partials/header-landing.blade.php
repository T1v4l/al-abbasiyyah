<header class="bg-white/80 backdrop-blur-md shadow-sm fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <a href="/" class="flex-shrink-0 flex items-center gap-3">
                <img class="h-12 w-auto" src="{{ asset('images/log2.png') }}" alt="Logo PAUDQU Al-Abbasiyyah">
                <span class="font-display font-bold text-xl text-brand-gray hidden sm:block">PaudQu Al-Abbasiyyah</span>
            </a>
            
            <nav class="hidden md:flex items-baseline space-x-8">
                <a href="/#beranda" class="font-semibold text-brand-gray hover:text-brand-teal transition">Beranda</a>
                <a href="/#keunggulan" class="font-semibold text-brand-gray hover:text-brand-teal transition">Keunggulan</a>
                <a href="/#galeri" class="font-semibold text-brand-gray hover:text-brand-teal transition">Galeri</a>
                <a href="/#testimoni" class="font-semibold text-brand-gray hover:text-brand-teal transition">Testimoni</a>
                <a href="/#faq" class="font-semibold text-brand-gray hover:text-brand-teal transition">FAQ</a>
            </nav>

            <div class="flex items-center gap-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('dashboard') }}" class="font-semibold px-5 py-2 bg-brand-teal text-white rounded-full shadow-md hover:bg-brand-teal-dark transition">Dashboard</a>
                    @else
                        <div class="relative">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                     <button class="inline-flex items-center px-5 py-2 bg-brand-orange border border-transparent rounded-full font-semibold text-xs text-white uppercase tracking-widest hover:bg-brand-orange-dark focus:outline-none transition">Masuk / Daftar</button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('login')">{{ __('Login') }}</x-dropdown-link>
                                    @if (Route::has('register'))
                                        <x-dropdown-link :href="route('register')">{{ __('Daftar') }}</x-dropdown-link>
                                    @endif
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @endauth
                @endif
            </div>
        </div>
    </div>
</header>