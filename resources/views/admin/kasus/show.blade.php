@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                    <b>{{__('Data Kasus')}}</b>
                    </div>
                    <div class="card-body">
                    @if(session('status'))
                    <div class="alert alert succes" role="alert">
                    {{session('status')}}
                    </div>
                    @endif
                    <div class="mb-3">
                         <div class="form-group">
                                <label for="class" class="form-label">Reaktif</label>
                                <input type="text" name="reaktif" value="{{$kasus->reaktif}}" class="form-control" id="" readonly>
                            </div>
                    <div class="mb-3">
                         <div class="form-group">
                                <label for="class" class="form-label">Positif</label>
                                <input type="text" name="positif" value="{{$kasus->positif}}" class="form-control" id="" readonly>
                            </div>
                    <div class="mb-3">
                         <div class="form-group">
                                <label for="class" class="form-label">Sembuh</label>
                                <input type="text" name="sembuh" value="{{$kasus->sembuh}}" class="form-control" id="" readonly>
                            </div>
                            <div class="mb-3">
                            <div class="form-group">
                                <label for="" class="forrm-label">Meninggal</label>
                                <input type="number" name="meninggal" value="{{$kasus->meninggal}}" class="form-control" id="">
                            </div>
                            <div class="mb-3">
                         <div class="form-group">
                                <label for="class" class="form-label">Tanggal</label>
                                <input type="date" name="tanggal" value="{{$kasus->tanggal}}" class="form-control" id="" readonly>
                            </div>
                            <div class="form-group">
                                <a href=" {{ route('kasus.index') }} " class="btn btn-danger">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection