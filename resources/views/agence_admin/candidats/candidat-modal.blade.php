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
                        <label class="form-label small">Candidat</label>
                    </div>
                    <div class="col-sm-9">
                        <input type="hidden" class="form-control" name="candidat_id" value="{{ $candidat->id }}" readonly>
                        <input class="form-control" type="text" value="{{ $candidat->nom ?? '' }} {{ $candidat->prenom ?? '' }}" readonly>
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label small">Montant</label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="number" name="montant" step="0.01" placeholder="Entrez le montant payé" value="{{ old('montant') }}" required>
                        @error('montant')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label small">Date de paiement</label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="date" name="date_paiement" value="{{ old('date_paiement', now()->format('Y-m-d')) }}" required>
                        @error('date_paiement')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label small">Mode de paiement</label>
                    </div>
                    <div class="col-sm-9">
                        <select class="form-select" name="mode_paiement">
                            <option value="">Sélectionner ici</option>
                            <option value="Espèces" {{ old('mode_paiement') == 'Espèces' ? 'selected' : '' }}>Espèces
                            </option>
                            <option value="Orange Money" {{ old('mode_paiement') == 'Orange Money' ? 'selected' : '' }}>Orange Money</option>
                        </select>
                        @error('mode_paiement')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label small">Observation</label>
                    </div>
                    <div class="col-sm-9">
                        <textarea class="form-control" name="observation" rows="3" placeholder="Ajouter une remarque...">{{ old('observation') }}</textarea>
                        @error('observation')
                        <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-sm-3">
                        <label class="form-label small">Service</label>
                    </div>
                    <div class="col-sm-9">
                        <input class="form-control" type="hidden" name="service_id" value="{{ $candidat->service->id }}" readonly>
                        <input class="form-control" type="text" value="{{ $candidat->service->libelle }}" readonly>
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
