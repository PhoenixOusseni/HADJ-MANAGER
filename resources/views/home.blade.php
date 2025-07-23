@extends('layouts.main')

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
            <div class="card job-card">
                <div class="card-header pb-0 card-no-border">
                    <div class="header-top">
                        <h3>Gestion des agences</h3>
                        <div>
                            {{-- <p>Wednesday 6, <span>Dec 2022</span></p> --}}
                        </div>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <ul class="d-flex align-center justify-content-center gap-3">
                        <li>
                            <div class="d-flex gap-2">
                                <div class="flex-shrink-0 bg-light-primary">
                                    <svg class="stroke-icon">
                                        <use href="https://admin.pixelstrap.net/admiro/assets/svg/icon-sprite.svg#job-bag"></use>
                                    </svg>
                                </div>
                                <div class="flex-grow-1">
                                    <h3>{{ $agences->count() }}</h3>
                                    <p>Agences </p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex gap-2">
                                <div class="flex-shrink-0 bg-light-secondary">
                                    <svg class="stroke-icon">
                                        <use href="https://admin.pixelstrap.net/admiro/assets/svg/icon-sprite.svg#employees"></use>
                                    </svg>
                                </div>
                                <div class="flex-grow-1">
                                    <h3>{{ $candidats->count() }}</h3>
                                    <p>Candidats</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex gap-2">
                                <div class="flex-shrink-0 bg-light-warning">
                                    <svg class="stroke-icon">
                                        <use href="https://admin.pixelstrap.net/admiro/assets/svg/icon-sprite.svg#hours-work"></use>
                                    </svg>
                                </div>
                                <div class="flex-grow-1">
                                    <h3>{{ $services->count() }}</h3>
                                    <p>Services</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="table-responsive theme-scrollbar">
                        <table class="table display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Agence </th>
                                    <th>Service en cours </th>
                                    <th>Candidats</th>
                                    <th>Details </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($agences as $agence)
                                <tr>
                                    <td>{{ $agence->libelle ?? '' }}</td>
                                    <td>{{ $agence->dernierService?->libelle ?? 'Pas de service' }}</td>
                                    <td>{{ $agence->candidats->count() }}</td>
                                    <td>
                                        <a href="{{ route('agences.show', $agence->id) }}" class="btn btn-square btn-info m-1"><i class="fa-solid fa-eye"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
