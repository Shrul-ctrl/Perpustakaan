@extends('layouts.backend.staff')
@section('content')
<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-body p-4">
            <h5 class="mb-4">Edit buku <span class="text-primary">{{ $buku->judul }}</span></h5>
            <form class="row g-3" method="POST" action="{{ route('staff.buku.update', $buku->id) }}" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                
                <div class="col-md-4x">
                    <label for="input13" class="form-label">Nama buku</label>
                    <div class="position-relative">
                        <input class="form-control mb-3" type="text" name="judul" value="{{$buku->judul}}" required>
                    </div>
                </div>

                <div class="col-md-4x"> 
                    <label for="input13" class="form-label">Deskripsi</label>
                    <div class="position-relative">
                        <textarea class="form-control mb-3" name="deskripsi" required> {{$buku->deskripsi}}</textarea>
                    </div>
                </div>

                <div class="col-md-4x">
                    <label for="input13" class="form-label">Foto</label>
                    <div class="position-relative">
                        <img src="{{ asset('images/buku/' . $buku->foto) }}" class="pb-5" width="500" height="300" style="object-fit: cover;" alt="">
                        
                        <input class="form-control mb-3" type="file" name="foto" required> 
                    </div>
                </div>

                <div class="col-md-4x">
                    <label for="input13" class="form-label">Penulis</label>
                    <div class="position-relative">
                        <select class="form-control mb-3" name="id_penulis"  value="{{$buku->penulis}}" required>
                            <option disabled selected>Pilih Penulis</option>
                            @foreach ($penulis as $data)    
                            <option value="{{ $data->id }}" {{ $data->id == $buku->id_penulis ? 'selected' : '' }}>
                                {{ $data->nama_penulis }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4x">
                    <label for="input13" class="form-label">Penerbit</label>
                    <div class="position-relative">
                        <select class="form-control mb-3" name="id_penerbit"  value="{{$buku->penerbit}}" required>
                            <option disabled selected>Pilih Penerbit</option>
                            @foreach ($penerbit as $data)
                            <option value="{{ $data->id }}" {{ $data->id == $buku->id_penerbit ? 'selected' : '' }}>
                                {{ $data->nama_penerbit }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4x">
                    <label for="input13" class="form-label">Kategori</label>
                    <div class="position-relative">
                        <select class="form-control mb-3" name="id_kategori"  value="{{$buku->kategori}}" required>
                            <option disabled selected>Pilih Kategori</option>
                            @foreach ($kategori as $data)
                            <option value="{{ $data->id }}" {{ $data->id == $buku->id_kategori ? 'selected' : '' }}>
                                {{ $data->nama_kategori }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4x">
                    <label for="input13" class="form-label">Tahun Terbit</label>
                    <div class="position-relative">
                        <input class="form-control mb-3" type="text" name="tahun_terbit" value="{{$buku->tahun_terbit}}" required>
                    </div>
                </div>

                <div class="col-md-4x">
                    <label for="input13" class="form-label">Jumlah</label>
                    <div class="position-relative">
                        <input class="form-control mb-3" type="number" name="jumlah_buku"  value="{{$buku->jumlah_buku}}" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                        <a href="{{route('staff.buku.index')}}" class="btn btn-danger px-4 btn-sm">Batal</a>
                        <button type="submit" class="btn btn-primary px-4 btn-sm">Kirim</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
