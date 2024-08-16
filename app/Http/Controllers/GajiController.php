<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gajis = Gaji::latest()->get();
        return view('gaji.index', compact('gajis'));
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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'bagian' => 'required|string',
            'gaji' => 'required|min:0',
            'hadir' => 'required',
        ]);

        Gaji::create([
            'name' => $request->name,
            'bagian' => $request->bagian,
            'gaji' => $request->gaji,
            'hadir' => $request->hadir,
            'total_gaji' => $request->hadir*$request->gaji,
        ]);

        return back()->with('success', 'Berhasil Menambah Data');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gaji $gaji)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gaji $gaji)
    {
        return view('gaji.form');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gaji $gaji)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gaji $gaji)
    {
        $gaji->delete();
            return back()->with('success', 'Berhasil Menghapus Data');
    }

}
