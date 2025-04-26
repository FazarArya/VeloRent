<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Katalog extends Model
{
    use HasFactory;

    protected $fillable = [
        'gambar',
        'jenis_kendaraan',
        'nama_kendaraan',
        'deskripsi',
        'harga_sewa',
        'kategori_id', // Relasi ke kategori
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
