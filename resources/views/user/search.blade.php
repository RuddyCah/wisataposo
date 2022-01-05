@extends('layouts.app')
@section('title','Pencarian')

@section('content')

    <div id="pencarian" class="container">
      <!-- START SEARCH FORM -->
        <div class="row height d-flex justify-content-center align-items-center" style="margin-top: 8rem;">
            <div class="col-md-12">
                <form action="/pencarian" method="GET" class="form"> 
                    @csrf
                    {{-- <i class="fa fa-search" style="position: absolute;top: 20px;left:20px;color:#9ca3af"></i>  --}}
                    <input type="text" value="{{$searchInput}}" name="navSearchValue" class="form-control form-input" placeholder="Search anything..."> 
                    <span class="left-pan">
                        <i class="fa fa-search"></i>
                    </span> 
                    <button type="submit" style="display: none"></button>
                </form>
            </div>
        </div>
      <!-- END SEARCH FORM -->
      

        <!-- START SEARCH RESULT -->
      
        <div id="hasil-pencarian" class="pb-5">
            @foreach ($results as $key => $result)
                <div class="row mt-5">
                    <div class="col-sm-4">
                        <a href="{{ route('lihat-artikel', $result->judul) }}" class="">
                            <img src="image/{{$result->gambar}}" class="img-responsive">
                        </a>
                    </div>
                    <div class="col-sm-8 mt-4">
                        <a href="{{ route('lihat-artikel', $result->judul) }}" style="text-decoration: none; color: rgb(70, 66, 66)">
                            <h3 class="title">{{ $result->judul }}</h3>
                        </a>
                        <p style="text-align: justify">
                            {{ \Illuminate\Support\Str::limit(strip_tags($result->konten), 400) }}
                        </p> <!-- strip_tags untuk hapus tag html -->
                        <a href="{{ route('lihat-artikel', $result->judul) }}">Baca selengkapnya...</a>
                    </div>
                </div>
                <hr>
            @endforeach

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {!! $results->appends(['navSearchValue' => $searchInput])->links() !!}
            </div>       
        </div>
        
        <!-- END SEARCH RESULT -->
    </div>
@endsection
      