@extends('layouts.backend.admin')
@section('content')
<div class="col-12 col-xl-12">
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
                        <input class="form-control mb-3" type="text" name="nama_kategori" placeholder="Nama Kategori" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <a href="{{route('kategori.index')}}" class="btn btn-danger px-4">Batal</a>
                        {{-- <a href="{{route('kategori.create')}}" class="btn btn-grd btn-primary px-4 ">Reset</a> --}}
                        <button type="submit" class="btn btn-success px-4">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
