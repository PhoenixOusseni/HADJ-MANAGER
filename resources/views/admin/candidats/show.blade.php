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
                    <li class="mx-2"><a href="{{ route('candidats.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('candidats.create') }}"><i class="fa-solid fa-add"></i></a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row p-0">
        <div class="col-md-12">
            <div class="card shadow" style="border-radius: 5px;">
                <div class="card-body">
                    <div class="product-page-details">
                        <h3>Details du candidat: {{ $candidat->nom }} {{ $candidat->prenom }}</h3>
                    </div>
                    <p></p>
                    <hr>
                    <div>
                        <div class="row">
                            <div class="col-md-6">
                                <table class="product-page-width">
                                    <tbody>
                                        <tr>
                                            <td>
                                                @if($candidat->photo)
                                                <img src="{{ asset('candidat/photo/' . $candidat->photo) }}" alt="Photo" style="height:100px; width:100px; object-fit:cover; border-radius:10px; margin-bottom: 15px;">
                                                @else
                                                <img src="{{ asset('main/assets/images/avatars/1.png') }}" alt="Photo" style="height:100px; width:100px; object-fit:cover; border-radius:10px; margin-bottom: 15px; background: #ccc;">
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nom <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                            <td>{{ $candidat->nom }}</td>
                                        </tr>
                                        <tr>
                                            <td>Prénom <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $candidat->prenom }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date de naissance <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $candidat->date_naissance }}</td>
                                        </tr>
                                        <tr>
                                            <td>Lieu de naissance <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $candidat->lieu_naissance }}</td>
                                        </tr>
                                        <tr>
                                            <td>Téléphone <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                            <td>{{ $candidat->telephone }}</td>
                                        </tr>
                                        <tr>
                                            <td>Sexe <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $candidat->sexe }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <table class="product-page-width">
                                    <tbody>
                                        <tr>
                                            <td>Ville / Province <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $candidat->ville_province }}</td>
                                        </tr>
                                        <tr>
                                            <td>Numéro pièce <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $candidat->numero_piece }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date de délivrance <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                            <td>{{ $candidat->date_delivrance }}</td>
                                        </tr>
                                        <tr>
                                            <td>Date d'expiration <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $candidat->date_expiration }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nationalité <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $candidat->nationalite }}</td>
                                        </tr>
                                        <tr>
                                            <td>Statut <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $candidat->statut }}</td>
                                        </tr>
                                        <tr>
                                            <td>Observation <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $candidat->observation }}</td>
                                        </tr>
                                        <tr>
                                            <td>Inscription ID <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $candidat->id_inscription }}</td>
                                        </tr>
                                        <tr>
                                            <td>Code office <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                            <td>{{ $candidat->office_code }}</td>
                                        </tr>
                                        <tr>
                                            <td>Agent <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $candidat->agent->nom }} {{ $candidat->agent->prenom }}</td>
                                        </tr>
                                        <tr>
                                            <td>Service <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $candidat->service->libelle }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="m-t-15 btn-showcase">
                        <a href="{{ route('candidats.edit', $candidat->id) }}" class="btn btn-square btn-warning m-1"><i class="fa-solid fa-edit"></i></a>
                        <form action="{{ route('candidats.destroy', $candidat->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-square btn-danger m-1" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce candidat ?')"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
