@extends('adminlte::page')

@section('title', 'List Kategori')

@section('content_header')
    <h1 class="m-0 text-dark">List Kategori</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('kategori.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <table class="table table-hover table-bordered table-stripped" id="dtKategori">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kategori</th>
                            <th>Gambar</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php
                            $count = ($categories->currentPage() - 1) * $categories->perPage() + 1 ;
                        @endphp
                        @foreach($categories as $key => $category)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$category->kategori}}</td>
                                <td><img src="/image/{{ $category->gambar }}" width="100px"></td>
                                <td>
                                    <a href="{{route('kategori.edit', $category)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('kategori.destroy', $category)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-3">
                        {!! $categories->links() !!}
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
        $('#dtKategori').DataTable({
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