@extends('layouts.backend.admin')
@section('content')
<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Tambah Penerbit</h5>
            <form class="row g-3" method="POST" action="{{ route('penerbit.store') }}" enctype="multipart/form-data">
                @csrf
                @if ($errors->has('nama_Penerbit'))
                <div class="alert alert-danger">
                    {{ $errors->first('nama_Penerbit') }}
                </div>
                @endif
                <div class="col-md-4x">
                    <label for="input13" class="form-label">Nama Penerbit</label>
                    <div class="position-relative">
                        <input class="form-control mb-3" type="text" name="nama_Penerbit" placeholder="Nama Penerbit" required>
                    </div>
                </div>
                <div class="col-md-4x">
                    <label for="input13" class="form-label">Alamat</label>
                    <div class="position-relative">
                        <input class="form-control mb-3" type="textarea" name="alamat" placeholder="Alamat" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <a href="{{route('penerbit.index')}}" class="btn btn-danger px-4">Batal</a>
                        {{-- <a href="{{route('penerbit.create')}}" class="btn btn-grd btn-primary px-4 ">Reset</a> --}}
                        <button type="submit" class="btn btn-success px-4">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
