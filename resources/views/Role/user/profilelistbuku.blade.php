@extends('layouts.backend.user')
<title>Perpustakaan - Daftar Buku</title>
@section('content')
<h3 class="mb-0 text-uppercase pb-3">PINJAMAN BUKU</h3>
<hr>
<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="container p-5 py-5">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="d-flex flex-column text-left mb-3">
                            <h2 class="mb-3" id="daftar">Daftar Peminjaman Buku</h2>

                            @if ($kategoriDipilih)
                            <div class="d-flex justify-content-start gap-2">
                                <a href="{{ route('profilelistbuku') }}" type="button" class="btn btn-success">Tampilkan semua kategori</a>
                                <button type="button" class="btn btn-primary" style="max-width: 200px;">{{ $kategoriDipilih->nama_kategori }}</button>
                            </div>
                            @endif
                        </div>

                        <!-- Comment List -->
                        <div class="card border-0 shadow-sm p-3 mb-5">
                            @if($buku->isEmpty())
                            <div class="row">
                                <div class="col-lg-12 mb-5">
                                    <div class="alert alert-info" role="alert">
                                        <h2 class="text-center p-3">Buku Sedang Kosong</h2>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="row">
                                @foreach ($buku as $data)
                                <div class="col-lg-4 mb-5">
                                    <div class="card border-0 bg-light shadow-sm pb-2">
                                        <img src="{{ asset('images/buku/' . ($data->foto)) }}" alt="" class="card-img-top" width="50" height="200" onerror="this.onerror=null; this.src='{{ asset('images/tidakadafoto.jfif') }}';">
                                        <div class="card-body text-center">
                                            <h6 class="card-title">{{ $data->judul }}</h6>
                                        </div>
                                        <div class="d-flex justify-content-center gap-1">
                                            <a href="{{ route('user.peminjaman.create' , $data->id) }}" type="button" class="btn btn-primary btn-sm">Pinjam</a>
                                            <a href="{{ url('user/show', $data->id) }}" type="button" class="btn btn-warning btn-sm">Detail</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item {{ $pagination->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $pagination->previousPageUrl() }}" aria-label="Sebelum">
                                            <span aria-hidden="true">«</span>
                                        </a>
                                    </li>

                                    @foreach ($pagination->getUrlRange(1, $pagination->lastPage()) as $page => $url)
                                    <li class="page-item {{ $page == $pagination->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                    @endforeach

                                    <li class="page-item {{ $pagination->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $pagination->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true">»</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>

                        </div>
                    </div>

                    <div class="col-lg-4 mt-5 mt-lg-0">


                        <!-- Category List -->
                        <div class="card border-0 shadow-sm p-3 mb-5">
                            <h2 class="mb-4">Kategori</h2>
                            <div style="max-height: 400px; overflow-y: auto; overflow-x: hidden;">
                                <div class="row">
                                    @foreach ($kategori as $index => $data)
                                    @if ($index % 10 == 0 && $index != 0)
                                </div>
                                <div class="row">
                                    @endif
                                    <div class="col-md-6">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="{{ route('profilelistbuku.filter', $data->id) }}">{{ $data->nama_kategori }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
