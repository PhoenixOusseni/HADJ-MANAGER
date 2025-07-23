<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'compagnie',
        'numero',
        'place',
        'statut',
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
