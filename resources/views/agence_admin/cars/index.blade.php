@extends('layouts.agence_admin')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Bus</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa-solid fa-home"></i></a></li>
                    <li class="ms-2">/</li>
                    <li class="mx-2"><a href="{{ route('export.bus') }}"><i class="fa-solid fa-file"></i></a></li>
                    <li class="ms">/</li>
                    @can('viewAny', App\Models\Car::class)
                    <li class="mx-2"><a href="{{ route('adm_agc_cars.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    @endcan
                    @can('create', App\Models\Car::class)
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('adm_agc_cars.create') }}"><i class="fa-solid fa-add"></i></a></li>
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
                                    <th>ID</th>
                                    <th>Compagnie</th>
                                    <th>Place</th>
                                    <th>Numero</th>
                                    <th>Statut</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cars as $id => $car)
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
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Compagnie</th>
                                    <th>Place</th>
                                    <th>Numero</th>
                                    <th>Statut</th>
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
