<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Agence;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class HotelController extends Controller
{
    public function index()
    {
        $hotels = Hotel::all();
        return view('admin.hotels.index', compact('hotels'));
    }

    public function create()
    {
        $agences = Agence::all();
        return view('admin.hotels.portal', compact('agences'));
    }

    public function form($id)
    {
        $agence = Agence::find($id);
        $services = Service::where('agence_id', $id)->latest()->get();
        return view('admin.hotels.create', compact('agence', 'services'));
    }

    public function list($id)
    {
        $agence = Agence::find($id);
        $hotels = Hotel::where('agence_id', $id)->latest()->get();
        return view('admin.hotels.index', compact('agence', 'hotels'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string',
            'ville' => 'nullable|string',
            'quartier' => 'nullable|string',
            'adresse' => 'nullable|string',
            'telephone' => 'nullable|string',
            'email' => 'nullable|email',
            'contact_responsable' => 'nullable|string',
            'debut' => 'nullable|string',
            'fin' => 'nullable|string',
            'nombre_chambre' => 'nullable|string',
            'nombre_lit' => 'nullable|string',
            'agence_id' => 'required|exists:agences,id',
            'service_id' => 'required|exists:services,id',
        ]);

        try {
            Hotel::create($validated);
            Alert::success('Succès', 'Hôtel ajouté avec succès.');
            return redirect()->route('hotels.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Une erreur est survenue.');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }

    public function edit(Hotel $hotel)
    {
        $agences = Agence::all();
        $agence = Agence::find($hotel->agence_id);
        $services = $agence->services;
        return view('admin.hotels.edit', compact('hotel', 'agences', 'services'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required|string',
            'ville' => 'nullable|string',
            'quartier' => 'nullable|string',
            'adresse' => 'nullable|string',
            'telephone' => 'nullable|string',
            'email' => 'nullable|email',
            'contact_responsable' => 'nullable|string',
            'debut' => 'nullable|string',
            'fin' => 'nullable|string',
            'nombre_chambre' => 'nullable|string',
            'nombre_lit' => 'nullable|string',
            'agence_id' => 'required|exists:agences,id',
            'service_id' => 'required|exists:services,id',
        ]);

        try {
            $hotel = Hotel::findOrFail($id);
            $hotel->update($validated);
            Alert::success('Succès', 'Hôtel mis à jour avec succès.');
            return redirect()->route('hotels.index');
        } catch (\Throwable $e) {
            Alert::error('Erreur', 'Une erreur est survenue lors de la mise à jour.');
            return back()->withInput()->withErrors([
                'message' => 'Erreur d’enregistrement. Veuillez vérifier les champs saisis.',
            ]);
        }
    }

    public function show(Hotel $hotel){
        return view('admin.hotels.show', compact('hotel'));
    }

    public function destroy(Hotel $hotel)
    {
        try {
            $hotel->delete();
            Alert::success('Succès', 'Hôtel supprimé avec succès.');
        } catch (\Exception $e) {
            Alert::error('Erreur', 'Échec de la suppression.');
        }
        return redirect()->route('hotels.index');
    }
}
