@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                    <b>{{__('Data Kasus')}}</b>
                    </div>
                    <div class="card-body">
                        <form action="{{route('kasus.update', $kasus->id)}}" method="post">
                        <input type="hidden" name="_method" value="put">
                            @csrf
                            @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                            @endif
                            <div class="mb-3">
                            <div class="form-group">
                                <label for="" class="forrm-label">Reaktif</label>
                                <input type="number" name="reaktif" value="{{$kasus->reaktif}}" class="form-control" id="">
                            </div>
                            <div class="mb-3">
                            <div class="form-group">
                                <label for="" class="forrm-label">Positif</label>
                                <input type="number" name="positif" value="{{$kasus->positif}}" class="form-control" id="">
                            </div>
                            <div class="mb-3">
                            <div class="form-group">
                                <label for="" class="forrm-label">Sembuh</label>
                                <input type="number" name="sembuh" value="{{$kasus->sembuh}}" class="form-control" id="">
                            </div>
                            <div class="mb-3">
                            <div class="form-group">
                                <label for="" class="forrm-label">Meninggal</label>
                                <input type="number" name="meninggal" value="{{$kasus->meninggal}}" class="form-control" id="">
                            </div>
                            <div class="mb-3">
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" >
                            </div>
                            <button type="submit" class="btn btn-primary btn block">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection