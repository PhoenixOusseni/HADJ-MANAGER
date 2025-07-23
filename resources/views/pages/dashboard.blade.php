@extends('layouts.master')

@section('content')
    @include('require.header')
    <!-- Main page content-->
    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-lg-3 col-md-12 mb-4">
                <div class="card bg-light h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="me-3">
                                <div class="small">Nombre de service</div>
                                <div class="text-lg fw-bold">0</div>
                            </div>
                            <i class="feather-xl" data-feather="package"></i>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="stretched-link" href="#">Voir plus</a>
                        <div class="text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            @if (Auth::user()->role !== 'Recouvrement')
                <div class="col-lg-3 col-md-12 mb-4">
                    <div class="card bg-light h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div class="small">Nombre de candidat</div>
                                    <div class="text-lg fw-bold">0</div>
                                </div>
                                <i class="feather-xl" data-feather="users"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small">
                            <a class="stretched-link" href="#">Voir plus</a>
                            <div class="text-dark"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            @endif
            @if (Auth::user()->role == 'Privilege' || Auth::user()->role == 'Secretaire')
                <div class="col-lg-3 col-md-12 mb-4">
                    <div class="card bg-light h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div class="small">Nombre de délégué</div>
                                    <div class="text-lg fw-bold">0</div>
                                </div>
                                <i class="feather-xl" data-feather="users"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small">
                            <a class="stretched-link" href="#">Voir plus</a>
                            <div class="text-dark"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12 mb-4">
                    <div class="card bg-light h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="me-3">
                                    <div class="small">Balance AG</div>
                                    <div class="text-lg fw-bold">0</div>
                                </div>
                                <i class="feather-xl" data-feather="activity"></i>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between small">
                            <a class="stretched-link" href="#">Voir plus</a>
                            <div class="text-dark"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card bg-light h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="me-3">
                                <div class="text-lg fw-bold text-center m-3">HADJ</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="stretched-link" href="#">Voir plus</a>
                        <div class="text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card bg-light h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="me-3">
                                <div class="text-lg fw-bold text-center m-3">OUMRA</div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between small">
                        <a class="stretched-link" href="#">Voir plus</a>
                        <div class="text-dark"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
