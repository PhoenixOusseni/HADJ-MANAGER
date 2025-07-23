@extends('layouts.agence_admin')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Vols</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa-solid fa-home"></i></a></li>
                    <li class="ms-2">/</li>
                    @can('viewAny', App\Models\Vol::class)
                    <li class="mx-2"><a href="{{ route('adm_agc_vols.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    @endcan
                    @can('create', App\Models\Vol::class)
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('adm_agc_vols.create') }}"><i class="fa-solid fa-add"></i></a></li>
                    @endcan
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
                    <h3>Formulaire de mise à jour d’un vol</h3>
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

                    <form action="{{ route('adm_agc_vols.update', $vol->id) }}" method="POST" class="theme-form row g-3">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Compagnie</label>
                                    <input type="text" class="form-control" name="compagnie" value="{{ old('compagnie', $vol->compagnie) }}" required>
                                    @error('compagnie')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Type de vol</label>
                                    <select class="form-control" name="type_vol">
                                        <option value="">-- Sélectionner --</option>
                                        <option value="Charter" {{ old('type_vol', $vol->type_vol) == 'Charter' ? 'selected' : '' }}>Charter</option>
                                        <option value="Régulier" {{ old('type_vol', $vol->type_vol) == 'Régulier' ? 'selected' : '' }}>Régulier</option>
                                        <option value="Autre" {{ old('type_vol', $vol->type_vol) == 'Autre' ? 'selected' : '' }}>Autre</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Trajet</label>
                                    <select class="form-control" name="trajet">
                                        <option value="">-- Sélectionner --</option>
                                        <option value="Aller simple" {{ old('trajet', $vol->trajet) == 'Aller simple' ? 'selected' : '' }}>Aller</option>
                                        <option value="Aller-retour" {{ old('trajet', $vol->trajet) == 'Aller-retour' ? 'selected' : '' }}>Aller-retour</option>
                                        <option value="Retour" {{ old('trajet', $vol->trajet) == 'Retour' ? 'selected' : '' }}>Retour</option>
                                    </select>
                                    @error('trajet')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Numéro de vol</label>
                                    <input type="text" class="form-control" name="numero_vol" value="{{ old('numero_vol', $vol->numero_vol) }}" required>
                                    @error('numero_vol')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Ville de départ (Aller)</label>
                                    <input type="text" class="form-control" name="ville_depart_aller" value="{{ old('ville_depart_aller', $vol->ville_depart_aller) }}" required>
                                    @error('ville_depart_aller')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Ville d’arrivée (Aller)</label>
                                    <input type="text" class="form-control" name="ville_arrivee_aller" value="{{ old('ville_arrivee_aller', $vol->ville_arrivee_aller) }}" required>
                                    @error('ville_arrivee_aller')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Date & heure de départ (Aller)</label>
                                    <input type="datetime-local" class="form-control" name="date_heure_depart_aller" value="{{ old('date_heure_depart_aller', \Carbon\Carbon::parse($vol->date_heure_depart_aller)->format('Y-m-d\TH:i')) }}" required>
                                    @error('date_heure_depart_aller')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Date & heure d’arrivée (Aller)</label>
                                    <input type="datetime-local" class="form-control" name="date_heure_arrivee_aller" value="{{ old('date_heure_arrivee_aller', \Carbon\Carbon::parse($vol->date_heure_arrivee_aller)->format('Y-m-d\TH:i')) }}" required>
                                    @error('date_heure_arrivee_aller')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Ville de départ (Retour)</label>
                                    <input type="text" class="form-control" name="ville_depart_retour" value="{{ old('ville_depart_retour', $vol->ville_depart_retour) }}">
                                    @error('ville_depart_retour')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Ville d’arrivée (Retour)</label>
                                    <input type="text" class="form-control" name="ville_arrivee_retour" value="{{ old('ville_arrivee_retour', $vol->ville_arrivee_retour) }}">
                                    @error('ville_arrivee_retour')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Date & heure de départ (Retour)</label>
                                    <input type="datetime-local" class="form-control" name="date_heure_depart_retour" value="{{ old('date_heure_depart_retour', $vol->date_heure_depart_retour ? \Carbon\Carbon::parse($vol->date_heure_depart_retour)->format('Y-m-d\TH:i') : '') }}">
                                    @error('date_heure_depart_retour')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Date & heure d’arrivée (Retour)</label>
                                    <input type="datetime-local" class="form-control" name="date_heure_arrivee_retour" value="{{ old('date_heure_arrivee_retour', $vol->date_heure_arrivee_retour ? \Carbon\Carbon::parse($vol->date_heure_arrivee_retour)->format('Y-m-d\TH:i') : '') }}">
                                    @error('date_heure_arrivee_retour')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Quota</label>
                                    <input type="number" class="form-control" name="quota" value="{{ old('quota', $vol->quota) }}" required>
                                    @error('quota')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Convocation</label>
                                    <input type="text" class="form-control" name="convocation" value="{{ old('convocation', $vol->convocation) }}">
                                    @error('convocation')<div class="text-danger mt-2">{{ $message }}</div>@enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Service</label>
                                    <select class="form-control @error('service_id') is-invalid @enderror" name="service_id">
                                        <option value="">-- Sélectionner un service --</option>
                                        @foreach($services as $service)
                                        <option value="{{ $service->id }}" {{ old('service_id', $vol->service_id) == $service->id ? 'selected' : '' }}>
                                            {{ $service->libelle }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('service_id')<div class="text-danger mt-2">{{ $message }}</div>@enderror
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
