@extends('template.template')

@section('title-page')
    Detail Produk
@endsection

@section('title')
    Detail Produk
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active" aria-current="page">Detail Produk</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{ asset('storage/'.@$result->gambar) }}" width="100%"/>
                </div>
            </div>
        </div>

        <div class="col-sm-9">

            <div class="card">
                <div class="card-body ">
                    <h2>{{ $result->nama_produk }}</h2>
                    <h6>Rp{{ number_format($result->harga, 0) }}</h6>
                    <p>{{ $result->deskripsi }}</p>
                    <a href="{{ url('beli', $result->id) }}" class="btn btn-primary">Beli</a>
                </div>
            </div>
        </div>
    </div>
@endsection
