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
                    <li class="mx-2"><a href="{{ route('export.agents') }}"><i class="fa-solid fa-file"></i></a></li>
                    <li class="">/</li>
                    <li class="mx-2"><a href="{{ route('agents.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('agents.create') }}"><i class="fa-solid fa-add"></i></a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card shadow" style="border-radius: 5px;">
                <div class="card-header card-no-border pb-0">
                    <h3>Selectionner le service</h3>
                    <p class="mt-1 mb-0">Cette liste vous permet de selectionner le service que vous voulez ajouter les agents </p>
                </div>
                <div class="card-body grid-showcase">
                    <div class="row">
                        @foreach ($services as $service)
                        <div class="col-md-3 text-center"><a href="{{ route('adm_agc_agents.form', $service->id) }}"><span>{{ $service->libelle ?? '' }}</span></a></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
