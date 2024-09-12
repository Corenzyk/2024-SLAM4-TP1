<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function afficheForm(Request $request)
    {
        return view('formContact', []);
    }

    public function addMail(Request $request){
        // $request contient l'ensemble des données envoyées par le formulaire
        // request()->all() retourne un tableau associatif avec l'ensemble des données
        if ($request->texte == '') {

            return redirect()->back()->with('error', 'Certain champs son vide');
        }
        else{
            Contact::create($request->all());
            return redirect()->back()->with('success', 'Le mail a bien été transmit');
        }
    }
}
