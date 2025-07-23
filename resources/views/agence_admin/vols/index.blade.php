@extends('layouts.agence_admin')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Vols</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa-solid fa-home"></i></a></li>
                    <li class="ms-2">/</li>
                    <li class="mx-2"><a href="{{ route('export.vols') }}"><i class="fa-solid fa-file"></i></a></li>
                    <li class="ms">/</li>
                    @can('viewAny', App\Models\Vol::class)
                    <li class="mx-2"><a href="{{ route('adm_agc_vols.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    @endcan
                    @can('create', App\Models\Vol::class)
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('adm_agc_vols.create') }}"><i class="fa-solid fa-add"></i></a></li>
                    @endcan
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive theme-scrollbar">
                        <table class="display" id="row_create" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Compagnie</th>
                                    <th>Type de vol</th>
                                    <th>Trajet</th>
                                    <th>Numéro de vol</th>
                                    <th>Quota</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vols as $vol)
                                <tr>
                                    <td>{{ $vol->compagnie }}</td>
                                    <td>{{ $vol->type_vol }}</td>
                                    <td>{{ $vol->trajet }}</td>
                                    <td>{{ $vol->numero_vol }}</td>
                                    <td>{{ $vol->quota }}</td>
                                    <td>
                                        @can('view', $vol)
                                        <a href="{{ route('adm_agc_vols.show', $vol->id) }}" class="btn btn-square btn-info m-1"><i class="fa-solid fa-eye"></i></a>
                                        @endcan
                                        @can('update', $vol)
                                        <a href="{{ route('adm_agc_vols.edit', $vol->id) }}" class="btn btn-square btn-warning m-1"><i class="fa-solid fa-edit"></i></a>
                                        @endcan
                                        @can('delete', $vol)
                                        <form action="{{ route('adm_agc_vols.destroy', $vol->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-square btn-danger m-1" onclick="return confirm('Supprimer ce vol ?')"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Compagnie</th>
                                    <th>Type de vol</th>
                                    <th>Trajet</th>
                                    <th>Numéro de vol</th>
                                    <th>Quota</th>
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
