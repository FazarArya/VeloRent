<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $fillable = [
        'nama',
        'no_hp',
        'email',
        'katalog_id',
        'status'
    ];

    public function katalog()
    {
        return $this->belongsTo(Katalog::class, 'katalog_id');
    }
}
