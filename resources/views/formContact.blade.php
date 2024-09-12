@extends('base')

@section('title', 'Contact')

@section('content')
    <form method="POST" action="/contact">
        @csrf
        <label>Objet du mail :</label>
        <input name="titre" id="titre" type="text" />
        <br>
        <textarea name="texte" id="texte" placeholder="Corps du mail..."></textarea>
        <br>
        <label>Votre mail :</label>
        <input name="email" id="email" type="email" />
        <br>
        <button type="submit">Valider</button>
        @if(session('error'))
            <div style="color: red;">{{ session('error') }}</div>
        @elseif(session('success'))
            <div style="color: green;">{{ session('success') }}</div>
        @endif
    </form>
@endsection
