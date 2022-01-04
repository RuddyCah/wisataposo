@extends('adminlte::page')

@section('title', 'List Destinasi')

@section('content_header')
    <h1 class="m-0 text-dark">List Destinasi</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('destinasi.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <table class="table datatable table-hover table-bordered table-stripped" id="dtDestinasi">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Destinasi</th>
                            <th>Gambar</th>
                            <th>Lokasi</th>
                            <th>Kategori</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $count = ($destinations->currentPage() - 1) * $destinations->perPage() + 1 ;
                        @endphp
                        @foreach($destinations as $key => $destination)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{$destination->judul}}</td>
                                <td><img src="/image/{{ $destination->gambar }}" width="100px"></td>
                                <td>{{$destination->location->lokasi}}</td>
                                <td>{{$destination->category->kategori}}</td>
                                <td>
                                    <a href="{{route('destinasi.edit', $destination)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('destinasi.destroy', $destination)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-3">
                        {!! $destinations->links() !!}
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
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

    </script>
@endpush