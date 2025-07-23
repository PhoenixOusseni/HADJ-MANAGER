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
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa-solid fa-house"></i>
                    <li class="ms-2">/</li>
                    <li class="mx-2"><a href="{{ route('export.paiements') }}"><i class="fa-solid fa-file"></i></a></li>
                    <li class="">/</li>
                    <li class="mx-2"><a href="{{ route('paiements.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('paiements.create') }}"><i class="fa-solid fa-add"></i></a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header card-no-border pb-0">
                    <h3>Selectionner l'agence</h3>
                    <p class="mt-1 mt-1 mb-0">Cette liste vous permet de selectionner l'agence que vous voulez ajouter les paiements </p>
                </div>
                <div class="card-body grid-showcase">
                    <div class="row">
                        @foreach ($agences as $agence)
                        <div class="col-md-3 text-center"><a href="{{ route('paiements.form', $agence->id) }}"><span>{{ $agence->libelle ?? '' }}</span></a></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
