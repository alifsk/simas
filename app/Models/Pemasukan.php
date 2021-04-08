<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;
    protected $table = 'pemasukan';
    protected $fillable = [
        'tgl_pemasukan',
        'sumber_dana_id',
        'jumlah_pemasukan',
        'keterangan'
    ];
}
