<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = [
        'montant',
        'date_paiement',
        'mode_paiement',
        'observation',
        'candidat_id',
        'service_id',
    ];

    function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
