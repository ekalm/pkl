@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Data Kota
                         <div class="card">
                         <div class="card-body">
                             <form action="{{route('kota.update',$kota->id)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="form-group">
                        <label for="">Nama Provinsi</label>
                        <select type="text" name ="id_provinsi" class ="form-control" required>
                        @foreach($provinsi as $data)
                        <option value="{{$data->id}}">{{$data->nama_provinsi}}</option>
                        @endforeach
                        <select>
                    </div>
                        <div class="form-group">
                        <label for="">Kode Kota</label>
                        <input type="text" name ="kode_kota" class ="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Kota</label>
                        <input type="text" name ="nama_kota" class ="form-control" required>
                    </div>
                        <div class ="form-group">
                        <button type ="submit" class = "btn btn-primary">Simpan</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>
</div>
@endsection

