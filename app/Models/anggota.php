<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anggota extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'nama',
        'email',
        'jkl',
        'alamat',
        'tanggal_bergabung'
    ];

    protected $primaryKey = 'id_anggota';

    public $timestamps = false;
}
