@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Services</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa-solid fa-house"></i></a></li>
                    <li class="ms-2">/</li>
                    <li class="mx-2"><a href="{{ route('services.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('services.create') }}"><i class="fa-solid fa-add"></i></a></li>
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
                    <h3>Formulaire de mise à jour d’un service</h3>
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

                    <form action="{{ route('services.update', $service->id) }}" method="POST" class="theme-form row g-3">
                        @csrf
                        @method('PUT')

                        <div class="col-sm-3">
                            <label class="form-label">Libellé</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="libelle" value="{{ $service->libelle }}" required>
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Coût</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="number" name="cout" step="0.01" value="{{ $service->cout }}" required>
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Catégorie</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="categorie" value="{{ $service->categorie }}" required>
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Agence</label>
                        </div>
                        <div class="col-sm-9">
                            <select class="form-control" name="agence_id">
                                <option value="">-- Sélectionner une agence --</option>
                                @foreach($agences as $agence)
                                <option value="{{ $agence->id }}" {{ $service->agence_id == $agence->id ? 'selected' : '' }}>
                                    {{ $agence->libelle }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Édition</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="edition" value="{{ $service->edition }}">
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Observation</label>
                        </div>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="observation" rows="3">{{ $service->observation }}</textarea>
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
