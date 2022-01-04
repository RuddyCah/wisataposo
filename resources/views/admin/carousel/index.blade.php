@extends('adminlte::page')

@section('title', 'List Carousel')

@section('content_header')
    <h1 class="m-0 text-dark">List Carousel</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('carousels.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <table class="table table-hover table-bordered table-stripped" id="dtCarousel">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Image</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $count = ($carousels->currentPage() - 1) * $carousels->perPage() + 1 ;
                        @endphp
                        @foreach($carousels as $key => $carousel)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td><img src="/image/{{ $carousel->image }}" width="100px"></td>
                                <td>
                                    <a href="{{route('carousels.edit', $carousel)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('carousels.destroy', $carousel)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-3">
                        {!! $carousels->links() !!}
                    </div> 
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#dtCarousel').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

    </script>
@endpush