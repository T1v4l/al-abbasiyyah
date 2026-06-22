<x-app-layout>
    <x-slot name="head">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        
        <style>
            body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; }
            [x-cloak] { display: none !important; }
            .payment-option { transition: all 0.3s ease; border: 2px solid #e2e8f0; cursor: pointer; }
            .payment-option.active { border-color: #f97316; background-color: #fff7ed; }
        </style>
    </x-slot>

    <div class="py-8 md:py-12 min-h-screen" x-data="pendaftaranForm()">
        <div class="max-w-5xl mx-auto px-4 sm:px-6">
            
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">
                
                {{-- HEADER SECTION (Sesuai File Asli) --}}
                <div class="pt-10 pb-8 px-6 md:px-12 flex flex-col md:flex-row items-center justify-center border-b border-gray-100 relative">
                    <div class="hidden md:flex flex-col items-center justify-center w-32">
                        <img src="/images/log1.png" alt="Logo Yayasan" class="h-20 w-20 object-contain drop-shadow-sm">
                    </div>
                    <div class="text-center flex-1">
                        <div class="flex md:hidden items-center justify-center gap-5 mb-5">
                            <img src="/images/log1.png" alt="Logo Yayasan" class="h-16 w-16 object-contain drop-shadow-sm">
                            <img src="/images/log2.png" alt="Logo PAUD" class="h-16 w-16 object-contain drop-shadow-sm">
                        </div>
                        <h1 class="text-3xl md:text-3xl font-extrabold text-gray-800 tracking-tight uppercase">Formulir Pendaftaran</h1>
                        <p class="text-sm md:text-base text-orange-500 font-extrabold tracking-widest mt-2 uppercase">PAUDQU AL-ABBASIYYAH</p>
                    </div>
                    <div class="hidden md:flex flex-col items-center justify-center w-32">
                        <img src="/images/log2.png" alt="Logo PAUD" class="h-20 w-20 object-contain drop-shadow-sm">
                    </div>
                </div>

                {{-- Stepper Progress --}}
                <div class="bg-gray-50/50 px-8 py-6 border-b border-gray-100">
                    <div class="flex items-center justify-between gap-2 max-w-3xl mx-auto">
                        <template x-for="i in 6">
                            <div class="flex-1 flex flex-col items-center gap-2 relative">
                                <div :class="step >= i ? 'bg-orange-500 text-white shadow-md' : 'bg-white text-gray-400 border border-gray-200'" 
                                     class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm transition-all duration-300 z-10 relative">
                                    <span x-text="i"></span>
                                </div>
                                <span class="text-[10px] md:text-xs font-bold text-gray-400 text-center uppercase hidden md:block" 
                                      :class="step >= i ? 'text-orange-500' : ''"
                                      x-text="['Siswa', 'Domisili', 'Kesehatan', 'Orang Tua', 'Wali', 'Bayar'][i-1]"></span>
                                <div x-show="i < 6" class="absolute top-5 left-[50%] w-full h-1 transition-all duration-400" 
                                     :class="step > i ? 'bg-orange-500' : 'bg-gray-200'"></div>
                            </div>
                        </template>
                    </div>
                </div>

                <form id="formLengkap" action="{{ route('pendaftaran.store') }}" method="POST">
                    @csrf

                    {{-- STEP 1: IDENTITAS ANAK (LENGKAP) --}}
                    <div x-show="step === 1" class="p-8 md:p-10" x-transition:enter="transition duration-300">
                        <div class="mb-8 border-l-4 border-orange-500 pl-4">
                            <h2 class="text-xl font-extrabold text-gray-800">Data Utama Murid</h2>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2"><label class="block text-sm font-bold text-gray-700 mb-2">Nama Lengkap (Sesuai Akta)</label><input type="text" name="nama_lengkap" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none focus:ring-2 focus:ring-orange-500" required></div>
                            <div><label class="block text-sm font-bold text-gray-700 mb-2">Nama Panggilan</label><input type="text" name="nama_panggilan" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none" required></div>
                            <div><label class="block text-sm font-bold text-gray-700 mb-2">NIK (Sesuai KK)</label><input type="number" name="nik" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none" required></div>
                            <div><label class="block text-sm font-bold text-gray-700 mb-2">No. Reg Akta Kelahiran</label><input type="text" name="no_akta" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none" required></div>
                            <div><label class="block text-sm font-bold text-gray-700 mb-2">Tempat Lahir</label><input type="text" name="tempat_lahir" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none" required></div>
                            <div><label class="block text-sm font-bold text-gray-700 mb-2">Tanggal Lahir</label><input type="date" name="tanggal_lahir" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none" required></div>
                            <div><label class="block text-sm font-bold text-gray-700 mb-2">Jenis Kelamin</label><select name="jenis_kelamin" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none" required><option value="">Pilih...</option><option value="L">Laki-laki</option><option value="P">Perempuan</option></select></div>
                            <div><label class="block text-sm font-bold text-gray-700 mb-2">Agama</label><input type="text" name="agama" value="Islam" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none" required></div>
                            <div><label class="block text-sm font-bold text-gray-700 mb-2">Kewarganegaraan</label><input type="text" name="kewarganegaraan" value="WNI" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none" required></div>
                        </div>
                    </div>

                    {{-- STEP 2: DOMISILI & BAKAT (LENGKAP) --}}
                    <div x-show="step === 2" class="p-8 md:p-10" x-cloak x-transition:enter="transition duration-300">
                        <div class="mb-8 border-l-4 border-blue-500 pl-4">
                            <h2 class="text-xl font-extrabold text-gray-800">Domisili & Bakat Murid</h2>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2"><label class="block text-sm font-bold text-gray-700 mb-2">Alamat Jalan / Dusun</label><textarea name="alamat" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-2xl outline-none" rows="2" required></textarea></div>
                            <div><label class="block text-sm font-bold text-gray-700 mb-2">Kelurahan / Desa</label><input type="text" name="kelurahan" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none" required></div>
                            <div><label class="block text-sm font-bold text-gray-700 mb-2">Kecamatan</label><input type="text" name="kecamatan" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none" required></div>
                            <div><label class="block text-sm font-bold text-gray-700 mb-2">Kabupaten / Kota</label><input type="text" name="kota" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none" required></div>
                            <div><label class="block text-sm font-bold text-gray-700 mb-2">Status Tempat Tinggal</label><select name="status_tinggal" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none" required><option value="">Pilih...</option><option value="Orang Tua">Bersama Orang Tua</option><option value="Wali">Wali / Saudara</option></select></div>
                            <div><label class="block text-sm font-bold text-gray-700 mb-2">Anak Ke-</label><input type="number" name="anak_ke" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none" required></div>
                            <div><label class="block text-sm font-bold text-gray-700 mb-2">Jumlah Saudara</label><input type="number" name="jml_saudara" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none" required></div>
                            <div><label class="block text-sm font-bold text-gray-700 mb-2">Hobi</label><input type="text" name="hobi" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none"></div>
                            <div><label class="block text-sm font-bold text-gray-700 mb-2">Cita-cita</label><input type="text" name="cita_cita" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none"></div>
                        </div>
                    </div>

                    {{-- STEP 3: KESEHATAN (LENGKAP) --}}
                    <div x-show="step === 3" class="p-8 md:p-10" x-cloak x-transition:enter="transition duration-300">
                        <div class="mb-8 border-l-4 border-red-500 pl-4"><h2 class="text-xl font-extrabold text-gray-800">Data Kesehatan</h2></div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div><label class="block text-sm font-bold text-gray-700 mb-2">Tinggi (cm)</label><input type="number" name="tinggi" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none" required></div>
                            <div><label class="block text-sm font-bold text-gray-700 mb-2">Berat (kg)</label><input type="number" name="berat" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none" required></div>
                            <div><label class="block text-sm font-bold text-gray-700 mb-2">Lingkar Kepala (cm)</label><input type="number" name="lingkar_kepala" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none" required></div>
                            <div class="col-span-full"><label class="block text-sm font-bold text-gray-700 mb-2">Riwayat Penyakit</label><textarea name="kebutuhan_khusus" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-2xl outline-none" rows="2"></textarea></div>
                        </div>
                    </div>

                    {{-- STEP 4: DATA ORANG TUA (LENGKAP SEMUA FIELD) --}}
                    <div x-show="step === 4" class="p-8 md:p-10" x-cloak x-transition:enter="transition duration-300">
                        <div class="mb-6 border-l-4 border-teal-500 pl-4"><h2 class="text-xl font-extrabold text-gray-800">Data Orang Tua Kandung</h2></div>
                        <div class="mb-8"><label class="block text-sm font-bold text-gray-700 mb-2">No. Kartu Keluarga (KK)</label><input type="number" name="no_kk" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none font-bold" required></div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            {{-- AYAH --}}
                            <div class="p-6 bg-blue-50/50 rounded-3xl border border-blue-100">
                                <h3 class="font-bold text-blue-700 mb-4 text-xs uppercase">Ayah Kandung</h3>
                                <div class="space-y-4">
                                    <input type="text" name="nama_ayah" placeholder="Nama Lengkap Ayah" class="w-full px-5 py-3 bg-white border border-gray-200 rounded-full outline-none" required>
                                    <input type="number" name="nik_ayah" placeholder="NIK Ayah" class="w-full px-5 py-3 bg-white border border-gray-200 rounded-full outline-none" required>
                                    <input type="text" name="tempat_lahir_ayah" placeholder="Tempat Lahir Ayah" class="w-full px-5 py-3 bg-white border border-gray-200 rounded-full outline-none" required>
                                    <input type="date" name="tgl_lahir_ayah" class="w-full px-5 py-3 bg-white border border-gray-200 rounded-full outline-none" required>
                                    <input type="text" name="pendidikan_ayah" placeholder="Pendidikan Ayah" class="w-full px-5 py-3 bg-white border border-gray-200 rounded-full outline-none" required>
                                    <input type="text" name="pekerjaan_ayah" placeholder="Pekerjaan Ayah" class="w-full px-5 py-3 bg-white border border-gray-200 rounded-full outline-none" required>
                                    <select name="penghasilan_ayah" class="w-full px-5 py-3 bg-white border border-gray-200 rounded-full outline-none" required>
                                        <option value="">Pilih Penghasilan...</option>
                                        <option value="Kurang dari 1 Juta">< 1jt</option>
                                        <option value="1 - 2 Juta">1jt - 2jt</option>
                                        <option value="2 - 5 Juta">2jt - 5jt</option>
                                        <option value="Lebih dari 5 Juta">> 5jt</option>
                                    </select>
                                    <input type="text" name="no_wa_ayah" placeholder="No. WA Ayah" class="w-full px-5 py-3 bg-white border border-gray-200 rounded-full outline-none" required>
                                </div>
                            </div>
                            {{-- IBU --}}
                            <div class="p-6 bg-rose-50/50 rounded-3xl border border-rose-100">
                                <h3 class="font-bold text-rose-700 mb-4 text-xs uppercase">Ibu Kandung</h3>
                                <div class="space-y-4">
                                    <input type="text" name="nama_ibu" placeholder="Nama Lengkap Ibu" class="w-full px-5 py-3 bg-white border border-gray-200 rounded-full outline-none" required>
                                    <input type="number" name="nik_ibu" placeholder="NIK Ibu" class="w-full px-5 py-3 bg-white border border-gray-200 rounded-full outline-none" required>
                                    <input type="text" name="tempat_lahir_ibu" placeholder="Tempat Lahir Ibu" class="w-full px-5 py-3 bg-white border border-gray-200 rounded-full outline-none" required>
                                    <input type="date" name="tgl_lahir_ibu" class="w-full px-5 py-3 bg-white border border-gray-200 rounded-full outline-none" required>
                                    <input type="text" name="pendidikan_ibu" placeholder="Pendidikan Ibu" class="w-full px-5 py-3 bg-white border border-gray-200 rounded-full outline-none" required>
                                    <input type="text" name="pekerjaan_ibu" placeholder="Pekerjaan Ibu" class="w-full px-5 py-3 bg-white border border-gray-200 rounded-full outline-none" required>
                                    <select name="penghasilan_ibu" class="w-full px-5 py-3 bg-white border border-gray-200 rounded-full outline-none" required>
                                        <option value="">Pilih Penghasilan...</option>
                                        <option value="IRT / Tidak Bekerja">IRT</option>
                                        <option value="Kurang dari 1 Juta">< 1jt</option>
                                        <option value="1 - 2 Juta">1jt - 2jt</option>
                                        <option value="Lebih dari 2 Juta">> 2jt</option>
                                    </select>
                                    <input type="text" name="no_wa_ibu" placeholder="No. WA Ibu" class="w-full px-5 py-3 bg-white border border-gray-200 rounded-full outline-none" required>
                                </div>
                            </div>
                            <div class="md:col-span-2 space-y-4">
                                <textarea name="alamat_ibu" placeholder="Alamat Sesuai KTP/KK" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-2xl outline-none" rows="2" required></textarea>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                                    <input type="text" name="kelurahan_ibu" placeholder="Kelurahan" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none" required>
                                    <input type="text" name="kecamatan_ibu" placeholder="Kecamatan" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none" required>
                                    <input type="text" name="kota_ibu" placeholder="Kota" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none" required>
                                    <input type="text" name="provinsi_ibu" placeholder="Provinsi" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- STEP 5: DATA WALI (LENGKAP SEMUA FIELD) --}}
                    <div x-show="step === 5" class="p-8 md:p-10" x-cloak x-transition:enter="transition duration-300">
                        <div class="mb-8 border-l-4 border-purple-500 pl-4">
                            <h2 class="text-xl font-extrabold text-gray-800">Data Wali (Opsional)</h2>
                            <p class="text-gray-500 text-sm mt-1 italic">Lewati jika diasuh orang tua sendiri.</p>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2"><input type="text" name="nama_wali" placeholder="Nama Lengkap Wali" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none"></div>
                            <input type="text" name="hubungan_wali" placeholder="Hubungan (Paman/Kakek/dll)" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none">
                            <input type="number" name="nik_wali" placeholder="NIK Wali" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none">
                            <input type="text" name="tempat_lahir_wali" placeholder="Tempat Lahir Wali" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none">
                            <input type="date" name="tgl_lahir_wali" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none">
                            <input type="text" name="pekerjaan_wali" placeholder="Pekerjaan Wali" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none">
                            <input type="text" name="no_wa_wali" placeholder="No. WA Wali" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-full outline-none">
                            <div class="md:col-span-2"><textarea name="alamat_wali" placeholder="Alamat Wali" class="w-full px-5 py-3 bg-gray-50 border border-gray-200 rounded-2xl outline-none" rows="2"></textarea></div>
                        </div>
                    </div>

                    {{-- STEP 6: PEMBAYARAN & KONFIRMASI --}}
                    <div x-show="step === 6" class="p-8 md:p-10 text-center" x-cloak x-transition:enter="transition duration-300">
                        <h2 class="text-2xl font-extrabold text-gray-800 mb-2">Metode Pembayaran</h2>
                        <p class="text-sm text-gray-500 mb-8 tracking-widest uppercase">Bogor, {{ now()->translatedFormat('d F Y') }}</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-2xl mx-auto mb-10">
                            <div class="payment-option p-6 rounded-3xl text-left relative" :class="metode === 'transfer' ? 'active' : ''" @click="metode = 'transfer'">
                                <input type="radio" name="metode_pembayaran" value="transfer" x-model="metode" class="absolute top-4 right-4" required>
                                <p class="font-extrabold text-gray-800">Transfer Bank (BSI)</p>
                                <p class="text-xs text-gray-500 mt-2 italic">A.N PAUDQU AL-ABBASIYYAH <br> No. Rek: 7123456789</p>
                            </div>
                            <div class="payment-option p-6 rounded-3xl text-left relative" :class="metode === 'tunai' ? 'active' : ''" @click="metode = 'tunai'">
                                <input type="radio" name="metode_pembayaran" value="tunai" x-model="metode" class="absolute top-4 right-4" required>
                                <p class="font-extrabold text-gray-800">Bayar Tunai (Cash)</p>
                                <p class="text-xs text-gray-500 mt-2">Bayar di sekolah saat verifikasi berkas fisik dan **Tanda Tangan Basah**.</p>
                            </div>
                        </div>

                        <div class="max-w-xl mx-auto p-6 bg-orange-50 rounded-2xl border border-orange-100 flex items-start gap-4 text-left">
                            <input type="checkbox" required class="mt-1 w-5 h-5 text-orange-600 border-gray-300 rounded">
                            <p class="text-sm text-gray-700 font-medium">Saya menyatakan seluruh data santri dan orang tua yang diisi adalah benar. Saya akan datang ke PAUDQU AL-ABBASIYYAH untuk melakukan tanda tangan basah pada formulir fisik.</p>
                        </div>
                        
                        <div class="mt-8 text-[11px] text-gray-400 font-bold uppercase tracking-widest">
                            Bukti pendaftaran (PDF) dapat di-download di Dashboard setelah admin memverifikasi pembayaran Anda.
                        </div>
                    </div>

                    {{-- NAVIGASI --}}
                    <div class="bg-gray-50 p-6 md:px-10 flex flex-col-reverse md:flex-row items-center justify-between gap-4 border-t border-gray-100">
                        <button type="button" x-show="step > 1" @click="prevStep()" class="w-full md:w-auto px-8 py-3 bg-white border border-gray-300 text-gray-700 font-bold rounded-full transition hover:bg-gray-100">Kembali</button>
                        <div class="w-full md:w-auto">
                            <button type="button" x-show="step < 6" @click="nextStep()" class="w-full md:w-auto px-10 py-3 bg-gray-800 text-white font-bold rounded-full hover:bg-black transition">Selanjutnya</button>
                            <button type="submit" x-show="step === 6" @click="if(!metode){ alert('Pilih metode pembayaran!'); $event.preventDefault(); }" class="w-full md:w-auto px-10 py-3 bg-orange-500 text-white font-bold text-lg rounded-full shadow-lg hover:bg-orange-600">KIRIM PENDAFTARAN</button>
                        </div>
                    </div>
                </form>
            </div>
            {{-- <div class="text-center mt-6 text-[10px] text-gray-400 font-bold uppercase tracking-[0.2em]">&copy; {{ date('Y') }} PAUDQU AL-ABBASIYYAH</div> --}}
        </div>
    </div>

    <script>
        function pendaftaranForm() {
            return {
                step: 1,
                metode: '',
                nextStep() {
                    const section = document.querySelector(`[x-show="step === ${this.step}"]`);
                    const inputs = section.querySelectorAll('input, select, textarea');
                    let valid = true;
                    for (let input of inputs) {
                        if (input.hasAttribute('required') && !input.checkValidity()) {
                            input.reportValidity(); valid = false; break;
                        }
                    }
                    if (valid) { this.step++; window.scrollTo({ top: 0, behavior: 'smooth' }); }
                },
                prevStep() { if (this.step > 1) this.step--; }
            }
        }
    </script>
</x-app-layout>