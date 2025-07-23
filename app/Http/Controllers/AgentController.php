<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Agence;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AgentController extends Controller
{
    public function index()
    {
        $agents = Agent::with('agence')->latest()->get();
        return view('admin.agents.index', compact('agents'));
    }

    public function create()
    {
        $agences = Agence::all();
        return view('admin.agents.portal', compact('agences'));
    }

    public function form($id)
    {
        $agence = Agence::find($id);
        $services = Service::where('agence_id', $id)->latest()->get();
        return view('admin.agents.create', compact('agence', 'services'));
    }

    public function list($id)
    {
        $agence = Agence::find($id);
        $agents = Agent::where('agence_id', $id)->latest()->get();
        return view('admin.agents.index', compact('agence', 'agents'));
    }

    public function show(Agent $agent)
    {
        return view('admin.agents.show', compact('agent'));
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
            'agence_id' => 'required|exists:agences,id',
            'email' => 'nullable|email',
            'telephone' => 'nullable',
            'date_naissance' => 'nullable',
            'residence' => 'nullable',
            'service_id' => 'required|exists:services,id',
        ]);

        try {
            $agent = new Agent();
            $agent->code = $this->generateAgentCode();
            $agent->nom = $request->nom;
            $agent->prenom = $request->prenom;
            $agent->statut = $request->statut;
            $agent->agence_id = $request->agence_id;
            $agent->email = $request->email;
            $agent->telephone = $request->telephone;
            $agent->date_naissance = $request->date_naissance;
            $agent->residence = $request->residence;
            $agent->save();

            Alert::success('Succès', 'Agent enregistré');
            return redirect()->route('agents.index');
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
        $agences = Agence::all();
        $services = Service::where('agence_id', $agent->agence->id)->latest()->get();
        return view('admin.agents.edit', compact('agent', 'agences', 'services'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'statut' => 'required|in:Facilitateur,Délégué',
            'agence_id' => 'required|exists:agences,id',
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
            $agent->agence_id = $request->agence_id;
            $agent->email = $request->email;
            $agent->telephone = $request->telephone;
            $agent->date_naissance = $request->date_naissance;
            $agent->residence = $request->residence;
            $agent->save();

            Alert::success('Succès', 'Agent mis à jour');
            return redirect()->route('agents.index');
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

        return redirect()->route('agents.index');
    }
}
