@php
    // 1. Tentukan alamat file logo di folder public/images
    $logo1Path = public_path('images/log1.png'); // Ganti 'log1.png' dengan nama file logo yayasanmu
    $logo2Path = public_path('images/log2.png'); // Ganti 'log2.png' dengan nama file logo paudqu-mu
    
    // 2. Cek apakah filenya ada, kalau ada ubah jadi kode Base64 agar tidak error GD Extension
    $logo1 = file_exists($logo1Path) ? base64_encode(file_get_contents($logo1Path)) : '';
    $logo2 = file_exists($logo2Path) ? base64_encode(file_get_contents($logo2Path)) : '';
@endphp

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Formulir - {{ $siswa->nama_lengkap }}</title>
    <style>
        @page { margin: 1cm; }
        body { font-family: 'Times New Roman', serif; font-size: 10pt; line-height: 1.3; color: #000; }
        
        /* KOP SURAT SESUAI GAMBAR */
        .kop-container { width: 100%; border-bottom: 3px double #000; padding-bottom: 5px; margin-bottom: 15px; position: relative; height: 110px; }
        .logo-kiri { position: absolute; left: 0; top: 5px; width: 75px; }
        .logo-kanan { position: absolute; right: 0; top: 5px; width: 80px; }
        .tengah-kop { text-align: center; width: 80%; margin: 0 auto; }
        .tengah-kop h2 { margin: 0; font-size: 11pt; font-weight: normal; }
        .tengah-kop h1 { margin: 2px 0; font-size: 14pt; text-transform: uppercase; font-weight: bold; }
        .tengah-kop p { margin: 1px 0; font-size: 8pt; }

        .judul-form { text-align: center; text-decoration: underline; font-weight: bold; margin: 15px 0; font-size: 12pt; }

        /* TABEL DATA LENGKAP */
        .table-data { width: 100%; border-collapse: collapse; margin-bottom: 10px; }
        .table-data td { border: 1px solid #000; padding: 4px 6px; vertical-align: top; }
        .section-title { background-color: #e9e9e9; font-weight: bold; text-transform: uppercase; }
        .label { width: 35%; font-weight: bold; }
        .value { text-transform: uppercase; }

        /* TANDA TANGAN */
        .ttd-section { width: 100%; margin-top: 30px; }
        .ttd-box { float: left; width: 45%; text-align: center; }
        .space-ttd { height: 70px; }
    </style>
</head>
<body>

    <div class="kop-container">
       <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/log1.png'))) }}" class="logo-kiri">
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/log2.png'))) }}" class="logo-kanan"> --}}
        <img src="data:image/png;base64,{{ $logo1 }}" class="logo-kiri">
        <img src="data:image/png;base64,{{ $logo2 }}" class="logo-kanan">
        <div class="tengah-kop">
            <h2>YAYASAN AL-ABBASIYYAH 01 GUNUNG PUTRI</h2>
            <h1>PAUDQU AL-ABBASIYYAH</h1>
            <p>NSPQ : 402.2.32.01.0013</p>
            <p>Kp. Gunungputri Utara RT.002/011 Ds. Gunung Putri Kec. Gunung Putri - Kab. Bogor</p>
        </div>
    </div>

    <div class="judul-form">FORMULIR PENDAFTARAN PESERTA DIDIK BARU</div>
    <div class="tengah-kop">
        <p>TAHUN AJARAN 2026/2027</p>
        </div>
        <br>
    <table class="table-data">
        <tr><td colspan="2" class="section-title">I. DATA PRIBADI MURID</td></tr>
        {{-- NIS & NISN DI PDF --}}
        <tr>
            <td class="label">Nomor Induk Siswa (NIS)</td>
            <td class="value"><strong>{{ $siswa->nis ?? '-' }}</strong></td>
        </tr>
        <tr>
            <td class="label">Nomor Induk Siswa Nasional (NISN)</td>
            <td class="value"><strong>{{ $siswa->nisn ?? '-' }}</strong></td>
        </tr>
        <tr><td class="label">Nama Lengkap (Sesuai Akta)</td><td class="value">{{ $siswa->nama_lengkap }}</td></tr>
        <tr><td class="label">Nama Panggilan</td><td class="value">{{ $siswa->nama_panggilan }}</td></tr>
        <tr><td class="label">NIK / No. Akta Kelahiran</td><td class="value">{{ $siswa->nik }} / {{ $siswa->no_akta }}</td></tr>
        <tr><td class="label">Tempat, Tanggal Lahir</td><td class="value">{{ $siswa->tempat_lahir }}, {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->translatedFormat('d F Y') }}</td></tr>
        <tr><td class="label">Jenis Kelamin / Agama</td><td class="value">{{ $siswa->jenis_kelamin == 'L' ? 'LAKI-LAKI' : 'PEREMPUAN' }} / {{ $siswa->agama }}</td></tr>
        <tr><td class="label">Alamat Lengkap</td><td class="value">{{ $siswa->alamat }}, KEL. {{ $siswa->kelurahan }}, KEC. {{ $siswa->kecamatan }}, {{ $siswa->kota }}</td></tr>
        <tr><td class="label">Anak Ke / Jumlah Saudara</td><td class="value">{{ $siswa->anak_ke }} dari {{ $siswa->jml_saudara }} bersaudara</td></tr>
        <tr><td class="label">Cita-cita / Hobi</td><td class="value">{{ $siswa->cita_cita ?? '-' }} / {{ $siswa->hobi ?? '-' }}</td></tr>

        <tr><td colspan="2" class="section-title">II. DATA KESEHATAN</td></tr>
        <tr><td class="label">Tinggi / Berat / Lingkar Kepala</td><td class="value">{{ $siswa->tinggi }} cm / {{ $siswa->berat }} kg / {{ $siswa->lingkar_kepala }} cm</td></tr>

        <tr><td colspan="2" class="section-title">III. DATA AYAH KANDUNG</td></tr>
        <tr><td class="label">Nama Lengkap Ayah / NIK</td><td class="value">{{ $siswa->nama_ayah }} / {{ $siswa->nik_ayah }}</td></tr>
        <tr><td class="label">Tempat, Tgl Lahir Ayah</td><td class="value">{{ $siswa->tempat_lahir_ayah }}, {{ $siswa->tgl_lahir_ayah }}</td></tr>
        <tr><td class="label">Pendidikan / Pekerjaan</td><td class="value">{{ $siswa->pendidikan_ayah }} / {{ $siswa->pekerjaan_ayah }}</td></tr>
        <tr><td class="label">No. WA Ayah</td><td class="value">{{ $siswa->no_wa_ayah }}</td></tr>

        <tr><td colspan="2" class="section-title">IV. DATA IBU KANDUNG</td></tr>
        <tr><td class="label">Nama Lengkap Ibu / NIK</td><td class="value">{{ $siswa->nama_ibu }} / {{ $siswa->nik_ibu }}</td></tr>
        <tr><td class="label">Pendidikan / Pekerjaan</td><td class="value">{{ $siswa->pendidikan_ibu }} / {{ $siswa->pekerjaan_ibu }}</td></tr>
        <tr><td class="label">No. WA Ibu</td><td class="value">{{ $siswa->no_wa_ibu }}</td></tr>

        @if($siswa->nama_wali)
        <tr><td colspan="2" class="section-title">V. DATA WALI</td></tr>
        <tr><td class="label">Nama Wali / Hubungan</td><td class="value">{{ $siswa->nama_wali }} ({{ $siswa->hubungan_wali }})</td></tr>
        <tr><td class="label">Pekerjaan / No. WA Wali</td><td class="value">{{ $siswa->pekerjaan_wali ?? '-' }} / {{ $siswa->no_wa_wali ?? '-' }}</td></tr>
        @endif
    </table>

    <div class="ttd-section">
        <div style="text-align: right; margin-right: 30px; margin-bottom: 10px;">Bogor, {{ date('d F Y') }}</div>
        <div class="ttd-box">
            <p>Orang Tua / Wali Murid,</p>
            <div class="space-ttd"></div>
            <p><b>( {{ $siswa->user->name }} )</b></p>
        </div>
        <div class="ttd-box" style="float: right;">
            <p>Petugas Administrasi,</p>
            <div class="space-ttd"></div>
            <p><b>( ____________________ )</b></p>
        </div>
    </div>

</body>
</html>