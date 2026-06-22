@php
    // LOGIKA WARNA SIDEBAR & TEKS
    $sidebarClass = '';
    $brandText = '';
    $menuText = ''; 
    $subMenuText = ''; 
    
    if (Auth::user()->role == 'admin') {
        $sidebarClass = 'bg-slate-900 text-white border-slate-800 shadow-xl';
        $brandText = 'text-white';
        $menuText = 'text-gray-100 hover:text-amber-400';
        $subMenuText = 'text-slate-500'; 
    } elseif (Auth::user()->role == 'guru') {
        $sidebarClass = 'bg-indigo-900 text-white border-indigo-950 shadow-lg';
        $brandText = 'text-white';
        $menuText = 'text-indigo-50 hover:text-yellow-400';
        $subMenuText = 'text-indigo-400';
    } else {
        $sidebarClass = 'bg-white text-slate-900 border-gray-100 shadow-sm';
        $brandText = 'text-slate-900';
        $menuText = 'text-slate-800 hover:text-yellow-500'; 
        $subMenuText = 'text-slate-400';
    }
@endphp

<nav x-data="{ open: false }" class="border-b lg:border-r lg:border-b-0 lg:fixed lg:w-64 lg:h-screen lg:flex lg:flex-col justify-between {{ $sidebarClass }} z-50 transition-all duration-300">
    <div class="w-full">
        {{-- HEADER SIDEBAR --}}
        <div class="flex items-center justify-between h-20 px-4 lg:px-6 {{ $sidebarClass }}">
            <a href="/" class="flex items-center flex-nowrap gap-3 min-w-0 flex-1">
                {{-- Logo Standar --}}
                <img class="h-10 w-10 object-contain bg-white rounded-xl p-1.5 shadow-sm flex-shrink-0" src="{{ asset('images/log2.png') }}" alt="Logo">
                
                <div class="flex flex-col min-w-0">
                    {{-- Nama: text-base di HP agar tidak meluber --}}
                    <span class="font-display font-black text-base lg:text-lg tracking-tighter whitespace-nowrap overflow-hidden truncate {{ $brandText }}">
                        AL-ABBASIYYAH
                    </span>
                    
                    <div class="flex items-center">
                        {{-- Label Role Responsif --}}
                        <span class="text-[9px] w-fit px-2 py-0.5 rounded-full font-bold uppercase tracking-widest border leading-none mt-0.5
                            {{ Auth::user()->role == 'admin' ? 'bg-amber-400/20 text-amber-400 border-amber-400/30' : '' }}
                            {{ Auth::user()->role == 'guru' ? 'bg-emerald-400/20 text-emerald-400 border-emerald-400/30' : '' }}
                            {{ Auth::user()->role == 'user' ? 'bg-teal-500/10 text-teal-600 border-teal-500/20' : '' }}">
                            @if(Auth::user()->role == 'admin') Administrator @elseif(Auth::user()->role == 'guru') Tenaga Pendidik @else Wali Murid @endif
                        </span>
                    </div>
                </div>
            </a>
            
            {{-- Hamburger Mobile --}}
            <div class="flex items-center lg:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl focus:outline-none transition-all {{ Auth::user()->role != 'user' ? 'text-white hover:bg-white/10' : 'text-slate-500 hover:bg-gray-100' }}">
                    <svg class="h-7 w-7" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- MENU DESKTOP --}}
        <div class="hidden lg:block mt-6 px-4 space-y-2">
            <style>
                .nav-custom-links a { color: inherit !important; }
                .nav-custom-links .active-link { 
                    color: #ffffff !important; 
                    background-color: #10b981 !important; 
                    border-radius: 0.75rem;
                } 
            </style>
            <div class="nav-custom-links {{ $menuText }}">
                @include('layouts.partials.sidebar-links')
            </div>
        </div>
    </div>

    {{-- MENU MOBILE --}}
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="lg:hidden border-t w-full absolute top-20 left-0 shadow-2xl z-40 {{ $sidebarClass }}">
        <div class="pt-2 pb-3 space-y-1 px-4 nav-custom-links {{ $menuText }}">
            @include('layouts.partials.sidebar-links')
        </div>
        
        <div class="pt-4 pb-4 border-t {{ Auth::user()->role != 'user' ? 'border-white/10' : 'border-gray-100' }}">
            <div class="px-4">
                <div class="font-bold text-sm {{ Auth::user()->role != 'user' ? 'text-white' : 'text-slate-900' }}">
                    {{ Auth::user()->name }}
                </div>
                <div class="font-medium text-[10px] uppercase tracking-widest {{ Auth::user()->role != 'user' ? 'text-gray-400' : 'text-slate-500' }}">
                    {{ Auth::user()->email }}
                </div>
            </div>
        </div>
    </div>
</nav>