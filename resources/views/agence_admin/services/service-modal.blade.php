{{-- Modal view detail --}}
<div class="modal fade" id="addDipBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light-primary">
                <h5 class="modal-title" id="staticBackdropLabel">Detail du service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mt-4">
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
                        <a href="{{ route('adm_agc_services.edit', $service->id) }}" class="btn btn-square btn-warning m-1"><i class="fa-solid fa-edit"></i></a>
                        @endcan
                        @can('delete', $service)
                        <form action="{{ route('adm_agc_services.destroy', $service->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-square btn-danger m-1" onclick="return confirm('Supprimer ce service ?')"><i class="fa-solid fa-trash"></i></button>
                        </form>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- Modal add agent --}}
<div class="modal fade" id="addAgentBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-light-primary">
                <h5 class="modal-title" id="staticBackdropLabel">Ajout d'un agent...</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('adm_agc_agents.store') }}" method="POST" enctype="multipart/form-data" class="theme-form row g-3">
                    @csrf

                    <div class="col-sm-3">
                        <label class="form-label">Service</label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="hidden" name="service_id" value="{{ $service->id }}" readonly>
                        <input class="form-control" type="text" value="{{ $service->libelle }}" readonly>
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label">Nom</label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="nom" placeholder="Entrez le nom" value="{{ old('nom') }}">
                        @error('nom')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label">Prénom</label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" name="prenom" placeholder="Entrez le prénom" value="{{ old('prenom') }}">
                        @error('prenom')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label">Téléphone</label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="tel" name="telephone" placeholder="Ex : 70201010" value="{{ old('telephone') }}">
                        @error('telephone')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label">Résidence</label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="tel" name="residence" placeholder="Ex : 123 rue Zogona" value="{{ old('residence') }}">
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
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-save"></i>&thinsp;&thinsp;&thinsp;Enregistrer</button>
                        <button type="reset" class="btn btn-danger"><i class="fa-solid fa-close"></i>&thinsp;&thinsp;&thinsp;Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal add candidat --}}
