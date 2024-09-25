@extends('layouts.backend.user')
@section('content')
<!-- Facilities Start -->
<div class="container-fluid pt-5" style="margin-top: 50px ">
    <div class="container pb-3">
        <div class=" bg-light shadow-sm border-top mb-4 p-5 mt-5">
            <div class="row">
                <div class="col-lg-12 col-md-12 pb-1">
                    <h4>Buku {{$buku->judul}}</h4>
                    <p class="m-0'">
                        Buku{{$buku->judul}} lengkap. Buku {{$buku->judul}} yang ditulis oleh {{$buku->penuli->nama_penulis}}. Informasi selengkapnya mengenai Buku {{$buku->judul}} ada bawah ini.
                    </p>
                    <div class="row">
                        <div class="col-lg-4 col-md-12 pb-1">
                            <img src="{{ asset('images/buku/' . $buku->foto) }}" alt="" class="card-img-top" class="card-img-top" width="50" height="450" onerror="this.onerror=null; this.src='{{ asset('images/tidakadafoto.jfif') }}';">
                        </div>
                        <div class="des col-lg-8 col-md-6 pb-1">
                            <p>Judul : {{$buku->judul}}</p>
                            <p>Penulis : {{$buku->penuli->nama_penulis}}</p>
                            <p>Penerbit : {{$buku->penerbit->nama_penerbit}}</p>
                            <p>Kategori : {{$buku->kategori->nama_kategori}}</p>
                            <p>Jumlah : {{$buku->jumlah}}</p>
                            <p>Sinopsis : {{$buku->deskripsi}}</p>
                        </div>
                    </div>
                    <a href="{{ url()->previous() }}" class="btn btn-primary px-4 float-end">Kembali</a>
                </div>
            </div>
        </div>

        <section id="komentar" class="pt-5">
            <div class=" bg-light shadow-sm border-top mb-4 p-5 mt-5">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="row">
                    <div class="col-lg-12 col-md-12 pb-1">
                        <h4 class="mb-4">Komentar</h4>
                        @guest
                        <h1 class="text-center">Anda Tidak Bisa Berkomentar, <a href="{{route('login')}}">Login Terlebih Dahulu</a></h1>
                        @endguest
                        <hr class="bg-dark">
                        <div class="chat-header">
                            <div class="list-inline d-sm-flex mb-0 d-none">
                                <p class="list-inline-item text-secondary">
                                    <a href="" class="list-inline-item text-secondary">Terbaru</a>
                                    <a href="" class="list-inline-item text-secondary">Terlama</a>
                                </p>
                            </div>
                        </div>
                        @foreach($komentars as $data)
                        <div class="d-flex mb-3">
                            <img src="{{ asset('images/data/' . $data->fotoprofile) }}" width="60" height="60" class="rounded-circle mr-3" alt="" onerror="this.onerror=null; this.src='{{ asset('images/tidakadafoto.jfif') }}';"/>
                            <div class="flex-grow-1 ms-2">
                                <p class="mb-0">{{ $data->user->name }}</p>
                                <p class="mb-0">{{ $data->tanggal_komentar}}</p>
                                <p>{{ $data->komentar }}</p>
                                <p class="d-flex align-content-between">
                                    <a href="#"><i class="material-icons-outlined mx-2">thumb_up</i></a> {{ $data->suka }}
                                    <a href="#"><i class="material-icons-outlined mx-2">thumb_down</i></a> {{ $data->tidak_suka }}
                                </p>
                            </div>
                        </div>
                        @endforeach

                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 pe-2">
                                @auth
                                <form action="{{ route('komentar.store') }}" method="POST">
                                    @csrf
                                    <div class="input-group">
                                        <input type="text" name="komentar" class="form-control" placeholder="Beri Komentar" required>
                                        <button class="btn btn-primary" type="submit">Kirim</button>
                                    </div>
                                </form>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</div>
@endsection
