@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Tambah Data Kasus
                    </div>
                    <div class="card-body">
                        <form action="{{route('kasus.store')}}" method="post">
                            @csrf
                            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                            @endif
                            <div class="form-group">
                                <label for="">Pilih Rw</label>
                                <select name="id_rw" class="form-control">
                                    @foreach($kasus as $data)
                                    <option value="{{$data->id}}">{{$data->nama_rw}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Reaktif</label>
                                <input type="number" name="reaktif" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="">Positif</label>
                                <input type="number" name="positif" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="">Sembuh</label>
                                <input type="number" name="sembuh" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="">Meninggal</label>
                                <input type="number" name="meninggal" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" >
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn block">Simpan</button>
                                <a href=" {{ route('kasus.index') }} " class="btn btn-danger">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection