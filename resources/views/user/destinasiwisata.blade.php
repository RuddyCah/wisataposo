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
                        <h1>Destinasi Wisata</h1>
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
            <li class="breadcrumb-item active" aria-current="page">Destinasi Wisata</li>
            </ol>
        </nav>
        <!-- END BREADCRUMB -->

        <hr class="divider mt-0 mb-5">
      

        <!-- START DESTINASI PILIHAN -->
        <h2 class="font-weight-bold mb-0 pb-5 text-center">
            Keindahan Pesona Kabupaten Poso yang dapat anda kunjungi
        </h2>

        @php
            $count = 1;
        @endphp

        @foreach ($destinations as $key => $destination)
        <!-- GANTI ROW TIAP 4 KOLOM -->
        @if ($count%5 == 1)
            <div class="row zoom-hovered pb-5 mb-4" id="destinasi-pilihan">
        @endif
            <div class="col-lg-2 col-md-6 mb-4 mb-lg-0 mx-auto">
            {{-- <div class="row"> --}}
                <!-- Card-->
                <div class="card shadow-sm border-0 rounded p-0">
                <a href="{{ route('lihat-destinasi', $destination->id) }}">
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
        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {!! $destinations->links() !!}
        </div> 

        <!-- START LIHAT SEMUA -->
        {{-- <div class="row d-flex justify-content-center pb-5">
            <div class="col-4 d-flex justify-content-center">
                <a href="" id="btnLihatSemuaIdeLiburan" type="button" class="btn btn-primary">
                    Lihat Semua Ide Liburan
                </a>
            </div>
        </div> --}}
        <!-- END LIHAT SEMUA -->
        <!-- END DESTINASI PILIHAN -->

        <hr class="divider mt-3 mb-3"/>

        <!-- START CATEGORY -->
        <div class="kategori-container p-5">
            <div class="row left-line">
                <div class="col-6">
                    <h2 class="font-weight-bold mb-2 pb-3"><span>Category</span></h2>
                </div>
                <div class="d-flex justify-content-end button-slider col-6">
                    <a id="slideLeft" class="btn" onclick="sliderKategoriClicked()"><i class="fas fa-arrow-left"></i></a>
                    <a id="slideRight" class="btn" onclick="sliderKategoriClicked()"><i class="fas fa-arrow-right"></i></i></a>
                </div>
            </div>
            <div class="kategori" id="kategori-slider">
                <div class="row flex-row flex-nowrap mt-4 pb-4">
                    @foreach ($categories as $key => $category)
                    <div class="col-lg-1 col-md-6" style="width: 12.499999995%;">
                        <div class="card border-0 rounded p-0">
                            <a href="{{ route('kategori-wisata', $category->id) }}">
                                <div class="card-body p-0">
                                    <img src="image/{{ $category->gambar }}" alt="" class="card-img-top"/>
                                    <div class="p-0">
                                        <div class="card-footer border-0">
                                        <h6 class="text-dark text-center">{{ $category->kategori }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-lg-1 col-md-6" style="width: 12.499999995%;">
                        <a href="{{ url('/lihat-kategori') }}">
                            <div class="card text-dark mb-3 border-0 bg-transparent">
                                <div class="card-body" style="height: 10rem; display:flex; justify-content: center; align-items: center;">
                                    <span class="card-title">View All <br> Categories</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CATEGORY -->

        <hr class="divider">

        <!-- START DESTINASI POPULER -->
        <h2 class="font-weight-bold mb-0 pb-5 text-center">
            Destinasi Populer di Kabupaten Poso
        </h2>

        @php
            $count = 1;
        @endphp

        @foreach ($popularDestinations as $key => $popularDestination)
        <!-- GANTI ROW TIAP 4 KOLOM -->
        @if ($count%5 == 1)
            <div class="row zoom-hovered pb-5 mb-4" id="destinasi-pilihan">
        @endif
            <div class="col-lg-2 mb-4 mb-lg-0 mx-auto">
            {{-- <div class="row"> --}}
                <!-- Card-->
                <div class="card shadow-sm border-0 rounded p-0">
                <a href="{{ route('lihat-destinasi', $popularDestination->id) }}">
                    <div class="card-body p-0">
                        <img src="image/{{ $popularDestination->gambar }}" alt="" class="w-100 card-img-top"/>                        

                        <div class="card-img-overlay p-0">
                            <div class="card-footer">
                                <h6 class="text-light text-center">{{ $popularDestination->judul }}</h6>
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
        <!-- END DESTINASI POPULER -->


    </div>
@endsection
      