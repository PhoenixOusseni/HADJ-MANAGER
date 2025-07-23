<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'lieu_naissance',
        'telephone',
        'sexe',
        'ville_province',
        'numero_piece',
        'date_delivrance',
        'date_expiration',
        'nationalite',
        'statut',
        'observation',
        'photo',
        'id_inscription',
        'office_code',
        'agent_id',
        'service_id',
        'agence_id',
    ];

    public function agence()
    {
        return $this->belongsTo(Agence::class);
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }
}
