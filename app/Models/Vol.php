<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vol extends Model
{
    use HasFactory;

    protected $fillable = [
        'compagnie',
        'type_vol',
        'numero_vol',
        'ville_depart_aller',
        'ville_arrivee_aller',
        'date_heure_depart_aller',
        'date_heure_arrivee_aller',
        'ville_depart_retour',
        'ville_arrivee_retour',
        'date_heure_depart_retour',
        'date_heure_arrivee_retour',
        'quota',
        'convocation',
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
