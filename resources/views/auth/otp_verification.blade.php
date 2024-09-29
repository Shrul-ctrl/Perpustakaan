<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan - Vrifikasi Akun</title>
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

    .otp-container {
        width: 450px;
        padding: 50px;
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        text-align: center;
    }

    .otp-container p {
        font-size: 14px;
        color: #555;
    }

    .otp-container .otp-inputs {
        display: flex;
        justify-content: space-between;
        margin: 20px 0;
    }

    .otp-container .otp-input {
        width: 40px;
        height: 40px;
        text-align: center;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 18px;
        transition: all 0.2s;
    }

    .otp-container .otp-input:focus {
        border-color: #000000;
        box-shadow: 0 0 5px rgba(255, 64, 129, 0.5);
        outline: none;
    }

    .otp-container .timer {
        margin: 10px 0;
        color: #000000;
        font-size: 16px;
    }

    .otp-container .btn {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        margin: 10px 0;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s;
    }

    .btn-resend {
        background: #fff;
        border: 5px solid #ff4081;
        color: #ff4081;
    }

    .btn-resend:hover {
        background: #ff4081;
        color: white;
    }

    .btn-verify {
        background: linear-gradient(to right, #ff4081, #ff80ab);
        color: white;
    }

    .btn-verify:hover {
        background: linear-gradient(to right, #ff80ab, #ff4081);
    }

    .btn-login {
        background: #f0f0f0;
        color: #555;
        font-size: 14px;
        border: none;
    }

    .btn-login:hover {
        background: #ddd;
    }

</style>

<body>
    <div class="context">
        <div class="area">
            <ul class="circles">
                {{-- <!-- OTP Container -->
                <div class="auth-basic-wrapper d-flex align-items-center justify-content-center">
                    <div class="otp-container shadow-lg">
                        <!-- Judul -->
                        <h5 class="fw-bold text-center">LOGIN</h5>
                        <hr>
                        <p>Kami telah mengirimkan <b>One Time Password</b> ke email Anda</p>
                        <p>Silakan masukkan OTP</p>
                        <!-- Form OTP -->
                        <form class="otp-inputs justify-content-center mb-4 mt-4" method="POST" action="{{ route('verifyotp') }}">
                @csrf
                <div class="col-2">
                    <input type="text" class="otp-input" maxlength="1" name="otp_1" required>
                </div>
                <div class="col-2">
                    <input type="text" class="otp-input" maxlength="1" name="otp_2" required>
                </div>
                <div class="col-2">
                    <input type="text" class="otp-input" maxlength="1" name="otp_3" required>
                </div>
                <div class="col-2">
                    <input type="text" class="otp-input" maxlength="1" name="otp_4" required>
                </div>
                <div class="col-2">
                    <input type="text" class="otp-input" maxlength="1" name="otp_4" required>
                </div>
                <div class="col-2">
                    <input type="text" class="otp-input" maxlength="1" name="otp_4" required>
                </div>
                </form>

                <!-- Timer -->
                <div class="timer">1:52</div>

                <!-- Tombol Resend OTP dan Verify -->
                <div class="d-flex justify-content-center gap-2">
                    <button class="btn btn-resend mb-3">Resend OTP</button>
                    <button class="btn btn-verify">Verify OTP</button>
                </div>

                <!-- Tombol Login dengan Akun Lain -->
                <button class="btn btn-login">Login with another account</button>
        </div>
    </div> --}}

    <div class="auth-basic-wrapper d-flex align-items-center justify-content-center">
        <div class="container-fluid my-3 my-lg-0">
            <div class="row">
                <div class="col-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4 mx-auto">
                    <div class="card rounded-4 mb-0 border-top border-4 border-primary shadow-lg">
                        <div class="card-body">
                            <h6 class="fw-bold text-center mt-2 ">LOGIN</h6>
                            <hr>
                            <div class="text-center">
                                <p>Kami telah mengirimkan <b>One Time Password</b> ke email Anda</p>
                                {{-- <p>Silakan masukkan OTP</p> --}}
                            </div>
                            <div class="form-body my-3">
                                <form class="row g-3 p-3 justify-content-center" method="POST" action="{{ route('verifyotp') }}">
                                    @csrf
                                    @if (session('incorrect'))
                                    <div class="alert alert-success">
                                        {{ session('incorrect') }}
                                    </div>
                                    @endif
                                    <div class="col-10">
                                        <label class="form-label">Masukan Otp</label>
                                        <input type="number" min="1" class="form-control @error('token') is-invalid @enderror" name="token" value="{{ old('token') }}" required autocomplete="token" placeholder="Masukkan token">
                                        @error('token')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-10">
                                        <div class="d-grid justify-content-center">
                                            <button type="submit" class="btn btn-primary px-5 btn-sm p-2">Kirim</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Element List Lingkaran -->
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
