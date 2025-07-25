<?php

namespace App\Http\Controllers\AgenceAdmin;

use App\Models\Service;
use App\Models\Candidat;
use App\Models\Paiement;
use Illuminate\Http\Request;
use App\Helpers\AdminHelpers;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AdmAgcPaiementController extends Controller
{
    public function index()
    {
        $agenceId = AdminHelpers::getAdminAgenceId();
        $paiements = Paiement::whereHas('candidat', function ($query) use ($agenceId) {
            $query->where('agence_id', $agenceId);
        })->with('candidat')->latest()->get();

        return view('agence_admin.paiements.index', compact('paiements'));
    }

    public function date_filter(Request $request)
    {
        $date_debut = $request->date_debut;
        $date_fin = $request->date_fin;

        $collection = Paiement::whereDate('created_at', '>=', $date_debut)->whereDate('created_at', '<=', $date_fin)->get();
        $total = $collection->sum('total');

        return view('agence_admin.paiements.paiement', compact('collection', 'total'));
    }

    public function show($id)
    {
        $paiement = Paiement::find($id);
        return view('agence_admin.paiements.show', compact('paiement'));
    }

    public function form($id)
    {
        $service = Service::find($id);
        $agenceId = AdminHelpers::getAdminAgenceId();
        $candidats = Candidat::where('agence_id', $agenceId)->latest()->get();
        return view('agence_admin.paiements.create', compact( 'service', 'candidats'));
    }

    public function create()
    {
        $agenceId = AdminHelpers::getAdminAgenceId();
        $candidats = Candidat::where('agence_id', $agenceId)->latest()->get();
        $services = Service::where('agence_id', $agenceId)->latest()->get();
        return view('agence_admin.paiements.portal', compact( 'services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'candidat_id' => 'required|exists:candidats,id',
            'montant' => 'required|numeric',
            'date_paiement' => 'required|date',
            'mode_paiement' => 'required|string',
            'observation' => 'nullable|string',
            'service_id' => 'required|exists:services,id',
        ]);

        try {
            Paiement::create($validated);
            Alert::success('Succès', 'Paiement enregistré avec succès');
            return redirect()->route('adm_agc_paiements.index');
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Une erreur est survenue');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }

    public function edit($id)
    {
        $paiement = Paiement::find($id);
        $agenceId = AdminHelpers::getAdminAgenceId();
        $services = Service::where('agence_id', $agenceId)->latest()->get();
        $candidats = Candidat::where('agence_id', $agenceId)->latest()->get();
        return view('agence_admin.paiements.edit', compact('paiement', 'candidats', 'services'));
    }

    public function update(Request $request, Paiement $paiement)
    {
        $validated = $request->validate([
            'candidat_id' => 'required|exists:candidats,id',
            'montant' => 'required|numeric',
            'date_paiement' => 'required|date',
            'mode_paiement' => 'nullable|string',
            'observation' => 'nullable|string',
            'service_id' => 'required|exists:services,id',
        ]);

        try {
            $paiement->update($validated);
            Alert::success('Succès', 'Paiement mis à jour avec succès');
            return redirect()->route('adm_agc_paiements.index');
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Échec de mise à jour');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }

    public function destroy(Paiement $paiement)
    {
        try {
            $paiement->delete();
            Alert::success('Supprimé', 'Paiement supprimé');
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Impossible de supprimer');
        }
        return redirect()->route('adm_agc_paiements.index');
    }
}
