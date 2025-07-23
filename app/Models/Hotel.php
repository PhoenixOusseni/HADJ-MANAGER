<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'ville',
        'quartier',
        'adresse',
        'code_contrat',
        'telephone',
        'email',
        'contact_responsable',
        'debut',
        'fin',
        'nombre_chambre',
        'nombre_lit',
        'agence_id',
        'service_id',
    ];

    public function agence()
    {
        return $this->belongsTo(Agence::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
