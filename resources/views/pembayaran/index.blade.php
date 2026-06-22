<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display font-bold text-2xl md:text-3xl text-brand-gray leading-tight">
            Pembayaran Pendaftaran
        </h2>
    </x-slot>

    <div class="bg-white rounded-2xl shadow-lg p-4 sm:p-6 md:p-8 border border-gray-200">
        @if (session('success'))
            <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 text-sm sm:text-base" role="alert"><p>{{ session('success') }}</p></div>
        @endif

        @if ($siswa)
            {{-- TAMPILAN 1: BELUM MEMILIH --}}
            @if ($siswa->metode_pembayaran == 'Belum Dipilih' || !$siswa->metode_pembayaran)
                <div class="text-center">
                    <h3 class="font-display text-xl sm:text-2xl font-bold text-brand-teal-dark">Pilih Metode Pembayaran</h3>
                    <p class="mt-2 text-sm sm:text-base text-gray-600 max-w-lg mx-auto">Silakan pilih metode pembayaran biaya pendaftaran yang paling sesuai untuk Anda.</p>
                    <div class="mt-6 sm:mt-8 grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                        <a href="{{ route('pembayaran.pilihMetode', ['metode' => 'bank']) }}" class="block w-full p-4 sm:p-6 border-2 border-gray-200 rounded-xl hover:border-brand-orange hover:bg-orange-50 transition group text-left">
                            <div class="flex items-start sm:items-center gap-3 sm:gap-4">
                                <div class="bg-orange-100 p-3 rounded-lg group-hover:bg-brand-orange group-hover:text-white transition shrink-0"><svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg></div>
                                <div><h4 class="font-bold text-base sm:text-lg text-brand-gray">Transfer Bank</h4><p class="text-xs sm:text-sm text-gray-500 mt-1 sm:mt-0">Konfirmasi manual dengan upload bukti.</p></div>
                            </div>
                        </a>
                        <a href="{{ route('pembayaran.pilihMetode', ['metode' => 'langsung']) }}" class="block w-full p-4 sm:p-6 border-2 border-gray-200 rounded-xl hover:border-brand-teal hover:bg-teal-50 transition group text-left">
                            <div class="flex items-start sm:items-center gap-3 sm:gap-4">
                                <div class="bg-teal-100 p-3 rounded-lg group-hover:bg-brand-teal group-hover:text-white transition shrink-0"><svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg></div>
                                <div><h4 class="font-bold text-base sm:text-lg text-brand-gray">Bayar Langsung</h4><p class="text-xs sm:text-sm text-gray-500 mt-1 sm:mt-0">Bayar tunai di lokasi pendaftaran.</p></div>
                            </div>
                        </a>
                    </div>
                </div>

            {{-- TAMPILAN 2: SUDAH MEMILIH --}}
            @else
                <div class="max-w-3xl mx-auto">
                    {{-- Judul dan Status Dibuat Flex Column di HP agar tidak bertumpuk --}}
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between border-b pb-4 mb-6 gap-3 sm:gap-0">
                        <h3 class="text-lg sm:text-xl font-bold text-brand-gray">Detail Pembayaran</h3>
                        <span class="px-3 sm:px-4 py-1 rounded-full text-[10px] sm:text-xs font-bold uppercase tracking-wider self-start sm:self-auto
                            {{ $siswa->status_pembayaran == 'Lunas' ? 'bg-green-100 text-green-700' : 'bg-orange-100 text-brand-orange' }}">
                            {{ $siswa->status_pembayaran }}
                        </span>
                    </div>

                    @if ($siswa->metode_pembayaran == 'Bayar Langsung')
                        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 sm:p-6 rounded-r-xl">
                            <h4 class="font-bold text-blue-800 text-base sm:text-lg mb-2 text-center">Instruksi Pembayaran Tunai</h4>
                            <p class="text-blue-700 mb-4 text-center text-sm sm:text-base">Silakan datang langsung ke sekretariat pendaftaran <strong>PAUDQU AL-ABBASIYYAH</strong> untuk melakukan pembayaran secara tunai dan verifikasi berkas asli.</p>
                            <div class="mt-6 sm:mt-8 text-center">
                                <a href="{{ route('pembayaran.resetMetode') }}" class="text-xs sm:text-sm text-gray-500 hover:text-brand-gray underline block sm:inline">Salah pilih? Ganti metode pembayaran</a>
                            </div>
                        </div>
                    @else
                        <div class="space-y-6">
                            <div class="p-4 sm:p-6 border border-gray-100 rounded-2xl bg-gray-50/50">
                                <p class="text-xs sm:text-sm text-gray-500 uppercase font-bold tracking-widest mb-3 sm:mb-4">Transfer Ke Rekening Berikut:</p>
                                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-2 sm:gap-6">
                                    {{-- <img src="" alt="BSI" class="h-8"> --}}
                                    <div><p class="text-xl sm:text-2xl font-black text-brand-gray tracking-tight">7101360371</p><p class="text-sm sm:text-base font-bold text-gray-600 uppercase">A.N ROSMALIA</p></div>
                                </div>
                                <p class="mt-3 sm:mt-4 text-xs sm:text-sm text-gray-500 italic">*Mohon transfer sesuai nominal biaya pendaftaran yang berlaku.</p>
                            </div>
                        </div>

                        <form action="{{ route('pembayaran.upload') }}" method="POST" enctype="multipart/form-data" class="mt-6 sm:mt-8 border-t pt-6 sm:pt-8">
                            @csrf
                            <x-input-label for="bukti_pembayaran" value="Unggah Bukti Pembayaran (JPG, PNG, maks 2MB)" class="font-semibold text-sm sm:text-base" />
                            <x-text-input id="bukti_pembayaran" name="bukti_pembayaran" type="file" class="mt-2 block w-full text-sm sm:text-base" required />
                            <x-input-error :messages="$errors->get('bukti_pembayaran')" class="mt-2" />
                            <button type="submit" class="mt-4 sm:mt-6 w-full sm:w-auto inline-flex items-center justify-center bg-brand-orange text-white font-bold px-6 sm:px-8 py-3 rounded-lg shadow-lg hover:bg-brand-orange-dark transition text-sm sm:text-base">Unggah Bukti Transfer</button>
                        </form>

                        <div class="mt-6 sm:mt-8">
                            <a href="{{ route('pembayaran.resetMetode') }}" class="text-xs sm:text-sm text-gray-500 hover:text-brand-orange underline transition block">Salah pilih? Ganti metode pembayaran</a>
                        </div>
                    @endif

                    {{-- TOMBOL DOWNLOAD FORMULIR (MUNCUL JIKA SUDAH LUNAS) --}}
                    @if ($siswa->status_pembayaran == 'Lunas' || $siswa->status_pembayaran == 'Terverifikasi')
                        <div class="mt-8 sm:mt-10 p-5 sm:p-8 border-2 border-dashed border-green-200 rounded-3xl bg-green-50 text-center">
                            <div class="w-12 h-12 sm:w-16 sm:h-16 bg-green-500 text-white rounded-full flex items-center justify-center mx-auto mb-3 sm:mb-4 shadow-lg">
                                <svg class="w-6 h-6 sm:w-8 sm:h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg sm:text-xl font-bold text-green-800 uppercase">Pembayaran Terverifikasi</h3>
                            <p class="text-sm sm:text-base text-green-600 mt-2 mb-5 sm:mb-6">Data pendaftaran Anda telah sah dan diterima. Silakan unduh formulir pendaftaran untuk dibawa ke PAUD.</p>
                            
                            {{-- Tombol Download dibuat Full Width pada layar HP --}}
                            <a href="{{ route('pembayaran.download_hasil', $siswa->id) }}" 
                               class="flex flex-col sm:flex-row items-center justify-center gap-2 sm:gap-3 bg-green-600 hover:bg-green-700 text-white font-bold sm:font-extrabold py-3 sm:py-4 px-4 sm:px-10 rounded-2xl shadow-xl transition-all transform hover:scale-105 w-full text-xs sm:text-base">
                                <svg class="w-5 h-5 sm:w-6 sm:h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                                <span>DOWNLOAD HASIL PENDAFTARAN (PDF)</span>
                            </a>
                        </div>
                    @endif

                </div>
            @endif
        @else
            <p class="text-center text-gray-500 text-sm sm:text-base">Anda belum mendaftarkan calon santri. Silakan isi formulir pendaftaran terlebih dahulu.</p>
        @endif
    </div>
</x-app-layout>