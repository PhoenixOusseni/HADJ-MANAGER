@extends('layouts.agence_admin')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Agents</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa-solid fa-home"></i></a></li>
                    <li class="ms-2">/</li>
                    @can('viewAny', App\Models\Agent::class)
                    <li class="mx-2"><a href="{{ route('adm_agc_agents.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    @endcan
                    @can('create', App\Models\Agent::class)
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('adm_agc_agents.create') }}"><i class="fa-solid fa-add"></i></a></li>
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
                    <form action="{{ route('adm_agc_agents.store') }}" method="POST" enctype="multipart/form-data" class="theme-form row g-3">
                        @csrf

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

                        <div class="col-sm-3">
                            <label class="form-label">Nom</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="nom" placeholder="Entrez le nom" value="{{ old('nom') }}">
                            @error('nom')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Prénom</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="prenom" placeholder="Entrez le prénom" value="{{ old('prenom') }}">
                            @error('prenom')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Téléphone</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="tel" name="telephone" placeholder="Ex : 70201010" value="{{ old('telephone') }}">
                            @error('telephone')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Résidence</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="tel" name="residence" placeholder="Ex : 123 rue Zogona" value="{{ old('residence') }}">
                            @error('residence')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Statut</label>
                        </div>
                        <div class="col-sm-9">
                            <select class="form-control" name="statut">
                                <option value="">-- Sélectionner --</option>
                                <option value="Facilitateur" {{ old('statut') == 'Facilitateur' ? 'selected' : '' }}>
                                    Facilitateur</option>
                                <option value="Délégué" {{ old('statut') == 'Délégué' ? 'selected' : '' }}>Délégué
                                </option>
                            </select>
                            @error('statut')
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
