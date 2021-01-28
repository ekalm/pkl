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
                            <div class="form-group">
                                <label for="">Rw</label>
                                <select name="id_rw" class="form-control" required>
                                    @foreach($rw as $data)
                                    <option value="{{$data->id}}">{{$data->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                            <div class="mb-12">
                                <label for="exampleInputPassword" class="form-label">Reaktif</label>
                                <input type="number" class="form-control" id="exampleInputPassword" name="reaktif" required>
                            </div>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="mb-12">
                                <label for="exampleInputPassword" class="form-label">Positif</label>
                                <input type="number" class="form-control" id="exampleInputPassword" name="positif" required>
                            </div>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="mb-12">
                                <label for="exampleInputPassword" class="form-label">Meninggal</label>
                                <input type="number" class="form-control" id="exampleInputPassword" name="meninggal" required>
                            </div>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="mb-12">
                                <label for="exampleInputPassword" class="form-label">Sembuh</label>
                                <input type="number" class="form-control" id="exampleInputPassword" name="sembuh" required>
                            </div>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="mb-12">
                                <label for="exampleInputPassword" class="form-label">Tanggal</label>
                                <input type="number" class="form-control" id="exampleInputPassword" name="tanggal" required>
                            </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn block">Simpan</button>
                                <div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection