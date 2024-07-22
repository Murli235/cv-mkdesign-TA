<nav class="navbar navbar-expand-lg fixed-top px-3 px-md-5 no-print">
    <a class="navbar-brand" href="{{ route('beranda.index') }}">
        <img src="{{ asset('img/logo2.jpg') }}" alt="" class="img-fluid rounded-circle" width="45">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link {{ $type_menu == 'Home' ? 'active' : '' }}"
                    href="{{ route('beranda.index') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  {{ $type_menu == 'ourProject' ? 'active' : '' }}"
                    href="{{ route('ourProject.index') }}">Our Project</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $type_menu == 'Pricing' ? 'active' : '' }}"
                    href="{{ route('estimasiBiaya.index') }}">Pricing</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $type_menu == 'Survei' ? 'active' : '' }}"
                    href="{{ route('surveis.index') }}">Request Survey</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $type_menu == 'About Us' ? 'active' : '' }}"
                    href="{{ route('aboutUsIndex.index') }}">About Us</a>
            </li>

            @if (Auth::check())
                <li class="nav-item rounded ms-3 text-center" style="background-color: #FF1358">
                    <a class="nav-link text-white" href="{{ route('home.index') }}">Dashboard</a>
                </li>
            @else
                <li class="nav-item rounded ms-3 text-center" style="background-color: #FF1358">
                    <a class="nav-link text-white" href="{{ route('login') }}">Login</a>
                </li>
            @endif

        </ul>
    </div>
</nav>
