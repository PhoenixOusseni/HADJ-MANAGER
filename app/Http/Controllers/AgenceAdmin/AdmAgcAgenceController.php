<?php

namespace App\Http\Controllers\AgenceAdmin;

use App\Models\User;
use App\Models\Agence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AdmAgcAgenceController extends Controller
{
    public function edit($id)
    {
        $users = User::all();
        $agence = Agence::findOrFail($id);
        return view('agence_admin.agences.edit', compact('agence', 'users'));
    }

    public function show($id){
        return 'Page en costruction';
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required',
            'email' => 'nullable|email',
            'telephone' => 'nullable',
            'siege' => 'nullable',
            'whatsapp' => 'nullable',
            'exter_phone' => 'nullable',
            'adress' => 'nullable',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $agence = Agence::findOrFail($id);

            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logoName = time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('agence/logo'), $logoName);
            }

            $agence->update([
                'libelle' => $request->libelle,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'siege' => $request->siege,
                'whatsapp' => $request->whatsapp,
                'exter_phone' => $request->exter_phone,
                'adress' => $request->adress,
                'logo' => $logoName ?? null,
            ]);
            Alert::success('Succès', 'Agence mise à jour avec succès.');
            return redirect()->route('adm_agc_agences.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Échec de la mise à jour.');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }
}
