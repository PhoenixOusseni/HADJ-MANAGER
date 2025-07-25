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
            <div class="card shadow" style="border-radius: 5px;">
                <div class="card-header card-no-border">
                    <h3>Formulaire de mise à jour d’un paiement</h3>
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

                    <form action="{{ route('adm_agc_paiements.update',  $paiement->id) }}" method="POST" class="theme-form row g-3">
                        @csrf
                        @method('PUT')

                        <div class="col-sm-3">
                            <label class="form-label">Candidat</label>
                        </div>
                        <div class="col-sm-9">
                            <select class="form-control @error('candidat_id') is-invalid @enderror" name="candidat_id" required>
                                <option value="">-- Sélectionner un candidat --</option>
                                @foreach($candidats as $candidat)
                                <option value="{{ $candidat->id }}" {{ old('candidat_id', $paiement->candidat_id) == $candidat->id ? 'selected' : '' }}>
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
                            <input class="form-control @error('montant') is-invalid @enderror" type="number" step="0.01" name="montant" placeholder="Ex : 10000" value="{{ old('montant', $paiement->montant) }}" required>
                            @error('montant')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Date de paiement</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control @error('date_paiement') is-invalid @enderror" type="date" name="date_paiement" value="{{ old('date_paiement', $paiement->date_paiement) }}" required>
                            @error('date_paiement')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Mode de paiement</label>
                        </div>
                        <div class="col-sm-9">
                            <select class="form-control @error('mode_paiement') is-invalid @enderror" name="mode_paiement">
                                <option value="">-- Sélectionner --</option>
                                <option value="Espèces" {{ old('mode_paiement', $paiement->mode_paiement) == 'Espèces' ? 'selected' : '' }}>Espèces</option>
                                <option value="Orange Money" {{ old('mode_paiement', $paiement->mode_paiement) == 'Orange Money' ? 'selected' : '' }}>Orange Money</option>
                            </select>
                            @error('mode_paiement')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Observation</label>
                        </div>
                        <div class="col-sm-9">
                            <textarea class="form-control @error('observation') is-invalid @enderror" name="observation" rows="3" placeholder="Ajoutez une remarque éventuelle...">{{ old('observation', $paiement->observation) }}</textarea>
                            @error('observation')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Service</label>
                        </div>
                        <div class="col-sm-9">
                            <select class="form-control @error('service_id') is-invalid @enderror" name="service_id">
                                <option value="">-- Sélectionner un service --</option>
                                @foreach($services as $service)
                                <option value="{{ $service->id }}" {{ old('service_id', $paiement->service_id ?? '') == $service->id ? 'selected' : '' }}>
                                    {{ $service->libelle }}
                                </option>
                                @endforeach
                            </select>
                            @error('service_id') <div class="text-danger mt-2">{{ $message }}</div> @enderror
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
