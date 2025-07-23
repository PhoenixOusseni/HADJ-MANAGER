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
                    <li class="mx-2 active"><a href="{{ route('agences.create') }}"><i class="fa-solid fa-add"></i></a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row p-0">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="product-page-details">
                        <h3>Details: {{ $agence->libelle ?? '-' }}</h3>
                    </div>
                    <hr>
                    <div>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="product-page-width">
                                    <tbody>
                                        <tr>
                                            <td>
                                                @if($agence->logo)
                                                <img src="{{ asset('agence/logo/' . $agence->logo) }}" alt="Logo" style="height:100px; width:100px; object-fit:cover; border-radius:10px; margin-bottom: 15px;">
                                                @else
                                                <img src="{{ asset('main/assets/images/avatars/1.png') }}" alt="Photo" style="height:100px; width:100px; object-fit:cover; border-radius:10px; margin-bottom: 15px; background: #ccc;">
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Code <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $agence->code ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nom <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $agence->libelle ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $agence->email ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Téléphone <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $agence->telephone ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Siège <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $agence->siege ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>WhatsApp <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $agence->whatsapp ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Téléphone externe <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $agence->exter_phone ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Adresse <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $agence->adress ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Administrateur principal <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $agence->admin->nom ?? '-' }} {{ $agence->admin->prenom ?? '-' }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="product-page-width">
                                    <tbody>
                                        <tr>
                                            <td>Nombre d'Administrateurs <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $agence->users->count() }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nombre de Services <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $agence->services->count() }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nombre d'Agents <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $agence->agents->count() }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nombre d'Hotels <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $agence->hotels->count() }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nombre de Bus <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $agence->cars->count() }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nombre de Candidats <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $agence->candidats->count() }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nombre de Vols <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $agence->vols->count() }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="m-t-15 btn-showcase">
                        <a href="{{ route('agences.edit', $agence->id) }}" class="btn btn-square btn-warning m-1"><i class="fa-solid fa-edit"></i></a>
                        <form action="{{ route('agences.destroy', $agence->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-square btn-danger m-1" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette agence ?')"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-header card-no-border pb-0">
                        <div class="header-top">
                            <h3>Agents</h3>
                            <div>
                                <a href="{{ route('agence.agents.list', $agence->id) }}" class="btn btn-square btn-primary m-1"><i class="fa-solid fa-list"></i></a>
                                <a href="{{ route('agents.form', $agence->id) }}" class="btn btn-square btn-info m-1"><i class="fa-solid fa-add"></i></a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive theme-scrollbar">
                        <table class="display" id="row_create" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agence->agents->take(5) as $agent)
                                <tr>
                                    <td>{{ $agent->code }}</td>
                                    <td>{{ $agent->nom }}</td>
                                    <td>{{ $agent->prenom }}</td>
                                    <td>
                                        <a href="{{ route('agents.show', $agent->id) }}" class="btn btn-square btn-info m-1"><i class="fa-solid fa-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Code</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-header card-no-border pb-0">
                        <div class="header-top">
                            <h3>Candidats</h3>
                            <div>
                                <a href="{{ route('agence.candidats.list', $agence->id) }}" class="btn btn-square btn-primary m-1"><i class="fa-solid fa-list"></i></a>
                                <a href="{{ route('candidats.form', $agence->id) }}" class="btn btn-square btn-info m-1"><i class="fa-solid fa-add"></i></a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive theme-scrollbar">
                        <table class="display" id="row_create" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Service</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agence->candidats->take(5) as $candidat)
                                <tr>
                                    <td>{{ $candidat->nom }}</td>
                                    <td>{{ $candidat->prenom }}</td>
                                    <td>{{ $candidat->service->libelle }}</td>
                                    <td>
                                        <a href="{{ route('candidats.show', $candidat->id) }}" class="btn btn-square btn-info m-1"><i class="fa-solid fa-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Service</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>


                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-header card-no-border pb-0">
                        <div class="header-top">
                            <h3>Bus</h3>
                            <div>
                                <a href="{{ route('agence.cars.list', $agence->id) }}" class="btn btn-square btn-primary m-1"><i class="fa-solid fa-list"></i></a>
                                <a href="{{ route('cars.form', $agence->id) }}" class="btn btn-square btn-info m-1"><i class="fa-solid fa-add"></i></a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive theme-scrollbar">
                        <table class="display" id="row_create" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Compagnie</th>
                                    <th>Place</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agence->cars->take(5) as $id => $car)
                                <tr>
                                    <td>{{ $car->compagnie }}</td>
                                    <td>{{ $car->place }}</td>
                                    <td>{{ $car->statut }}</td>
                                    <td>
                                        <a href="{{ route('cars.show', $car->id) }}" class="btn btn-square btn-info m-1"><i class="fa-solid fa-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Compagnie</th>
                                    <th>Place</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header card-no-border pb-0">
                    <div class="header-top">
                        <h3>Hotels</h3>
                        <div>
                                <a href="{{ route('agence.hotels.list', $agence->id) }}" class="btn btn-square btn-primary m-1"><i class="fa-solid fa-list"></i></a>
                                <a href="{{ route('hotels.form', $agence->id) }}" class="btn btn-square btn-info m-1"><i class="fa-solid fa-add"></i></a>
                            </div>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <div class="table-responsive theme-scrollbar">
                        <table class="display" id="row_create" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Adresse</th>
                                    <th>Téléphone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agence->hotels->take(5) as $hotel)
                                <tr>
                                    <td>{{ $hotel->nom }}</td>
                                    <td>{{ $hotel->adresse }}</td>
                                    <td>{{ $hotel->telephone }}</td>
                                    <td>
                                        <a href="{{ route('hotels.show', $hotel->id) }}" class="btn btn-square btn-info m-1"><i class="fa-solid fa-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nom</th>
                                    <th>Adresse</th>
                                    <th>Téléphone</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-header card-no-border pb-0">
                        <div class="header-top">
                            <h3>Paiements</h3>
                            <div>
                                <a href="{{ route('agence.paiements.list', $agence->id) }}" class="btn btn-square btn-primary m-1"><i class="fa-solid fa-list"></i></a>
                                <a href="{{ route('paiements.form', $agence->id) }}" class="btn btn-square btn-info m-1"><i class="fa-solid fa-add"></i></a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive theme-scrollbar">
                        <table class="display" id="row_create" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Montant</th>
                                    <th>Date de paiement</th>
                                    <th>Candidat</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agence->paiements->take(5) as $paiement)
                                <tr>
                                    <td>{{ $paiement->montant }}</td>
                                    <td>{{ $paiement->date_paiement }}</td>
                                    <td>{{ $paiement->candidat->nom }} {{ $paiement->candidat->prenom }}</td>
                                    <td>
                                        <a href="{{ route('paiements.show', $paiement->id) }}" class="btn btn-square btn-info m-1"><i class="fa-solid fa-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Montant</th>
                                    <th>Date de paiement</th>
                                    <th>Candidat</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>


                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-header card-no-border pb-0">
                        <div class="header-top">
                            <h3>Services</h3>
                            <div>
                                <a href="{{ route('agence.services.list', $agence->id) }}" class="btn btn-square btn-primary m-1"><i class="fa-solid fa-list"></i></a>
                                <a href="{{ route('services.form', $agence->id) }}" class="btn btn-square btn-info m-1"><i class="fa-solid fa-add"></i></a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive theme-scrollbar">
                        <table class="display" id="row_create" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Libellé</th>
                                    <th>Edition</th>
                                    <th>Catégorie</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agence->services->take(5) as $service)
                                <tr>
                                    <td>{{ $service->libelle }}</td>
                                    <td>{{ $service->edition }}</td>
                                    <td>{{ $service->categorie }}</td>
                                    <td>
                                        <a href="{{ route('services.show', $service->id) }}" class="btn btn-square btn-info m-1"><i class="fa-solid fa-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Libellé</th>
                                    <th>Edition</th>
                                    <th>Catégorie</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="card-header card-no-border pb-0">
                        <div class="header-top">
                            <h3>Vols</h3>
                            <div>
                                <a href="{{ route('agence.vols.list', $agence->id) }}" class="btn btn-square btn-primary m-1"><i class="fa-solid fa-list"></i></a>
                                <a href="{{ route('vols.form', $agence->id) }}" class="btn btn-square btn-info m-1"><i class="fa-solid fa-add"></i></a>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive theme-scrollbar">
                        <table class="display" id="row_create" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Compagnie</th>
                                    <th>Type de vol</th>
                                    <th>Trajet</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agence->vols->take(5) as $vol)
                                <tr>
                                    <td>{{ $vol->compagnie }}</td>
                                    <td>{{ $vol->type_vol }}</td>
                                    <td>{{ $vol->trajet }}</td>
                                    <td>
                                        <a href="{{ route('vols.show', $vol->id) }}" class="btn btn-square btn-info m-1"><i class="fa-solid fa-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Compagnie</th>
                                    <th>Type de vol</th>
                                    <th>Trajet</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
