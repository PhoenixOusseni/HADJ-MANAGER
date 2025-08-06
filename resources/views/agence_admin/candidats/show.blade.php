@extends('layouts.agence_admin')

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
                    @can('viewAny', App\Models\Candidat::class)
                    <li class="mx-2"><a href="{{ route('adm_agc_candidats.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    @endcan
                    @can('create', App\Models\Candidat::class)
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('adm_agc_candidats.create') }}"><i class="fa-solid fa-add"></i></a></li>
                    @endcan
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row p-0">
        <div class="col-md-12">
            <div class="card shadow" style="border-radius: 5px;">
                <div class="card-body">
                    <div class="product-page-details">
                        <h3>Details du candidat: {{ $candidat->nom }} {{ $candidat->prenom }}</h3>
                    </div>
                    <hr>
                    <div>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="product-page-width">
                                    <tbody>
                                        <tr>
                                            <td>
                                                @if ($candidat->photo)
                                                <img src="{{ asset('candidat/photo/' . $candidat->photo) }}" alt="Photo" style="height:100px; width:100px; object-fit:cover; border-radius:10px; margin-bottom: 15px;">
                                                @else
                                                <img src="{{ asset('main/assets/images/avatars/1.png') }}" alt="Photo" style="height:100px; width:100px; object-fit:cover; border-radius:10px; margin-bottom: 15px; background: #ccc;">
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nom <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                            <td>{{ $candidat->nom }}</td>
                                        </tr>
                                        <tr>
                                            <td>Prénom <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $candidat->prenom }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date de naissance <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $candidat->date_naissance }}</td>
                                        </tr>
                                        <tr>
                                            <td>Lieu de naissance <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $candidat->lieu_naissance }}</td>
                                        </tr>
                                        <tr>
                                            <td>Téléphone <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                            <td>{{ $candidat->telephone }}</td>
                                        </tr>
                                        <tr>
                                            <td>Sexe <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $candidat->sexe }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="product-page-width">
                                    <tbody>
                                        <tr>
                                            <td>Ville / Province <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $candidat->ville_province }}</td>
                                        </tr>
                                        <tr>
                                            <td>Numéro pièce <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $candidat->numero_piece }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date de délivrance <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                            <td>{{ $candidat->date_delivrance }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date d'expiration <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $candidat->date_expiration }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nationalité <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $candidat->nationalite }}</td>
                                        </tr>
                                        <tr>
                                            <td>Statut <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $candidat->statut }}</td>
                                        </tr>
                                        <tr>
                                            <td>Observation <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $candidat->observation }}</td>
                                        </tr>
                                        <tr>
                                            <td>Inscription ID <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $candidat->id_inscription }}</td>
                                        </tr>
                                        <tr>
                                            <td>Code office <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                            <td>{{ $candidat->office_code }}</td>
                                        </tr>
                                        <tr>
                                            <td>Agent <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $candidat->agent->nom }} {{ $candidat->agent->prenom }}</td>
                                        </tr>
                                        <tr>
                                            <td>Service <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $candidat->service->libelle }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="m-t-15 btn-showcase">
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
                <div class="card-body">
                    <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addPayBackdrop"><i class="fa-solid fa-money-bill"></i>&thinsp;&thinsp;&thinsp; Ajouter un Paiement</a>
                    <a href="#" class="btn btn-outline-warning-2x" data-bs-toggle="modal" data-bs-target="#addDipBackdrop"><i class="fa-solid fa-eye"></i>&thinsp;&thinsp;&thinsp; Historique des paiements</a>
                    <a href="#" class="btn btn-outline-secondary-2x">Paiement total: {{ $total }}</a>
                    <a href="#" class="btn btn-outline-secondary-2x">Reste: {{ $remain }}</a>
                    <div class="table-responsive theme-scrollbar">
                        <table class="display" id="row_create" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Date de paiement</th>
                                    <th>Mode de paiement</th>
                                    <th>Observation</th>
                                    <th>Candidat</th>
                                    <th>Montant</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paiements as $paiement)
                                <tr>
                                    <td>{{ $paiement->date_paiement }}</td>
                                    <td>{{ $paiement->mode_paiement }}</td>
                                    <td>{{ $paiement->observation }}</td>
                                    <td>{{ $paiement->candidat->nom }} {{ $paiement->candidat->prenom }}</td>
                                    <td>{{ $paiement->montant }}</td>
                                    <td>
                                        <a href="{{ route('adm_agc_paiements.print', $paiement->id) }}" class="btn btn-square btn-primary m-1"><i class="fa-solid fa-print"></i></a>
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
                            <tfoot>
                                <tr>
                                    <th>Date de paiement</th>
                                    <th>Mode de paiement</th>
                                    <th>Observation</th>
                                    <th>Candidat</th>
                                    <th>Montant</th>
                                    <th>Reste à payer</th>
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
@include('agence_admin/candidats/candidat-modal')
@endsection
