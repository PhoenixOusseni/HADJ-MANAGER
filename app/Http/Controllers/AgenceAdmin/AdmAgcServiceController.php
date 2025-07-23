<?php

namespace App\Http\Controllers\AgenceAdmin;

use App\Models\Agence;
use App\Models\Service;
use App\Models\Candidat;
use Illuminate\Http\Request;
use App\Helpers\AdminHelpers;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AdmAgcServiceController extends Controller
{
    public function index()
    {
        $agenceId = AdminHelpers::getAdminAgenceId();
        $services = Service::where('agence_id', $agenceId)->latest()->get();
        return view('agence_admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('agence_admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'libelle' => 'required|string',
            'cout' => 'required|numeric',
            'categorie' => 'required|string',
            'edition' => 'nullable|string',
            'observation' => 'nullable|string',
        ]);

        try {
            $agenceId = AdminHelpers::getAdminAgenceId();
            $validated['agence_id'] = $agenceId;
            Service::create($validated);
            Alert::success('Succès', 'Service créé avec succès.');
            return redirect()->route('adm_agc_services.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Erreur lors de la création.');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }

    public function show($id){
        $service = Service::findOrFail($id);

        $agence = AdminHelpers::getAdminAgence();
        $agenceId = AdminHelpers::getAdminAgenceId();
        $candidats = Candidat::where('agence_id', $agenceId)->latest()->get();
        return view('agence_admin.services.show', compact('service', 'candidats'));
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('agence_admin.services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'libelle' => 'required|string',
            'cout' => 'required|numeric',
            'categorie' => 'required|string',
            'edition' => 'nullable|string',
            'observation' => 'nullable|string',
        ]);

        try {
            $service = Service::findOrFail($id);
            $service->update($validated);
            Alert::success('Succès', 'Service mis à jour.');
            return redirect()->route('adm_agc_services.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Échec de la mise à jour.');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $service = Service::findOrFail($id);
            $service->delete();
            Alert::success('Supprimé', 'Service supprimé avec succès.');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Impossible de supprimer ce service.');
        }

        return redirect()->route('adm_agc_services.index');
    }
}
