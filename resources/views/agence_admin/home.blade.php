@extends('layouts.agence_admin')

@section('content')
    <div class="container-fluid">
        <div class="page-title">
            <div class="row">
                <div class="col-sm-6 col-12">
                    <h2>Tableau de bord</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid default-dashboard">
        <div class="row">
            <div class="col-xxl-12 col-xl-12 proorder-xxl-12 col-lg-12 box-col-12">
                <div class="card job-card shadow" style="border-radius: 5px;">
                    <div class="card-header card-no-border">
                        <div class="header-top">
                            <h3>Mes services...</h3>
                        </div>
                        <p class="text-danger"><em>Cette liste vous permet de sélectionner le service que vous voulez
                                ajouter les agents</em></p>

                    </div>
                </div>
                <div class="row">
                    @forelse ($services as $item)
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <a href="{{ route('adm_agc_services.show', [$item->id]) }}">
                                <div class="card job-card shadow" style="border-radius: 5px;">
                                <div class="card-header pb-0 card-no-border">
                                    <div class="header-top">
                                        <h3 class="card-title text-center">Service: {{ $item->libelle }}</h3>
                                    </div>
                                </div>
                                <div class="card-body pt-2">
                                    <div class="card-img">
                                        <img src="{{ asset('asset/undraw_winter-designer_a6kq.png') }}" class="card-img-top"
                                            alt="service" style="width: 100%; height: auto;">
                                    </div>
                                    <a href="{{ route('adm_agc_services.show', [$item->id]) }}"
                                        class="btn btn-primary w-100">Voir plus</a>
                                </div>
                            </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info text-center">
                                Aucun service disponible pour le moment.
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
