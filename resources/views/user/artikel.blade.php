@extends('layouts.app')
@section('title','Informasi Umum')

@section('content')
    <!-- START CAROUSEL -->
    <div id="topCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/image/{{ $article->gambar }}" class="bd-placeholder-img d-block w-100"/>
                <div class="container">
                    <div class="carousel-caption text-dark">
                        <h1>{{ $article->judul }}</h1>
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
                <li class="breadcrumb-item active" aria-current="page">{{ $article->judul }}</li>
            </ol>
        </nav>
        <!-- END BREADCRUMB -->

        <hr class="divider mt-0 mb-5">

        <!-- Untuk menampilkan html konten -->
        <div id="konten-artikel" style="text-align: justify">
            {!! $article->konten !!}
        </div>
        <br>
        <div id="publish-on" class="mb-5">
            <p class="fst-italic text-end">Publish on {{ $article->created_at }}</p>
        </div>
    </div>
@endsection
      