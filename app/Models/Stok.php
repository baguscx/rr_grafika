<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'jumlah_barang',
        'harga_barang',
        'total_harga',
        'barang_masuk',
        'barang_keluar',
        'barang_tersedia'
    ];
}
