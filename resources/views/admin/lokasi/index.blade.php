@extends('adminlte::page')

@section('title', 'List Lokasi')

@section('content_header')
    <h1 class="m-0 text-dark">List Lokasi</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('lokasi.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <table class="table table-hover table-bordered table-stripped" id="dtLokasi">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Lokasi</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $count = ($locations->currentPage() - 1) * $locations->perPage() + 1 ;
                        @endphp
                        @foreach($locations as $key => $location)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$location->lokasi}}</td>
                                <td>
                                    <a href="{{route('lokasi.edit', $location)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('lokasi.destroy', $location)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-3">
                        {!! $locations->links() !!}
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
        $('#dtLokasi').DataTable({
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