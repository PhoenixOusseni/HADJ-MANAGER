@extends('layouts.agence_admin')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Hotels</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa-solid fa-home"></i></a></li>
                    <li class="ms-2">/</li>
                    @can('viewAny', App\Models\Hotel::class)
                    <li class="mx-2"><a href="{{ route('adm_agc_hotels.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    @endcan
                    @can('create', App\Models\Hotel::class)
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('adm_agc_hotels.create') }}"><i class="fa-solid fa-add"></i></a></li>
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
                                            <td>Nom <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                            <td>{{ $hotel->nom }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ville <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $hotel->ville }}</td>
                                        </tr>
                                        <tr>
                                            <td>Quartier <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $hotel->quartier }}</td>
                                        </tr>
                                        <tr>
                                            <td>Adresse <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $hotel->adresse }}</td>
                                        </tr>
                                        <tr>
                                            <td>Code contrat <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                            <td>{{ $hotel->code_contrat }}</td>
                                        </tr>
                                        <tr>
                                            <td>Téléphone <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $hotel->telephone }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="product-page-width">
                                    <tbody>
                                        <tr>
                                            <td>Email <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $hotel->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Contact responsable<b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $hotel->contact_responsable }}</td>
                                        </tr>
                                        <tr>
                                            <td>Début <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                            <td>{{ $hotel->debut ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Fin d'expiration <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $hotel->fin ?? 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nombre de chambres <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $hotel->nombre_chambre }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nombre de lits <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $hotel->nombre_lit }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="m-t-15 btn-showcase">
                        @can('update', $hotel)
                        <a href="{{ route('adm_agc_hotels.edit', $hotel->id) }}" class="btn btn-square btn-warning m-1"><i class="fa-solid fa-edit"></i></a>
                        @endcan
                        @can('delete', $hotel)
                        <form action="{{ route('adm_agc_hotels.destroy', $hotel->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-square btn-danger m-1" onclick="return confirm('Supprimer cet hôtel ?')"><i class="fa-solid fa-trash"></i></button>
                        </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
