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
                        <li class="mx-2"><a href="{{ route('export.candidats') }}"><i class="fa-solid fa-file"></i></a>
                        </li>
                        <li class="ms">/</li>
                        @can('viewAny', App\Models\Candidat::class)
                            <li class="mx-2"><a href="{{ route('adm_agc_candidats.index') }}"><i
                                        class="fa-solid fa-list"></i></a></li>
                        @endcan
                        @can('create', App\Models\Candidat::class)
                            <li class="">/</li>
                            <li class="mx-2 active"><a href="{{ route('adm_agc_candidats.create') }}"><i
                                        class="fa-solid fa-add"></i></a></li>
                        @endcan
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card shadow" style="border-radius: 5px;">
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
@endsection
