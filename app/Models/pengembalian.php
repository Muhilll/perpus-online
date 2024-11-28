<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengembalian extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_peminjaman',
        'tanggal_pengembalian',
        'denda'
    ];

    protected $primaryKey = 'id_pengembalian';
    public $timestamps = false;

    public function pinjam(){
        return $this->hasOne('App\Models\peminjaman', 'id_peminjaman', 'id_peminjaman');
    }
}
