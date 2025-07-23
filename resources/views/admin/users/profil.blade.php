@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Utilisateurs</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa-solid fa-home"></i></a></li>
                    <li class="ms-2">/</li>
                    <li class="mx-2"><a href="{{ route('utilisateurs.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('utilisateurs.create') }}"><i class="fa-solid fa-add"></i></a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row p-0">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="product-page-details">
                        <h3>Gestion de mon compte</h3>
                    </div>
                    <hr>
                    <div>
                        <table class="product-page-width">
                            <tbody>
                                <tr>
                                    <td>Nom <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                    <td>{{ $user->nom }}</td>
                                </tr>
                                <tr>
                                    <td>Prénom <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                    <td>{{ $user->prenom }}</td>
                                </tr>
                                <tr>
                                    <td>Email <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>Téléphone <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                    <td>{{ $user->telephone }}</td>
                                </tr>
                                <tr>
                                    <td>Statut <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                    <td>{{ $user->statut }}</td>
                                </tr>
                                <tr>
                                    <td>Role <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                    <td>{{ $user->role->nom }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="m-t-15 btn-showcase">
                        <a href="{{ route('utilisateurs.edit', $user->id) }}" class="btn btn-square btn-warning m-1"><i class="fa-solid fa-edit"></i></a>
                        <form action="{{ route('utilisateurs.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-square btn-danger m-1" onclick="return confirm('Supprimer ce utilisateur ?')"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-no-border">
                    <h3> Mise a jour du compte </h3>
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

                    <form action="{{ route('utilisateurs.update', $user->id) }}" method="POST" enctype="multipart/form-data" class="theme-form row g-3">
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
