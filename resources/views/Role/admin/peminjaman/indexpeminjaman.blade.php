@extends('layouts.backend.admin')
<title>Perpustakaan - Peminajaman Buku</title>
@section('content')
<h4 class="mb-0 text-uppercase pb-3">Rekap Peminjaman Buku</h4>
<hr>
<div class="card">
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        {{-- <div class="d-flex mb-3"> --}}
            {{-- <a href="{{ route('peminjaman.create') }}" class="btn btn-grd btn-primary px-5">Tambah Data <i class="material-icons-outlined" style="font-size: 18px; vertical-align: middle;">add</i></a> --}}
        {{-- </div> --}}
        <div id="example4_buttons" class="btn-group mb-2"></div>
        <table class="table mb-0 table-striped" id="example4">
                <thead class="table">
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Tanggal Peminjaman</th>
                        <th scope="col">Batas Peminjaman</th>
                        <th scope="col">Tanggal Pengembalian</th>
                        <th scope="col">Status</th>
                        {{-- <th scope="col">Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peminjaman as $data)
                    <tr>
                        <th scope="row" class="text-center">{{ $loop->index+1 }}</th>
                        <td>{{ $data->buku->judul }}</td>
                        <td>{{ $data->user->name}}</td>
                        <td class="text-center">{{ $data->jumlah_pinjam }}</td>
                        <td class="text-center">{{ $data->tanggal_pinjam }}</td>
                        <td class="text-center">{{ $data->batas_pinjam }}</td>
                        <td class="text-center">{{ $data->tanggal_kembali }}</td>
                            @include('include.fullstack.ifelsestatus')
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
