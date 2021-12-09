@extends('adminlte::page')

@section('title', 'Tambah Kategori')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Kategori</h1>
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
    {{-- route mengarah ke route bernama kategori (CategoryController) pada method bernama store --}}
    <form action="{{route('kategori.store')}}" method="post" enctype="multipart/form-data"> 
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="inputKategori">Nama Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control" placeholder="Nama kategori" id="inputKategori"/>
                        </div>

                        <div class="form-group">
                            <label for="inputGambar">Pilih image</label>
                            <input type="file" name="gambar" class="form-control" placeholder="gambar" id="inputGambar">
                            {{-- <input type="file" class="form-control @error('image') is-invalid @enderror" id="inputImage" name="image"> --}}
                            {{-- @error('image') <span class="text-danger">{{$message}}</span> @enderror --}}
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('kategori.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop