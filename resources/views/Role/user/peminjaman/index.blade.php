@extends('layouts.backend.user')
<title>Perpustakaan - Peminajaman Buku</title>
@section('content')
<h3 class="mb-0 text-uppercase pb-3">PINJAMAN BUKU</h3>
<hr>
<div class="card">
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <form action="{{ route('peminjaman.index') }}" method="GET" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <div class="position-relative d-flex align-items-center">
                        <span class="me-2">Status:</span>
                        <select name="status_pengajuan" class="form-select" onchange="this.form.submit()">
                            <option value="">Semua Status</option>
                            <option value="menunggu pengajuan">Menunggu Pengajuan</option>
                            <option value="pengajuan diterima">Pengajuan Diterima</option>
                            <option value="pengajuan ditolak">Pengajuan Ditolak</option>
                            <option value="pengembalian diterima">Pengembalian Diterima</option>
                            <option value="pengembalian ditolak">Pengembalian Ditolak</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>

        {{-- <a href="{{ route('peminjaman.create') }}" class="btn btn-grd btn-primary px-5 mb-2">Tambah Data Peminjaman</a> --}}
        <div class="table-responsive">
            <table class="table mb-0" id="example1">
                <thead class="table">
                    <tr class="text-center">
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        {{-- <th scope="col">Nama Peminjam</th> --}}
                        <th scope="col">Jumlah</th>
                        <th scope="col">Tanggal Peminjaman</th>
                        <th scope="col">Batas Peminjaman</th>
                        <th scope="col">Tanggal Pengembalian</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peminjaman as $data)
                    {{-- @if ($data->status_pengajuan === 'diterima') --}}
                    <tr>
                        <th scope="row" class="text-center">{{ $loop->index+1 }}</th>
                        <td>{{ $data->buku->judul }}</td>
                        {{-- <td>{{ $data->nama_peminjam}}</td> --}}
                        <td class="text-center">{{ $data->jumlah_pinjam }}</td>
                        <td class="text-center">{{ $data->tanggal_pinjam }}</td>
                        <td class="text-center">{{ $data->batas_pinjam }}</td>
                        <td class="text-center">{{ $data->tanggal_kembali }}</td>
                        @include('include.fullstack.ifelsestatus')

                        <td>
                            @if($data->status_pengajuan === 'menunggu pengajuan')
                            <form action="{{ route('peminjaman.destroy', $data->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="left" title="Hapus Data" onclick="return confirm('Batal Pinjam Buku?')"><i class="material-icons-outlined" style="font-size: 18px;">delete</i></button>
                            </form>

                            @elseif($data->status_pengajuan === 'pengajuan diterima')
                            <a href="{{ route('peminjaman.edit', $data->id) }}" class="btn btn-warning text-light btn-sm" data-bs-toggle="tooltip" data-bs-placement="left" title="Kembalikan Buku">
                                <i class="material-icons-outlined" style="font-size: 18px;">edit</i>
                            </a>

                            @elseif($data->status_pengajuan === 'pengajuan ditolak')
                            <a href="{{ route('showpengajuanuser', $data->id) }}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="left" title="Lihat Alasan Ditolak">
                                <i class="material-icons-outlined" style="font-size: 18px;">visibility</i>
                            </a>

                            @elseif($data->status_pengajuan === 'pengembalian diterima')
                            <a href="" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="left" title="Beri Ulasan">
                                <i class="material-icons-outlined" style="font-size: 18px;">comment</i>
                            </a>


                            @elseif($data->status_pengajuan === 'pengembalian ditolak')
                            <a href="{{ route('showpengembalianuser', $data->id) }}" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="left" title="Lihat Alasan Ditolak">
                                <i class="material-icons-outlined" style="font-size: 18px;">visibility</i>
                            </a>

                            </form>
                            @endif
                        </td>


                        {{-- @foreach ($peminjaman as $data)
                        @if($data->status_pengajuan === 'diterima')
                        <td>
                            <a href="{{ route('peminjaman.edit', $data->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                        @endif
                        @endforeach

                        @foreach ($peminjaman as $data)
                        @if($data->status_pengajuan === 'ditahan')
                        <td>
                            <form action="{{ route('peminjaman.update', $data->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="status_pengajuan" value="batalkan">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin membatalkan pengajuan?')">Batal</button>
                            </form>

                        </td>
                        @endif
                        @endforeach

                        @foreach ($peminjaman as $data)
                        @if($data->status_pengajuan === 'ditolak')
                        <td>
                            <form action="{{ route('peminjaman.destroy', $data->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus Peminjaman')">Hapus</button>
                            </form>
                        </td>
                        @endif
                        @endforeach --}}

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
