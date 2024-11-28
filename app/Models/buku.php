<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'penulis',
        'deskripsi',
        'kategori',
        'tahun_terbit',
        'jumlah_ketersediaan',
        'tanggal_dibuat'
    ];

    protected $primaryKey = 'id_buku';
    public $timestamps = false;
}
