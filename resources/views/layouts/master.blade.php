<!DOCTYPE html>
<html lang="fr">

<head>
    @include('menu.meta')
    @yield('title')
    <title>HADJ FASO</title>
    @yield('style')
    @include('menu.style')
    <style>
        .inset-0 {
            z-index: 999999999 !important;
        }
    </style>

<body class="nav-fixed">
    @include('menu.header')
        <div id="layoutSidenav_content" style="background-image: url('{{ asset('images/3334695.jpg') }}'); background-size: cover;">

            @yield('content')

            @include('menu.footer')
        </div>
    @include('menu.script')
</body>

</html>
