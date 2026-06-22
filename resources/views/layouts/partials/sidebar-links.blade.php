@php 
    $role = Auth::user()->role; 
    $notifPembayaran = 0;
    
    if ($role == 'admin') {
        // Hitung semua yang statusnya bukan 'Lunas' dan bukan 'Belum Bayar'
        $notifPembayaran = \App\Models\CalonSiswa::whereIn('status_pembayaran', [
            'Menunggu Konfirmasi', 
            'Proses Verifikasi'
        ])->count();
    }
@endphp

{{-- WRAPPER UTAMA: Memisahkan area scroll dan area sticky bawah --}}
<div class="flex flex-col justify-between h-full">

    {{-- =============================================== --}}
    {{-- AREA SCROLLABLE (MENU UTAMA) --}}
    {{-- =============================================== --}}
    <div class="overflow-y-auto pr-2 pb-4" style="max-height: calc(100vh - 220px);">
        
        {{-- Menu untuk ORANG TUA (USER) --}}
        @if($role == 'user' || $role == 'parent')
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                Dashboard
            </x-nav-link>

            {{-- Logika Cerdas: Tampilkan 'Formulir' jika belum mendaftar, atau 'Pembayaran' jika sudah --}}
            @if(!Auth::user()->calonSiswa)
                <x-nav-link :href="route('pendaftaran.form')" :active="request()->routeIs('pendaftaran.form')">
                    Formulir Pendaftaran
                </x-nav-link>
            @else
                <x-nav-link :href="route('pembayaran.index')" :active="request()->routeIs('pembayaran.index')">
                    Pembayaran
                </x-nav-link>
            @endif
        @endif

        {{-- Menu untuk GURU --}}
        @if($role == 'guru')
            <x-nav-link :href="route('guru.dashboard')" :active="request()->routeIs('guru.*')" :dark="true">
                Portal Guru
            </x-nav-link>
        @endif

        {{-- Menu untuk ADMIN --}}
        @if($role == 'admin')
            <h3 class="px-3 mt-4 mb-1 text-xs font-semibold text-gray-400 uppercase tracking-wider">Data Master</h3>
            <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" :dark="true">
                Dashboard Admin
            </x-nav-link>
            <x-nav-link :href="route('admin.siswa.index')" :active="request()->routeIs('admin.siswa.*')" :dark="true">
                Manajemen Murid
            </x-nav-link>
            
            {{-- Menu Konfirmasi Pembayaran dengan Notifikasi --}}
            <x-nav-link :href="route('admin.admin_pembayaran_index')" :active="request()->routeIs('admin.admin_pembayaran_index')" :dark="true" class="flex justify-between items-center">
                <span>Konfirmasi Pembayaran</span>
                @if($notifPembayaran > 0)
                    <span class="bg-brand-orange text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">{{ $notifPembayaran }}</span>
                @endif
            </x-nav-link>

            <h3 class="px-3 mt-5 mb-1 text-xs font-semibold text-gray-400 uppercase tracking-wider">Tampilan Website</h3>
            <x-nav-link :href="route('admin.hero.index')" :active="request()->routeIs('admin.hero.*')" :dark="true">
                Kelola Slider (Hero)
            </x-nav-link>
            <x-nav-link :href="route('admin.fasilitas.index')" :active="request()->routeIs('admin.fasilitas.*')" :dark="true">
                Kelola Fasilitas
            </x-nav-link>
            <x-nav-link :href="route('admin.program.index')" :active="request()->routeIs('admin.program.*')" :dark="true">
                Kelola Program
            </x-nav-link>
            <x-nav-link :href="route('admin.brosur.index')" :active="request()->routeIs('admin.brosur.*')" :dark="true">
                Kelola Brosur
            </x-nav-link>
            <x-nav-link :href="route('admin.berita.index')" :active="request()->routeIs('admin.berita.*')" :dark="true">
                Kelola Berita & Info
            </x-nav-link>

            <h3 class="px-3 mt-5 mb-1 text-xs font-semibold text-gray-400 uppercase tracking-wider">Layanan External</h3>
            {{-- Menu Buka Live Chat Tawk.to --}}
            <x-nav-link href="https://dashboard.tawk.to/" target="_blank" :active="false" :dark="true">
                Live Chat Pengunjung
            </x-nav-link>
        @endif
        
    </div> {{-- Penutup area scrollable --}}


    {{-- =============================================== --}}
    {{-- BAGIAN BAWAH (PROFIL & LOGOUT - TETAP TERLIHAT) --}}
    {{-- =============================================== --}}
    <div class="pt-4 mt-2 border-t {{ $role != 'user' ? 'border-gray-600' : 'border-gray-200' }}">
        <h3 class="px-3 text-xs font-semibold {{ $role != 'user' ? 'text-gray-400' : 'text-gray-500' }} uppercase tracking-wider">Akun Saya</h3>
        <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')" :dark="$role != 'user'">
            Update Profile
        </x-nav-link>
        
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); this.closest('form').submit();"
               class="block w-full ps-3 pe-4 py-2 text-start text-base font-semibold rounded-lg transition duration-150 ease-in-out {{ $role != 'user' ? 'text-gray-300 hover:text-white hover:bg-slate-700' : 'text-gray-600 hover:text-gray-800 hover:bg-gray-100' }}">
                {{ __('Log Out') }}
            </a>
        </form>
    </div>

</div> {{-- Penutup wrapper utama --}}