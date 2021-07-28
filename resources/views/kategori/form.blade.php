@extends('template.template')

@section('title-page')
    Kategori
@endsection

@section('title')
    Kategori
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active" aria-current="page">Kategori</li>
    </ol>
@endsection

@section('content')
    <form action="{{ url('kategori', @$result->id) }}" method="POST" class="form-horizontal">
        @csrf
        <div class="form-group row">
            <label class="contorl-label col-sm-2">Nama Kategori</label>
            <div class="col-sm-10">
                <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" value="{{ old('nama_kategori', @$result->nama_kategori) }}">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10 offset-sm-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
@endsection

