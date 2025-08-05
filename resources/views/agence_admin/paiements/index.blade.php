@extends('layouts.agence_admin')

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
                    <li class="mx-2"><a href="{{ route('export.paiements') }}"><i class="fa-solid fa-file"></i></a></li>
                    <li class="ms">/</li>
                    @can('viewAny', App\Models\Paiement::class)
                    <li class="mx-2"><a href="{{ route('adm_agc_paiements.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    @endcan
                    @can('create', App\Models\Paiement::class)
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('adm_agc_paiements.create') }}"><i class="fa-solid fa-add"></i></a></li>
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
                                    <th>Montant</th>
                                    <th>Date de paiement</th>
                                    <th>Mode de paiement</th>
                                    <th>Observation</th>
                                    <th>Candidat</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paiements as $paiement)
                                <tr>
                                    <td>{{ $paiement->montant }}</td>
                                    <td>{{ $paiement->date_paiement }}</td>
                                    <td>{{ $paiement->mode_paiement }}</td>
                                    <td>{{ $paiement->observation }}</td>
                                    <td>{{ $paiement->candidat->nom }} {{ $paiement->candidat->prenom }}</td>
                                    <td>
                                        <a href="{{ route('adm_agc_paiements.print', $paiement->id) }}" class="btn btn-square btn-info m-1"><i class="fa-solid fa-print"></i></a>
                                        @can('view', $paiement)
                                        <a href="{{ route('adm_agc_paiements.show', $paiement->id) }}" class="btn btn-square btn-info m-1"><i class="fa-solid fa-eye"></i></a>
                                        @endcan
                                        @can('update', $paiement)
                                        <a href="{{ route('adm_agc_paiements.edit', $paiement->id) }}" class="btn btn-square btn-warning m-1"><i class="fa-solid fa-edit"></i></a>
                                        @endcan
                                        @can('delete', $paiement)
                                        <form action="{{ route('adm_agc_paiements.destroy', $paiement->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-square btn-danger m-1" onclick="return confirm('Supprimer ce paiement ?')"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Montant</th>
                                    <th>Date de paiement</th>
                                    <th>Mode de paiement</th>
                                    <th>Observation</th>
                                    <th>Candidat</th>
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
