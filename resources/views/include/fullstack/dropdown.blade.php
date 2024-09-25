<ul class="navbar-nav gap-1 nav-right-links align-items-center">
    <li class="nav-item dropdown pt-4">
        <a href="javascrpt:;" data-bs-toggle="dropdown">
            <img src="{{ asset('images/user/' . $user->fotoprofile) }}" class="rounded-circle p-1 border mb-4" width="45" height="45" style="object-fit: cover;" alt="" onerror="this.onerror=null; this.src='{{ asset('images/fotoprofil.jfif') }}';">
        </a>
        <div class="dropdown-menu dropdown-user dropdown-menu-end shadow" style="width: 250px;border-radius:5%;">
            <a class="dropdown-item  gap-2 py-2" href="javascript:;">
                <div class="text-center">
                    <img src="{{ asset('images/user/' . $user->fotoprofile) }}"  class="rounded-circle p-1 shadow mb-3" width="90" height="90" style="object-fit: cover;" alt="" onerror="this.onerror=null; this.src='{{ asset('images/fotoprofil.jfif') }}';">
                    <h5 class="user-name mb-0 fw-bold">Hello {{Auth::user()->name}}</h5>
                </div>
            </a>
            <hr class="dropdown-divider">
            @auth
            @if(auth()->user()->isAdmin === 'admin')
            <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('dashboard') }}">
                <i class="material-icons-outlined">admin_panel_settings</i>Admin Dashboard
            </a>
            @endif
            @endauth
            <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('dashboarduser') }}">
                <i class="material-icons-outlined">home</i> Profil
            </a>
            <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('AssalaamPerpustakaan') }}">
                <i class="material-icons-outlined">public</i> Halaman Utama
            </a>
            <hr>
            <a class="dropdown-item d-flex align-items-center gap-2 py-2" href="{{ route('login') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="material-icons-outlined">power_settings_new</i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
</ul>