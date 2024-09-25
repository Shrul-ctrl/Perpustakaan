<!doctype html>
<html lang="en" data-bs-theme=semi-dark>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{asset('images/buku/smk.png')}}">

    <title>Perpustakaan</title>
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
    <link href="{{asset('backend/assets/css/style.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <!--main css-->
    <link href="{{asset('backend/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
    <link href="{{asset('backend/sass/main.css')}}" rel="stylesheet">
    <link href="{{asset('backend/sass/semi-dark.css')}}" rel="stylesheet">
    <link href="{{asset('backend/sass/bordered-theme.css')}}" rel="stylesheet">
    <link href="{{asset('backend/sass/responsive.css')}}" rel="stylesheet">
    @yield('css')

</head>

<body>

    <!--start header-->
    @include('include.backend.user.header')
    <!--end top header-->

    <!--start sidebar-->
    @include('include.backend.user.sidebar')
    <!--end sidebar-->

    <!--start main wrapper-->
    <main class="main-wrapper">
        <div class="main-content">
            <div class="row">
                @yield('content')
            </div>
        </div>
    </main>
    <!--end main wrapper-->


    <!--start overlay-->
    <div class="overlay btn-toggle"></div>
    <!--end overlay-->


    <!--start footer-->
    @include('include.backend.user.footer')
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
        $(document).ready(function() {
            $('#example').DataTable({
                ordering: false
                , lengthChange: false
                , info: false
                ,  searching: false
                , language: {
                    search: "Cari:"
                }
            });
        });

    </script>

    <script>
        $(document).ready(function() {
            $('#example1').DataTable({
                ordering: true
                , lengthChange: true
                , info: true
                , language: {
                    search: "Cari:"
                    , lengthMenu: "Tampilkan _MENU_ entri"
                    , info: "Menampilkan _START_ hingga _END_ dari _TOTAL_ entri"
                    , infoEmpty: "Menampilkan 0 hingga 0 dari 0 entri"
                    , infoFiltered: "(disaring dari _MAX_ total entri)"
                    , paginate: {
                        first: "Pertama"
                        , last: "Terakhir"
                        , next: "Berikutnya"
                        , previous: "Sebelumnya"
                    }
                }
            });
        });

    </script>


    <script>
        $(document).ready(function() {
            var table = $('#example2').DataTable({
                lengthChange: false
                , buttons: ['excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#example2_wrapper .col-md-6:eq(0)');
        });

    </script>

    <script>
        $(function() {
            $('[data-bs-toggle="popover"]').popover();
            $('[data-bs-toggle="tooltip"]').tooltip();
        })

    </script>



    {{-- <script src="{{asset('backend/assets/js/dashboard2.js')}}"></script> --}}
    <script src="{{asset('backend/assets/js/main.js')}}"></script>

    @yield('js')
    @stack('script')
</body>

</html>
