<?php

namespace App\Http\Controllers\AgenceAdmin;

use App\Models\Car;
use App\Models\Agence;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Helpers\AdminHelpers;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AdmAgcCarController extends Controller
{
    public function index()
    {
        $agenceId = AdminHelpers::getAdminAgenceId();
        $cars = Car::where('agence_id', $agenceId)->latest()->get();
        return view('agence_admin.cars.index', compact('cars'));
    }

    public function form($id)
    {
        $service = Service::find($id);
        return view('agence_admin.cars.create', compact( 'service'));
    }

    public function create()
    {
        $agenceId = AdminHelpers::getAdminAgenceId();
        $services = Service::where('agence_id', $agenceId)->latest()->get();
        return view('agence_admin.cars.portal', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'compagnie' => 'required|string',
            'numero' => 'required|string',
            'place' => 'required|integer',
            'statut' => 'required|in:Disponible,Indisponible',
            'service_id' => 'required|exists:services,id',
        ]);

        try {
            $agenceId = AdminHelpers::getAdminAgenceId();
            $validated['agence_id'] = $agenceId;
            Car::create($validated);
            Alert::success('Succès', 'Véhicule enregistré');
            return redirect()->route('adm_agc_cars.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Erreur d\'enregistrement');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }

    public function show($id){
        $car = Car::find($id);
        return view('agence_admin.cars.show', compact('car'));
    }
    
    public function edit($id)
    {
        $car = Car::find($id);
        $agenceId = AdminHelpers::getAdminAgenceId();
        $services = Service::where('agence_id', $agenceId)->latest()->get();
        return view('agence_admin.cars.edit', compact('car', 'services'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'compagnie' => 'required|string',
            'numero' => 'required|string',
            'place' => 'required|integer',
            'statut' => 'required|in:Disponible,Indisponible',
            'service_id' => 'required|exists:services,id',
        ]);

        try {
            $car = Car::findOrFail($id);
            $car->update($validated);

            Alert::success('Succès', 'Véhicule mis à jour');
            return redirect()->route('adm_agc_cars.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Erreur de mise à jour');
            // return back()->withInput()->withErrors([
            //     'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            // ]);
            return $e->getMessage();
        }
    }


    public function destroy(Car $car)
    {
        try {
            $car->delete();
            Alert::success('Supprimé', 'Véhicule supprimé');
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Suppression échouée');
        }
        return redirect()->route('adm_agc_cars.index');
    }
}
