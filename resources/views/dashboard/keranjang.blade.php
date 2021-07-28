@extends('template.template')

@section('title-page')
    Keranjang
@endsection

@section('title')
    Keranjang
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
    </ol>
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Nama Produk</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        <?php $totalBarang = 0; $totalHarga = 0; ?>
        @foreach ($keranjang ?? [] as $row)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ @$row['produk']->kategori->nama_kategori }}</td>
                <td>{{ @$row['produk']->nama_produk }}</td>
                <td>{{ @$row['jumlah'] }}</td>
                <td>Rp{{ number_format(@$row['produk']->harga * @$row['jumlah'], 0) }}</td>
                <?php
                $totalBarang += @$row['jumlah'];
                $totalHarga += @$row['produk']->harga * @$row['jumlah'];
                ?>
                <td>
                    <a class="btn btn-danger" href="{{ url('keranjang/hapus', $row['id']) }}">Hapus</a>
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="2">Total</td>
            <td>{{ number_format($totalBarang, 0) }}</td>
            <td>Rp{{ number_format($totalHarga, 0) }}</td>
            <td></td>
        </tr>
        </tbody>
    </table>

    <a href="{{ url('keranjang/checkout')  }}" class="btn btn-success">Checkout</a>

    @if (!empty($data))
        {{ @$data->links() }}
    @endif

    @push('script')
        <script>
            $(() => {
                alert('a')
            })
        </script>
    @endpush
@endsection

