<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zakat extends Model
{
    use HasFactory;
    protected $table = 'zakat';
    protected $fillable = [
        'jenis_zakat_id',
        'tgl',
        'pembayar',
        'keterangan',
    ];
}
