<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;

    // Gunakan guarded kosong agar lebih fleksibel saat input data
    protected $guarded = [];

    protected $casts = [
        'tanggal' => 'date',
        'dokumentasi' => 'array', // <--- TAMBAHKAN INI UNTUK MULTIPLE UPLOAD
    ];

    /**
     * Hubungkan Jurnal dengan Murid (CalonSiswa)
     * Ini supaya di Dashboard bisa muncul: "Jurnal milik [Nama Murid]"
     */
    public function calonSiswa()
    {
        return $this->belongsTo(CalonSiswa::class, 'calon_siswa_id');
    }

    /**
     * Hubungkan Jurnal dengan Guru (User)
     * Ini supaya tahu siapa guru yang mengisi jurnal ini
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}