@extends('layouts.backend.admin')
<title>Perpustakaan - Tabel Buku</title>
@section('content')
<h3 class="mb-0 text-uppercase pb-3">TABEL BUKU</h3>
<hr>
<div class="card">
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
{{--   
        <div class="col-12 mt-5 mb-3">
            <form action="/import" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="col">
                        <input type="file" name="file" id="file" class="form-control" required>
                    </div>
                    <div class="col">
                        <button class="btn btn-success">Import User Data</button>
                    </div>
                </div>
            </form>
        </div> --}}

        <div class="d-flex mb-3">
            <a href="{{ route('buku.create') }}" class="btn btn-grd btn-primary px-5">Tambah Data <i class="material-icons-outlined" style="font-size: 18px; vertical-align: middle;">add</i></a>
            <div id="example2_buttons" class="btn-group mx-2"></div>
        </div>
        <table class="table mb-0 table-striped" id="example2">
            <thead> 
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col" style="width: 100px;">Judul</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Kategori</th>
                    {{-- <th scope="col">Tahun Terbit</th> --}}
                    <th scope="col">Jumlah</th>
                    {{-- <th scope="col">Foto</th> --}}
                    <th scope="col">Aksi</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($buku as $data)
                <tr>
                    <th scope="row" class="text-center">{{ $loop->index+1 }}</th>
                    <td>{{ $data->judul }}</td>
                    <td>{{ $data->penuli->nama_penulis }}</td>
                    <td style="width: 150px">{{ $data->penerbit->nama_penerbit }}</td>
                    <td>{{ $data->kategori->nama_kategori }}</td>
                    {{-- <td style="text-align: right">{{ $data->tahun_terbit }}</td> --}}
                    <td class="text-center">{{ $data->jumlah_buku }}</td>
                    {{-- <td>
                        <img src="{{ asset('images/buku/' . $data->foto) }}" width="80" style="object-fit: cover;" alt="">
                    </td> --}}

                    <td class="text-center">
                        <form action="{{ route('buku.destroy', $data->id) }}" method="POST">
                            @csrf
                            @method('DELETE') 
                            <a href="{{ route('buku.edit', $data->id) }}" class="btn btn-warning text-light btn-sm" data-bs-toggle="tooltip" data-bs-placement="left" title="Edit Data"> <i class="material-icons-outlined" style="font-size: 18px;">edit</i></a>
                            <a href="{{ route('buku.show', $data->id) }}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="left" title="Lihat detail"> <i class="material-icons-outlined" style="font-size: 18px;">visibility</i></a>
                            <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="left" title="Hapus Data" onclick="return confirm('Apakah anda yakin??')"><i class="material-icons-outlined" style="font-size: 18px;">delete</i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
