@extends('layouts.agence_admin')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Hotels</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa-solid fa-home"></i></a></li>
                    <li class="ms-2">/</li>
                    @can('viewAny', App\Models\Hotel::class)
                    <li class="mx-2"><a href="{{ route('adm_agc_hotels.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    @endcan
                    @can('create', App\Models\Hotel::class)
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('adm_agc_hotels.create') }}"><i class="fa-solid fa-add"></i></a></li>
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

                    <form action="{{ route('adm_agc_hotels.store') }}" method="POST" class="theme-form row g-3">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Nom de l'hôtel</label>
                                            <input class="form-control" type="text" name="nom" placeholder="Entrez le nom de l'hôtel" value="{{ old('nom') }}" required>
                                            @error('nom')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Ville</label>
                                            <input class="form-control" type="text" name="ville" placeholder="Entrez la ville" value="{{ old('ville') }}">
                                            @error('ville')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Quartier</label>
                                            <input class="form-control" type="text" name="quartier" placeholder="Entrez le quartier" value="{{ old('quartier') }}">
                                            @error('quartier')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Adresse</label>
                                            <input class="form-control" type="text" name="adresse" placeholder="Entrez l'adresse complète" value="{{ old('adresse') }}">
                                            @error('adresse')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Téléphone</label>
                                            <input class="form-control" type="text" name="telephone" placeholder="Ex. : +226 70 00 00 00" value="{{ old('telephone') }}">
                                            @error('telephone')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input class="form-control" type="email" name="email" placeholder="Entrez l'adresse email" value="{{ old('email') }}">
                                            @error('email')
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
                                            <label class="form-label">Contact du responsable</label>
                                            <input class="form-control" type="text" name="contact_responsable" placeholder="Nom et téléphone du responsable" value="{{ old('contact_responsable') }}">
                                            @error('contact_responsable')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Début d'activité</label>
                                            <input class="form-control" type="date" name="debut" placeholder="Date de début" value="{{ old('debut') }}">
                                            @error('debut')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Fin d'activité</label>
                                            <input class="form-control" type="date" name="fin" placeholder="Date de fin" value="{{ old('fin') }}">
                                            @error('fin')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Nombre de chambres</label>
                                            <input class="form-control" type="number" name="nombre_chambre" placeholder="Ex. : 50" value="{{ old('nombre_chambre') }}">
                                            @error('nombre_chambre')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Nombre de lits</label>
                                            <input class="form-control" type="number" name="nombre_lit" placeholder="Ex. : 120" value="{{ old('nombre_lit') }}">
                                            @error('nombre_lit')
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
