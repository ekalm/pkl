<?php

namespace App\Http\Controllers;

use App\Models\provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinsi = Provinsi::all();
        return view('admin.provinsi.index', compact('provinsi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.provinsi.create');
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
            'kode_provinsi' => 'required|max:3',
            'nama_provinsi' => 'required|unique:provinsis'
        ], [
            'kode_provinsi.required' => 'Kode Provinsi tidak boleh kosong',
            'kode_provinsi.max' => 'Kode maximal 3 karakter',
            'nama_provinsi.required' => 'Nama Provinsi tidak boleh kosong',
            'nama_provinsi.unique' => 'Nama Provinsi sudah terdaftar'
        ]);
        $provinsi = new Provinsi();
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi.index')->with(['succress'=>'Data <b>',$provinsi->nama_provinsi,
        '</b> berhasil di input']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $provinsi = Provinsi::findOrfail($id);
        return view('admin.provinsi.show', compact('provinsi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $provinsi = Provinsi::findOrFail($id);
        return view('admin.provinsi.edit', compact('provinsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_provinsi' => 'required|max:3',
            'nama_provinsi' => 'required|unique:provinsis'
        ], [
            'kode_provinsi.required' => 'Kode Provinsi tidak boleh kosong',
            'kode_provinsi.max' => 'Kode maximal 3 karakter',
            'nama_provinsi.required' => 'Nama Provinsi tidak boleh kosong',
            'nama_provinsi.unique' => 'Nama Provinsi sudah terdaftar'
        ]);
        $provinsi = Provinsi::findOrFail($id);
        $provinsi->kode_provinsi = $request->kode_provinsi;
        $provinsi->nama_provinsi = $request->kode_provinsi;
        $provinsi->save();
        return redirect()->route('provinsi.index')->with(['succes'=>'Data <b>', $provinsi->nama_provinsi,
        '<b> Berhasil di edit']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $provinsi = provinsi::findOrfail($id);
        $provinsi->delete();
        return redirect()->route('provinsi.index')->with(['succes'=>'Data <b>', $provinsi->nama_provinsi,
        '<b> berhasil dihapus']);
    }
}