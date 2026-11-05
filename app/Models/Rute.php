<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    protected $table = 'rute';

    protected $fillable = [
        'kode',
        'kategori_angkutan_id',
        'asal',
        'tujuan',
        'jam',
        'tarif',
        'status',
        'foto_rute',
    ];

    public function kategoriAngkutan()
    {
        return $this->belongsTo(KategoriAngkutan::class, 'kategori_angkutan_id');
    }

    public function getFotoUrlAttribute(): ?string
    {
        if (!$this->foto_rute) {
            return null;
        }

        if (str_starts_with($this->foto_rute, 'http://') || str_starts_with($this->foto_rute, 'https://')) {
            return $this->foto_rute;
        }

        return url('/storage/'.ltrim($this->foto_rute, '/'));
    }
}
