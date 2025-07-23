<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="author" content="pixelstrap" />
    <title>Hadj Manager</title>
    <!-- Favicon icon-->
    <link rel="icon" href="{{ asset('main/assets/images/logo/icone.jpg')}}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('main/assets/images/logo/icone.jpg')}}" type="image/x-icon" />
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900;6..12,1000&amp;display=swap" rel="stylesheet" />
    <!-- Flag icon css -->
    <link rel="stylesheet" href="{{ asset('main/assets/css/vendors/flag-icon.css')}}" />
    <!-- iconly-icon-->
    <link rel="stylesheet" href="{{ asset('main/assets/css/iconly-icon.css')}}" />
    <link rel="stylesheet" href="{{ asset('main/assets/css/bulk-style.css')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@icon/themify-icons@1.0.1-alpha.3/themify-icons.min.css')}}" />
    <!--fontawesome-->

    <!-- Whether Icon css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('main/assets/css/vendors/weather-icons/weather-icons.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('main/assets/css/vendors/scrollbar.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('main/assets/css/vendors/swiper-bundle.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('main/assets/css/vendors/slick.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('main/assets/css/vendors/datatables.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('main/assets/css/vendors/slick-theme.css')}}" />
    <!-- App css -->
    <link rel="stylesheet" href="{{ asset('main/assets/css/style.css')}}" />
    <link id="color" rel="stylesheet" href="{{ asset('main/assets/css/color-1.css')}}" media="screen" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .sidebar-link svg {
            display: none !important;
        }

    </style>
</head>
<body>
    <!-- page-wrapper Start-->
    <!-- tap on top starts-->
    <div class="tap-top"><i class="fa-solid fa-arrow-up"></i></div>
    <!-- tap on tap ends-->
    <!-- loader-->
    <div class="loader-wrapper">
        <div class="loader"><span></span><span></span><span></span><span></span><span></span></div>
    </div>
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <header class="page-header row">
            <div class="logo-wrapper d-flex align-items-center col-auto"><a href="{{ route('home') }}"><img class="light-logo img-fluid" src="{{ asset('main/assets/images/logo/1.png')}}" alt="logo" /><img class="dark-logo img-fluid" src="{{ asset('main/assets/images/logo/2.png')}}" alt="logo" /></a>
                <a class="close-btn toggle-sidebar" href="javascript:void(0)">
                    <i class="fa-solid fa-bars"></i>
                </a>
            </div>
            <div class="page-main-header col">
                <div class="header-left">
                    <form class="form-inline search-full col" action="#" method="get">
                        <div class="form-group w-100">
                            <div class="Typeahead Typeahead--twitterUsers">
                                <div class="u-posRelative">
                                    <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Admiro .." name="q" title="" autofocus="autofocus" />
                                    <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                                </div>
                                <div class="Typeahead-menu"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="nav-right">
                    <ul class="header-right">
                        <li class="search d-lg-none d-flex"> <a href="javascript:void(0)">
                                <i class="fa-solid fa-search"></i></a></li>
                        <li><a class="full-screen" href="javascript:void(0)">
                                <i class="fa-solid fa-arrows-alt"></i></a></li>
                        <li> <a class="dark-mode" href="javascript:void(0)">
                                <i class="fa-solid fa-moon"></i></a></li>
                        <li class="profile-nav custom-dropdown">
                            <div class="user-wrap">
                                <div class="user-img"><img src="{{ asset('main/assets/images/avatars/1.png') }}" alt="user" /></div>
                                <div class="user-content">
                                    <h6>{{ Auth::user()->nom }}</h6>
                                    <p class="mb-0">{{ Auth::user()->role->nom }}<i class="fa-solid fa-chevron-down"></i></p>
                                </div>
                            </div>
                            <div class="custom-menu overflow-hidden">
                                <ul class="profile-body">
                                    <li class="d-flex">
                                        <i class="fa-solid fa-user"></i><a class="ms-2" href="#">Mon compte</a>
                                    </li>
                                    <li class="d-flex">
                                        <i class="fa-solid fa-sign-out"></i>
                                        <a class="dropdown-item ms-2" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Se deconnecter') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <!-- Page Body Start-->
        <div class="page-body-wrapper">
            <!-- Page sidebar start-->
            <aside class="page-sidebar">
                <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                <div class="main-sidebar" id="main-sidebar">
                    <ul class="sidebar-menu" id="simple-bar">
                        <li class="pin-title sidebar-main-title">
                            <div>
                                <h5 class="sidebar-title f-w-700">Pinned</h5>
                            </div>
                        </li>
                        <li class="sidebar-main-title">
                            <div>
                                <h5 class="lan-1 f-w-700 sidebar-title">General</h5>
                            </div>
                        </li>
                        <li class="sidebar-list"> <i class="fa-solid fa-thumbtack"></i><a class="sidebar-link" href="{{ route('home') }}">
                                <i class="fa-solid fa-home"></i>
                                <h6 class="f-w-600">Dashboard </h6>
                            </a></li>
                        @if (auth()->user()->role->nom !== 'Administrateur')
                        <!-- Utilisateurs -->
                        <li class="sidebar-list">
                            <i class="fa-solid fa-thumbtack"></i>
                            <a class="sidebar-link" href="javascript:void(0)">
                                <i class="fa-solid fa-users"></i>
                                <h6 class="f-w-600">Administrateurs</h6>
                            </a>
                            <ul class="sidebar-submenu">
                                <li><a href="{{ route('adm_agc_utilisateurs.index') }}">Liste</a></li>
                                <li><a href="{{ route('adm_agc_utilisateurs.create') }}">Ajouter</a></li>
                            </ul>
                        </li>
                        @endif
                        <!-- Services -->
                        <li class="sidebar-list">
                            <i class="fa-solid fa-thumbtack"></i>
                            <a class="sidebar-link" href="javascript:void(0)">
                                <i class="fa-solid fa-calendar-days"></i>
                                <h6 class="f-w-600">Services</h6>
                            </a>
                            <ul class="sidebar-submenu">
                                @can('viewAny', App\Models\Service::class)
                                <li><a href="{{ route('adm_agc_services.index') }}">Liste</a></li>
                                @endcan
                                @can('create', App\Models\Service::class)
                                <li><a href="{{ route('adm_agc_services.create') }}">Ajouter</a></li>
                                @endcan
                            </ul>
                        </li>
                        <li class="sidebar-main-title">
                            <div>
                                <h5 class="f-w-700 sidebar-title pt-3">Agence</h5>
                            </div>
                        </li>

                        <!-- Agents -->
                        <li class="sidebar-list">
                            <i class="fa-solid fa-thumbtack"></i>
                            <a class="sidebar-link" href="javascript:void(0)">
                                <i class="fa-solid fa-user-tie"></i>
                                <h6 class="f-w-600">Agents</h6>
                            </a>
                            <ul class="sidebar-submenu">
                                @can('viewAny', App\Models\Agent::class)
                                <li><a href="{{ route('adm_agc_agents.index') }}">Liste</a></li>
                                @endcan
                                @can('create', App\Models\Agent::class)
                                <li><a href="{{ route('adm_agc_agents.create') }}">Ajouter</a></li>
                                @endcan
                            </ul>
                        </li>

                        <!-- Candidats -->
                        <li class="sidebar-list">
                            <i class="fa-solid fa-thumbtack"></i>
                            <a class="sidebar-link" href="javascript:void(0)">
                                <i class="fa-solid fa-users"></i>
                                <h6 class="f-w-600">Candidats</h6>
                            </a>
                            <ul class="sidebar-submenu">
                                @can('viewAny', App\Models\Candidat::class)
                                <li><a href="{{ route('adm_agc_candidats.index') }}">Liste</a></li>
                                @endcan
                                @can('create', App\Models\Candidat::class)
                                <li><a href="{{ route('adm_agc_candidats.create') }}">Ajouter</a></li>
                                @endcan
                            </ul>
                        </li>

                        <!-- Véhicules -->
                        <li class="sidebar-list">
                            <i class="fa-solid fa-thumbtack"></i>
                            <a class="sidebar-link" href="javascript:void(0)">
                                <i class="fa-solid fa-car"></i>
                                <h6 class="f-w-600">Véhicules</h6>
                            </a>
                            <ul class="sidebar-submenu">
                                @can('viewAny', App\Models\Car::class)
                                <li><a href="{{ route('adm_agc_cars.index') }}">Liste</a></li>
                                @endcan
                                @can('create', App\Models\Car::class)
                                <li><a href="{{ route('adm_agc_cars.create') }}">Ajouter</a></li>
                                @endcan
                            </ul>
                        </li>

                        <!-- Hôtels -->
                        <li class="sidebar-list">
                            <i class="fa-solid fa-thumbtack"></i>
                            <a class="sidebar-link" href="javascript:void(0)">
                                <i class="fa-solid fa-hotel"></i>
                                <h6 class="f-w-600">Hôtels</h6>
                            </a>
                            <ul class="sidebar-submenu">
                                @can('viewAny', App\Models\Hotel::class)
                                <li><a href="{{ route('adm_agc_hotels.index') }}">Liste</a></li>
                                @endcan
                                @can('create', App\Models\Hotel::class)
                                <li><a href="{{ route('adm_agc_hotels.create') }}">Ajouter</a></li>
                                @endcan
                            </ul>
                        </li>

                        <!-- Paiements -->
                        <li class="sidebar-list">
                            <i class="fa-solid fa-thumbtack"></i>
                            <a class="sidebar-link" href="javascript:void(0)">
                                <i class="fa-solid fa-money-bill"></i>
                                <h6 class="f-w-600">Paiements</h6>
                            </a>
                            <ul class="sidebar-submenu">
                                @can('viewAny', App\Models\Paiement::class)
                                <li><a href="{{ route('adm_agc_paiements.index') }}">Liste</a></li>
                                @endcan
                                @can('create', App\Models\Paiement::class)
                                <li><a href="{{ route('adm_agc_paiements.create') }}">Ajouter</a></li>
                                @endcan
                            </ul>
                        </li>

                        <!-- Vols -->
                        <li class="sidebar-list">
                            <i class="fa-solid fa-thumbtack"></i>
                            <a class="sidebar-link" href="javascript:void(0)">
                                <i class="fa-solid fa-globe"></i>
                                <h6 class="f-w-600">Vols</h6>
                            </a>
                            <ul class="sidebar-submenu">
                                @can('viewAny', App\Models\Vol::class)
                                <li><a href="{{ route('adm_agc_vols.index') }}">Liste</a></li>
                                @endcan
                                @can('create', App\Models\Vol::class)
                                <li><a href="{{ route('adm_agc_vols.create') }}">Ajouter</a></li>
                                @endcan
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="right-arrow" id="right-arrow"><i class="fa-solid fa-arrow-right"></i></div>
            </aside>
            <!-- Page sidebar end-->
            <div class="page-body">
                @include('sweetalert::alert')
                @yield('content')
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 footer-copyright">
                            <p class="mb-0">Copyright 2025 © Hadj Manager</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- jquery-->
    <script src="{{ asset('main/assets/js/vendors/jquery/jquery.min.js')}}"></script>
    <!-- bootstrap js-->
    <script src="{{ asset('main/assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}" defer=""></script>
    <script src="{{ asset('main/assets/js/vendors/bootstrap/dist/js/popper.min.js')}}" defer=""></script>
    <!--fontawesome-->
    <script src="{{ asset('main/assets/js/vendors/font-awesome/fontawesome-min.js')}}"></script>
    <!-- sidebar -->
    <script src="{{ asset('main/assets/js/sidebar.js')}}"></script>
    <!-- config-->
    <script src="{{ asset('main/assets/js/config.js')}}"></script>
    <!-- apex-->
    <script src="{{ asset('main/assets/js/chart/apex-chart/apex-chart.js')}}"></script>
    <script src="{{ asset('main/assets/js/chart/apex-chart/stock-prices.js')}}"></script>
    <!-- scrollbar-->
    <script src="{{ asset('main/assets/js/scrollbar/simplebar.js')}}"></script>
    <script src="{{ asset('main/assets/js/scrollbar/custom.js')}}"></script>
    <!-- slick-->
    <script src="{{ asset('main/assets/js/slick/slick.min.js')}}"></script>
    <script src="{{ asset('main/assets/js/slick/slick.js')}}"></script>
    <!-- touchspin -->
    <script src="{{ asset('main/assets/js/touchspin_2/custom_touchspin.js')}}"></script>
    <!-- data_table-->
    <script src="{{ asset('main/assets/js/js-datatables/datatables/jquery.dataTables.min.js')}}"></script>
    <!-- page_datatable-->
    <script src="{{ asset('main/assets/js/js-datatables/datatables/datatable.custom.js')}}"></script>
    <!-- page_datatable1-->
    <script src="{{ asset('main/assets/js/js-datatables/datatables/datatable.custom1.js')}}"></script>
    <!-- page_datatable-->
    <script src="{{ asset('main/assets/js/datatable/datatables/datatable.custom.js')}}"></script>
    <!-- swiper-->
    <script src="{{ asset('main/assets/js/vendors/swiper/swiper-bundle.min.js')}}"></script>
    <!-- theme_customizer-->
    {{-- <script src="{{ asset('main/assets/js/theme-customizer/customizer.js')}}"></script> --}}
    <!-- dashboard_2-->
    <!-- custom script -->
    <script src="{{ asset('main/assets/js/script.js')}}"></script>

    <script src="{{ asset('main/assets/js/datatable/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('main/assets/js/datatable/datatable_advance.js')}}"></script>
</body>

</html>
