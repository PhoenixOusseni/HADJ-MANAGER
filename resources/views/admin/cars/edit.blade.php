@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Bus</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa-solid fa-home"></i></a></li>
                    <li class="ms-2">/</li>
                    <li class="mx-2"><a href="{{ route('cars.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('cars.create') }}"><i class="fa-solid fa-add"></i></a></li>
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
                    <h3>Formulaire de mise à jour d’un bus</h3>
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

                    <form action="{{ route('cars.update', $car->id) }}" method="POST" enctype="multipart/form-data" class="theme-form row g-3">
                        @csrf
                        @method('PUT')

                        <div class="col-sm-3">
                            <label class="form-label">Agence</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="hidden" name="agence_id" id="agence_id" value="{{ $car->agence_id }}">
                            <input class="form-control" type="text" readonly value="{{ $car->agence->libelle }}">
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Service</label>
                        </div>
                        <div class="col-sm-9">
                            <select class="form-control @error('service_id') is-invalid @enderror" name="service_id">
                                <option value="">-- Sélectionner un service --</option>
                                @foreach($services as $service)
                                <option value="{{ $service->id }}" {{ old('service_id', $car->service_id) == $service->id ? 'selected' : '' }}>
                                    {{ $service->libelle }}
                                </option>
                                @endforeach
                            </select>
                            @error('service_id')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Compagnie</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control @error('compagnie') is-invalid @enderror" type="text" name="compagnie" value="{{ old('compagnie', $car->compagnie) }}">
                            @error('compagnie')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Téléphone</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control @error('numero') is-invalid @enderror" type="tel" name="numero" value="{{ old('numero', $car->numero) }}">
                            @error('numero')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Place</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control @error('place') is-invalid @enderror" type="number" name="place" value="{{ old('place', $car->place) }}">
                            @error('place')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Statut</label>
                        </div>
                        <div class="col-sm-9">
                            <select class="form-control @error('statut') is-invalid @enderror" name="statut">
                                <option value="">-- Sélectionner --</option>
                                <option value="Disponible" {{ old('statut', $car->statut) == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                                <option value="Indisponible" {{ old('statut', $car->statut) == 'Indisponible' ? 'selected' : '' }}>Indisponible</option>
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