<div class="modal fade" id="addCandidatBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-light-primary">
                <h5 class="modal-title" id="staticBackdropLabel">Ajout d'un candidat...</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if (session('error'))
                <div class="alert alert-danger mb-4">{{ session('error') }}</div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('adm_agc_candidats.store') }}" method="POST" enctype="multipart/form-data" class="form theme-form flat-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Nom <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="nom" value="{{ old('nom') }}">
                                        @error('nom')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Prénom <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="prenom" value="{{ old('prenom') }}">
                                        @error('prenom')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Date de naissance</label>
                                        <input class="form-control" type="date" name="date_naissance" value="{{ old('date_naissance') }}">
                                        @error('date_naissance')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Lieu de naissance</label>
                                        <input class="form-control" type="text" name="lieu_naissance" value="{{ old('lieu_naissance') }}">
                                        @error('lieu_naissance')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Téléphone</label>
                                        <input class="form-control" type="text" name="telephone" value="{{ old('telephone') }}">
                                        @error('telephone')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Sexe <span class="text-danger">*</span></label>
                                        <select class="form-control" name="sexe">
                                            <option value="">-- Sélectionner --</option>
                                            <option value="Masculin" {{ old('sexe') == 'Masculin' ? 'selected' : '' }}>Masculin</option>
                                            <option value="Feminin" {{ old('sexe') == 'Feminin' ? 'selected' : '' }}>Féminin</option>
                                        </select>
                                        @error('sexe')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Ville / Province</label>
                                        <input class="form-control" type="text" name="ville_province" value="{{ old('ville_province') }}">
                                        @error('ville_province')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Type de pièce <span class="text-danger">*</span></label>
                                        <select class="form-control" name="type_piece">
                                            <option value="">-- Sélectionner --</option>
                                            <option value="CNIB" {{ old('type_piece') == 'CNIB' ? 'selected' : '' }}>CNIB</option>
                                            <option value="Passeport" {{ old('type_piece') == 'Passeport' ? 'selected' : '' }}>Passeport</option>
                                        </select>
                                        @error('type_piece')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Numéro de pièce</label>
                                        <input class="form-control" type="text" name="numero_piece" value="{{ old('numero_piece') }}">
                                        @error('numero_piece')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Date de délivrancel</label>
                                        <input class="form-control" type="date" name="date_delivrance" value="{{ old('date_delivrance') }}">
                                        @error('date_delivrance')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Date d'expiration</label>
                                        <input class="form-control" type="date" name="date_expiration" value="{{ old('date_expiration') }}">
                                        @error('date_expiration')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Nationalité</label>
                                        <input class="form-control" type="text" name="nationalite" value="{{ old('nationalite') }}">
                                        @error('nationalite')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Statut</label>
                                        <select class="form-control" name="statut">
                                            <option value="">-- Sélectionner --</option>
                                            <option value="Provisoir" {{ old('statut') == 'Provisoir' ? 'selected' : '' }}>Provisoire</option>
                                            <option value="Définitif" {{ old('statut') == 'Définitif' ? 'selected' : '' }}>Définitif</option>
                                        </select>
                                        @error('statut')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Statut paiement</label>
                                        <select class="form-control" name="statut_paiement">
                                            <option value="">-- Sélectionner --</option>
                                            <option value="Non payé" {{ old('statut_paiement') == 'Non payé' ? 'selected' : '' }}>Non payé</option>
                                            <option value="Paiement partiel" {{ old('statut_paiement') == 'Paiement partiel' ? 'selected' : '' }}>Paiement partiel</option>
                                            <option value="Tout payé" {{ old('statut_paiement') == 'Tout payé' ? 'selected' : '' }}>Tout payé</option>
                                        </select>
                                        @error('statut_paiement')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Agent facilitateurl</label>
                                        <select class="form-control" name="agent_id">
                                            <option value="">-- Sélectionner --</option>
                                            @foreach($agents as $agent)
                                            <option value="{{ $agent->id }}" {{ old('agent_id') == $agent->id ? 'selected' : '' }}>{{ $agent->nom }}</option>
                                            @endforeach
                                        </select>
                                        @error('agent_id')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Service</label>
                                        <input class="form-control" type="hidden" name="service_id" value="{{ $service->id }}" readonly>
                                        <input class="form-control" type="text" value="{{ $service->libelle }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Observation</label>
                                        <textarea class="form-control" name="observation" rows="4">{{ old('observation') }}</textarea>
                                        @error('observation')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Photo</label>
                                        <input class="form-control" type="file" name="photo">
                                        @error('photo')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal add payement --}}
<div class="modal fade" id="addPayBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-light-primary">
                <h5 class="modal-title" id="staticBackdropLabel">Ajouter un paiement...</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if (session('error'))
                <div class="alert alert-danger mb-4">{{ session('error') }}</div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('adm_agc_paiements.store') }}" method="POST" class="theme-form row g-3">
                    @csrf

                    <div class="col-sm-3">
                        <label class="form-label">Candidat</label>
                    </div>
                    <div class="col-sm-9">
                        <select class="form-control" name="candidat_id" required>
                            <option value="">-- Sélectionner un candidat --</option>
                            @foreach($candidats as $candidat)
                            <option value="{{ $candidat->id }}" {{ old('candidat_id') == $candidat->id ? 'selected' : '' }}>
                                {{ $candidat->nom }} {{ $candidat->prenom }}
                            </option>
                            @endforeach
                        </select>
                        @error('candidat_id')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label">Montant</label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="number" name="montant" step="0.01" placeholder="Entrez le montant payé" value="{{ old('montant') }}" required>
                        @error('montant')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label">Date de paiement</label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="date" name="date_paiement" value="{{ old('date_paiement', now()->format('Y-m-d')) }}" required>
                        @error('date_paiement')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label">Mode de paiement</label>
                    </div>
                    <div class="col-sm-9">
                        <select class="form-control" name="mode_paiement">
                            <option value="">-- Sélectionner --</option>
                            <option value="Espèces" {{ old('mode_paiement') == 'Espèces' ? 'selected' : '' }}>Espèces</option>
                            <option value="Orange Money" {{ old('mode_paiement') == 'Orange Money' ? 'selected' : '' }}>Orange Money</option>
                        </select>
                        @error('mode_paiement')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label">Observation</label>
                    </div>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="observation" rows="3" placeholder="Ajouter une remarque...">{{ old('observation') }}</textarea>
                        @error('observation')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label">Service</label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="hidden" name="service_id" value="{{ $service->id }}" readonly>
                        <input class="form-control" type="text" value="{{ $service->libelle }}" readonly>
                    </div>

                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal add vol --}}
<div class="modal fade" id="addVolBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-light-primary">
                <h5 class="modal-title" id="staticBackdropLabel">Ajouter un vol...</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mt-4">
                @if (session('error'))
                <div class="alert alert-danger mb-4">{{ session('error') }}</div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('adm_agc_vols.store') }}" method="POST" class="theme-form row g-3">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Compagnie</label>
                                        <input class="form-control" type="text" name="compagnie" placeholder="Entrez le nom de la compagnie" value="{{ old('compagnie') }}" required>
                                        @error('compagnie')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Type de vol</label>
                                        <select class="form-control" name="type_vol">
                                            <option value="">-- Sélectionner --</option>
                                            <option value="Charter" {{ old('type_vol') == 'Charter' ? 'selected' : '' }}>Charter</option>
                                            <option value="Régulier" {{ old('type_vol') == 'Régulier' ? 'selected' : '' }}>Régulier</option>
                                            <option value="Autre" {{ old('type_vol') == 'Autre' ? 'selected' : '' }}>Autre</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Trajet</label>
                                        <select class="form-control" name="trajet">
                                            <option value="">-- Sélectionner --</option>
                                            <option value="Aller simple" {{ old('trajet') == 'Aller' ? 'selected' : '' }}>Aller</option>
                                            <option value="Aller-retour" {{ old('trajet') == 'Aller-retour' ? 'selected' : '' }}>Aller-retour</option>
                                            <option value="Retour" {{ old('trajet') == 'Retour' ? 'selected' : '' }}>Retour</option>
                                        </select>
                                        @error('trajet')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Numéro de vol</label>
                                        <input class="form-control" type="text" name="numero_vol" placeholder="Ex : AF123" value="{{ old('numero_vol') }}" required>
                                        @error('numero_vol')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Ville de départ (Aller)</label>
                                        <input class="form-control" type="text" name="ville_depart_aller" placeholder="Ville de départ" value="{{ old('ville_depart_aller') }}" required>
                                        @error('ville_depart_aller')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Ville d’arrivée (Aller)</label>
                                        <input class="form-control" type="text" name="ville_arrivee_aller" placeholder="Ville d’arrivée" value="{{ old('ville_arrivee_aller') }}" required>
                                        @error('ville_arrivee_aller')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Date & heure de départ (Aller)</label>
                                        <input class="form-control" type="datetime-local" name="date_heure_depart_aller" value="{{ old('date_heure_depart_aller') }}" required>
                                        @error('date_heure_depart_aller')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Date & heure d’arrivée (Aller)</label>
                                        <input class="form-control" type="datetime-local" name="date_heure_arrivee_aller" value="{{ old('date_heure_arrivee_aller') }}" required>
                                        @error('date_heure_arrivee_aller')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Ville de départ (Retour)</label>
                                        <input class="form-control" type="text" name="ville_depart_retour" placeholder="Ville de départ (retour)" value="{{ old('ville_depart_retour') }}">
                                        @error('ville_depart_retour')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Ville d’arrivée (Retour)</label>
                                        <input class="form-control" type="text" name="ville_arrivee_retour" placeholder="Ville d’arrivée (retour)" value="{{ old('ville_arrivee_retour') }}">
                                        @error('ville_depart_retour')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Date & heure de départ (Retour)</label>
                                        <input class="form-control" type="datetime-local" name="date_heure_depart_retour" value="{{ old('date_heure_depart_retour') }}">
                                        @error('date_heure_depart_retour')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Date & heure d’arrivée (Retour)</label>
                                        <input class="form-control" type="datetime-local" name="date_heure_arrivee_retour" value="{{ old('date_heure_arrivee_retour') }}">
                                        @error('date_heure_arrivee_retour')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Quota</label>
                                        <input class="form-control" type="number" name="quota" placeholder="Nombre de places disponibles" value="{{ old('quota') }}" required>
                                        @error('quota')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Convocation</label>
                                        <input class="form-control" type="text" name="convocation" placeholder="Lieu ou heure de convocation" value="{{ old('convocation') }}">
                                        @error('convocation')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Service</label>
                                        <input class="form-control" type="hidden" name="service_id" value="{{ $service->id }}" readonly>
                                        <input class="form-control" type="text" value="{{ $service->libelle }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-end">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- Modal add hotel --}}
