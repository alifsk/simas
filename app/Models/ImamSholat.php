<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImamSholat extends Model
{
    use HasFactory;
    protected $table = 'imam_sholat';
    protected $fillable = [
        'hari',
        'users_id',
        'muadzin'
    ];
}
