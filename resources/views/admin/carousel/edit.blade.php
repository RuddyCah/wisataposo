@extends('adminlte::page')

@section('title', 'Tambah Carousel')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Carousel</h1>
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
    {{-- route mengarah ke route bernama carousels (CarouselController) pada method bernama store --}}
    <form action="{{route('carousels.update',$carousel->id)}}" method="post" enctype="multipart/form-data"> 
        @csrf
        @method('put')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="inputImage">Pilih image</label>
                            <input type="file" name="image" class="form-control" placeholder="image" id="inputImage">
                            <img src="/image/{{ $carousel->image }}" width="300px">
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('carousels.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop