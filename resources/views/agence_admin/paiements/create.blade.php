@extends('layouts.agence_admin')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Paiements</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa-solid fa-home"></i></a></li>
                    <li class="ms-2">/</li>
                    @can('viewAny', App\Models\Paiement::class)
                    <li class="mx-2"><a href="{{ route('adm_agc_paiements.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    @endcan
                    @can('create', App\Models\Paiement::class)
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('adm_agc_paiements.create') }}"><i class="fa-solid fa-add"></i></a></li>
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

                    <form action="{{ route('adm_agc_paiements.store') }}" method="POST" class="theme-form row g-3">
                        @csrf

                        <div class="col-sm-3">
                            <label class="form-label">Candidat</label>
                        </div>
                        <div class="col-sm-9">
                            <select class="form-control" name="candidat_id" required>
                                <option value="">-- Sélectionner un candidat --</option>
                                @foreach($candidats as $candidat)
                                <option value="{{ $candidat->id }}" {{ old('candidat_id') == $candidat->id ? 'selected' : '' }}>
                                    {{ $candidat->nom }} {{ $candidat->prenom }}
                                </option>
                                @endforeach
                            </select>
                            @error('candidat_id')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Montant</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="number" name="montant" step="0.01" placeholder="Entrez le montant payé" value="{{ old('montant') }}" required>
                            @error('montant')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Date de paiement</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="date" name="date_paiement" value="{{ old('date_paiement', now()->format('Y-m-d')) }}" required>
                            @error('date_paiement')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Mode de paiement</label>
                        </div>
                        <div class="col-sm-9">
                            <select class="form-control" name="mode_paiement">
                                <option value="">-- Sélectionner --</option>
                                <option value="Espèces" {{ old('mode_paiement') == 'Espèces' ? 'selected' : '' }}>Espèces</option>
                                <option value="Orange Money" {{ old('mode_paiement') == 'Orange Money' ? 'selected' : '' }}>Orange Money</option>
                            </select>
                            @error('mode_paiement')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Observation</label>
                        </div>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="observation" rows="3" placeholder="Ajouter une remarque...">{{ old('observation') }}</textarea>
                            @error('observation')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Service</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="hidden" name="service_id" value="{{ $service->id }}">
                            <input class="form-control" type="text" value="{{ $service->libelle }}" readonly>
                            @error('service_id')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
