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
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    <div class="row">
        <div class="col-sm-8">

            <a class="btn btn-primary" href="{{ url('/kategori/form') }}">Tambah Data</a>
        </div>
        <div class="col-sm-4">
            <form action="{{ url('kategori') }}" class="row" method="GET">
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
            <th>Nama Kategori</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data->items() ?? [] as $row)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{ @$row->nama_kategori }}</td>
                <td>
                    <a href="{{ url('kategori/form', $row->id) }}" class="btn btn-warning">Edit</a>
                    <form method="POST" action="{{ url('kategori', $row->id) }}" style="display: inline">
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

