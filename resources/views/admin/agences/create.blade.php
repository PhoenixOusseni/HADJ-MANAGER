@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6 col-12">
                    <h2>Agences</h2>
                </div>
                <div class="col-sm-6 col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa-solid fa-home"></i></a></li>
                        <li class="ms-2">/</li>
                        <li class="mx-2"><a href="{{ route('agences.index') }}"><i class="fa-solid fa-list"></i></a></li>
                        <li class="">/</li>
                        <li class="mx-2 active"><a href="{{ route('agences.create') }}"><i class="fa-solid fa-add"></i></a>
                        </li>
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

                        <form action="{{ route('agences.store') }}" method="POST" enctype="multipart/form-data"
                            class="theme-form row g-3">
                            @csrf

                            <div class="col-sm-3">
                                <label class="form-label">Libelle</label>
                            </div>
                            <div class="col-sm-9">
                                <input class="form-control @error('libelle') is-invalid @enderror" type="text"
                                    name="libelle" placeholder="Entrez le libellé" value="{{ old('libelle') }}">
                                @error('libelle')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-3">
                                <label class="form-label">Téléphone fixe</label>
                            </div>
                            <div class="col-sm-9">
                                <input class="form-control @error('telephone') is-invalid @enderror" type="tel"
                                    name="telephone" placeholder="Ex : 70201010" value="{{ old('telephone') }}">
                                @error('telephone')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-3">
                                <label class="form-label">WhatsApp</label>
                            </div>
                            <div class="col-sm-9">
                                <input class="form-control @error('whatsapp') is-invalid @enderror" type="tel"
                                    name="whatsapp" placeholder="Ex : 70201010" value="{{ old('whatsapp') }}">
                                @error('whatsapp')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-3">
                                <label class="form-label">Téléphone mobile</label>
                            </div>
                            <div class="col-sm-9">
                                <input class="form-control @error('exter_phone') is-invalid @enderror" type="tel"
                                    name="exter_phone" placeholder="Ex : 70201010" value="{{ old('exter_phone') }}">
                                @error('exter_phone')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-3">
                                <label class="form-label">Email</label>
                            </div>
                            <div class="col-sm-9">
                                <input class="form-control @error('email') is-invalid @enderror" type="email"
                                    name="email" placeholder="Ex : agence@example.com" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-3">
                                <label class="form-label">Siège</label>
                            </div>
                            <div class="col-sm-9">
                                <input class="form-control @error('siege') is-invalid @enderror" type="text"
                                    name="siege" placeholder="Ex : Ouagadougou" value="{{ old('siege') }}">
                                @error('siege')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-3">
                                <label class="form-label">Adresse</label>
                            </div>
                            <div class="col-sm-9">
                                <input class="form-control @error('adress') is-invalid @enderror" type="text"
                                    name="adress" placeholder="Ex : 123 rue Zogona" value="{{ old('adress') }}">
                                @error('adress')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-3">
                                <label class="form-label">Photo</label>
                            </div>
                            <div class="col-sm-9">
                                <input class="form-control @error('logo') is-invalid @enderror" type="file"
                                    name="logo">
                                @error('logo')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-3">
                                <label class="form-label">Statut</label>
                            </div>
                            <div class="col-sm-9">
                                <select class="form-control @error('statut') is-invalid @enderror" name="statut">
                                    <option value="">-- Sélectionner --</option>
                                    <option value="Actif" {{ old('statut') == 'Actif' ? 'selected' : '' }}>Actif</option>
                                    <option value="Inactif" {{ old('statut') == 'Inactif' ? 'selected' : '' }}>Inactif
                                    </option>
                                </select>
                                @error('statut')
                                    <div class="text-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-3">
                                <label class="form-label">Administrateur</label>
                            </div>
                            <div class="col-sm-9">
                                <select class="form-control @error('admin_id') is-invalid @enderror" name="admin_id">
                                    <option value="">-- Sélectionner un administrateur --</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ old('admin_id') == $user->id ? 'selected' : '' }}>
                                            {{ $user->nom }} {{ $user->prenom }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('admin_id')
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
