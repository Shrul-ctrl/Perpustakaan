@extends('layouts.frontend.main')
<title>Perpustakaan - Fax</title>
@section('content')

<!-- Header Start -->
<div class="container-fluid bg-primary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
        <h3 class="display-3 font-weight-bold text-white">Fax</h3>
        <div class="d-inline-flex text-white">
            <p class="m-0"><a class="text-white" href="">Home</a></p>
            <p class="m-0 px-2">/</p>
            <p class="m-0">Fax</p>
        </div>
    </div>
</div>
<!-- Header End -->

<div class="container p-5">
    <h1 class="mb-4">Pertanyaan yang Sering Diajukan </h1>
    
    <div class="accordion" id="faqAccordion">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Apa itu sistem peminjaman buku?
                    </button>
                </h2>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#faqAccordion">
                <div class="card-body">
                    Sistem peminjaman buku adalah platform yang memungkinkan pengguna untuk meminjam buku secara online.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Bagaimana cara mendaftar?
                    </button>
                </h2>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#faqAccordion">
                <div class="card-body">
                    Untuk mendaftar, Anda dapat mengisi formulir pendaftaran di situs kami dan mengikuti langkah-langkah yang diberikan.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Apakah ada biaya untuk meminjam buku?
                    </button>
                </h2>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#faqAccordion">
                <div class="card-body">
                    Tidak, meminjam buku melalui sistem kami tidak dikenakan biaya.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingFour">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Bagaimana cara mengembalikan buku?
                    </button>
                </h2>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#faqAccordion">
                <div class="card-body">
                    Anda dapat mengembalikan buku dengan mengunjungi lokasi kami atau melalui pengembalian online jika tersedia.
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingFive">
                <h2 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Siapa yang dapat meminjam buku?
                    </button>
                </h2>
            </div>
            <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#faqAccordion">
                <div class="card-body">
                    Siapa saja yang telah mendaftar dan memiliki akun di sistem kami dapat meminjam buku.
                </div>
            </div>
        </div>
    </div>
</div>

@endsection