<?php

namespace App\Http\Controllers\AgenceAdmin;

use App\Models\Administrateur;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\AdminHelpers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdmAgcUserController extends Controller
{
    public function index()
    {
        $agenceId = AdminHelpers::getAdminAgenceId();
        $users = $agenceId ? User::where('agence_id', $agenceId)->latest()->get() : null;

        return view('agence_admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('agence_admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'email' => 'nullable|email|unique:users,email',
            'telephone' => 'nullable|string',
            'photo' => 'nullable|image',
            'statut' => 'nullable|in:Actif,Inactif',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'service_id' => 'required|exists:services,id',
        ]);

        try {
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoName = time() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('users/photos'), $photoName);
                $validated['photo'] = $photoName;
            }

            $role = Role::where('nom', 'Administrateur')->first();
            $agenceId = AdminHelpers::getAdminAgenceId();

            DB::table('users')->insert([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'username' => $request->username,
                'email' => $request->email,
                'telephone' => $request->telephone,
                'statut' => $request->statut,
                'role_id' => $role->id,
                'photo' => $validated['photo'] ?? null,
                'agence_id' => $agenceId,
                'password' => Hash::make($request->password),
            ]);

            $admin  = new Administrateur();
            $admin->nom = $request->nom;
            $admin->prenom = $request->prenom;
            $admin->username = $request->username;
            $admin->email = $request->email;
            $admin->telephone = $request->telephone;
            $admin->service_id = $request->service_id;
            $admin->agence_id = $agenceId;
            $admin->save();

            Alert::success('Succès', 'Utilisateur créé avec succès.');
            return redirect()->route('adm_agc_utilisateurs.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Erreur lors de l\'enregistrement.');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('agence_admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('agence_admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'username' => 'required|string|unique:users,username,' . $id,
            'email' => 'nullable|email|unique:users,email,' . $id,
            'telephone' => 'nullable|string',
            'password' => 'nullable|string|confirmed',
            'photo' => 'nullable|image',
            'statut' => 'nullable|in:Actif,Inactif',
            'role_id' => 'required|exists:roles,id',
        ]);

        try {
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoName = time() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('users/photos'), $photoName);
                $validated['photo'] = $photoName;
            }

            if (!empty($validated['password'])) {
                $validated['password'] = Hash::make($validated['password']);
            } else {
                unset($validated['password']);
            }

            $user->update($validated);

            Alert::success('Succès', 'Utilisateur mis à jour avec succès.');
            return route('utilisateurs.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Erreur lors de la mise à jour.');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            Alert::success('Succès', 'Utilisateur supprimé.');
            return redirect()->route('adm_agc_utilisateurs.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Erreur lors de la suppression.');
            return back();
        }
    }
}
