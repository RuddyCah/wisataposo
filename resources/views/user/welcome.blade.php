
@extends('layouts.app')
@section('title', 'Home')

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
              <h1>Pariwisata Kabupaten Poso</h1>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
  <!-- END CAROUSEL -->

  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container konten-utama">

    <!-- START FORM SEARCH -->
    <div class="form-cari-event row justify-content-md-center">
      <form action="{{url('/events')}}" method="post" enctype="multipart/form-data" class="col-6 mb-5 shadow-lg rounded">
        @csrf
        <div class="mb-3 w-100">
          <div class="text-center">
            <i class="fas fa-map-marker-alt"></i>
            <label for="cari-event" class="form-label">
              <h4>Location</h4>
            </label>
          </div>
          <input type="text" name="searchValue" class="form-control text-center" id="cari-event" style="border: none;" placeholder="Where do you want to go?">
        </div>
        <button type="submit" style="display: none"></button>
      </form>
    </div>
    <!-- START FORM SEARCH -->

    <hr class="divider">

    <!-- START DESTINASI PILIHAN -->
    <h2 class="font-weight-bold mb-2 pb-5 text-center">Destinasi Pilihan</h2>

    @php
        $count = 1;
    @endphp

    @foreach ($destinations as $key => $destination)
      <!-- GANTI ROW TIAP 5 KOLOM -->
      @if ($count%5 == 1)
        <div class="row zoom-hovered pb-5 mb-4" id="destinasi-pilihan">
      @endif
        <div class="col-lg-2 col-md-6 mb-4 mb-lg-0 mx-auto">
          {{-- <div class="row"> --}}
            <!-- Card-->
            <div class="card shadow-sm border-0 rounded p-0">
              <a href= "{{ route('lihat-destinasi', $destination->id) }}">
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
    <!-- END DESTINASI PILIHAN -->
    
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
                <a href="#">
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

    <!-- START LIHAT SEMUA -->
    <div class="row d-flex justify-content-center pb-5 pt-3">
      <div class="col-4 d-flex justify-content-center">
        <a href="{{ url('/destinasi-wisata') }}" type="button" id="btnLihatSemuaWisata" class="btn btn-primary">Lihat Semua Wisata</a>
      </div>
    </div>
    <!-- END LIHAT SEMUA -->
  </div><!-- /.container -->
@endsection
