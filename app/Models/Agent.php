<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'nom',
        'prenom',
        'telephone',
        'date_naissance',
        'residence',
        'email',
        'photo',
        'statut',
        'agence_id',
        'service_id',
    ];

    public function agence()
    {
        return $this->belongsTo(Agence::class);
    }

    public function candidats()
    {
        return $this->hasMany(Candidat::class, 'agent_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
