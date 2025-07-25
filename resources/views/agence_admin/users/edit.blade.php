@extends('layouts.agence_admin')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Administrateurs</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa-solid fa-home"></i></a></li>
                    <li class="ms-2">/</li>
                    @can('view', App\Models\User::class)
                    <li class="mx-2"><a href="{{ route('adm_agc_utilisateurs.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    @endcan
                    @can('create', App\Models\User::class)
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('adm_agc_utilisateurs.create') }}"><i class="fa-solid fa-add"></i></a></li>
                    @endcan
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid starts  -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow" style="border-radius: 5px;">
                <div class="card-header card-no-border">
                    <h3>Formulaire </h3>
                </div>
                <div class="card-body basic-form">
                    @if (session('error'))
                    <div class="alert alert-danger mb-4">{{ session('error') }}</div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('adm_agc_utilisateurs.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="theme-form row g-3">
                        @csrf
                        @method('PUT')

                        <div class="col-sm-3">
                            <label class="form-label">Nom</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="nom" value="{{ old('nom', $user->nom) }}" required>
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Prénom</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="prenom" value="{{ old('prenom', $user->prenom) }}" required>
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Nom d'utilisateur</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="username" value="{{ old('username', $user->username) }}" required>
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Email</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="email" name="email" value="{{ old('email', $user->email) }}">
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Téléphone</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="telephone" value="{{ old('telephone', $user->telephone) }}">
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Nouveau mot de passe</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="password" name="password" placeholder="Laissez vide pour ne pas changer">
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Confirmation du mot de passe</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="password" name="password_confirmation" placeholder="Confirmez si mot de passe modifié">
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Photo</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="file" name="photo" accept="image/*">
                            @if($user->photo)
                            <small class="form-text text-muted">Photo actuelle : {{ $user->photo }}</small>
                            @endif
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Statut</label>
                        </div>
                        <div class="col-sm-9">
                            <select class="form-control" name="statut">
                                <option value="">-- Sélectionner un statut --</option>
                                <option value="Actif" {{ old('statut', $user->statut) == 'Actif' ? 'selected' : '' }}>Actif</option>
                                <option value="Inactif" {{ old('statut', $user->statut) == 'Inactif' ? 'selected' : '' }}>Inactif</option>
                            </select>
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Rôle</label>
                        </div>
                        <div class="col-sm-9">
                            <select class="form-control" name="role_id" required>
                                <option value="">-- Sélectionner un rôle --</option>
                                @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ old('role_id', $user->role_id) == $role->id ? 'selected' : '' }}>
                                    {{ $role->nom }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary">Mettre à jour</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
