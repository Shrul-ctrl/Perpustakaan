@extends('layouts.backend.user')
<title>Perpustakaan - Profil</title>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8 col-xxl-8">
            <div class="card rounded-4 w-100 bg">
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="position-relative">
                        <img src="{{ asset('backend/assets/images/gallery/18.png') }}" class="img-fluid rounded" alt="">
                        <div class="position-absolute top-100 start-50 translate-middle">
                            <img src="{{ asset('images/user/' . $user->fotoprofile) }}" width="100" height="100" class="rounded-circle raised p-1 bg-white" style=" object-fit: cover;" alt="" onerror="this.onerror=null; this.src='{{ asset('images/fotoprofil.jfif') }}';">
                        </div>
                    </div>
                    <div class="text-center mt-5 pt-4">
                        <h5 class="mb-2">{{ $user->name }}</h5>
                        {{-- <p class="mb-0">Marketing Executive</p> --}}
                    </div>
                    <div class="d-flex align-items-center justify-content-around mt-5">
                        <form class="row g-3" method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="col-md-6">
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
            
                            <div class="col-md-6">
                                <label for="input13" class="form-label">Foto Profile</label>
                                <div class="position-relative">
                                    {{-- <img src="{{ asset('images/user/' . $user->fotoprofile) }}" class="rounded-circle p-1 border mb-4" width="80" height="80" alt=""> --}}
                                    
                                    <input class="form-control mb-3" type="file" name="fotoprofile"> 
                                </div>
                            </div>
            
                            <div class="col-md-6">
                                <label for="input13" class="form-label">Nomer telepon</label>
                                <div class="position-relative">
                                    <input class="form-control mb-3" type="number" name="no_hp" placeholder="Nama Penulis" value="{{ $user->no_hp }}" required>
                                </div>
                            </div>
            
                            
                            <div class="col-md-6">
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
                            
                            <div class="col-md-12">
                                <label for="input13" class="form-label">Alamat</label>
                                <div class="position-relative">
                                    {{-- <textarea class="form-control mb-3" name="deskripsi" required> {{$buku->deskripsi}}</textarea> --}}
                                    <textarea class="form-control mb-3" type="text" name="alamat" placeholder="Alamat" required>{{$user->alamat}}</textarea>
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
                                <div class="d-md-flex d-grid align-items-center gap-3 float-end">
                                    {{-- <a href="{{route('user.index')}}" class="btn btn-danger px-4">Cancel</a> --}}

                                    <input type="hidden" name="redirect_to" value="profile">
                                    <button type="submit" class="btn btn-primary px-4">Update Profil</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
