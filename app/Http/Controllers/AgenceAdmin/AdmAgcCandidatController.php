<?php

namespace App\Http\Controllers\AgenceAdmin;

use App\Models\Agent;
use App\Models\Agence;
use App\Models\Service;
use App\Models\Candidat;
use App\Models\Paiement;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\AdminHelpers;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AdmAgcCandidatController extends Controller
{
    public function index()
    {
        $agence = AdminHelpers::getAdminAgence();
        $agenceId = AdminHelpers::getAdminAgenceId();
        $candidats = Candidat::where('agence_id', $agenceId)->latest()->get();
        return view('agence_admin.candidats.index', compact('candidats'));
    }

    public function form($id)
    {
        $service = Service::find($id);
        $agence = AdminHelpers::getAdminAgence();
        $agenceId = AdminHelpers::getAdminAgenceId();
        $agents = Agent::where('agence_id', $agenceId)->latest()->get();
        return view('agence_admin.candidats.create', compact( 'service', 'agents'));
    }

    public function create()
    {
        $agence = AdminHelpers::getAdminAgence();
        $agenceId = AdminHelpers::getAdminAgenceId();
        $agents = Agent::where('agence_id', $agenceId)->latest()->get();
        $services = Service::where('agence_id', $agenceId)->latest()->get();
        return view('agence_admin.candidats.portal', compact('agents', 'services'));
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
            'photo' => 'nullable|image|mimes:jpeg,png,jpg',
            'agent_id' => 'nullable|exists:agents,id',
            'service_id' => 'nullable|exists:services,id',
        ]);

        try {
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('candidat/photo'), $photoName);
                $validated['photo'] = $photoName;
            }

            $codes = $this->genererIdentifiantsCandidat();

            $agenceId = AdminHelpers::getAdminAgenceId();
            $validated['agence_id'] = $agenceId;
            $validated['id_inscription'] = $codes['id_inscription'];
            $validated['office_code'] = $codes['office_code'];
            $validated['office_code'] = $codes['office_code'];

            Candidat::create($validated);

            Alert::success('Succès', 'Candidat enregistré');
            return redirect()->route('adm_agc_candidats.index');
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
        $agence = AdminHelpers::getAdminAgence();
        $agenceId = AdminHelpers::getAdminAgenceId();
        $agents = Agent::where('agence_id', $agenceId)->latest()->get();
        $services = Service::where('agence_id', $agenceId)->latest()->get();
        return view('agence_admin.candidats.edit', compact('candidat', 'agents', 'services'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $this->validate($request, [
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
                'photo' => 'nullable|image|mimes:jpeg,png,jpg',
                'agent_id' => 'nullable|exists:agents,id',
                'service_id' => 'nullable|exists:services,id',
            ]);

            $candidat = Candidat::find($id);

            if (!$candidat) {
                Alert::error('Erreur', 'Candidat introuvable');
                return redirect()->route('adm_agc_candidats.index');
            }

            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoName = uniqid() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('candidat/photo'), $photoName);
                $validated['photo'] = $photoName;
            }

            $candidat->fill($validated)->save();

            Alert::success('Succès', 'Candidat mis à jour');
            return redirect()->route('adm_agc_candidats.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Mise à jour échouée');
            return back()->withInput()->with('error', $e->getMessage());
        }
    }

    public function show($id)
    {
        $candidat = Candidat::find($id);
        $total = Paiement::where('candidat_id', $candidat->id)
            ->where('service_id', $candidat->service_id)
            ->sum('montant');
        $remain = $candidat->service->cout - $total;
        $paiements = $candidat->paiements()->latest()->get();

        return view('agence_admin.candidats.show', compact('candidat', 'paiements', 'total', 'remain'));
    }

    public function destroy($id)
    {
        try {
            DB::table('candidats')->where('id', $id)->delete();
            Alert::success('Supprimé', 'Candidat supprimé');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Impossible de supprimer ce candidat');
        }

        return redirect()->route('adm_agc_candidats.index');
    }
}
