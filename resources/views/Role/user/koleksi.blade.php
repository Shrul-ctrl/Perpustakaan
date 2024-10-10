@extends('layouts.backend.user')
<title>Perpustakaan - Koleksi Buku</title>
@section('content')

<h3 class="mb-0 text-uppercase pb-3">KOLEKSI PEMINJAMAN BUKU</h3>
<hr>
<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="container-fluid pb-3">
                <div class="container">
                    <div class="text-center pb-2">
                        <p class="section-title px-5">
                            <h3 class="px-2">KOLEKSI</h3>
                        </p>
                        <hr>
                        {{-- <h1 class="mb-4">Pinjam Buku</h1> --}}
                    </div>
                    @if($koleksi->isEmpty())
                    <div class="alert alert-info" role="alert">
                        <h4 class="text-center p-3">Tidak ada Koleksi</h4>
                    </div>
                    @else
                    <div class="row">
                        @foreach ($koleksi as $data)
                        <div class="col-3 mb-5">
                            <div class="card border-0 bg-light shadow-sm pb-2">
                                <img src="{{ asset('images/buku/' . $data->buku->foto) }}" alt="" class="card-img-top" alt="..." height="290" onerror="this.onerror=null; this.src='{{ asset('images/tidakadafoto.jfif') }}';">
                                <div class="card-body text-center">
                                    <h6 class="card-title">{{$data->buku->judul}}</h6>
                                    <h6 class="card-title">{{$data->user->name}}</h6>
                                    <p class="card-text">
                                        {{-- {{$data->deskripsi}} --}}
                                    </p>
                                </div>
                                <div class="justify-content-center gap-1">
                                    <td>
                                    <a href="{{ route('user.peminjaman.create', $data->id) }}" type="button" class="btn btn-primary">Pinjam</a>
                                    <a href="{{ route('show.listbuku', $data->id) }}" type="button" class="btn btn-warning"> <i class="material-icons-outlined text-light">visibility</i></a>
                                    <form action="{{ route('koleksi.destroy', $data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-success">
                                            <i class="material-icons-outlined">favorite</i>
                                        </button>
                                    </form>
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

                {{-- <nav aria-label="Page navigation example">
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
                </nav> --}}
            </div>
        </div>
    </div>
</div>
</div>

@endsection
