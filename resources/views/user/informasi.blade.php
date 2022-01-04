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
                <h1>Informasi Umum</h1>
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
          <li class="breadcrumb-item active" aria-current="page">Informasi Umum</li>
        </ol>
      </nav>
      <!-- END BREADCRUMB -->

      <hr class="divider mt-0 mb-5">
      

      <!-- START INFORMASI UMUM -->
      <h2 class="font-weight-bold mb-0 pb-5 text-center">Informasi mengenai Kabupaten Poso</h2>

      @php
          $count = 1;
      @endphp

      @foreach ($informations as $key => $information)
        <!-- GANTI ROW TIAP 5 KOLOM -->
        @if ($count%5 == 1)
          <div class="row zoom-hovered pb-5 mb-4" id="informasi-umum">
        @endif
          <div class="col-lg-2 col-md-6 mb-4 mb-lg-0 mx-auto">
            {{-- <div class="row"> --}}
              <!-- Card-->
              <div class="card shadow-sm border-0 rounded p-0">
                <a href="#">
                  <div class="card-body p-0">
                    <img src="image/{{ $information->gambar }}" alt="" class="w-100 card-img-top"/>                        

                    <div class="card-img-overlay p-0">
                      <div class="card-footer">
                        <h6 class="text-light text-center">{{ $information->judul }}</h6>
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
      <!-- END INFORMASI UMUM -->

      <hr class="divider">
    </div>
@endsection
      