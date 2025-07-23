@extends('layouts.agence_admin')

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
                    <li class="mx-2"><a href="{{ route('adm_agc_agences.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('adm_agc_agences.create') }}"><i class="fa-solid fa-add"></i></a></li>
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
                    <h3>Formulaire de mise a jour </h3>
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

                    <form action="{{ route('adm_agc_agences.update', $agence->id) }}" method="POST" enctype="multipart/form-data" class="theme-form row g-3">
                        @csrf
                        @method('PUT')

                        <div class="col-sm-3">
                            <label class="form-label">Libelle</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="libelle" value="{{ old('libelle', $agence->libelle) }}">
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Téléphone fixe</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="tel" name="telephone" value="{{ old('telephone', $agence->telephone) }}">
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">WhatsApp</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="tel" name="whatsapp" value="{{ old('whatsapp', $agence->whatsapp) }}">
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Téléphone mobile</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="tel" name="exter_phone" value="{{ old('exter_phone', $agence->exter_phone) }}">
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Email</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="email" name="email" value="{{ old('email', $agence->email) }}">
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Siege</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="siege" value="{{ old('siege', $agence->siege) }}">
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Adresse</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" name="adress" value="{{ old('adress', $agence->adress) }}">
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Logo</label>
                        </div>
                        <div class="col-sm-9">
                            <input class="form-control" type="file" name="photo">
                        </div>

                        <div class="col-sm-3">
                            <label class="form-label">Administrateur</label>
                        </div>
                        <div class="col-sm-9">
                            <select class="form-control @error('admin_id') is-invalid @enderror" name="admin_id">
                                <option value="">-- Sélectionner un administrateur --</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('admin_id', $agence->admin_id) == $user->id ? 'selected' : '' }}>
                                    {{ $user->nom }} {{ $user->prenom }}
                                </option>
                                @endforeach
                            </select>
                            @error('admin_id')
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
