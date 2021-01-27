@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <b>Data Rw</b> 
                    <a href="{{route('rw.create')}}" class="btn btn-primary float-right">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>rw</th>
                                <th>desa</th>
                                <th>Aksi</th>
                            </tr>
                            @php $no=1; @endphp
                            @foreach($rw as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->nama_rw}}</td>
                                <td>{{$data->nama_desa}}</td>
                                <td>
                                    <form action="{{route('rw.destroy', $data->id)}}" method="post">
                                        @csrf
                                        @method('Delete')
                                        <a class="btn btn-info" href=" {{ route('rw.show', $data->id) }} ">Show</a>
                                        <a class="btn btn-warning" href=" {{ route('rw.edit', $data->id) }} ">Edit</a>
                                        <button type="submit" class="btn btn-danger" >Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection