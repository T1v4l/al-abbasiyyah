<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Sudah benar dimasukkan di sini agar bisa diisi saat registrasi/create
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relasi ke data pendaftaran (CalonSiswa)
     */
    public function calonSiswa(): HasOne
    {
        return $this->hasOne(CalonSiswa::class, 'user_id');
    }

    /**
     * Helper untuk mengecek apakah user adalah admin
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}