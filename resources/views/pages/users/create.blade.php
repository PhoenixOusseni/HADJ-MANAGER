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
                            GESTION DES UTILISATEURS
                        </h1>
                        <div class="page-header-subtitle mt-3">
                            <a class="btn btn-success" href="#!" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#formUserBackdrop">
                                Ajouter un agent
                            </a>
                        </div>
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
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Login</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($collection as $item)
                                <tr>
                                    <td>{{ $item->code }}</td>
                                    <td>{{ $item->nom }}</td>
                                    <td>{{ $item->prenom }}</td>
                                    <td>{{ $item->login }}</td>
                                    <td>{{ $item->role }}</td>
                                    <td class="text-center">
                                        <i class="me-2 text-green" data-feather="eye"></i>
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


    <!-- Modal -->
    <div class="modal fade" id="formUserBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ajouter un nouveau agent</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="sbp-preview-content">
                                        <form method="POST" action="{{ route('Gestion_utilisateur.store') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="mb-3">
                                                        <label>Nom <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="nom" type="text" placeholder="Henry" required />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="mb-3">
                                                        <label>Prénom <span class="text-danger">*</span></label>
                                                        <input class="form-control" name="prenom" type="text" placeholder="Mitchel" required />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="mb-3">
                                                        <label>Téléphone</label>
                                                        <input class="form-control" name="telephone" type="text" placeholder="Ex: 61346554" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="mb-3">
                                                        <label>Role utilisateur <span class="text-danger">*</span></label>
                                                        <select class="form-control" name="role" required>
                                                            <option value="">Selectionner ici...</option>
                                                            <option value="Administration">Administration</option>
                                                            <option value="Recouvrement">Recouvrement</option>
                                                            <option value="Controle">Controle</option>
                                                            <option value="Secretaire">Secretaire</option>
                                                            <option value="Caisse">Caisse</option>
                                                            <option value="Privilege">Privilège</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="mb-3">
                                                        <label>Activation<span class="text-danger">*</span></label>
                                                        <select class="form-control" name="activation" required>
                                                            <option>Selectionner ici...</option>
                                                            <option value="1">Activer</option>
                                                            <option value="0">Desactiver</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <button type="submit" class="btn btn-success">Enregistrer</button>
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                                            </div>
                                        </form>
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
