<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Agence;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AgenceController extends Controller
{
    public function index()
    {
        $agences = Agence::latest()->get();
        return view('admin.agences.index', compact('agences'));
    }

    public function create()
    {
        $role = Role::where('nom', 'AdministrateurAgence')->first();
        $users = $role->users()->whereDoesntHave('agence')->get();
        return view('admin.agences.create', compact('users'));
    }

    public function show(Agence $agence)
    {
        return view('admin.agences.show', compact('agence'));
    }

    private function generateAgenceCode()
    {
        $prefix = 'AG-';
        $number = str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT);

        do {
            $code = $prefix . $number;
            $exists = Agence::where('code', $code)->exists();
            if ($exists) {
                $number = str_pad(rand(1, 99999), 5, '0', STR_PAD_LEFT);
            }
        } while ($exists);

        return $code;
    }

    public function store(Request $request)
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
            'admin_id' => 'required|exists:users,id',
        ]);

        $admin = Agence::where('admin_id', $request->admin_id)->exists();
        if ($admin) {
            Alert::error('Erreur', 'Cet utilisateur est déjà administrateur d’une autre agence.');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }

        try {
            $agence = new Agence();

            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $logoName = time() . '.' . $logo->getClientOriginalExtension();
                $logo->move(public_path('agence/logo'), $logoName);
                $agence->logo = $logoName;
            }

            $agence->libelle = $request->libelle;
            $agence->email = $request->email;
            $agence->telephone = $request->telephone;
            $agence->siege = $request->siege;
            $agence->whatsapp = $request->whatsapp;
            $agence->exter_phone = $request->exter_phone;
            $agence->adress = $request->adress;
            $agence->admin_id = $request->admin_id;
            $agence->code = $this->generateAgenceCode();

            

            $agence->save();
            Alert::success('Succès', 'Agence créée avec succès.');
            return redirect()->route('agences.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Une erreur est survenue lors de la création.');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }
    public function edit($id)
    {
        $users = User::all();
        $agence = Agence::findOrFail($id);
        return view('admin.agences.edit', compact('agence', 'users'));
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
            'admin_id' => 'required|exists:users,id',
        ]);

        $agence = Agence::findOrFail($id);
        $admin = Agence::where('admin_id', $request->admin_id)->exists();

        if ($admin != $agence->admin_id) {
            Alert::error('Erreur', 'Cet utilisateur est déjà administrateur d’une autre agence.');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }

        try {

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
            return redirect()->route('agences.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Échec de la mise à jour.');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }

    public function complete(Request $request, $id)
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
                $logoName = time() . '.' . $request->logo->extension();
                $request->logo->move(public_path('agence/logo'), $logoName);
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
            return redirect()->route('agences.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Échec de la mise à jour.');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $agence = Agence::findOrFail($id);
            $agence->delete();
            Alert::success('Supprimé', 'Agence supprimée avec succès.');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Impossible de supprimer cette agence.');
        }

        return redirect()->route('agences.index');
    }
}
