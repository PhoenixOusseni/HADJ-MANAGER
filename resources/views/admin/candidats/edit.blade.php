@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Candidats</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa-solid fa-home"></i></a></li>
                    <li class="ms-2">/</li>
                    <li class="mx-2"><a href="{{ route('candidats.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('candidats.create') }}"><i class="fa-solid fa-add"></i></a></li>
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

                    <form action="{{ route('candidats.update', $candidat->id) }}" method="POST" enctype="multipart/form-data" class="theme-form row g-3">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Agence</label>

                                            <select class="form-control @error('agence_id') is-invalid @enderror" name="agence_id">
                                                <option value="">-- Sélectionner une agence --</option>
                                                @foreach($agences as $agence)
                                                <option value="{{ $agence->id }}" {{ old('service_id', $candidat->agence_id) == $agence->id ? 'selected' : '' }}>
                                                    {{ $agence->libelle }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('agence_id')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Nom</label>
                                            <input class="form-control" type="text" name="nom" value="{{ old('nom', $candidat->nom) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Prénom</label>
                                            <input class="form-control" type="text" name="prenom" value="{{ old('prenom', $candidat->prenom) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Date de naissance</label>
                                            <input class="form-control" type="date" name="date_naissance" value="{{ old('date_naissance', $candidat->date_naissance) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Lieu de naissance</label>
                                            <input class="form-control" type="text" name="lieu_naissance" value="{{ old('lieu_naissance', $candidat->lieu_naissance) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Téléphone</label>
                                            <input class="form-control" type="text" name="telephone" value="{{ old('telephone', $candidat->telephone) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">

                                    <div class="row">
                                        <div class="col-md">
                                            <div class="mb-3">
                                                <label class="form-label">Sexe</label>
                                                <select class="form-control" name="sexe">
                                                    <option value="">-- Sélectionner --</option>
                                                    <option value="Masculin" {{ old('sexe', $candidat->sexe) == 'Masculin' ? 'selected' : '' }}>Masculin</option>
                                                    <option value="Feminin" {{ old('sexe', $candidat->sexe) == 'Feminin' ? 'selected' : '' }}>Féminin</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md">
                                            <div class="mb-3">
                                                <label class="form-label">Ville / Province</label>
                                                <input class="form-control" type="text" name="ville_province" value="{{ old('ville_province', $candidat->ville_province) }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md">
                                            <div class="mb-3">
                                                <label class="form-label">Type de pièce</label>
                                                <select class="form-control" name="type_piece">
                                                    <option value="">-- Sélectionner --</option>
                                                    <option value="CNIB" {{ old('type_piece', $candidat->type_piece) == 'CNIB' ? 'selected' : '' }}>CNIB</option>
                                                    <option value="Passeport" {{ old('type_piece', $candidat->type_piece) == 'Passeport' ? 'selected' : '' }}>Passeport</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md">
                                            <div class="mb-3">
                                                <label class="form-label">Numéro de pièce</label>
                                                <input class="form-control" type="text" name="numero_piece" value="{{ old('numero_piece', $candidat->numero_piece) }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md">
                                            <div class="mb-3">
                                                <label class="form-label">Date de délivrance</label>
                                                <input class="form-control" type="date" name="date_delivrance" value="{{ old('date_delivrance', $candidat->date_delivrance) }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md">
                                            <div class="mb-3">
                                                <label class="form-label">Date d'expiration</label>
                                                <input class="form-control" type="date" name="date_expiration" value="{{ old('date_expiration', $candidat->date_expiration) }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="mb-3">
                                                <label class="form-label">Nationalité</label>
                                                <input class="form-control" type="text" name="nationalite" value="{{ old('nationalite', $candidat->nationalite) }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="mb-3">
                                                <label class="form-label">Statut</label>
                                                <select class="form-control" name="statut">
                                                    <option value="">-- Sélectionner --</option>
                                                    <option value="Provisoir" {{ old('statut', $candidat->statut) == 'Provisoir' ? 'selected' : '' }}>Provisoire</option>
                                                    <option value="Définitif" {{ old('statut', $candidat->statut) == 'Définitif' ? 'selected' : '' }}>Définitif</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md">
                                            <div class="mb-3">
                                                <label class="form-label">Statut paiement</label>
                                                <select class="form-control" name="statut_paiement">
                                                    <option value="">-- Sélectionner --</option>
                                                    <option value="Non payé" {{ old('statut_paiement', $candidat->statut_paiement) == 'Non payé' ? 'selected' : '' }}>Non payé</option>
                                                    <option value="Paiement partiel" {{ old('statut_paiement', $candidat->statut_paiement) == 'Paiement partiel' ? 'selected' : '' }}>Paiement partiel</option>
                                                    <option value="Tout payé" {{ old('statut_paiement', $candidat->statut_paiement) == 'Tout payé' ? 'selected' : '' }}>Tout payé</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md">
                                            <div class="mb-3">
                                                <label class="form-label">Agent facilitateur</label>
                                                <select class="form-control" name="agent_id">
                                                    <option value="">-- Sélectionner --</option>
                                                    @foreach($agents as $agent)
                                                    <option value="{{ $agent->id }}" {{ old('agent_id', $candidat->agent_id) == $agent->id ? 'selected' : '' }}>{{ $agent->nom }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md">
                                            <div class="mb-3">
                                                <label class="form-label">Service</label>
                                                <select class="form-control" name="service_id">
                                                    <option value="">-- Sélectionner --</option>
                                                    @foreach($services as $service)
                                                    <option value="{{ $service->id }}" {{ old('service_id', $candidat->service_id) == $service->id ? 'selected' : '' }}>{{ $service->libelle }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="mb-3">
                                                <label class="form-label">Photo</label>
                                                <input class="form-control" type="file" name="photo">
                                                @if($candidat->photo)
                                                <div class="col-sm-1 mt-2">
                                                    <img src="{{ asset('candidat/photo/' . $candidat->photo) }}" alt="Photo" style="height:50px; width: auto;">
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">



                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Observation</label>
                                            <textarea class="form-control" name="observation" rows="4">{{ old('observation', $candidat->observation) }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
