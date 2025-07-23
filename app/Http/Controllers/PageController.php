<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Encaissement;
use App\Models\Locataire;
use App\Models\Location;
use App\Models\Maison;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.acceuil');
    }

    /**
     * Display a listing of the resource.
     */
    public function authentification()
    {
        return view('auth.login');
    }

    /**
     * Display a listing of the resource.
     */
    public function otp_confirm()
    {
        return view('pages.otp_confirm');
    }

    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $current_date = date('Y/m/d');
        return view('pages.dashboard');
    }
}
