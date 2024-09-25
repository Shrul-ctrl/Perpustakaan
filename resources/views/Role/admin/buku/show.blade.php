@extends('layouts.backend.admin')
@section('content')

<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-body p-4">
            <h4 class="mb-4">Detail Tabel Buku</h4>
            <hr>
            <form class="row g-3" enctype="multipart/form-data">

                <div class="col-md-4">
                    <label for="input13" class="form-label">Nama buku</label>
                    <div class="position-relative">
                        <input class="form-control mb-3" type="text" name="judul" placeholder="Nama buku" value="{{$buku->judul}}" disabled>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="input13" class="form-label">Nama Penulis</label>
                    <div class="position-relative">
                        <input class="form-control mb-3" type="text" name="id_penulis" value="{{$buku->penuli->nama_penulis}}" disabled></input>
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="input13" class="form-label">Nama Penerbit</label>
                    <div class="position-relative">
                        <input class="form-control mb-3" type="text" name="id_penerbit" value="{{$buku->penerbit->nama_penerbit}}" disabled></input>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="input13" class="form-label">Kategori</label>
                    <div class="position-relative">
                        <input class="form-control mb-3" type="date" name="id_kategori" placeholder="Tahun Terbit" value="{{$buku->kategori->nama_kategori}}" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="jumlah" class="form-label">Jumlah</label>
                    <div class="position-relative">
                        <input id="jumlah" class="form-control mb-3" type="number" name="jumlah_buku" placeholder="Jumlah" value="{{ old('jumlah', $buku->jumlah_buku) }}" disabled>
                        @error('jumlah')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4">
                    <label for="input13" class="form-label">Foto</label>
                    <div class="position-relative">
                        <img src="{{ asset('images/buku/' . $buku->foto) }}" class="pb-5" width="300" height="500" style="object-fit: cover;" alt="">
                    </div>
                </div>

                <div class="col-md-8">
                    <label for="input13" class="form-label">Deskripsi</label>
                    <div class="position-relative">
                        <textarea class="form-control mb-3" name="deskripsi" rows="4" disabled>{{ $buku->deskripsi }}</textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <a href="{{route('buku.index')}}" class="btn btn-danger px-4 btn-sm">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
