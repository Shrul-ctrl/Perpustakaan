@extends('layouts.backend.user')
    @section('content')
    <div class="col-12 col-xl-12">
        <div class="card">
            <div class="card-body p-4">
                <h4 class="mb-4">Detail Pengajuan Buku</h4>
                <hr>
                <form class="row g-3" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <label for="input13" class="form-label">Nama Peminjam</label>
                        <div class="position-relative">
                            <input class="form-control mb-3" type="text" name="nama_peminjam" placeholder="Nama" value="{{ $peminjaman->user->name }}" readonly>
                            {{-- <input type="hidden" name="nama_peminjam" value="{{ Auth::user()->name }}"> --}}
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="input13" class="form-label">Nama Buku</label>
                        <select class="form-control" name="id_buku" required>
                            @foreach($buku as $data)
                            <option value="{{ $data->id }}">{{ $data->judul }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="input13" class="form-label">Tanggal Peminjaman</label>
                        <input class="form-control mb-3" type="date" name="tanggal_pinjam" value="{{ $peminjaman->tanggal_pinjam }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="input13" class="form-label">Batas Pengembalian</label>
                        <input class="form-control mb-3" type="date" name="batas_pinjam" value="{{ $peminjaman->batas_pinjam }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="input13" class="form-label">Tanggal Pengembalian</label>
                        <input class="form-control mb-3" type="date" name="tanggal_kembali" value="{{ $peminjaman->tanggal_kembali }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label for="input13" class="form-label">Jumlah</label>
                        <div class="position-relative">
                            <input class="form-control mb-3" type="number" name="jumlah_pinjam" placeholder="Jumlah" value="{{$peminjaman->jumlah_pinjam}}" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for="input13" class="form-label">Alasan Penolakan</label>
                        <textarea class="form-control mb-3" type="text" name="alasan_pengajuan" readonly>{{ $peminjaman->alasan_pengajuan }}</textarea>
                    </div>

                    <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <a href="{{route('peminjaman.index')}}" class="btn btn-primary px-4 btn-sm">kembali</a>
                            <form action="{{ route('peminjaman.destroy', $data->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger bts-sm" onclick="return confirm('Hapus Pengajuan Penolakan Buku?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
