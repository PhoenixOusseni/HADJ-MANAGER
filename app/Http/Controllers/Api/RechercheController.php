<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bailleur;
use App\Models\Locataire;
use App\Models\Location;
use App\Models\Maison;
use Illuminate\Http\Request;

class RechercheController extends Controller
{
    public function searchLocataires(Request $request)
    {
        $search = $request->get('q');
        $page = $request->get('page', 1);
        $resultCount = 25;

        $offset = ($page - 1) * $resultCount;

        $items = Locataire::where('nom', 'like', '%' . $search . '%')->orWhere('prenom', 'like', '%' . $search . '%')
            ->offset($offset)
            ->limit($resultCount)
            ->get();

        $count = Locataire::where('nom', 'like', '%' . $search . '%')->orWhere('prenom', 'like', '%' . $search . '%')->count();

        return response()->json([
            'items' => $items,
            'total_count' => $count,
        ]);
    }

    public function searchMaison(Request $request)
    {
        $search = $request->get('q');
        $page = $request->get('page', 1);
        $resultCount = 25;

        $offset = ($page - 1) * $resultCount;

        $items = Maison::where('id', 'like', '%' . $search . '%')->orWhere('type_maison', 'like', '%' . $search . '%')
            ->offset($offset)
            ->limit($resultCount)
            ->get();

        $count = Maison::where('id', 'like', '%' . $search . '%')->orWhere('type_maison', 'like', '%' . $search . '%')->count();

        return response()->json([
            'items' => $items,
            'total_count' => $count,
        ]);

    }

    public function searchBailleur(Request $request)
    {
        $search = $request->get('q');
        $page = $request->get('page', 1);
        $resultCount = 25;

        $offset = ($page - 1) * $resultCount;

        $items = Bailleur::where('nom', 'like', '%' . $search . '%')->orWhere('prenom', 'like', '%' . $search . '%')
            ->offset($offset)
            ->limit($resultCount)
            ->get();

        $count = Bailleur::where('nom', 'like', '%' . $search . '%')->orWhere('prenom', 'like', '%' . $search . '%')->count();

        return response()->json([
            'items' => $items,
            'total_count' => $count,
        ]);

    }

    public function searchLocation(Request $request)
    {
        $search = $request->get('q');
        $page = $request->get('page', 1);
        $resultCount = 25;

        $offset = ($page - 1) * $resultCount;

        $items = Location::where('code', 'like', '%' . $search . '%')->orWhere('code', 'like', '%' . $search . '%')
            ->offset($offset)
            ->limit($resultCount)
            ->get();

        $count = Location::where('code', 'like', '%' . $search . '%')->orWhere('code', 'like', '%' . $search . '%')->count();

        return response()->json([
            'items' => $items,
            'total_count' => $count,
        ]);

    }
}
