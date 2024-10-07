<style>
    .filter-container {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        box-shadow: 5px 8px 16px 5px rgba(0, 0, 0, 0.374);
        padding: 25px;
        margin-top: 10px;
        width: 800px;
        top: 50px;
        right: 0;
        z-index: 1;
        border-radius: 20px;
        max-height: 300px;
        overflow-y: auto;
    }

    .filter-btn {
        border-radius: 5px;
        padding: 5px 20px;
        font-size: 16px;
        cursor: pointer;
        color: green
    }

    .filter-btn:hover {
        color: white;
        background: green
    }

    .filter-section {
        float: left;
        width: 25%;
        /* border-right: 1px solid black; */
        padding-left: 20px
    }

    .filter-section ul {
        list-style: none;
        padding: 0;
    }

    .filter-section h3 {
        margin-bottom: 10px;
    }

    .dropdown-content::after {
        content: "";
        clear: both;
        display: table;
    }

</style>
@extends('layouts.backend.user')
<title>Perpustakaan - Daftar Buku</title>
@section('content')
<h3 class="mb-0 text-uppercase pb-3">PINJAMAN BUKU</h3>
<hr>
<div class="col-12 col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="container p-5 py-5">
                <div class="row pt-5">
                    <div class="col-lg-8">
                        <div class="d-flex flex-column text-left mb-3">
                            <p class="section-title pr-5">
                                <span class="pr-2">Daftar Buku</span>
                            </p>
                            <h2 class="mb-3" id="daftar">Daftar Peminjaman Buku</h2>
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
                                            <a href="{{ route('show.listbuku', $data->id) }}" type="button" class="btn btn-warning btn-sm">Detail</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item {{ $buku->onFirstPage() ? 'disabled' : '' }}">
                                        <a class="page-link" href="{{ $buku->previousPageUrl() }}" aria-label="Sebelum">
                                            <span aria-hidden="true">«</span>
                                        </a>
                                    </li>

                                    @foreach ($buku->getUrlRange(1, $buku->lastPage()) as $page => $url)
                                    <li class="page-item {{ $page == $buku->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                    </li>
                                    @endforeach

                                    <li class="page-item {{ $buku->hasMorePages() ? '' : 'disabled' }}">
                                        <a class="page-link" href="{{ $buku->nextPageUrl() }}" aria-label="Next">
                                            <span aria-hidden="true">»</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-5 mt-lg-0">
                        <div class="card border-0 shadow-sm mb-2 p-3">
                            <div class="d-flex justify-content-end gap-2">
                                <button class="filter-btn mb-3 border border-success" onclick="toggleDropdown()"> <i class="fas fa-filter"></i>Filter</button>
                                <form action="{{ route('listbuku') }}" method="GET" class="mb-3">
                                    <select name="filter" class="form-select border border-primary" onchange="this.form.submit()">
                                        <option value="" class="text-center">-- Filter Buku --</option>
                                        <option value="terbaru">Filter Buku Terbaru</option>
                                        <option value="populer">Filter Buku Populer</option>
                                    </select>
                                </form>

                            </div>
                        </div>
                        <div id="dropdown" class="dropdown-content">
                            <div class="filter-section">
                                <h3>Kategori</h3>
                                <div class="col-md-12">
                                    <ul>
                                        @foreach ($kategori as $data)
                                        <li>
                                            <a href="{{ route('kategori.filter.user', $data->id) }}">{{ $data->nama_kategori }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="filter-section">
                                <h3>Penerbit</h3>
                                <div class="col-md-12">
                                    <ul>
                                        @foreach ($penerbit as $data)
                                        <li>
                                            <a href="{{ route('penerbit.filter.user', $data->id) }}">{{ $data->nama_penerbit }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="filter-section">
                                <h3>Penulis</h3>
                                <div class="col-md-12">
                                    <ul>
                                        @foreach ($penulis as $data)
                                        <li>
                                            <a href="{{ route('penulis.filter.user', $data->id) }}">{{ $data->nama_penulis }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="filter-section">
                                <h3>Tahun</h3>
                                <div class="col-md-12">
                                    <ul>
                                        <?php for ($tahun = 2000; $tahun <= 2024; $tahun++): ?>
                                        <li>
                                            <a href="">
                                                <?= $tahun ?>
                                            </a>
                                        </li>
                                        <?php endfor; ?>
                                    </ul>

                                </div>
                            </div>
                        </div>

                        <div class="card border-0 shadow-sm mb-5">
                            <img src="{{ asset('images/tidakadafoto.jfif') }}" alt="" width="330" height="250" style="object-fit: cover" />
                        </div>

                        <!-- Recent Post -->
                        <div class="card border-0 shadow-sm p-3 mb-5">
                            <h4 class="mb-4">Buku Populer</h4>
                            @php
                            $limitedbuku = $bukupopuler->take(4);
                            @endphp
                            @foreach ($limitedbuku as $data)
                            <div class="d-flex align-items-center bg-light shadow-sm rounded overflow-hidden mb-3">
                                <a href="{{ route('show.listbuku', $data->id) }}">
                                    <img src="{{ asset('images/buku/' . ($data->foto)) }}" alt="" class="m-1" style="width: 80px; height: 80px" onerror="this.onerror=null; this.src='{{ asset('images/tidakadafoto.jfif') }}';">
                                </a>
                                <div class="pl-3">
                                    <h6 class="">{{$data->judul}}</h6>
                                    <div class="d-flex">
                                        <small class="mr-3"><i class="fa fa-user text-primary"></i> {{$data->penuli->nama_penulis}}</small>
                                        <small class="mr-3"><i class="fa fa-folder text-primary"></i> {{$data->penerbit->nama_penerbit}}</small>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
    // script.js
    function toggleDropdown() {
        var dropdown = document.getElementById("dropdown");
        if (dropdown.style.display === "block") {
            dropdown.style.display = "none";
        } else {
            dropdown.style.display = "block";
        }
    }

    // Menutup dropdown jika pengguna mengklik di luar area
    window.onclick = function(event) {
        if (!event.target.matches('.filter-btn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.style.display === "block") {
                    openDropdown.style.display = "none";
                }
            }
        }
    }

</script>
