<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Agence;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('agence')->latest()->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $agences = Agence::all();
        return view('admin.services.portal', compact('agences'));
    }

    public function form($id)
    {
        $agence = Agence::find($id);
        return view('admin.services.create', compact('agence'));
    }

    public function list($id)
    {
        $agence = Agence::find($id);
        $services = Service::where('agence_id', $id)->latest()->get();
        return view('admin.services.index', compact('agence', 'services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'libelle' => 'required|string',
            'cout' => 'required|numeric',
            'categorie' => 'required|string',
            'agence_id' => 'required|exists:agences,id',
            'edition' => 'required|string',
            'observation' => 'nullable|string',
        ]);

        try {
            Service::create($validated);
            Alert::success('Succès', 'Service créé avec succès.');
            return redirect()->route('services.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Erreur lors de la création.');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        $agences = Agence::all();
        return view('admin.services.edit', compact('service', 'agences'));
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
            return redirect()->route('services.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Échec de la mise à jour.');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }

    public function show(String $id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.show', compact('service'));
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

        return redirect()->route('services.index');
    }
}
