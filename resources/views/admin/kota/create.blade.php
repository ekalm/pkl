@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="class-header">
                     Tambah Data Kota
                     </div>
                         <div class="card-body">
                             <form action="{{route('kota.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                        <label for="">Kode Kota</label>
                        <input type="text" name ="kode_kota" class ="form-control" required>
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
                            <label for="">Nama Kota</label>
                            <input type="text" name="nama_kota" class="form-control" require>
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

