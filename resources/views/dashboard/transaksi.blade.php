@extends('template.template')

@section('title-page')
    Transaksi
@endsection

@section('title')
    Transaksi
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-success">
                Transaksi Berhasil!
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    Data Customer
                    <table class="table">
                        <tr>
                            <td>Nama</td>
                            <td>: {{ auth()->user()->nama_lengkap }}</td>
                        </tr>
                        <tr>
                            <td>No HP</td>
                            <td>: {{ auth()->user()->no_hp }}</td>
                        </tr>
                        <tr>
                            <td>Alamat Lengkap</td>
                            <td>: {{ auth()->user()->alamat_lengkap }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>: {{ auth()->user()->email }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    Rekap Transaksi dengan Nomor Invoice <strong>{{ $trx->kode_transaksi }}</strong>
                    <table>
                        <tr>
                            <td>Nama Barang</td>
                            <td>Jumlah</td>
                        </tr>
                        @foreach($trx->detail as $row)
                            <tr>
                                <td>{{ $row->produk->nama_produk }}</td>
                                <td>{{ $row->jumlah }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
