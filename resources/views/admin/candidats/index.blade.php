@extends('layouts.main')

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
                    <li class="mx-2"><a href="{{ route('export.candidats') }}"><i class="fa-solid fa-file"></i></a></li>
                    <li class="">/</li>
                    <li class="mx-2"><a href="{{ route('candidats.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('candidats.create') }}"><i class="fa-solid fa-add"></i></a></li>
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
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Statut</th>
                                    <th>Service</th>
                                    <th>Agence</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($candidats as $candidat)
                                <tr>
                                    <td>{{ $candidat->id_inscription }}</td>
                                    <td>{{ $candidat->nom }}</td>
                                    <td>{{ $candidat->prenom }}</td>
                                    <td>{{ $candidat->statut }}</td>
                                    <td>{{ $candidat->service->libelle }}</td>
                                    <td>{{ $candidat->agence->libelle }}</td>
                                    <td>
                                        <a href="{{ route('candidats.show', $candidat->id) }}" class="btn btn-square btn-info m-1"><i class="fa-solid fa-eye"></i></a>
                                        <a href="{{ route('candidats.edit', $candidat->id) }}" class="btn btn-square btn-warning m-1"><i class="fa-solid fa-edit"></i></a>
                                        <form action="{{ route('candidats.destroy', $candidat->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-square btn-danger m-1" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce candidat ?')"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Statut</th>
                                    <th>Service</th>
                                    <th>Agence</th>
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
