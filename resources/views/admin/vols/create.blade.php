@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Vols</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa-solid fa-house"></i></a></li>
                    <li class="ms-2">/</li>
                    <li class="mx-2"><a href="{{ route('vols.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('vols.create') }}"><i class="fa-solid fa-add"></i></a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
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

                    <form action="{{ route('vols.store') }}" method="POST" class="theme-form row g-3">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Agence <span class="text-danger">*</span></label>
                                        <input class="form-control" type="hidden" name="agence_id" id="agence_id" value="{{ $agence->id }}">
                                        <input class="form-control" type="text" readonly value="{{ $agence->libelle }}">
                                    </div>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Compagnie</label>
                                            <input class="form-control" type="text" name="compagnie" placeholder="Entrez le nom de la compagnie" value="{{ old('compagnie') }}" required>
                                            @error('compagnie')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Type de vol</label>
                                            <select class="form-control" name="type_vol">
                                                <option value="">-- Sélectionner --</option>
                                                <option value="Charter" {{ old('type_vol') == 'Charter' ? 'selected' : '' }}>Charter</option>
                                                <option value="Régulier" {{ old('type_vol') == 'Régulier' ? 'selected' : '' }}>Régulier</option>
                                                <option value="Autre" {{ old('type_vol') == 'Autre' ? 'selected' : '' }}>Autre</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Trajet</label>
                                            <select class="form-control" name="trajet">
                                                <option value="">-- Sélectionner --</option>
                                                <option value="Aller simple" {{ old('trajet') == 'Aller' ? 'selected' : '' }}>Aller</option>
                                                <option value="Aller-retour" {{ old('trajet') == 'Aller-retour' ? 'selected' : '' }}>Aller-retour</option>
                                                <option value="Retour" {{ old('trajet') == 'Retour' ? 'selected' : '' }}>Retour</option>
                                            </select>
                                            @error('trajet')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Numéro de vol</label>
                                            <input class="form-control" type="text" name="numero_vol" placeholder="Ex : AF123" value="{{ old('numero_vol') }}" required>
                                            @error('numero_vol')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Ville de départ (Aller)</label>
                                            <input class="form-control" type="text" name="ville_depart_aller" placeholder="Ville de départ" value="{{ old('ville_depart_aller') }}" required>
                                            @error('ville_depart_aller')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Ville d’arrivée (Aller)</label>
                                            <input class="form-control" type="text" name="ville_arrivee_aller" placeholder="Ville d’arrivée" value="{{ old('ville_arrivee_aller') }}" required>
                                            @error('ville_arrivee_aller')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Date & heure de départ (Aller)</label>
                                            <input class="form-control" type="datetime-local" name="date_heure_depart_aller" value="{{ old('date_heure_depart_aller') }}" required>
                                            @error('date_heure_depart_aller')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Date & heure d’arrivée (Aller)</label>
                                            <input class="form-control" type="datetime-local" name="date_heure_arrivee_aller" value="{{ old('date_heure_arrivee_aller') }}" required>
                                            @error('date_heure_arrivee_aller')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Ville de départ (Retour)</label>
                                            <input class="form-control" type="text" name="ville_depart_retour" placeholder="Ville de départ (retour)" value="{{ old('ville_depart_retour') }}">
                                            @error('ville_depart_retour')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Ville d’arrivée (Retour)</label>
                                            <input class="form-control" type="text" name="ville_arrivee_retour" placeholder="Ville d’arrivée (retour)" value="{{ old('ville_arrivee_retour') }}">
                                            @error('ville_depart_retour')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Date & heure de départ (Retour)</label>
                                            <input class="form-control" type="datetime-local" name="date_heure_depart_retour" value="{{ old('date_heure_depart_retour') }}">
                                            @error('date_heure_depart_retour')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Date & heure d’arrivée (Retour)</label>
                                            <input class="form-control" type="datetime-local" name="date_heure_arrivee_retour" value="{{ old('date_heure_arrivee_retour') }}">
                                            @error('date_heure_arrivee_retour')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Quota</label>
                                            <input class="form-control" type="number" name="quota" placeholder="Nombre de places disponibles" value="{{ old('quota') }}" required>
                                            @error('quota')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Convocation</label>
                                            <input class="form-control" type="text" name="convocation" placeholder="Lieu ou heure de convocation" value="{{ old('convocation') }}">
                                            @error('convocation')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Service</label>
                                            <select class="form-control @error('service_id') is-invalid @enderror" name="service_id">
                                                <option value="">-- Sélectionner un service --</option>
                                                @foreach($services as $service)
                                                <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                                    {{ $service->libelle }}
                                                </option>
                                                @endforeach
                                            </select>
                                            @error('service_id')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 text-end">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
