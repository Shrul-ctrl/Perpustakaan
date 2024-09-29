@extends('layouts.frontend.main')
<title>Perpustakaan - Fax</title>
@section('content')

<!-- Header Start -->
<div class="container-fluid bg-primary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h3 class="display-3 font-weight-bold text-white">Hubungi Kami</h3>
        <div class="d-inline-flex text-white">
            <p class="m-0"><a class="text-white" href="">Home</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">Hubungi Kami</p>
        </div>
    </div>
</div>
<!-- Header End -->

<div class="container p-5">
    <div class="row">
        {{-- <div class="col-md-6">
            <h2>Form Kontak</h2>
            <form>
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" class="form-control" id="name" placeholder="Masukkan nama Anda" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Masukkan email Anda" required>
                </div>
                <div class="form-group">
                    <label for="message">Pesan</label>
                    <textarea class="form-control" id="message" rows="4" placeholder="Masukkan pesan Anda" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div> --}}

        <div class="col-md-6">
            <h2>Lokasi Kami</h2>
            <div id="map"></div>
        </div>
    </div>
</div>

@endsection