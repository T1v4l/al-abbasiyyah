<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lupa Sandi - PAUDQU AL-ABBASIYYAH</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900 bg-gray-50">

    {{-- Container Utama --}}
    <div class="min-h-screen flex flex-col justify-center items-center px-4 py-10">
        
        <div class="w-full max-w-md">
            {{-- Header Card Khas Al-Abbasiyyah --}}
            <div class="bg-gradient-to-br from-blue-500 via-indigo-500 to-cyan-600 p-8 rounded-t-[40px] shadow-2xl text-center relative overflow-hidden">
                <div class="absolute -top-10 -right-10 w-32 h-32 bg-white opacity-10 rounded-full blur-2xl"></div>
                <div class="absolute -bottom-5 -left-5 w-24 h-24 bg-black opacity-10 rounded-full blur-xl"></div>
                
                <div class="relative z-10">
                    <div class="bg-white/20 backdrop-blur-md w-16 h-16 mx-auto rounded-2xl flex items-center justify-center border border-white/30 mb-4 shadow-inner">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h2 class="font-display font-black text-2xl text-white tracking-tight uppercase">Lupa Sandi?</h2>
                    <p class="text-blue-50 text-[10px] font-bold opacity-90 uppercase tracking-[0.2em] mt-1">Sistem Pemulihan Akun</p>
                </div>
            </div>

            {{-- Form Body --}}
            <div class="bg-white p-8 rounded-b-[40px] shadow-xl border-x border-b border-gray-100">
                <div class="mb-6 text-sm text-gray-500 text-center leading-relaxed">
                    Tidak masalah. Masukkan alamat email yang terdaftar, dan kami akan mengirimkan tautan untuk membuat kata sandi baru.
                </div>

                {{-- Status Session (Pesan jika email berhasil dikirim) --}}
                <x-auth-session-status class="mb-4 text-center font-bold text-green-600 bg-green-50 p-3 rounded-xl border border-green-200" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="mb-8">
                        <label class="block text-[11px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">Alamat Email</label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-blue-500 transition-colors">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                            </div>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                                   placeholder="contoh@gmail.com"
                                   class="block w-full pl-11 pr-4 py-4 bg-white border border-gray-200 rounded-2xl text-gray-800 text-sm focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all placeholder:text-gray-300">
                        </div>
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-center" />
                    </div>

                    {{-- Tombol Kirim (Warna Orange) --}}
                    <button type="submit" 
                            class="w-full bg-[#F97316] hover:bg-[#EA580C] text-white font-black py-4 rounded-2xl shadow-lg shadow-orange-200 transition-all transform active:scale-95 flex items-center justify-center gap-2 text-sm uppercase tracking-widest">
                        <span>Kirim Link Reset</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    
                    {{-- Tombol Kembali ke Login --}}
                    <div class="mt-6 text-center">
                        <a href="{{ route('login') }}" class="text-sm font-bold text-gray-400 hover:text-blue-500 transition-colors">
                            &larr; Kembali ke halaman Login
                        </a>
                    </div>
                </form>
            </div>
            
            {{-- Footer Kecil --}}
            <p class="text-center text-gray-400 text-[10px] mt-8 uppercase tracking-[0.3em]">
                &copy; {{ date('Y') }} PAUDQU AL-ABBASIYYAH
            </p>
        </div>
    </div>

</body>
</html>