<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('home.index') }}">MKDesign</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <img src="{{ asset('img/logo2.jpg') }}" class="img-fluid rounded p-2" alt="">
        </div>
        <ul class="sidebar-menu">
            @if (Auth::user()->role == 'Admin')
                <li class="nav-item {{ $type_menu === 'Home' ? 'active' : '' }}">
                    <a href="{{ route('home.index') }}" class="nav-link ha">
                        <i class="fas fa-house"></i><span>Home</span></a>
                </li>
                <li class="nav-item {{ $type_menu === 'About-Us' ? 'active' : '' }}">
                    <a href="{{ route('about-us.index') }}" class="nav-link"><i
                            class="fas fa-circle-info"></i><span>About</span></a>
                </li>
                {{-- <li class="nav-item {{ $type_menu === 'Users' ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}" class="nav-link"><i
                            class="fas fa-users"></i><span>User</span></a>
                </li> --}}
                <li class="nav-item {{ $type_menu === 'Project' ? 'active' : '' }}">
                    <a href="{{ route('project.index') }}" class="nav-link"><i
                            class="fas fa-list-check"></i><span>Project</span></a>
                </li>
                <li class="nav-item {{ $type_menu === 'Galeri' ? 'active' : '' }}">
                    <a href="{{ route('galery.index') }}" class="nav-link"><i
                            class="fas fa-image"></i><span>Galery</span></a>
                </li>
                <li class="nav-item {{ $type_menu === 'Testimoni' ? 'active' : '' }}">
                    <a href="{{ route('testimoni.index') }}" class="nav-link"><i
                            class="fas fa-star"></i><span>Testimoni</span></a>
                </li>
                <li class="nav-item dropdown {{ $type_menu === 'History' ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-clock-rotate-left"></i><span>History</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="{{ Request::is('survei') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('survei.index') }}">Survei</a>
                        </li>
                        <li class="{{ Request::is('pemesanan') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('pemesanan.index') }}">Pemesanan</a>
                        </li>
                    </ul>
                </li>
            @else
                <li class="nav-item {{ $type_menu === 'Home' ? 'active' : '' }}">
                    <a href="{{ route('home.index') }}" class="nav-link ha">
                        <i class="fas fa-house"></i><span>Home</span></a>
                </li>
                <li class="nav-item dropdown {{ $type_menu === 'History' ? 'active' : '' }}">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                        <i class="fas fa-clock-rotate-left"></i><span>History</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="{{ Request::is('survei') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('survei.index') }}">Survei</a>
                        </li>
                        <li class="{{ Request::is('pemesanan') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('pemesanan.index') }}">Pemesanan</a>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </aside>
</div>
