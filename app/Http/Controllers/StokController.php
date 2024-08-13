<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stoks = Stok::latest()->get();
        return view('owner.stok.index', compact('stoks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Stok::create([
            'nama_barang' => $request->namaBarang,
            'jumlah_barang' => $request->jumlahBarang,
            'harga_barang' => $request->hargaBarang,
            'total_harga' => $request->jumlahBarang * $request->hargaBarang,
            'barang_keluar' => 0,
            'barang_masuk' => $request->jumlahBarang,
            'barang_tersedia' => $request->jumlahBarang
        ]);

        return redirect()->route('stok.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stok $stok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stok $stok)
    {
        $dataPage = [
            'title' => 'Edit stok',
            'description' => 'Edit data stok',
            'button' => 'Update',
            'method' => 'PATCH',
            'url' => route('stok.update', $stok),
        ];
        return view('owner.stok.form', compact('stok', 'dataPage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stok $stok)
    {
        $stok->update([
            'nama_barang' => $request->nama_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'harga_barang' => $request->harga_barang,
            'total_harga' => ($request->jumlah_barang - $request->barang_keluar) * $request->harga_barang,
            'barang_keluar' => $request->barang_keluar,
            'barang_masuk' => $request->jumlah_barang,
            'barang_tersedia' => $request->jumlah_barang - $request->barang_keluar
        ]);

        return redirect()->route('stok.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stok $stok)
    {
        $stok->delete();
        return redirect()->route('stok.index');
    }
}
