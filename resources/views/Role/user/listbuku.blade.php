@extends('layouts.backend.user')
<title>Perpustakaan - Daftar Buku</title>
@section('content')

<!-- Header Start -->
<div class="container-fluid bg-primary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h3 class="display-3 font-weight-bold text-white">List Buku</h3>
        <div class="d-inline-flex text-white">
            <p class="m-0"><a class="text-white" href="">Home</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">Buku</p>
        </div>
    </div>
</div>
<!-- Header End -->

<!-- Gallery Start -->
<div class="container-fluid pt-5 pb-3">
    <div class="container">
        <div class="text-center pb-2">
            <p class="section-title px-5">
                <span class="px-2">List Buku</span>
            </p>
            <h1 class="mb-4">Pinjam Buku</h1>
        </div>
        <div class="row">
            <div class="col-12 text-center mb-2">
                <ul class="list-inline mb-4" id="portfolio-flters">
                    <li class="btn btn-outline-primary m-1">
                        <a href="{{ route('listbuku') }}">Semua</a>
                    </li>
                    @foreach ($kategori as $data)
                    <li class="btn btn-outline-primary m-1">
                        <a href="{{ route('buku.filter', $data->id) }}">{{ $data->nama_kategori }}</a>
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
            @foreach ($buku as $data)
            <div class="col-lg-3 mb-5">
                <div class="card border-0 bg-light shadow-sm pb-2">
                    {{-- <a href="{{ url('show', $data->id) }}"> --}}
                        <img src="{{ asset('images/buku/' . ($data->foto)) }}" alt="" class="card-img-top" width="50" height="350" onerror="this.onerror=null; this.src='{{ asset('images/tidakadafoto.jfif') }}';">
                    {{-- </a> --}}
                    <div class="card-body text-center">
                        <h4 class="card-title">{{ $data->judul }}</h4>
                        <p class="card-text"></p>
                    </div>
                    <div class="d-flex justify-content-center gap-1">
                        <a href="{{ route('peminjaman.create' , $data->id) }}" type="button" class="btn btn-primary btn-sm">Pinjam</a>
                        {{-- <a href="{{ url('user/show', $data->id) }}#komentar" type="button" class="btn btn-success btn-sm">Ulas</a> --}}
                        <a href="{{ url('user/show', $data->id) }}" type="button" class="btn btn-warning btn-sm">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
            
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
<!-- Gallery End -->
@endsection
