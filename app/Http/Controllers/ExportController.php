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

class ExportController extends Controller
{
    public function exportUsers()
    {
        $handle = fopen(storage_path('app/exports/user.csv'), 'w');

        fputcsv($handle, [
            'ID',
            'Nom',
            'Prenom',
            'Username',
            'Email',
            'Telephone',
            'Statut',
            'Role',
            'Agence'
        ]);

        User::latest()->chunk(2000, function ($users) use ($handle) {
            foreach ($users as $user) {
                fputcsv($handle, [
                    $user->id,
                    $user->nom,
                    $user->prenom,
                    $user->username,
                    $user->email,
                    $user->telephone,
                    $user->statut,
                    $user->role->nom,
                    $user->agence->libelle ?? null,
                ]);
            }
        });

        fclose($handle);

        return response()->download(storage_path('app/exports/user.csv'))->deleteFileAfterSend(true);
    }

    public function exportAgences()
    {
        $handle = fopen(storage_path('app/exports/agence.csv'), 'w');

        fputcsv($handle, [
            'ID',
            'Code',
            'Libelle',
            'Adresse',
            'Siege',
            'Telephone',
            'Whatsapp',
            'Numero externe',
            'Email',
        ]);

        Agence::latest()->chunk(2000, function ($agences) use ($handle) {
            foreach ($agences as $agence) {
                fputcsv($handle, [
                    $agence->id,
                    $agence->code,
                    $agence->libelle,
                    $agence->adress,
                    $agence->telephone,
                    $agence->whatsapp,
                    $agence->exter_phone,
                    $agence->email,
                ]);
            }
        });

        fclose($handle);

        return response()->download(storage_path('app/exports/agence.csv'))->deleteFileAfterSend(true);
    }

    public function exportCandidats()
    {
        $handle = fopen(storage_path('app/exports/candidat.csv'), 'w');

        fputcsv($handle, [
            'ID',
            'Nom',
            'Prenom',
            'Date de naissance',
            'Lieu de naissance',
            'Telephone',
            'Sexe',
            'Ville/Province',
            'Numero du piece',
            'Date de delivrance',
            'Date expiration',
            'Nationalite',
            'Statut',
            'Observation',
            'Id inscription',
            'Code office',
            'Agent',
            'Service',
            'Agence',
        ]);

        Candidat::latest()->chunk(2000, function ($candidats) use ($handle) {
            foreach ($candidats as $candidat) {
                fputcsv($handle, [
                    $candidat->id,
                    $candidat->nom . '' . $candidat->prenom,
                    $candidat->prenom,
                    $candidat->date_naissance,
                    $candidat->lieu_naissance,
                    $candidat->telephone,
                    $candidat->sexe,
                    $candidat->ville_province,
                    $candidat->numero_piece,
                    $candidat->date_delivrance,
                    $candidat->date_expiration,
                    $candidat->nationalite,
                    $candidat->statut,
                    $candidat->observation,
                    $candidat->id_inscription,
                    $candidat->office_code,
                    $candidat->agent->nom . ' ' . $candidat->agent->prenom,
                    $candidat->service->libelle ?? '',
                    $candidat->agence->libelle ?? '',
                ]);
            }
        });

        return response()->download(storage_path('app/exports/candidat.csv'))->deleteFileAfterSend(true);
    }

    public function exportAgent()
    {
        $handle = fopen(storage_path('app/exports/agent.csv'), 'w');

        fputcsv($handle, [
            'ID',
            'Code',
            'Nom',
            'Prenom',
            'Telephone',
            'Email',
            'Date de naissance',
            'Residence',
            'Statut',
            'Service',
            'Agence',
        ]);

        Agent::latest()->chunk(2000, function ($agents) use ($handle) {
            foreach ($agents as $agent) {
                fputcsv($handle, [
                    $agent->id,
                    $agent->code,
                    $agent->nom,
                    $agent->prenom,
                    $agent->telephone,
                    $agent->email,
                    $agent->date_naissance,
                    $agent->residence,
                    $agent->service->libelle ?? '',
                    $agent->agence->libelle ?? '',
                ]);
            }
        });

        return response()->download(storage_path('app/exports/agent.csv'))->deleteFileAfterSend(true);
    }

