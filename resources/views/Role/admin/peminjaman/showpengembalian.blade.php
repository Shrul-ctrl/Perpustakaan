@extends('layouts.backend.admin')
@section('content')
<form class="row g-3" enctype="multipart/form-data" action="{{ route('admin.peminjaman.update', $peminjaman->id) }}" method="POST">
    @csrf
    @method('PATCH')
    <div class="col-md-6">
        <label for="input13" class="form-label">Nama Peminjam</label>
        <div class="position-relative">
            <input class="form-control mb-3" type="text" name="nama_peminjam" value="{{$peminjaman->user->name}}" readonly></input>
        </div>
    </div>

    <div class="col-md-6">
        <label for="input13" class="form-label">Nama buku</label>
        <div class="position-relative">
            <input class="form-control mb-3" type="text" name="id_buku" placeholder="Nama buku" value="{{$peminjaman->buku->judul}}" readonly>
        </div>
    </div>


    <div class="col-md-6">
        <label for="input13" class="form-label">Jumlah Pinjam</label>
        <div class="position-relative">
            <input class="form-control mb-3" type="text" name="jumlah_pinjam" value="{{$peminjaman->jumlah_pinjam}}" readonly></input>
        </div>
    </div>


    <div class="col-md-6">
        <label for="input13" class="form-label">Tanggal Pinjam</label>
        <div class="position-relative">
            <input class="form-control mb-3" type="date" name="tanggal_pinjam" value="{{$peminjaman->tanggal_pinjam}}" readonly></input>
        </div>
    </div>


    <div class="col-md-6">
        <label for="input13" class="form-label">Batas Pinjam</label>
        <div class="position-relative">
            <input class="form-control mb-3" type="date" name="batas_pinjam" value="{{$peminjaman->batas_pinjam}}" readonly></input>
        </div>
    </div>


    <div class="col-md-6">
        <label for="input13" class="form-label">Tanggal Kembali</label>
        <div class="position-relative">
            <input class="form-control mb-3" type="date" name="tanggal_kembali" value="{{$peminjaman->tanggal_kembali}}" readonly></input>
        </div>
    </div>

    <div class="col-md-12">
        <label for="input13" class="form-label">Alasan Penolakan</label>
        <div class="position-relative">
            <textarea class="form-control mb-3" type="text" name="alasan_pengembalian" value="{{$peminjaman->alasan_pengembalian}}"></textarea>
        </div>
    </div>

    <div class="col-md-12">
        <div class="d-md-flex d-grid align-items-center gap-3">
            <input type="hidden" name="redirect_to" value="showpengembalian">
            <button type="submit" name="status_pengajuan" value="pengembalian diterima" class="btn btn-success btn-sm">Terima</button>
            <button type="submit" name="status_pengajuan" value="pengembalian ditolak" class="btn btn-danger btn-sm">Tolak</button>
        </div>
    </div>
</form>
@endsection
