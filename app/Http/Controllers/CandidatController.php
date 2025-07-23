<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Agence;
use App\Models\Service;
use App\Models\Candidat;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class CandidatController extends Controller
{
    public function index()
    {
        $candidats = Candidat::latest()->get();
        return view('admin.candidats.index', compact('candidats'));
    }

    public function create()
    {
        $agences = Agence::all();
        return view('admin.candidats.portal', compact('agences'));
    }

    public function form($id)
    {
        $agence = Agence::find($id);
        $services = Service::where('agence_id', $id)->latest()->get();
        $agents = Agent::where('agence_id', $id)->latest()->get();
        return view('admin.candidats.create', compact('agence', 'services', 'agents'));
    }

    public function list($id)
    {
        $agence = Agence::find($id);
        $candidats = Candidat::where('agence_id', $id)->latest()->get();
        return view('admin.candidats.index', compact('agence', 'candidats'));
    }

    public function genererIdentifiantsCandidat()
    {
        $idInscription = 'INS-' . date('Y') . '-' . strtoupper(Str::random(6));

        $officeCode = strtoupper(Str::random(4)) . rand(10, 99);

        return [
            'id_inscription' => $idInscription,
            'office_code' => $officeCode,
        ];
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'date_naissance' => 'nullable|date',
            'lieu_naissance' => 'nullable|string',
            'telephone' => 'nullable|string',
            'sexe' => 'required|in:Masculin,Feminin',
            'ville_province' => 'nullable|string',
            'type_piece' => 'required|in:CNIB,Passeport',
            'numero_piece' => 'nullable|string',
            'date_delivrance' => 'nullable|date',
            'date_expiration' => 'nullable|date',
            'nationalite' => 'nullable|string',
            'statut' => 'nullable|in:Provisoir,Définitif',
            'statut_paiement' => 'nullable|in:Non payé,Paiement partiel,Tout payé',
            'observation' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'agent_id' => 'nullable|exists:agents,id',
            'service_id' => 'nullable|exists:services,id',
            'agence_id' => 'required|exists:agences,id',
        ]);

        try {
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('candidat/photo'), $photoName);
                $validated['photo'] = $photoName;
            }

            $codes = $this->genererIdentifiantsCandidat();

            $validated['id_inscription'] = $codes['id_inscription'];
            $validated['office_code'] = $codes['office_code'];

            Candidat::create($validated);

            Alert::success('Succès', 'Candidat enregistré');
            return redirect()->route('candidats.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Échec de l\'enregistrement');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }

    public function edit($id)
    {
        $candidat = Candidat::where('id', $id)->first();
        $agents = Agent::all();
        $services = Service::all();
        $agences = Agence::all();
        return view('admin.candidats.edit', compact('candidat', 'agents', 'services', 'agences'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'date_naissance' => 'nullable|date',
            'lieu_naissance' => 'nullable|string',
            'telephone' => 'nullable|string',
            'sexe' => 'required|in:Masculin,Feminin',
            'ville_province' => 'nullable|string',
            'type_piece' => 'required|in:CNIB,Passeport',
            'numero_piece' => 'nullable|string',
            'date_delivrance' => 'nullable|date',
            'date_expiration' => 'nullable|date',
            'nationalite' => 'nullable|string',
            'statut' => 'nullable|in:Provisoir,Définitif',
            'statut_paiement' => 'nullable|in:Non payé,Paiement partiel,Tout payé',
            'observation' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'agent_id' => 'nullable|exists:agents,id',
            'service_id' => 'nullable|exists:services,id',
            'agence_id' => 'required|exists:agences,id',
        ]);

        try {
            $candidat = Candidat::find($id);

            if (!$candidat) {
                Alert::error('Erreur', 'Candidat introuvable');
                return redirect()->route('candidats.index');
            }

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('candidat/photo'), $photoName);
                $validated['photo'] = $photoName;
            }

            $candidat->fill($validated)->save();

            Alert::success('Succès', 'Candidat mis à jour');
            return redirect()->route('candidats.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Mise à jour échouée');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }

    public function show($id)
    {
        $candidat = Candidat::find($id);
        // $customPaper = [0, 0, 283, 398];
        // return PDF::loadView('admin.candidats.badges', compact('candidat'))
        // ->setPaper($customPaper, 'portrait')
        // ->stream('badge.pdf');
        return view('admin.candidats.show', compact('candidat'));
    }

    public function destroy($id)
    {
        try {
            DB::table('candidats')->where('id', $id)->delete();
            Alert::success('Supprimé', 'Candidat supprimé');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Impossible de supprimer ce candidat');
        }

        return redirect()->route('candidats.index');
    }
}
