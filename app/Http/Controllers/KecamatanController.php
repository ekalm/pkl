<?php

namespace App\Http\Controllers;

use App\Models\kecamatan;
use App\Models\provinsi;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatan = kecamatan::with('provinsi')->get();
        return view('kecamatan.index', compact('kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = Provinsi::all();
        return view('kecamatan.create',compact('provinsi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kecamatan = new Kecamatan();
        $kecamatan->id_provinsi = $request->id_provinsi;
        $kecamatan->kode_provinsi = $request->kode_kecamatan;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->id_provinsi = $request->id_provinsi;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')
        ->with(['message'=>'Data Berhasil Dibuat']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        return view('kecamatan.show',compact('kecamatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provinsi = Provinsi::all();
        $kota = Kota::finOrFail($id);
        $kecamatan = kecamatan::findOrFail();

        //dd($select);
        return view('kecamatan.edit',compact('kecamatan','provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $kecamatan = kecamatan::findOrFail($id);
        $kecamatan->id_provinsi = $request->id_provinsi;
        $kecamatan->kode_provinsi = $request->kode_kecamatan;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')
        ->with(['message'=>'Data Berhasil di Edit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(kecamatan $kecamatan)
    {
        $kecamatan = kota::findOrFail($id)->delete();
        return redirect()->route('kecamatan.index')
        ->with(['message'=>'Data Berhasil Dihapus']);
    }
}
