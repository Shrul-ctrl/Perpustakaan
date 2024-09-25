@extends('layouts.backend.admin')
@section('content')
<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Edit Penerbit <span class="text-primary">{{ $penerbit->nama_penerbit }}</span></h5>
            <form class="row g-3" method="POST" action="{{ route('penerbit.update', $penerbit->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                
                <div class="col-md-4x">
                    <label for="input13" class="form-label">Nama Penerbit</label>
                    <div class="position-relative">
                        <input class="form-control mb-3" type="text" name="nama_penerbit" placeholder="Nama Penerbit" value="{{$penerbit->nama_penerbit}}" required>
                    </div>
                </div>

                <div class="col-md-4x">
                    <label for="input13" class="form-label">Alamat</label>
                    <div class="position-relative">
                        <input class="form-control mb-3" type="text" name="alamat" placeholder="Alamat" value="{{$penerbit->alamat}}" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <a href="{{route('penerbit.index')}}" class="btn btn-danger px-4">Batal</a>
                        <button type="submit" class="btn btn-primary px-4">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
