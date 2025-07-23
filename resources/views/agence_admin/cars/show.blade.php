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
    <div class="row p-0">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="product-page-details">
                        <h3>Details</h3>
                    </div>
                    <hr>
                    <div>
                        <table class="product-page-width">
                            <tbody>
                                <tr>
                                    <td>Compagnie <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                    <td>{{ $car->compagnie }}</td>
                                </tr>
                                <tr>
                                    <td>Place <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                    <td>{{ $car->place }}</td>
                                </tr>
                                <tr>
                                    <td>Numero <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                    <td>{{ $car->numero }}</td>
                                </tr>
                                <tr>
                                    <td>Statut <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                    <td>{{ $car->statut }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="m-t-15 btn-showcase">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
