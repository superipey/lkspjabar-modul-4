@extends('template.template')

@section('title-page')
    Dashboard
@endsection

@section('title')
    Dashboard
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            @if(session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
            @endif
        </div>
    </div>

    <div class="row">
        @foreach ($result as $row)
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="{{ asset('storage/'.@$row->gambar) }}" height="200px"/>
                        <h2>{{ $row->nama_produk }}</h2>
                        <h6>Rp{{ number_format($row->harga, 0) }}</h6>
                        <a href="{{ url('detail', $row->id) }}" class="btn btn-primary">Detail Produk</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
