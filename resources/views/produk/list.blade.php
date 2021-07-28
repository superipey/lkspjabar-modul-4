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
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    <div class="row">
        <div class="col-sm-8">

            <a class="btn btn-primary" href="{{ url('/produk/form') }}">Tambah Data</a>
        </div>
        <div class="col-sm-4">
            <form action="{{ url('produk') }}" class="row" method="GET">
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="search" placeholder="Pencarian" value="{{ @$search }}"/>
                </div>
                <div class="col-sm-1">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Kategori</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data->items() ?? [] as $row)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td><img src="{{ asset('storage/' . @$row->gambar) }}" width="100px" /></td>
                <td>{{ @$row->kategori->nama_kategori }}</td>
                <td>{{ @$row->nama_produk }}</td>
                <td>{{ @$row->harga }}</td>
                <td>
                    <a href="{{ url('produk/form', $row->id) }}" class="btn btn-warning">Edit</a>
                    <form method="POST" action="{{ url('produk', $row->id) }}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

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

