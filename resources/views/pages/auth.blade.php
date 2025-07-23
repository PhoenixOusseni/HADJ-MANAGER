<!DOCTYPE html>
<html lang="en">

<head>
    @include('menu.meta')
    @yield('title')
    <title>HADJ FASO</title>
    @yield('style')
    @include('menu.style')

    <style>
        .premier-color {
            background: rgb(31, 31, 73);
            color: #ffffff;
        }
    </style>
</head>

<body style="background-image: url('{{ asset('images/job137.jpg') }}'); background-size: cover;">
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="card mb-3">
                            <div class="card-body shadow">
                                <div class="row">

                                    <div class="col-lg-5 d-flex align-items-center justify-content-center"
                                        style="border-right: 1px solid #adadb1">
                                        <img src="{{ asset('images/auth-bg.jpg') }}" class="img-fluid" alt="logo apps">
                                    </div>

                                    <div class="col-lg-7 d-flex flex-column align-items-center justify-content-center">
                                        <h1 class="mb-5" style="font-size: 20px">AUTHENTIFICATION DU PORTAIL</h1>
                                        <form method="POST" action="{{ route('login') }}"
                                            class="row g-3 needs-validation">
                                            @csrf
                                            <div class="col-12">
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id="inputGroupPrepend"><img
                                                            src="{{ asset('images/user_shield_24px.png') }}" /></span>
                                                    <input type="text" name="login" class="form-control"
                                                        placeholder="Nom utilisateur" required>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="input-group has-validation">
                                                    <span class="input-group-text" id="inputGroupPrepend"><img
                                                            src="{{ asset('images/lock_26px.png') }}" /></span>
                                                    <input type="password" name="password" class="form-control"
                                                        placeholder="Mot de passe" required>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="remember"
                                                        value="true" id="rememberMe">
                                                    <label class="form-check-label" for="rememberMe">Se souvenir de
                                                        moi</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-md-12 mt-5">
                                                <button class="btn w-100 premier-color" type="submit">Se
                                                    connecter</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-center text-primary"><a href="#" target="_blank">www.ouelass.com</a></p>
            </div>
        </section>
    </div>
    @include('menu.script')
</body>

</html>
