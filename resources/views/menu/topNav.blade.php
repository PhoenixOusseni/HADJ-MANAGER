<nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-dark premier-color"
    id="sidenavAccordion">
    <!-- Sidenav Toggle Button-->
    <button class="btn btn-icon btn-transparent-light order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i
            data-feather="menu"></i></button>

    <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="">HADJ FASO</a>

    <h4 class="pe-3 ps-4 text-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop"
        aria-controls="offcanvasTop">NAVIGATION RAPIDE</h4>

    <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasTopLabel">Offcanvas top</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            ...
        </div>
    </div>
    <!-- Navbar Items-->
    <ul class="navbar-nav align-items-center ms-auto">

        <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage"
                href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                @if (Auth::user()->photo == '')
                    <img class="img-account-profile rounded-circle mb-2"
                        src="{{ asset('asset/assets/img/demo/user-placeholder.svg') }}" alt="logo user" />
                @else
                    <img class="img-account-profile rounded-circle mb-2"
                        src="{{ asset('storage') . '/' . Auth::user()->photo }}" alt="logo user" />
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up"
                aria-labelledby="navbarDropdownUserImage">
                <h6 class="dropdown-header d-flex align-items-center">
                    <img class="dropdown-user-img" src="{{ asset('images/logo.png') }}" />
                    <div class="dropdown-user-details">
                        <div class="dropdown-user-details-name">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</div>
                        <div class="dropdown-user-details-email">
                            <a href="javascript:;">{{ Auth::user()->role }}</a>
                        </div>
                    </div>
                </h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('Gestion_utilisateur.show', [Auth::user()->id]) }}">
                    <div class="dropdown-item-icon"><i data-feather="user"></i></div>Profil
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="dropdown-item" type="submit">
                        <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                        {{ __('Se déconnecter') }}
                    </button>
                </form>
            </div>
        </li>
    </ul>
</nav>
