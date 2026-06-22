<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            {{-- Tambahan '??' untuk mencegah error jika nama_panggilan kosong --}}
            <img class="h-12 w-12 rounded-full object-cover" src="https://placehold.co/100x100/333333/FFFFFF/png?text={{ substr($siswa->nama_panggilan ?? 'S', 0, 1) }}" alt="Foto Siswa">
            <div>
                <h2 class="font-display font-bold text-2xl text-brand-gray leading-tight">
                    Buat Jurnal Harian
                </h2>
                <p class="text-sm text-gray-500">untuk Ananda <span class="font-semibold">{{ $siswa->nama_panggilan }}</span></p>
            </div>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl">
                
                {{-- PERBAIKAN 1: Gunakan $siswa->id agar URL action pasti terbaca --}}
                <form method="POST" action="{{ route('guru.jurnal.store', $siswa->id) }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="p-6 md:p-8 space-y-6">
                        <div>
                            <x-input-label for="tanggal" value="Tanggal Jurnal" class="font-bold" />
                            {{-- PERBAIKAN 2: Tambahkan fungsi old() agar tanggal tidak hilang saat terjadi error validasi --}}
                            <x-text-input id="tanggal" class="block mt-1 w-full" type="date" name="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" required />
                            <x-input-error :messages="$errors->get('tanggal')" class="mt-2" />
                        </div>
                        
                        <div>
                            <x-input-label for="catatan_positif" value="Catatan Positif Hari Ini" class="font-bold" />
                            <textarea id="catatan_positif" name="catatan_positif" rows="5" class="block mt-1 w-full border-gray-300 focus:border-teal-500 focus:ring-teal-500 rounded-md shadow-sm" 
                            placeholder="Contoh: Ananda berhasil menghafal doa sebelum makan dengan lancar.">{{ old('catatan_positif') }}</textarea>
                            <x-input-error :messages="$errors->get('catatan_positif')" class="mt-2" />
                        </div>
                        
                        <div>
                            <x-input-label for="saran_untuk_dirumah" value="Saran untuk Dilatih di Rumah" class="font-bold" />
                            <textarea id="saran_untuk_dirumah" name="saran_untuk_dirumah" rows="5" class="block mt-1 w-full border-gray-300 focus:border-teal-500 focus:ring-teal-500 rounded-md shadow-sm" 
                            placeholder="Contoh: Latih kembali cara memegang pensil dengan benar.">{{ old('saran_untuk_dirumah') }}</textarea>
                            <x-input-error :messages="$errors->get('saran_untuk_dirumah')" class="mt-2" />
                        </div>

                        {{-- ========================================== --}}
                        {{-- TAMBAHAN KOLOM UPLOAD FOTO DOKUMENTASI --}}
                        {{-- ========================================== --}}
                        <div class="p-4 bg-blue-50/50 border border-blue-100 rounded-xl">
                            <x-input-label for="dokumentasi" value="Upload Foto Dokumentasi (Bisa Pilih Banyak Foto)" class="font-bold text-blue-800" />
                            
                            <input type="file" id="dokumentasi" name="dokumentasi[]" accept="image/*" multiple
                                class="block w-full mt-2 text-sm text-gray-600 
                                        file:mr-4 file:py-2.5 file:px-4 file:rounded-full file:border-0 
                                        file:text-sm file:font-semibold file:bg-blue-600 file:text-white 
                                        hover:file:bg-blue-700 hover:file:cursor-pointer transition">
                            <p class="text-xs text-gray-500 mt-2">Format yang diizinkan: JPG, JPEG, PNG. Bisa sorot/pilih banyak foto sekaligus (maks 2MB per foto).</p>
                            
                            {{-- PERBAIKAN 3: Error handling diubah ke manual (tanpa komponen) agar 100% AMAN dari TypeError htmlspecialchars --}}
                            @error('dokumentasi')
                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                            @enderror
                            
                            @if($errors->has('dokumentasi.*'))
                                <ul class="text-sm text-red-600 space-y-1 mt-2">
                                    @foreach($errors->get('dokumentasi.*') as $fileErrors)
                                        @foreach((array) $fileErrors as $errorMsg)
                                            <li>• {{ $errorMsg }}</li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                        {{-- ========================================== --}}

                    </div>
                    
                    <div class="flex items-center justify-end px-6 md:px-8 py-4 bg-gray-50 border-t">
                        <a href="{{ route('guru.dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 transition mr-4">Batal</a>
                        <button type="submit" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-bold rounded-full text-white bg-orange-500 hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition shadow-md hover:shadow-lg">
                            Simpan Jurnal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>