<!doctype html>
<html lang="en" data-bs-theme=semi-dark>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('images/buku/smk.png')}}">
    <link rel="icon" type="image/png" href="{{asset('images/buku/smk.png')}}">
    <title>Perpustakaan - Dashboard</title>
    {{-- <img src="{{asset('images/buku/smk.png')}}" alt="" /> --}}
    <!--favicon-->
    {{-- <link rel="icon" href="{{asset('backend/assets/images/favicon-32x32.png')}}" type="image/png"> --}}
    <!-- loader-->
    <link href="{{asset('backend/assets/css/pace.min.css')}}" rel="stylesheet">
    <script src="{{asset('backend/assets/js/pace.min.js')}}"></script>

    <!--plugins-->
    <link rel="stylesheet" href="{{asset('backend/assets/css/extra-icons.css')}}">
    <link href="{{asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/plugins/metismenu/metisMenu.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/plugins/metismenu/mm-vertical.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('backend/assets/plugins/simplebar/css/simplebar.css')}}">
    <link href="{{asset('backend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
    <!--bootstrap css-->
    <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="path/to/metismenu.css">
    <!--main css-->
    <link href="{{asset('backend/assets/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('backend/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
    <link href="{{asset('backend/sass/main.css')}}" rel="stylesheet">
    <link href="{{asset('backend/sass/semi-dark.css')}}" rel="stylesheet">
    <link href="{{asset('backend/sass/bordered-theme.css')}}" rel="stylesheet">
    <link href="{{asset('backend/sass/responsive.css')}}" rel="stylesheet">
    @yield('css')

</head>
<style>

