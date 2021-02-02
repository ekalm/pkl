@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Data Kasus Local') }}</div>

                <div class="card-body">
                <form  action="{{route('kasus.update',$kasus->id)}}" method="post">
                <input type="hidden" name="_method" value="PUT">
                    @csrf
                     <div class="form-group">
                        <label for="">RW</label>
                        <select name="id_rw" class="form-control" required>
                            @foreach($rw as $data)
                            <option value="{{$data->id}}"
                                {{$data->id == $kasus->id_rw ? "selected":""}}>{{$data->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputPassword1" class="form-label">Reaktif</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="reaktif"
                        value="{{$kasus->jumlah_reaktif}}"required>
                    </div>
                      <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputPassword1" class="form-label">Positif</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="positif"
                        value="{{$kasus->jumlah_positif}}"required>
                    </div>
                     </div>
                     <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputPassword1" class="form-label">Sembuh</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="sembuh"
                        value="{{$kasus->jumlah_sembuh}}"required>
                    </div>
                     </div>
                     <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputPassword1" class="form-label">Meninggal</label>
                        <input type="number" class="form-control" id="exampleInputPassword1" name="meninggal"
                        value="{{$kasus->jumlah_meninggal}}"required>
                    </div>
                     </div>
                     <div class="form-group">
                    <div class="mb-12>
                        <label for="exampleInputPassword1" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" name="tanggal"
                        value="{{$kasus->tanggal}}"required>
                    </div>
                     </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add Data</button>
                    </div>
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection