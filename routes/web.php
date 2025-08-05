<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\VolController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\AgenceController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\AgenceAdmin\AdmAgcCarController;
use App\Http\Controllers\AgenceAdmin\AdmAgcVolController;
use App\Http\Controllers\AgenceAdmin\AdmAgcUserController;
use App\Http\Controllers\AgenceAdmin\AdminLoginController;
use App\Http\Controllers\AgenceAdmin\AdmAgcAgentController;
use App\Http\Controllers\AgenceAdmin\AdmAgcHotelController;
use App\Http\Controllers\AgenceAdmin\AdmAgcAgenceController;
use App\Http\Controllers\AgenceAdmin\AdmAgcServiceController;
use App\Http\Controllers\AgenceAdmin\AdmAgcCandidatController;
use App\Http\Controllers\AgenceAdmin\AdmAgcPaiementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PageController::class, 'index'])->name('index');

// Route::get('otp_confirmation', [PageController::class, 'otp_confirm'])->name('otp_confirm');
// Route::post('Authentification', [AuthController::class, 'login'])->name('login');
// Route::post('deconnexion', [AuthController::class, 'logout'])->name('logout');

Route::get('export/users', [ExportController::class, 'exportUsers'])->name('export.users');
Route::get('export/agences', [ExportController::class, 'exportAgences'])->name('export.agences');
Route::get('export/candidats', [ExportController::class, 'exportCandidats'])->name('export.candidats');
Route::get('export/agent', [ExportController::class, 'exportAgent'])->name('export.agents');
Route::get('export/hotel', [ExportController::class, 'exportHotel'])->name('export.hotels');
Route::get('export/bus', [ExportController::class, 'exportBus'])->name('export.bus');
Route::get('export/paiement', [ExportController::class, 'exportPaiement'])->name('export.paiements');
Route::get('export/service', [ExportController::class, 'exportService'])->name('export.services');
Route::get('export/vol', [ExportController::class, 'exportVol'])->name('export.vols');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'role:SuperAdmin'])->group(function () {
    Route::get('Dashboard/home', [PageController::class, 'dashboard'])->name('dashboard');

    Route::post('change_password/{id}', [UserController::class, 'change_password']);
    Route::post('add_profil_image/{id}', [UserController::class, 'profil_image']);
    Route::get('profil/{id}', [UserController::class, 'profil'])->name('admin.profil');

    Route::resource('utilisateurs', UserController::class);
    Route::resource('agences', AgenceController::class);
    Route::resource('agents', AgentController::class);
    Route::resource('candidats', CandidatController::class);
    Route::resource('cars', CarController::class);
    Route::resource('hotels', HotelController::class);
    Route::resource('paiements', PaiementController::class);
    Route::resource('services', ServiceController::class);


    Route::resource('vols', VolController::class);

    Route::get('agents/form/{id}', [AgentController::class, 'form'])->name('agents.form');
    Route::get('candidats/form/{id}', [CandidatController::class, 'form'])->name('candidats.form');
    Route::get('cars/form/{id}', [CarController::class, 'form'])->name('cars.form');
    Route::get('hotels/form/{id}', [HotelController::class, 'form'])->name('hotels.form');
    Route::get('paiements/form/{id}', [PaiementController::class, 'form'])->name('paiements.form');
    Route::get('services/form/{id}', [ServiceController::class, 'form'])->name('services.form');
    Route::get('vols/form/{id}', [VolController::class, 'form'])->name('vols.form');

    Route::get('agence/{id}/agents/list', [AgentController::class, 'list'])->name('agence.agents.list');
    Route::get('agence/{id}/candidats/list', [CandidatController::class, 'list'])->name('agence.candidats.list');
    Route::get('agence/{id}/cars/list', [CarController::class, 'list'])->name('agence.cars.list');
    Route::get('agence/{id}/hotels/list', [HotelController::class, 'list'])->name('agence.hotels.list');
    Route::get('agence/{id}/paiements/list', [PaiementController::class, 'list'])->name('agence.paiements.list');
    Route::get('agence/{id}/services/list', [ServiceController::class, 'list'])->name('agence.services.list');
    Route::get('agence/{id}/vols/list', [VolController::class, 'list'])->name('agence.vols.list');
});

// AdministrateurAgence route
// Route::middleware(['auth', 'role:SuperAdmin'])->group(function () {
//     Route::resource('users', UserController::class); // Exemple
// });

// Route::middleware(['auth', 'role:Administrateur'])->group(function () {
//     Route::resource('adm_agences', AgenceController::class);
//     Route::resource('adm_agents', AgentController::class);
//     Route::resource('adm_candidats', CandidatController::class);
//     Route::resource('adm_cars', CarController::class);
//     Route::resource('adm_hotels', HotelController::class);
//     Route::resource('adm_paiements', PaiementController::class);
//     Route::resource('adm_services', ServiceController::class);
//     Route::resource('adm_utilisateurs', UserController::class);
//     Route::resource('adm_vols', VolController::class);
// });

Route::middleware(['auth', 'role:AdministrateurAgence,Administrateur'])->group(function () {
    Route::resource('adm_agc_agences', AdmAgcAgenceController::class);
    Route::resource('adm_agc_agents', AdmAgcAgentController::class);
    Route::resource('adm_agc_candidats', AdmAgcCandidatController::class);
    Route::resource('adm_agc_cars', AdmAgcCarController::class);
    Route::resource('adm_agc_hotels', AdmAgcHotelController::class);
    Route::resource('adm_agc_paiements', AdmAgcPaiementController::class);
    Route::resource('adm_agc_services', AdmAgcServiceController::class);
    Route::resource('adm_agc_utilisateurs', AdmAgcUserController::class);
    Route::resource('adm_agc_vols', AdmAgcVolController::class);

    Route::get('adm_agc_agents/form/{id}', [AdmAgcAgentController::class, 'form'])->name('adm_agc_agents.form');
    Route::get('adm_agc_candidats/form/{id}', [AdmAgcCandidatController::class, 'form'])->name('adm_agc_candidats.form');
    Route::get('adm_agc_cars/form/{id}', [AdmAgcCarController::class, 'form'])->name('adm_agc_cars.form');
    Route::get('adm_agc_hotels/form/{id}', [AdmAgcHotelController::class, 'form'])->name('adm_agc_hotels.form');
    Route::get('adm_agc_paiements/form/{id}', [AdmAgcPaiementController::class, 'form'])->name('adm_agc_paiements.form');
    Route::get('adm_agc_vols/form/{id}', [AdmAgcVolController::class, 'form'])->name('adm_agc_vols.form');

    Route::get('adm_agc_paiements/print/{id}', [AdmAgcPaiementController::class, 'print'])->name('adm_agc_paiements.print');
});

Auth::routes();

// Admin login
Route::post('/admin_login', [AdminLoginController::class, 'login'])->name('admin_login');
