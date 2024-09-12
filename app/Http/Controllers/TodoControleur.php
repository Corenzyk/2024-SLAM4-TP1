<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use MongoDB\BSON\Int64;
use Ramsey\Uuid\Type\Integer;

class TodoControleur extends Controller
{
    public function listTodo(Request $request){
        // Retourne à l'utilisateur le template nommés « monLayout » avec dedans une variable nommé `$todos` qui contiendra l'ensemble des éléments dans la table
        // Votre template devra utiliser cette variable avec par exemple un @foreach($todos as $todo) … @endforeach
        return view("monLayout", ["todos" => Todo::all()]);
    }

    public function addTodo(Request $request){
        // $request contient l'ensemble des données envoyées par le formulaire
        // request()->all() retourne un tableau associatif avec l'ensemble des données
        Todo::create($request->all());
        return redirect("/layout");
    }

    public function markAsDone($id){
        $todo=Todo::find($id);
        $todo->termine=true;
        $todo->save();
        return redirect("/layout");
    }

    public function deleteTodo($id){
        Todo::where('termine', 1)->where('id',$id)->first()->delete();
        return redirect("/layout");
    }
}
