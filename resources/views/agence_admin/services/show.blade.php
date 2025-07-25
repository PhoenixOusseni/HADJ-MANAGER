@extends('layouts.agence_admin')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Details du service: {{ $service->libelle ?? 'not found' }} </h2>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow" id="default" style="border-radius: 5px;">
                <div class="card-header card-no-border pt-4 pb-0">
                    <h3 class="mb-1">Actions</h3>
                </div>
                <div class="card-body btn-showcase">
                    <a href="#" class="btn btn-outline-primary-2x" data-bs-toggle="modal" data-bs-target="#addDipBackdrop"><i class="fa-solid fa-eye"></i>&thinsp;&thinsp;&thinsp; Voir détails</a>
                    <a href="#" class="btn btn-outline-secondary-2x"><i class="fa-solid fa-camera"></i>&thinsp;&thinsp;&thinsp; Scanner un passport</a>
                    <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addAgentBackdrop"><i class="fa-solid fa-user"></i>&thinsp;&thinsp;&thinsp; Ajouter un Agent</a>
                    <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addCandidatBackdrop"><i class="fa-solid fa-users"></i>&thinsp;&thinsp;&thinsp; Ajouter un Candidat</a>
                    <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addPayBackdrop"><i class="fa-solid fa-money-bill"></i>&thinsp;&thinsp;&thinsp; Ajouter un Paiement</a>
                    <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addVolBackdrop"><i class="fa-solid fa-globe"></i>&thinsp;&thinsp;&thinsp; Ajouter un Vol</a>
                    <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addHotelBackdrop"><i class="fa-solid fa-hotel"></i>&thinsp;&thinsp;&thinsp; Ajouter un Hotel</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow" style="border-radius: 10px;">
                <div class="card-header card-no-border pt-4">
                    <h3 class="mb-1">Liste des candidats</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive theme-scrollbar">
                        <table class="display" id="row_create" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Téléphone</th>
                                    <th>Sexe</th>
                                    <th>Photo</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($service->candidats as $candidat)
                                <tr>
                                    <td>{{ $candidat->nom }}</td>
                                    <td>{{ $candidat->prenom }}</td>
                                    <td>{{ $candidat->telephone }}</td>
                                    <td>{{ $candidat->sexe }}</td>
                                    <td>
                                        @if ($candidat->photo)
                                        <img src="{{ asset('candidat/photo/' . $candidat->photo) }}" alt="Photo" style="height:50px; width:50px; object-fit:cover; border-radius:100%;">
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                    <td>
                                        @can('view', $candidat)
                                        <a href="{{ route('adm_agc_candidats.show', $candidat->id) }}" class="btn btn-square btn-info m-1"><i class="fa-solid fa-eye"></i></a>
                                        @endcan
                                        @can('update', $candidat)
                                        <a href="{{ route('adm_agc_candidats.edit', $candidat->id) }}" class="btn btn-square btn-warning m-1"><i class="fa-solid fa-edit"></i></a>
                                        @endcan
                                        @can('delete', $candidat)
                                        <form action="{{ route('adm_agc_candidats.destroy', $candidat->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-square btn-danger m-1" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce candidat ?')"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Téléphone</th>
                                    <th>Sexe</th>
                                    <th>Photo</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow" style="border-radius: 5px;">
                <div class="card-header card-no-border pt-4">
                    <h3 class="mb-1">Liste des paiements</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive signal-table">
                        <table class="table table-hover" id="row_create" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Montant</th>
                                    <th>Date de paiement</th>
                                    <th>Mode de paiement</th>
                                    <th>Observation</th>
                                    <th>Candidat</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($service->paiements as $paiement)
                                <tr>
                                    <td>{{ $paiement->montant }}</td>
                                    <td>{{ $paiement->date_paiement }}</td>
                                    <td>{{ $paiement->mode_paiement }}</td>
                                    <td>{{ $paiement->observation }}</td>
                                    <td>{{ $paiement->candidat->nom }} {{ $paiement->candidat->prenom }}</td>
                                    <td>
                                        @can('view', $paiement)
                                        <a href="{{ route('adm_agc_paiements.show', $paiement->id) }}" class="btn btn-square btn-info m-1"><i class="fa-solid fa-eye"></i></a>
                                        @endcan
                                        @can('update', $paiement)
                                        <a href="{{ route('adm_agc_paiements.edit', $paiement->id) }}" class="btn btn-square btn-warning m-1"><i class="fa-solid fa-edit"></i></a>
                                        @endcan
                                        @can('delete', $paiement)
                                        <form action="{{ route('adm_agc_paiements.destroy', $paiement->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-square btn-danger m-1" onclick="return confirm('Supprimer ce paiement ?')"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                        @endcan
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

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow" style="border-radius: 5px;">
                <div class="card-header card-no-border pt-4">
                    <h3 class="mb-1">Liste des hotels</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive signal-table">
                        <table class="table table-hover" id="row_create" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Ville</th>
                                    <th>Quartier</th>
                                    <th>Adresse</th>
                                    <th>Téléphone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($service->hotels as $hotel)
                                <tr>
                                    <td>{{ $hotel->nom }}</td>
                                    <td>{{ $hotel->ville }}</td>
                                    <td>{{ $hotel->quartier }}</td>
                                    <td>{{ $hotel->adresse }}</td>
                                    <td>{{ $hotel->telephone }}</td>
                                    <td>
                                        @can('view', $hotel)
                                        <a href="{{ route('adm_agc_hotels.show', $hotel->id) }}" class="btn btn-square btn-info m-1"><i class="fa-solid fa-eye"></i></a>
                                        @endcan
                                        @can('update', $hotel)
                                        <a href="{{ route('adm_agc_hotels.edit', $hotel->id) }}" class="btn btn-square btn-warning m-1"><i class="fa-solid fa-edit"></i></a>
                                        @endcan
                                        @can('delete', $hotel)
                                        <form action="{{ route('adm_agc_hotels.destroy', $hotel->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-square btn-danger m-1" onclick="return confirm('Supprimer cet hôtel ?')"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                        @endcan
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

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow" style="border-radius: 5px;">
                <div class="card-header card-no-border pt-4">
                    <h3 class="mb-1">Liste des bus</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive signal-table">
                        <table class="table table-hover" id="row_create" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Compagnie</th>
                                    <th>Place</th>
                                    <th>Numero</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($service->cars as $id => $car)
                                <tr>
                                    <td>{{ $id + 1 }}</td>
                                    <td>{{ $car->compagnie }}</td>
                                    <td>{{ $car->place }}</td>
                                    <td>{{ $car->numero }}</td>
                                    <td>{{ $car->statut }}</td>
                                    <td>
                                        @can('view', $car)
                                        <a href="{{ route('adm_agc_cars.show', $car->id) }}" class="btn btn-square btn-info m-1"><i class="fa-solid fa-eye"></i></a>
                                        @endcan
                                        @can('update', $car)
                                        <a href="{{ route('adm_agc_cars.edit', $car->id) }}" class="btn btn-square btn-warning m-1"><i class="fa-solid fa-edit"></i></a>
                                        @endcan
                                        @can('delete', $car)
                                        <form action="{{ route('adm_agc_cars.destroy', $car->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-square btn-danger m-1" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce bus ?')"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                        @endcan
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

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow" style="border-radius: 5px;">
                <div class="card-header card-no-border pt-4">
                    <h3 class="mb-1">Liste des agents</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive signal-table">
                        <table class="table table-hover" id="row_create" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Téléphone</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($service->agents as $agent)
                                <tr>
                                    <td>{{ $agent->code }}</td>
                                    <td>{{ $agent->nom }}</td>
                                    <td>{{ $agent->prenom }}</td>
                                    <td>{{ $agent->telephone }}</td>
                                    <td>{{ $agent->statut }}</td>
                                    <td>
                                        @can('view', $agent)
                                        <a href="{{ route('adm_agc_agents.show', $agent->id) }}" class="btn btn-square btn-info m-1"><i class="fa-solid fa-eye"></i></a>
                                        @endcan
                                        @can('update', $agent)
                                        <a href="{{ route('adm_agc_agents.edit', $agent->id) }}" class="btn btn-square btn-warning m-1"><i class="fa-solid fa-edit"></i></a>
                                        @endcan
                                        @can('delete', $agent)
                                        <form action="{{ route('adm_agc_agents.destroy', $agent->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-square btn-danger m-1" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet agent ?')"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                        @endcan
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

{{-- Service modal --}}
@include('agence_admin/services/service-modal')

@endsection
