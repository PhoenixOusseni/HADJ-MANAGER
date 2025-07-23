<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Agence;
use App\Models\Service;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with('agence')->latest()->get();
        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        $agences = Agence::all();
        return view('admin.cars.portal', compact('agences'));
    }

    public function form($id)
    {
        $agence = Agence::find($id);
        $services = Service::where('agence_id', $id)->latest()->get();
        return view('admin.cars.create', compact('agence', 'services'));
    }

    public function list($id)
    {
        $agence = Agence::find($id);
        $cars = Car::where('agence_id', $id)->latest()->get();
        return view('admin.cars.index', compact('agence', 'cars'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'compagnie' => 'required|string',
            'numero' => 'required|string',
            'place' => 'required|integer',
            'statut' => 'required|in:Disponible,Indisponible',
            'agence_id' => 'required|exists:agences,id',
            'service_id' => 'required|exists:services,id',
        ]);

        try {
            Car::create($validated);
            Alert::success('Succès', 'Véhicule enregistré');
            return redirect()->route('cars.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Erreur d\'enregistrement');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }

    public function edit(Car $car)
    {
        $agences = Agence::all();
        $agence = Agence::find($car->agence_id);
        $services = Service::where('agence_id', $agence->id)->latest()->get();
        return view('admin.cars.edit', compact('car', 'agences', 'services'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'compagnie' => 'required|string',
            'numero' => 'required|string',
            'place' => 'required|integer',
            'statut' => 'required|in:Disponible,Indisponible',
            'agence_id' => 'required|exists:agences,id',
            'service_id' => 'required|exists:services,id',
        ]);

        try {
            $car = Car::findOrFail($id);
            $car->update($validated);

            Alert::success('Succès', 'Véhicule mis à jour');
            return redirect()->route('cars.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Erreur de mise à jour');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }

    public function show(Car $car){
        return view('admin.cars.show', compact('car'));
    }


    public function destroy(Car $car)
    {
        try {
            $car->delete();
            Alert::success('Supprimé', 'Véhicule supprimé');
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Suppression échouée');
        }
        return redirect()->route('cars.index');
    }
}
