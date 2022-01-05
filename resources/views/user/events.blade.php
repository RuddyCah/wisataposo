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

    <div class="container">
      <!-- START BREADCRUMB -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Event</li>
        </ol>
      </nav>
      <!-- START BREADCRUMB -->

      <hr class="divider mt-0">

      <!-- START TABLE EVENT -->
      
      @if (count($events) > 0)
        <h2 class="font-weight-bold mb-2 pb-5 text-center">Event di {{$searchInput}}</h2>
        <table id="tabel-event" class="table table-striped table-bordered datatable" style="width:100%">
          <thead>
              <tr>
                <th>Nama Event</th>
                <th>Lokasi</th>
                <th>Tanggal</th>
                <th>Info</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($events as $key => $event)
              <tr>
                <td>{{$event->nama_event}}</td>
                <td>{{$event->location->lokasi}}</td>
                <td>{{$event->tanggal}}</td>
                <td>{{$event->info}}</td>
              </tr>
              @endforeach
          </tbody>
        </table>
      @else
        <h4 class="text-center">Tidak Ada Event di {{$searchInput}}</h4>
      @endif


      <hr class="divider">
    </div>
@endsection
      