@extends('layouts.master')
@section('content')
    <header class="page-header page-header-dark pb-10"
        style="background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 50%, rgba(0,212,255,1) 100%);">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="activity"></i></div>
                            NOUVEAU DELEGUE / FACILITATAIRE
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <div class="input-group input-group-joined border-0" style="width: 16.5rem">
                            <span class="input-group-text"><i class="text-primary" data-feather="calendar"></i></span>
                            <div class="form-control ps-0 pointer">
                                {{ Carbon\Carbon::now()->format('d-m-Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->

    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-lg-12">
                <!-- Tabbed dashboard card example-->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="sbp-preview-content">
                            <form method="POST" action="">
                                @csrf
                                <input type="text" name="users_id" class="form-control" value="{{ Auth::user()->id }}" hidden>
                                <div class="row mt-1">
                                    <div class="col-lg-4 col-md-12">
                                        <div class="mb-3">
                                            <label class="small">Nom</label>
                                            <input class="form-control" name="montant" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="mb-3">
                                            <label class="small">Prénom</label>
                                            <input class="form-control" name="montant" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="mb-3">
                                            <label class="small">Date naissance</label>
                                            <input class="form-control" name="montant" type="date" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-12">
                                        <div class="mb-3">
                                            <label class="small">Sexe</label>
                                            <select class="form-control" name="sexe">
                                                <option value="Homme">Homme</option>
                                                <option value="Femme">Femme</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="mb-3">
                                            <label class="small">Résidence</label>
                                            <input class="form-control" name="residence" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="mb-3">
                                            <label class="small">Email</label>
                                            <input class="form-control" name="email" type="email" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-12">
                                        <div class="mb-3">
                                            <label class="small">Téléphone</label>
                                            <input class="form-control" name="telephone" type="number" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="mb-3">
                                            <label class="small">Service</label>
                                            <select class="form-select" name="sexe">
                                                <option value="Service 1">Service 1</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12">
                                        <div class="mb-3">
                                            <label class="small">Statut</label>
                                            <select class="form-select" name="sexe">
                                                <option value="Délégué">Délégué</option>
                                                <option value="Facilitateur">Facilitateur</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn" style="background: rgb(31, 31, 73); color: white">Enregistrer</button>
                                    <button type="reset" class="btn btn-danger">Annuler</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <!-- Tabbed dashboard card example-->
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Tabbed dashboard card example-->
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="sbp-preview-content">
                                            <table id="datatablesSimple">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Code</th>
                                                        <th class="text-center">Nom</th>
                                                        <th class="text-center">Prénom</th>
                                                        <th class="text-center">Téléphone</th>
                                                        <th class="text-center">Service</th>
                                                        <th class="text-center">Ristourne</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($collection as $item)
                                                        <tr>
                                                            <td>{{ $item->code }}</td>
                                                            <td>{{ $item->libelle }}</td>
                                                            <td>{{ $item->email }}</td>
                                                            <td>{{ $item->siege }}</td>
                                                            <td>{{ $item->telephone }}</td>
                                                            <td>{{ $item->adresse }}</td>
                                                            <td class="d-flex align-items-center justify-content-center">
                                                                <a href="">
                                                                    <i class="me-2 text-green" data-feather="eye"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
