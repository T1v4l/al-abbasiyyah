<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-white bg-gradient-to-r from-gray-800 to-amber-500 p-5 rounded-xl shadow-lg">
            <i class="fas fa-user-edit mr-2"></i> Edit Perbarui Formulir: <span class="text-green-300">{{ isset($siswa) ? strtoupper($siswa->nama_lengkap) : 'DATA TIDAK DITEMUKAN' }}</span>
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

            <form action="{{ route('admin.siswa.update', $siswa->id) }}" method="POST" class="space-y-8">
                @csrf
                @method('PUT')

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="bg-orange-50 px-6 py-4 border-b border-orange-100">
                        <h3 class="text-orange-700 font-bold flex items-center"><i class="fas fa-child mr-2"></i> I. IDENTITAS & DOMISILI ANAK</h3>
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-5">
                        <div class="md:col-span-2">
                            <label class="text-xs font-bold text-gray-500 uppercase">Nama Lengkap (Sesuai Akta)</label>
                            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $siswa->nama_lengkap) }}" class="w-full mt-1 border-gray-300 rounded-lg">
                        </div>
                        <div>
                            <label class="text-xs font-bold text-gray-500 uppercase">Nama Panggilan</label>
                            <input type="text" name="nama_panggilan" value="{{ old('nama_panggilan', $siswa->nama_panggilan) }}" class="w-full mt-1 border-gray-300 rounded-lg">
                        </div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">NIK</label><input type="text" name="nik" value="{{ $siswa->nik }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">No Akta</label><input type="text" name="no_akta" value="{{ $siswa->no_akta }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Kewarganegaraan</label><input type="text" name="kewarganegaraan" value="{{ old('kewarganegaraan', $siswa->kewarganegaraan ?? 'WNI') }}" class="w-full mt-1 border-orange-300 bg-orange-50 rounded-lg"></div>
                        
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Agama</label><input type="text" name="agama" value="{{ $siswa->agama }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Tempat Lahir</label><input type="text" name="tempat_lahir" value="{{ $siswa->tempat_lahir }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Tgl Lahir</label><input type="date" name="tanggal_lahir" value="{{ $siswa->tanggal_lahir }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="w-full mt-1 border-gray-300 rounded-lg">
                                <option value="Laki-laki" {{ $siswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ $siswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="md:col-span-3"><label class="text-xs font-bold text-gray-500 uppercase">Alamat Lengkap</label><textarea name="alamat" class="w-full mt-1 border-gray-300 rounded-lg">{{ $siswa->alamat }}</textarea></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Kelurahan</label><input type="text" name="kelurahan" value="{{ $siswa->kelurahan }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Kecamatan</label><input type="text" name="kecamatan" value="{{ $siswa->kecamatan }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Kota/Kab</label><input type="text" name="kota" value="{{ $siswa->kota }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Status Tinggal</label><input type="text" name="status_tinggal" value="{{ $siswa->status_tinggal }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Anak Ke</label><input type="number" name="anak_ke" value="{{ $siswa->anak_ke }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Jml Saudara</label><input type="number" name="jml_saudara" value="{{ $siswa->jml_saudara }}" class="w-full mt-1 border-gray-300 rounded-lg"></div>
                    </div>
                </div>

                {{-- BAGIAN INPUT NIS & NISN  --}}
                <div class="mt-8 bg-amber-50 p-6 rounded-2xl border border-amber-200 shadow-sm mb-6">
                    <h4 class="text-sm font-bold text-amber-800 uppercase mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2" /></svg>
                        Identitas Murid (Diisi Pihak PAUD)
                    </h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold text-amber-700 uppercase mb-1">Nomor Induk Murid (NIS)</label>
                            <input type="text" name="nis" value="{{ old('nis', $siswa->nis) }}" 
                                class="w-full border-amber-300 rounded-lg focus:ring-amber-500 focus:border-amber-500" 
                                placeholder="Contoh: 2024001">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-amber-700 uppercase mb-1">NISN (Nasional)</label>
                            <input type="text" name="nisn" value="{{ old('nisn', $siswa->nisn) }}" 
                                class="w-full border-amber-300 rounded-lg focus:ring-amber-500 focus:border-amber-500" 
                                placeholder="Nomor Induk Siswa Nasional">
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="bg-orange-50 px-6 py-4 border-b border-orange-100">
                        <h3 class="text-orange-700 font-bold flex items-center"><i class="fas fa-heartbeat mr-2"></i> II. KESEHATAN & MINAT BAKAT</h3>
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-4 gap-5">
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Tinggi (cm)</label><input type="number" step="0.1" name="tinggi" value="{{ $siswa->tinggi }}" class="w-full border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Berat (kg)</label><input type="number" step="0.1" name="berat" value="{{ $siswa->berat }}" class="w-full border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Lingkar Kepala</label><input type="number" step="0.1" name="lingkar_kepala" value="{{ $siswa->lingkar_kepala }}" class="w-full border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Kebutuhan Khusus</label><input type="text" name="kebutuhan_khusus" value="{{ $siswa->kebutuhan_khusus }}" class="w-full border-gray-300 rounded-lg"></div>
                        <div class="md:col-span-2"><label class="text-xs font-bold text-gray-500 uppercase">Hobi</label><input type="text" name="hobi" value="{{ $siswa->hobi }}" class="w-full border-gray-300 rounded-lg"></div>
                        <div class="md:col-span-2"><label class="text-xs font-bold text-gray-500 uppercase">Cita-Cita</label><input type="text" name="cita_cita" value="{{ $siswa->cita_cita }}" class="w-full border-gray-300 rounded-lg"></div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="bg-gray-800 px-6 py-4 border-b">
                        <h3 class="text-white font-bold flex items-center"><i class="fas fa-user-tie mr-2"></i> III. DATA AYAH KANDUNG (KK: {{ $siswa->no_kk }})</h3>
                        <input type="hidden" name="no_kk" value="{{ $siswa->no_kk }}">
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-5">
                        <div class="md:col-span-2"><label class="text-xs font-bold text-gray-500 uppercase">Nama Ayah</label><input type="text" name="nama_ayah" value="{{ $siswa->nama_ayah }}" class="w-full border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">NIK Ayah</label><input type="text" name="nik_ayah" value="{{ $siswa->nik_ayah }}" class="w-full border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Tempat Lahir</label><input type="text" name="tempat_lahir_ayah" value="{{ $siswa->tempat_lahir_ayah }}" class="w-full border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Tgl Lahir</label><input type="date" name="tgl_lahir_ayah" value="{{ $siswa->tgl_lahir_ayah }}" class="w-full border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Pendidikan</label><input type="text" name="pendidikan_ayah" value="{{ $siswa->pendidikan_ayah }}" class="w-full border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Pekerjaan</label><input type="text" name="pekerjaan_ayah" value="{{ $siswa->pekerjaan_ayah }}" class="w-full border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Penghasilan</label><input type="text" name="penghasilan_ayah" value="{{ $siswa->penghasilan_ayah }}" class="w-full border-orange-300 bg-orange-50 font-bold rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">No WA</label><input type="text" name="no_wa_ayah" value="{{ $siswa->no_wa_ayah }}" class="w-full border-gray-300 rounded-lg"></div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="bg-gray-800 px-6 py-4 border-b">
                        <h3 class="text-white font-bold flex items-center"><i class="fas fa-user-nurse mr-2"></i> IV. DATA IBU KANDUNG</h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                            <div class="md:col-span-2"><label class="text-xs font-bold text-gray-500 uppercase">Nama Ibu</label><input type="text" name="nama_ibu" value="{{ $siswa->nama_ibu }}" class="w-full border-gray-300 rounded-lg"></div>
                            <div><label class="text-xs font-bold text-gray-500 uppercase">NIK Ibu</label><input type="text" name="nik_ibu" value="{{ $siswa->nik_ibu }}" class="w-full border-gray-300 rounded-lg"></div>
                            <div><label class="text-xs font-bold text-gray-500 uppercase">Tempat Lahir</label><input type="text" name="tempat_lahir_ibu" value="{{ $siswa->tempat_lahir_ibu }}" class="w-full border-gray-300 rounded-lg"></div>
                            <div><label class="text-xs font-bold text-gray-500 uppercase">Tgl Lahir</label><input type="date" name="tgl_lahir_ibu" value="{{ $siswa->tgl_lahir_ibu }}" class="w-full border-gray-300 rounded-lg"></div>
                            <div><label class="text-xs font-bold text-gray-500 uppercase">Pendidikan</label><input type="text" name="pendidikan_ibu" value="{{ $siswa->pendidikan_ibu }}" class="w-full border-gray-300 rounded-lg"></div>
                            <div><label class="text-xs font-bold text-gray-500 uppercase">Pekerjaan</label><input type="text" name="pekerjaan_ibu" value="{{ $siswa->pekerjaan_ibu }}" class="w-full border-gray-300 rounded-lg"></div>
                            <div><label class="text-xs font-bold text-gray-500 uppercase">Penghasilan</label><input type="text" name="penghasilan_ibu" value="{{ $siswa->penghasilan_ibu }}" class="w-full border-orange-300 bg-orange-50 font-bold rounded-lg"></div>
                            <div><label class="text-xs font-bold text-gray-500 uppercase">No WA</label><input type="text" name="no_wa_ibu" value="{{ $siswa->no_wa_ibu }}" class="w-full border-gray-300 rounded-lg"></div>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <p class="text-xs font-bold text-orange-600 mb-3 uppercase">Detail Alamat Domisili Ibu</p>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div><label class="text-xs font-bold text-gray-400">Jalan/Dusun</label><input type="text" name="alamat_ibu" value="{{ $siswa->alamat_ibu }}" class="w-full border-gray-300 rounded-lg text-sm"></div>
                                <div><label class="text-xs font-bold text-gray-400">Kelurahan</label><input type="text" name="kelurahan_ibu" value="{{ $siswa->kelurahan_ibu }}" class="w-full border-gray-300 rounded-lg text-sm"></div>
                                <div><label class="text-xs font-bold text-gray-400">Kecamatan</label><input type="text" name="kecamatan_ibu" value="{{ $siswa->kecamatan_ibu }}" class="w-full border-gray-300 rounded-lg text-sm"></div>
                                <div><label class="text-xs font-bold text-gray-400">Kota/Kab</label><input type="text" name="kota_ibu" value="{{ $siswa->kota_ibu }}" class="w-full border-gray-300 rounded-lg text-sm"></div>
                                <div class="md:col-span-2"><label class="text-xs font-bold text-gray-400">Provinsi</label><input type="text" name="provinsi_ibu" value="{{ $siswa->provinsi_ibu }}" class="w-full border-gray-300 rounded-lg text-sm"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="bg-orange-50 px-6 py-4 border-b border-orange-100">
                        <h3 class="text-orange-700 font-bold flex items-center"><i class="fas fa-users mr-2"></i> V. DATA WALI (OPSIONAL)</h3>
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-5">
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Nama Wali</label><input type="text" name="nama_wali" value="{{ $siswa->nama_wali }}" class="w-full border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">NIK Wali</label><input type="text" name="nik_wali" value="{{ $siswa->nik_wali }}" class="w-full border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Hubungan</label><input type="text" name="hubungan_wali" value="{{ $siswa->hubungan_wali }}" class="w-full border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Tempat Lahir</label><input type="text" name="tempat_lahir_wali" value="{{ $siswa->tempat_lahir_wali }}" class="w-full border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Tgl Lahir</label><input type="date" name="tgl_lahir_wali" value="{{ $siswa->tgl_lahir_wali }}" class="w-full border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">Pekerjaan</label><input type="text" name="pekerjaan_wali" value="{{ $siswa->pekerjaan_wali }}" class="w-full border-gray-300 rounded-lg"></div>
                        <div><label class="text-xs font-bold text-gray-500 uppercase">No WA</label><input type="text" name="no_wa_wali" value="{{ $siswa->no_wa_wali }}" class="w-full border-gray-300 rounded-lg"></div>
                        <div class="md:col-span-2"><label class="text-xs font-bold text-gray-500 uppercase">Alamat Wali</label><input type="text" name="alamat_wali" value="{{ $siswa->alamat_wali }}" class="w-full border-gray-300 rounded-lg"></div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-orange-200 overflow-hidden mt-8">
                    <div class="bg-orange-600 px-6 py-4">
                        <h3 class="text-white font-bold flex items-center"><i class="fas fa-check-double mr-2"></i> VERIFIKASI PENDAFTARAN</h3>
                    </div>
                    <div class="p-6">
                        <label class="block text-xs font-bold text-gray-500 uppercase">Ubah Status Menjadi:</label>
                        <select name="status" class="w-full mt-2 border-gray-300 rounded-lg focus:ring-orange-500 font-bold text-orange-700">
                            <option value="Menunggu Verifikasi" {{ $siswa->status == 'Menunggu Verifikasi' ? 'selected' : '' }}>⏳ Menunggu Verifikasi</option>
                            <option value="Diterima" {{ $siswa->status == 'Diterima' ? 'selected' : '' }}>✅ Diterima / Aktif</option>
                            <option value="Ditolak" {{ $siswa->status == 'Ditolak' ? 'selected' : '' }}>❌ Ditolak</option>
                        </select>
                        <p class="text-xs text-gray-500 mt-2 italic">*Pilih "Diterima" agar status pendaftaran berubah di dashboard.</p>
                    </div>
                </div>

                <br>
                <div class="flex items-center justify-end space-x-4">
                    <a href="{{ route('admin.siswa.index') }}" class="px-8 py-3 bg-white border border-gray-300 text-gray-700 rounded-xl font-bold hover:bg-gray-50 transition">BATAL</a>
                    <button type="submit" class="px-12 py-3 bg-gradient-to-r from-orange-600 to-amber-600 text-white rounded-xl font-bold shadow-xl hover:scale-105 transition-transform uppercase">
                        PERBARUI DATA SEKARANG
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>