@extends('base')

@section('title', 'Bienvenue')

@section('content')
    <table>
        @foreach($todos as $unElement)
            <tr>
                <td>
                    {{$unElement->texte}} -
                    <a href="termine/{{$unElement->id}}">Marquer comme terminée</a>
                    @if($unElement->termine==true)
                        <a href="supprime/{{$unElement->id}}">Supprimer la tâche</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>

    <form method="POST" action="layout">
        @csrf
        <label>Nom de la tâche à faire :</label>
        <input name="texte" id="texte" type="text" />
        @if(session('error'))
            <div style="color: red;">{{ session('error') }}</div>
        @elseif(session('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif
        <button type="submit">Valider</button>
    </form>
@endsection


