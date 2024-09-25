    <div class="container-fluid bg-light position-relative shadow">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5 fixed-top">
            <a href="" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px">
                <img src="{{asset('images/buku/smk.png')}}" alt="" width="90" />
                <span class="text-primary">SMK ASSALAAM </span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-nav font-weight-bold mx-auto py-0">
                <a href="{{route('AssalaamPerpustakaan')}}" class="nav-item nav-link ">Home</a>
                <a href="{{route('AssalaamPerpustakaan')}}" class="nav-item nav-link">Tentang</a>
                <a href="{{route('AssalaamPerpustakaan')}}#hubungi_kami" class="nav-item nav-link">Hubungi Kami</a>
                <a href="{{route('listbuku')}}" class="nav-item nav-link">Buku</a>
            </div>
            @guest
            <div class="d-flex align-content-between">
                <a href="{{route('login')}}" class="btn btn-primary px-4 mx-1">Login</a>
                <a href="{{route('register')}}" class="btn btn-primary px-4 mx-1">Register</a>
            </div>
            @endguest
            @auth
            @include('include.fullstack.dropdown')
            @endauth
        </nav>
    </div>
