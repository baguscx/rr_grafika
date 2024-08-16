<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
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
        Barang::create([
            'kode_barang' => $request->kodebarang,
            'nama_barang' => $request->namabarang,
            'harga_barang' => $request->hargabarang,
            'stok_barang' => $request->stokbarang
        ]);

        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $barang->update([
            'kode_barang' => $request->kodebarang,
            'nama_barang' => $request->namabarang,
            'harga_barang' => $request->hargabarang,
            'stok_barang' => $request->stokbarang
        ]);

        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        //
    }
}
