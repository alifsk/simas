<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muallaf extends Model
{
    use HasFactory;

    protected $table = 'muallaf';

    protected $fillable = [
        'nama',
        'ktp',
        'jk',
        'lahir',
        'tgl',
        'pekerjaan',
        'agama',
        'kebangsaan',
        'email',
        'telp',
        'foto',
        'alamat',
        'domisili',
        'pernyataan1',
        'pernyataan2',
        'pernyataan3'
    ];
}
