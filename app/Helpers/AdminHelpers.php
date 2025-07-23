<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Auth;

class AdminHelpers
{
    public static function getAdminAgence()
    {
        $user = Auth::user();
        if($user && $user->agence){
            return $user && $user->agence ? $user->agence : null;
        }
        if($user && $user->agenceAdmin){
            return $user && $user->agenceAdmin ? $user->agenceAdmin : null;
        }
    }

    public static function getAdminAgenceId()
    {
        $user = Auth::user();
        if($user && $user->agence){
            return $user && $user->agence ? $user->agence->id : null;
        }

        if($user && $user->agenceAdmin){
            return $user && $user->agenceAdmin ? $user->agenceAdmin->id : null;
        }
    }
}
