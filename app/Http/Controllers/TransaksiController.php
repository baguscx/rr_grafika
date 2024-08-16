<?php

namespace App\Http\Controllers;

use App\Models\Barang;
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
        if($request->stokbarang - $request->stoktransaksi >= 0){
            Transaksi::create([
                'nama_transaksi' => $request->namabarang,
                'total_transaksi' => $request->stoktransaksi,
                'nominal_transaksi' => $request->totaltransaksi,
                'jenis_transaksi' => $request->jenistransaksi,
            ]);

            $barang = Barang::find($request->idbarang);
            $barang->update([
                'stok_barang' => $request->stokbarang - $request->stoktransaksi,
            ]);
        return redirect()->route('transaksi.pemasukan');
        } else {
            return back()->with('error', 'Stok barang tidak mencukupi');
        }
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

    public function pemasukan(){
        $barangs = Barang::latest()->get();
        $metaData = [
            'title' => 'Pemasukan',
            'description' => 'Data pemasukan',
            'button' => 'Tambah Pemasukan',
            'url' => route('transaksi.store'),
            'method' => 'POST'
        ];
        $transaksis = Transaksi::where('jenis_transaksi', 'pemasukan')->latest()->get();
        return view('transaksi.index', compact('metaData', 'transaksis', 'barangs'));
    }

    public function barang($id){
        $barang = Barang::find($id);
        return view('transaksi.barang', compact( 'barang'));
    }


    public function pengeluaran(){
        $metaData = [
            'title' => 'Pengeluaran',
            'description' => 'Data pengeluaran',
            'button' => 'Tambah Pengeluaran',
            'url' => route('transaksi.store'),
            'method' => 'POST'
        ];
        $transaksis = Transaksi::where('jenis_transaksi', 'pengeluaran')->latest()->get();
        return view('transaksi.pengeluaran', compact('metaData', 'transaksis'));
    }

    public function storePengeluaran(Request $request){
        Transaksi::create([
            'nama_transaksi' => $request->penggunaan,
            'total_transaksi' => '-',
            'nominal_transaksi' => $request->nominal,
            'jenis_transaksi' => $request->jenistransaksi,
        ]);

        return back()->with('success', 'Data pengeluaran berhasil ditambahkan');
    }

    public function laporan(){
        $transaksis = Transaksi::latest()->get();
        $totalPemasukan = Transaksi::where('jenis_transaksi', 'pemasukan')->sum('nominal_transaksi');
        $totalPengeluaran = Transaksi::where('jenis_transaksi', 'pengeluaran')->sum('nominal_transaksi');
        return view('transaksi.laporan', compact('transaksis', 'totalPemasukan', 'totalPengeluaran'));
    }
}
