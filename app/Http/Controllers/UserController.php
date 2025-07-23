<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::where('nom', '!=', 'Administrateur')->get();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'email' => 'nullable|email|unique:users,email',
            'telephone' => 'nullable|string',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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

            DB::table('users')->insert([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'username' => $request->username,
                'email' => $request->email,
                'statut' => $request->statut,
                'role_id' => $request->role_id,
                'telephone' => $request->telephone,
                'photo' => $validated['photo'] ?? null,
                'password' => Hash::make($request->password),
            ]);

            Alert::success('Succès', 'Utilisateur créé avec succès.');
            return redirect()->route('utilisateurs.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Erreur lors de l\'enregistrement.');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
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

    public function show($id){
        $user = User::find($id);
        return view('admin.users.show', compact('user'));
    }

    public function profil($id){
        $user = User::find($id);
        return view('admin.users.profil', compact('user'));
    }

    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            Alert::success('Succès', 'Utilisateur supprimé.');
            return redirect()->route('utilisateurs.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Erreur lors de la suppression.');
            return back();
        }
    }
}
