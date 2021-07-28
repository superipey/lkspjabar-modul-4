@extends('template.template')

@section('title-page')
    Produk
@endsection

@section('title')
    Produk
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active" aria-current="page">Produk</li>
    </ol>
@endsection

@section('content')
    <form action="{{ url('produk', @$result->id) }}" method="POST" class="form-horizontal"
          enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label class="contorl-label col-sm-2">Kategori</label>
            <div class="col-sm-10">
                <select name="kategori_id" class="form-control">
                    <option value="">Pilih Kategori</option>
                    @foreach (\App\Models\Kategori::all() as $item)
                        <option
                            {{ $item->id == @$result->kategori_id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="contorl-label col-sm-2">Nama Produk</label>
            <div class="col-sm-10">
                <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk"
                       value="{{ old('nama_produk', @$result->nama_produk) }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="contorl-label col-sm-2">Deskripsi</label>
            <div class="col-sm-10">
                <textarea rows="4" name="deskripsi" class="form-control"
                          placeholder="Deskripsi">{{ old('deskripsi', @$result->deskripsi) }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="contorl-label col-sm-2">Harga</label>
            <div class="col-sm-10">
                <input type="number" name="harga" class="form-control" placeholder="Harga"
                       value="{{ old('harga', @$result->harga) }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="contorl-label col-sm-2">Gambar</label>
            <div class="col-sm-10">
                <input type="file" name="gambar" class="form-control" placeholder="Gambar">
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

