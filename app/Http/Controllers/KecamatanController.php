<?php

namespace App\Http\Controllers;

use App\Models\kecamatan;
use App\Models\kota;
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
        $kecamatan = Kecamatan::with('kota')->get();
        return view('admin.kecamatan.index', compact('kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatan = Kota::all();
        return view('admin.kecamatan.create', compact('kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kecamatan' => 'required|unique:kecamatans'
        ], [
            'nama_kecamatan.required' => 'Nama kecamatan tidak boleh kosong',
            'nama_kecamatan.unique' => 'Nama kecamatan sudah terdaftar'
        ]);
        $kecamatan = new Kecamatan();
        $kecamatan->id_kota = $request->id_kota;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')
            ->with(['success'=>'Data <b>', $kecamatan->nama_kecamatan, 
            '</b> Berhasil di input']);
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
        return view('admin.kecamatan.show', compact('kecamatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kota = Kota::all();
        $kecamatan = Kecamatan::findOrFail($id);
        return view('admin.kecamatan.edit', compact('kecamatan', 'kota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'kode_kecamtan' => 'required|max:3',
            'nama_kecamatan' => 'required|unique:kotas'
        ], [
            'kode_.required' => 'Kode kota tidak boleh kosong',
            'kode_kecamatan.max' => 'Kode maximal 3 karakter',
            'nama_kecamatan.required' => 'Nama kota tidak boleh kosong',
            'nama_kecamatan.unique' => 'Nama kota sudah terdaftar'
        ]);
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->id_kota = $request->id_kota;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')
            ->with(['success'=>'Data <b>', $kecamatan->nama_kecamatan, 
            '</b> Berhasil di edit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->delete();
        return redirect()->route('kecamatan.index')
            ->with(['success'=>'Data <b>', $kecamatan->nama_kecamatan, 
            '</b> Berhasil di hapus']);
    }
}