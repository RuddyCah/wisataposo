@extends('adminlte::page')

@section('title', 'Edit Kategori')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Kategori</h1>
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
    {{-- route mengarah ke route bernama kategori (CategoryController) pada method bernama update --}}
    <form action="{{route('kategori.update',$category->id)}}" method="post" enctype="multipart/form-data"> 
        @csrf
        @method('put')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="inputKategori">Nama Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control" placeholder="Nama kategori" id="inputKategori" value="{{ $category->kategori }}"/>
                        </div>

                        <div class="form-group">
                            <label for="inputImage">Pilih gambar</label>
                            <input type="file" name="gambar" class="form-control" placeholder="gambar" id="inputImage">
                            <img src="/image/{{ $category->gambar }}" width="300px">
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