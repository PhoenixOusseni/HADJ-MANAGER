<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hadj Manager</title>
    <link rel="icon" href="{{ asset('main/assets/images/logo/icone.jpg') }}">
    <!-- CSS only -->
    <link rel="stylesheet" type="text/css" href="{{ asset('front/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/splitting.css') }}">
    <link rel="stylesheet" href="{{ asset('front/assets/css/swiper.css') }}">
    <!-- fancybox -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/jquery.fancybox.min.css') }}">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/fontawesome.min.css') }}">
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/style.css') }}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{ asset('front/assets/css/responsive.css') }}">
    <style>
        .mt-6 {
            margin-top: 3rem !important;
        }
    </style>
</head>

<body>
    <div class="footer-fixed webilte-footer">
        <!-- preloader -->
        <div class="preloader">
            <span class="loader"> </span>
        </div>
        <!-- preloader end -->
        <div class="wrapper">
            <!-- Home -->
            <section id="home" class="hero-section bg-black">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="hero-text">
                                <h1>Gérer Votre <span> Agence de Pèlerinage</span></h1>
                                <div class="tet-style">
                                    <img src="{{ asset('front/assets/img/cube.png') }}" alt="img">
                                    <p>Centralisez vos opérations, suivez vos pèlerins, et simplifiez votre organisation
                                        avec une solution conçue pour les agences de voyage de pèlerinage.</p>
                                </div>
                                <div class="mt-6">
                                    @auth
                                        <a href="{{ route('home') }}" class="button-wrapper">
                                            <div class="button-arrow-wrapper">
                                                <i>
                                                    <svg width="16" height="16" viewBox="0 0 16 16"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M16 0.999999C16 0.447715 15.5523 -2.87362e-07 15 -5.40243e-07L6 2.60547e-07C5.44772 -7.66277e-08 5 0.447715 5 1C5 1.55228 5.44772 2 6 2L14 2L14 10C14 10.5523 14.4477 11 15 11C15.5523 11 16 10.5523 16 10L16 0.999999ZM1.70711 15.7071L15.7071 1.70711L14.2929 0.292893L0.292893 14.2929L1.70711 15.7071Z" />
                                                    </svg>
                                                </i>
                                            </div>
                                            <div class="button-main"> Tableau de bord </div>
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}" class="button-wrapper">
                                            <div class="button-arrow-wrapper">
                                                <i>
                                                    <svg width="16" height="16" viewBox="0 0 16 16"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M16 0.999999C16 0.447715 15.5523 -2.87362e-07 15 -5.40243e-07L6 2.60547e-07C5.44772 -7.66277e-08 5 0.447715 5 1C5 1.55228 5.44772 2 6 2L14 2L14 10C14 10.5523 14.4477 11 15 11C15.5523 11 16 10.5523 16 10L16 0.999999ZM1.70711 15.7071L15.7071 1.70711L14.2929 0.292893L0.292893 14.2929L1.70711 15.7071Z" />
                                                    </svg>
                                                </i>
                                            </div>
                                            <div class="button-main"> Se connecter </div>
                                        </a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <form role="form" class="get-a-quote" id="contact-form" method="post">
                                <img src="{{ asset('front/assets/img/form-shap-2.png') }}" alt="img"
                                    class="form-img">
                                <div>
                                    <h3>Demandez une démo personnalisée</h3>
                                    <p>226 70 00 00 00 / 60 00 00 00 / hadjmanager@gmail.com</p>
                                </div>
                                <div class="group-img">
                                    <i><svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_22_21)">
                                                <path
                                                    d="M13.6569 10.3431C12.7855 9.47181 11.7484 8.82678 10.6168 8.43631C11.8288 7.60159 12.625 6.20463 12.625 4.625C12.625 2.07478 10.5502 0 8 0C5.44978 0 3.375 2.07478 3.375 4.625C3.375 6.20463 4.17122 7.60159 5.38319 8.43631C4.25163 8.82678 3.2145 9.47181 2.34316 10.3431C0.832156 11.8542 0 13.8631 0 16H1.25C1.25 12.278 4.27803 9.25 8 9.25C11.722 9.25 14.75 12.278 14.75 16H16C16 13.8631 15.1678 11.8542 13.6569 10.3431ZM8 8C6.13903 8 4.625 6.486 4.625 4.625C4.625 2.764 6.13903 1.25 8 1.25C9.86097 1.25 11.375 2.764 11.375 4.625C11.375 6.486 9.86097 8 8 8Z"
                                                    fill="black" />
                                            </g>
                                        </svg></i>
                                    <input type="text" name="name" placeholder="Nom complet" required="">
                                </div>
                                <div class="group-img">
                                    <i><svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_22_25)">
                                                <path d="M17.0769 3H0.923098C0.415371 3 0 3.41537 0 3.92306V14.0769C0 14.5846 0.415371 15 0.923098 15H17.0769C17.5846 15 18 14.5847 18 14.0769V3.92306C18 3.41537 17.5846 3 17.0769 3ZM16.7305 3.69226L9.531 9.09233C9.40156 9.19084 9.20285 9.25247 8.99996 9.25155C8.79711 9.25247 8.59845 9.19084 8.46896 9.09233L1.26946 3.69226H16.7305ZM12.8848 9.44864L16.8079 14.2948C16.8118 14.2997 16.8166 14.3034 16.8208 14.3078H1.17921C1.18336 14.3032 1.18821 14.2997 1.19215 14.2948L5.11523 9.44864C5.23543 9.30003 5.21265 9.08217 5.06377 8.96169C4.91516 8.84149 4.6973 8.86427 4.57706 9.01291L0.692297 13.8118V4.12496L8.0538 9.64611C8.33052 9.8522 8.66718 9.9429 8.99993 9.94382C9.33223 9.94311 9.66916 9.85241 9.94605 9.64611L17.3076 4.12496V13.8117L13.4229 9.01291C13.3027 8.86431 13.0846 8.84146 12.9362 8.96169C12.7873 9.08189 12.7645 9.30003 12.8848 9.44864Z"
                                                    fill="black" />
                                            </g>
                                        </svg>
                                    </i>
                                    <input type="email" name="email" placeholder="Adresse e-mail" required="">
                                </div>
                                <div class="group-img">
                                    <i>
                                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_22_29)">
                                                <path
                                                    d="M13.9786 0H6.99136C5.75827 0.00139826 4.75904 1.00063 4.75781 2.23372V18.7664C4.75904 19.9995 5.75827 20.9987 6.99136 20.9999H13.9786C15.2117 20.9987 16.211 19.9995 16.2124 18.7664V2.23372C16.211 1.00063 15.2117 0.00139826 13.9786 0ZM15.2577 18.7664C15.257 19.4725 14.6848 20.0448 13.9786 20.0455H6.99136C6.28524 20.0448 5.713 19.4725 5.7123 18.7664V2.23372C5.713 1.52742 6.28524 0.955186 6.99136 0.954487H13.9786C14.6848 0.955186 15.257 1.52742 15.2577 2.23372V18.7664Z"
                                                    fill="black" />
                                                <path
                                                    d="M11.917 1.90918H9.05338C8.78981 1.90918 8.57605 2.12276 8.57605 2.38634C8.57605 2.64991 8.78981 2.86367 9.05338 2.86367H11.917C12.1806 2.86367 12.3942 2.64991 12.3942 2.38634C12.3942 2.12276 12.1806 1.90918 11.917 1.90918Z"
                                                    fill="black" />
                                                <path
                                                    d="M11.4397 18.1363C11.4397 18.6636 11.0123 19.091 10.4852 19.091C9.95786 19.091 9.53052 18.6636 9.53052 18.1363C9.53052 17.6092 9.95786 17.1818 10.4852 17.1818C11.0123 17.1818 11.4397 17.6092 11.4397 18.1363Z"
                                                    fill="black" />
                                            </g>
                                        </svg>
                                    </i>
                                    <input type="number" name="phone" placeholder="Téléphone" required="">
                                </div>
                                <p>Méthode de démonstration: </p>
                                <div class="d-flex align-items-center">
                                    <div class="radio-button">
                                        <input type="radio" id="En ligne" name="demo_type" value="En ligne">
                                        <label for="En ligne">En ligne</label>
                                    </div>
                                    <div class="radio-button">
                                        <input type="radio" id="css" name="demo_type" value="En agence">
                                        <label for="css">En agence</label><br>
                                    </div>
                                </div>
                                <button type="submit" class="button-wrapper">
                                    <div class="button-arrow-wrapper">
                                        <i>
                                            <svg width="16" height="16" viewBox="0 0 16 16"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M16 0.999999C16 0.447715 15.5523 -2.87362e-07 15 -5.40243e-07L6 2.60547e-07C5.44772 -7.66277e-08 5 0.447715 5 1C5 1.55228 5.44772 2 6 2L14 2L14 10C14 10.5523 14.4477 11 15 11C15.5523 11 16 10.5523 16 10L16 0.999999ZM1.70711 15.7071L15.7071 1.70711L14.2929 0.292893L0.292893 14.2929L1.70711 15.7071Z" />
                                            </svg>
                                        </i>
                                    </div>
                                    <div class="button-main"> Demander une démo </div>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="hero-shap">
                    <img src="{{ asset('front/assets/img/shap.png') }}" alt="img" class="shap-one">
                    <img src="{{ asset('front/assets/img/shap.png') }}" alt="img" class="shap-two">
                    <img src="{{ asset('front/assets/img/shap-1.png') }}" alt="img" class="shap-three">
                </div>
                <video autoplay muted loop playsinline id="heroVideo">
                    <source src="{{ asset('front/assets/video/hadj.mp4') }}" type="video/mp4">
                </video>
            </section>

        </div>


        <!-- jQuery -->
        <script src="{{ asset('front/assets/js/jquery-3.6.0.min.js') }}"></script>
        <!-- Bootstrap Js -->
        <script src="{{ asset('front/assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/gsap.js') }}"></script>
        <script src="{{ asset('front/assets/js/swiper.js') }}"></script>
        <script src="{{ asset('front/assets/js/splitting.js') }}"></script>
        <script src="{{ asset('front/assets/js/scroll-out.js') }}"></script>
        <script src="{{ asset('front/assets/js/jquery.pagepiling.js') }}"></script>
        <script src="{{ asset('front/assets/js/gsap.js') }}"></script>
        <script src="{{ asset('front/assets/js/gsap-scroll-smoother.js') }}"></script>
        <script src="{{ asset('front/assets/js/gsap-scroll-to-plugin.js') }}"></script>
        <script src="{{ asset('front/assets/js/gsap-scroll-trigger.js') }}"></script>
        <script src="{{ asset('front/assets/js/gsap-split-text.js') }}"></script>
        <!-- fancybox -->
        <script src="{{ asset('front/assets/js/jquery.fancybox.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/custom.js') }}"></script>
        <!-- Email Js -->
        <script src="{{ asset('front/assets/js/sweetalert.min.js') }}"></script>
        <script src="{{ asset('front/assets/js/contact.js') }}"></script>
</body>
