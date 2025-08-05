<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Service;
use App\Models\Candidat;
use App\Models\Paiement;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use RealRashid\SweetAlert\Facades\Alert;

class PaiementController extends Controller
{
    public function index()
    {
        $paiements = Paiement::with('candidat')->latest()->get();
        return view('admin.paiements.index', compact('paiements'));
    }

    public function date_filter(Request $request)
    {
        $date_debut = $request->date_debut;
        $date_fin = $request->date_fin;

        $collection = Paiement::whereDate('created_at', '>=', $date_debut)->whereDate('created_at', '<=', $date_fin)->get();
        $total = $collection->sum('total');

        return view('admin.paiements.paiement', compact('collection', 'total'));
    }

    public function create()
    {
        $agences = Agence::all();
        $candidats = Candidat::all();
        return view('admin.paiements.portal', compact('candidats', 'agences'));
    }

    public function form($id)
    {
        $agence = Agence::find($id);
        $services = Service::where('agence_id', $id)->latest()->get();
        $candidats = Candidat::where('agence_id', $id)->latest()->get();
        return view('admin.paiements.create', compact('agence', 'services', 'candidats'));
    }

    public function list($id)
    {
        $agence = Agence::find($id);
        $paiements = $agence->paiements;
        return view('admin.paiements.index', compact('agence', 'paiements'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'candidat_id' => 'required|exists:candidats,id',
            'montant' => 'required|numeric',
            'date_paiement' => 'required|date',
            'mode_paiement' => 'nullable',
            'observation' => 'nullable',
            'service_id' => 'required|exists:services,id',
        ]);

        try {
            Paiement::create($validated);
            Alert::success('Succès', 'Paiement enregistré avec succès');
            return redirect()->route('paiements.index');
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Une erreur est survenue');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }

    public function edit(Paiement $paiement)
    {
        $candidats = Candidat::all();
        return view('admin.paiements.edit', compact('paiement', 'candidats'));
    }

    public function update(Request $request, Paiement $paiement)
    {
        $validated = $request->validate([
            'candidat_id' => 'required|exists:candidats,id',
            'montant' => 'required|numeric',
            'date_paiement' => 'required|date',
            'mode_paiement' => 'nullable',
            'observation' => 'nullable',
            'service_id' => 'required|exists:services,id',
        ]);

        try {
            $paiement->update($validated);
            Alert::success('Succès', 'Paiement mis à jour avec succès');
            return redirect()->route('paiements.index');
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Échec de mise à jour');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }

    public function show(Paiement $paiement)
    {
        return view('admin.paiements.show', compact('paiement'));
    }

    public function destroy(Paiement $paiement)
    {
        try {
            $paiement->delete();
            Alert::success('Supprimé', 'Paiement supprimé');
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Impossible de supprimer');
        }
        return redirect()->route('paiements.index');
    }
}
