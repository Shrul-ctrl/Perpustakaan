@extends('layouts.backend.user')
<title>Perpustakaan - Riwayat Buku</title>
@section('content')
<h3 class="mb-0 text-uppercase pb-3">RIWAYAT PEMINJAMAN BUKU</h3>
<hr>
<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="container-fluid pb-3">
                <div class="container">
                    <div class="text-center pb-2">
                        <p class="section-title px-5">
                            <h3 class="px-2">RIWAYAT</h3>
                        </p>
                        <hr>
                        {{-- <h1 class="mb-4">Pinjam Buku</h1> --}}
                    </div>
                    @if($peminjaman->isEmpty())
                    <div class="alert alert-info" role="alert">
                        <h2 class="text-center p-3">Tidak ada Histori</h2>
                    </div>
                    @else
                    <div class="row">
                        @foreach ($peminjaman as $data )
                        <div class="col-lg-2 mb-5">
                            <div class="card border-0 bg-light shadow-sm pb-2">
                                <img src="{{ asset('images/buku/' . $data->buku->foto) }}" alt="" class="card-img-top" alt="..." width="40" height="200" onerror="this.onerror=null; this.src='{{ asset('images/tidakadafoto.jfif') }}';">
                                <div class="text-center pb-4 pt-4">
                                    <h6 class="card-title">{{ $data->buku->judul }}</h6>
                                </div>
                                <div class="d-flex justify-content-center gap-1">
                                    {{-- <a href="{{ route('peminjaman.create') }}" type="button" class="btn btn-primary" style="font-size: 12px; padding: 4px 8px;">Pinjam Lagi</a> --}}
                                    <a href="{{ route('ulasan') }}" type="button" class="btn btn-success" style="font-size: 12px; padding: 4px 8px;"  data-bs-toggle="tooltip" data-bs-placement="left" title="Beri Ulasan Buku">
                                        <i class="material-icons-outlined" style="font-size: 18px;">comment</i>
                                    </a>
                                    <a href="" type="button" class="btn btn-primary" style="font-size: 12px; padding: 4px 8px;" data-bs-toggle="modal" data-bs-target="#FormModal"  data-bs-toggle="tooltip" data-bs-placement="left" title="Detail peminjaman Buku">
                                        <i class="material-icons-outlined" style="font-size: 18px;">visibility</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif

                    {{-- <div>
                        Halaman : {{ $pagination->currentPage() }} <br />
                    Jumlah Data : {{ $pagination->total() }} <br />
                    Data Per Halaman : {{ $pagination->perPage() }} <br />
                </div> --}}

                <nav aria-label="Page navigation example">
                    <ul class="pagination" style="justify-content: center;">
                        <li class="page-item {{ $pagination->onFirstPage()}}">
                            <a class="page-link" href="{{ $pagination->previousPageUrl() }}" aria-label="Sebelum">
                                <span aria-hidden="true">«</span>
                            </a>
                        </li>

                        @foreach ($pagination->getUrlRange(1, $pagination->lastPage()) as $page => $url)
                        <li class="page-item {{ $page == $pagination->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                        @endforeach

                        <li class="page-item {{ $pagination->hasMorePages()}}">
                            <a class="page-link" href="{{ $pagination->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">»</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
</div>


<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="FormModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header py-2 bg-dark">
                <h5 class="modal-title text-light">Detail Riwayat Peminjaman</h5>
                <a href="javascript:;" class="primaery-menu-close" data-bs-dismiss="modal">
                    <i class="material-icons-outlined">close</i>
                </a>
            </div>
            <div class="modal-body">
                <div class="form-body">
                    <form class="row g-3">
                        <div class="col-md-6">
                            <label for="input1" class="form-label">Nama Peminjam</label>
                            <input type="text" class="form-control" id="input1">
                        </div>
                        <div class="col-md-6">
                            <label for="input2" class="form-label">Jumlah Peminjaman Buku</label>
                            <input type="text" class="form-control" id="input2">
                        </div>
                        <div class="col-md-12">
                            <label for="input3" class="form-label">Tanggal Peminjaman</label>
                            <input type="text" class="form-control" id="input3">
                        </div>
                        <div class="col-md-12">
                            <label for="input4" class="form-label">Tanggal Pengembalian</label>
                            <input type="text" class="form-control" id="input4">
                        </div>
                        <div class="col-md-12">
                            <div class="d-md-flex d-grid align-items-center gap-3 float-end">
                                <a href="javascript:;" data-bs-dismiss="modal" type="button" class="btn btn-primary px-3 btn-sm">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
