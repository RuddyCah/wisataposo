@extends('layouts.app')
@section('title','Informasi Umum')

@section('content')
    <!-- START CAROUSEL -->
    <div id="topCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/image/{{ $category->gambar }}" class="bd-placeholder-img d-block w-100"/>
                <div class="container">
                    <div class="carousel-caption text-dark">
                        <h1>Kategori {{ $category->kategori }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END CAROUSEL -->

    <div class="container">
        <!-- START BREADCRUMB -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/lihat-kategori') }}">Category</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $category->kategori }}</li>
            </ol>
        </nav>
        <!-- END BREADCRUMB -->

        <hr class="divider mt-0 mb-5">
      

        <!-- START DESTINASI BY KATEGORI -->
      
        <div id="hasil-pencarian" class="pb-5">
            @foreach ($destinations as $key => $destination)
                <div class="row mt-5">
                    <div class="col-sm-4">
                        <a href="{{ route('lihat-destinasi', $destination->id) }}" class="">
                            <img src="/image/{{$destination->gambar}}" class="img-responsive">
                        </a>
                    </div>
                    <div class="col-sm-8 mt-4">
                        <a href="{{ route('lihat-destinasi', $destination->id) }}" style="text-decoration: none; color: rgb(70, 66, 66)">
                            <h3 class="title">{{ $destination->judul }}</h3>
                        </a>
                        <p style="text-align: justify">
                            {{ \Illuminate\Support\Str::limit(strip_tags($destination->konten), 400) }}
                        </p> <!-- strip_tags untuk hapus tag html -->
                        <a href="{{ route('lihat-destinasi', $destination->id) }}">Baca selengkapnya...</a>
                    </div>
                </div>
                <hr>
            @endforeach

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {!! $destinations->links() !!}
            </div>       
        </div>
        
        <!-- END DESTINASI BY KATEGORI -->

    </div>
@endsection
      