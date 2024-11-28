<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_anggota',
        'id_buku',
        'tanggal_pinjam',
        'tanggal_jatuh_tempo',
        'dikembalikan'
    ];

    protected $primaryKey = 'id_peminjaman';
    public $timestamps = false;

    public function anggota(){
        return $this->hasOne('App\Models\anggota', 'id_anggota', 'id_anggota');
    }

    public function buku(){
        return $this->hasOne('App\Models\buku', 'id_buku', 'id_buku');
    }
}
