<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barang::create([
            'kode_barang' => 'GRFK-01233001',
            'nama_barang' => 'Laptop Asus ROG',
            'harga_barang' => 25000000,
            'stok_barang' => 10
        ]);

        Barang::create([
            'kode_barang' => 'GRFK-01233002',
            'nama_barang' => 'Laptop Lenovo Legion',
            'harga_barang' => 20000000,
            'stok_barang' => 5
        ]);

        Barang::create([
            'kode_barang' => 'GRFK-01233003',
            'nama_barang' => 'Laptop HP Omen',
            'harga_barang' => 18000000,
            'stok_barang' => 3
        ]);

        Barang::create([
            'kode_barang' => 'GRFK-01233004',
            'nama_barang' => 'Laptop Dell G3',
            'harga_barang' => 15000000,
            'stok_barang' => 7
        ]);

        Barang::create([
            'kode_barang' => 'GRFK-01233005',
            'nama_barang' => 'Laptop Acer Nitro',
            'harga_barang' => 12000000,
            'stok_barang' => 2
        ]);


    }
}
