@extends('layouts.agence_admin')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Services</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa-solid fa-home"></i></a></li>
                    <li class="ms-2">/</li>
                    <li class="mx-2"><a href="{{ route('export.services') }}"><i class="fa-solid fa-file"></i></a></li>
                    <li class="ms">/</li>
                    @can('viewAny', App\Models\Service::class)
                    <li class="mx-2"><a href="{{ route('adm_agc_services.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    @endcan
                    @can('create', App\Models\Service::class)
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('adm_agc_services.create') }}"><i class="fa-solid fa-add"></i></a></li>
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
                                    <th>Libellé</th>
                                    <th>Edition</th>
                                    <th>Catégorie</th>
                                    <th>Cout</th>
                                    <th>Observation</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                <tr>
                                    <td>{{ $service->libelle }}</td>
                                    <td>{{ $service->edition }}</td>
                                    <td>{{ $service->categorie }}</td>
                                    <td>{{ $service->cout }}</td>
                                    <td>{{ $service->observation }}</td>
                                    <td>
                                        @can('view', $service)
                                        <a href="{{ route('adm_agc_services.show', $service->id) }}" class="btn btn-square btn-info m-1"><i class="fa-solid fa-eye"></i></a>
                                        @endcan
                                        @can('update', $service)
                                        <a href="{{ route('adm_agc_services.edit', $service->id) }}" class="btn btn-square btn-warning m-1"><i class="fa-solid fa-edit"></i></a>
                                        @endcan
                                        @can('delete', $service)
                                        <form action="{{ route('adm_agc_services.destroy', $service->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-square btn-danger m-1" onclick="return confirm('Supprimer ce service ?')"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Libellé</th>
                                    <th>Edition</th>
                                    <th>Catégorie</th>
                                    <th>Cout</th>
                                    <th>Observation</th>
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
