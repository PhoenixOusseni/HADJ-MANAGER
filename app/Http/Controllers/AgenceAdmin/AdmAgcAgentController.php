<?php

namespace App\Http\Controllers\AgenceAdmin;

use App\Models\Agent;
use App\Models\Agence;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Helpers\AdminHelpers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdmAgcAgentController extends Controller
{
    public function index()
    {
        $agence = AdminHelpers::getAdminAgence();
        $agenceId = AdminHelpers::getAdminAgenceId();

        $agents = Agent::where('agence_id', $agenceId)->latest()->get();
        return view('agence_admin.agents.index', compact('agents'));
    }

    public function form($id)
    {
        $service = Service::find($id);
        return view('agence_admin.agents.create', compact( 'service'));
    }

    public function create()
    {
        $agenceId = AdminHelpers::getAdminAgenceId();
        $services = Service::where('agence_id', $agenceId)->latest()->get();
        return view('agence_admin.agents.portal', compact('services'));
    }

    public function show($id){
        $agent = Agent::find($id);
        return view('agence_admin.agents.show', compact('agent'));
    }

    private function generateAgentCode()
    {
        $prefix = 'AGT-';
        $number = str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT);

        do {
            $code = $prefix . $number;
            $exists = Agent::where('code', $code)->exists();
            if ($exists) {
                $number = str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT);
            }
        } while ($exists);

        return $code;
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'statut' => 'required|in:Facilitateur,Délégué',
            'email' => 'nullable|email',
            'telephone' => 'nullable',
            'date_naissance' => 'nullable',
            'residence' => 'nullable',
            'service_id' => 'required|exists:services,id',
        ]);

        try {
            $agenceId = AdminHelpers::getAdminAgenceId();

            $agent = new Agent();
            $agent->code = $this->generateAgentCode();
            $agent->nom = $request->nom;
            $agent->prenom = $request->prenom;
            $agent->statut = $request->statut;
            $agent->agence_id = $agenceId;
            $agent->email = $request->email;
            $agent->telephone = $request->telephone;
            $agent->date_naissance = $request->date_naissance;
            $agent->residence = $request->residence;
            $agent->service_id = $request->service_id;
            $agent->save();

            Alert::success('Succès', 'Agent enregistré');
            return redirect()->route('adm_agc_agents.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Échec de l\'enregistrement');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }

    public function edit($id)
    {
        $agent = Agent::find($id);
        $agenceId = AdminHelpers::getAdminAgenceId();
        $services = Service::where('agence_id', $agenceId)->latest()->get();
        return view('agence_admin.agents.edit', compact('agent', 'services'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'statut' => 'required|in:Facilitateur,Délégué',
            'email' => 'nullable|email',
            'telephone' => 'nullable',
            'date_naissance' => 'nullable',
            'residence' => 'nullable',
            'service_id' => 'required|exists:services,id',
        ]);

        try {
            $agent = Agent::find($id);
            $agent->nom = $request->nom;
            $agent->prenom = $request->prenom;
            $agent->statut = $request->statut;
            $agent->email = $request->email;
            $agent->telephone = $request->telephone;
            $agent->date_naissance = $request->date_naissance;
            $agent->residence = $request->residence;
            $agent->save();

            Alert::success('Succès', 'Agent mis à jour');
            return redirect()->route('adm_agc_agents.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Échec de la mise à jour');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            DB::table('agents')->where('id', $id)->delete();
            Alert::success('Supprimé', 'Agent supprimé');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Impossible de supprimer cet agent');
        }

        return redirect()->route('adm_agc_agents.index');
    }
}
