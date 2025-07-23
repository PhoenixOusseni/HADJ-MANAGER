<?php

use App\Http\Controllers\Api\RechercheController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/search-locataires', [RechercheController::class, 'searchLocataires'])->name('searchLocataires');
Route::get('/search-maisons', [RechercheController::class, 'searchMaison'])->name('searchMaison');
Route::get('/search-bailleurs', [RechercheController::class, 'searchBailleur'])->name('searchBailleur');
Route::get('/search-locations', [RechercheController::class, 'searchLocation'])->name('searchLocation');
