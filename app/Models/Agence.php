<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agence extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'libelle',
        'email',
        'telephone',
        'siege',
        'whatsapp',
        'exter_phone',
        'adress',
        'logo',
        'admin_id',
    ];

    function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'agence_id');
    }

    public function dernierService()
    {
        return $this->hasOne(Service::class)->latestOfMany();
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    public function agents()
    {
        return $this->hasMany(Agent::class);
    }

    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }

    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    public function candidats()
    {
        return $this->hasMany(Candidat::class);
    }

    public function vols()
    {
        return $this->hasMany(Vol::class);
    }

    public function paiements()
    {
        return $this->hasManyThrough(Paiement::class, Candidat::class);
    }
}
