<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_pengembalian',
        'rating',
        'ulasan',
        'tanggal_dibuat'
    ];

    protected $primaryKey = 'id_rating';
    public $timestamps = false;
}
