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
                        <h1>Ide Liburan</h1>
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
            <li class="breadcrumb-item active" aria-current="page">Ide Liburan</li>
            </ol>
        </nav>
        <!-- END BREADCRUMB -->

        <hr class="divider mt-0 mb-5">
      

        <!-- START DESTINASI PILIHAN -->
        <h2 class="font-weight-bold mb-0 pb-5 text-center">
            Beragam ide liburan yang bisa anda kunjungi di Kabupaten Poso
        </h2>

        @php
            $count = 1;
        @endphp

        @foreach ($destinations as $key => $destination)
        <!-- GANTI ROW TIAP 4 KOLOM -->
        @if ($count%5 == 1)
            <div class="row destinasi-pilihan pb-5 mb-4">
        @endif
            <div class="col-lg-2 col-md-6 mb-4 mb-lg-0 mx-auto">
            {{-- <div class="row"> --}}
                <!-- Card-->
                <div class="card shadow-sm border-0 rounded p-0">
                <a href="#">
                    <div class="card-body p-0">
                    <img src="image/{{ $destination->gambar }}" alt="" class="w-100 card-img-top"/>                        

                    <div class="card-img-overlay p-0">
                        <div class="card-footer">
                        <h6 class="text-light text-center">{{ $destination->judul }}</h6>
                        </div>
                    </div>
                    </div>
                </a>
                </div>
            {{-- </div> --}}
            </div>
            @if ($count % 5 == 0)
            </div>
            @endif
        @php
            $count++;
        @endphp
        @endforeach
        
        @if ($count % 5 != 1)
        </div>
        @endif

        <!-- START LIHAT SEMUA -->
        <div class="row d-flex justify-content-center pb-5">
            <div class="col-4 d-flex justify-content-center">
                <a href="" id="btnLihatSemuaIdeLiburan" type="button" class="btn btn-primary">
                    Lihat Semua Ide Liburan
                </a>
            </div>
        </div>
        <!-- END LIHAT SEMUA -->
        <!-- END DESTINASI PILIHAN -->

        <hr class="divider mt-3"/>

        <!-- START PESONA PARIWISATA -->
        <h2 class="font-weight-bold mb-2 pb-3 text-center">Pesona Pariwisata Kabupaten Poso</h2>
        <div id="carouselPesona-container" class="p-5">
        <div id="carouselPesona" class="carousel slide" data-bs-interval="false">
            <div class="carousel-inner">
            <div class="carousel-item active">
                <iframe width="100%" height="500" src="https://www.youtube.com/embed/y-Y0J-VnyIg" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="carousel-item">
                <iframe width="100%" height="500" src="https://www.youtube.com/embed/y-Y0J-VnyIg" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="carousel-item">
                <iframe width="100%" height="500" src="https://www.youtube.com/embed/y-Y0J-VnyIg" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselPesona" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselPesona" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
        </div>
        </div>
        <!-- END PESONA PARIWISATA -->

        <hr class="divider">

        <!-- START INSPIRASI MEDIA SOSIAL-->
        <h2 class="font-weight-bold mb-0 pb-5 text-center">
            Inspirasi di Sosial Media
        </h2>

        <!-- GANTI ROW TIAP 4 KOLOM -->
        <div class="row destinasi-pilihan pb-5 mb-4">
            <div class="col-lg-4 mb-4 mb-lg-0 mx-auto">
                <!-- Card-->
                <div class="card shadow-sm border-0 rounded p-0">
                    <a href="#">
                        <div class="card-body p-0">
                        {{-- <img src="image/{{ $destination->gambar }}" alt="" class="w-100 card-img-top"/>--}}
                        <iframe id="instagram-embed-0" 
                            class="instagram-media" 
                            style="background: white; max-width: 658px; width: calc(100% - 2px); border-radius: 3px; border: 1px solid #dbdbdb; box-shadow: none; display: block; margin: 0px 0px 12px; min-width: 326px; padding: 0px;" 
                            src="https://www.instagram.com/p/CYPDirSIy_u/embed?utm_source=ig_embedembed/" 
                            scrolling="no" 
                            height="380" frameborder="0">
                        </iframe>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0 mx-auto">
                <!-- Card-->
                <div class="card shadow-sm border-0 rounded p-0">
                    <a href="#">
                        <div class="card-body p-0">
                        {{-- <img src="image/{{ $destination->gambar }}" alt="" class="w-100 card-img-top"/>--}}
                        <iframe id="instagram-embed-0" 
                            class="instagram-media" 
                            style="background: white; max-width: 658px; width: calc(100% - 2px); border-radius: 3px; border: 1px solid #dbdbdb; box-shadow: none; display: block; margin: 0px 0px 12px; min-width: 326px; padding: 0px;" 
                            src="https://www.instagram.com/p/CYPDirSIy_u/embed?utm_source=ig_embedembed/" 
                            scrolling="no" 
                            height="380" frameborder="0">
                        </iframe>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0 mx-auto">
                <!-- Card-->
                <div class="card shadow-sm border-0 rounded p-0">
                    <a href="#">
                        <div class="card-body p-0">
                        {{-- <img src="image/{{ $destination->gambar }}" alt="" class="w-100 card-img-top"/>--}}
                        <iframe id="instagram-embed-0" 
                            class="instagram-media" 
                            style="background: white; max-width: 658px; width: calc(100% - 2px); border-radius: 3px; border: 1px solid #dbdbdb; box-shadow: none; display: block; margin: 0px 0px 12px; min-width: 326px; padding: 0px;" 
                            src="https://www.instagram.com/p/CYPDirSIy_u/embed?utm_source=ig_embedembed/" 
                            scrolling="no" 
                            height="380" frameborder="0">
                        </iframe>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="row destinasi-pilihan pb-5 mb-4">
            <div class="col-lg-4 mb-4 mb-lg-0 mx-auto">
                <!-- Card-->
                <div class="card shadow-sm border-0 rounded p-0">
                    <a href="#">
                        <div class="card-body p-0">
                        {{-- <img src="image/{{ $destination->gambar }}" alt="" class="w-100 card-img-top"/>--}}
                        <iframe id="instagram-embed-0" 
                            class="instagram-media" 
                            style="background: white; max-width: 658px; width: calc(100% - 2px); border-radius: 3px; border: 1px solid #dbdbdb; box-shadow: none; display: block; margin: 0px 0px 12px; min-width: 326px; padding: 0px;" 
                            src="https://www.instagram.com/p/CYPDirSIy_u/embed?utm_source=ig_embedembed/" 
                            scrolling="no" 
                            height="380" frameborder="0">
                        </iframe>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0 mx-auto">
                <!-- Card-->
                <div class="card shadow-sm border-0 rounded p-0">
                    <a href="#">
                        <div class="card-body p-0">
                        {{-- <img src="image/{{ $destination->gambar }}" alt="" class="w-100 card-img-top"/>--}}
                        <iframe id="instagram-embed-0" 
                            class="instagram-media" 
                            style="background: white; max-width: 658px; width: calc(100% - 2px); border-radius: 3px; border: 1px solid #dbdbdb; box-shadow: none; display: block; margin: 0px 0px 12px; min-width: 326px; padding: 0px;" 
                            src="https://www.instagram.com/p/CYPDirSIy_u/embed?utm_source=ig_embedembed/" 
                            scrolling="no" 
                            height="380" frameborder="0">
                        </iframe>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 mb-4 mb-lg-0 mx-auto">
                <!-- Card-->
                <div class="card shadow-sm border-0 rounded p-0">
                    <a href="#">
                        <div class="card-body p-0">
                        {{-- <img src="image/{{ $destination->gambar }}" alt="" class="w-100 card-img-top"/>--}}
                        <iframe id="instagram-embed-0" 
                            class="instagram-media" 
                            style="background: white; max-width: 658px; width: calc(100% - 2px); border-radius: 3px; border: 1px solid #dbdbdb; box-shadow: none; display: block; margin: 0px 0px 12px; min-width: 326px; padding: 0px;" 
                            src="https://www.instagram.com/p/CYPDirSIy_u/embed?utm_source=ig_embedembed/" 
                            scrolling="no" 
                            height="380" frameborder="0">
                        </iframe>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- END INSPIRASI MEDIA SOSIAL -->
    </div>
@endsection
      