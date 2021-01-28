@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Edit Data Kasus
                         <div class="card-body">
                             <form action="{{route('kasus.update',$kasus->id)}}" method="post">
                             <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="form-group">
                        <label for="">Rw</label>
                        <select name="id_rw" class="form-control" required>
                        @foreach($rw as $data)
                        <option value="{{$data->id}}" {{$data_id = $kasus->id_rw?"selected";""}}>{{$data->nama}}</option>
                        @endforeach
                        </select>
                        </div>
                        <div class="form-group">
                        <div class="mb-12">
                        <label for="exampleInputPassword" class="form-label">Reaktif</label>
                        <input type="number" class="form-control" id="exampleInputPassword" name="reaktif" value="{{$kasus->jumlah_reaktif}}" required>
                        </div>
                    </div>
                    </div>
                        <div class="form-group">
                        <div class="mb-12">
                        <label for="exampleInputPassword" class="form-label">Positif</label>
                        <input type="number" class="form-control" id="exampleInputPassword" name="positif" value="{{$kasus->jumlah_positif}}" required>
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="mb-12">
                        <label for="exampleInputPassword" class="form-label">Meningal</label>
                        <input type="number" class="form-control" id="exampleInputPassword" name="meninggal" value="{{$kasus->jumlah_meninggal}}" required>
                        </div>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="mb-12">
                        <label for="exampleInputPassword" class="form-label">Sembuh</label>
                        <input type="number" class="form-control" id="exampleInputPassword" name="sembuh" value="{{$kasus->jumlah_sembuh}}" required>
                        </div>
                        </div>
                        <div class ="form-group">
                        <button type ="submit" class = "btn btn-primary">Add Data</button>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>
@endsection