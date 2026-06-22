<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Link Favicon --}}
        <link rel="icon" type="image/png" href="{{ asset('images/log2.png') }}">
    
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-slate-100">
            
            @include('layouts.navigation')

            <div class="lg:ps-64">
                <div class="p-4 sm:p-6 lg:p-8">
                    @if (isset($header))
                        <header class="mb-8">
                            <div class="max-w-7xl mx-auto">
                                {{ $header }}
                            </div>
                        </header>
                    @endif

                    <main>
                        {{ $slot }}
                    </main>
                </div>
                
                <footer class="bg-slate-100 border-t">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-center text-gray-500 text-sm">
                        &copy; {{ date('Y') }} PAUDQU AL-ABBASIYYAH.
                    </div>
                </footer>
            </div>
        </div>

        {{-- ======================================================== --}}
        {{-- SWEETALERT2 POP-UP NOTIFICATION (GLOBAL) --}}
        {{-- ======================================================== --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // 1. Pop-up Sukses
                @if(session('success'))
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: "{!! session('success') !!}",
                        timer: 3000, 
                        timerProgressBar: true,
                        showConfirmButton: false,
                        background: '#ffffff',
                        customClass: {
                            title: 'text-gray-800 font-bold',
                            popup: 'rounded-3xl shadow-2xl border border-gray-100',
                        }
                    });
                @endif

                // 2. Pop-up Error Validasi (Gagal Upload/Form)
                @if($errors->any())
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal Menyimpan!',
                        html: `
                            <div class="text-sm text-gray-600 text-left mt-2">
                                <ul class="list-disc pl-5 space-y-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        `,
                        confirmButtonText: 'Mengerti',
                        customClass: {
                            popup: 'rounded-3xl shadow-2xl',
                            confirmButton: 'bg-red-500 hover:bg-red-600 text-white rounded-xl px-6 py-2 font-bold'
                        }
                    });
                @endif

                // 3. Konfirmasi Hapus Data (Menggantikan confirm bawaan browser)
                const deleteButtons = document.querySelectorAll('.btn-hapus');
                deleteButtons.forEach(button => {
                    button.addEventListener('click', function(e) {
                        e.preventDefault(); 
                        const form = this.closest('form');
                        
                        Swal.fire({
                            title: 'Apakah Anda Yakin?',
                            text: "Data ini akan dihapus secara permanen dan tidak bisa dikembalikan!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#EF4444', // Merah Tailwind
                            cancelButtonColor: '#9CA3AF', // Abu-abu Tailwind
                            confirmButtonText: 'Ya, Hapus!',
                            cancelButtonText: 'Batal',
                            customClass: {
                                popup: 'rounded-3xl shadow-2xl',
                                confirmButton: 'rounded-xl px-6 py-2 font-bold',
                                cancelButton: 'rounded-xl px-6 py-2 font-bold'
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit(); 
                            }
                        })
                    });
                });
            });
        </script>
    </body>
</html>