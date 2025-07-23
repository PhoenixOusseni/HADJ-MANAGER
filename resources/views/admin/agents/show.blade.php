@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Agents</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa-solid fa-home"></i></a></li>
                    <li class="ms-2">/</li>
                    <li class="mx-2"><a href="{{ route('agents.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('agents.create') }}"><i class="fa-solid fa-add"></i></a></li>
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
                        <h3>Details: {{ $agent->nom ?? '-' }} {{ $agent->prenom ?? '-' }}</h3>
                    </div>
                    <p></p>
                    <hr>
                    <div>
                        <table class="product-page-width">
                            <tbody>
                                <tr>
                                    <td>
                                        @if($agent->photo)
                                        <img src="{{ asset('storage/' . $agent->photo) }}" alt="Photo" style="height:100px; width:100px; object-fit:cover; border-radius:10px; margin-bottom: 15px;">
                                        @else
                                        <img src="{{ asset('main/assets/images/avatars/1.png') }}" alt="Photo" style="height:100px; width:100px; object-fit:cover; border-radius:10px; margin-bottom: 15px; background: #ccc;">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Code <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                    <td>{{ $agent->code ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Nom <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                    <td>{{ $agent->nom ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Prénom <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                    <td>{{ $agent->prenom ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Téléphone <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                    <td>{{ $agent->telephone ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Date de naissance <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                    <td>{{ $agent->date_naissance ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Résidence <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                    <td>{{ $agent->residence ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Email <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                    <td>{{ $agent->email ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Statut <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                    <td>{{ $agent->statut ?? '-' }}</td>
                                </tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="m-t-15 btn-showcase">
                        <a href="{{ route('agents.edit', $agent->id) }}" class="btn btn-square btn-warning m-1"><i class="fa-solid fa-edit"></i></a>
                        <form action="{{ route('agents.destroy', $agent->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-square btn-danger m-1" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet agent ?')"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
