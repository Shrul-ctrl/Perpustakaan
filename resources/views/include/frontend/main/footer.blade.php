<div class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5">
    <div class="row pt-5">
        <div class="col-lg-4 col-md-8 mb-5">
            <a href="" class="navbar-brand font-weight-bold text-primary" style="font-size: 40px; line-height: 40px">
                <img src="{{asset('images/buku/smk.png')}}" alt="" width="80" />
                <span class="text-primary">ASSALAAM </span>
            </a>
            <p>
                Perpustakaan kami menyediakan ruang bacaan yang nyaman untuk anak Anda. Baik untuk belajar atau membaca buku, ruang-ruang kami dilengkapi untuk memberikan lingkungan yang kondusif. Pesan ruang bacaan hari ini untuk memastikan sesi belajar yang tenang dan fokus.
            </p>
            {{-- <div class="d-flex justify-content-start mt-4">
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px" href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0" style="width: 38px; height: 38px" href="#"><i class="fab fa-instagram"></i></a>
            </div> --}}
        </div>
        <div class="col-lg-4 col-md-8 mb-5 pt-3">
            <h3 class="text-primary mb-4">Menghubungi</h3>
            <div class="d-flex">
                <h4 class="fa fa-map-marker-alt text-primary"></h4>
                <div class="pl-3">
                    <h5 class="text-white">Alamat</h5>
                    <p>123 Cibaduyut, Bandung, Indonesia</p>
                </div>
            </div>
            <div class="d-flex">
                <h4 class="fa fa-envelope text-primary"></h4>
                <div class="pl-3">
                    <h5 class="text-white">Email</h5>
                    <p><a href="" class="text-light">smk@smkassalaambandung.sch.id</a></p>
                </div>
            </div>
            <div class="d-flex">
                <h4 class="fa fa-phone-alt text-primary"></h4>
                <div class="pl-3">
                    <h5 class="text-white">Telepon</h5>
                    <p>+012 345 67890</p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-8 mb-5 pt-3">
            <h3 class="text-primary mb-4">Tautan Cepat</h3>
            <div class="d-flex flex-column justify-content-start">
                <p><a class="text-white mb-2" href="{{route('AssalaamPerpustakaan')}}"><i class="fa fa-angle-right mr-2"></i>Home</a></p>
                <p><a class="text-white mb-2" href="{{route('AssalaamPerpustakaan')}}"><i class="fa fa-angle-right mr-2"></i>Tentang Kami</a></p>
                <p><a class="text-white" href="{{route('AssalaamPerpustakaan')}}hubungi_kami"><i class="fa fa-angle-right mr-2"></i>Hubungi kami</a></p>
                <p><a class="text-white mb-2" href="{{route('listbuku')}}"><i class="fa fa-angle-right mr-2"></i>Buku</a></p>
            </div>
        </div>
        {{-- <div class="col-lg-3 col-md-6 mb-5">
            <h3 class="text-primary mb-4">Newsletter</h3>
            <form action="">
                <div class="form-group">
                    <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                </div>
                <div class="form-group">
                    <input type="email" class="form-control border-0 py-4" placeholder="Your Email" required="required" />
                </div>
                <div>
                    <button class="btn btn-primary btn-block border-0 py-3" type="submit">
                        Submit Now
                    </button>
                </div>
            </form>
        </div> --}}
    </div>
    <div class="container-fluid pt-5" style="border-top: 1px solid rgba(23, 162, 184, 0.2)">
        <p class="m-0 text-center text-white">
            &copy;
            <a class="text-primary font-weight-bold" href="#">Assalaam Perpustakaan</a>.
            All Rights Reserved.

            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
            Designed by
            <a class="text-primary font-weight-bold" href="https://github.com/Shrul-ctrl">Faizz</a>
            <br />Distribusi Oleh:
            <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
        </p>
    </div>
</div>
