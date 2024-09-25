@extends('layouts.backend.staff')
@section('content')
<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Edit Kategori <span class="text-primary">{{ $kategori->nama_kategori }}</span></h5>
            <form class="row g-3" method="POST" action="{{ route('staff.kategori.update', $kategori->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                
                <div class="col-md-4x">
                    <label for="input13" class="form-label">Nama Kategori</label>
                    <div class="position-relative">
                        <input class="form-control mb-3" type="text" name="nama_kategori" placeholder="Nama Kategori" value="{{$kategori->nama_kategori}}" required>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <a href="{{route('staff.kategori.index')}}" class="btn btn-danger px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
