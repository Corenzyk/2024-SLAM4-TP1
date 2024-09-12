@extends('base')

@section('title', 'Bienvenue')

@section('content')
    <h1>{{ $word }}</h1>
    @if (isset($serverInfo))
        <ul>
            @foreach($serverInfo as $key => $value)
                <li>{{ $key }} : {{ $value }}</li>
            @endforeach
        </ul>
    @else
        <p>La page est en mode PONG ({{ time() }}</p>
    @endif
@endsection
