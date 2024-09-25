<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="{{asset('images/buku/smk.png')}}">

        <title>SMA ASSALAAM</title>

        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <!--plugins-->
        <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    
        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon" />
    
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet" />
    
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    
        <!-- Flaticon Font -->
        <link href="{{asset('frontend/lib/flaticon/font/flaticon.css')}}" rel="stylesheet" />
    
        <!-- Libraries Stylesheet -->
        <link href="{{asset('frontend/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet" />
        <link href="{{asset('frontend/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet" />
    
        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet"/>
    
        <!--bootstrap css-->
        <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
        <!--main css-->
    </head>

<body style="overflow-x: hidden">
    <!-- Navbar Start -->
    @include('include.frontend.header')
    <!-- Navbar End -->

        <!--start main wrapper-->
        <main class="main-wrapper">
            <div class="main-content">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </main>
        <!--end main wrapper-->

    <!-- Footer Start -->
    @include('include.frontend.footer')
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{asset('backend/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontend/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/lib/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('frontend/lib/lightbox/js/lightbox.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('frontend/mail/jqBootstrapValidation.min.js')}}"></script>
    <script src="{{asset('frontend/mail/contact.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('frontend/js/main.js')}}"></script>
</body>
</html>
