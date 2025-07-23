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
                            GESTION DES AGENCES
                        </h1>
                        <div class="page-header-subtitle mt-3">
                            <a class="btn btn-primary" href="#!" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#formServiceBackdrop">
                                Nouvelle agence
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
                                                        <th class="text-center">Libellé</th>
                                                        <th class="text-center">E-mail</th>
                                                        <th class="text-center">Siège</th>
                                                        <th class="text-center">Contact</th>
                                                        <th class="text-center">Adresse</th>
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




    <!-- Modal -->
    <div class="modal fade" id="formServiceBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header premier-color">
                    <h5 class="modal-title text-white" id="staticBackdropLabel">Ajout d'une nouvelle agence</h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                        aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Tabbed dashboard card example-->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="sbp-preview-content">
                                        <form method="POST" action="{{ route('gestion_des_agence.store') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12 p-3 mb-3" style="background: #eeebeb; border-radius: 5px">
                                                    <h3 class="mb-2 text-danger text-uppercase">Information Agence</h3>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="mb-3">
                                                                <label class="small">Libellé agence</label>
                                                                <input class="form-control" name="libelle" type="text" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="mb-3">
                                                                <label class="small">E-mail</label>
                                                                <input class="form-control" name="email" type="email" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="mb-3">
                                                                <label class="small">Contact</label>
                                                                <input class="form-control" name="telephone" type="number" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="mb-3">
                                                                <label class="small">Siège</label>
                                                                <input class="form-control" name="siege" type="text" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 p-3" style="background: #e9f4ea; border-radius: 5px">
                                                    <h3 class="mb-2 text-danger text-uppercase">Information Utilisateur</h3>
                                                    <div class="row">
                                                        <input type="text" name="role" class="form-control" value="Admin" hidden>
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="mb-3">
                                                                <labe class="small"l>Nom</labe>
                                                                <input class="form-control" name="nom" type="text" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-12">
                                                            <div class="mb-3">
                                                                <label class="small">Prénom</label>
                                                                <input class="form-control" name="prenom" type="text" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label class="small">E-mail</label>
                                                                <input class="form-control" name="email" type="email" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label class="small">Téléphone</label>
                                                                <input class="form-control" name="telephone" type="number" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 col-md-12">
                                                            <div class="mb-3">
                                                                <label class="small">login</label>
                                                                <input class="form-control" name="login" type="text" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6 mt-3">
                                                <button type="submit" class="btn w-100" style="background: rgb(31, 31, 73); color: white">Enregistrer</button>
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
