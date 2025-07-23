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
    <div class="row p-0">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="product-page-details">
                        <h3>Details</h3>
                    </div>
                    <hr>
                    <div>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="product-page-width">
                                    <tbody>
                                        <tr>
                                            <td>Compagnie <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                            <td>{{ $vol->compagnie }}</td>
                                        </tr>
                                        <tr>
                                            <td>Type de vol <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                            <td>{{ $vol->type_vol }}</td>
                                        </tr>
                                        <tr>
                                            <td>Trajet <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                            <td>{{ $vol->trajet }}</td>
                                        </tr>
                                        <tr>
                                            <td>Numéro de vol <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                            <td>{{ $vol->numero_vol }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ville départ (aller) <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                            <td>{{ $vol->ville_depart_aller }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ville arrivée (aller) <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                            <td>{{ $vol->ville_arrivee_aller }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date/heure départ (aller) <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                            <td>{{ $vol->date_heure_depart_aller }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="product-page-width">
                                    <tbody>
                                        <tr>
                                            <td>Date/heure arrivée (aller) <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                            <td>{{ $vol->date_heure_arrivee_aller }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ville départ (retour) <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                            <td>{{ $vol->ville_depart_retour }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ville arrivée (retour) <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                            <td>{{ $vol->ville_arrivee_retour }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date/heure départ (retour) <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                            <td>{{ $vol->date_heure_depart_retour }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date/heure arrivée (retour) <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                            <td>{{ $vol->date_heure_arrivee_retour }}</td>
                                        </tr>
                                        <tr>
                                            <td>Quota <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                            <td>{{ $vol->quota }}</td>
                                        </tr>
                                        <tr>
                                            <td>Convocation <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                            <td>{{ $vol->convocation }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="m-t-15 btn-showcase">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
