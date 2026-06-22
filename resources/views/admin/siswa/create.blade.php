<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-white bg-gradient-to-r from-gray-800 to-amber-500 p-5 rounded-xl shadow-lg">
            <i class="fas fa-user-plus mr-2"></i> Tambah Murid Baru & Buat Akun Wali
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if ($errors->any())
                <div class="mb-5 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                    <p class="font-bold underline">Gagal Menyimpan! Ada data yang belum lengkap atau salah format:</p>
                    <ul class="list-disc ml-5 mt-2">
                        @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.siswa.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                {{-- ========================================== --}}
                {{-- BAGIAN A: AKUN ORANG TUA (USER LOGIN) --}}
                {{-- ========================================== --}}
                <div class="bg-white rounded-2xl shadow-sm border border-blue-200 overflow-hidden">
                    <div class="bg-blue-50 px-6 py-4 border-b border-blue-100">
                        <h3 class="text-blue-700 font-bold flex items-center"><i class="fas fa-user-shield mr-2"></i> A. BUAT AKUN LOGIN ORANG TUA</h3>
                        <p class="text-[11px] text-blue-600 mt-1">Akun ini digunakan wali murid untuk masuk ke portal dan melihat jurnal anak.</p>
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="text-xs font-bold text-gray-500 uppercase">Nama Orang Tua / Wali</label>
                            <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: Budi Santoso" class="w-full mt-1 border-blue-300 bg-blue-50 rounded-lg focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="text-xs font-bold text-gray-500 uppercase">Alamat Email Valid</label>
                            <input type="email" name="email" value="{{ old('email') }}" required placeholder="Contoh: budi@gmail.com" class="w-full mt-1 border-blue-300 bg-blue-50 rounded-lg focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="text-xs font-bold text-gray-500 uppercase">Kata Sandi (Password)</label>
                            <input type="password" name="password" required placeholder="Minimal 8 karakter" class="w-full mt-1 border-blue-300 bg-blue-50 rounded-lg focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="text-xs font-bold text-gray-500 uppercase">Ulangi Kata Sandi</label>
                            <input type="password" name="password_confirmation" required placeholder="Ketik ulang password" class="w-full mt-1 border-blue-300 bg-blue-50 rounded-lg focus:ring-blue-500">
                        </div>
                    </div>
                </div>

                {{-- ========================================== --}}
                {{-- I. IDENTITAS & DOMISILI ANAK --}}
                {{-- ========================================== --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="bg-orange-50 px-6 py-4 border-b border-orange-100">
                        <h3 class="text-orange-700 font-bold flex items-center"><i class="fas fa-child mr-2"></i> I. IDENTITAS & DOMISILI ANAK</h3>
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-5">
                        <div class="md:col-span-2">
                            <label class="text-xs font-bold text-gray-500 uppercase">Nama Lengkap (Sesuai Akta)</label>
                            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required class="w-full mt-1 border-gray-300 rounded-lg">
                        </div>
                        <div>
                            <label class="text-xs font-bold text-gray-500 uppercase">Nama Panggilan</label>
                            <input type="text" name="nama_panggilan" value="{{ old('nama_panggilan') }}" class="w-full mt-1 border-gray-300 rounded-lg">
                        </div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">NIK</label><input type="text" name="nik" value="{{ old('nik') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">No Akta</label><input type="text" name="no_akta" value="{{ old('no_akta') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Kewarganegaraan</label><input type="text" name="kewarganegaraan" value="{{ old('kewarganegaraan', 'WNI') }}" class="w-full mt-1 border-orange-300 bg-orange-50 rounded-lg"></div>

                        <div><label class="text-xs font-bold text-gray-500 uppercase">Agama</label>
                            <select name="agama" class="w-full mt-1 border-gray-300 rounded-lg">
                                <option value="Islam" {{ old('agama') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                <option value="Kristen" {{ old('agama') == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                <option value="Katolik" {{ old('agama') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                <option value="Hindu" {{ old('agama') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Buddha" {{ old('agama') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                <option value="Konghucu" {{ old('agama') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                            </select>
                        </div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Tempat Lahir</label><input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Tgl Lahir</label><input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Jenis Kelamin</label>
                            <select name="jenis_kelamin" required class="w-full mt-1 border-gray-300 rounded-lg">
                                <option value="" disabled selected>-- Pilih --</option>
                                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="md:col-span-3"><label class="text-xs font-bold text-gray-500 uppercase">Alamat Lengkap</label><textarea name="alamat" class="w-full mt-1 border-gray-300 rounded-lg">{{ old('alamat') }}</textarea></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Kelurahan</label><input type="text" name="kelurahan" value="{{ old('kelurahan') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Kecamatan</label><input type="text" name="kecamatan" value="{{ old('kecamatan') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Kota/Kab</label><input type="text" name="kota" value="{{ old('kota') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Status Tinggal</label><input type="text" name="status_tinggal" value="{{ old('status_tinggal') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Anak Ke</label><input type="number" name="anak_ke" value="{{ old('anak_ke') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Jml Saudara</label><input type="number" name="jumlah_saudara" value="{{ old('jumlah_saudara') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                    </div>
                </div>

                {{-- BAGIAN INPUT NIS & NISN  --}}
                <div class="mt-8 bg-amber-50 p-6 rounded-2xl border border-amber-200 shadow-sm mb-6">
                    <h4 class="text-sm font-bold text-amber-800 uppercase mb-4 flex items-center gap-2">
                        <i class="fas fa-id-card"></i> Identitas Murid (Diisi Pihak PAUD)
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-amber-700 uppercase mb-1">Nomor Induk Murid (NIS)</label>
                            <input type="text" name="nis" value="{{ old('nis') }}" 
                                class="w-full border-amber-300 rounded-lg focus:ring-amber-500 focus:border-amber-500" 
                                placeholder="Contoh: 2024001">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-amber-700 uppercase mb-1">NISN (Nasional)</label>
                            <input type="text" name="nisn" value="{{ old('nisn') }}" 
                                class="w-full border-amber-300 rounded-lg focus:ring-amber-500 focus:border-amber-500" 
                                placeholder="Nomor Induk Siswa Nasional">
                        </div>
                    </div>
                </div>

                {{-- II. KESEHATAN & MINAT BAKAT --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="bg-orange-50 px-6 py-4 border-b border-orange-100">
                        <h3 class="text-orange-700 font-bold flex items-center"><i class="fas fa-heartbeat mr-2"></i> II. KESEHATAN & MINAT BAKAT</h3>
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-4 gap-5">
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Tinggi (cm)</label><input type="number" step="0.1" name="tinggi" value="{{ old('tinggi') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Berat (kg)</label><input type="number" step="0.1" name="berat" value="{{ old('berat') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Lingkar Kepala</label><input type="number" step="0.1" name="lingkar_kepala" value="{{ old('lingkar_kepala') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Kebutuhan Khusus</label><input type="text" name="kebutuhan_khusus" value="{{ old('kebutuhan_khusus') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div class="md:col-span-2"><label class="text-xs font-bold text-gray-500 uppercase">Hobi</label><input type="text" name="hobi" value="{{ old('hobi') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div class="md:col-span-2"><label class="text-xs font-bold text-gray-500 uppercase">Cita-Cita</label><input type="text" name="cita_cita" value="{{ old('cita_cita') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                    </div>
                </div>

                {{-- III. DATA AYAH KANDUNG --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="bg-gray-800 px-6 py-4 border-b">
                        <h3 class="text-white font-bold flex items-center"><i class="fas fa-user-tie mr-2"></i> III. DATA AYAH KANDUNG</h3>
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-5">
                        <div class="md:col-span-2"><label class="text-xs font-bold text-gray-500 uppercase">Nama Ayah</label><input type="text" name="nama_ayah" value="{{ old('nama_ayah') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">NIK Ayah</label><input type="text" name="nik_ayah" value="{{ old('nik_ayah') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Tempat Lahir</label><input type="text" name="tempat_lahir_ayah" value="{{ old('tempat_lahir_ayah') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Tgl Lahir</label><input type="date" name="tgl_lahir_ayah" value="{{ old('tgl_lahir_ayah') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Pendidikan</label><input type="text" name="pendidikan_ayah" value="{{ old('pendidikan_ayah') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Pekerjaan</label><input type="text" name="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Penghasilan</label><input type="text" name="penghasilan_ayah" value="{{ old('penghasilan_ayah') }}" class="w-full mt-1 border-orange-300 bg-orange-50 font-bold rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">No WA</label><input type="text" name="no_wa_ayah" value="{{ old('no_wa_ayah') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                    </div>
                </div>

                {{-- IV. DATA IBU KANDUNG --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="bg-gray-800 px-6 py-4 border-b">
                        <h3 class="text-white font-bold flex items-center"><i class="fas fa-user-nurse mr-2"></i> IV. DATA IBU KANDUNG</h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                            <div class="md:col-span-2"><label class="text-xs font-bold text-gray-500 uppercase">Nama Ibu</label><input type="text" name="nama_ibu" value="{{ old('nama_ibu') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                            <div><label class="text-xs font-bold text-gray-500 uppercase">NIK Ibu</label><input type="text" name="nik_ibu" value="{{ old('nik_ibu') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                            <div><label class="text-xs font-bold text-gray-500 uppercase">Tempat Lahir</label><input type="text" name="tempat_lahir_ibu" value="{{ old('tempat_lahir_ibu') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                            <div><label class="text-xs font-bold text-gray-500 uppercase">Tgl Lahir</label><input type="date" name="tgl_lahir_ibu" value="{{ old('tgl_lahir_ibu') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                            <div><label class="text-xs font-bold text-gray-500 uppercase">Pendidikan</label><input type="text" name="pendidikan_ibu" value="{{ old('pendidikan_ibu') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                            <div><label class="text-xs font-bold text-gray-500 uppercase">Pekerjaan</label><input type="text" name="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                            <div><label class="text-xs font-bold text-gray-500 uppercase">Penghasilan</label><input type="text" name="penghasilan_ibu" value="{{ old('penghasilan_ibu') }}" class="w-full mt-1 border-orange-300 bg-orange-50 font-bold rounded-lg"></div>
                            <div><label class="text-xs font-bold text-gray-500 uppercase">No WA</label><input type="text" name="no_wa_ibu" value="{{ old('no_wa_ibu') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <p class="text-xs font-bold text-orange-600 mb-3 uppercase">Detail Alamat Domisili Ibu</p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div><label class="text-xs font-bold text-gray-400">Jalan/Dusun</label><input type="text" name="alamat_ibu" value="{{ old('alamat_ibu') }}" class="w-full mt-1 border-gray-300 rounded-lg text-sm"></div>
                                <div><label class="text-xs font-bold text-gray-400">Kelurahan</label><input type="text" name="kelurahan_ibu" value="{{ old('kelurahan_ibu') }}" class="w-full mt-1 border-gray-300 rounded-lg text-sm"></div>
                                <div><label class="text-xs font-bold text-gray-400">Kecamatan</label><input type="text" name="kecamatan_ibu" value="{{ old('kecamatan_ibu') }}" class="w-full mt-1 border-gray-300 rounded-lg text-sm"></div>
                                <div><label class="text-xs font-bold text-gray-400">Kota/Kab</label><input type="text" name="kota_ibu" value="{{ old('kota_ibu') }}" class="w-full mt-1 border-gray-300 rounded-lg text-sm"></div>
                                <div class="md:col-span-2"><label class="text-xs font-bold text-gray-400">Provinsi</label><input type="text" name="provinsi_ibu" value="{{ old('provinsi_ibu') }}" class="w-full mt-1 border-gray-300 rounded-lg text-sm"></div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- V. DATA WALI (OPSIONAL) --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="bg-orange-50 px-6 py-4 border-b border-orange-100">
                        <h3 class="text-orange-700 font-bold flex items-center"><i class="fas fa-users mr-2"></i> V. DATA WALI (OPSIONAL)</h3>
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-5">
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Nama Wali</label><input type="text" name="nama_wali" value="{{ old('nama_wali') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">NIK Wali</label><input type="text" name="nik_wali" value="{{ old('nik_wali') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Hubungan</label><input type="text" name="hubungan_wali" value="{{ old('hubungan_wali') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Tempat Lahir</label><input type="text" name="tempat_lahir_wali" value="{{ old('tempat_lahir_wali') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Tgl Lahir</label><input type="date" name="tgl_lahir_wali" value="{{ old('tgl_lahir_wali') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Pekerjaan</label><input type="text" name="pekerjaan_wali" value="{{ old('pekerjaan_wali') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">No WA</label><input type="text" name="no_wa_wali" value="{{ old('no_wa_wali') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div class="md:col-span-2"><label class="text-xs font-bold text-gray-500 uppercase">Alamat Wali</label><input type="text" name="alamat_wali" value="{{ old('alamat_wali') }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                    </div>
                </div>

                {{-- VERIFIKASI PENDAFTARAN --}}
                <div class="bg-white rounded-2xl shadow-sm border border-orange-200 overflow-hidden mt-8">
                    <div class="bg-orange-600 px-6 py-4">
                        <h3 class="text-white font-bold flex items-center"><i class="fas fa-check-double mr-2"></i> VERIFIKASI PENDAFTARAN</h3>
                    </div>
                    <div class="p-6">
                        <label class="block text-xs font-bold text-gray-500 uppercase">Atur Status Menjadi:</label>
                        <select name="status" class="w-full mt-2 border-gray-300 rounded-lg focus:ring-orange-500 font-bold text-orange-700">
                            <option value="Menunggu Verifikasi" {{ old('status') == 'Menunggu Verifikasi' ? 'selected' : '' }}>⏳ Menunggu Verifikasi</option>
                            <option value="Diterima" {{ old('status', 'Diterima') == 'Diterima' ? 'selected' : '' }}>✅ Diterima / Aktif</option>
                            <option value="Ditolak" {{ old('status') == 'Ditolak' ? 'selected' : '' }}>❌ Ditolak</option>
                        </select>
                        <p class="text-xs text-gray-500 mt-2 italic">*Pilih "Diterima" agar data anak langsung muncul di Dashboard Guru & Orang Tua.</p>
                    </div>
                </div>

                <div class="flex items-center justify-end space-x-4">
                    <a href="{{ route('admin.siswa.index') }}" class="px-8 py-3 bg-white border border-gray-300 text-gray-700 rounded-xl font-bold hover:bg-gray-50 transition">BATAL</a>
                    <button type="submit" class="px-12 py-3 bg-gradient-to-r from-orange-600 to-amber-600 text-white rounded-xl font-bold shadow-xl hover:scale-105 transition-transform uppercase">
                        SIMPAN UPDATE
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>