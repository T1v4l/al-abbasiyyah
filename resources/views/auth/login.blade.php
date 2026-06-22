<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Favicon --}}
    <link rel="icon" type="image/png" href="{{ asset('images/log2.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">


    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900">
    {{-- Latar belakang dengan pola geometris halus dan penempatan di tengah --}}
    <div class="min-h-screen bg-slate-100 flex flex-col items-center justify-center p-4" style="background-image: url('data:image/svg+xml,%3Csvg width=%2260%22 height=%2260%22 viewBox=%220 0 60 60%22 xmlns=%22http://www.w3.org/2000/svg%22%3E%3Cg fill=%22none%22 fill-rule=%22evenodd%22%3E%3Cg fill=%22%23d4e7e6%22 fill-opacity=%220.4%22%3E%3Cpath d=%22M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z%22/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">

        {{-- Logo PAUD di Atas Kartu --}}
        <div class="mb-6"> {{-- Kurangi margin bawah sedikit --}}
            <a href="/">
                {{-- Meningkatkan ukuran logo menjadi w-32 h-32 dan object-cover untuk memenuhi area --}}
                <img src="{{ asset('images/log2.png') }}" alt="Logo PAUDQU Al-Abbasiyyah" class="w-32 h-32 object-contain rounded-full shadow-lg p-2 bg-white">
            </a>
        </div>

        {{-- Kartu Login yang "Melayang" --}}
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8 space-y-6">
            <div class="text-center">
                <h1 class="font-display text-3xl font-bold text-gray-800">Selamat Datang</h1>
                <p class="text-gray-500 mt-2">Belum punya akun? <a href="{{ route('register') }}" class="font-semibold text-brand-orange hover:underline">Daftar di sini</a></p>
            </div>
            
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <div>
                    <x-input-label for="email" value="Alamat Email" />
                    <x-text-input id="email" class="block mt-1 w-full p-3 rounded-lg border-gray-200 focus:border-brand-teal focus:ring focus:ring-brand-teal focus:ring-opacity-50" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div>
                    <x-input-label for="password" value="Password" />
                    <x-text-input id="password" class="block mt-1 w-full p-3 rounded-lg border-gray-200 focus:border-brand-teal focus:ring focus:ring-brand-teal focus:ring-opacity-50" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="flex items-center justify-between text-sm">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-brand-teal shadow-sm focus:ring-brand-teal" name="remember">
                        <span class="ms-2 text-gray-600">{{ __('Ingat saya') }}</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a class="underline text-gray-600 hover:text-brand-teal" href="{{ route('password.request') }}">{{ __('Lupa password?') }}</a>
                    @endif
                </div>
                <div>
                    <button type="submit" class="w-full text-center bg-brand-teal text-white font-bold p-3 rounded-lg shadow-md hover:bg-brand-teal-dark transform hover:-translate-y-1 transition-all duration-300">
                        {{ __('Log In') }}
                    </button>
                </div>
            </form>
        </div>
        <p class="text-center text-gray-400 text-xs mt-8">&copy; {{ date('Y') }} PAUDQU Al-Abbasiyyah.</p>
    </div>
</body>
</html>