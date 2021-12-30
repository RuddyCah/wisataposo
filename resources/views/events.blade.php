@extends('layouts.app')
@section('title','Event')

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
                <h1>Event</h1>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
    <!-- END CAROUSEL -->
@endsection
      