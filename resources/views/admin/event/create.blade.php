@extends('adminlte::page')

@section('title', 'Tambah Event')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Event</h1>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- route mengarah ke route bernama event (EventController) pada method bernama store --}}
    <form action="{{route('event.store')}}" method="post" enctype="multipart/form-data"> 
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputEvent">Nama Event</label>
                                    <input type="text" name="nama_event" class="form-control" placeholder="Nama Event" id="inputEvent"/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputLokasi">Lokasi</label>
                                    <select class="form-control" id="inputLokasi" name="nama_lokasi">
                                        @foreach ($locations as $key => $location)
                                            <option value="{{$location->id}}">{{$location->lokasi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputTanggal">Tanggal Event</label>
                                    <input type="date" name="tanggal_event" class="form-control" id="inputTanggal"/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="inputInfo">Info Event</label>
                                    <textarea name="info" class="form-control" id="inputInfo"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('event.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop