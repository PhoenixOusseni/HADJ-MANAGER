<?php

namespace App\Http\Controllers;

use App\Models\Vol;
use App\Models\Agence;
use App\Models\Service;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class VolController extends Controller
{
    public function index()
    {
        $vols = Vol::latest()->get();
        return view('admin.vols.index', compact('vols'));
    }

    public function create()
    {
        $agences = Agence::all();
        return view('admin.vols.portal', compact('agences'));
    }

    public function form($id)
    {
        $agence = Agence::find($id);
        $services = Service::where('agence_id', $id)->latest()->get();
        return view('admin.vols.create', compact('agence', 'services'));
    }

    public function list($id)
    {
        $agence = Agence::find($id);
        $vols = vol::where('agence_id', $id)->latest()->get();
        return view('admin.vols.index', compact('agence', 'vols'));
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
            'agence_id' => 'required|exists:agences,id',
            'service_id' => 'required|exists:services,id',
        ]);

        try {
            Vol::create($validated);
            Alert::success('Succès', 'Vol enregistré avec succès.');
            return redirect()->route('vols.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Erreur lors de l\'enregistrement.');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }

    public function edit($id)
    {
        $vol = Vol::findOrFail($id);
        $agences = Agence::all();
        $agence = $vol->agence;
        $services = $agence->services;
        return view('admin.vols.edit', compact('vol', 'agences', 'agence', 'services'));
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
            'agence_id' => 'required|exists:agences,id',
            'service_id' => 'required|exists:services,id',
        ]);

        try {
            $vol = Vol::findOrFail($id);
            $vol->update($validated);
            Alert::success('Succès', 'Vol mis à jour avec succès.');
            return redirect()->route('vols.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Erreur lors de la mise à jour.');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }

    public function show($id)
    {
        $vol = Vol::find($id);
        return view('admin.vols.show', compact('vol'));
    }

    public function destroy($id)
    {
        try {
            $vol = Vol::findOrFail($id);
            $vol->delete();
            Alert::success('Succès', 'Vol supprimé.');
            return redirect()->route('vols.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Erreur lors de la suppression.');
            return back();
        }
    }
}