</style>
<body>

    <!--start header-->
    @include('include.backend.admin.header')
    <!--end top header-->

    <!--start sidebar-->
    @include('include.backend.admin.sidebar')
    <!--end sidebar-->

    <!--start main wrapper-->
    <main class="main-wrapper">
        <div class="main-content">
            <div class="row">
                <div class="col-12 col-lg-3 col-xxl-3 d-flex">
                    <div class="card rounded-4 w-100 bg ">
                        <div class="card-body">
                            <div class="">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <h5 class="mb-0">Tabel Buku</h5>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="">
                                        <h3 class="mb-0 text-indigo pb-3">{{$jumlahbuku}}</h3>
                                        <a href="{{route('buku.index')}}" class="btn btn-primary rounded-5 border-0 px-4">Detail</a>
                                    </div>
                                    <img src="{{asset('backend/assets/images/leptop/cf.jfif')}}" width="123" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col-12 col-lg-3 col-xxl-3 d-flex">
                    <div class="card rounded-4 w-100 bg ">
                        <div class="card-body">
                            <div class="">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <h5 class="mb-0">Jumlah Peminjaman</h5>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="">
                                        <h3 class="mb-0 text-indigo pb-3">{{$jumlahpeminjamanbuku}}</h3>
                                        <a href="{{route('indexpeminjaman')}}" class="btn btn-primary rounded-5 border-0 px-4">Detail</a>
                                    </div>
                                    <img src="{{asset('backend/assets/images/leptop/cart.avif')}}" width="100" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col-12 col-lg-3 col-xxl-3 d-flex">
                    <div class="card rounded-4 w-100 bg ">
                        <div class="card-body">
                            <div class="">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <h5 class="mb-0">Jumlah Pengguna</h5>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="">
                                        <h3 class="mb-0 text-indigo pb-3">{{$jumlahuser}}</h3>
                                        <a href="{{route('user.index')}}" class="btn btn-primary rounded-5 border-0 px-4">Detail</a>
                                    </div>
                                    <img src="{{asset('backend/assets/images/leptop/p5.jfif')}}" width="100" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col-12 col-lg-3 col-xxl-3 d-flex">
                    <div class="card rounded-4 w-100 bg ">
                        <div class="card-body">
                            <div class="">
                                <div class="d-flex align-items-center gap-2 mb-2">
                                    <h5 class="mb-0">Ulasan</h5>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="">
                                        <h3 class="mb-0 text-indigo pb-3">{{$jumlahkomentar}}</h3>
                                        <a href="{{route('kategori.index')}}" class="btn btn-primary rounded-5 border-0 px-4">Detail</a>
                                    </div>
                                    <img src="{{asset('backend/assets/images/leptop/cart.avif')}}" width="100" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
            <div class="row">
                <div class="col-6 col-xxl-6 d-flex">
                    <div class="card rounded-4 w-100">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-3">
                                <div class="">
                                    <h5 class="mb-0">Daftar Penugguna</h5>
                                </div>
                                <div class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle-nocaret options dropdown-toggle" data-bs-toggle="dropdown">
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-middle mb-0 table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pengguna</th>
                                            <th>email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $index => $data)
                                        @if ($data->isAdmin == '0')
                                        <tr>
                                            <th scope="row">{{ $loop->index+1 }}</th>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->email }}</td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col-12 col-xl-6">
                    <div class="card rounded-4">
                        <div class="card-header py-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="">
                                    <h5 class="mb-0">Chart Tabel</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="charttabel"></div>
                            {{-- {!! $chart->container() !!} --}}
                        </div>
                    </div>
                </div>
            
                <div class="col-12 col-xl-12">
                    <div class="card rounded-4">
                        <div class="card-header py-3">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="">
                                    <h5 class="mb-0">Daftar Pinjaman Buku</h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="chartpeminjaman"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--end main wrapper-->


    <!--start overlay-->
    <div class="overlay btn-toggle"></div>
    <!--end overlay-->


    <!--start footer-->
    @include('include.backend.admin.footer')
    <!--end footer-->

    <!--bootstrap js-->
    <script src="{{asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>

    <!--plugins-->
    <script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>
    <!--plugins-->
    <script src="{{asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/apexchart/apexcharts.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/apexchart/apex-custom-chart.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/peity/jquery.peity.min.js')}}"></script>
    <script src="{{asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script>
        $(".data-attributes span").peity("donut")

    </script>
    <script>
        var options = {
            series: [ {
                name: "Kategori",
                data: [{{$jumlahkategori}}],
            },
            {
                name: "Penulis",
                data: [{{$jumlahpenulis}}],
            },
            {
                name: "Penerbit",
                data: [{{$jumlahpenerbit}}],
            },
            {
                name: "Buku",
                data: [{{$jumlahbuku}}],
            },
            
            ]
            , chart: {
                foreColor: "#9ba7b2"
                , height: 380
                , type: "bar"
                , zoom: {
                    enabled: false
                }
                , toolbar: {
                    show: false
                }
            }
            , fill: {
                type: "gradient"
                , gradient: {
                    shade: "dark"
                    , gradientToColors: ["#ffd200", "#00c6fb", "#7928ca","#A52A2A"]
                    , shadeIntensity: 1
                    , type: "vertical"
                    , stops: [0, 100, 100, 100]
                }
            }
            , colors: ["#ff6a00", "#005bea", "#ff0080"]
            , plotOptions: {
                bar: {
                    horizontal: false
                    , borderRadius: 4
                    , columnWidth: "50%"
                }
            }
            , dataLabels: {
                enabled: false
            }
            , stroke: {
                show: true
                , width: 4
                , colors: ["transparent"]
            }
            , grid: {
                show: true
                , borderColor: "rgba(0, 0, 0, 0.15)"
                , strokeDashArray: 4
            }
            , tooltip: {
                theme: "dark"
            }
            , xaxis: {
                categories: [
                  "Data Tabel "
                ]
            }
        , };

        var chart = new ApexCharts(document.querySelector("#charttabel"), options);
        chart.render();

    </script>

    <script>
        var options = {
            series: [{
                name: "Peminjaman"
                , data: @json($dataPinjam) // Using Laravel's json function
            }]
            , chart: {
                foreColor: "#9ba7b2"
                , height: 350
                , type: "area"
                , zoom: {
                    enabled: false
                , }
                , toolbar: {
                    show: !1
                , }
            , }
            , dataLabels: {
                enabled: false
            , }
            , stroke: {
                width: 4
                , curve: "smooth"
            , }
            , fill: {
                type: "gradient"
                , gradient: {
                    shade: "dark"
                    , gradientToColors: ["#ff0080"]
                    , shadeIntensity: 1
                    , type: "vertical"
                    , opacityFrom: 0.8
                    , opacityTo: 0.1
                    , stops: [0, 100, 100, 100]
                , }
            , }
            , colors: ["#ffd200", "#ff6a00", "#005bea", "#ff0080"]
            , grid: {
                show: true
                , borderColor: "rgba(0, 0, 0, 0.15)"
                , strokeDashArray: 4
            , }
            , tooltip: {
                theme: "dark"
            , }
            , xaxis: {
                categories: [
                    "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Des"
                , ]
            , }
            , markers: {
                show: !1
                , size: 5
            , }
        , };

        var chart = new ApexCharts(document.querySelector("#chartpeminjaman"), options);
        chart.render();

    </script>



    {{-- <script src="{{asset('backend/assets/js/dashboard2.js')}}"></script> --}}
    <script src="{{asset('backend/assets/js/main.js')}}"></script>

    @yield('js')
    @stack('script')
</body>

</html>
