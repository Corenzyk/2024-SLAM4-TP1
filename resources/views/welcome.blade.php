@extends('base')

@section('title', 'Bienvenue')

@section('content')
    <div class="title m-b-md">Laravel</div>

    <div class="links">
        <a href="https://laravel.com/docs">Documentation</a>
        <a href="https://laracasts.com">Laracasts</a>
        <a href="https://laravel-news.com">News</a>
        <a href="https://forge.laravel.com">Forge</a>
        <a href="https://github.com/laravel/laravel">GitHub</a>
    </div>

    <div>
        <button onclick="window.location.href = '/login';">Se connecter</button>
        <button onclick="window.location.href = '/register';">S'inscrire</button>
    </div>
@endsection
