@extends('layouts.admin')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">{{__('kota')}}
         </div>
         <div class="card">
         <a href="{{route('kota.create')}}"
         class="btn btn-primary float-right">Add Data</a>
         <div class="card-body">
         @if(session('status'))
         <div class="alert alert-succes" role="alert">
         </div>
         @endif
         <table class="table table-dark table-hover">
         <thead>
         <tr>
             <th>No</th>
             <th>Nama Provinsi</th>
             <th>Kode Kota</th>
             <th>Nama Kota</th>
             <th>Aksi</th>
         </tr>
         </thead>
         <tbody>
         @php $no=1; @endphp
         @foreach($kota as $data)
         <tr>
           <td>{{$no++}}</td>
           <td>{{$data->provinsi->nama_provinsi}}</td>
           <td>{{$data->kode_provinsi}}</td>
           <td>{{$data->nama_kota}}</td>
           <td>
           <form action="{{route('kota.destroy',$data->id)}}" method="post">
           @scrf
           @method('DELETE')
           <a href="{{route('kota.edit',$data->id)}}" class="btn btn-success">Edit</a>
           <a href="{{route('kota.show',$data->id)}}" class="btn btn-success">Show</a>
           <button type="submit" class="btn btn-danger">Delete</button>
           </form>
           </button>
          </form>
        </td>
      </tr>
      @endforeach
      </tbody>
    </table>
  </div>
  </div>
  </div>
  </div>
  </div>
  @endsection

                     
