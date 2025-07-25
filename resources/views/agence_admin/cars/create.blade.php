@extends('layouts.agence_admin')

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
                    @can('viewAny', App\Models\Car::class)
                    <li class="mx-2"><a href="{{ route('adm_agc_cars.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    @endcan
                    @can('create', App\Models\Car::class)
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('adm_agc_cars.create') }}"><i class="fa-solid fa-add"></i></a></li>
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

                    <form action="{{ route('adm_agc_cars.store') }}" method="POST" enctype="multipart/form-data" class="theme-form row g-3">
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
                            <label class="form-label">Compagnie</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="compagnie" placeholder="Entrez le nom de la compagnie" value="{{ old('compagnie') }}">
                            @error('compagnie')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Téléphone</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="tel" name="numero" placeholder="Entrez le numéro de téléphone" value="{{ old('numero') }}">
                            @error('numero')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Place</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="number" name="place" placeholder="Nombre de place" value="{{ old('place') }}">
                            @error('place')
                            <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Statut</label>
                        </div>
                        <div class="col-sm-9">
                            <select class="form-control" name="statut">
                                <option value="">-- Sélectionner --</option>
                                <option value="Disponible" {{ old('statut') == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                                <option value="Indisponible" {{ old('statut') == 'Indisponible' ? 'selected' : '' }}>Indisponible</option>
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
