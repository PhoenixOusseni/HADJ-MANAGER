<!DOCTYPE html>
<html lang="en">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Admiro admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Admiro admin template, best javascript admin, dashboard template, bootstrap admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <title>Hadj Manager - Se connecter</title>
    <!-- Favicon icon-->
    <link rel="icon" href="{{ asset('main/assets/images/logo/icone.jpg') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('main/assets/images/logo/icone.jpg') }}" type="image/x-icon" />
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200;6..12,300;6..12,400;6..12,500;6..12,600;6..12,700;6..12,800;6..12,900;6..12,1000&amp;display=swap"
        rel="stylesheet">
    <!-- Flag icon css -->
    <link rel="stylesheet" href="{{ asset('main/assets/css/vendors/flag-icon.css') }}">
    <!-- iconly-icon-->
    <link rel="stylesheet" href="{{ asset('main/assets/css/iconly-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/bulk-style.css') }}">
    <!-- iconly-icon-->
    <link rel="stylesheet" href="{{ asset('main/assets/css/themify.css') }}">
    <!--fontawesome-->
    <link rel="stylesheet" href="{{ asset('main/assets/css/fontawesome-min.css') }}">
    <!-- Whether Icon css-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('main/assets/css/vendors/weather-icons/weather-icons.min.css') }}">
    <!-- App css -->
    <link rel="stylesheet" href="{{ asset('main/assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('main/assets/css/color-1.css') }}" media="screen">
</head>

<body>
    <!-- tap on top starts-->
    <div class="tap-top"><i class="iconly-Arrow-Up icli"></i></div>
    <!-- tap on tap ends-->
    <!-- loader-->
    <div class="loader-wrapper">
        <div class="loader"><span></span><span></span><span></span><span></span><span></span></div>
    </div>
    <!-- login page start-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7 login_one_image"><img class="bg-img-cover bg-center"
                    src="{{ asset('main/assets/images/login/login3.png') }}" alt="looginpage"></div>
            <div class="col-xl-5 p-0">
                <div class="login-card login-dark login-bg">
                    <div>
                        <div class="mb-4"><a class="logo" href="{{ route('home') }}"><img
                                    class="img-fluid for-light m-auto"
                                    src="{{ asset('main/assets/images/logo/') }}" alt="looginpage"><img
                                    class="for-dark" src="{{ asset('main/assets/images/logo/2.png') }}"
                                    alt="logo"></a></div>
                        <div class="login-main">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- jquery-->
        <script src="{{ asset('main/assets/js/vendors/jquery/jquery.min.js') }}"></script>
        <!-- bootstrap js-->
        <script src="{{ asset('main/assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}" defer=""></script>
        <script src="{{ asset('main/assets/js/vendors/bootstrap/dist/js/popper.min.js') }}" defer=""></script>
        <!--fontawesome-->
        <script src="{{ asset('main/assets/js/vendors/font-awesome/fontawesome-min.js') }}"></script>
        <!-- password_show-->
        <script src="{{ asset('main/assets/js/password.js') }}"></script>
        <!-- custom script -->
        <script src="{{ asset('main/assets/js/script.js') }}"></script>
        <script>
            function togglePassword() {
                const input = document.getElementById("password");
                input.type = input.type === "password" ? "text" : "password";
            }
        </script>
    </div>
</body>

</html>