    // Hotel
    public function exportHotel()
    {
        $handle = fopen(storage_path('app/exports/hotel.csv'), 'w');

        fputcsv($handle, [
            'ID',
            'Nom',
            'Ville',
            'Quartier',
            'Adresse',
            'Code contrat',
            'Telephone',
            'Email',
            'Contact_responsable',
            'Debut',
            'Fin',
            'Nombre_chambre',
            'Nombre_lit',
            'Service',
            'Agence',
        ]);

        Hotel::latest()->chunk(2000, function ($hotels) use ($handle) {
            foreach ($hotels as $hotel) {
                fputcsv($handle, [
                    $hotel->id,
                    $hotel->nom,
                    $hotel->ville,
                    $hotel->quartier,
                    $hotel->adresse,
                    $hotel->code_contrat,
                    $hotel->telephone,
                    $hotel->email,
                    $hotel->contact_responsable,
                    $hotel->debut,
                    $hotel->fin,
                    $hotel->nombre_chambre,
                    $hotel->nombre_lit,
                    $hotel->service->libelle ?? '',
                    $hotel->agence->libelle ?? '',
                ]);
            }
        });

        return response()->download(storage_path('app/exports/hotel.csv'))->deleteFileAfterSend(true);
    }

    // Bus
    public function exportBus()
    {
        $handle = fopen(storage_path('app/exports/bus.csv'), 'w');

        fputcsv($handle, [
            'ID',
            'Compagnie',
            'Numero',
            'Place',
            'Statut',
            'Service',
            'Agence',
        ]);

        Car::latest()->chunk(2000, function ($cars) use ($handle) {
            foreach ($cars as $car) {
                fputcsv($handle, [
                    $car->id,
                    $car->compagnie,
                    $car->numero,
                    $car->place,
                    $car->service->libelle ?? '',
                    $car->agence->libelle ?? '',
                ]);
            }
        });

        return response()->download(storage_path('app/exports/bus.csv'))->deleteFileAfterSend(true);
    }

    public function exportPaiement()
    {
        $handle = fopen(storage_path('app/exports/paiement.csv'), 'w');

        fputcsv($handle, [
            'ID',
            'Montant',
            'Date de paiement',
            'Mode de paiement',
            'Observation',
            'Candidat',
            'Service',
        ]);

        Paiement::latest()->chunk(2000, function ($paiements) use ($handle) {
            foreach ($paiements as $paiement) {
                fputcsv($handle, [
                    $paiement->id,
                    $paiement->montant,
                    $paiement->date_paiement,
                    $paiement->mode_paiement,
                    $paiement->observation,
                    $paiement->candidat->nom . ' ' . $paiement->candidat->prenom,
                    $paiement->service->nom,
                ]);
            }
        });

        return response()->download(storage_path('app/exports/paiement.csv'))->deleteFileAfterSend(true);
    }

    public function exportService()
    {
        $handle = fopen(storage_path('app/exports/service.csv'), 'w');

        fputcsv($handle, [
            'ID',
            'Libelle',
            'Cout',
            'Categorie',
            'Edition',
            'Observation',
            'Agence',
        ]);

        Service::latest()->chunk(2000, function ($services) use ($handle) {
            foreach ($services as $service) {
                fputcsv($handle, [
                    $service->id,
                    $service->libelle,
                    $service->cout,
                    $service->categorie,
                    $service->edition,
                    $service->observation,
                    $service->agence->libelle ?? '',
                ]);
            }
        });

        return response()->download(storage_path('app/exports/service.csv'))->deleteFileAfterSend(true);
    }

    public function exportVol()
    {
        $handle = fopen(storage_path('app/exports/vol.csv'), 'w');

        fputcsv($handle, [
            'ID',
            'Compagnie',
            'Type de vol',
            'Numero du vol',
            'Ville de depart aller',
            'Ville de arrivee aller',
            'Date et heure de depart_aller',
            'Date et heure de arrivee_aller',
            'Ville de depart_retour',
            'Ville arrivee_retour',
            'Date et heure de depart_retour',
            'Date et heure de arrivee_retour',
            'Quota',
            'Convocation',
            'Service',
            'Agence',
        ]);

        Vol::latest()->chunk(2000, function ($vols) use ($handle) {
            foreach ($vols as $vol) {
                fputcsv($handle, [
                    $vol->id,
                    $vol->compagnie,
                    $vol->type_vol,
                    $vol->numero_vol,
                    $vol->ville_depart_aller,
                    $vol->ville_arrivee_aller,
                    $vol->date_heure_depart_aller,
                    $vol->date_heure_arrivee_aller,
                    $vol->ville_depart_retour,
                    $vol->ville_arrivee_retour,
                    $vol->date_heure_depart_retour,
                    $vol->date_heure_arrivee_retour,
                    $vol->quota,
                    $vol->convocation,
                    $vol->service->libelle ?? '',
                    $vol->agence->libelle ?? '',
                ]);
            }
        });

        return response()->download(storage_path('app/exports/vol.csv'))->deleteFileAfterSend(true);
    }
}
