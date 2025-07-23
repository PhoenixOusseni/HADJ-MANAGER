@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Hotels</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa-solid fa-house"></i></a></li>
                    <li class="ms-2">/</li>
                    <li class="mx-2"><a href="{{ route('hotels.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('hotels.create') }}"><i class="fa-solid fa-add"></i></a></li>
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
                    <h3>Formulaire de mise à jour d’un hôtel</h3>
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

                    <form action="{{ route('hotels.update', $hotel->id) }}" method="POST" class="theme-form row g-3">
                        @csrf
                        @method('PUT')

                        <div class="col-sm-3">
                            <label class="form-label">Agence</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="hidden" name="agence_id" id="agence_id" value="{{ $hotel->agence_id }}">
                            <input class="form-control" type="text" readonly value="{{ $hotel->agence->libelle }}">
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Nom de l'hôtel</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="nom" placeholder="Ex. Hôtel Soleil Levant" value="{{ old('nom', $hotel->nom ?? '') }}" required>
                            @error('nom') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Ville</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="ville" placeholder="Ex. Ouagadougou" value="{{ old('ville', $hotel->ville ?? '') }}">
                            @error('ville') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Quartier</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="quartier" placeholder="Ex. Kamsonghin" value="{{ old('quartier', $hotel->quartier ?? '') }}">
                            @error('quartier') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Adresse</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="adresse" placeholder="Rue, porte, zone" value="{{ old('adresse', $hotel->adresse ?? '') }}">
                            @error('adresse') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Téléphone</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="telephone" placeholder="Ex. 70 00 00 00" value="{{ old('telephone', $hotel->telephone ?? '') }}">
                            @error('telephone') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Email</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="email" name="email" placeholder="Ex. contact@hotel.bf" value="{{ old('email', $hotel->email ?? '') }}">
                            @error('email') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Contact responsable</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="contact_responsable" placeholder="Nom et numéro du responsable" value="{{ old('contact_responsable', $hotel->contact_responsable ?? '') }}">
                            @error('contact_responsable') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Début d'activité</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="date" name="debut" value="{{ old('debut', $hotel->debut ?? '') }}">
                            @error('debut') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Fin d'activité</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="date" name="fin" value="{{ old('fin', $hotel->fin ?? '') }}">
                            @error('fin') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Nombre de chambres</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="number" name="nombre_chambre" placeholder="Ex. 30" value="{{ old('nombre_chambre', $hotel->nombre_chambre ?? '') }}">
                            @error('nombre_chambre') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Nombre de lits</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="number" name="nombre_lit" placeholder="Ex. 45" value="{{ old('nombre_lit', $hotel->nombre_lit ?? '') }}">
                            @error('nombre_lit') <div class="text-danger mt-2">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Service</label>
                        </div>
                        <div class="col-sm-9">
                            <select class="form-control @error('service_id') is-invalid @enderror" name="service_id">
                                <option value="">-- Sélectionner un service --</option>
                                @foreach($services as $service)
                                <option value="{{ $service->id }}" {{ old('service_id', $hotel->service_id ?? '') == $service->id ? 'selected' : '' }}>
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
