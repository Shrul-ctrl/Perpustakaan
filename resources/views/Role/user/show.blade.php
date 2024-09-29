@extends('layouts.frontend.main')
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
                            <p>Jumlah Buku Tersedia: {{$buku->jumlah_buku}}</p>
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
               
            </div>
        </section>
    </div>
</div>
</div>
@endsection
