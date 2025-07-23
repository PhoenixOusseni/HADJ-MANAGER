@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Candidats</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa-solid fa-home"></i></a></li>
                    <li class="ms-2">/</li>
                    <li class="mx-2"><a href="{{ route('candidats.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('candidats.create') }}"><i class="fa-solid fa-add"></i></a></li>
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

                    <form action="{{ route('candidats.store') }}" method="POST" enctype="multipart/form-data" class="form theme-form flat-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Agence <span class="text-danger">*</span></label>
                                            <input class="form-control" type="hidden" name="agence_id" id="agence_id" value="{{ $agence->id }}">
                                            <input class="form-control" type="text" readonly value="{{ $agence->libelle }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Nom <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="nom" value="{{ old('nom') }}">
                                            @error('nom')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Prénom <span class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="prenom" value="{{ old('prenom') }}">
                                            @error('prenom')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Date de naissance</label>
                                            <input class="form-control" type="date" name="date_naissance" value="{{ old('date_naissance') }}">
                                            @error('date_naissance')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Lieu de naissance</label>
                                            <input class="form-control" type="text" name="lieu_naissance" value="{{ old('lieu_naissance') }}">
                                            @error('lieu_naissance')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Téléphone</label>
                                            <input class="form-control" type="text" name="telephone" value="{{ old('telephone') }}">
                                            @error('telephone')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Sexe <span class="text-danger">*</span></label>
                                            <select class="form-control" name="sexe">
                                                <option value="">-- Sélectionner --</option>
                                                <option value="Masculin" {{ old('sexe') == 'Masculin' ? 'selected' : '' }}>Masculin</option>
                                                <option value="Feminin" {{ old('sexe') == 'Feminin' ? 'selected' : '' }}>Féminin</option>
                                            </select>
                                            @error('sexe')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Ville / Province</label>
                                            <input class="form-control" type="text" name="ville_province" value="{{ old('ville_province') }}">
                                            @error('ville_province')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Type de pièce <span class="text-danger">*</span></label>
                                            <select class="form-control" name="type_piece">
                                                <option value="">-- Sélectionner --</option>
                                                <option value="CNIB" {{ old('type_piece') == 'CNIB' ? 'selected' : '' }}>CNIB</option>
                                                <option value="Passeport" {{ old('type_piece') == 'Passeport' ? 'selected' : '' }}>Passeport</option>
                                            </select>
                                            @error('type_piece')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Numéro de pièce</label>
                                            <input class="form-control" type="text" name="numero_piece" value="{{ old('numero_piece') }}">
                                            @error('numero_piece')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Date de délivrancel</label>
                                            <input class="form-control" type="date" name="date_delivrance" value="{{ old('date_delivrance') }}">
                                            @error('date_delivrance')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Date d'expiration</label>
                                            <input class="form-control" type="date" name="date_expiration" value="{{ old('date_expiration') }}">
                                            @error('date_expiration')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Nationalité</label>
                                            <input class="form-control" type="text" name="nationalite" value="{{ old('nationalite') }}">
                                            @error('nationalite')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Statut</label>
                                            <select class="form-control" name="statut">
                                                <option value="">-- Sélectionner --</option>
                                                <option value="Provisoir" {{ old('statut') == 'Provisoir' ? 'selected' : '' }}>Provisoire</option>
                                                <option value="Définitif" {{ old('statut') == 'Définitif' ? 'selected' : '' }}>Définitif</option>
                                            </select>
                                            @error('statut')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Statut paiement</label>
                                            <select class="form-control" name="statut_paiement">
                                                <option value="">-- Sélectionner --</option>
                                                <option value="Non payé" {{ old('statut_paiement') == 'Non payé' ? 'selected' : '' }}>Non payé</option>
                                                <option value="Paiement partiel" {{ old('statut_paiement') == 'Paiement partiel' ? 'selected' : '' }}>Paiement partiel</option>
                                                <option value="Tout payé" {{ old('statut_paiement') == 'Tout payé' ? 'selected' : '' }}>Tout payé</option>
                                            </select>
                                            @error('statut_paiement')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Agent facilitateurl</label>
                                            <select class="form-control" name="agent_id">
                                                <option value="">-- Sélectionner --</option>
                                                @foreach($agents as $agent)
                                                <option value="{{ $agent->id }}" {{ old('agent_id') == $agent->id ? 'selected' : '' }}>{{ $agent->nom }}</option>
                                                @endforeach
                                            </select>
                                            @error('agent_id')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Service</label>
                                            <select class="form-control" name="service_id">
                                                <option value="">-- Sélectionner --</option>
                                                @foreach($services as $service)
                                                <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>{{ $service->libelle }}</option>
                                                @endforeach
                                            </select>
                                            @error('service_id')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label class="form-label">Photo</label>
                                            <input class="form-control" type="file" name="photo">
                                            @error('photo')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-3">
                                    <label class="form-label">Observation</label>
                                    <textarea class="form-control" name="observation" rows="4">{{ old('observation') }}</textarea>
                                    @error('observation')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
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
