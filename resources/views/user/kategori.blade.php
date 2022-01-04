@extends('layouts.app')
@section('title','Informasi Umum')

@section('content')
    <!-- START CAROUSEL -->
    <div id="topCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($carousels as $key => $carousel)
            @if($key == 0)
                <div class="carousel-item active">
            @else
                <div class="carousel-item">   
            @endif
                <img src="image/{{ $carousel->image }}" class="bd-placeholder-img d-block w-100"/>
                <div class="container">
                    <div class="carousel-caption text-dark">
                        <h1>Kategori Pariwisata</h1>
                    </div>
                </div>
            </div>
             @endforeach
        </div>
    </div>
    <!-- END CAROUSEL -->

    <div class="container">
        <!-- START BREADCRUMB -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Kategori</li>
            </ol>
        </nav>
        <!-- END BREADCRUMB -->

        <hr class="divider mt-0 mb-5">

        <!-- START INSPIRASI MEDIA SOSIAL-->
        <h2 class="font-weight-bold mb-0 pb-5 text-center">
            Jelajahi keunikan kebudayaan dan keindahan alam Kabupaten Poso
        </h2>

        @php
            $count = 1;
        @endphp

        <!-- GANTI ROW TIAP 4 KOLOM -->
        @foreach ($categories as $key => $category)
        @if ($count%4 == 1)
            <div class="row pb-5 mb-4 zoom-hovered" id="semua-kategori">
        @endif
                <div class="col-lg-3 mb-4 mb-lg-0">
                    <!-- Card-->
                    <div class="card shadow-sm border-0 rounded p-0">
                        <a href="#">
                            <div class="card-body p-0">
                            <img src="image/{{ $category->gambar }}" alt="" class="w-100 card-img-top" style="height: 22rem;"/>
                                <div class="card-img-overlay p-0">
                                    <div class="card-footer">
                                    <h6 class="text-light text-center">{{ $category->kategori }}</h6>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
        @if ($count % 4 == 0)
            </div>
        @endif
        @php
                $count++;
        @endphp
        @endforeach
        @if ($count % 4 != 1)
        </div>
        @endif
        <!-- END INSPIRASI MEDIA SOSIAL -->

        <hr class="divider">
    </div>
@endsection
      