<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisZakat extends Model
{
    use HasFactory;

    protected $table = 'jenis_zakat';
    protected $primaryKey = 'id';
    protected $fillable = ['nama'];
}
