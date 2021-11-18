@extends('adminlte::page')

@section('title', 'Edit Lokasi')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Lokasi</h1>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- route mengarah ke route bernama lokasi (LocationController) pada method bernama update --}}
    <form action="{{route('lokasi.update',$location->id)}}" method="post" enctype="multipart/form-data"> 
        @csrf
        @method('put')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="inputLokasi">Nama Lokasi</label>
                            <input type="text" name="nama_lokasi" class="form-control" placeholder="Nama lokasi" id="inputLokasi" value="{{ $location->lokasi }}"/>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('lokasi.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop