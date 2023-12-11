<header style="background: #F3F3F3;">
        <nav class="navbar navbar-expand-lg navbar-light py-3 px-4">
            <div class="container-fluid px-5">
                <a href="{{ route('beranda') }}" class="navbar-brand fw-bold fs-2">LPMS</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="{{ route('beranda') }}" class="nav-item nav-link pe-4">Beranda</a>
                        <a href="#" class="nav-item nav-link pe-4">Tentang Kami</a>
                        <div class="nav-item dropdown pe-4">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pengaduan</a>
                            <div class="dropdown-menu">
                                <a href="{{ route('complaint.list') }}" class="dropdown-item">Daftar Aduan</a>
                                <a href="{{ route('complaint.create') }}" class="dropdown-item">Buat Aduan</a>
                            </div>
                        </div>
                        @auth
                        <div class="nav-item dropdown no-arrow pe-4">
                            <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Welcome, {{ auth()->user()->username }}</a>
                            <div class="dropdown-menu">
                                <a href="{{ route('profile.index') }}" class="dropdown-item">Profil</a>
                                <a href="{{ route('complaint.index') }}" class="dropdown-item">Riwayat Aduan</a>
                                <hr>
                                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                    <form id="logout-form" action="{{ route('logout') }}" method="post" class="d-none">
                                        @csrf
                                    </form>
                                </a>
                            </div>
                        </div>
                        @else
                        <a href="{{ route('login') }}" style="border-radius: 15px" class="nav-item nav-link btn btn-success text-light border-bottom-info">Get Started</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
    </header>