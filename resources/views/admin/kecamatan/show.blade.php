@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="class-header">
                     Data Kecamatan
                  </div>
                  <div class="card-body">
                  <div class="form-group">
                  <div class="mb-12">
                  <label for="exampleInputEmail" class="form-label">Kode Kecamatan</label>
                  <input type="number" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" name="kode_kecamatan" value="{{$kecamatan-kode_provinsi}}"readonly>
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="" class="form-label">Asal Provinsi</label>
                  <input type="text" name="id_provinsi" class="form-control" value="{{$kota->provinsi->nama_provinsi}}"readonly>
                  </div>
                  <div class="form-group">
                  <div class="mb-12">
                  <label for="exampleInputPassword" class="form-label">Kecamatan</label>
                  <input type="text" class="form-control" id="exampleInputPassword" name="nama_kota" value="{{$kota-nama_kota}}"readonly>
                  </div>  
                  </div>
                  <div class="form-group">
                  <a href="{{route('kota.index')}}" class="btn btn-primary btn-blok">Kembali</a>
                </div>
               </div>
              </div>
             <div>
            <div>
           <div>

        @endsection



