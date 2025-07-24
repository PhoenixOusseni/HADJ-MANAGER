<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'cout',
        'categorie',
        'edition',
        'observation',
        'agence_id',
    ];

    public function agence()
    {
        return $this->belongsTo(Agence::class);
    }

    public function candidats()
    {
        return $this->hasMany(Candidat::class, 'service_id');
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class, 'service_id');
    }

    public function cars()
    {
        return $this->hasMany(Car::class, 'service_id');
    }

    public function agents()
    {
        return $this->hasMany(Agent::class, 'service_id');
    }

    public function hotels()
    {
        return $this->hasMany(Hotel::class, 'service_id');
    }
}
