<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhutbahJumat extends Model
{
    use HasFactory;
    protected $table = 'khutbah_jumat';
    protected $fillable = [
        'tgl',
        'users_id',
        'topik'
    ];
}
