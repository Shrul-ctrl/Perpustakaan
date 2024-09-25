@extends('layouts.backend.admin')
<title>Perpustakaan - Pengajuan Buku</title>
@section('content')
<h4 class="mb-0 text-uppercase pb-3">Data Peminjaman Buku yang Menunggu Persetujuan Dipinjam</h4>
<hr>
<div class="card">
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        {{-- <a href="{{ route('peminjaman.create') }}" class="btn btn-grd btn-primary px-5 mb-2">Tambah Data Peminjaman</a> --}}
        {{-- <div class="table-responsive"> --}}
            <table class="table mb-0" id="example">
                <thead class="table">
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Tanggal Peminjaman</th>
                        {{-- <th scope="col">Batas Peminjaman</th> --}}
                        {{-- <th scope="col">Tanggal Pengembalian</th> --}}
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peminjaman as $data)
                    <tr>
                        <th scope="row" class="text-center">{{ $loop->index+1 }}</th>
                        <td>{{ $data->buku->judul }}</td>
                        <td>{{ $data->nama_peminjam}}</td>
                        <td class="text-center">{{ $data->jumlah_pinjam }}</td>
                        <td class="text-center">{{ $data->tanggal_pinjam }}</td>
                        {{-- <td style="text-align: right;">{{ $data->batas_pinjam }}</td> --}}
                        {{-- <td style="text-align: right;">{{ $data->tanggal_kembali }}</td> --}}
                            @include('include.fullstack.ifelsestatus')
                        <td class="text-center" style=" vertical-align: middle;">
                            <a href="{{ route('showpengajuan' , $data->id) }}"  class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="left" title="Lihat detail"><i class="material-icons-outlined pt-1" style="font-size: 18px;">visibility</i></a>                         
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    {{-- </div> --}}
</div>

@endsection
