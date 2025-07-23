<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrateur extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'username',
        'email',
        'telephone',
        'agence_id',
        'service_id',
    ];

    public function agence(){
        return $this->belongsTo(Agence::class);
    }

    public function service(){
        return $this->belongsTo(Service::class);
    }
}
