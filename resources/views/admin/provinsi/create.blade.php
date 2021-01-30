@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                @endif
            <div class="card">
                <div class="card-header">
                    Tambah Data Provinsi 
                         <div class="card-body">
                             <form action="{{route('provinsi.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                        <label for="">Kode Provinsi</label>
                        <input type="text" name ="kode_provinsi" class ="form-control" require>
                        @if($errors->has('kode_provinsi'))
                                    <span class="text-danger">{{ $errors->first('kode_provinsi') }}</span>
                                @endif
                        </div>
                        <div class ="form-group">
                            <label for="">Nama Provinsi</label>
                            <input type="text" name="nama_provinsi" class="form-control" require>
                            @if($errors->has('nama_provinsi'))
                                    <span class="text-danger">{{ $errors->first('nama_provinsi') }}</span>
                                @endif
                        </div>
                        <div class="form-group">
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