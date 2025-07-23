{{-- Modal view detail --}}
<div class="modal fade" id="addDipBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light-primary">
                <h5 class="modal-title" id="staticBackdropLabel">Detail du service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
                <hr>
                <div class="d-flex justify-content-wetween">
                    <div class="btn-showcase">
                        @can('update', $service)
                            <a href="{{ route('adm_agc_services.edit', $service->id) }}"
                                class="btn btn-square btn-warning m-1"><i class="fa-solid fa-edit"></i></a>
                        @endcan
                        @can('delete', $service)
                            <form action="{{ route('adm_agc_services.destroy', $service->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-square btn-danger m-1"
                                    onclick="return confirm('Supprimer ce service ?')"><i
                                        class="fa-solid fa-trash"></i></button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Modal add agent --}}
<div class="modal fade" id="addAgentBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-light-primary">
                <h5 class="modal-title" id="staticBackdropLabel">Ajout d'un agent...</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('adm_agc_agents.store') }}" method="POST" enctype="multipart/form-data"
                    class="theme-form row g-3">
                    @csrf

                    <div class="col-sm-3">
                        <label class="form-label">Service</label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="service_id" value="{{ $service->id }}"
                            readonly>
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label">Nom</label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="nom" placeholder="Entrez le nom"
                            value="{{ old('nom') }}">
                        @error('nom')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label">Prénom</label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="prenom" placeholder="Entrez le prénom"
                            value="{{ old('prenom') }}">
                        @error('prenom')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label">Téléphone</label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="tel" name="telephone" placeholder="Ex : 70201010"
                            value="{{ old('telephone') }}">
                        @error('telephone')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label">Résidence</label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="tel" name="residence" placeholder="Ex : 123 rue Zogona"
                            value="{{ old('residence') }}">
                        @error('residence')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label">Statut</label>
                    </div>
                    <div class="col-sm-9">
                        <select class="form-select" name="statut">
                            <option value="">-- Sélectionner --</option>
                            <option value="Facilitateur" {{ old('statut') == 'Facilitateur' ? 'selected' : '' }}>
                                Facilitateur</option>
                            <option value="Délégué" {{ old('statut') == 'Délégué' ? 'selected' : '' }}>Délégué
                            </option>
                        </select>
                        @error('statut')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <hr>

                    <div class="col-12 text-start">
                        <button type="submit" class="btn btn-primary"><i
                                class="fa-solid fa-save"></i>&thinsp;&thinsp;&thinsp;Enregistrer</button>
                        <button type="reset" class="btn btn-danger"><i
                                class="fa-solid fa-close"></i>&thinsp;&thinsp;&thinsp;Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal add candidat --}}
<div class="modal fade" id="addCandidatBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-light-primary">
                <h5 class="modal-title" id="staticBackdropLabel">Ajout d'un candidat...</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
        </div>
    </div>
</div>

{{-- Modal add payement --}}
<div class="modal fade" id="addPayBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-light-primary">
                <h5 class="modal-title" id="staticBackdropLabel">Ajouter un paiement...</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
        </div>
    </div>
</div>

{{-- Modal add payement --}}
<div class="modal fade" id="addVolBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-light-primary">
                <h5 class="modal-title" id="staticBackdropLabel">Ajouter un vol...</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
        </div>
    </div>
</div>


{{-- Modal add payement --}}
<div class="modal fade" id="addHotelBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-light-primary">
                <h5 class="modal-title" id="staticBackdropLabel">Ajouter une hotem...</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
        </div>
    </div>
</div>
