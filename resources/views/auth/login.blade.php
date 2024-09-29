<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan - Login</title>
    <!--favicon-->
    {{-- <link rel="icon" href="{{ asset('backend/assets/images/favicon-32x32.png') }}" type="image/png"> --}}
    <!-- loader-->
    <link href="{{ asset('backend/assets/css/pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('backend/assets/js/pace.min.js') }}"></script>

    <!--plugins-->
    <link href="{{ asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/plugins/metismenu/metisMenu.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/plugins/metismenu/mm-vertical.css') }}">
    <!--bootstrap css-->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <!--main css-->
    <link href="{{ asset('backend/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/sass/main.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/sass/dark-theme.cs') }}s" rel="stylesheet">
    <link href="{{ asset('backend/sass/blue-theme.cs') }}s" rel="stylesheet">
    <link href="{{ asset('backend/sass/responsive.css') }}" rel="stylesheet">

</head>

<style>
    body {
        /* background-size: 100%;background-image: url('images/back.jpg');
        background-color: rgba(0, 0, 0, 0.7);  */
        /* overflow: hidden; */
    }

    @import url('https://fonts.googleapis.com/css?family=Exo:400,700');

    * {
        margin: 0px;
        padding: 0px;
    }

    body {
        font-family: 'Exo', sans-serif;
    }


    .context {
        width: 100%;
        position: absolute;
        /* top: 50vh; */

    }

    .context h1 {
        text-align: center;
        color: #fff;
        font-size: 50px;
    }


    .area {
        background: #4e54c8;
        background: -webkit-linear-gradient(to left, #8f94fb, #4e54c8);
        width: 100%;
        height: 100vh;


    }

    .circles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .circles li {
        position: absolute;
        display: block;
        list-style: none;
        width: 20px;
        height: 20px;
        background: rgba(255, 255, 255, 0.2);
        animation: animate 25s linear infinite;
        bottom: -150px;

    }

    .circles li:nth-child(1) {
        left: 25%;
        width: 80px;
        height: 80px;
        animation-delay: 0s;
    }


    .circles li:nth-child(2) {
        left: 10%;
        width: 20px;
        height: 20px;
        animation-delay: 2s;
        animation-duration: 12s;
    }

    .circles li:nth-child(3) {
        left: 70%;
        width: 20px;
        height: 20px;
        animation-delay: 4s;
    }

    .circles li:nth-child(4) {
        left: 40%;
        width: 60px;
        height: 60px;
        animation-delay: 0s;
        animation-duration: 18s;
    }

    .circles li:nth-child(5) {
        left: 65%;
        width: 20px;
        height: 20px;
        animation-delay: 0s;
    }

    .circles li:nth-child(6) {
        left: 75%;
        width: 110px;
        height: 110px;
        animation-delay: 3s;
    }

    .circles li:nth-child(7) {
        left: 35%;
        width: 150px;
        height: 150px;
        animation-delay: 7s;
    }

    .circles li:nth-child(8) {
        left: 50%;
        width: 25px;
        height: 25px;
        animation-delay: 15s;
        animation-duration: 45s;
    }

    .circles li:nth-child(9) {
        left: 20%;
        width: 15px;
        height: 15px;
        animation-delay: 2s;
        animation-duration: 35s;
    }

    .circles li:nth-child(10) {
        left: 85%;
        width: 150px;
        height: 150px;
        animation-delay: 0s;
        animation-duration: 11s;
    }



    @keyframes animate {

        0% {
            transform: translateY(0) rotate(0deg);
            opacity: 1;
            border-radius: 0;
        }

        100% {
            transform: translateY(-1000px) rotate(720deg);
            opacity: 0;
            border-radius: 50%;
        }

    }

</style>

<body>
    <div class="context">
        <div class="area">
            <ul class="circles">
                <div class="auth-basic-wrapper d-flex align-items-center justify-content-center">
                    <div class="container-fluid my-3 my-lg-0">
                        <div class="row">
                            <div class="col-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4 mx-auto">
                                <div class="card rounded-4 mb-0 border-top border-4 border-primary shadow-lg">
                                    <div class="card-body">
                                        <h6 class="fw-bold text-center mt-2">LOGIN</h6>
                                        <hr>
                                        <div class="form-body my-3">
                                            <form class="row g-3 p-3 justify-content-center" method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="col-10">
                                                    <label for="inputEmailAddress" class="form-label">Email</label>
                                                    <input id="inputEmailAddress" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Masukkan Email">
                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="col-10">
                                                    <label for="inputChoosePassword" class="form-label">Password</label>
                                                    <div class="input-group" id="show_hide_password">
                                                        <input id="inputChoosePassword" type="password" class="form-control border-end-0 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukkan Password">
                                                        <a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-10">
                                                    <div class="d-grid justify-content-center">
                                                        <button type="submit" class="btn btn-primary px-5 btn-sm p-2">Login</button>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 text-center">
                                                    <span>Belum punya akun? </span><a href="{{ route('register') }}">daftar sekarang</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </div>
    <!--plugins-->
    <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bi-eye-slash-fill");
                    $('#show_hide_password i').removeClass("bi-eye-fill");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bi-eye-slash-fill");
                    $('#show_hide_password i').addClass("bi-eye-fill");
                }
            });
        });

    </script>

</body>

</html>


{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
@endsection --}}
