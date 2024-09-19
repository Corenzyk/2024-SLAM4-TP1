<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class AuthentificationControleur extends Controller
{
    public function login(Request $request)
    {
        return view('login', []);
    }

    public function traitementLogin(Request $request)
    {
        $mdp = $request->input('password');
        $email = $request->input('email');
        $utilisateur = Utilisateur::where('email', $email)->first();
        $estValide = password_verify($mdp, $utilisateur->password);

        if ($estValide) {
            $request->session()->put('user', $utilisateur);
            return redirect('/layout');
        }
        else {
            return redirect('/login')->with('error', 'Identifiants incorrects');
        }
    }

    public function register(Request $request)
    {
        return view('register', []);
    }

    public function traitementRegister(Request $request)
    {
        $mdp = $request->input('password');
        $hash = password_hash($mdp, PASSWORD_DEFAULT);
        Utilisateur::create(['name' => $request->input('name'), 'email' => $request->input('email'), 'password' => $hash]);
        return redirect("/login");
    }
}
