@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Data Provinsi 
                         <div class="card-body">
                         @if (count($errors)> 0)
                             <div class="alert alert-danger">
                                 <ul>
                                     @foreach ($errors->all() as $error)
                                     <li>{{$error}}</li>
                                     @endforeach
                                 </ul>
                             </div>
                             @endif
                             <form action="{{route('provinsi.update',$provinsi->id)}}" method="post">
                        @method('put')
                        @csrf
                        <div class="form-group">
                        <label for="">Kode Provinsi</label>
                        <input type="text" name ="kode_provinsi" value="{{$provinsi->kode_provinsi}}" class ="form-control">
                    </div>
                        <div class="form-group">
                        <label for="">Nama Provinsi</label>
                        <input type="text" name ="nama_provinsi" value="{{$provinsi->nama_provinsi}}" class ="form-control">
                    </div>
                        <div class ="form-group">
                        <button type ="submit" class = "btn btn-primary btn-primary btn-block">Simpan</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>
</div>
@endsection