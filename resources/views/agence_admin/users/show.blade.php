@extends('layouts.agence_admin')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Administrateurs</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa-solid fa-home"></i></a></li>
                    <li class="ms-2">/</li>
                    @can('view', App\Models\User::class)
                    <li class="mx-2"><a href="{{ route('adm_agc_utilisateurs.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    @endcan
                    @can('create', App\Models\User::class)
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('adm_agc_utilisateurs.create') }}"><i class="fa-solid fa-add"></i></a></li>
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
                                    <td>Nom <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                    <td>{{ $user->nom }}</td>
                                </tr>
                                <tr>
                                    <td>Prénom <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                    <td>{{ $user->prenom }}</td>
                                </tr>
                                <tr>
                                    <td>Email <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <td>Téléphone <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                    <td>{{ $user->telephone }}</td>
                                </tr>
                                <tr>
                                    <td>Statut <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                    <td>{{ $user->statut }}</td>
                                </tr>
                                <tr>
                                    <td>Role <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                    <td>{{ $user->role->nom }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="m-t-15 btn-showcase">
                        @can('update', $user)
                        <a href="{{ route('adm_agc_utilisateurs.edit', $user->id) }}" class="btn btn-square btn-warning m-1"><i class="fa-solid fa-edit"></i></a>
                        @endcan
                        @can('delete', $user)
                        <form action="{{ route('adm_agc_utilisateurs.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-square btn-danger m-1" onclick="return confirm('Supprimer ce utilisateur ?')"><i class="fa-solid fa-trash"></i></button>
                        </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
