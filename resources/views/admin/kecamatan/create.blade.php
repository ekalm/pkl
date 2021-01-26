@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="class-header">
                     Tambah Data Kecamatan
                     </div>
                         <div class="card-body">
                             <form action="{{route('kota.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                        <label for="">Kode Kecamatan</label>
                        <input type="text" name ="kode_kecamatan" class ="form-control" required>
                        </div>
                        <div class ="form-group">
                            <label for="">Nama Provinsi</label>
                            <input type="text" name="id_provinsi" class="form-control" require>
                            @foreach($provinsi as $data)
                            <option value="{{$data->id}}">{{$data->nama_provinsi}}</option>
                            @endforeach
                            <select>
                        </div>
                        <div class ="form-group">
                            <label for="">Nama Kecamatan</label>
                            <input type="text" name="nama_kecamatan" class="form-control" require>
                        </div>
                        <div class="form-group">
                        <button type ="submit" class = "btn btn-danger btn-sm">Simpan</button>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
         </div>
@endsection

