<?php

namespace App\Http\Controllers\AgenceAdmin;

use App\Models\Hotel;
use App\Models\Agence;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Helpers\AdminHelpers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AdmAgcHotelController extends Controller
{
    public function index()
    {
        $agenceId = AdminHelpers::getAdminAgenceId();
        $hotels = Hotel::where('agence_id', $agenceId)->latest()->get();
        return view('agence_admin.hotels.index', compact('hotels'));
    }

    public function show($id)
    {
        $hotel = Hotel::find($id);
        return view('agence_admin.hotels.show', compact('hotel'));
    }

    public function form($id)
    {
        $service = Service::find($id);
        return view('agence_admin.hotels.create', compact( 'service'));
    }

    public function create()
    {
        $agenceId = AdminHelpers::getAdminAgenceId();
        $services = Service::where('agence_id', $agenceId)->latest()->get();
        return view('agence_admin.hotels.portal', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string',
            'ville' => 'nullable|string',
            'quartier' => 'nullable|string',
            'adresse' => 'nullable|string',
            'telephone' => 'nullable|string',
            'email' => 'nullable|email',
            'contact_responsable' => 'nullable|string',
            'debut' => 'nullable|string',
            'fin' => 'nullable|string',
            'nombre_chambre' => 'nullable|numeric',
            'nombre_lit' => 'nullable|numeric',
            'service_id' => 'required|exists:services,id',
        ]);

        try {
            $agenceId = AdminHelpers::getAdminAgenceId();
            $validated['code_contrat'] = 'HOT-' . $agenceId . '-' . uniqid();
            $validated['agence_id'] = $agenceId;
            Hotel::create($validated);
            Alert::success('Succès', 'Hôtel ajouté avec succès.');
            return redirect()->route('adm_agc_hotels.index');
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Une erreur est survenue.');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }

    public function edit($id)
    {
        $hotel = Hotel::find($id);
        $agenceId = AdminHelpers::getAdminAgenceId();
        $services = Service::where('agence_id', $agenceId)->latest()->get();
        return view('agence_admin.hotels.edit', compact('hotel', 'services'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required|string',
            'ville' => 'nullable|string',
            'quartier' => 'nullable|string',
            'adresse' => 'nullable|string',
            'telephone' => 'nullable|string',
            'email' => 'nullable|email',
            'contact_responsable' => 'nullable|string',
            'debut' => 'nullable|string',
            'fin' => 'nullable|string',
            'nombre_chambre' => 'nullable|string',
            'nombre_lit' => 'nullable|string',
            'service_id' => 'required|exists:services,id',
        ]);

        try {
            $hotel = Hotel::findOrFail($id);
            $hotel->update($validated);
            Alert::success('Succès', 'Hôtel mis à jour avec succès.');
            return redirect()->route('adm_agc_hotels.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Une erreur est survenue lors de la mise à jour.');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }

    public function destroy(Hotel $hotel)
    {
        try {
            $hotel->delete();
            Alert::success('Succès', 'Hôtel supprimé avec succès.');
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Échec de la suppression.');
        }
        return redirect()->route('adm_agc_hotels.index');
    }
}
