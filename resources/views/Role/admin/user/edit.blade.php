@extends('layouts.backend.admin')
@section('content')
<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Edit User {{ $user->name }}</h5>
            <form class="row g-3" method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="col-md-4x">
                    <label for="input13" class="form-label">Nama</label>
                    <div class="position-relative">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="input13" value="{{ $user->name }}" placeholder="Full Name" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-4x">
                    <label for="input13" class="form-label">Foto Profile</label>
                    <div class="position-relative">
                        <img src="{{ asset('images/user/' . $user->fotoprofile) }}" class="rounded-circle p-1 border mb-4" width="80" height="80" alt="">
                        
                        <input class="form-control mb-3" type="file" name="fotoprofile"> 
                    </div>
                </div>

                <div class="col-md-4x">
                    <label for="input13" class="form-label">Nomer telepon</label>
                    <div class="position-relative">
                        <input class="form-control mb-3" type="number" name="no_hp" placeholder="Nama Penulis" value="{{ $user->no_hp }}" required>
                    </div>
                </div>

                <div class="col-md-4x">
                    <label for="input13" class="form-label">Alamat</label>
                    <div class="position-relative">
                        {{-- <textarea class="form-control mb-3" name="deskripsi" required> {{$buku->deskripsi}}</textarea> --}}
                        <textarea class="form-control mb-3" type="text" name="alamat" placeholder="Alamat" required>{{$user->alamat}}</textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <label for="input16" class="form-label">Email</label>
                    <div class="position-relative">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" id="input16" placeholder="Email" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                {{-- <div class="col-md-12">
                    <label for="input19" class="form-label">level</label>
                    <select id="input19" name="isAdmin" class="form-select">
                        <option selected="">Pilih...</option>
                        <option value="0">Peminjam</option>
                        <option value="1">Admin</option>
                    </select>
                </div> --}}
                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <a href="{{route('user.index')}}" class="btn btn-danger px-4">Cancel</a>
                        <button type="submit" class="btn btn-primary px-4">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
