<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login (Request $request) {
        if (Auth::attempt(['login' => $request->login, 'password' => $request->password])) {
            if (Auth::user()){
                emotify('success', 'BIENVENUE ! Vous etes bien connecté !');
                return redirect()->route('otp_confirm');
            }
             else {
                // notify()->error('Login ou mot de passe incorrect !');
                emotify('error', 'Login ou mot de passe incorrect !');
                return redirect()->route('authentification')->with('status', 'Login ou mot de passe incorrect !');
            }
        }

        emotify('error', 'Login ou mot de passe incorrect !');
        // notify()->error('Login ou mot de passe incorrect ! , ou verifier si vous avez bien selectionner votre role');
        return redirect()->route('authentification')->with('status', 'Login ou mot de passe incorrect !');
    }

    public function logout () {
        Auth::logout();
        return redirect()->route('authentification');
    }
}
