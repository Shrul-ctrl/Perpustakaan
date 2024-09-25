@extends('layouts.backend.admin')
    @section('content')
    <div class="col-12 col-xl-12">
        <div class="card">
            <div class="card-body p-4">
                <h5 class="mb-4">Edit buku</h5>
                <form class="row g-3" method="POST" action="{{ route('peminjaman.update', $peminjaman->id) }}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    
                    <div class="col-md-4x">
                        <label for="input13" class="form-label">Nama Peminjam</label>
                        <div class="position-relative">
                            <input class="form-control mb-3" type="text" name="nama_peminjam" placeholder="Nama" value="{{ Auth::user()->name }}" disabled>
                            <input type="hidden" name="nama_peminjam" value="{{ Auth::user()->name }}">
                        </div>
                    </div>  
                       
                    <div class="col-md-4x">
                        <label for="input13" class="form-label">Nama Buku</label>
                        <select class="form-control" name="id_buku" required>
                            @foreach($buku as $data)
                                <option value="{{ $data->id }}">{{ $data->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                    

                    <div class="col-md-4x">
                        <label for="input13" class="form-label">Jumlah</label>
                        <div class="position-relative">
                            <input class="form-control mb-3" type="number" name="jumlah_pinjam" placeholder="Jumlah" value="{{$peminjaman->jumlah_pinjam}}" required>
                        </div>
                    </div>

                    <div class="col-md-4x">
                        <label for="input13" class="form-label">Tanggal Peminjaman</label>
                        <input class="form-control mb-3" type="date" name="tanggal_pinjam" value="{{ $peminjaman->tanggal_pinjam }}" required>
                    </div>

                    <div class="col-md-4x">
                        <label for="input13" class="form-label">Batas Pengembalian</label>
                        <input class="form-control mb-3" type="date" name="batas_pinjam" value="{{ $peminjaman->batas_pinjam }}" required>
                    </div>

                    <div class="col-md-4x">
                        <label for="input13" class="form-label">Tanggal Pengembalian</label>
                        <input class="form-control mb-3" type="date" name="tanggal_kembali" value="{{ $peminjaman->tanggal_kembali }}" required>
                    </div>

                    <div class="col-md-12">
                        <label for="input17" class="form-label">Status</label>
                        <select name="status" class="form-control" id="">
                            <option value="Dipinjam" {{ $peminjaman->status == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                            <option value="Dikembalikan" {{ $peminjaman->status == 'Dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                        </select>
                    </div> 
                    
                    <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <a href="{{route('buku.index')}}" class="btn btn-danger px-4">Batal</a>
                            <button type="submit" class="btn btn-primary px-4">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
