<?php

namespace App\Http\Controllers\AgenceAdmin;

use App\Models\Service;
use App\Models\Candidat;
use App\Models\Paiement;
use Illuminate\Http\Request;
use App\Helpers\AdminHelpers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use NumberFormatter;
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
        return view('agence_admin.paiements.create', compact('service', 'candidats'));
    }

    public function create()
    {
        $agenceId = AdminHelpers::getAdminAgenceId();
        $candidats = Candidat::where('agence_id', $agenceId)->latest()->get();
        $services = Service::where('agence_id', $agenceId)->latest()->get();
        return view('agence_admin.paiements.portal', compact('services'));
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

    public function update(Request $request, $id)
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
            $paiement = Paiement::find($id);
            $paiement->update([
                'candidat_id' => $validated['candidat_id'],
                'montant' => $validated['montant'],
                'date_paiement' => $validated['date_paiement'],
                'mode_paiement' => $validated['mode_paiement'],
                'observation' => $validated['observation'],
                'service_id' => $validated['service_id'],
            ]);
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

    public function print($id)
    {
        $paiement = Paiement::find($id);
        $data = [
            'paiement' => $paiement,
        ];

        $logoPath = public_path('main/assets/images/logo/icone.jpg');
        $logoData = ($logoPath) ? file_get_contents($logoPath) : null;
        $logoSrc = 'data:image/png;base64,' . $logoData;

        $total = Paiement::where('candidat_id', $paiement->candidat_id)
            ->where('service_id', $paiement->service_id)
            ->sum('montant');
        $remain = $paiement->service->cout - $total;

        $pdf = PDF::loadView('agence_admin.paiements.pdf', compact('logoPath', 'paiement', 'total', 'remain'));
        return $pdf->download('facture.pdf');
    }
}
