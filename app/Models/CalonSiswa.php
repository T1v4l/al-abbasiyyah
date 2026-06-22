<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany; 

class CalonSiswa extends Model
{
    use HasFactory;

    protected $table = 'calon_siswas';

    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'tanggal_lahir' => 'date',
            'tgl_lahir_ayah' => 'date',
            'tgl_lahir_ibu' => 'date',
            'tgl_lahir_wali' => 'date',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jurnals(): HasMany
    {
        return $this->hasMany(Jurnal::class);
    }
}