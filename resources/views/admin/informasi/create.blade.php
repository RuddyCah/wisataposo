@extends('adminlte::page')

@section('plugins.Summernote', true)

@section('title', 'Tambah Informasi')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Informasi</h1>
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
    <form action="{{route('informasi.store')}}" method="post" enctype="multipart/form-data"> 
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputGambar">Pilih gambar background</label>
                                    <input type="file" name="gambar" class="form-control" placeholder="gambar" id="inputGambar">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="inputJudul">Judul / Nama Informasi</label>
                                    <input type="text" name="judul_informasi" class="form-control" placeholder="Judul Informasi" id="inputJudul"/>
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
                        <a href="{{route('informasi.index')}}" class="btn btn-default">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop