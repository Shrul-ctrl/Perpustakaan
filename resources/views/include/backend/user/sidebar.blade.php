<aside class="sidebar-wrapper" data-simplebar="true" style="overflow-y: hidden;overflow-x: hidden">
    <div class="sidebar-header mt-3">
        <div class="logo-icon">
            <img src="{{ asset('images/buku/smk.png') }}" alt="" width="50" />
        </div>
        <div class="logo-name flex-grow-1">
            <h5 class="mt-0">Profile </h5>
        </div>
        <div class="sidebar-close">
            <span class="material-icons-outlined">close</span>
        </div>
    </div>
    <div class="sidebar-nav">
        <!--navigation-->
        <ul class="metismenu" id="sidenav">
            <li>
                <a href="{{ route('dashboarduser') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">home</i></div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
            <li>
                <a href="{{ route('profile') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">account_circle</i></div>
                    <div class="menu-title">Profil</div>
                </a>
            </li>
            <li class="menu-label">List</li>
            <li>
                <a href="{{url('favorite')}}">
                    <div class="parent-icon"><i class="material-icons-outlined">favorite</i></div>
                    <div class="menu-title">favorit</div>
                </a>
            </li>
            {{-- <li>
                <a href="{{ route('peminjaman.index') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">inventory_2</i>

                        @php
                        $hasilnotif = $jumlahpengajuanditerima + $jumlahpengajuanditolak + $jumlahpengembalianditerima + $jumlahpengembalianditolak
                        @endphp

                        @if($hasilnotif > 0)
                        <span class="badge bg-danger" style="font-size: 0.6rem; padding: 0.2em 0.4em;">
                            {{ $hasilnotif }}
                        </span>
                        @endif

                    </div>
                    <div class="menu-title">Peminjaman</div>
                </a>
            </li> --}}
            <li>
                <a href="{{ route('peminjaman.index') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">inventory_2</i></div>
                    <div class="menu-title">Peminjaman</div>
                </a>
            </li>
            <li>
                <a href="{{ route('profilelistbuku') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">list</i></div>
                    <div class="menu-title">List Buku</div>
                </a>
            </li>
            <li class="menu-label">List</li>
            <li>
                <a href="{{ route('historiuser') }}">
                    <div class="parent-icon"><i class="material-icons-outlined">history</i></div>
                    <div class="menu-title">Riwayat</div>
                </a>
            </li>
        </ul>
        <!--end navigation-->
    </div>
</aside>
