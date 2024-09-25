@extends('layouts.backend.user')
<title>Perpustakaan - Daftar Buku</title>
@section('content')
<h3 class="mb-0 text-uppercase pb-3">PINJAMAN BUKU</h3>
<hr>
<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="container-fluid pb-3">
                <div class="text-center pb-2">
                    <p class="section-title px-5">
                        <h3 class="px-2">Kategori</h3>
                    </p>
                    <hr>
                    {{-- <h1 class="mb-4">Pinjam Buku</h1> --}}
                </div>
                <div class="row">
                    <div class="col-12 text-center mb-2">
                        <ul class="list-inline mb-4" id="portfolio-flters">
                            <li class="btn btn-outline-primary m-1">
                                <a href="{{ route('profilelistbuku') }}">Semua</a>
                            </li>
                            @foreach ($kategori as $data)
                            <li class="btn btn-outline-primary m-1">
                                <a href="{{ route('profilelistbuku.filter', $data->id) }}">{{ $data->nama_kategori }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                @if($buku->isEmpty())
                <div class="alert alert-info" role="alert">
                    <h2 class="text-center p-3">Buku Sedang Kosong</h2>
                </div>
                @else
                <div class="row">
                    @foreach ($buku as $data )
                    <div class="col-lg-3 mb-5">
                        <div class="card border-0 bg-light shadow-sm pb-2">
                            <a href="{{ route('peminjaman.create' , $data->id) }}">
                                <img src="{{ asset('images/buku/' . $data->foto) }}" alt="" class="card-img-top" alt="..." width="50" height="350" onerror="this.onerror=null; this.src='{{ asset('images/tidakadafoto.jfif') }}';">
                            </a>
                            <div class="card-body text-center">
                                <h4 class="card-title">{{$data->judul}}</h4>
                                <p class="card-text">
                                    {{-- {{$data->deskripsi}} --}}
                                </p>
                            </div>
                            <div class="d-flex justify-content-center gap-1">
                                <a href="{{ route('peminjaman.create', $data->id) }}" type="button" class="btn btn-primary btn-sm">Pinjam</a>
                                <a href="{{ url('user/show', $data->id) }}#komentar" type="button" class="btn btn-success btn-sm">Ulas</a>
                                <a href="{{ url('user/show', $data->id) }}" type="button" class="btn btn-warning btn-sm">Detail</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif

              
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

@endsection
