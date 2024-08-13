<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bagian',
        'gaji',
        'hadir',
        'tidak_hadir',
        'total_gaji'
    ];
}
