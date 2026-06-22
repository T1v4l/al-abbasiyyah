<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terhubung dengan model ini.
     * (Sebenarnya opsional karena Laravel otomatis mencari jamak dari nama class, 
     * tapi ditulis eksplisit lebih aman).
     */
    protected $table = 'programs';

    /**
     * Atribut atau kolom yang diizinkan untuk diisi secara massal (Mass Assignment).
     */
    protected $fillable = [
        'title',
        'category',
        'description',
        'image',
        'highlight_1',
        'highlight_2',
    ];
}