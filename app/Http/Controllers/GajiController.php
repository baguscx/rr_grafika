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
        //
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
            'tidak_hadir' => 'required',
        ]);

        Gaji::create([
            'name' => $request->name,
            'bagian' => $request->bagian,
            'gaji' => $request->gaji,
            'hadir' => $request->hadir,
            'tidak_hadir' => $request->tidak_hadir,
            'total_gaji' => $request->hadir*$request->gaji,
        ]);

        // Redirect berdasarkan bagian
        if ($validatedData['bagian'] == 'operator') {
            return redirect()->route('gaji.operator');
        } elseif ($validatedData['bagian'] == 'karyawan') {
            return redirect()->route('gaji.karyawan');
        }
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
            return back();
    }

    public function karyawan()
    {
        $gajis = Gaji::where('bagian', 'karyawan')->get();
        return view('gaji.karyawan', compact('gajis'));
    }

    public function operator()
    {
        $gajis = Gaji::where('bagian', 'operator')->get();
        return view('gaji.operator', compact('gajis'));
    }
}
