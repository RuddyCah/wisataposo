@extends('adminlte::page')

@section('plugins.Summernote', true)

@section('title', 'Tambah Destinasi')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Destinasi</h1>
@stop

@section('content')
    @php
        $config = [
            'height' => '100',
            'toolbar' => [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
        ];
    @endphp


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
    {{-- route mengarah ke route bernama destinasi (DestinationController) pada method bernama store --}}
    <form action="{{route('destinasi.store')}}" method="post" enctype="multipart/form-data"> 
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputKategori">Kategori</label>
                                    <select class="form-control" id="inputKategori" name="nama_kategori">
                                        @foreach ($categories as $key => $category)
                                            <option value="{{$category->id}}">{{$category->kategori}}</option>
                                        @endforeach
                                    </select>
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
                                    <label for="inputGambar">Pilih gambar</label>
                                    <input type="file" name="gambar" class="form-control" placeholder="gambar" id="inputGambar">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputNamaDestinasi">Judul / Nama Destinasi</label>
                                    <input type="text" name="nama_destinasi" class="form-control" placeholder="Nama destinasi" id="inputNamaDestinasi"/>
                                </div>
                            </div>
                        </div>
                        
                        <!--Text Area / Text Editor, menggunakan plugin summernote-->
                        <div class="form-group">
                            <x-adminlte-text-editor name="deskripsi" label="Konten / Deskripsi"
                                label-class="text-dark" igroup-size="sm"
                                placeholder="Write some text..." :config="$config"/>
                        </div>

                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('destinasi.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop