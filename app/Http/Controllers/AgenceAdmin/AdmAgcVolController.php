<?php

namespace App\Http\Controllers\AgenceAdmin;

use App\Models\Vol;
use App\Models\Agence;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Helpers\AdminHelpers;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AdmAgcVolController extends Controller
{
    public function index()
    {
        $agenceId = AdminHelpers::getAdminAgenceId();
        $vols = Vol::where('agence_id', $agenceId)->latest()->get();
        return view('agence_admin.vols.index', compact('vols'));
    }

    public function form($id)
    {
        $service = Service::find($id);
        return view('agence_admin.vols.create', compact( 'service'));
    }

    public function create()
    {
        $agenceId = AdminHelpers::getAdminAgenceId();
        $services = Service::where('agence_id', $agenceId)->latest()->get();
        return view('agence_admin.vols.portal', compact('services'));
    }

    public function show($id)
    {
        $vol = Vol::find($id);
        return view('agence_admin.vols.show', compact('vol'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'compagnie' => 'required|string',
            'type_vol' => 'required|string',
            'numero_vol' => 'required|string',
            'ville_depart_aller' => 'required|string',
            'ville_arrivee_aller' => 'required|string',
            'date_heure_depart_aller' => 'required|date',
            'date_heure_arrivee_aller' => 'required|date',
            'ville_depart_retour' => 'nullable|string',
            'ville_arrivee_retour' => 'nullable|string',
            'date_heure_depart_retour' => 'nullable|date',
            'date_heure_arrivee_retour' => 'nullable|date',
            'quota' => 'required|integer',
            'convocation' => 'nullable|string',
            'service_id' => 'required|exists:services,id',
        ]);

        try {
            $agenceId = AdminHelpers::getAdminAgenceId();
            $validated['agence_id'] = $agenceId;
            Vol::create($validated);
            Alert::success('Succès', 'Vol enregistré avec succès.');
            return redirect()->route('adm_agc_vols.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Erreur lors de l\'enregistrement.');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }

    public function edit($id)
    {
        $agenceId = AdminHelpers::getAdminAgenceId();
        $services = Service::where('agence_id', $agenceId)->get();
        $vol = Vol::findOrFail($id);
        return view('agence_admin.vols.edit', compact('vol', 'services'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'compagnie' => 'required|string',
            'type_vol' => 'required|string',
            'numero_vol' => 'required|string',
            'ville_depart_aller' => 'required|string',
            'ville_arrivee_aller' => 'required|string',
            'date_heure_depart_aller' => 'required|date',
            'date_heure_arrivee_aller' => 'required|date',
            'ville_depart_retour' => 'nullable|string',
            'ville_arrivee_retour' => 'nullable|string',
            'date_heure_depart_retour' => 'nullable|date',
            'date_heure_arrivee_retour' => 'nullable|date',
            'quota' => 'required|integer',
            'convocation' => 'nullable|string',
        ]);

        try {
            $vol = Vol::findOrFail($id);
            $vol->update($validated);
            Alert::success('Succès', 'Vol mis à jour avec succès.');
            return redirect()->route('adm_agc_vols.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Erreur lors de la mise à jour.');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $vol = Vol::findOrFail($id);
            $vol->delete();
            Alert::success('Succès', 'Vol supprimé.');
            return redirect()->route('adm_agc_vols.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Erreur lors de la suppression.');
            return back();
        }
    }
}
