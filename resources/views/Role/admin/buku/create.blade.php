@extends('layouts.backend.admin')
@section('content')
<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Tambah Buku</h5>
            <form class="row g-3" method="POST" action="{{ route('buku.store') }}" enctype="multipart/form-data">
                @csrf
                @if ($errors->has('judul'))
                <div class="alert alert-danger">
                    {{ $errors->first('judul') }}
                </div>
                @endif

                <div class="col-md-4x">
                    <label for="input13" class="form-label">Judul</label>
                    <div class="position-relative">
                        <input class="form-control mb-3" type="text" name="judul" placeholder="Judul" required>
                    </div>
                </div>

                <div class="col-md-4x">
                    <label for="input13" class="form-label">Deskripsi</label>
                    <div class="position-relative">
                        <textarea class="form-control mb-3" type="text" name="deskripsi" placeholder="Deskripsi" required></textarea>
                    </div>
                </div>

                <div class="col-md-4x">
                    <label for="input13" class="form-label">Foto</label>
                    <div class="position-relative ">
                        <input class="form-control mb-3" type="file" name="foto" required>
                    </div>
                </div>

                <div class="col-md-4x">
                    <label for="input13" class="form-label">Penulis</label>
                    <div class="position-relative ">
                        <select class="form-control mb-3" name="id_penulis" placeholder="penulis" required>
                            <option disabled selected>Pilih Penulis</option>
                            @foreach ($penulis as $data)
                            <option value="{{ $data->id }}">{{ $data->nama_penulis }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4x">
                    <label for="input13" class="form-label">Penerbit</label>
                    <div class="position-relative ">
                        <select class="form-control mb-3" name="id_penerbit" placeholder="penerbit" required>
                            <option disabled selected>Pilih Penerbit</option>
                            @foreach ($penerbit as $data)
                            <option value="{{ $data->id }}">{{ $data->nama_penerbit }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4x">
                    <label for="input13" class="form-label">Kategori</label>
                    <div class="position-relative ">
                        <select class="form-control mb-3" name="id_kategori" placeholder="Kategori" required>
                            <option disabled selected>Pilih Kategori</option>
                            @foreach ($kategori as $data)
                            <option value="{{ $data->id }}">{{ $data->nama_kategori }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4x">
                    <label for="input13" class="form-label">Tahun Terbit</label>
                    <div class="position-relative">
                        <input class="form-control mb-3" type="text" name="tahun_terbit" placeholder="Tahun Terbit" required>
                    </div>
                </div>

                <div class="col-md-4x">
                    <label for="input13" class="form-label">Jumlah</label>
                    <div class="position-relative">
                        <input class="form-control mb-3" type="number" name="jumlah_buku" placeholder="Jumlah" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <a href="{{route('buku.index')}}" class="btn btn-danger px-4">Batal</a>
                        {{-- <a href="{{route('buku.create')}}" class="btn btn-grd btn-primary px-4 ">Reset</a> --}}
                        <button type="submit" class="btn btn-success px-4">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
