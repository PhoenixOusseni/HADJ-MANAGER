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
}
