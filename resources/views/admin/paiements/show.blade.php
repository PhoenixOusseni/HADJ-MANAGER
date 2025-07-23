@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Paiements</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa-solid fa-home"></i></a></li>
                    <li class="ms-2">/</li>
                    <li class="mx-2"><a href="{{ route('paiements.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('paiements.create') }}"><i class="fa-solid fa-add"></i></a></li>
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
                                    <td>Montant <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                    <td>{{ $paiement->montant }}</td>
                                </tr>
                                <tr>
                                    <td>Date de paiement <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                    <td>{{ $paiement->date_paiement }}</td>
                                </tr>
                                <tr>
                                    <td>Mode de paiement <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                    <td>{{ $paiement->mode_paiement }}</td>
                                </tr>
                                <tr>
                                    <td>Observation <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                    <td>{{ $paiement->observation }}</td>
                                </tr>
                                <tr>
                                    <td>Candidat <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                    <td>{{ $paiement->candidat->nom }} {{ $paiement->candidat->prenom }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="m-t-15 btn-showcase">
                        <a href="{{ route('candidats.show', $paiement->candidat->id) }}" class="btn btn-square btn-info m-1"><i class="fa-solid fa-eye me-2"></i>Voir le candidat</a>
                        <a href="{{ route('paiements.edit', $paiement->id) }}" class="btn btn-square btn-warning m-1"><i class="fa-solid fa-edit"></i></a>
                        <form action="{{ route('paiements.destroy', $paiement->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-square btn-danger m-1" onclick="return confirm('Supprimer ce paiement ?')"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
