<?php

namespace App\Providers;

use App\Models\Agence;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Agence::created(function ($agences) {
            $agences->update(['code' => 'AGENCE-00' . $agences->id]);
        });

        User::created(function ($users) {
            $users->update(['password' => Hash::make('1234')]);
        });
    }
}
