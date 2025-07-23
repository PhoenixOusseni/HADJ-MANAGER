<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Vol;
use App\Models\User;
use App\Models\Agent;
use App\Models\Hotel;
use App\Models\Agence;
use App\Models\Service;
use App\Models\Candidat;
use App\Models\Paiement;
use Illuminate\Http\Request;
use App\Helpers\AdminHelpers;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth()->user()->role->nom == 'AdministrateurAgence' || Auth()->user()->role->nom == 'Administrateur') {
            $agenceId = AdminHelpers::getAdminAgenceId();
            $agents = Agent::where('agence_id', $agenceId)->latest()->get();
            $candidats = Candidat::where('agence_id', $agenceId)->latest()->get();
            $cars = Car::where('agence_id', $agenceId)->latest()->get();
            $hotels = Hotel::where('agence_id', $agenceId)->latest()->get();
            $paiements = Paiement::whereHas('candidat', function ($query) use ($agenceId) {
                $query->where('agence_id', $agenceId);
            })->with('candidat')->latest()->get();
            $services = Service::where('agence_id', $agenceId)->latest()->get();
            $vols = Vol::where('agence_id', $agenceId)->latest()->get();
            return view('agence_admin.home', compact('agents', 'candidats', 'cars', 'hotels', 'paiements', 'services', 'vols'));
        }

        if (Auth()->user()->role->nom == 'SuperAdmin') {
            $agences = Agence::all();
            $services = Service::all();
            $candidats = Candidat::all();
            $users = User::all();
            return view('home', compact('agences', 'services', 'users', 'candidats'));
        }

        if (Auth()->user()->role->nom !== 'SuperAdmin' && Auth()->user()->role->nom !== 'AdministrateurAgence' && Auth()->user()->role->nom !== 'Administrateur') {
            return view('not_allowed');
        }
    }
}
