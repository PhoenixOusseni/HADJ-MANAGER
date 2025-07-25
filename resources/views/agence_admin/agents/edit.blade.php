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
                    <h3>Formulaire de mise à jour d’un agent</h3>
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

                    <form action="{{ route('adm_agc_agents.update', $agent->id) }}" method="POST" enctype="multipart/form-data" class="theme-form row g-3">
                        @csrf
                        @method('PUT')

                        <div class="col-sm-3">
                            <label class="form-label">Service</label>
                        </div>
                        <div class="col-sm-9">
                            <select class="form-control @error('service_id') is-invalid @enderror" name="service_id">
                                <option value="">-- Sélectionner un service --</option>
                                @foreach($services as $service)
                                <option value="{{ $service->id }}" {{ old('service_id', $agent->service_id) == $service->id ? 'selected' : '' }}>
                                    {{ $service->libelle }}
                                </option>
                                @endforeach
                            </select>
                            @error('service_id')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Nom</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom" placeholder="Entrez le nom" value="{{ old('nom', $agent->nom) }}">
                            @error('nom')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Prénom</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control @error('prenom') is-invalid @enderror" type="text" name="prenom" placeholder="Entrez le prénom" value="{{ old('prenom', $agent->prenom) }}">
                            @error('prenom')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Téléphone</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control @error('telephone') is-invalid @enderror" type="tel" name="telephone" placeholder="Ex : 70202020" value="{{ old('telephone', $agent->telephone) }}">
                            @error('telephone')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Résidence</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control @error('residence') is-invalid @enderror" type="text" name="residence" placeholder="Entrez la résidence" value="{{ old('residence', $agent->residence) }}">
                            @error('residence')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Statut</label>
                        </div>
                        <div class="col-sm-9">
                            <select class="form-control @error('statut') is-invalid @enderror" name="statut">
                                <option value="">-- Sélectionner --</option>
                                <option value="Facilitateur" {{ old('statut', $agent->statut) == 'Facilitateur' ? 'selected' : '' }}>Facilitateur</option>
                                <option value="Délégué" {{ old('statut', $agent->statut) == 'Délégué' ? 'selected' : '' }}>Délégué</option>
                            </select>
                            @error('statut')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
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
