@extends('adminlte::page')

@section('title', 'List Event')

@section('content_header')
    <h1 class="m-0 text-dark">List Event</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('event.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @php
                        $count = ($events->currentPage() - 1) * $events->perPage() + 1 ;
                    @endphp
                    <table class="table table-hover table-bordered table-stripped" id="dtEvent">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Event</th>
                            <th>Lokasi</th>
                            <th>Tanggal</th>
                            <th>Info</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($events as $key => $event)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$event->nama_event}}</td>
                                <td>{{$event->location->lokasi}}</td>
                                <td>{{$event->tanggal}}</td>
                                <td>{{$event->info}}</td>
                                <td>
                                    <a href="{{route('event.edit', $event)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('event.destroy', $event)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination -->
                    <div class="d-flex justify-content-center mt-3">
                        {!! $events->links() !!}
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
        $('#dtEvent').DataTable({
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