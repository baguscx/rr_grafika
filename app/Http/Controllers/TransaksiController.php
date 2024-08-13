<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksis = Transaksi::latest()->get();
        return view('transaksi/index', compact('transaksis'));
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
        Transaksi::create([
            'pemasukan' => $request->pemasukan,
            'pengeluaran' => $request->pengeluaran
        ]);

        return redirect()->route('transaksi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        $dataPage = [
            'title' => 'Edit Transaksi',
            'description' => 'Edit data transaksi',
            'button' => 'Update',
            'method' => 'PATCH',
            'url' => route('transaksi.update', $transaksi),
        ];
        return view('transaksi.form', compact('transaksi', 'dataPage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $transaksi->update([
            'pemasukan' => $request->pemasukan,
            'pengeluaran' => $request->pengeluaran
        ]);

        return redirect()->route('transaksi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
