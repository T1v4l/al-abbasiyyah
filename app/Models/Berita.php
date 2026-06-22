<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    // Ini agar semua kolom di tabel bisa diisi secara massal
    protected $guarded = []; 
}