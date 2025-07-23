<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Car;
use App\Models\Vol;
use App\Models\User;
use App\Models\Agent;
use App\Models\Hotel;
use App\Models\Agence;
use App\Models\Service;
use App\Models\Candidat;
use App\Models\Paiement;
use App\Policies\CarPolicy;
use App\Policies\VolPolicy;
use App\Policies\UserPolicy;
use App\Policies\AgentPolicy;
use App\Policies\HotelPolicy;
use App\Policies\AgencePolicy;
use App\Policies\ServicePolicy;
use App\Policies\CandidatPolicy;
use App\Policies\PaiementPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Agence::class => AgencePolicy::class,
        Agent::class => AgentPolicy::class,
        Candidat::class => CandidatPolicy::class,
        Car::class => CarPolicy::class,
        Hotel::class => HotelPolicy::class,
        Paiement::class => PaiementPolicy::class,
        Service::class => ServicePolicy::class,
        Vol::class => VolPolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
