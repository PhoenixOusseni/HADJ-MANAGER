@extends('layouts.main')

@section('content')
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6 col-12">
                <h2>Services</h2>
            </div>
            <div class="col-sm-6 col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fa-solid fa-home"></i></a></li>
                    <li class="ms-2">/</li>
                    <li class="mx-2"><a href="{{ route('services.index') }}"><i class="fa-solid fa-list"></i></a></li>
                    <li class="">/</li>
                    <li class="mx-2 active"><a href="{{ route('services.create') }}"><i class="fa-solid fa-add"></i></a></li>
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
                        <div class="row">
                            <div class="col-md-6">
                                <table class="product-page-width">
                                    <tbody>
                                        <tr>
                                            <td>Libellé <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                            <td>{{ $service->libelle }}</td>
                                        </tr>
                                        <tr>
                                            <td>Edition <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $service->edition }}</td>
                                        </tr>
                                        <tr>
                                            <td>Catégorie <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $service->categorie }}</td>
                                        </tr>
                                        <tr>
                                            <td>Cout <b> &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                            <td>{{ $service->cout }}</td>
                                        </tr>
                                        <tr>
                                            <td>Observation <b> &nbsp;&nbsp;&nbsp;:</b></td>
                                            <td>{{ $service->observation }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="m-t-15 btn-showcase">
                        <a href="{{ route('services.edit', $service->id) }}" class="btn btn-square btn-warning m-1"><i class="fa-solid fa-edit"></i></a>
                        <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-square btn-danger m-1" onclick="return confirm('Supprimer ce service ?')"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
