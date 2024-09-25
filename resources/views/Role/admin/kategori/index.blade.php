@extends('layouts.backend.admin')
<title>Perpustakaan - Tabel Kategori</title>
@section('content')
<h3 class="mb-0 text-uppercase pb-3">TABEL KATEGORI</h3>
<hr>

<div class="col-4 col-xl-4">
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Tambah Kategori</h5>
            <form class="row g-3" method="POST" action="{{ route('kategori.store') }}" enctype="multipart/form-data">
                @csrf
                @if ($errors->has('nama_kategori'))
                <div class="alert alert-danger">
                    {{ $errors->first('nama_kategori') }}
                </div>
                @endif
                <div class="col-md-4x">
                    <label for="input13" class="form-label">Nama Kategori</label>
                    <div class="position-relative">
                        <input class="form-control" type="text" name="nama_kategori" placeholder="Nama Kategori" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <a href="{{route('kategori.index')}}" class="btn btn-danger px-4 btn-sm">Batal</a>
                        {{-- <a href="{{route('kategori.create')}}" class="btn btn-grd btn-primary px-4 ">Reset</a> --}}
                        <button type="submit" class="btn btn-success px-4 btn-sm">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-8 col-xl-8">
    <div class="card">
        <div class="card-body">
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            {{-- <a href="{{ route('kategori.create') }}" class="btn btn-grd btn-primary px-5 mb-2">Tambah Data <i class="material-icons-outlined" style="font-size: 18px; vertical-align: middle;">add</i></a> --}}
            <table class="table mb-0 table-striped" id="example">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">No</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $data)
                    <tr>
                        <th scope="row" class="text-center">{{ $loop->index+1 }}</th>
                        <td>{{ $data->nama_kategori }}</td>
                        <td class="text-center">
                            <form action="{{ route('kategori.destroy', $data->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('kategori.edit', $data->id) }}" class="btn btn-warning text-light btn-sm" data-bs-toggle="tooltip" data-bs-placement="left" title="Edit Data"> <i class="material-icons-outlined" style="font-size: 18px;">edit</i></a>
                                <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="left" title="Hapus Data" onclick="return confirm('Apakah anda yakin??')"><i class="material-icons-outlined" style="font-size: 18px;">delete</i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
