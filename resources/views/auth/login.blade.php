@extends('layouts.auth')

@section('content')
<form method="POST" action="{{ route('login') }}" class="theme-form">
    @csrf
    <h2 class="text-center">Connectez-vous au compte</h2>
    <p class="text-center">Entrez votre email et votre mot de passe pour vous connecter</p>
    <div class="form-group">
        <label class="col-form-label">Email</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label class="col-form-label">Mot de passe</label>
        <div class="form-input position-relative">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
            <div class="show-hide" onclick="togglePassword()">
                <span class="show">👁</span>
            </div>

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group mb-0 checkbox-checked">
        <div class="form-check checkbox-solid-info">
        </div><a class="link" href="#">Mot de passe oublie?</a>
        <div class="text-end mt-3">
            <button class="btn btn-primary btn-block w-100" type="submit">Se connecter </button>
        </div>
    </div>
</form>
@endsection
