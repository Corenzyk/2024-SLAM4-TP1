@extends('base')

@section('title', 'Contact')

@section('content')
    <form method="POST" action="/traitementRegister">
        @csrf
        <label>Votre nom :</label>
        <input name="name" id="name" type="text" />
        <br>
        <label>Email :</label>
        <input name="email" id="email" type="text" />
        <br>
        <label>Mot de passe :</label>
        <input name="password" id="password" type="password" />
        <br>
        <button type="submit">S'inscrire</button>
        @if(session('error'))
            <div style="color: red;">{{ session('error') }}</div>
        @endif
    </form>
@endsection