<div class="modal fade" id="addHotelBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-light-primary">
                <h5 class="modal-title" id="staticBackdropLabel">Ajouter une hôtel...</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body mt-4">
                @if (session('error'))
                <div class="alert alert-danger mb-4">{{ session('error') }}</div>
                @endif
                @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('adm_agc_hotels.store') }}" method="POST" class="theme-form row g-3">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Nom de l'hôtel</label>
                                        <input class="form-control" type="text" name="nom" placeholder="Entrez le nom de l'hôtel" value="{{ old('nom') }}" required>
                                        @error('nom')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Ville</label>
                                        <input class="form-control" type="text" name="ville" placeholder="Entrez la ville" value="{{ old('ville') }}">
                                        @error('ville')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Quartier</label>
                                        <input class="form-control" type="text" name="quartier" placeholder="Entrez le quartier" value="{{ old('quartier') }}">
                                        @error('quartier')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Adresse</label>
                                        <input class="form-control" type="text" name="adresse" placeholder="Entrez l'adresse complète" value="{{ old('adresse') }}">
                                        @error('adresse')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Téléphone</label>
                                        <input class="form-control" type="text" name="telephone" placeholder="Ex. : +226 70 00 00 00" value="{{ old('telephone') }}">
                                        @error('telephone')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control" type="email" name="email" placeholder="Entrez l'adresse email" value="{{ old('email') }}">
                                        @error('email')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Contact du responsable</label>
                                        <input class="form-control" type="text" name="contact_responsable" placeholder="Nom et téléphone du responsable" value="{{ old('contact_responsable') }}">
                                        @error('contact_responsable')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Début d'activité</label>
                                        <input class="form-control" type="date" name="debut" placeholder="Date de début" value="{{ old('debut') }}">
                                        @error('debut')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Fin d'activité</label>
                                        <input class="form-control" type="date" name="fin" placeholder="Date de fin" value="{{ old('fin') }}">
                                        @error('fin')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Nombre de chambres</label>
                                        <input class="form-control" type="number" name="nombre_chambre" placeholder="Ex. : 50" value="{{ old('nombre_chambre') }}">
                                        @error('nombre_chambre')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Nombre de lits</label>
                                        <input class="form-control" type="number" name="nombre_lit" placeholder="Ex. : 120" value="{{ old('nombre_lit') }}">
                                        @error('nombre_lit')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Service</label>
                                        <input class="form-control" type="hidden" name="service_id" value="{{ $service->id }}" readonly>
                                        <input class="form-control" type="text" value="{{ $service->libelle }}" readonly>
                                        @error('service_id')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
