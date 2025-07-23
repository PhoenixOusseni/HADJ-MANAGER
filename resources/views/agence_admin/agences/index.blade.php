@extends('layouts.agence_admin')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Agences</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa-solid fa-home"></i></a></li>
                    <li class="ms-2">/</li>
                    <li class="mx-2"><a href="{{ route('export.agences') }}"><i class="fa-solid fa-file"></i></a></li>
                    <li class="ms">/</li>
                    <li class="mx-2"><a href="{{ route('adm_agc_agences.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('adm_agc_agences.create') }}"><i class="fa-solid fa-add"></i></a></li>
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
            <th>Code</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Siège</th>
            <th>WhatsApp</th>
            <th>Téléphone externe</th>
            <th>Adresse</th>
            <th>Logo</th>
            <th>Admin</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($agences as $agence)
        <tr>
            <td>{{ $agence->code }}</td>
            <td>{{ $agence->libelle }}</td>
            <td>{{ $agence->email }}</td>
            <td>{{ $agence->telephone }}</td>
            <td>{{ $agence->siege }}</td>
            <td>{{ $agence->whatsapp }}</td>
            <td>{{ $agence->exter_phone }}</td>
            <td>{{ $agence->adress }}</td>
            <td>
                @if($agence->logo)
                    <img src="{{ asset('agence/logo/' . $agence->logo) }}" alt="Logo" style="height:40px;">
                @else
                    N/A
                @endif
            </td>
            <td>{{ $agence->user->nom }} {{ $agence->user->prenom }}</td>
            <td>
                <a href="{{ route('adm_agc_agences.show', $agence->id) }}" class="btn btn-square btn-info m-1"><i class="fa-solid fa-eye"></i></a>
                <a href="{{ route('adm_agc_agences.edit', $agence->id) }}" class="btn btn-square btn-warning m-1"><i class="fa-solid fa-edit"></i></a>
                <form action="{{ route('adm_agc_agences.destroy', $agence->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-square btn-danger m-1" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette agence ?')"><i class="fa-solid fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>Code</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Siège</th>
            <th>WhatsApp</th>
            <th>Téléphone externe</th>
            <th>Adresse</th>
            <th>Logo</th>
            <th>Admin</th>
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
