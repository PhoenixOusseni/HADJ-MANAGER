@extends('layouts.agence_admin')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Agents</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa-solid fa-home"></i></a></li>
                    <li class="ms-2">/</li>
                    <li class="mx-2"><a href="{{ route('export.agents') }}"><i class="fa-solid fa-file"></i></a></li>
                    <li class="ms">/</li>
                    @can('viewAny', App\Models\Agent::class)
                    <li class="mx-2"><a href="{{ route('adm_agc_agents.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    @endcan
                    @can('create', App\Models\Agent::class)
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('adm_agc_agents.create') }}"><i class="fa-solid fa-add"></i></a></li>
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
                                    <th>Code</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Téléphone</th>
                                    <th>Statut</th>
                                    <th>Service</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agents as $agent)
                                <tr>
                                    <td>{{ $agent->code }}</td>
                                    <td>{{ $agent->nom }}</td>
                                    <td>{{ $agent->prenom }}</td>
                                    <td>{{ $agent->telephone }}</td>
                                    <td>{{ $agent->statut }}</td>
                                    <td>{{ $agent->service->libelle }}</td>
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
                            <tfoot>
                                <tr>
                                    <th>Code</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Téléphone</th>
                                    <th>Statut</th>
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
