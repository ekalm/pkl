<?php

namespace App\Http\Controllers;

use App\Models\kasus;
use App\Models\rw;
use Illuminate\Http\Request;

class KasusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kasus = kasus::with('rw')->get();
        return view('kasus.index', compact('kasus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rw = Rw::all();
        return view('kasus.create', compact('rw'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kasus = new Kasus();
        $kasus->jumlah_positif = $request->positif;
        $kasus->jumlah_meninggal = $request->meninggal;
        $kasus->jumlah_sembuh = $request->sembuh;
        $kasus->tanggal = $request->tanggal;
        $kasus->id_rw = $request->id_rw;
        $kasus->save();
        return redirect()->route('kasus.index')->with(['message'=>'Data Berhasil dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kasus = Kasus::findOrFail($id);
        return view('kasus.show', compact('kasus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function edit(kasus $kasus)
    {
        $rw = Rw::all();
        $kasus = Kasus::findOrFail($id);
        return view('kasus.edit', compact('kasus','rw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kasus $kasus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kasus  $kasus
     * @return \Illuminate\Http\Response
     */
    public function destroy(kasus $kasus)
    {
        //
    }
}
