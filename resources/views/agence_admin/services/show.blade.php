@extends('layouts.agence_admin')

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6 col-12">
                    <h2>Services details
                        <span><a class="badge bg-success" style="font-size: 10px;" href="#" data-bs-toggle="modal"
                                data-bs-target="#addDipBackdrop">Voir détails</a>
                        </span>
                    </h2>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-6">
                    <div class="d-flex justify-content-between bg-light-primary p-2" style="border-radius: 5px">
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addAgentBackdrop"><i class="fa-solid fa-user"></i>&thinsp;&thinsp;&thinsp; Agents</a>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addCandidatBackdrop"><i class="fa-solid fa-users"></i>&thinsp;&thinsp;&thinsp; Candidats</a>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addPayBackdrop"><i class="fa-solid fa-money-bill"></i>&thinsp;&thinsp;&thinsp; Paiements</a>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addVolBackdrop"><i class="fa-solid fa-globe"></i>&thinsp;&thinsp;&thinsp; Vols</a>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addHotelBackdrop"><i class="fa-solid fa-hotel"></i>&thinsp;&thinsp;&thinsp; Hotels</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Liste des candidats</h2>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow" style="border-radius: 10px;">
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
                                        <th>Service</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($candidats as $candidat)
                                        <tr>
                                            <td>{{ $candidat->nom }}</td>
                                            <td>{{ $candidat->prenom }}</td>
                                            <td>{{ $candidat->telephone }}</td>
                                            <td>{{ $candidat->sexe }}</td>
                                            <td>
                                                @if ($candidat->photo)
                                                    <img src="{{ asset('candidat/photo/' . $candidat->photo) }}"
                                                        alt="Photo"
                                                        style="height:50px; width:50px; object-fit:cover; border-radius:100%;">
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                            <td>{{ $candidat->service->libelle }}</td>
                                            <td>
                                                @can('view', $candidat)
                                                    <a href="{{ route('adm_agc_candidats.show', $candidat->id) }}"
                                                        class="btn btn-square btn-info m-1"><i class="fa-solid fa-eye"></i></a>
                                                @endcan
                                                @can('update', $candidat)
                                                    <a href="{{ route('adm_agc_candidats.edit', $candidat->id) }}"
                                                        class="btn btn-square btn-warning m-1"><i
                                                            class="fa-solid fa-edit"></i></a>
                                                @endcan
                                                @can('delete', $candidat)
                                                    <form action="{{ route('adm_agc_candidats.destroy', $candidat->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-square btn-danger m-1"
                                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce candidat ?')"><i
                                                                class="fa-solid fa-trash"></i></button>
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
                                        <th>Service</th>
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

    {{-- Service modal --}}
    @include('agence_admin/services/service-modal')
@endsection
