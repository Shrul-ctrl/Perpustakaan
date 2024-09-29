@extends('layouts.frontend.main')
@section('content')

<!-- Header Start -->
<div class="container-fluid bg-primary px-0 px-md-5 mb-5">
    <div class="row align-items-center px-3">
        <div class="col-lg-6 text-center text-lg-left">
            <h4 class="text-white mb-4 mt-5 mt-lg-0">SMK ASSALAAM</h4>
            <h1 class="display-3 font-weight-bold text-white">
                SMK ASSALAAM PERPUSTAKAAN
            </h1>
            <p class="text-white mb-4">
                Buku adalah jendela dunia. Dengan membaca, Anda membuka pintu ke pengalaman dan pengetahuan yang tak terhingga.
            </p>
            {{-- <a href="" class="btn btn-secondary mt-1 py-3 px-5">Learn More</a> --}}
        </div>
        <div class="col-lg-6 text-center text-lg-right mt-5 mb-3">
            <img class="img-fluid mt-5" src="{{asset('frontend/img/header.png')}}" alt="" />
        </div>
    </div>
</div>
<!-- Header End -->
<div class="container">
    <!-- Facilities Start -->
    <div class="container-fluid pt-5">
        <div class="container pb-3">
            <div class="row">
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;height:200px;">
                        <i class="flaticon-050-fence h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h5>Meningkatkan Pengetahuan</h5>
                            <p class="m-0">

                                Membaca menambah wawasan dan informasi baru.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;height:200px;">
                        <i class="flaticon-022-drum h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h5>Mengasah Keterampilan Berpikir Kritis</h5>
                            <p class="m-0">
                                Membantu menganalisis dan memahami berbagai perspektif.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;height:200px;">
                        <i class="flaticon-030-crayons h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h5>Meningkatkan Konsentrasi</h5>
                            <p class="m-0">
                                Membaca meningkatkan fokus dan ketahanan mental.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;height:200px;">
                        <i class="flaticon-017-toy-car h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h5>Mengurangi Stres</h5>
                            <p class="m-0">
                                Membaca dapat menjadi pelarian dari tekanan dan kecemasan.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;height:200px;">
                        <i class="flaticon-025-sandwich h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h5> Meningkatkan Keterampilan Komunikasi</h5>
                            <p class="m-0">
                                Memperluas kosakata dan kemampuan berbahasa.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 pb-1">
                    <div class="d-flex bg-light shadow-sm border-top rounded mb-4" style="padding: 30px;height:200px;">
                        <i class="flaticon-047-backpack h1 font-weight-normal text-primary mb-3"></i>
                        <div class="pl-4">
                            <h5>Mendorong Kreativitas</h5>
                            <p class="m-0">
                                Memicu imajinasi dan ide-ide baru.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Facilities Start -->

    <!-- Class Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5">
                    <span class="px-2">Buku Terbaru</span>
                </p>
                <h1 class="mb-4">Buku</h1>
            </div>
            <div class="card border-0 bg-light shadow-sm p-4">
                @if($buku->isEmpty())
                <div class="alert alert-info" role="alert">
                    <h4 class="text-center p-3">Buku Sedang Kosong</h4>
                </div>
                @else
                <div class="row">
                    @php
                    $limitedbuku = $buku ->take(8)
                    @endphp
                    @foreach ($limitedbuku as $data )
                    <div class="col-3 mb-5">
                        <div class="card border-0 bg-light shadow-sm pb-2">
                            <a href="{{ url('show' , $data->id) }}">
                                <img src="{{ asset('images/buku/' . $data->foto) }}" alt="" class="card-img-top" alt="..." height="290" onerror="this.onerror=null; this.src='{{ asset('images/tidakadafoto.jfif') }}';">
                            </a>
                            <div class="card-body text-center">
                                <h6 class="card-title">{{$data->judul}}</h6>
                                <p class="card-text">
                                    {{-- {{$data->deskripsi}} --}}
                                </p>
                            </div>
                            <div class="d-flex justify-content-center gap-2">
                                {{-- <a href="" type="button" class="btn btn-primary px-4 float-end mb-4 mr-5" data-bs-toggle="modal" data-bs-target="#ScrollableModal">Kembali</a> --}}
                                {{-- <a href="{{ url('user/show', $data->id) }}#komentar" type="button" class="btn btn-success">Ulas</a> --}}
                                <a href="{{ route('user.peminjaman.create', $data->id) }}" type="button" class="btn btn-primary">Pinjam</a>
                                <a href="{{ url('user/show', $data->id) }}" type="button" class="btn btn-warning">Detail</a>
                            </div>

                        </div>
                    </div>
                    @endforeach
                    <div class="d-flex justify-content-center">
                    <a href="{{ route('listbuku') }}" type="button" class="btn btn-primary">Lihat Lebih Banyak Buku</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Class End -->

    {{-- <section id="hubungi_kami" class="pt-5">
    <div class="container-fluid py-5 mt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5">
                    <span class="px-2">Hubungi Kami</span>
                </p>
                <h1 class="mb-4">Kontak</h1>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <p class="section-title pr-5">
                        <span class="pr-2">Pesan Ruang Bacaan</span>
                    </p>
                    <h1 class="mb-4">Pesan Ruang Bacaan untuk Anak Anda</h1>
                    <p>
                        Perpustakaan kami menyediakan ruang bacaan yang nyaman untuk anak Anda. Baik untuk belajar atau membaca buku, ruang-ruang kami dilengkapi untuk memberikan lingkungan yang kondusif. Pesan ruang bacaan hari ini untuk memastikan sesi belajar yang tenang dan fokus.
                    </p>
                    <ul class="list-inline m-0">
                        <li class="py-2">
                            <i class="fa fa-check text-success mr-3"></i>Ruang yang tenang dan nyaman untuk belajar
                        </li>
                        <li class="py-2">
                            <i class="fa fa-check text-success mr-3"></i>Ruang yang dapat diakses dan dilengkapi dengan baik
                        </li>
                        <li class="py-2">
                            <i class="fa fa-check text-success mr-3"></i>Sistem pemesanan memastikan ketersediaan dan kenyamanan
                        </li>
                    </ul>

                    <a href="{{route('listbuku')}}" class="btn btn-primary mt-4 py-2 px-4">Pinjam Buku</a>
</div>
<div class="col-lg-5">
    <div class="card border-0">
        <div class="card-header bg-secondary text-center p-4">
            <h1 class="text-white m-0">Hubungi Kami</h1>
        </div>
        <div class="card-body rounded-bottom bg-primary p-5">
            <form class="row g-3" method="POST" action="{{ route('kontak.store') }}" enctype="multipart/form-data">
                @csrf
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="form-group">
                    <input type="text" class="form-control border-0 p-4" name="id_user" placeholder="Nama Anda" required />
                </div>
                <div class="form-group">
                    <input type="email" class="form-control border-0 p-4" name="id_user" placeholder="Email Anda" required />
                </div>
                <div class="form-group">
                    <textarea type="text" class="form-control border-0 p-4" name="kontak" placeholder="Masukkan" required></textarea>
                </div>
                <div>
                    @guest
                    <a href="{{route('login')}}" class="btn btn-secondary btn-block border-0 py-3"> Login Terlebih dahulu </a>
                    @endguest

                    @auth
                    <button class="btn btn-secondary btn-block border-0 py-3" type="submit"> Kirim </button>
                    @endauth
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
</section> --}}
</div>




@endsection
